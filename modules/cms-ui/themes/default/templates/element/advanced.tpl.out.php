
	
		
		
		<form name="" target="_self" action="<?php echo OR_ACTION ?>" data-method="<?php echo OR_METHOD ?>" data-action="<?php echo OR_ACTION ?>" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="<?php echo OR_ACTION ?>" data-async="" data-autosave="" onSubmit="formSubmit( $(this) ); return false;"><input type="submit" class="invisible" /><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo OR_ACTION ?>" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo OR_METHOD ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
			<fieldset class="<?php echo '1'?" open":"" ?><?php echo '1'?" show":"" ?>"><div>
				<div class="line">
					<div class="label">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('ELEMENT_TYPE')))); ?></span>
						
					</div>
					<div class="input">
						<div class="inputholder"><select  id="<?php echo REQUEST_ID ?>_type" name="type" title="" class=""<?php if (count($types)<=1) echo ' disabled="disabled"'; ?> size=1"><?php include_once( 'modules/template-engine/components/html/selectbox/component-select-box.php') ?><?php component_select_option_list($types,$type,0,1) ?><?php if (count($types)==0) { ?><input type="hidden" name="type" value="" /><?php } ?><?php if (count($types)==1) { ?><input type="hidden" name="type" value="<?php echo array_keys($types)[0] ?>" /><?php } ?>
						</select></div>
					</div>
				</div>
			</div></fieldset>
		<div class="bottom"><div class="command "><input type="button" class="submit ok" value="OK" onclick="$(this).closest('div.sheet').find('form').submit(); " /></div></div></form>
	