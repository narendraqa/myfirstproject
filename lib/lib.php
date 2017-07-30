<?php

define('ENV', 'prod');
$serverUrl = $_SERVER['SERVER_NAME'];
switch ($serverUrl) {
    case 'localhost':
        define('ROOT_PATH', 'C:/PHPDev/Bhaktinow');
        define('ALERT_EMAIL_TO', 'ashwanisaini@gmail.com,ashwani.saini@outlook.com');
        define('ALERT_EMAIL_CC', 'ashwani.saini@gmail.com,ashwin_alone@yahoo.co.in');
        break;
    case 'qa.bhaktinow.com/':
        define('ROOT_PATH', '/var/www/Bhaktinowqa');
        define('ALERT_EMAIL_TO', 'ashwanisaini@gmail.com,ashwani.saini@outlook.com');
        define('ALERT_EMAIL_CC', 'ashwani.saini@gmail.com,ashwin_alone@yahoo.co.in');
        break;
    case 'stage.bhaktinow.com/':
        define('ROOT_PATH', '/var/www/bhaktinowstage');
        define('ALERT_EMAIL_TO', 'ashwanisaini@gmail.com,ashwani.saini@outlook.com');
        define('ALERT_EMAIL_CC', 'ashwani.saini@gmail.com,ashwin_alone@yahoo.co.in');
        break;
    case 'bhaktinow.com/':
        define('ROOT_PATH', '/var/www/BhaktiNow');
        define('ALERT_EMAIL_TO', 'haneef.sadhna@gmail.com,sanjeevjha19@gmail.com');
        define('ALERT_EMAIL_CC', 'videoplatform@qainfotech.com');
        break;
    default :
        define('ROOT_PATH', 'C:/PHPDev/Bhaktinow');
        break;
}

//    define('VIDEO_LISTING_URL','http://phando.com/extapi/medialist?limit=19&order=desc');
define('VIDEO_LISTING_URL', 'http://phando.com/extapi/medialist');
define('CDN_URL', 'http://d38qrdn0npmven.cloudfront.net/');
//define('CDN_URL','http://sadhna-1470051410.s3.amazonaws.com/');
define('PID', 715);
define('VIDEO_DATA_URL', 'http://phando.com/extapi/mediadata');
//define('RELATED_VIDEO_URL','http://phando.com/extapi/relatedmedia');
define('RELATED_VIDEO_URL', 'http://phando.com/extapi/relatedvideosabstract');

//define('RELATED_VIDEO_PLAYLIST_URL','http://phando.com/extapi/relatedvideobyplaylist');
define('RELATED_VIDEO_PLAYLIST_URL', 'http://phando.com/extapi/relatedvideosabstract');

define('SEARCH_URL', 'http://phando.com/extapi/mediabysearch');

define('LANG', '1');
define('VIDEO_LISTING_LIMIT', '6');
define('FEATURED_LISTING_LIMIT', '5');
define('VIDEO_LISTING_ORDER', 'desc');
define('VIDEO_SRC', 'http://phando.com/media/watch/');
//define('VIDEO_SRC','http://10.0.31.47:8082/media/watch/');
define('CATEGORY_LIST_URL', 'http://phando.com/extapi/categorybypublisher?pid=' . PID);
define('CATEGORY_DATA_URL', 'http://phando.com/extapi/mediabycategory');
define('CATEGORY_BY_MEDIA', 'http://phando.com/extapi/categorybymedia');

define('FEATURED_VIDEO_URL', 'http://phando.com/extapi/featuredmedia');
define('CHANNEL_URL', 'http://phando.com/extapi/channellist?pid=' . PID);
define('MEDIA_BY_CHANNEL', 'http://phando.com/extapi/mediabychannelid');
define('MEDIA_BY_SERIES', 'http://phando.com/extapi/mediabyseriesid');
define('SERIES_URL', 'http://phando.com/extapi/serieslist?pid=' . PID);
define('CATEGORY_VIDEOS_LIMIT', '50');
define('POPULAR_VIDEOS_LIST', 'http://phando.com/extapi/popularvideos?start_date=' . date('Y-m-d', strtotime('-30 days')) . '&end_date=' . date('Y-m-d', strtotime('-1 days')) . '&site_id=10');
//define('VIEWED_VIDEOS_LIST', 'http://phando.com/extapi/popularvideos?start_date=' . date('Y-m-d', strtotime('-180 days')) . '&end_date=' . date('Y-m-d', strtotime('-1 days')) . '&site_id=10');
define('VIEWED_VIDEOS_LIST', video_listing_url());
define('FROM_EMAIL', 'info@bhaktinow.com');
define('SMTP_HOST', 'smtp.webfaction.com');
define('USERNAME', 'info_bhakti');
define('PASSWORD', 'Info@$123bh');
define('HOROSCOPE_SUBJECT', 'Bhaktinow Daily Horoscope');
define('HOROSCOPE_NOT_UPLOADED', 'ALERT: Bhaktinow Daily Horoscope video not uploaded yet!');
function curlCall($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    $error = curl_errno($curl);
    curl_close($curl);
    return $result;
}

function get_video_detail_url($id) {

    $lang = LANG;

    return VIDEO_DATA_URL . '?media_id=' . $id . '&lang_id=' . $lang;
}

function get_related_media_url($id) {

    return RELATED_VIDEO_URL . '?media_id=' . $id . '&lang_id=' . LANG . '&pid=' . PID . '&limit=10&sort=asc';
}

function get_related_media_playlist_url($id) {

    return RELATED_VIDEO_PLAYLIST_URL . '?media_id=' . $id . '&lang_id=' . LANG . '&pid=' . PID . '&limit=10';
}

function video_listing_url() {
    return VIDEO_LISTING_URL . '?limit=' . VIDEO_LISTING_LIMIT . '&order=' . VIDEO_LISTING_ORDER . '&lang=' . LANG . '&pid=' . PID;
}

function get_featured_listing_url() {
    return FEATURED_VIDEO_URL . '?limit=' . FEATURED_LISTING_LIMIT . '&lang_id=' . LANG . '&pid=' . PID;
}

function get_category_data_url($id) {
    return CATEGORY_DATA_URL . '?category_id=' . $id . '&limit=' . CATEGORY_VIDEOS_LIMIT . '&lang_id=' . LANG . '&pid=' . PID;
}

function get_search_url($term, $lang_id, $limit) {
    return SEARCH_URL . '?term=' . $term . '&limit=' . $limit . '&lang_id=' . LANG . '&pid=' . PID;
}

function get_category_by_media($id) {
    return CATEGORY_BY_MEDIA . '?media_id=' . $id;
}

function get_channel_url() {
    return CHANNEL_URL;
}

function get_series_url() {
    return SERIES_URL;
}

function get_media_by_channels($id) {
    return MEDIA_BY_CHANNEL . '?channel_id=' . $id . '&limit=' . CATEGORY_VIDEOS_LIMIT . '&lang_id=' . LANG . '&pid=' . PID;
}

function get_media_by_series($id) {
    return MEDIA_BY_SERIES . '?series_id=' . $id . '&limit=' . CATEGORY_VIDEOS_LIMIT . '&lang_id=' . LANG . '&pid=' . PID;
}

function calculateTime($date) {
    return secondsToTime(strtotime($date));
}

function secondsToTime($inputSeconds) {
    $then = new DateTime(date('Y-m-d H:i:s', $inputSeconds));
    $now = new DateTime(date('Y-m-d H:i:s', time()));
    $diff = $then->diff($now);
    if ($diff->y != '') {
        $timeCal = ($diff->y > 1) ? ' years ' : ' year ';
        return $diff->y . $timeCal;
    } elseif ($diff->m != '') {
        $timeCal = ($diff->m > 1) ? ' months ' : ' month ';
        return $diff->m . $timeCal . 'ago';
    } else if ($diff->d != '') {
        $timeCal = ($diff->d > 1) ? ' days ' : ' day ';
        return $diff->d . $timeCal . ' ago';
    } else if ($diff->h != '') {
        $timeCal = ($diff->h > 1) ? ' minutes ' : ' minutes';
        return $diff->h . $timeCal . ' ago';
    } elseif ($diff->i != '') {
        $timeCal = ($diff->i > 1) ? ' minutes ' : ' minutes ';
        return $diff->i . $timeCal . ' ago';
    } else if ($diff->s != '') {
        $timeCal = ' just now ';
        return $diff->s . $timeCal;
    }
}
