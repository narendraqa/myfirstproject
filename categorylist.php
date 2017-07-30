<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id > 0) {
    
} else {
    $category_list = json_decode(curlCall(CATEGORY_LIST_URL), TRUE);
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
                foreach ($category_list as $cat) {
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="latest-vid-img-container">		
                            <div class="vid-img category-listing">
                                <img class="img-responsive" src="<?= $cat['thumb'] ?>" alt="video image" onerror="this.src='/assets/img/default.png';">
                                <a href="/list.php?category=<?= urlencode($cat['category']) ?>&id=<?= $cat['id'] ?>" class="play-icon play-small-icon">
                                </a>
                                <div class="overlay-div"></div>
                            </div>
                            <div class="vid-text">
                                <h1><a href="/list.php?category=<?= urlencode($cat['category']) ?>&id=<?= $cat['id'] ?>"><?= $cat['category'] ?></a></h1>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>