<?php
/**
 * メールフォーム
 * 呼出箇所：メールフォーム
 */
?>

<div class="my-3">
	<h5 class="mb-4 border-bottom"><?php $this->BcBaser->contentsTitle() ?></h5>
	
	<h6 class="mb-4 p-3 shadow-sm text-secondary"><?php echo __('入力フォーム') ?></h6>
	
	<?php if ($this->Mail->descriptionExists()): ?>
		<div class="my-3"><?php $this->Mail->description() ?></div>
	<?php endif ?>
	
	<div class="my-3">
		<?php $this->BcBaser->flash() ?>
		<!-- /Elements/mail_form.php -->
		<?php $this->BcBaser->element('mail_form') ?>
	</div>
</div>