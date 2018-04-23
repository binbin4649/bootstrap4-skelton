<?php
/**
 * [PUBLISH] フォーム
 */
// ブラウザのヒストリーバック（戻るボタン）対応
$this->Mail->token();
?>


<script type="text/javascript">
	$(function(){
		$(".form-submit").click(function(){
			var mode = $(this).attr('id').replace('BtnMessage', '');
			$("#MailMessageMode").val(mode);
			return true;
		});
	});
</script>


<?php /* フォーム開始タグ */ ?>
<?php if (!$freezed): ?>
	<?php echo $this->Mailform->create('MailMessage', array('url' => $this->BcBaser->getContentsUrl(null, false, null, false) . 'confirm', 'type' => 'file')) ?>
<?php else: ?>
	<?php echo $this->Mailform->create('MailMessage', array('url' => $this->BcBaser->getContentsUrl(null, false, null, false)  . 'submit')) ?>
<?php endif; ?>
<?php /* フォーム本体 */ ?>

<?php $this->Mailform->unlockField('MailMessage.mode') ?>
<?php echo $this->Mailform->hidden('MailMessage.mode') ?>


<?php $this->BcBaser->element('mail_input', array('blockStart' => 1)) ?>


<?php if ($mailContent['MailContent']['auth_captcha']): ?>
	<?php if (!$freezed): ?>
		<div class="text-center">
			<?php echo $this->Mailform->authCaptcha('MailMessage.auth_captcha') ?>
			<br />
			&nbsp;<?php echo __('画像の文字を入力してください') ?><br clear="all" />
			<?php echo $this->Mailform->error('MailMessage.auth_captcha', __('入力された文字が間違っています。入力をやり直してください。')) ?>
		</div>
	<?php else: ?>
		<?php echo $this->Mailform->hidden('MailMessage.auth_captcha') ?>
		<?php echo $this->Mailform->hidden('MailMessage.captcha_id') ?>
	<?php endif ?>
<?php endif ?>

<?php /* 送信ボタン */ ?>
<div class="mt-3 mb-5 py-3 text-center">
	<?php if ($freezed): ?>
		<?php echo $this->Mailform->submit('　' . __('書き直す') . '　', array('div' => false, 'class' => 'btn btn-secondary', 'id' => 'BtnMessageBack')) ?>
		<?php echo $this->Mailform->submit('　' . __('送信する') . '　', array('div' => false, 'class' => 'btn btn-success', 'id' => 'BtnMessageSubmit')) ?>
	<?php else: ?>
		<input name="resetdata" value="　取り消す　" type="reset" class="btn btn-secondary" />
		<?php echo $this->Mailform->submit('　' . __('入力内容を確認する') . '　', array('div' => false, 'class' => 'btn btn-success', 'id' => 'BtnMessageConfirm')) ?>
	<?php endif; ?>
</div>

<?php echo $this->Mailform->end() ?>
