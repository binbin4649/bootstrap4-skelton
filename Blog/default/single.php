<?php
/**
 * ブログ記事詳細ページ
 * 呼出箇所：ブログ記事詳細ページ
 */
$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->Blog->getPostContent($post, false, false, 50));
?>

<h5 class="border-bottom py-3 mb-4 text-secondary"><?php $this->Blog->title() ?></h5>
<h3 class="mb-0"><?php $this->BcBaser->contentsTitle() ?></h3>
<div class="text-muted mb-2"><small>
	<?php $this->Blog->category($post) ?>
	&nbsp;
	<?php $this->Blog->postDate($post) ?>
	&nbsp;
	<?php $this->Blog->author($post) ?>
	<?php $this->BcBaser->element('blog_tag', array('post' => $post)) ?>
</small></div>
<div class="mb-3">
	<?php $this->Blog->eyeCatch($post, array('link'=>false, 'class'=>'img-fluid rounded mx-auto d-block', 'imgsize'=>'large')) ?>
</div>

<div class="mb-3">
	<?php $this->Blog->postContent($post) ?>
</div>

<div class="text-center mb-3">
	<?php $this->Blog->prevLink($post) ?>
	&nbsp;｜&nbsp;
	<?php $this->Blog->nextLink($post) ?>
</div>

<!-- /Elements/blog_related_posts.php -->
<?php $this->BcBaser->element('blog_related_posts') ?>

<!-- /Elements/blog_comennts.php -->
<?php //$this->BcBaser->element('blog_comments') ?>
