<?php
/**
 * メールフォーム確認ページ
 * 呼出箇所：メールフォーム
 */
if ($freezed) {
	$this->Mailform->freeze();
}
?>
<h5 class="mb-4 border-bottom"><?php $this->BcBaser->contentsTitle() ?></h5>

<?php if ($freezed): ?>
	<h6 class="mb-4 p-3 shadow-sm text-secondary"><?php echo __('入力内容の確認') ?></h6>
	<div class="my-3"><p><?php echo __('入力した内容に間違いがなければ「送信する」ボタンをクリックしてください。') ?></p></div>
	<?php else: ?>
	<h6 class="mb-4 p-3 shadow-sm text-secondary"><?php echo __('入力フォーム') ?></h6>
<?php endif ?>

<div class="my-3">
	<?php $this->BcBaser->flash() ?>
	<!-- /Elements/mail_form.php -->
	<?php $this->BcBaser->element('mail_form') ?>
</div>
