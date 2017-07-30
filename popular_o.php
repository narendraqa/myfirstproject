<div class="related-item">
    <div class="vid-heading overflow-hidden">
        <span class="wow fadeInUp" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: fadeInUp;">
            Most Popular Videos
        </span>
        <div class="hding-bottm-line wow zoomIn" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: zoomIn;">
        </div>
    </div>
    <div class="row">
        <div class="vid-container">
            <?php
            $related_media = json_decode(curlCall(VIEWED_VIDEOS_LIST), TRUE);
            foreach ($related_media as $related) {
                $thumb = ($related['thumbnail'] != '') ? $related['thumbnail'] : $related['cdn_url1'] . 'm_' . $related['entry_id'] . '.png';
                $time = calculateTime($related['release_date']);
                ?>
                <div class="col-md-4 col-sm-6">

                    <div class="latest-vid-img-container">		
                        <div class="vid-img">
                            <img class="img-responsive" src="<?= $thumb ?>" alt="video image" onerror="this.src='/assets/img/default.png';">
                            <a href="/videodetails.php?id=<?= $related['entry_id'] ?>" class="play-icon play-small-icon">
                            </a>
                            <div class="overlay-div"></div>
                        </div>
                        <div class="vid-text">
                            <p><?=$time?></p>
                            <h1><a href="/videodetails.php?id=<?= $related['entry_id'] ?>"><?=$related['title']?></a></h1>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</div>