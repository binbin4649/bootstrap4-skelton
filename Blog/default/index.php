<?php
/**
 * ブログトップ
 * 呼出箇所：ブログトップ
 */
$this->BcBaser->setDescription($this->Blog->getDescription());
?>
<div class="jumbotron jumbotron-fluid mt-3">
	<div class="container">
		 <h3><?php $this->Blog->title() ?></h3>
		<?php if ($this->Blog->descriptionExists()): ?>
		<p class="lead"><?php $this->Blog->description() ?></p>
		<?php endif ?>
	</div> 
</div>

<?php if ($posts): ?>
	<?php foreach ($posts as $key => $post): ?>
		<div class="row mb-4">
			<div class="col-4">
				<?php $this->Blog->eyeCatch($post, array('class' => 'img-fluid mx-auto', 'link' => false)) ?>
			</div>
			<div class="col-8">
				<?php $this->Blog->postTitle($post) ?><br>
				<p><small><span class="text-muted">
					<?php $this->Blog->category($post) ?>
					&nbsp;
					<?php $this->Blog->postDate($post) ?>
					&nbsp;
					<?php $this->Blog->author($post) ?>
				</span></small><br>
				<?php $this->Blog->postContent($post, false, false, 70) ?></p>
			</div>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<p><?php echo __('記事がありません。'); ?></p>
<?php endif; ?>

<!-- /Elements/paginations/simple.php -->
<?php $this->BcBaser->pagination('simple'); ?>