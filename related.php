<div class="col-md-3 col-sm-4">
    <div class="sidebar">
        <div class="sidebar-vid most-liked">
            <h1 class="sidebar-heading">Related</h1>
            <div style="overflow-y: scroll;height: 400px;" id="slimtest1">
                <?php
                $related_media_url = get_related_media_url($id);
                $related_media = json_decode(curlCall($related_media_url), TRUE);

                foreach ($related_media as $related) {
                    $thumb = ($related['thumbnail'] != '') ? $related['thumbnail'] : $related['cdn_url1'] .'/'.$related['entry_id'] .'/' . $related['entry_id'] . '.png';
                    $time = calculateTime($related['release_date']);
                    ?>
                    <div class="media">
                        <div class="media-left"><a href="/videodetails.php?id=<?= $related['entry_id'] ?>">
                                <img src="<?= $thumb ?>" alt="video" width="130px;" onerror="this.src='/assets/img/default.png';"></a>
                        </div>
                        <div class="media-body">
                            <h1><a href="/videodetails.php?id=<?= $related['entry_id'] ?>"><?= $related['title'] ?></a></h1>
                            <p>
                                <span><i class="fa fa-days"></i> <?= $time ?></span>
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
        <div class="tags">
            <h1 class="sidebar-heading">Tags</h1>
            <ul class="list-inline list-unstyled">
                <?php
                if (!empty($tags)) {
                    foreach ($tags as $key => $val) {
                        ?>
                        <li><a href="/list.php?srch=<?= urlencode($val) ?>"><?= $val ?></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>