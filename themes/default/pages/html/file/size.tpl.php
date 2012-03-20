<?php $a3_name='';$a3_target='_self';$a3_method='post';$a3_enctype='application/x-www-form-urlencoded';$a3_type=''; ?><?php
		$a3_action = $actionName;
		$a3_subaction = $targetSubActionName;
		$a3_id = $this->getRequestId();
	if ($this->isEditable())
	{
		if	($this->isEditMode())
		{
			$a3_method    = 'POST';
		}
		else
		{
			$a3_method    = 'GET';
			$a3_subaction = $subActionName;
		}
	}
	switch( $a3_type )
	{
		case 'upload':
			$a3_tmp_submitFunction = '';
			break;
		default:
			$a3_tmp_submitFunction = 'formSubmit( $(this) ); return false;';
	}
?><form name="<?php echo $a3_name ?>"
      target="<?php echo $a3_target ?>"
      action="<?php echo Html::url( $a3_action,$a3_subaction,$a3_id ) ?>"
      method="<?php echo $a3_method ?>"
      enctype="<?php echo $a3_enctype ?>" style="margin:0px;padding:0px;"
      class="<?php echo $a3_action ?>"
      onSubmit="<?php echo $a3_tmp_submitFunction ?>"><input type="submit" class="invisible" />
<?php if ($this->isEditable() && !$this->isEditMode()) { ?>
<input type="hidden" name="mode" value="edit" />
<?php } ?>
<input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo $this->actionName ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo $this->subActionName ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo $this->getRequestId() ?>" /><?php
		if	( $conf['interface']['url_sessionid'] )
			echo '<input type="hidden" name="'.session_name().'" value="'.session_id().'" />'."\n";
?><?php unset($a3_name,$a3_target,$a3_method,$a3_enctype,$a3_type) ?><?php $a4_widths='5%,40%,55%';$a4_width='70%';$a4_rowclasses='odd,even';$a4_columnclasses='1,2,3'; ?><?php if (false) { ?>
<div class="window">
<div class="title">
		<?php $icon=$actionName; ?>
		<img src="<?php echo $image_dir.'icon_'.$icon.IMG_ICON_EXT ?>" align="left" />
		<?php if ($this->isEditable()) { ?>
  <?php if ($this->isEditMode()) { 
  ?><a href="<?php echo Html::url($actionName,$subActionName,$this->getRequestId()                       ) ?>" accesskey="1" title="<?php echo langHtml('MODE_EDIT_DESC') ?>" class="path" style="text-align:right;font-weight:bold;font-weight:bold;"><img src="<?php echo $image_dir ?>mode-edit.png" style="vertical-align:top; " border="0" /></a> <?php }
   elseif (readonly()) {
  ?><img src="<?php echo $image_dir ?>readonly.png" style="vertical-align:top; " border="0" /> <?php } else {
  ?><a href="<?php echo Html::url($actionName,$subActionName,$this->getRequestId(),array('mode'=>'edit') ) ?>" accesskey="1" title="<?php echo langHtml('MODE_SHOW_DESC') ?>" class="path" style="text-align:right;font-weight:bold;font-weight:bold;"><img src="<?php echo $image_dir ?>readonly.png" style="vertical-align:top; " border="0" /></a> <?php }
  ?><?php } ?>
		<span class="path"><?php echo langHtml($actionName) ?></span>&nbsp;<strong>&rarr;</strong>&nbsp;
		<?php
		if	( !isset($path) || !is_array($path) )
			$path = array();
		foreach( $path as $pathElement)
		{
			extract($pathElement); ?>
			<a javascript:void(0);" onclick="javascript:loadViewByName('<?php echo $view ?>','<?php echo $url ?>'); return false; " title="<?php echo $title ?>" class="path"><?php echo (!empty($key)?langHtml($key):$name) ?></a>
			&nbsp;&rarr;&nbsp;
		<?php } ?>
		<span class="title"><?php echo langHtml(@$windowTitle) ?></span>
		<?php
		if	( isset($notice_status))
		{
			?><img src="<?php echo $image_dir.'notice_'.$notice_status.IMG_ICON_EXT ?>" align="right" /><?php
		}
		?>
		<?php ?>		
    <?php if (isset($windowIcons)) foreach( $windowIcons as $icon )
          {
          	?><a href="<?php echo $icon['url'] ?>" title="<?php echo 'ICON_'.langHtml($menu['type'].'_DESC') ?>"><image border="0" src="<?php echo $image_dir.$icon['type'].IMG_ICON_EXT ?>"></a>&nbsp;<?php
          }
     ?>
</div>
<ul class="menu">
<?php
	if	( !isset($windowMenu) || !is_array($windowMenu) ) $windowMenu = array();
    foreach( $windowMenu as $menu )
          {
          	$tmp_text = langHtml($menu['text']);
          	$tmp_key  = strtoupper(langHtml($menu['key' ]));
			$tmp_pos = strpos(strtolower($tmp_text),strtolower($tmp_key));
			if	( $tmp_pos !== false )
				$tmp_text = substr($tmp_text,0,max($tmp_pos,0)).'<span class="accesskey">'. substr($tmp_text,$tmp_pos,1).'</span>'.substr($tmp_text,$tmp_pos+1);
			$liClass  = (isset($menu['url'])?'':'no').'action'.($this->subActionName==$menu['subaction']?' active':'');
			$icon_url = $image_dir.'icon/'.$menu['subaction'].'.png';
			?><li class="<?php echo $liClass?>"><?php
          	if	( isset($menu['url']) )
          	{
          		$link_url = Html::url($actionName,$menu['subaction'],$this->getRequestId() );
          		?><a href="javascript:void(0);" onclick="javascript:loadSubaction(this,'<?php echo $actionName ?>','<?php echo $menu['subaction'] ?>','<?php echo $this->getRequestId() ?>'); return false; " accesskey="<?php echo $tmp_key ?>" title="<?php echo langHtml($menu['text'].'_DESC') ?>"><img src="<?php echo $icon_url ?>" /><?php echo $tmp_text ?></a><?php
          	}
          	else
          	{
          		?><span><img src="<?php echo $icon_url ?>" /><?php echo $tmp_text ?></span><?php
          	}
          }
          	?></li><?php
          if ( /* Deaktiviert */ false && @$conf['help']['enabled'] )
          	{
             ?><a class="help" href="<?php echo $conf['help']['url'].$actionName.'/'.$subActionName.@$conf['help']['suffix'] ?> " target="_new" title="<?php echo langHtml('MENU_HELP_DESC') ?>"><img src="<?php echo $image_dir.'icon/help.png' ?>" /><?php echo @$conf['help']['only_question_mark']?'?':langHtml('MENU_HELP') ?></a><?php
          	}
          	?><?php
		?>
</ul>
<?php 		global $image_dir; 
      if (isset($notices) && count($notices)>0 )
      { ?>
    	<dl class="notice">
  <?php foreach( $notices as $notice_idx=>$notice ) { ?>
  <?php if ($notice['name']!='') { ?>
    <dt><img src="<?php echo $image_dir.'icon_'.$notice['type'].IMG_ICON_EXT ?>" align="left" /><?php echo $notice['name'] ?></dt>
<?php } ?>
  <dd class="<?php echo $notice['status'] ?>">
    <td style="padding:10px;" width="30px"><img src="<?php echo $image_dir.'notice_'.$notice['status'].IMG_ICON_EXT ?>" style="padding:10px" /></td>
    <td style="padding:10px;padding-right:10px;padding-bottom:10px;"><?php if ($notice['status']=='error') { ?><strong><?php } ?><?php echo langHtml($notice['key'],$notice['vars']) ?><?php if ($notice['status']=='error') { ?></strong><?php } ?>
    <?php if (!empty($notice['log'])) { ?><pre><?php echo htmlentities(implode("\n",$notice['log'])) ?></pre><?php } ?>
    </td>
  </dd>
  <?php } ?>
    </dl>
<?php } ?>
<div class="content"><div class="filler">
<?php } ?><?php unset($a4_widths,$a4_width,$a4_rowclasses,$a4_columnclasses) ?><?php
	$column_idx = 0;
?>
<tr
>
<?php $a6_colspan='2';$a6_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
 colspan="2"
><?php unset($a6_colspan,$a6_header) ?><?php $a7_class='text';$a7_text='IMAGE_OLD_SIZE';$a7_escape=true;$a7_cut='both'; ?><?php
		$a7_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a7_class ?>" title="<?php echo $a7_title ?>"><?php
		$langF = $a7_escape?'langHtml':'lang';
		$tmp_text = $langF($a7_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a7_class,$a7_text,$a7_escape,$a7_cut) ?></td><?php $a6_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a6_header) ?><?php $a7_class='text';$a7_var='width';$a7_escape=true;$a7_cut='both'; ?><?php
		$a7_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a7_class ?>" title="<?php echo $a7_title ?>"><?php
		$langF = $a7_escape?'langHtml':'lang';
		$tmp_text = isset($$a7_var)?$$a7_var:$langF('UNKNOWN');
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a7_class,$a7_var,$a7_escape,$a7_cut) ?><?php $a7_class='text';$a7_raw='_*_';$a7_escape=true;$a7_cut='both'; ?><?php
		$a7_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a7_class ?>" title="<?php echo $a7_title ?>"><?php
		$langF = $a7_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$a7_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a7_class,$a7_raw,$a7_escape,$a7_cut) ?><?php $a7_class='text';$a7_var='height';$a7_escape=true;$a7_cut='both'; ?><?php
		$a7_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a7_class ?>" title="<?php echo $a7_title ?>"><?php
		$langF = $a7_escape?'langHtml':'lang';
		$tmp_text = isset($$a7_var)?$$a7_var:$langF('UNKNOWN');
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a7_class,$a7_var,$a7_escape,$a7_cut) ?></td></tr><?php $a5_not='';$a5_empty='formats'; ?><?php 
	if	( !isset($$a5_empty) )
		$a5_tmp_exec = empty($a5_empty);
	elseif	( is_array($$a5_empty) )
		$a5_tmp_exec = (count($$a5_empty)==0);
	elseif	( is_bool($$a5_empty) )
		$a5_tmp_exec = true;
	else
		$a5_tmp_exec = empty( $$a5_empty );
	$a5_tmp_exec = !$a5_tmp_exec;
	$a5_tmp_last_exec = $a5_tmp_exec;
	if	( $a5_tmp_exec )
	{
?>
<?php unset($a5_not,$a5_empty) ?><?php $a6_true=$mode=="edit"; ?><?php 
	if	(gettype($a6_true) === '' && gettype($a6_true) === '1')
		$a6_tmp_exec = $$a6_true == true;
	else
		$a6_tmp_exec = $a6_true == true;
	$a6_tmp_last_exec = $a6_tmp_exec;
	if	( $a6_tmp_exec )
	{
?>
<?php unset($a6_true) ?><?php
	$column_idx = 0;
?>
<tr
>
<?php $a8_colspan='3';$a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
 colspan="3"
><?php unset($a8_colspan,$a8_header) ?><?php $a9_title=lang('IMAGE_NEW_SIZE'); ?><fieldset><?php if(isset($a9_title)) { ?><legend><?php if(isset($a9_icon)) { ?><img src="<?php echo $image_dir.'icon_'.$a9_icon.IMG_ICON_EXT ?>" align="left" border="0" /><?php } ?>&nbsp;&nbsp;<?php echo encodeHtml($a9_title) ?>&nbsp;&nbsp;</legend><?php } ?><?php unset($a9_title) ?></fieldset></td></tr><?php
	$column_idx = 0;
?>
<tr
>
<?php $a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a8_header) ?><?php $a9_readonly=false;$a9_name='type';$a9_value='factor';$a9_default=false;$a9_prefix='';$a9_suffix='';$a9_class='';$a9_onchange=''; ?><?php
		if ($this->isEditable() && !$this->isEditMode()) $a9_readonly=true;
		if	( isset($$a9_name)  )
			$a9_tmp_default = $$a9_name;
		elseif ( isset($a9_default) )
			$a9_tmp_default = $a9_default;
		else
			$a9_tmp_default = '';
 ?><input onclick="" class="radio" type="radio" id="id_<?php echo $a9_name.'_'.$a9_value ?>"  name="<?php echo $a9_prefix.$a9_name ?>"<?php if ( $a9_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $a9_value ?>" <?php if($a9_value==$a9_tmp_default) echo 'checked="checked"' ?><?php if (in_array($a9_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> />
<?php /* #END-IF# */ ?><?php unset($a9_readonly,$a9_name,$a9_value,$a9_default,$a9_prefix,$a9_suffix,$a9_class,$a9_onchange) ?></td><?php $a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a8_header) ?><?php $a9_for='type_factor'; ?><label<?php if (isset($a9_for)) { ?> for="id_<?php echo $a9_for ?><?php if (!empty($a9_value)) echo '_'.$a9_value ?>" class="label"<?php } ?>>
<?php if (isset($a9_key)) { echo lang($a9_key); if(hasLang($a9_key.'_desc')) { ?><div class="description"><?php echo lang($a9_key.'_desc')?></div> <?php } } ?><?php unset($a9_for) ?><?php $a10_class='text';$a10_text='FILE_IMAGE_SIZE_FACTOR';$a10_escape=true;$a10_cut='both'; ?><?php
		$a10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a10_class ?>" title="<?php echo $a10_title ?>"><?php
		$langF = $a10_escape?'langHtml':'lang';
		$tmp_text = $langF($a10_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a10_class,$a10_text,$a10_escape,$a10_cut) ?></label></td><?php $a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a8_header) ?><?php $a9_list='factors';$a9_name='factor';$a9_onchange='';$a9_title='';$a9_class='';$a9_addempty=false;$a9_multiple=false;$a9_size='1';$a9_lang=false; ?><?php
$a9_readonly=false;
$a9_tmp_list = $$a9_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$a9_name)?'- '.lang('EMPTY').' -':$a9_tmp_list[$$a9_name];
}
else
{
if ( $a9_addempty!==FALSE  )
{
	if ($a9_addempty===TRUE)
		$a9_tmp_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$a9_tmp_list;
	else
		$a9_tmp_list = array(''=>'- '.lang($a9_addempty).' -')+$a9_tmp_list;
}
?><select<?php if ($a9_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $a9_name ?>"  name="<?php echo $a9_name; if ($a9_multiple) echo '[]'; ?>" onchange="<?php echo $a9_onchange ?>" title="<?php echo $a9_title ?>" class="<?php echo $a9_class ?>"<?php
if (count($$a9_list)<=1) echo ' disabled="disabled"';
if	($a9_multiple) echo ' multiple="multiple"';
if (in_array($a9_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($a9_size).'"';
?>><?php
		if	( isset($$a9_name) && isset($a9_tmp_list[$$a9_name]) )
			$a9_tmp_default = $$a9_name;
		elseif ( isset($a9_default) )
			$a9_tmp_default = $a9_default;
		else
			$a9_tmp_default = '';
		foreach( $a9_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $a9_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$a9_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ((string)$box_key==$a9_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$a9_list)==0) echo '<input type="hidden" name="'.$a9_name.'" value="" />';
if (count($$a9_list)==1) echo '<input type="hidden" name="'.$a9_name.'" value="'.$box_key.'" />';
}
?><?php unset($a9_list,$a9_name,$a9_onchange,$a9_title,$a9_class,$a9_addempty,$a9_multiple,$a9_size,$a9_lang) ?><?php $a9_var='factor';$a9_value='1'; ?><?php
	if (isset($a9_key))
		$$a9_var = $a9_value[$a9_key];
	else
		$$a9_var = $a9_value;
?><?php unset($a9_var,$a9_value) ?></td></tr><?php
	$column_idx = 0;
?>
<tr
>
<?php $a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a8_header) ?><?php $a9_readonly=false;$a9_name='type';$a9_value='input';$a9_default=false;$a9_prefix='';$a9_suffix='';$a9_class='';$a9_onchange=''; ?><?php
		if ($this->isEditable() && !$this->isEditMode()) $a9_readonly=true;
		if	( isset($$a9_name)  )
			$a9_tmp_default = $$a9_name;
		elseif ( isset($a9_default) )
			$a9_tmp_default = $a9_default;
		else
			$a9_tmp_default = '';
 ?><input onclick="" class="radio" type="radio" id="id_<?php echo $a9_name.'_'.$a9_value ?>"  name="<?php echo $a9_prefix.$a9_name ?>"<?php if ( $a9_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $a9_value ?>" <?php if($a9_value==$a9_tmp_default) echo 'checked="checked"' ?><?php if (in_array($a9_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> />
<?php /* #END-IF# */ ?><?php unset($a9_readonly,$a9_name,$a9_value,$a9_default,$a9_prefix,$a9_suffix,$a9_class,$a9_onchange) ?></td><?php $a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a8_header) ?><?php $a9_for='type_input'; ?><label<?php if (isset($a9_for)) { ?> for="id_<?php echo $a9_for ?><?php if (!empty($a9_value)) echo '_'.$a9_value ?>" class="label"<?php } ?>>
<?php if (isset($a9_key)) { echo lang($a9_key); if(hasLang($a9_key.'_desc')) { ?><div class="description"><?php echo lang($a9_key.'_desc')?></div> <?php } } ?><?php unset($a9_for) ?><?php $a10_class='text';$a10_text='FILE_IMAGE_NEW_WIDTH_HEIGHT';$a10_escape=true;$a10_cut='both'; ?><?php
		$a10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a10_class ?>" title="<?php echo $a10_title ?>"><?php
		$langF = $a10_escape?'langHtml':'lang';
		$tmp_text = $langF($a10_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a10_class,$a10_text,$a10_escape,$a10_cut) ?></label></td><?php $a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a8_header) ?><?php $a9_class='text';$a9_default='';$a9_type='text';$a9_name='width';$a9_size='10';$a9_maxlength='256';$a9_onchange='';$a9_readonly=false; ?><?php if ($this->isEditable() && !$this->isEditMode()) $a9_readonly=true;
	  if ($a9_readonly && empty($$a9_name)) $$a9_name = '- '.lang('EMPTY').' -';
      if(!isset($a9_default)) $a9_default='';
      $tmp_value = Text::encodeHtml(isset($$a9_name)?$$a9_name:$a9_default);
?><?php if (!$a9_readonly || $a9_type=='hidden') {
?><input<?php if ($a9_readonly) echo ' disabled="true"' ?> id="id_<?php echo $a9_name ?><?php if ($a9_readonly) echo '_disabled' ?>" name="<?php echo $a9_name ?><?php if ($a9_readonly) echo '_disabled' ?>" type="<?php echo $a9_type ?>" maxlength="<?php echo $a9_maxlength ?>" class="<?php echo str_replace(',',' ',$a9_class) ?>" value="<?php echo $tmp_value ?>" <?php if (in_array($a9_name,$errors)) echo 'style="border:2px dashed red;"' ?> /><?php
if	($a9_readonly) {
?><input type="hidden" id="id_<?php echo $a9_name ?>" name="<?php echo $a9_name ?>" value="<?php echo $tmp_value ?>" /><?php
 } } else { ?><a title="<?php echo langHtml('EDIT') ?>" href="<?php echo Html::url($actionName,$subactionName,0,array('mode'=>'edit')) ?>"><span class="<?php echo $a9_class ?>"><?php echo $tmp_value ?></span></a><?php } ?><?php unset($a9_class,$a9_default,$a9_type,$a9_name,$a9_size,$a9_maxlength,$a9_onchange,$a9_readonly) ?><?php $a9_class='text';$a9_raw='_*_';$a9_escape=true;$a9_cut='both'; ?><?php
		$a9_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a9_class ?>" title="<?php echo $a9_title ?>"><?php
		$langF = $a9_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$a9_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a9_class,$a9_raw,$a9_escape,$a9_cut) ?><?php $a9_class='text';$a9_default='';$a9_type='text';$a9_name='height';$a9_size='10';$a9_maxlength='256';$a9_onchange='';$a9_readonly=false; ?><?php if ($this->isEditable() && !$this->isEditMode()) $a9_readonly=true;
	  if ($a9_readonly && empty($$a9_name)) $$a9_name = '- '.lang('EMPTY').' -';
      if(!isset($a9_default)) $a9_default='';
      $tmp_value = Text::encodeHtml(isset($$a9_name)?$$a9_name:$a9_default);
?><?php if (!$a9_readonly || $a9_type=='hidden') {
?><input<?php if ($a9_readonly) echo ' disabled="true"' ?> id="id_<?php echo $a9_name ?><?php if ($a9_readonly) echo '_disabled' ?>" name="<?php echo $a9_name ?><?php if ($a9_readonly) echo '_disabled' ?>" type="<?php echo $a9_type ?>" maxlength="<?php echo $a9_maxlength ?>" class="<?php echo str_replace(',',' ',$a9_class) ?>" value="<?php echo $tmp_value ?>" <?php if (in_array($a9_name,$errors)) echo 'style="border:2px dashed red;"' ?> /><?php
if	($a9_readonly) {
?><input type="hidden" id="id_<?php echo $a9_name ?>" name="<?php echo $a9_name ?>" value="<?php echo $tmp_value ?>" /><?php
 } } else { ?><a title="<?php echo langHtml('EDIT') ?>" href="<?php echo Html::url($actionName,$subactionName,0,array('mode'=>'edit')) ?>"><span class="<?php echo $a9_class ?>"><?php echo $tmp_value ?></span></a><?php } ?><?php unset($a9_class,$a9_default,$a9_type,$a9_name,$a9_size,$a9_maxlength,$a9_onchange,$a9_readonly) ?></td></tr><?php
	$column_idx = 0;
?>
<tr
>
<?php $a8_colspan='3';$a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
 colspan="3"
><?php unset($a8_colspan,$a8_header) ?><?php $a9_title=lang('options'); ?><fieldset><?php if(isset($a9_title)) { ?><legend><?php if(isset($a9_icon)) { ?><img src="<?php echo $image_dir.'icon_'.$a9_icon.IMG_ICON_EXT ?>" align="left" border="0" /><?php } ?>&nbsp;&nbsp;<?php echo encodeHtml($a9_title) ?>&nbsp;&nbsp;</legend><?php } ?><?php unset($a9_title) ?></fieldset></td></tr><?php
	$column_idx = 0;
?>
<tr
>
<?php $a8_colspan='2';$a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
 colspan="2"
><?php unset($a8_colspan,$a8_header) ?><?php $a9_for='format'; ?><label<?php if (isset($a9_for)) { ?> for="id_<?php echo $a9_for ?><?php if (!empty($a9_value)) echo '_'.$a9_value ?>" class="label"<?php } ?>>
<?php if (isset($a9_key)) { echo lang($a9_key); if(hasLang($a9_key.'_desc')) { ?><div class="description"><?php echo lang($a9_key.'_desc')?></div> <?php } } ?><?php unset($a9_for) ?><?php $a10_class='text';$a10_text='FILE_IMAGE_FORMAT';$a10_escape=true;$a10_cut='both'; ?><?php
		$a10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a10_class ?>" title="<?php echo $a10_title ?>"><?php
		$langF = $a10_escape?'langHtml':'lang';
		$tmp_text = $langF($a10_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a10_class,$a10_text,$a10_escape,$a10_cut) ?></label></td><?php $a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a8_header) ?><?php $a9_list='formats';$a9_name='format';$a9_onchange='';$a9_title='';$a9_class='';$a9_addempty=false;$a9_multiple=false;$a9_size='1';$a9_lang=false; ?><?php
$a9_readonly=false;
$a9_tmp_list = $$a9_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$a9_name)?'- '.lang('EMPTY').' -':$a9_tmp_list[$$a9_name];
}
else
{
if ( $a9_addempty!==FALSE  )
{
	if ($a9_addempty===TRUE)
		$a9_tmp_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$a9_tmp_list;
	else
		$a9_tmp_list = array(''=>'- '.lang($a9_addempty).' -')+$a9_tmp_list;
}
?><select<?php if ($a9_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $a9_name ?>"  name="<?php echo $a9_name; if ($a9_multiple) echo '[]'; ?>" onchange="<?php echo $a9_onchange ?>" title="<?php echo $a9_title ?>" class="<?php echo $a9_class ?>"<?php
if (count($$a9_list)<=1) echo ' disabled="disabled"';
if	($a9_multiple) echo ' multiple="multiple"';
if (in_array($a9_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($a9_size).'"';
?>><?php
		if	( isset($$a9_name) && isset($a9_tmp_list[$$a9_name]) )
			$a9_tmp_default = $$a9_name;
		elseif ( isset($a9_default) )
			$a9_tmp_default = $a9_default;
		else
			$a9_tmp_default = '';
		foreach( $a9_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $a9_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$a9_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ((string)$box_key==$a9_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$a9_list)==0) echo '<input type="hidden" name="'.$a9_name.'" value="" />';
if (count($$a9_list)==1) echo '<input type="hidden" name="'.$a9_name.'" value="'.$box_key.'" />';
}
?><?php unset($a9_list,$a9_name,$a9_onchange,$a9_title,$a9_class,$a9_addempty,$a9_multiple,$a9_size,$a9_lang) ?></td></tr><?php
	$column_idx = 0;
?>
<tr
>
<?php $a8_colspan='2';$a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
 colspan="2"
><?php unset($a8_colspan,$a8_header) ?><?php $a9_for='jpeglist_compression'; ?><label<?php if (isset($a9_for)) { ?> for="id_<?php echo $a9_for ?><?php if (!empty($a9_value)) echo '_'.$a9_value ?>" class="label"<?php } ?>>
<?php if (isset($a9_key)) { echo lang($a9_key); if(hasLang($a9_key.'_desc')) { ?><div class="description"><?php echo lang($a9_key.'_desc')?></div> <?php } } ?><?php unset($a9_for) ?><?php $a10_class='text';$a10_text='FILE_IMAGE_JPEG_COMPRESSION';$a10_escape=true;$a10_cut='both'; ?><?php
		$a10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a10_class ?>" title="<?php echo $a10_title ?>"><?php
		$langF = $a10_escape?'langHtml':'lang';
		$tmp_text = $langF($a10_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a10_class,$a10_text,$a10_escape,$a10_cut) ?></label></td><?php $a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
><?php unset($a8_header) ?><?php $a9_var='jpeg_compression';$a9_value='70'; ?><?php
	if (isset($a9_key))
		$$a9_var = $a9_value[$a9_key];
	else
		$$a9_var = $a9_value;
?><?php unset($a9_var,$a9_value) ?><?php $a9_list='jpeglist';$a9_name='jpeg_compression';$a9_onchange='';$a9_title='';$a9_class='';$a9_addempty=false;$a9_multiple=false;$a9_size='1';$a9_lang=false; ?><?php
$a9_readonly=false;
$a9_tmp_list = $$a9_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$a9_name)?'- '.lang('EMPTY').' -':$a9_tmp_list[$$a9_name];
}
else
{
if ( $a9_addempty!==FALSE  )
{
	if ($a9_addempty===TRUE)
		$a9_tmp_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$a9_tmp_list;
	else
		$a9_tmp_list = array(''=>'- '.lang($a9_addempty).' -')+$a9_tmp_list;
}
?><select<?php if ($a9_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $a9_name ?>"  name="<?php echo $a9_name; if ($a9_multiple) echo '[]'; ?>" onchange="<?php echo $a9_onchange ?>" title="<?php echo $a9_title ?>" class="<?php echo $a9_class ?>"<?php
if (count($$a9_list)<=1) echo ' disabled="disabled"';
if	($a9_multiple) echo ' multiple="multiple"';
if (in_array($a9_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($a9_size).'"';
?>><?php
		if	( isset($$a9_name) && isset($a9_tmp_list[$$a9_name]) )
			$a9_tmp_default = $$a9_name;
		elseif ( isset($a9_default) )
			$a9_tmp_default = $a9_default;
		else
			$a9_tmp_default = '';
		foreach( $a9_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $a9_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$a9_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ((string)$box_key==$a9_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$a9_list)==0) echo '<input type="hidden" name="'.$a9_name.'" value="" />';
if (count($$a9_list)==1) echo '<input type="hidden" name="'.$a9_name.'" value="'.$box_key.'" />';
}
?><?php unset($a9_list,$a9_name,$a9_onchange,$a9_title,$a9_class,$a9_addempty,$a9_multiple,$a9_size,$a9_lang) ?></td></tr><?php
	$column_idx = 0;
?>
<tr
>
<?php $a8_colspan='3';$a8_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
<?php if (!empty($column_classes)) { ?>
 class="<?php echo $column_classes[($column_idx-1)%count($column_classes)] ?>"
<?php } ?>
 colspan="3"
><?php unset($a8_colspan,$a8_header) ?><?php $a9_default=false;$a9_readonly=false;$a9_name='copy'; ?><?php
	if ($this->isEditable() && !$this->isEditMode()) $a9_readonly=true;
	if	( isset($$a9_name) )
		$checked = $$a9_name;
	else
		$checked = $a9_default;
?><input class="checkbox" type="checkbox" id="id_<?php echo $a9_name ?>" name="<?php echo $a9_name  ?>"  <?php if ($a9_readonly) echo ' disabled="disabled"' ?> value="1" <?php if( $checked ) echo 'checked="checked"' ?><?php if (in_array($a9_name,$errors)) echo ' style="background-color:red;"' ?> /><?php
if ( $a9_readonly && $checked )
{ 
?><input type="hidden" name="<?php echo $a9_name ?>" value="1" /><?php
}
?><?php unset($a9_name); unset($a9_readonly); unset($a9_default); ?><?php unset($a9_default,$a9_readonly,$a9_name) ?><?php $a9_for='copy'; ?><label<?php if (isset($a9_for)) { ?> for="id_<?php echo $a9_for ?><?php if (!empty($a9_value)) echo '_'.$a9_value ?>" class="label"<?php } ?>>
<?php if (isset($a9_key)) { echo lang($a9_key); if(hasLang($a9_key.'_desc')) { ?><div class="description"><?php echo lang($a9_key.'_desc')?></div> <?php } } ?><?php unset($a9_for) ?><?php $a10_class='text';$a10_key='copy';$a10_escape=true;$a10_cut='both'; ?><?php
		$a10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $a10_class ?>" title="<?php echo $a10_title ?>"><?php
		$langF = $a10_escape?'langHtml':'lang';
		$tmp_text = $langF($a10_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($a10_class,$a10_key,$a10_escape,$a10_cut) ?></label></td></tr><?php } ?><?php
	$column_idx = 0;
?>
<tr
>
<?php $a7_class='act';$a7_colspan='3';$a7_header=false; ?><?php $column_idx++; ?><td
<?php if (!empty($column_widths)) { ?>
 width="<?php echo $column_widths[($column_idx-1)%count($column_widths)] ?>"
<?php } ?>
 class="act"
 colspan="3"
><?php unset($a7_class,$a7_colspan,$a7_header) ?><?php $a8_type='ok';$a8_class='ok';$a8_value='ok';$a8_text='button_ok'; ?><div class="invisible">
<?php
		if ($this->isEditable() && !$this->isEditMode() && !readonly() )
		{
			$a8_type = ''; // Knopf nicht anzeigen
			?><a class="action" href="<?php echo Html::url($actionName,$subactionName,0,array('mode'=>'edit')) ?>"><span title="<?php echo lang('MODE_EDIT_DESC') ?>"><?php echo langHtml('MODE_EDIT') ?></span></a><?php
		} else
		{
			$a8_type = 'submit';
		}
		$a8_tmp_src  = '';
	if	( !empty($a8_type)) { 
?>
<input type="<?php echo $a8_type ?>"<?php if(isset($a8_src)) { ?> src="<?php $a8_tmp_src ?>"<?php } ?> name="<?php echo $a8_value ?>" class="ok" title="<?php echo lang($a8_text.'_DESC') ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;<?php echo langHtml($a8_text) ?>&nbsp;&nbsp;&nbsp;&nbsp;" /><?php unset($a8_src); ?>
<?php }
		if ($this->isEditable() && $this->isEditMode() )
		{
			?><a class="action" href="<?php echo Html::url($actionName,$subactionName,0,array('mode'=>'')) ?>"><span title="<?php echo lang('CANCEL_DESC') ?>"><?php echo langHtml('CANCEL') ?></span></a><?php
		}
?>
</div><?php unset($a8_type,$a8_class,$a8_value,$a8_text) ?></td></tr><?php } ?><?php if (false) { ?>
</div>
</div>
<div class="bottom">
	<div class="status">
	</div>
	<div class="command">
	<input type="button" value="<?php echo lang('OK') ?>" onclick="formSubmit( $(this),'<?php echo $view ?>');" />
	<input type="cancel" value="<?php echo lang('CANCEL') ?>" />
	</div>
</div>
</div>
<?php if ($showDuration)
      { ?>
<br/>
<center><small>&nbsp;
<?php $dur = time()-START_TIME;
      echo floor($dur/60).':'.str_pad($dur%60,2,'0',STR_PAD_LEFT); ?></small></center>
<?php } ?>
<?php } ?><?php $a4_field='width'; ?><script name="JavaScript" type="text/javascript"><!--
</script>
<?php unset($a4_field) ?></form>
