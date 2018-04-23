<?php
/**
 * ブログコメント
 * 呼出箇所：ブログ記事詳細
 */
?>


<?php if (!empty($dbData)): ?>
	<?php if ($dbData['status']): ?>
<div class="mb-2 p-3 border-bottom">
	<small>≫
		<?php if ($dbData['url']): ?>
			<?php echo $this->BcBaser->link($dbData['name'], $dbData['url'], array('target' => '_blank')) ?>
		<?php else: ?>
			<?php echo $dbData['name'] ?>
		<?php endif ?>
	</small>
	<p><?php echo nl2br($this->BcText->autoLinkUrls($dbData['message'])) ?></p>
</div>
	<?php endif ?>
<?php endif ?>