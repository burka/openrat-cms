<?php if (!defined('OR_TITLE')) die('Forbidden'); ?>
	<?php $if2=(config('login','register')); if($if2){?>
		<form name="" target="_self" data-target="view" action="./" data-method="register" data-action="login" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="or-form login" data-async="false" data-autosave="false"><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="login" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="register" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
			<div class="line logo">
	<div class="label">
	<img src="themes/default/images/logo_register.png ?>"
	border="0" />
	</div>
	<div class="input">
	<h2>
			<?php echo langHtml('logo_register') ?>
		</h2>
		<p>
			<?php echo langHtml('logo_register_text') ?>
		</p>

	</div>
</div>
			</div>
			<div class="line">
				<div class="label">
					<label for="<?php echo REQUEST_ID ?>_mail" class="label">
						<span><?php echo nl2br(encodeHtml(htmlentities(lang('USER_MAIL')))); ?></span>
					</label>
				</div>
				<div class="input">
					<div class="inputholder"><input id="<?php echo REQUEST_ID ?>_mail" name="<?php if ('') echo ''.'_' ?>mail<?php if (false) echo '_disabled' ?>" type="text" maxlength="256" class="focus" value="<?php echo Text::encodeHtml('') ?>" /><?php if (false) { ?><input type="hidden" name="mail" value="<?php '' ?>"/><?php } ?></div>
				</div>
			</div>
			<div class="line">
				<div class="label">
				</div>
				<div class="input">
				</div>
			</div>
		<div class="or-form-actionbar"><input type="button" class="or-form-btn or-form-btn--secondary or-form-btn--cancel" value="<?php echo lang("CANCEL") ?>" /><input type="submit" class="or-form-btn or-form-btn--primary or-form-btn--save" value="<?php echo lang('BUTTON_OK') ?>" /></div></form>
	<?php } ?>
	<?php if(!$if2){?>
		<div class="message error">
			<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'REGISTER_NOT_ENABLED'.'')))); ?></span>
		</div>
	<?php } ?>