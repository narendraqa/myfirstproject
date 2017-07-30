<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id > 0) {
    
} else {
    $channel_url = get_channel_url();
    $channel_list = json_decode(curlCall($channel_url), TRUE);
}
?>
<div class="col-md-9 col-sm-8">
    <div class="st-3-column secondary-vid">
        <div class="vid-heading overflow-hidden">
            <span class="wow fadeInUp" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: fadeInUp;"><?= $br ?></span>
            <div class="hding-bottm-line wow zoomIn" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: zoomIn;"></div>
        </div>
        <div class="row">
            <div class="vid-container">
                <?php
                foreach ($channel_list as $channel) {
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="latest-vid-img-container">		
                            <div class="vid-img">
                                <img class="img-responsive" src="<?= $channel['channel_image'] ?>" alt="video image" style="height: 150px;" onerror="this.src='/assets/img/default.png';">
                                <a href="/list.php?channel=<?= urlencode($channel['channel']) ?>&id=<?= $channel['id'] ?>" class="play-icon play-small-icon">
                                </a>
                                <div class="overlay-div"></div>
                            </div>
                            <div class="vid-text">
                                <?=$channel['channel']?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>