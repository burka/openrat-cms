
	
		
		
		<form name="" target="_self" action="<?php echo OR_ACTION ?>" data-method="<?php echo OR_METHOD ?>" data-action="<?php echo OR_ACTION ?>" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="<?php echo OR_ACTION ?>" data-async="" data-autosave="" onSubmit="formSubmit( $(this) ); return false;"><input type="submit" class="invisible" /><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo OR_ACTION ?>" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo OR_METHOD ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
			<fieldset class="<?php echo '1'?" open":"" ?><?php echo '1'?" show":"" ?>"><legend><div class="arrow-right closed" /><div class="arrow-down open" /><?php echo lang('options') ?></legend><div>
				<div>
					<span class="text"><?php echo nl2br(encodeHtml(htmlentities(''))); ?></span>
					
					<input  class="radio" type="radio" id="<?php echo REQUEST_ID ?>_type_check_limit" name="type" value="check_limit"<?php if('check_limit'==@$type)echo ' checked="checked"' ?> />
					
					<label for="<?php echo REQUEST_ID ?>_type_check_limit" class="label">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'project_check_limit'.'')))); ?></span>
						
					</label>
				</div>
				<div>
					<span class="text"><?php echo nl2br(encodeHtml(htmlentities(''))); ?></span>
					
					<input  class="radio" type="radio" id="<?php echo REQUEST_ID ?>_type_check_files" name="type" value="check_files"<?php if('check_files'==@$type)echo ' checked="checked"' ?> />
					
					<label for="<?php echo REQUEST_ID ?>_type_check_files" class="label">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'project_check_files'.'')))); ?></span>
						
					</label>
				</div>
			</div></fieldset>
		<div class="bottom"><div class="command "><input type="button" class="submit ok" value="OK" onclick="$(this).closest('div.sheet').find('form').submit(); " /></div></div></form>
	