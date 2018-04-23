<?php
/**
 * メールフォーム送信完了ページ
 * 呼出箇所：メールフォーム
 */
if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']) {
	$this->Html->meta(array('http-equiv' => 'Refresh'), null, array('content' => '5;url=' . $mailContent['MailContent']['redirect_url'], 'inline' => false));
}
?>

<h5 class="mb-4 border-bottom"><?php $this->BcBaser->contentsTitle() ?></h5>

<h6 class="mb-4 p-3 shadow-sm text-secondary"><?php echo __('メール送信完了') ?></h6>

<div class="my-3">
	<p><?php echo __('お問い合わせ頂きありがとうございました。')?> 
	<?php echo __('確認次第、ご連絡させて頂きます。') ?></p>
<?php if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']): ?>
	<p>※<?php echo __('%s 秒後にトップページへ自動的に移動します。', 5) ?></p>
	<p><a href="<?php echo $mailContent['MailContent']['redirect_url']; ?>"><?php echo __('移動しない場合はコチラをクリックしてください。') ?>≫</a></p>
<?php endif; ?>
</div>
