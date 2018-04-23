<?php
/**
 * [PUBLISH] ブログ年別アーカイブ
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * @var BcAppView $this
 */

if (!isset($view_count)) {
	$view_count = false;
}
if (!isset($limit)) {
	$limit = false;
}
if (isset($blogContent)) {
	$id = $blogContent['BlogContent']['id'];
} else {
	$id = $blog_content_id;
}
$actionUrl = '/blog/blog/get_posted_years/' . $id;
if ($limit) {
	$actionUrl .= '/' . $limit;
} else {
	$actionUrl .= '/0';
}
if ($view_count) {
	$actionUrl .= '/1';
} else {
	$actionUrl .= '/0';	
}

$data = $this->requestAction($actionUrl, ['entityId' => $id]);
$postedDates = $data['postedDates'];
$blogcontent = $data['blogContent'];
$baseCurrentUrl = $this->BcBaser->getBlogContentsUrl($id) . 'archives/date/';
?>


<div class="my-3">
	<?php if ($name && $use_title): ?>
	<h6 class="pt-3 text-secondary"><?php echo $name ?></h6>
	<?php endif ?>
	<?php if (!empty($postedDates)): ?>
		<ul>
			<?php foreach ($postedDates as $postedDate): ?>
				<?php if (isset($this->params['named']['year']) && $this->params['named']['year'] == $postedDate['year']): ?>
					<?php $class = ' class="selected"' ?>
				<?php elseif ($this->request->url == $baseCurrentUrl . $postedDate['year']): ?>
					<?php $class = ' class="current"' ?>
				<?php else: ?>
					<?php $class = '' ?>
				<?php endif ?>
				<?php if ($view_count): ?>
					<?php $title = $postedDate['year'] . '年' . '(' . $postedDate['count'] . ')' ?>
				<?php else: ?>
					<?php $title = $postedDate['year'] . '年' ?>
				<?php endif ?>
				<li<?php echo $class ?>>
					<?php $this->BcBaser->link($title, $this->BcBaser->getBlogContentsUrl($id) . 'archives/date/' . $postedDate['year']) ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>