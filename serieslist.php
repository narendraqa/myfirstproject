<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id > 0) {
    
} else {
    $series_list = json_decode(curlCall(SERIES_URL), TRUE);
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
                foreach ($series_list as $series) {
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="latest-vid-img-container">		
                            <div class="vid-img">
                                <img class="img-responsive" src="<?= $series['series_image'] ?>" alt="video image" style="height: 150px;" onerror="this.src='/assets/img/default.png';">
                                <a href="/list.php?series=<?= urlencode($series['series_name']) ?>&id=<?= $series['id'] ?>" class="play-icon play-small-icon">
                                </a>
                                <div class="overlay-div"></div>
                            </div>
                            <div class="vid-text">
                                <h1><a href="/list.php?series=<?= urlencode($series['series_name']) ?>&id=<?= $series['id'] ?>" data-toggle="tooltip" title="<?= $series['series_name'] ?>"><?= $series['series_name'] ?></a></h1>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>