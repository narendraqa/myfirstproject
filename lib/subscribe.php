<?php

require_once './database.php';
require_once './lib.php';
require_once 'PHPMailer-master/PHPMailerAutoload.php';

class Subscribe extends Database {

    public function __construct() {
        $dbClass = new Database();
        $this->dbconL = $dbClass->dbcon;
    }

    public function checkSubscriptionStatus($email) {
        $query = 'select * from subscription where email = "' . $email . '"';
        $result = mysqli_query($this->dbconL, $query);

        $response = mysqli_fetch_row($result);
        if (!empty($response)) {
            return 1;
        } else {
            $queryEmail = 'insert into subscription(`email`, `status`) VALUES("' . $email . '", 1)';
            $result1 = mysqli_query($this->dbconL, $queryEmail);
            $id = mysqli_insert_id($this->dbconL);
            if ($id > 0) {
                $query_service = 'insert into subscribed_services(`user_id`, `service_type`, `service_id`) VALUES("' . $id . '", "category", 185)';
                $result2 = mysqli_query($this->dbconL, $query_service);
                return 2;
            } else {
                return 0;
            }
        }
    }

    public function getSubscriptionList() {
        $query = 'select s.id, s.email, ss.service_type, ss.service_id from subscription as s left join subscribed_services as ss on ss.user_id = s.id where s.status = 1';
        $result = mysqli_query($this->dbconL, $query);
        $response = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }

        return $response;
    }

    public function sendEmail($to, $body, $subject, $cc) {
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = USERNAME;                 // SMTP username
        $mail->Password = PASSWORD;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom(FROM_EMAIL, 'Bhaktinow');
        foreach ($to as $key => $val) {
            $mail->addAddress($val, $val);
        }// Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo(FROM_EMAIL, 'Bhaktinow');
        foreach ($cc as $keyCc => $valCC) {
            $mail->addCC($valCC);
        }
        //$mail->addBCC('bcc@example.com');
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $body;

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

}

if (isset($_REQUEST['action'])) {
    $subscribe = new Subscribe();
    if ($_REQUEST['action'] == 'subscribe') {
        echo $subscribe->checkSubscriptionStatus($_REQUEST['email']);
        die();
    } elseif ($_REQUEST['action'] == 'subscriptionlist') {
        $response = array(
            'code' => 1,
            'status' => http_response_code(),
            'message' => 'Subscribed users list',
            'data' => $subscribe->getSubscriptionList()
        );
        echo json_encode($response);
        die();
    } else if ($_REQUEST['action'] == 'dailyhoroscope') {
        $category_media_url = get_category_data_url(185);
        $catData = json_decode(curlCall($category_media_url), TRUE);

        $featured_media_url = get_featured_listing_url();
        $featuredData = json_decode(curlCall($featured_media_url), TRUE);

        $today = date('Y-m-d');
        $response = array();
        $html = '';
        if (!empty($featuredData)) {
            $i = 0;
            foreach ($featuredData as $key => $media) {
                if ($i > 2) {
                    break;
                }
                $releaseDate = date('Y-m-d', strtotime($media['release_date']));
                $response[] = array(
                    'entry_id' => $media['entry_id'],
                    'title' => $media['title'],
                    'thumb' => ($media['thumbnail'] == '') ? $media['cdn_url1'] . 's_' . $media['entry_id'] . '.png' : $media['thumbnail'],
                    'thumb_featured' => ($media['thumbnail'] == '') ? $media['cdn_url1'] . 'play_icon_' . $media['entry_id'] . '.png' : $media['thumbnail'],
                );
                $thumb = ($media['thumbnail'] == '') ? $media['cdn_url1'] . 's_' . $media['entry_id'] . '.png' : $media['thumbnail'];
                $link = 'http://www.bhaktinow.com/videodetails.php?id=' . $media['entry_id'];
                $html .= '
                    <td width="170" valign="top" class="specbundle2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td valign="top" width="170"><div class="contentEditableContainer contentImageEditable">
                        <div class="contentEditable" align="center">
                            <a href="' . $link . '" target="_blank">
                                <img src="' . $thumb . '" alt="soup image" width="170" height="120" data-default="placeholder" data-max-width="170">
                            </a>    
                        </div>
                    </div></td>
            </tr>
            <tr>
                <td align="center" style="padding:12px 0 0 0;" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td align="center" valign="top">
                                <div class="contentEditableContainer contentTextEditable">
                                    <div class="contentEditable">
                                        <p style="width:88%">' . $media["title"] . '</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr><td height="10"></td></tr>

                    </table>
                </td>
            </tr>
        </tbody>
    </table></td><td valign = "top" width = "17" class = "spechide">&nbsp;</td>';
                $i++;
            }
        }
        if (!empty($catData)) {
            $response_data = array();
            foreach ($catData as $cat) {
                $releaseDate = date('Y-m-d', strtotime($cat['release_date']));

                if (strtotime($releaseDate) == strtotime($today)) {
                    $response_data[] = array(
                        'entry_id' => $cat['entry_id'],
                        'title' => $cat['title'],
                        'thumb' => ($cat['thumbnail'] == '') ? $cat['cdn_url1'] . 's_' . $cat['entry_id'] . '.png' : $cat['thumbnail'],
                        'thumb_featured' => ($cat['thumbnail'] == '') ? $cat['cdn_url1'] . 'play_icon_' . $cat['entry_id'] . '.png' : $cat['thumbnail'],
                    );
                }
            }
            if (!empty($response_data)) {
                $htmlContent = file_get_contents(ROOT_PATH . "/emailtemplates/index.html");
                $htmlContent = str_replace('{{featuredImg}}', @$response_data[0]['thumb_featured'], $htmlContent);
                $htmlContent = str_replace('{{td}}', $html, $htmlContent);
                $htmlContent = str_replace('{{featuredTitle}}', $response_data[0]["title"], $htmlContent);
                $htmlContent = str_replace('{{featuredLink}}', 'http://bhaktinow.com/videodetails.php?id=' . $response_data[0]["entry_id"], $htmlContent);
            }
        }
        if (isset($htmlContent)) {
            $htmlContent = str_replace('{{td}}', $html, $htmlContent);
            $subscribers = $subscribe->getSubscriptionList();
            if (!empty($subscribers)) {
                foreach ($subscribers as $subscriber) {
                    $subscribe->sendEmail(array($subscriber['email']), $htmlContent, HOROSCOPE_SUBJECT, array());
                }
            }
        } else {
            $htmlContent = $htmlContent = file_get_contents(ROOT_PATH . "/emailtemplates/medianotuploaded.html");
            $htmlContent = str_replace('{{$date}}', date('F d, Y'), $htmlContent);
            $to = explode(',', ALERT_EMAIL_TO);
            $cc = explode(',', ALERT_EMAIL_CC);
            $subscribe->sendEmail($to, $htmlContent, HOROSCOPE_NOT_UPLOADED, $cc);
        }
        die;
    }
}
            