<?php require('setting/setPage.php'); ?>





<?php require('header.php'); ?>
    <?php require('top-nav.php'); ?>
    <?php require('left-side.php'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php require('breadcrumb.php'); ?>
        <?php dynamicPages('home','index.php'); ?>
    </div>
<?php require('footer.php'); ?>