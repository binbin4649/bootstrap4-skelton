<?php
/**
 * レイアウト
 * 呼出箇所：全ページ
 */
?>
<?php $this->BcBaser->docType('html5') ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php $this->BcBaser->charset() ?>
	<?php $this->BcBaser->title() ?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<?php $this->BcBaser->css(array('style', 'jpn.min.css')) ?>
	
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<?php $this->BcBaser->js(array()); ?>
	<?php $this->BcBaser->scripts() ?>
	<!-- /Elements/google_analytics.php -->
	<?php $this->BcBaser->googleAnalytics() ?>
</head>
<body id="<?php $this->BcBaser->contentsName() ?>">
	<!-- /Elements/header.php -->
	<?php $this->BcBaser->header() ?>
	<main role="main">
	
	<?php if ($this->BcBaser->isHome()): ?>
		<div class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php $this->Bootstrap4->homeImage() ?>
			</div>
		</div>
	<?php else: ?>
		<!-- /Elements/crumbs.php -->
		<?php $this->BcBaser->crumbsList(); ?>
	<?php endif ?>
	<div class="container my-5">
	<div class="row">
		<div class="col-md-9">
			<?php $this->BcBaser->flash() ?>
			<?php $this->BcBaser->content() ?>
			<!-- /Elements/contents_navi.php -->
			<?php $this->BcBaser->contentsNavi() ?>
		</div>
		<div class="col-md-3">
			<!-- /Elements/widget_area.php -->
			<?php $this->BcBaser->widgetArea() ?>
		</div>
	</div>

	</div>
	<!-- /Elements/footer.php -->
	<?php $this->BcBaser->footer() ?>
	</main>

<?php //$this->BcBaser->func() ?>
</body>
</html>
