<div class="col-md-3 col-sm-4">
    <div class="sidebar">
        <div class="sidebar-vid most-liked">
            <h1 class="sidebar-heading">Most viewed</h1>
            <div style="" id="slimtest2">
                <?php
                $related_media = json_decode(curlCall(VIEWED_VIDEOS_LIST), TRUE);
                foreach ($related_media as $related) {
                    $thumb = ($related['thumbnail'] != '') ? $related['thumbnail'] : $related['cdn_url1'] .'/'. $related['entry_id'].'/' . $related['entry_id'] . '.png';
                    $time = calculateTime($related['release_date']);
                    ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="/videodetails.php?id=<?= $related['entry_id'] ?>"><img src="<?= $thumb ?>" alt="video" width="130px;" onerror="this.src='/assets/img/default.png';"></a>
                        </div>
                        <div class="media-body">
                            <h1><a href="/videodetails.php?id=<?= $related['entry_id'] ?>"><?= $related['title'] ?></a></h1>
                            <p>
                                <span><i class=""></i><?=$time?></span>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!--        <div class="sidebar-vid most-viewd">
                    <h1 class="sidebar-heading">Most Viewed</h1>
                    <div class="most-viewd-container">
                        <div class="most-viewd-img">
                            <img class="img-responsive" src="assets/img/most-viewd-1.jpg" alt="video">
                        </div>
                        <div class="most-viewd-text">
                            <h1><a href="video-detail.html">Human Rights Violation</a></h1>
                            <p>
                                <span><i class="fa fa-comment"></i> 10</span>
                                <span><i class="fa fa-eye"></i> 534</span>
                            </p>
                        </div>
                    </div>
                    <div class="most-viewd-container">
                        <div class="most-viewd-img">
                            <img class="img-responsive" src="assets/img/most-viewd-2.jpg" alt="video">
                        </div>
                        <div class="most-viewd-text">
                            <h1><a href="video-detail.html">War Video Compilation</a></h1>
                            <p>
                                <span><i class="fa fa-comment"></i> 10</span>
                                <span><i class="fa fa-eye"></i> 534</span>
                            </p>
                        </div>
                    </div>							
                </div>-->
        <!--        <div class="tags">
                    <h1 class="sidebar-heading">Tags</h1>
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">3D</a></li>
                        <li><a href="#">Animals &amp; Birds</a></li>
                        <li><a href="#">HD</a></li>
                        <li><a href="#">Horror</a></li>
                        <li><a href="#">Art</a></li>
                        <li><a href="#">Self</a></li>
                        <li><a href="#">HD Songs</a></li>
                        <li><a href="#">Comedy</a></li>
                    </ul>
                </div>-->
    </div>
</div>