<?php
/**
 * パーツ用ブログ記事一覧
 *
 * BcBaserHelper::blogPosts( コンテンツ名, 件数 ) で呼び出す
 * （例）<?php $this->BcBaser->blogPosts('news', 3) ?>
 */
?>
<?php if ($posts): ?>
<?php foreach ($posts as $key => $post): ?>
	<div class="row mb-4">
		<div class="col-4">
			<?php $this->Blog->eyeCatch($post, array('class' => 'img-fluid mx-auto', 'link' => false)) ?>
		</div>
		<div class="col-8">
			<?php $this->Blog->postTitle($post) ?><br>
			<p><small><span class="text-muted"><?php $this->Blog->postDate($post, 'Y.m.d') ?></span></small><br>
			<?php $this->Blog->postContent($post, false, false, 70) ?></p>
		</div>
	</div>
<?php endforeach; ?>
<?php else: ?>
<p><?php echo __('記事がありません。'); ?></p>
<?php endif ?>
