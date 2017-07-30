<?php
$id = @$_GET['id'];
if ($id != '') {
    $mediaDataUrl = get_video_detail_url($id);
    $videoDetails = json_decode(curlCall($mediaDataUrl), TRUE);
    $videoDetails = $videoDetails[0];
    $tags = explode(',', $videoDetails['tags']);
}
?>

<div id="secondary-section" class="vids-3-column">

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="vid-detail-container ">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="video">
                                <div class="vid-player vid-wrap ">
                                    <div class="close-vid hidden"><i class="fa fa-times"></i></div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe id="funPlayerIF" class="embed-responsive-item" src="http://phando.com/media/watch/<?= $id ?>?autoplay=true" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="vid-text">
                                <p></p>
                                <h1><?= @$videoDetails['title'] ?></h1>
                            </div>
                            <!--                            <div class="video-info-bar">
                                                            <ul class="list-inline list-unstyled info-ul">
                                                                <li><i class="fa fa-calendar"></i>May 08, 2016</li>
                                                                <li><i class="fa fa-eye"></i>457689</li>
                                                                <li><i class="fa fa-thumbs-up"></i>457689</li>
                                                                <li class="pull-right sharing-drop"><button class="btn"></button></li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline pull-right text-right sharing-bar">
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                            </ul>
                                                        </div>-->
                            <div class="video-detail-text">
                                <?= @$videoDetails['description'] ?>
                            </div>
                            <!--                            <div id="comment-frm-container">
                                                            <div class="vid-heading overflow-hidden">
                                                                <span class="wow fadeInUp" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: fadeInUp;">Leave a comment</span>
                                                                <div class="hding-bottm-line wow zoomIn" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: zoomIn;"></div>
                                                            </div>
                                                            <form class="comment-form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="text" name="comment-user-name" class="form-control" id="cmnt-user-name" placeholder="NAME" required="">
                                                                            <div class="input-top-line"></div>
                                                                            <div class="input-bottom-line"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="email" name="comment-user-email" class="form-control" id="cmnt-user-email" placeholder="EMAIL" required="">
                                                                            <div class="input-top-line"></div>
                                                                            <div class="input-bottom-line"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <textarea name="comment-user-message" id="cmnt-user-msg" rows="4" class="form-control" placeholder="MESSAGE" required=""></textarea>
                                                                            <div class="input-top-line"></div>
                                                                            <div class="input-bottom-line"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <button type="submit" class="btn btn-snd">
                                                                            Post Comment
                                                                        </button>	
                                                                    </div>
                            
                                                                </div>
                                                            </form>
                                                        </div>-->
                            <?php //require_once 'popular_o.php'; ?>
                        </div>							
                    </div>
                </div>					
            </div>
            <?php require_once 'related.php'; ?>
        </div>
    </div>
</div>
<script src="assets/js/vid-scroll.js"></script>