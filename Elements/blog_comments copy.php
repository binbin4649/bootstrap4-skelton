<?php
/**
 * ブログコメント一覧
 * 呼出箇所：ブログ記事詳細
 */
?>

<?php echo $this->element('blog_comments_scripts'); ?>

<?php $captchaId = mt_rand(0, 99999999) ?>
<div id="BlogCommentCaptchaUrl" style="display:none"><?php echo $this->BcBaser->getUrl('/blog/blog_comments/captcha/' . $captchaId) ?></div>
<div id="BlogCommentGetTokenUrl" style="display:none"><?php echo $this->BcBaser->getUrl('/blog/blog_comments/get_token') ?></div>

<?php if ($blogContent['BlogContent']['comment_use']): ?>
	<div class="my-5">

		<h6 class="mb-3 p-2 shadow-sm text-secondary"><?php echo __('この記事へのコメント') ?></h6>

		<div class="my-3">
			<?php if (!empty($post['BlogComment'])): ?>
				<?php foreach ($post['BlogComment'] as $comment): ?>
					<!-- /Elements/blog_comment.php -->
					<?php $this->BcBaser->element('blog_comment', array('dbData' => $comment)) ?>
				<?php endforeach ?>
			<?php endif ?>
		</div>

		<h6 class="mt-5 mb-3 p-2 shadow-sm text-secondary"><?php echo __('コメントを送る') ?></h6>

		<?php echo $this->BcForm->create('BlogComment', array('url' => '/blog/blog_comments/add/' . $blogContent['BlogContent']['id'] . '/' . $post['BlogPost']['id'], 'id' => 'BlogCommentAddForm')) ?>
		<?php echo $this->BcForm->input('BlogComment.captcha_id', ['type' => 'hidden', 'value' => $captchaId]) ?>
		
		<div class="form-group row">
			<div class="col-md-4 text-md-right">
				<?php echo $this->BcForm->label('BlogComment.name', __('お名前') . '.' . __('ニックネーム')) ?><span class="text-danger"><small>＊</small></span>
			</div>
			<div class="col-md-8">
				<?php echo $this->BcForm->input('BlogComment.name', array('type' => 'text', 'class'=>'form-control')) ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-4 text-md-right">
				<?php echo $this->BcForm->label('BlogComment.email', __('Eメール')) ?><span class="text-danger"><small>＊</small></span>
			</div>
			<div class="col-md-8">
				<?php echo $this->BcForm->input('BlogComment.email', array('email' => 'text', 'class'=>'form-control')) ?>&nbsp;
				<small>※ <?php echo __('Eメールは公開されません') ?></small>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-4 text-md-right">
				<?php echo $this->BcForm->label('BlogComment.url', 'URL') ?>
			</div>
			<div class="col-md-8">
				<td><?php echo $this->BcForm->input('BlogComment.url', array('type' => 'text', 'class'=>'form-control')) ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-4 text-md-right">
				<?php echo $this->BcForm->label('BlogComment.message', __('コメント')) ?><span class="text-danger"><small>＊</small></span>
			</div>
			<div class="col-md-8">
				<?php echo $this->BcForm->input('BlogComment.message', array('type' => 'textarea', 'class'=>'form-control')) ?>
			</div>
		</div>
		

		<?php if ($blogContent['BlogContent']['auth_captcha']): ?>
			<div class="auth-captcha clearfix">
				<img src="" alt="<?php echo __('認証画象') ?>" class="auth-captcha-image" id="AuthCaptchaImage" style="display:none">
				<?php $this->BcBaser->img('admin/captcha_loader.gif', array('alt' => 'Loading...', 'class' => 'auth-captcha-image', 'id' => 'CaptchaLoader')) ?>
				<?php echo $this->BcForm->text('BlogComment.auth_captcha') ?>
				<small><?php echo __('画像の文字を入力してください') ?></small>
			</div>
		<?php endif ?>
		<div class="text-center">
			<?php echo $this->BcForm->end(array('label' => __('送信する'), 'id' => 'BlogCommentAddButton', 'class' => 'btn btn-success')) ?>
		</div>

		<div id="ResultMessage" class="message" style="display:none;text-align:center">&nbsp;</div>

	</div>
<?php endif ?>