
	
		<div class="line logo">
	<div class="label">
	<img src="themes/default/images/logo_changemail.png ?>"
	border="0" />
	</div>
	<div class="input">
	<h2>
			<?php echo langHtml('logo_changemail') ?>
		</h2>
		<p>
			<?php echo langHtml('logo_changemail_text') ?>
		</p>

	</div>
</div>
		</div>
		<form name="" target="_self" data-target="view" action="./" data-method="confirmmail" data-action="profile" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="profile" data-async="" data-autosave=""><input type="submit" class="invisible" /><input type="hidden" name="<?php echo REQ_PARAM_EMBED ?>" value="1" /><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="profile" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="confirmmail" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
			<div class="line">
				<div class="label">
					<label for="<?php echo REQUEST_ID ?>_code" class="label"><?php echo lang('mail_code') ?>
					</label>
				</div>
				<div class="input">
					<div class="inputholder"><input id="<?php echo REQUEST_ID ?>_code" name="code<?php if ('') echo '_disabled' ?>" required="required" autofocus="autofocus" type="text" maxlength="256" class="text" value="<?php echo Text::encodeHtml(@$code) ?>" /><?php if ('') { ?><input type="hidden" name="code" value="<?php $code ?>"/><?php } ?></div>
					
				</div>
			</div>
		<div class="bottom"><div class="command "><input type="submit" class="submit ok" value="OK" /></div></div></form>
	