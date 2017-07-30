<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id > 0) {
    if (isset($_GET['series'])) {
        $series_media_url = get_media_by_series($_GET['id']);
        $mediaList = json_decode(curlCall($series_media_url), TRUE);
    } else if (isset($_GET['category'])) {
        $category_media_url = get_category_data_url($_GET['id']);
        $mediaList = json_decode(curlCall($category_media_url), TRUE);
    } else if (isset($_GET['channel'])) {
        $channel_media_url = get_media_by_channels($_GET['id']);
        $mediaList = json_decode(curlCall($channel_media_url), TRUE);
    }
}
if (isset($_GET['srch'])) {
    $term = urlencode($_GET['srch']);
    $srch_url = get_search_url($term, 1, 10);
    $mediaList = json_decode(curlCall($srch_url), TRUE);
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
                foreach ($mediaList as $media) {
                    $thumb = ($media['thumbnail'] != '') ? $media['thumbnail'] : $media['cdn_url1'] .'/'.$media['entry_id'] .'/' . $media['entry_id'] . '.png';
                    $time = calculateTime($media['release_date']);
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="latest-vid-img-container">		
                            <div class="vid-img">
                                <img class="img-responsive" src="<?= $thumb ?>" alt="video image" onerror="this.src='/assets/img/default.png';">
                                <a href="/videodetails.php?id=<?= $media['entry_id'] ?>" class="play-icon play-small-icon">
                                </a>
                                <div class="overlay-div"></div>
                            </div>
                            <div class="vid-text">
                                <p><?= substr($media['duration'], 0, 8) ?></p>
                                <h1><a href="/videodetails.php?id=<?= $media['entry_id'] ?>" data-toggle="tooltip" data-placement="top" title="<?= $media['title'] ?>"><?= $media['title'] ?></a></h1>
                                <p class="vid-info-text">
                                    <span><?= $time ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>