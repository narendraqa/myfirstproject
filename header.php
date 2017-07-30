<!-- Main Bar-->
<div id="main-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-5 col-xs-12 border-right ">
                <div class="logo m-logo">
                    <a href="/">
                        <img class="img-responsive" src="assets/img/logo.png" alt="Logo">	
					</a>
				</div>	
				<div class="m-social-icon hidden-lg hiden-md hidden-sm visible-xs">
					<ul class="list-inline ">
						<li><a href="https://www.facebook.com/BhaktiNow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/bhaktinow" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://play.google.com/store/apps/details?id=com.qait.bhaktinow" target="_blank"><i class="fi ion-social-android"></i></a></li>
						<li><a href="https://itunes.apple.com/us/app/bhaktinow/id1173505698?mt=8"target="_blank"><i class="fi ion-iphone"></i></a></li>
						
					</ul>
				</div>
			</div>
            <!--            <div class="col-sm-7 col-xs-6 hidden-md hidden-lg text-right">
				<button type="button" class="btn btn-default btn-create-album">
				Create Album
				</button>
			</div>-->
            <div class="clearfix visible-sm"></div>
            <div class="clearfix visible-xs"></div>
            <div class="col-md-6 col-sm-4 border-right sm-border-top">
                <div class="search-box">
                    <form onsubmit1="submitFn(this, event);" action="list.php" method="get" onsubmit="return validateForm()">
						<!--                        <input type="text" name="search" id="search" class="form-control" placeholder="Search" required="">
							<button type="submit" class="search-icon">
                            <i class="fa fa-search"></i>
						</button>-->
                        <div class="search-wrapper">
                            <div class="input-holder">
                                <input type="text" class="search-input form-control" name="srch"  id="srch"  placeholder="Type to search" style="color:#000" value="<?= @$_GET['srch'] ?>">
                                <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
							</div>
                            <span class="close" onclick="searchToggle(this, event);"></span>
                            <div class="result-container">
								
							</div>
						</div>
					</form>						
				</div>
			</div>
            <div class="col-md-2 col-sm-4 sm-border-top hidden-xs">
                <div class="social-icon">
                    <ul class="list-inline list-unstyled">
                        <li><a href="https://www.facebook.com/BhaktiNow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/bhaktinow" target="_blank"><i class="fa fa-twitter"></i></a></li><!--
							<li><a href="#"><i class="fa fa-vimeo"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
					</ul>
				</div>
			</div>
            <div class="col-md-2 col-sm-4 border-left sm-border-top hidden-xs">
                <div class="login">
                    <div class="media">
                        <div class="media-left">
							
						</div>
                        <div class="media-body">
                            <p class="app-download">
                                <a href="https://play.google.com/store/apps/details?id=com.qait.bhaktinow" target="_blank"><i class="fi ion-social-android"></i></a>
                                <a href="https://itunes.apple.com/us/app/bhaktinow/id1173505698?mt=8"target="_blank"><i class="fi ion-iphone"></i></a>
							</p>
						</div>
					</div>									
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main Bar -->
<?php
	$queryString = $_GET;
	$cname = 'NA';
	if (isset($queryString['category'])) {
		$cname = ($queryString['category'] != null) ? $queryString['category'] : null;
	}
	if (empty($queryString)) {
		$cname = null;
	}
?>

<!-- Main Navigation -->
<div id="main-navigation">
    <div class="container">
        <div class="row">
		<div class="col-md-2 col-sm-2">
                    <a href="/"><img src="http://sandesh.com/content/themes/themosis-theme/dist/images/sandesh-logo.jpg" alt="logo" class="logo-site"></a>
		</div>
            <div class="col-md-10 col-sm-10 text-right">
                <div id="cssmenu">
					<div id="menu-button">
						<button class="c-hamburger c-hamburger--rot">
							<span>toggle menu</span>
						</button>
						
					</div>
					<ul>
						<li class="<?= ($cname == null) ? ' active ' : '' ?> has-sub"><span class="submenu-button"></span><a href="/#"><i class="fi ion-ios-home"></i>Home</a>
						</li>
						<?php
							$category_list = json_decode(curlCall(CATEGORY_LIST_URL), TRUE);
							$i = 0;
							foreach ($category_list as $cat) {
								$cls = '';
								if ($cname == $cat['category'])
								$cls = ' active '
							?>
							<li class="<?= $cls ?> "><span class="submenu-button"></span><a href="/list.php?category=<?= urlencode($cat['category']) ?>&id=<?= $cat['id'] ?>"><i class="fi ion-ios-film-outline"></i><?= $cat['category'] ?></a>						      
							</li>
							<?php
								if ($i == 5)
								break;
								$i++;
							}
						?>
					</ul>
					<button type="button" id="subscribe-btn" class="btn btn-send absolute hidden" data-toggle="modal" data-target="#subscribeNow" style="display: none">Subscribe</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="subscribeNow" class="modal fade" role="dialog">
    <div class="modal-dialog">
		
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-org">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Subscription For Daily Horoscope</h4>
			</div>
            <div class="modal-body">
                <form id="emailForm" class="form-horizontal"
				data-fv-framework="bootstrap"
				data-fv-icon-valid="glyphicon glyphicon-ok"
				data-fv-icon-invalid="glyphicon glyphicon-remove"
				data-fv-icon-validating="glyphicon glyphicon-refresh">
					
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Email address</label>
                        <div class="col-xs-7">
                            <input class="form-control" name="email" id="email_addresss"
							type="email"
							data-fv-emailaddress-message="The value is not a valid email address" />
						</div>
                        <div id="msg" class="col-xs-7 col-xs-offset-3 marginTop15 msgTxt">
							
						</div>
					</div>
				</form>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-subscribe">Subscribe Now</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>
<script>
    $(document).ready(function () {
        $('#subscribe-btn').show();
        $('#emailForm').bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
			},
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter email address'
						},
                        emailAddress: {
                            message: 'Please enter a valid email address'
						}
					}
				}
			}
		});
        $('#subscribeNow').on('hidden.bs.modal', function (e) {
            $('#email_addresss').val('');
            $('#msg').html('').removeClass('text-success text-danger');
		});
	});
	
    $('.btn-subscribe').bind('click', function () {
        $('#emailForm').submit();
        if ($('#email_addresss').val() != '') {
            $.ajax({url: '/lib/subscribe.php',
                data: {email: $('#email_addresss').val(), action: 'subscribe'},
                type: 'POST',
                success: function (output) {
                    if (output == '2') {
                        $('#msg').html('Thansk for subscring Bhaktinow!').removeClass('text-danger text-info').addClass('text-success');
						} else if (output == '1') {
                        $('#msg').html('You are already subscribed!').removeClass('text-danger text success').addClass('text-info');
						} else {
                        $('#msg').html('Error in process! Please retry.').removeClass('text-danger text success').addClass('text-danger');
					}
				}
			});
		}
	});
</script>
<!-- Main Navigation -->