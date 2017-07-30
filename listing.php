<div id="secondary-section" class="vids-3-column">

    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['id'])) {
                $fileName = 'videolist.php';
            } elseif (isset($_GET['srch'])) {
                $fileName = 'videolist.php';
            } else {
                $fileName = $pageTitle . 'list.php';
            }
            include_once $fileName;
            ?>
            <?php include_once 'popular_vertical.php'; ?>
        </div>
    </div>
</div>
<!-- Secondary Section -->