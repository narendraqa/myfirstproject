<!-- Secondary Section -->
<div id="secondary-section">
	<!--for placing Ads add "ad-space" class with container -->
    <div class="container ">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="latst-vid secondary-vid">
                    <div class="vid-heading overflow-hidden">
                        <span class="wow fadeInUp" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: fadeInUp;">Latest Videos</span>
                        <div class="hding-bottm-line wow zoomIn" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: zoomIn;"></div>
                    </div>
                    <div class="row auto-clear">
                        <div class="vid-container">
                            <?php
                            $latest_media_url = video_listing_url();
                            $latest_media = json_decode(curlCall($latest_media_url), TRUE); //print_R($latest_media);die;

                            foreach ($latest_media as $latest) {
                                $thumb = ($latest['thumbnail'] != '') ? $latest['thumbnail'] : $latest['cdn_url1']."/".$latest['entry_id'] . '/' . $latest['entry_id'] . '.png';
                                $time = calculateTime($latest['release_date']);
                                ?>

                                <div class="col-md-4 col-sm-6">
                                    <div class="latest-vid-img-container">		
                                        <div class="vid-img">
                                            <img class="img-responsive" src="<?= $thumb ?>" alt="video image" onerror="this.src='/assets/img/default.png';">
                                                <a href="/videodetails.php?id=<?= $latest['entry_id'] ?>" class="play-icon play-small-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 294.843 294.843" style="enable-background:new 0 0 294.843 294.843;" xml:space="preserve" width="512px" height="512px" class="img-responsive play-svg svg replaced-svg">

                                                    </svg>	                	
                                                </a>
												<span class="category-name">Sports</span>
                                                <div class="overlay-div"></div>
                                        </div>
                                        <div class="vid-text">
                                            <p><span class="pull-left"><?= substr($latest['duration'], 0, 8) ?></span> <span class="pull-right"><?= $time ?></span></p>
                                            <h1><a href="/videodetails.php?id=<?= $latest['entry_id'] ?>" data-toggle="tooltip" data-placement="top" title="<?= $latest['title'] ?>"><?= $latest['title'] ?></a></h1>
                                            <p class="vid-info-text">

    <!--                                                <span>/</span>
     <span>
         From <a href="/videodetails.php?id=<?= $latest['entry_id'] ?>"><i class="fa fa-youtube-play"></i></a>
     </span>
     <span>/</span>
     <span>410 views</span>-->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

<!--
                <div class="most-viewd secondary-vid">
                    <div class="vid-heading overflow-hidden">
                        <span class="wow fadeInUp" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: fadeInUp;">Most Viewed</span>
                        <div class="hding-bottm-line wow zoomIn" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: zoomIn;"></div>
                    </div>
                    <div class="row">
                        <div class="vid-container">
                            <?php
                            $polular_media = json_decode(curlCall(POPULAR_VIDEOS_LIST), TRUE);
                            $i = 0;
                            foreach ($polular_media as $polular) {
                                $thumb = ($polular['thumbnail'] != '') ? $polular['thumbnail'] : $polular['cdn_url1']."/".$polular['cdn_url1'] . '/' . $polular['entry_id'] . '.png';
                                $time = calculateTime($latest['release_date']);
                                ?>

                                <div class="col-md-4 col-sm-6">
                                    <div class="latest-vid-img-container">		
                                        <div class="vid-img">
                                            <img class="img-responsive" src="<?= $thumb ?>" alt="video image">
                                                <a href="/videodetails.php?id=<?= $polular['entry_id'] ?>" class="play-icon play-small-icon">
                                                </a>
                                                <div class="overlay-div"></div>
                                        </div>
                                        <div class="vid-text">
                                            <p></p>
                                            <h1><a href="/videodetails.php?id=<?= $polular['entry_id'] ?>" data-toggle="tooltip" data-placement="top" title="<?= $polular['title'] ?>"><?= $polular['title'] ?></a></h1>
                                            <p class="vid-info-text">
                                                <span><?= $time ?></span>
    <!--                                                <span>/</span>-->
    <!--                                                <span>
                                                    From <a href="/videodetails.php?id=<?//= $polular['entry_id'] ?>"><i class="fa fa-vimeo"></i></a>
                                                </span>
                                                <span>/</span>
                                                <span>410 views</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                if ($i == 5)
                                    break;
                                $i++;
                            }
                            ?>								
                        </div>
                    </div>
                </div>
    -->
                <!--       <div class="sports secondary-vid">
                    <div class="vid-heading overflow-hidden">
                        <span class="wow fadeInUp" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: fadeInUp;">Channels</span>
                        <div class="hding-bottm-line wow zoomIn" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: zoomIn;"></div>
                    </div>
                    <div class="row">
                        <div class="vid-container">
                            <?php
                            $channel_url = get_channel_url();
                            $channel_list = json_decode(curlCall($channel_url), TRUE);
                            $i = 0;
                            foreach ($channel_list as $channel) {
                                ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="latest-vid-img-container">		
                                        <div class="vid-img channels-img channels-img">
                                            <span class="helper"></span>
                                            <img class="img-responsive" src="<?= $channel['channel_image'] ?>" alt="video image" width="100%">
                                                <a href="/list.php?channel=<?= urlencode($channel['channel']) ?>&id=<?= $channel['id'] ?>" class="play-icon play-md-icon ">
                                                </a>
                                                <div class="overlay-div"></div>
                                        </div>
                                        <div class="vid-text">
                                            <p></p>
                                            <h1><a href="/list.php?channel=<?= urlencode($channel['channel']) ?>&id=<?= $channel['id'] ?>"><?= $channel['channel'] ?></a></h1>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
-->
                <div class="sports secondary-vid">
                    <div class="vid-heading overflow-hidden">
                        <span class="wow fadeInUp" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: fadeInUp;">Categories</span>
                        <div class="hding-bottm-line wow zoomIn" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-name: zoomIn;"></div>
                    </div>
                    <div class="row">
                        <div class="vid-container">
                            <?php
                            $category_list = json_decode(curlCall(CATEGORY_LIST_URL), TRUE);
                            $i = 0;
                            foreach ($category_list as $category) {
                                ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="latest-vid-img-container">		
                                        <div class="vid-img category-listing">
                                            <img class="img-responsive" src="<?= $category['thumb'] ?>" alt="video image" width="100%" onerror="this.src='/assets/img/default.png';">
                                                <a href="/list.php?category=<?= urlencode($category['category']) ?>&id=<?= $category['id'] ?>" class="play-icon play-md-icon ">
                                                </a>
                                                <div class="overlay-div"></div>
                                        </div>
                                        <div class="vid-text">
                                            <p></p>
                                            <h1><a href="/list.php?category=<?= urlencode($category['category']) ?>&id=<?= $category['id'] ?>"><?= $category['category'] ?></a></h1>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-4">
                <div class="sidebar">
                    <div class="sidebar-vid most-liked">
                        <h1 class="sidebar-heading"><span>Series</span></h1>
                        <?php
                        $series_url = get_series_url();
                        $series_list = json_decode(curlCall($series_url), TRUE);
                        $i = 0;
                        foreach ($series_list as $series) {
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="/list.php?series=<?= urlencode($series['series_name']) ?>&id=<?= $series['id'] ?>"><img src="<?= $series['series_image'] ?>" alt="series_image" width="130px;" onerror="this.src='/assets/img/default.png';"></a>
                                </div>
                                <div class="media-body">
                                    <h1><a href="/list.php?series=<?= urlencode($series['series_name']) ?>&id=<?= $series['id'] ?>"><?= $series['series_name'] ?></a></h1>
    <!--                                    <p>
                                        <span><i class="fa fa-comment"></i> 10</span>
                                        <span><i class="fa fa-eye"></i> 534</span>
                                    </p>-->
                                </div>
                            </div>
                            <?php
                            if ($i == 20)
                                break;
                            $i++;
                        }
                        ?>
                        <a href="/list.php?series">More...</a>
                    </div>
                    <!--                    <div class="sidebar-vid most-liked">
                                            <h1 class="sidebar-heading">Most Popular</h1>
                    <?php
                    $polular_media = json_decode(curlCall(POPULAR_VIDEOS_LIST), TRUE);
                    //print_R($polular_media);die;
                    $i = 0;
                    foreach ($polular_media as $polular) {
                        $thumb = ($polular['thumbnail'] != '') ? $polular['thumbnail'] : $polular['cdn_url1'] . 'm_' . $polular['entry_id'] . '.png';
                        ?>
                                                                                                    <div class="media">
                                                                                                        <div class="media-left">
                                                                                                            <img src="<?= $thumb ?>" alt="video" width="130px;">
                                                                                                        </div>
                                                                                                        <div class="media-body">
                                                                                                            <h1><a href="http://layerstheme.com/developers/jamshaid/video-demo/video/video-detail.html">Journey</a></h1>
                                                                                                            <p>
                                                                                                                <span><i class="fa fa-comment"></i> 10</span>
                                                                                                                <span><i class="fa fa-eye"></i> 534</span>
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                        <?php
                        $i++;
                    }
                    ?>
                                        </div>-->
                    <!--                    <div class="sidebar-vid most-viewd">
                                            <h1 class="sidebar-heading">Most Viewed</h1>
                                            <div class="most-viewd-container">
                                                <div class="most-viewd-img">
                                                    <img class="img-responsive" src="assets/img/most-viewd-1.jpg" alt="video">
                                                </div>
                                                <div class="most-viewd-text">
                                                    <h1><a href="http://layerstheme.com/developers/jamshaid/video-demo/video/video-detail.html">Human Rights Violation</a></h1>
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
                                                    <h1><a href="http://layerstheme.com/developers/jamshaid/video-demo/video/video-detail.html">War Video Compilation</a></h1>
                                                    <p>
                                                        <span><i class="fa fa-comment"></i> 10</span>
                                                        <span><i class="fa fa-eye"></i> 534</span>
                                                    </p>
                                                </div>
                                            </div>							
                                        </div>-->
                    <!--                    <div class="tags">
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
        </div>
    </div>
</div>

<!-- Secondary Section -->