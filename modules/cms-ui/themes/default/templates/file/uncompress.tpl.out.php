
	
		<form name="" target="_self" action="<?php echo OR_ACTION ?>" data-method="<?php echo OR_METHOD ?>" data-action="<?php echo OR_ACTION ?>" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="<?php echo OR_ACTION ?>" data-async="" data-autosave="" onSubmit="formSubmit( $(this) ); return false;"><input type="submit" class="invisible" /><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo OR_ACTION ?>" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo OR_METHOD ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
			<fieldset class="<?php echo '1'?" open":"" ?><?php echo '1'?" show":"" ?>"><legend><div class="arrow-right closed" /><div class="arrow-down open" /><?php echo lang('options') ?></legend><div>
			</div></fieldset>
			<div class="line">
				<div class="label">
				</div>
				<div class="input">
					<?php $replace= '1'; ?>
					
					<input  class="radio" type="radio" id="<?php echo REQUEST_ID ?>_replace_1" name="replace" value="1"<?php if('1'==@$replace)echo ' checked="checked"' ?> />
					
					<label for="<?php echo REQUEST_ID ?>_replace_1" class="label">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'replace'.'')))); ?></span>
						
					</label>
					<br/>
					
					<input  class="radio" type="radio" id="<?php echo REQUEST_ID ?>_replace_0" name="replace" value="0"<?php if('0'==@$replace)echo ' checked="checked"' ?> />
					
					<label for="<?php echo REQUEST_ID ?>_replace_0" class="label">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'new'.'')))); ?></span>
						
					</label>
				</div>
			</div>
		<div class="bottom"><div class="command "><input type="button" class="submit ok" value="OK" onclick="$(this).closest('div.sheet').find('form').submit(); " /></div></div></form>
	