<!-- Compiling output/output-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><!-- Compiling header/header-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a2_name='';$a2_back=true; ?><?php if(!empty($a2_views)) { ?>
  <div class="headermenu">
    <?php foreach( explode(',',$a2_views) as $a2_tmp_view ) { ?>
  	<div class="toolbar-icon clickable">
    <a href="javascript:void(0);" data-type="dialog" data-name="<?php echo lang('MENU_'.$a2_tmp_view) ?>" data-method="<?php echo $a2_tmp_view ?>">
		  <img src="<?php  echo $image_dir ?>icon/<?php echo $a2_tmp_view ?>.png" title="<?php echo lang('MENU_'.$a2_tmp_view.'_DESC') ?>" /> <?php echo lang('MENU_'.$a2_tmp_view) ?>
		</a>
  </div>
		<?php } ?>
  </div>
<?php } ?>
<?php unset($a2_name,$a2_back) ?>
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
<!-- Compiling part/part-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a3_class='line'; ?><div class="<?php echo $a3_class ?>"><?php unset($a3_class) ?><!-- Compiling part/part-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a4_class='label'; ?><div class="<?php echo $a4_class ?>"><?php unset($a4_class) ?><!-- Compiling text/text-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a5_class='text';$a5_text='GLOBAL_NAME';$a5_escape=true;$a5_cut='both'; ?><?php
		$a5_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a5_class ?>" title="<?php echo $a5_title ?>"><?php
		$langF = $a5_escape?'langHtml':'lang';
		$tmp_text = $langF($a5_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a5_class,$a5_text,$a5_escape,$a5_cut) ?><!-- Compiling part/part-end @ Wed, 29 Nov 2017 00:27:33 +0100 --></div><!-- Compiling part/part-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a4_class='input'; ?><div class="<?php echo $a4_class ?>"><?php unset($a4_class) ?><!-- Compiling input/input-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a5_class='focus';$a5_default='';$a5_type='text';$a5_name='name';$a5_size='';$a5_maxlength='256';$a5_onchange='';$a5_readonly=false;$a5_hint='';$a5_icon=''; ?><?php if ($this->isEditable() && !$this->isEditMode()) $a5_readonly=true;
	  if ($a5_readonly && empty($$a5_name)) $$a5_name = '- '.lang('EMPTY').' -';
      if(!isset($a5_default)) $a5_default='';
      $tmp_value = Text::encodeHtml(isset($$a5_name)?$$a5_name:$a5_default);
?><?php if (!$a5_readonly || $a5_type=='hidden') {
?><div class="<?php echo $a5_type!='hidden'?'inputholder':'inputhidden' ?>"><input<?php if ($a5_readonly) echo ' disabled="true"' ?><?php if ($a5_hint) echo ' data-hint="'.$a5_hint.'"'; ?> id="<?php echo REQUEST_ID ?>_<?php echo $a5_name ?><?php if ($a5_readonly) echo '_disabled' ?>" name="<?php echo $a5_name ?><?php if ($a5_readonly) echo '_disabled' ?>" type="<?php echo $a5_type ?>" maxlength="<?php echo $a5_maxlength ?>" class="<?php echo str_replace(',',' ',$a5_class) ?>" value="<?php echo $tmp_value ?>" /><?php if ($a5_icon) echo '<img src="'.$image_dir.'icon_'.$a5_icon.IMG_ICON_EXT.'" width="16" height="16" />'; ?></div><?php
if	($a5_readonly) {
?><input type="hidden" id="<?php echo REQUEST_ID ?>_<?php echo $a5_name ?>" name="<?php echo $a5_name ?>" value="<?php echo $tmp_value ?>" /><?php
 } } else { ?><a title="<?php echo langHtml('EDIT') ?>" href="<?php echo Html::url($actionName,$subActionName,0,array('mode'=>'edit')) ?>"><span class="<?php echo $a5_class ?>"><?php echo $tmp_value ?></span></a><?php } ?><?php unset($a5_class,$a5_default,$a5_type,$a5_name,$a5_size,$a5_maxlength,$a5_onchange,$a5_readonly,$a5_hint,$a5_icon) ?><!-- Compiling part/part-end @ Wed, 29 Nov 2017 00:27:33 +0100 --></div><!-- Compiling part/part-end @ Wed, 29 Nov 2017 00:27:33 +0100 --></div><!-- Compiling part/part-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a3_class='line'; ?><div class="<?php echo $a3_class ?>"><?php unset($a3_class) ?><!-- Compiling part/part-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a4_class='label'; ?><div class="<?php echo $a4_class ?>"><?php unset($a4_class) ?><!-- Compiling text/text-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a5_class='text';$a5_text='LANGUAGE_ISOCODE';$a5_escape=true;$a5_cut='both'; ?><?php
		$a5_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a5_class ?>" title="<?php echo $a5_title ?>"><?php
		$langF = $a5_escape?'langHtml':'lang';
		$tmp_text = $langF($a5_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a5_class,$a5_text,$a5_escape,$a5_cut) ?><!-- Compiling part/part-end @ Wed, 29 Nov 2017 00:27:33 +0100 --></div><!-- Compiling part/part-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a4_class='input'; ?><div class="<?php echo $a4_class ?>"><?php unset($a4_class) ?><!-- Compiling input/input-begin @ Wed, 29 Nov 2017 00:27:33 +0100 --><?php $a5_class='text';$a5_default='';$a5_type='text';$a5_name='isocode';$a5_size='';$a5_maxlength='256';$a5_onchange='';$a5_readonly=false;$a5_hint='';$a5_icon=''; ?><?php if ($this->isEditable() && !$this->isEditMode()) $a5_readonly=true;
	  if ($a5_readonly && empty($$a5_name)) $$a5_name = '- '.lang('EMPTY').' -';
      if(!isset($a5_default)) $a5_default='';
      $tmp_value = Text::encodeHtml(isset($$a5_name)?$$a5_name:$a5_default);
?><?php if (!$a5_readonly || $a5_type=='hidden') {
?><div class="<?php echo $a5_type!='hidden'?'inputholder':'inputhidden' ?>"><input<?php if ($a5_readonly) echo ' disabled="true"' ?><?php if ($a5_hint) echo ' data-hint="'.$a5_hint.'"'; ?> id="<?php echo REQUEST_ID ?>_<?php echo $a5_name ?><?php if ($a5_readonly) echo '_disabled' ?>" name="<?php echo $a5_name ?><?php if ($a5_readonly) echo '_disabled' ?>" type="<?php echo $a5_type ?>" maxlength="<?php echo $a5_maxlength ?>" class="<?php echo str_replace(',',' ',$a5_class) ?>" value="<?php echo $tmp_value ?>" /><?php if ($a5_icon) echo '<img src="'.$image_dir.'icon_'.$a5_icon.IMG_ICON_EXT.'" width="16" height="16" />'; ?></div><?php
if	($a5_readonly) {
?><input type="hidden" id="<?php echo REQUEST_ID ?>_<?php echo $a5_name ?>" name="<?php echo $a5_name ?>" value="<?php echo $tmp_value ?>" /><?php
 } } else { ?><a title="<?php echo langHtml('EDIT') ?>" href="<?php echo Html::url($actionName,$subActionName,0,array('mode'=>'edit')) ?>"><span class="<?php echo $a5_class ?>"><?php echo $tmp_value ?></span></a><?php } ?><?php unset($a5_class,$a5_default,$a5_type,$a5_name,$a5_size,$a5_maxlength,$a5_onchange,$a5_readonly,$a5_hint,$a5_icon) ?><!-- Compiling part/part-end @ Wed, 29 Nov 2017 00:27:33 +0100 --></div><!-- Compiling part/part-end @ Wed, 29 Nov 2017 00:27:33 +0100 --></div>
		
<div class="bottom">
	<div class="command ">
	
		<input type="button" class="submit ok" value="OK" onclick="$(this).closest('div.sheet').find('form').submit(); " />
		
		<!-- Cancel-Button nicht anzeigen, wenn cancel==false. -->	</div>
</div>

</form>
