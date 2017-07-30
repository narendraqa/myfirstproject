<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about wow fadeIn" data-wow-duration="0.5s" style="visibility: visible; animation-duration: 0.5s; animation-name: fadeIn;">
                    <div class="vid-heading">
                        <span>About</span>
                        <div class="hding-bottm-line"></div>
                    </div>
                    <img class="img-responsive" src="http://sandesh.com/content/themes/themosis-theme/dist/images/sandesh-logo.jpg" alt="Logo">
                    <p>
                        Sandesh.com</p>
                    <ul class="bottom-social list-inline list-unstyled">
                       <!-- <li><a href="https://www.facebook.com/BhaktiNow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/bhaktinow" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="bottom-post wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.2s; animation-name: fadeIn;">
                    <div class="vid-heading">
                        <span>Latest Posts</span>
                        <div class="hding-bottm-line"></div>
                    </div>
                    <div class="latest-post">
                        <?php
                        $latest_media_url = video_listing_url();
                        $latest_media = json_decode(curlCall($latest_media_url), TRUE);
                        $i = 0;
                        foreach ($latest_media as $latest) {
                            $thumb = ($latest['thumbnail'] != '') ? $latest['thumbnail'] : $latest['cdn_url1'] .'/'.$latest['entry_id']. '/' . $latest['entry_id'] . '.png';
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <img src="<?= $thumb ?>" alt="video" style="width: 80px;" onerror="this.src='/assets/img/default.png';">
                                </div>
                                <div class="media-body">
                                    <h1><a href="/videodetails.php?id=<?= $latest['entry_id'] ?>"><?= $latest['title'] ?></a></h1>
                                    <p>
                                        <span><i class=""></i><?= calculateTime($latest['release_date']) ?></span>
                                    </p>
                                </div>
                            </div>
                            <?php
                            if ($i == 2)
                                break;
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="bottom-categories wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.4s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.4s; animation-name: fadeIn;">
                    <div class="vid-heading">
                        <span>Categories</span>
                        <div class="hding-bottm-line"></div>
                    </div>
                    <ul class="category-list category-list-2 list-unstyled">
                        <?php
                        $category_list = json_decode(curlCall(CATEGORY_LIST_URL), TRUE);
                        $i = 0;
                        foreach ($category_list as $cat) {
                            ?>
                            <li><a href="/list.php?category=<?= urlencode($cat['category']) ?>&id=<?= $cat['id'] ?>"><?= $cat['category'] ?></a></li>
                            <?php
                            if ($i == 5)
                                break;
                            $i++;
                        }
                        if ($i > 0) {
                            ?>
                            <li><a href="/list.php?category" style="color: green">More...</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="bottom-categories wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.4s" style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.4s; animation-name: fadeIn;">
                    <div class="vid-heading">
                        <span>Channels</span>
                        <div class="hding-bottm-line"></div>
                    </div>
                    <ul class="category-list list-unstyled">
                        <?php
                        $channel_url = get_channel_url();
                        $channel_list = json_decode(curlCall($channel_url), TRUE);
                        $i = 0;
                        foreach ($channel_list as $channel) {
                            ?>
                            <li><a href="/list.php?channel=<?= urlencode($channel['channel']) ?>&id=<?= $channel['id'] ?>"><?= $channel['channel'] ?></a></li>
                            <?php
                            if ($i == 5)
                                break;
                            $i++;
                        }
                        if ($i > 5) {
                            ?>
                            <li><a href="/list.php?channel" style="color: green">More...</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- copyright -->	
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-right">
                <p>
                    Copyright &copy; <?= date('Y') ?> by Sandesh.com . All right reserved.</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- copyright -->

</div>

<?php require_once 'subscribe.php'; ?>

</div>		
</body>
</html>