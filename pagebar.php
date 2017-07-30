<?php
foreach ($_GET as $key => $val) {
    switch ($key) {
        case 'category':
            $pageTitle = 'category';
            $br = ($val != '') ? $val : 'Categories';
            break;
        case 'series':
            $pageTitle = 'series';
            $br = ($val != '') ? $val : 'Series';
            break;
        case 'channel':
            $pageTitle = 'channel';
            $br = ($val != '') ? $val : 'Channels';
            break;
    }
}
if (isset($_GET['srch'])) {
    $pageTitle = 'search';
    $br = 'Search Result for ' . $_GET['srch'];
}
?>
<!--<div id="page-bar">
    <div class="overlay-topbar"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="page-title">
                    <h1 class="text-uppercase"><?= @$pageTitle ?></h1>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 text-right">
                <ul class="breadcrumb">
                    <li>
                        <a href="index.html"><i class="fi ion-ios-home"></i>Home</a>
                    </li>
                    <li class="active"><?= @$br ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>-->