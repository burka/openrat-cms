
	
		<?php $if2=(config('security','nopublish')); if($if2){?>
			<div class="message warn">
				<span class="help"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_NOPUBLISH_DESC'.'')))); ?></span>
				
			</div>
		<?php } ?>
		<form name="" target="_self" action="<?php echo OR_ACTION ?>" data-method="<?php echo OR_METHOD ?>" data-action="<?php echo OR_ACTION ?>" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="<?php echo OR_ACTION ?>" data-async="1" data-autosave=""><input type="submit" class="invisible" /><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo OR_ACTION ?>" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo OR_METHOD ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
			<fieldset class="<?php echo '1'?" open":"" ?><?php echo '1'?" show":"" ?>"><legend><div class="arrow-right closed" /><div class="arrow-down open" /><?php echo lang('options') ?></legend><div>
				<div class="line">
					<div class="label">
					</div>
					<div class="input">
						<?php { $tmpname     = 'files';$default  = '';$readonly = '';		
		if	( isset($$tmpname) )
			$checked = $$tmpname;
		else
			$checked = $default;

		?><input class="checkbox" type="checkbox" id="<?php echo REQUEST_ID ?>_<?php echo $tmpname ?>" name="<?php echo $tmpname  ?>"  <?php if ($readonly) echo ' disabled="disabled"' ?> value="1" <?php if( $checked ) echo 'checked="checked"' ?> /><?php

		if ( $readonly && $checked )
		{ 
		?><input type="hidden" name="<?php echo $tmpname ?>" value="1" /><?php
		}
		} ?>
						
						<label for="<?php echo REQUEST_ID ?>_files" class="label">
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('global_files')))); ?></span>
							
						</label>
					</div>
				</div>
			</div></fieldset>
		<div class="bottom"><div class="command "><input type="button" class="submit ok" value="OK" /></div></div></form>
	