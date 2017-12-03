<!-- Compiling output/output-begin -->
		
		
		<form name=""
      target="_self"
      action="<?php echo OR_ACTION ?>"
      data-method="<?php echo OR_METHOD ?>"
      data-action="<?php echo OR_ACTION ?>"
      data-id="<?php echo OR_ID ?>"
      method="<?php echo OR_METHOD ?>"
      enctype="application/x-www-form-urlencoded"
      class="<?php echo OR_ACTION ?>"
      data-async=""
      data-autosave=""
      onSubmit="formSubmit( $(this) ); return false;"><input type="submit" class="invisible" />
      
<input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo OR_ACTION ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo OR_METHOD ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
<?php
		if	( $conf['interface']['url_sessionid'] )
			echo '<input type="hidden" name="'.session_name().'" value="'.session_id().'" />'."\n";
?>

			<div class="line">
				<div class="label">
					<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('TEMPLATE_NAME')))); ?></span>
					
				</div>
				<div class="input"><!-- Compiling input/input-begin --><?php $a5_class='text';$a5_default='';$a5_type='text';$a5_name='name';$a5_size='';$a5_maxlength='256';$a5_onchange='';$a5_readonly=false;$a5_hint='';$a5_icon=''; ?><?php if ($this->isEditable() && !$this->isEditMode()) $a5_readonly=true;
	  if ($a5_readonly && empty($$a5_name)) $$a5_name = '- '.lang('EMPTY').' -';
      if(!isset($a5_default)) $a5_default='';
      $tmp_value = Text::encodeHtml(isset($$a5_name)?$$a5_name:$a5_default);
?><?php if (!$a5_readonly || $a5_type=='hidden') {
?><div class="<?php echo $a5_type!='hidden'?'inputholder':'inputhidden' ?>"><input<?php if ($a5_readonly) echo ' disabled="true"' ?><?php if ($a5_hint) echo ' data-hint="'.$a5_hint.'"'; ?> id="<?php echo REQUEST_ID ?>_<?php echo $a5_name ?><?php if ($a5_readonly) echo '_disabled' ?>" name="<?php echo $a5_name ?><?php if ($a5_readonly) echo '_disabled' ?>" type="<?php echo $a5_type ?>" maxlength="<?php echo $a5_maxlength ?>" class="<?php echo str_replace(',',' ',$a5_class) ?>" value="<?php echo $tmp_value ?>" /><?php if ($a5_icon) echo '<img src="'.$image_dir.'icon_'.$a5_icon.IMG_ICON_EXT.'" width="16" height="16" />'; ?></div><?php
if	($a5_readonly) {
?><input type="hidden" id="<?php echo REQUEST_ID ?>_<?php echo $a5_name ?>" name="<?php echo $a5_name ?>" value="<?php echo $tmp_value ?>" /><?php
 } } else { ?><a title="<?php echo langHtml('EDIT') ?>" href="<?php echo Html::url($actionName,$subActionName,0,array('mode'=>'edit')) ?>"><span class="<?php echo $a5_class ?>"><?php echo $tmp_value ?></span></a><?php } ?><?php unset($a5_class,$a5_default,$a5_type,$a5_name,$a5_size,$a5_maxlength,$a5_onchange,$a5_readonly,$a5_hint,$a5_icon) ?>
				</div>
			</div>
			<fieldset class="<?php echo '1'?" open":"" ?><?php echo '1'?" show":"" ?>"><div>
			</div></fieldset>
			<div class="line">
				<div class="label">
					<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'file_extension'.'')))); ?></span>
					
				</div>
				<div class="input">
					<a target="_self" data-type="view" data-action="<?php echo OR_ACTION ?>" data-method="extension" data-id="<?php echo OR_ID ?>" href="javascript:void(0);">
						<div class="inputholder">
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities($extension))); ?></span>
							
						</div>
					</a>

					<div class="clickable">
						<a class="action" target="_self" data-type="view" data-action="<?php echo OR_ACTION ?>" data-method="extension" data-id="<?php echo OR_ID ?>" href="javascript:void(0);">
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'edit'.'')))); ?></span>
							
						</a>

					</div>
				</div>
			</div>
			<div class="line">
				<div class="label">
					<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'file_mimetype'.'')))); ?></span>
					
				</div>
				<div class="input">
					<a target="_self" data-action="template" data-method="extension" data-id="<?php echo OR_ID ?>" href="javascript:void(0);">
						<div class="inputholder">
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities($mime_type))); ?></span>
							
						</div>
					</a>

				</div>
			</div>
		
<div class="bottom">
	<div class="command ">
	
		<input type="button" class="submit ok" value="OK" onclick="$(this).closest('div.sheet').find('form').submit(); " />
		
		<!-- Cancel-Button nicht anzeigen, wenn cancel==false. -->	</div>
</div>

</form>
