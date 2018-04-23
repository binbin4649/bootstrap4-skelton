<?php
/**
 * テキスト
 * 呼出箇所：ウィジェット
 */
?>
<div class="my-3">
	<?php if ($name && $use_title): ?>
	<h6 class="pt-3 text-secondary"><?php echo $name ?></h6>
	<hr>
	<?php endif ?>
	<?php echo $text ?>
</div>