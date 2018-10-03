<!doctype html>
<html lang="en">
<head>
	<?php include 'head.php' ?>
</head>
<body data-layout="empty-layout" data-palette="palette-0" data-direction="none">
    <?php include 'navbar.php' ?>
    <?php include 'horizontal-navigation.php' ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'left-sidebar.php' ?>
            <?php include 'right-sidebar.php' ?>
            <div class="col-xs-12 main" id="main">
				<?php include 'views/charts/gauge.php' ?>
				<?php include 'footer.php' ?>
            </div>
        </div>
    </div>
    <?php include 'javascripts.php' ?>
	<script src="scripts/components/gauge.min.js"></script>
    <script src="scripts/charts-gauge.js"></script>
</body>
</html>
