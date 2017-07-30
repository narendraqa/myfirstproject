<!-- Main Section -->
<div id="main-section">
    <!--<div class="overlay-banner"></div>-->
    <div class="container ">
        <div class="row overflow-hidden">
            <?php
				$featured_media_url = get_featured_listing_url();
				$featured_media = json_decode(curlCall($featured_media_url), TRUE);
				$i = 0;
				foreach ($featured_media as $featured) {
					$duration = '.5s';
					$animation = 'fadeInUp';
					$gridClass = 'col-md-4 col-sm-4 small-grid';
					$style = '';
					if ($i == 0) {
						$duration = '1s';
						$animation = 'pulse';
						$gridClass = 'col-md-8 col-sm-8 md-grid marginBtm10';
						$style = 'height: 450px;width: 100%;';
					}
				?>
				<?php if($i==0){?>
                <div class="<?= $gridClass ?>">
                    <div class="vid-img-holder wow <?= $animation ?>" data-wow-duration="<?= $duration ?>" style="visibility: visible; animation-duration: <?= $duration ?>; animation-name: <?= $animation ?>;">
                        <div class="top-shadow">
							
							<!--                            <span><i class="fa fa-eye"></i> 4481</span>-->
						</div>
                        <a href="/videodetails.php?id=<?= $featured['entry_id'] ?>">
                            <img class="img-responsive hidden-sm hidden-xs" src="<?= $featured['cdn_url1'] . $featured['entry_id'] . '.png' ?>" alt="video_thumb" style="<?= $style ?>" onerror="this.onerror=null;this.src='<?= $featured['cdn_url1'] . $featured['entry_id'] .'/'.$featured['entry_id']. '.png' ?>';">
							<img class="img-responsive hidden-md hidden-lg" src="<?= $featured['cdn_url1'] . $featured['entry_id'] . '.png' ?>" alt="video_thumb">
							<span class="play-icon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 294.843 294.843" style="enable-background:new 0 0 294.843 294.843;" xml:space="preserve" width="512px" height="512px" class="img-responsive play-svg svg replaced-svg">
									
								</svg>		                	
							</span>			                			                
						</a> 
						
						<h3 class="vid-author">
							<span class="pull-left">
								<?= substr($featured['duration'], 0, 8) ?>
							</span>
							<span class="pull-right"><?= calculateTime($featured['release_date']) ?></span>
							
							<a class="featured-video-ttl" href="/videodetails.php?id=<?= $featured['entry_id'] ?>" data-toggle="tooltip1" data-placement="top" title="<?= $featured['title'] ?>"><?= $featured['title'] ?></a>
						</h3> 
						<div class="bottom-shadow"></div>
						<div class="overlay-div"></div>		
					</div>
				</div>
				<?php }else{ //Anil code ?>
					<div class="<?= $gridClass ?>">
						<ul class="list-unstyled">
							<li>
								<div class="img-holder">
									<a href="/videodetails.php?id=<?= $featured['entry_id'] ?>"> <img class="img-responsive hidden-sm hidden-xs" src="<?= $featured['cdn_url1'] . $featured['entry_id'] . '.png' ?>" alt="video_thumb" onerror="this.onerror=null;this.src='<?= $featured['cdn_url1'] . $featured['entry_id'] .'/'.$featured['entry_id']. '.png' ?>';" style="<?= $style ?>"></a>
								</div>
								<div class="img-desc">
									<h5><a class="featured-video-ttl" href="/videodetails.php?id=<?= $featured['entry_id'] ?>" data-toggle="tooltip1" data-placement="top" title="<?= $featured['title'] ?>"><?= $featured['title'] ?></a></h5>
									<p><span class="pull-left">
								<?= substr($featured['duration'], 0, 8) ?>
							</span>
							<span class="pull-right"><?= calculateTime($featured['release_date']) ?></span></p>
								</div>
							</li>	
						</ul>
					</div>
				<?php }?>
				<?php
					$i++;
				}
			?>
			
		</div>
	</div>
</div>
<!-- Main Section -->