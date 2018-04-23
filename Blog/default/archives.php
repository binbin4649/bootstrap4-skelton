<?php
/**
 * ブログアーカイブ一覧
 * 呼出箇所：カテゴリ別ブログ記事一覧、タグ別ブログ記事一覧、年別ブログ記事一覧、月別ブログ記事一覧、日別ブログ記事一覧
 */
$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->BcBaser->getContentsTitle() . __('のアーカイブ一覧です。'));
?>


<h5 class="mb-4 border-bottom"><?php $this->Blog->title() ?></h5>

<h6 class="mb-4 p-3 shadow-sm text-secondary"><?php $this->BcBaser->contentsTitle() ?></h6>

<?php if (!empty($posts)): ?>
	<?php foreach ($posts as $post): ?>
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
<p class="my-3"><?php echo __('記事がありません。'); ?></p>
<?php endif; ?>

<!-- /Elements/paginations/simple.php -->
<?php $this->BcBaser->pagination('simple'); ?>