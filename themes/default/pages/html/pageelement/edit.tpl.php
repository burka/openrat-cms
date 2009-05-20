<?php  $attr1_class='main';  ?><?php
 if (!headers_sent()) header('Content-Type: text/html; charset='.$charset)
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <title><?php echo isset($attr1_title)?$attr1_title.' - ':(isset($windowTitle)?lang($windowTitle).' - ':'') ?><?php echo $cms_title ?></title>
  <meta http-equiv="content-type" content="text/html; charset=<?php echo $charset ?>" >
  <meta name="MSSmartTagsPreventParsing" content="true" >
  <meta name="robots" content="noindex,nofollow" >
<?php if (isset($windowMenu) && is_array($windowMenu)) foreach( $windowMenu as $menu )
      {
       	?>
  <link rel="section" href="<?php echo Html::url($actionName,@$menu['subaction'],$this->getRequestId() ) ?>" title="<?php echo lang($menu['text']) ?>" >
<?php
      }
?><?php if (isset($metaList) && is_array($metaList)) foreach( $metaList as $meta )
      {
       	?>
  <link rel="<?php echo $meta['name'] ?>" href="<?php echo $meta['url'] ?>" title="<?php echo lang($meta['title']) ?>" ><?php
      }
?><?php if(!empty($root_stylesheet)) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $root_stylesheet ?>" >
<?php } ?>
<?php if($root_stylesheet!=$user_stylesheet) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $user_stylesheet ?>" >
<?php } ?>
</head>
<body class="<?php echo $attr1_class ?>" <?php if (@$conf['interface']['application_mode']) { ?> style="padding:0px;margin:0px;"<?php } ?> >
<?php /* Debug-Information */ if ($showDuration) { echo "<!--\n";print_r($this->templateVars);echo "\n-->";} ?><?php unset($attr1_class); ?><?php  $attr2_name='';  $attr2_target='_self';  $attr2_method='post';  $attr2_enctype='application/x-www-form-urlencoded';  ?><?php
		$attr2_action = $actionName;
		$attr2_subaction = $targetSubActionName;
		$attr2_id = $this->getRequestId();
	if ($this->isEditable() && !$this->isEditMode())
		$attr2_subaction = $subActionName;
?><form name="<?php echo $attr2_name ?>"
      target="<?php echo $attr2_target ?>"
      action="<?php echo Html::url( $attr2_action,$attr2_subaction,$attr2_id ) ?>"
      method="<?php echo $attr2_method ?>"
      enctype="<?php echo $attr2_enctype ?>" style="margin:0px;padding:0px;">
<?php if ($this->isEditable() && !$this->isEditMode()) { ?>
<input type="hidden" name="mode" value="edit" />
<?php } ?>
<input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo $attr2_action ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo $attr2_subaction ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo $attr2_id ?>" /><?php
		if	( $conf['interface']['url_sessionid'] )
			echo '<input type="hidden" name="'.session_name().'" value="'.session_id().'" />'."\n";
?><?php unset($attr2_name);unset($attr2_target);unset($attr2_method);unset($attr2_enctype); ?><?php  $attr3_class='text';  $attr3_default='';  $attr3_type='hidden';  $attr3_name='elementid';  $attr3_size='40';  $attr3_maxlength='256';  $attr3_onchange='';  $attr3_readonly=false;  ?><?php if ($this->isEditable() && !$this->isEditMode()) $attr3_readonly=true;
	  if ($attr3_readonly && empty($$attr3_name)) $$attr3_name = '- '.lang('EMPTY').' -';
      if(!isset($attr3_default)) $attr3_default='';
?><?php if (!$attr3_readonly || $attr3_type=='hidden') {
?><input<?php if ($attr3_readonly) echo ' disabled="true"' ?> id="id_<?php echo $attr3_name ?><?php if ($attr3_readonly) echo '_disabled' ?>" name="<?php echo $attr3_name ?><?php if ($attr3_readonly) echo '_disabled' ?>" type="<?php echo $attr3_type ?>" size="<?php echo $attr3_size ?>" maxlength="<?php echo $attr3_maxlength ?>" class="<?php echo $attr3_class ?>" value="<?php echo isset($$attr3_name)?$$attr3_name:$attr3_default ?>" <?php if (in_array($attr3_name,$errors)) echo 'style="border-rightx:10px solid red; background-colorx:yellow; border:2px dashed red;"' ?> /><?php
if	($attr3_readonly) {
?><input type="hidden" id="id_<?php echo $attr3_name ?>" name="<?php echo $attr3_name ?>" value="<?php echo isset($$attr3_name)?$$attr3_name:$attr3_default ?>" /><?php
 } } else { ?><span class="<?php echo $attr3_class ?>"><?php echo isset($$attr3_name)?$$attr3_name:$attr3_default ?></span><?php } ?><?php unset($attr3_class);unset($attr3_default);unset($attr3_type);unset($attr3_name);unset($attr3_size);unset($attr3_maxlength);unset($attr3_onchange);unset($attr3_readonly); ?><?php  $attr3_class='text';  $attr3_default='';  $attr3_type='hidden';  $attr3_name='value_time';  $attr3_size='40';  $attr3_maxlength='256';  $attr3_onchange='';  $attr3_readonly=false;  ?><?php if ($this->isEditable() && !$this->isEditMode()) $attr3_readonly=true;
	  if ($attr3_readonly && empty($$attr3_name)) $$attr3_name = '- '.lang('EMPTY').' -';
      if(!isset($attr3_default)) $attr3_default='';
?><?php if (!$attr3_readonly || $attr3_type=='hidden') {
?><input<?php if ($attr3_readonly) echo ' disabled="true"' ?> id="id_<?php echo $attr3_name ?><?php if ($attr3_readonly) echo '_disabled' ?>" name="<?php echo $attr3_name ?><?php if ($attr3_readonly) echo '_disabled' ?>" type="<?php echo $attr3_type ?>" size="<?php echo $attr3_size ?>" maxlength="<?php echo $attr3_maxlength ?>" class="<?php echo $attr3_class ?>" value="<?php echo isset($$attr3_name)?$$attr3_name:$attr3_default ?>" <?php if (in_array($attr3_name,$errors)) echo 'style="border-rightx:10px solid red; background-colorx:yellow; border:2px dashed red;"' ?> /><?php
if	($attr3_readonly) {
?><input type="hidden" id="id_<?php echo $attr3_name ?>" name="<?php echo $attr3_name ?>" value="<?php echo isset($$attr3_name)?$$attr3_name:$attr3_default ?>" /><?php
 } } else { ?><span class="<?php echo $attr3_class ?>"><?php echo isset($$attr3_name)?$$attr3_name:$attr3_default ?></span><?php } ?><?php unset($attr3_class);unset($attr3_default);unset($attr3_type);unset($attr3_name);unset($attr3_size);unset($attr3_maxlength);unset($attr3_onchange);unset($attr3_readonly); ?><?php  $attr3_name='element';  $attr3_width='93%';  $attr3_rowclasses='odd,even';  $attr3_columnclasses='1,2,3';  ?><?php
	$coloumn_widths=array();
	if	(!empty($attr3_widths))
	{
		$column_widths = explode(',',$attr3_widths);
		unset($attr3['widths']);
	}
	if	(!empty($attr3_rowclasses))
	{
		$row_classes   = explode(',',$attr3_rowclasses);
		$row_class_idx = 999;
		unset($attr3['rowclasses']);
	}
	if	(!empty($attr3_columnclasses))
	{
		$column_classes = explode(',',$attr3_columnclasses);
		unset($attr3['columnclasses']);
	}
		global $image_dir;
		if (@$conf['interface']['application_mode'] )
		{
			echo '<table class="main" cellspacing="0" cellpadding="4" width="100%" style="margin:0px;border:0px; padding:0px;" height_oo="100%">';
		}
		else
		{
			echo '<br/><br/><br/><center>';
			echo '<table class="main" cellspacing="0" cellpadding="4" width="'.$attr3_width.'">';
		}
		if (!@$conf['interface']['application_mode'] )
		{
		echo '<tr><td class="menu">';
		echo '<img src="'.$image_dir.'icon_'.$actionName.IMG_ICON_EXT.'" align="left" border="0">';
		if ($this->isEditable()) { ?>
  <?php if ($this->isEditMode()) { 
  ?><a href="<?php echo Html::url($actionName,$subActionName,$this->getRequestId()                       ) ?>" accesskey="1" title="<?php echo langHtml('MODE_EDIT_DESC') ?>" class="path" style="text-align:right;font-weight:bold;font-weight:bold;"><img src="<?php echo $image_dir ?>mode-edit.png" style="vertical-align:top; " border="0" /></a> <?php } else {
  ?><a href="<?php echo Html::url($actionName,$subActionName,$this->getRequestId(),array('mode'=>'edit') ) ?>" accesskey="1" title="<?php echo langHtml('MODE_SHOW_DESC') ?>" class="path" style="text-align:right;font-weight:bold;font-weight:bold;"><img src="<?php echo $image_dir ?>readonly.png" style="vertical-align:top; " border="0" /></a> <?php }
  ?><?php }
		echo '<span class="path">'.langHtml('GLOBAL_'.$actionName).'</span>&nbsp;<strong>&raquo;</strong>&nbsp;';
		if	( !isset($path) || is_array($path) )
			$path = array();
		foreach( $path as $pathElement)
		{
			extract($pathElement);
			echo '<a href="'.$url.'" class="path">'.langHtml($name).'</a>';
			echo '&nbsp;&raquo;&nbsp;';
		}
		echo '<span class="title">'.langHtml($windowTitle).'</span>';
		?>
		</td>
		<?php
		}
		?>
<?php ?>		<!--<td class="menu" style="align:right;">
    <?php if (isset($windowIcons)) foreach( $windowIcons as $icon )
          {
          	?><a href="<?php echo $icon['url'] ?>" title="<?php echo 'ICON_'.langHtml($menu['type'].'_DESC') ?>"><image border="0" src="<?php echo $image_dir.$icon['type'].IMG_ICON_EXT ?>"></a>&nbsp;<?php
          }
     ?>
    </td>-->
  </tr>
  <tr><td class="subaction">
    <?php if	( !isset($windowMenu) || !is_array($windowMenu) )
			$windowMenu = array();
    foreach( $windowMenu as $menu )
          {
          	$tmp_text = langHtml($menu['text']);
          	$tmp_key  = strtoupper(langHtml($menu['key' ]));
			$tmp_pos = strpos(strtolower($tmp_text),strtolower($tmp_key));
			if	( $tmp_pos !== false )
				$tmp_text = substr($tmp_text,0,max($tmp_pos,0)).'<span class="accesskey">'. substr($tmp_text,$tmp_pos,1).'</span>'.substr($tmp_text,$tmp_pos+1);
          	if	( isset($menu['url']) )
          	{
          		?><a href="<?php echo Html::url($actionName,$menu['subaction'],$this->getRequestId() ) ?>" accesskey="<?php echo $tmp_key ?>" title="<?php echo langHtml($menu['text'].'_DESC') ?>" class="menu<?php echo $this->subActionName==$menu['subaction']?'_highlight':'' ?>"><?php echo $tmp_text ?></a>&nbsp;&nbsp;&nbsp;<?php
          	}
          	else
          	{
          		?><span class="menu_disabled" title="<?php echo langHtml($menu['text'].'_DESC') ?>" class="menu_disabled"><?php echo $tmp_text ?></span>&nbsp;&nbsp;&nbsp;<?php
          	}
          }
          	if (@$conf['help']['enabled'] )
          	{
             ?><a href="<?php echo $conf['help']['url'].$actionName.'/'.$subActionName.@$conf['help']['suffix'] ?> " target="_new" title="<?php echo langHtml('MENU_HELP_DESC') ?>" class="menu" style="cursor:help;"><?php echo @$conf['help']['only_question_mark']?'?':langHtml('MENU_HELP') ?></a><?php
          	}
          	?></td>
  </tr>
<?php if (isset($notices) && count($notices)>0 )
      { ?>
  <tr>
    <td align="center" class="notice">
  <?php foreach( $notices as $notice_idx=>$notice ) { ?>
    	<br><table class="notice" width="80%">
  <?php if ($notice['name']!='') { ?>
  <tr>
    <th colspan="2"><img src="<?php echo $image_dir.'icon_'.$notice['type'].IMG_ICON_EXT ?>" align="left" /><?php echo $notice['name'] ?>
    </th>
  </tr>
<?php } ?>
  <tr class="<?php echo $notice['status'] ?>">
    <td style="padding:10px;" width="30px"><img src="<?php echo $image_dir.'notice_'.$notice['status'].IMG_ICON_EXT ?>" style="padding:10px" /></td>
    <td style="padding:10px;padding-right:10px;padding-bottom:10px;"><?php if ($notice['status']=='error') { ?><strong><?php } ?><?php echo langHtml($notice['key'],$notice['vars']) ?><?php if ($notice['status']=='error') { ?></strong><?php } ?>
    <?php if (!empty($notice['log'])) { ?><pre><?php echo htmlentities(implode("\n",$notice['log'])) ?></pre><?php } ?>
    </td>
  </tr>
    </table>
  <?php } ?>
    </td>
  </tr>
  <tr>
  <td colspan="2"><fieldset></fieldset></td>
  </tr>
<?php } ?>
  <tr>
    <td>
      <table cellspacing="0" width="100%" cellpadding="4">
<?php unset($attr3_name);unset($attr3_width);unset($attr3_rowclasses);unset($attr3_columnclasses); ?><?php  ?><?php
	$attr4_tmp_class='';
	$attr4_last_class = $attr4_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr4_tmp_class));
?><?php  ?><?php  $attr5_class='help';  $attr5_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr5_class))
		$attr5_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr5_rowspan) )
		$attr5_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> class="<?php   echo $attr5_class   ?>" <?php
?> colspan="<?php echo $attr5_colspan ?>" <?php
?>><?php unset($attr5_class);unset($attr5_colspan); ?><?php  $attr6_class='text';  $attr6_var='desc';  $attr6_escape=true;  ?><?php
		$attr6_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr6_class ?>" title="<?php echo $attr6_title ?>"><?php
		$langF = $attr6_escape?'langHtml':'lang';
		$tmp_text = isset($$attr6_var)?$$attr6_var:'?unset:'.$attr6_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr6_class);unset($attr6_var);unset($attr6_escape); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  $attr4_equals='date';  $attr4_value=$type;  ?><?php 
	$attr4_tmp_exec = $attr4_equals == $attr4_value;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_equals);unset($attr4_value); ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  $attr6_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr6_colspan ?>" <?php
?>><?php unset($attr6_colspan); ?><?php  $attr7_title=lang('calendar');  ?><fieldset><?php if(isset($attr7_title)) { ?><legend><?php echo encodeHtml($attr7_title) ?></legend><?php } ?><?php unset($attr7_title); ?><?php  ?></fieldset><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  $attr6_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr6_colspan ?>" <?php
?>><?php unset($attr6_colspan); ?><?php  $attr7_class='calendar';  $attr7_width='85%';  $attr7_space='0px';  $attr7_padding='0px';  ?><?php
	$coloumn_widths = array();
	$row_classes    = array();
	$column_classes = array();
		$column_widths = explode(',',$attr7_widths);
		unset($attr7['widths']);
		$row_classes   = explode(',',$attr7_rowclasses);
		$row_class_idx = 999;
		unset($attr7['rowclasses']);
?><table class="<?php echo $attr7_class ?>" cellspacing="<?php echo $attr7_space ?>" width="<?php echo $attr7_width ?>" cellpadding="<?php echo $attr7_padding ?>"><?php unset($attr7_class);unset($attr7_width);unset($attr7_space);unset($attr7_padding); ?><?php  ?><?php
	$attr8_tmp_class='';
	$attr8_last_class = $attr8_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr8_tmp_class));
?><?php  ?><?php  $attr9_class='help';  $attr9_colspan='8';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr9_class))
		$attr9_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr9_rowspan) )
		$attr9_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> class="<?php   echo $attr9_class   ?>" <?php
?> colspan="<?php echo $attr9_colspan ?>" <?php
?>><?php unset($attr9_class);unset($attr9_colspan); ?><?php  $attr10_true=$mode=="edit";  ?><?php 
	if	(gettype($attr10_true) === '' && gettype($attr10_true) === '1')
		$attr10_tmp_exec = $$attr10_true == true;
	else
		$attr10_tmp_exec = $attr10_true == true;
	$attr10_tmp_last_exec = $attr10_tmp_exec;
	if	( $attr10_tmp_exec )
	{
?>
<?php unset($attr10_true); ?><?php  $attr11_title='';  $attr11_target='_self';  $attr11_url=$lastmonthurl;  $attr11_class='';  ?><?php
	$params = array();
		$tmp_url = $attr11_url;
?><a<?php if (isset($attr11_name)) echo ' name="'.$attr11_name.'"'; else echo ' href="'.$tmp_url.($attr11_anchor?'#'.$attr11_anchor:'').'"' ?> class="<?php echo $attr11_class ?>" target="<?php echo $attr11_target ?>"<?php if (isset($attr11_accesskey)) echo ' accesskey="'.$attr11_accesskey.'"' ?>  title="<?php echo encodeHtml($attr11_title) ?>"><?php unset($attr11_title);unset($attr11_target);unset($attr11_url);unset($attr11_class); ?><?php  $attr12_file='left';  $attr12_align='middle';  ?><?php
	$attr12_tmp_image_file = $image_dir.$attr12_fileext;
	$attr12_tmp_image_file = $image_dir.$attr12_file.IMG_ICON_EXT;
?><img alt="<?php echo basename($attr12_tmp_image_file); echo ' ('; if (isset($attr12_size)) { list($attr12_tmp_width,$attr12_tmp_height)=explode('x',$attr12_size);echo $attr12_tmp_width.'x'.$attr12_tmp_height; echo')';} ?>" src="<?php echo $attr12_tmp_image_file ?>" border="0"<?php if(isset($attr12_align)) echo ' align="'.$attr12_align.'"' ?><?php if (isset($attr12_size)) { list($attr12_tmp_width,$attr12_tmp_height)=explode('x',$attr12_size);echo ' width="'.$attr12_tmp_width.'" height="'.$attr12_tmp_height.'"';} ?>><?php unset($attr12_file);unset($attr12_align); ?><?php  ?></a><?php  ?><?php  $attr11_class='text';  $attr11_raw='_';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  ?><?php } ?><?php  ?><?php  $attr10_class='text';  $attr10_var='monthname';  $attr10_escape=true;  ?><?php
		$attr10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr10_class ?>" title="<?php echo $attr10_title ?>"><?php
		$langF = $attr10_escape?'langHtml':'lang';
		$tmp_text = isset($$attr10_var)?$$attr10_var:'?unset:'.$attr10_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr10_class);unset($attr10_var);unset($attr10_escape); ?><?php  $attr10_true=$mode=="edit";  ?><?php 
	if	(gettype($attr10_true) === '' && gettype($attr10_true) === '1')
		$attr10_tmp_exec = $$attr10_true == true;
	else
		$attr10_tmp_exec = $attr10_true == true;
	$attr10_tmp_last_exec = $attr10_tmp_exec;
	if	( $attr10_tmp_exec )
	{
?>
<?php unset($attr10_true); ?><?php  $attr11_class='text';  $attr11_raw='_';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  $attr11_title='';  $attr11_target='_self';  $attr11_url=$nextmonthurl;  $attr11_class='';  ?><?php
	$params = array();
		$tmp_url = $attr11_url;
?><a<?php if (isset($attr11_name)) echo ' name="'.$attr11_name.'"'; else echo ' href="'.$tmp_url.($attr11_anchor?'#'.$attr11_anchor:'').'"' ?> class="<?php echo $attr11_class ?>" target="<?php echo $attr11_target ?>"<?php if (isset($attr11_accesskey)) echo ' accesskey="'.$attr11_accesskey.'"' ?>  title="<?php echo encodeHtml($attr11_title) ?>"><?php unset($attr11_title);unset($attr11_target);unset($attr11_url);unset($attr11_class); ?><?php  $attr12_file='right';  $attr12_align='middle';  ?><?php
	$attr12_tmp_image_file = $image_dir.$attr12_fileext;
	$attr12_tmp_image_file = $image_dir.$attr12_file.IMG_ICON_EXT;
?><img alt="<?php echo basename($attr12_tmp_image_file); echo ' ('; if (isset($attr12_size)) { list($attr12_tmp_width,$attr12_tmp_height)=explode('x',$attr12_size);echo $attr12_tmp_width.'x'.$attr12_tmp_height; echo')';} ?>" src="<?php echo $attr12_tmp_image_file ?>" border="0"<?php if(isset($attr12_align)) echo ' align="'.$attr12_align.'"' ?><?php if (isset($attr12_size)) { list($attr12_tmp_width,$attr12_tmp_height)=explode('x',$attr12_size);echo ' width="'.$attr12_tmp_width.'" height="'.$attr12_tmp_height.'"';} ?>><?php unset($attr12_file);unset($attr12_align); ?><?php  ?></a><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr10_class='text';  $attr10_raw='_____';  $attr10_escape=true;  ?><?php
		$attr10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr10_class ?>" title="<?php echo $attr10_title ?>"><?php
		$langF = $attr10_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr10_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr10_class);unset($attr10_raw);unset($attr10_escape); ?><?php  $attr10_true=$mode=="edit";  ?><?php 
	if	(gettype($attr10_true) === '' && gettype($attr10_true) === '1')
		$attr10_tmp_exec = $$attr10_true == true;
	else
		$attr10_tmp_exec = $attr10_true == true;
	$attr10_tmp_last_exec = $attr10_tmp_exec;
	if	( $attr10_tmp_exec )
	{
?>
<?php unset($attr10_true); ?><?php  $attr11_title='';  $attr11_target='_self';  $attr11_url=$lastyearurl;  $attr11_class='';  ?><?php
	$params = array();
		$tmp_url = $attr11_url;
?><a<?php if (isset($attr11_name)) echo ' name="'.$attr11_name.'"'; else echo ' href="'.$tmp_url.($attr11_anchor?'#'.$attr11_anchor:'').'"' ?> class="<?php echo $attr11_class ?>" target="<?php echo $attr11_target ?>"<?php if (isset($attr11_accesskey)) echo ' accesskey="'.$attr11_accesskey.'"' ?>  title="<?php echo encodeHtml($attr11_title) ?>"><?php unset($attr11_title);unset($attr11_target);unset($attr11_url);unset($attr11_class); ?><?php  $attr12_file='left';  $attr12_align='middle';  ?><?php
	$attr12_tmp_image_file = $image_dir.$attr12_fileext;
	$attr12_tmp_image_file = $image_dir.$attr12_file.IMG_ICON_EXT;
?><img alt="<?php echo basename($attr12_tmp_image_file); echo ' ('; if (isset($attr12_size)) { list($attr12_tmp_width,$attr12_tmp_height)=explode('x',$attr12_size);echo $attr12_tmp_width.'x'.$attr12_tmp_height; echo')';} ?>" src="<?php echo $attr12_tmp_image_file ?>" border="0"<?php if(isset($attr12_align)) echo ' align="'.$attr12_align.'"' ?><?php if (isset($attr12_size)) { list($attr12_tmp_width,$attr12_tmp_height)=explode('x',$attr12_size);echo ' width="'.$attr12_tmp_width.'" height="'.$attr12_tmp_height.'"';} ?>><?php unset($attr12_file);unset($attr12_align); ?><?php  ?></a><?php  ?><?php  $attr11_class='text';  $attr11_raw='_';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  ?><?php } ?><?php  ?><?php  $attr10_class='text';  $attr10_var='yearname';  $attr10_escape=true;  ?><?php
		$attr10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr10_class ?>" title="<?php echo $attr10_title ?>"><?php
		$langF = $attr10_escape?'langHtml':'lang';
		$tmp_text = isset($$attr10_var)?$$attr10_var:'?unset:'.$attr10_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr10_class);unset($attr10_var);unset($attr10_escape); ?><?php  $attr10_true=$mode=="edit";  ?><?php 
	if	(gettype($attr10_true) === '' && gettype($attr10_true) === '1')
		$attr10_tmp_exec = $$attr10_true == true;
	else
		$attr10_tmp_exec = $attr10_true == true;
	$attr10_tmp_last_exec = $attr10_tmp_exec;
	if	( $attr10_tmp_exec )
	{
?>
<?php unset($attr10_true); ?><?php  $attr11_class='text';  $attr11_raw='_';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  $attr11_title='';  $attr11_target='_self';  $attr11_url=$nextyearurl;  $attr11_class='';  ?><?php
	$params = array();
		$tmp_url = $attr11_url;
?><a<?php if (isset($attr11_name)) echo ' name="'.$attr11_name.'"'; else echo ' href="'.$tmp_url.($attr11_anchor?'#'.$attr11_anchor:'').'"' ?> class="<?php echo $attr11_class ?>" target="<?php echo $attr11_target ?>"<?php if (isset($attr11_accesskey)) echo ' accesskey="'.$attr11_accesskey.'"' ?>  title="<?php echo encodeHtml($attr11_title) ?>"><?php unset($attr11_title);unset($attr11_target);unset($attr11_url);unset($attr11_class); ?><?php  $attr12_file='right';  $attr12_align='middle';  ?><?php
	$attr12_tmp_image_file = $image_dir.$attr12_fileext;
	$attr12_tmp_image_file = $image_dir.$attr12_file.IMG_ICON_EXT;
?><img alt="<?php echo basename($attr12_tmp_image_file); echo ' ('; if (isset($attr12_size)) { list($attr12_tmp_width,$attr12_tmp_height)=explode('x',$attr12_size);echo $attr12_tmp_width.'x'.$attr12_tmp_height; echo')';} ?>" src="<?php echo $attr12_tmp_image_file ?>" border="0"<?php if(isset($attr12_align)) echo ' align="'.$attr12_align.'"' ?><?php if (isset($attr12_size)) { list($attr12_tmp_width,$attr12_tmp_height)=explode('x',$attr12_size);echo ' width="'.$attr12_tmp_width.'" height="'.$attr12_tmp_height.'"';} ?>><?php unset($attr12_file);unset($attr12_align); ?><?php  ?></a><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$attr8_tmp_class='';
	$attr8_last_class = $attr8_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr8_tmp_class));
?><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr9_class))
		$attr9_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr9_rowspan) )
		$attr9_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr10_class='text';  $attr10_key='week';  $attr10_escape=true;  ?><?php
		$attr10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr10_class ?>" title="<?php echo $attr10_title ?>"><?php
		$langF = $attr10_escape?'langHtml':'lang';
		$tmp_text = $langF($attr10_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr10_class);unset($attr10_key);unset($attr10_escape); ?><?php  ?></td><?php  ?><?php  $attr9_list='weekdays';  $attr9_extract=false;  $attr9_key='list_key';  $attr9_value='weekday';  ?><?php
	$attr9_list_tmp_key   = $attr9_key;
	$attr9_list_tmp_value = $attr9_value;
	$attr9_list_extract   = $attr9_extract;
	unset($attr9_key);
	unset($attr9_value);
	if	( !isset($$attr9_list) || !is_array($$attr9_list) )
		$$attr9_list = array();
	foreach( $$attr9_list as $$attr9_list_tmp_key => $$attr9_list_tmp_value )
	{
		if	( $attr9_list_extract )
		{
			if	( !is_array($$attr9_list_tmp_value) )
			{
				print_r($$attr9_list_tmp_value);
				die( 'not an array at key: '.$$attr9_list_tmp_key );
			}
			extract($$attr9_list_tmp_value);
		}
?><?php unset($attr9_list);unset($attr9_extract);unset($attr9_key);unset($attr9_value); ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr10_class))
		$attr10_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr10_rowspan) )
		$attr10_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr11_class='text';  $attr11_var='weekday';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = isset($$attr11_var)?$$attr11_var:'?unset:'.$attr11_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_var);unset($attr11_escape); ?><?php  ?></td><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?></tr><?php  ?><?php  $attr8_list='weeklist';  $attr8_extract=false;  $attr8_key='weeknr';  $attr8_value='week';  ?><?php
	$attr8_list_tmp_key   = $attr8_key;
	$attr8_list_tmp_value = $attr8_value;
	$attr8_list_extract   = $attr8_extract;
	unset($attr8_key);
	unset($attr8_value);
	if	( !isset($$attr8_list) || !is_array($$attr8_list) )
		$$attr8_list = array();
	foreach( $$attr8_list as $$attr8_list_tmp_key => $$attr8_list_tmp_value )
	{
		if	( $attr8_list_extract )
		{
			if	( !is_array($$attr8_list_tmp_value) )
			{
				print_r($$attr8_list_tmp_value);
				die( 'not an array at key: '.$$attr8_list_tmp_key );
			}
			extract($$attr8_list_tmp_value);
		}
?><?php unset($attr8_list);unset($attr8_extract);unset($attr8_key);unset($attr8_value); ?><?php  ?><?php
	$attr9_tmp_class='';
	$attr9_last_class = $attr9_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr9_tmp_class));
?><?php  ?><?php  $attr10_width='12%';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr10_class))
		$attr10_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr10_rowspan) )
		$attr10_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> width="<?php echo $attr10_width ?>"<?php
?>><?php unset($attr10_width); ?><?php  $attr11_class='text';  $attr11_var='weeknr';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = isset($$attr11_var)?$$attr11_var:'?unset:'.$attr11_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_var);unset($attr11_escape); ?><?php  ?></td><?php  ?><?php  $attr10_list='week';  $attr10_extract=true;  $attr10_key='list_key';  $attr10_value='list_value';  ?><?php
	$attr10_list_tmp_key   = $attr10_key;
	$attr10_list_tmp_value = $attr10_value;
	$attr10_list_extract   = $attr10_extract;
	unset($attr10_key);
	unset($attr10_value);
	if	( !isset($$attr10_list) || !is_array($$attr10_list) )
		$$attr10_list = array();
	foreach( $$attr10_list as $$attr10_list_tmp_key => $$attr10_list_tmp_value )
	{
		if	( $attr10_list_extract )
		{
			if	( !is_array($$attr10_list_tmp_value) )
			{
				print_r($$attr10_list_tmp_value);
				die( 'not an array at key: '.$$attr10_list_tmp_key );
			}
			extract($$attr10_list_tmp_value);
		}
?><?php unset($attr10_list);unset($attr10_extract);unset($attr10_key);unset($attr10_value); ?><?php  $attr11_width='12%';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr11_class))
		$attr11_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr11_rowspan) )
		$attr11_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> width="<?php echo $attr11_width ?>"<?php
?>><?php unset($attr11_width); ?><?php  $attr12_empty='url';  ?><?php 
	if	( !isset($$attr12_empty) )
		$attr12_tmp_exec = empty($attr12_empty);
	elseif	( is_array($$attr12_empty) )
		$attr12_tmp_exec = (count($$attr12_empty)==0);
	elseif	( is_bool($$attr12_empty) )
		$attr12_tmp_exec = true;
	else
		$attr12_tmp_exec = empty( $$attr12_empty );
	$attr12_tmp_last_exec = $attr12_tmp_exec;
	if	( $attr12_tmp_exec )
	{
?>
<?php unset($attr12_empty); ?><?php  $attr13_class='text';  $attr13_raw='__';  $attr13_escape=true;  ?><?php
		$attr13_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr13_class ?>" title="<?php echo $attr13_title ?>"><?php
		$langF = $attr13_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr13_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr13_class);unset($attr13_raw);unset($attr13_escape); ?><?php  $attr13_class='text';  $attr13_var='nr';  $attr13_escape=true;  ?><?php
		$attr13_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr13_class ?>" title="<?php echo $attr13_title ?>"><?php
		$langF = $attr13_escape?'langHtml':'lang';
		$tmp_text = isset($$attr13_var)?$$attr13_var:'?unset:'.$attr13_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr13_class);unset($attr13_var);unset($attr13_escape); ?><?php  $attr13_class='text';  $attr13_raw='__';  $attr13_escape=true;  ?><?php
		$attr13_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr13_class ?>" title="<?php echo $attr13_title ?>"><?php
		$langF = $attr13_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr13_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr13_class);unset($attr13_raw);unset($attr13_escape); ?><?php  ?><?php } ?><?php  ?><?php  $attr12_not=true;  $attr12_empty='url';  ?><?php 
	if	( !isset($$attr12_empty) )
		$attr12_tmp_exec = empty($attr12_empty);
	elseif	( is_array($$attr12_empty) )
		$attr12_tmp_exec = (count($$attr12_empty)==0);
	elseif	( is_bool($$attr12_empty) )
		$attr12_tmp_exec = true;
	else
		$attr12_tmp_exec = empty( $$attr12_empty );
	$attr12_tmp_exec = !$attr12_tmp_exec;
	$attr12_tmp_last_exec = $attr12_tmp_exec;
	if	( $attr12_tmp_exec )
	{
?>
<?php unset($attr12_not);unset($attr12_empty); ?><?php  $attr13_title='';  $attr13_target='_self';  $attr13_url=$url;  $attr13_class='';  ?><?php
	$params = array();
		$tmp_url = $attr13_url;
?><a<?php if (isset($attr13_name)) echo ' name="'.$attr13_name.'"'; else echo ' href="'.$tmp_url.($attr13_anchor?'#'.$attr13_anchor:'').'"' ?> class="<?php echo $attr13_class ?>" target="<?php echo $attr13_target ?>"<?php if (isset($attr13_accesskey)) echo ' accesskey="'.$attr13_accesskey.'"' ?>  title="<?php echo encodeHtml($attr13_title) ?>"><?php unset($attr13_title);unset($attr13_target);unset($attr13_url);unset($attr13_class); ?><?php  $attr14_class='text';  $attr14_raw='__';  $attr14_escape=true;  ?><?php
		$attr14_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr14_class ?>" title="<?php echo $attr14_title ?>"><?php
		$langF = $attr14_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr14_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr14_class);unset($attr14_raw);unset($attr14_escape); ?><?php  $attr14_class='text';  $attr14_var='nr';  $attr14_escape=true;  ?><?php
		$attr14_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr14_class ?>" title="<?php echo $attr14_title ?>"><?php
		$langF = $attr14_escape?'langHtml':'lang';
		$tmp_text = isset($$attr14_var)?$$attr14_var:'?unset:'.$attr14_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr14_class);unset($attr14_var);unset($attr14_escape); ?><?php  $attr14_class='text';  $attr14_raw='__';  $attr14_escape=true;  ?><?php
		$attr14_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr14_class ?>" title="<?php echo $attr14_title ?>"><?php
		$langF = $attr14_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr14_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr14_class);unset($attr14_raw);unset($attr14_escape); ?><?php  ?></a><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr12_true=$today;  ?><?php 
	if	(gettype($attr12_true) === '' && gettype($attr12_true) === '1')
		$attr12_tmp_exec = $$attr12_true == true;
	else
		$attr12_tmp_exec = $attr12_true == true;
	$attr12_tmp_last_exec = $attr12_tmp_exec;
	if	( $attr12_tmp_exec )
	{
?>
<?php unset($attr12_true); ?><?php  $attr13_class='text';  $attr13_raw='*';  $attr13_escape=true;  ?><?php
		$attr13_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr13_class ?>" title="<?php echo $attr13_title ?>"><?php
		$langF = $attr13_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr13_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr13_class);unset($attr13_raw);unset($attr13_escape); ?><?php  ?><?php } ?><?php  ?><?php  ?></td><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?></table><?php  ?><?php  ?></td><?php  ?><?php  ?><?php
	$attr6_tmp_class='';
	$attr6_last_class = $attr6_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr6_tmp_class));
?><?php  ?><?php  $attr7_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr7_colspan ?>" <?php
?>><?php unset($attr7_colspan); ?><?php  $attr8_title=lang('date');  ?><fieldset><?php if(isset($attr8_title)) { ?><legend><?php echo encodeHtml($attr8_title) ?></legend><?php } ?><?php unset($attr8_title); ?><?php  ?></fieldset><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$attr6_tmp_class='';
	$attr6_last_class = $attr6_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr6_tmp_class));
?><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr8_class='text';  $attr8_key='date';  $attr8_escape=true;  ?><?php
		$attr8_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
		$langF = $attr8_escape?'langHtml':'lang';
		$tmp_text = $langF($attr8_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_key);unset($attr8_escape); ?><?php  ?></td><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr8_list='all_years';  $attr8_name='year';  $attr8_onchange='';  $attr8_title='';  $attr8_class='';  $attr8_addempty=false;  $attr8_multiple=false;  $attr8_size='1';  $attr8_lang=false;  ?><?php
$attr8_tmp_list = $$attr8_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr8_name)?'- '.lang('EMPTY').' -':$attr8_tmp_list[$$attr8_name];
}
else
{
if ( $attr8_addempty!==FALSE  )
{
	if ($attr8_addempty===TRUE)
		$$attr8_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr8_list;
	else
		$$attr8_list = array(''=>'- '.lang($attr8_addempty).' -')+$$attr8_list;
}
?><select<?php if ($attr8_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr8_name ?>"  name="<?php echo $attr8_name; if ($attr8_multiple) echo '[]'; ?>" onchange="<?php echo $attr8_onchange ?>" title="<?php echo $attr8_title ?>" class="<?php echo $attr8_class ?>"<?php
if (count($$attr8_list)<=1) echo ' disabled="disabled"';
if	($attr8_multiple) echo ' multiple="multiple"';
if (in_array($attr8_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr8_size).'"';
?>><?php
		if	( isset($$attr8_name) && isset($attr8_tmp_list[$$attr8_name]) )
			$attr8_tmp_default = $$attr8_name;
		elseif ( isset($attr8_default) )
			$attr8_tmp_default = $attr8_default;
		else
			$attr8_tmp_default = '';
		foreach( $attr8_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr8_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr8_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr8_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr8_list)==0) echo '<input type="hidden" name="'.$attr8_name.'" value="" />';
if (count($$attr8_list)==1) echo '<input type="hidden" name="'.$attr8_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr8_list);unset($attr8_name);unset($attr8_onchange);unset($attr8_title);unset($attr8_class);unset($attr8_addempty);unset($attr8_multiple);unset($attr8_size);unset($attr8_lang); ?><?php  $attr8_class='text';  $attr8_raw='_-_';  $attr8_escape=true;  ?><?php
		$attr8_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
		$langF = $attr8_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr8_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_raw);unset($attr8_escape); ?><?php  $attr8_list='all_months';  $attr8_name='month';  $attr8_onchange='';  $attr8_title='';  $attr8_class='';  $attr8_addempty=false;  $attr8_multiple=false;  $attr8_size='1';  $attr8_lang=false;  ?><?php
$attr8_tmp_list = $$attr8_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr8_name)?'- '.lang('EMPTY').' -':$attr8_tmp_list[$$attr8_name];
}
else
{
if ( $attr8_addempty!==FALSE  )
{
	if ($attr8_addempty===TRUE)
		$$attr8_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr8_list;
	else
		$$attr8_list = array(''=>'- '.lang($attr8_addempty).' -')+$$attr8_list;
}
?><select<?php if ($attr8_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr8_name ?>"  name="<?php echo $attr8_name; if ($attr8_multiple) echo '[]'; ?>" onchange="<?php echo $attr8_onchange ?>" title="<?php echo $attr8_title ?>" class="<?php echo $attr8_class ?>"<?php
if (count($$attr8_list)<=1) echo ' disabled="disabled"';
if	($attr8_multiple) echo ' multiple="multiple"';
if (in_array($attr8_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr8_size).'"';
?>><?php
		if	( isset($$attr8_name) && isset($attr8_tmp_list[$$attr8_name]) )
			$attr8_tmp_default = $$attr8_name;
		elseif ( isset($attr8_default) )
			$attr8_tmp_default = $attr8_default;
		else
			$attr8_tmp_default = '';
		foreach( $attr8_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr8_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr8_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr8_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr8_list)==0) echo '<input type="hidden" name="'.$attr8_name.'" value="" />';
if (count($$attr8_list)==1) echo '<input type="hidden" name="'.$attr8_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr8_list);unset($attr8_name);unset($attr8_onchange);unset($attr8_title);unset($attr8_class);unset($attr8_addempty);unset($attr8_multiple);unset($attr8_size);unset($attr8_lang); ?><?php  $attr8_class='text';  $attr8_raw='_-_';  $attr8_escape=true;  ?><?php
		$attr8_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
		$langF = $attr8_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr8_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_raw);unset($attr8_escape); ?><?php  $attr8_list='all_days';  $attr8_name='day';  $attr8_onchange='';  $attr8_title='';  $attr8_class='';  $attr8_addempty=false;  $attr8_multiple=false;  $attr8_size='1';  $attr8_lang=false;  ?><?php
$attr8_tmp_list = $$attr8_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr8_name)?'- '.lang('EMPTY').' -':$attr8_tmp_list[$$attr8_name];
}
else
{
if ( $attr8_addempty!==FALSE  )
{
	if ($attr8_addempty===TRUE)
		$$attr8_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr8_list;
	else
		$$attr8_list = array(''=>'- '.lang($attr8_addempty).' -')+$$attr8_list;
}
?><select<?php if ($attr8_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr8_name ?>"  name="<?php echo $attr8_name; if ($attr8_multiple) echo '[]'; ?>" onchange="<?php echo $attr8_onchange ?>" title="<?php echo $attr8_title ?>" class="<?php echo $attr8_class ?>"<?php
if (count($$attr8_list)<=1) echo ' disabled="disabled"';
if	($attr8_multiple) echo ' multiple="multiple"';
if (in_array($attr8_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr8_size).'"';
?>><?php
		if	( isset($$attr8_name) && isset($attr8_tmp_list[$$attr8_name]) )
			$attr8_tmp_default = $$attr8_name;
		elseif ( isset($attr8_default) )
			$attr8_tmp_default = $attr8_default;
		else
			$attr8_tmp_default = '';
		foreach( $attr8_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr8_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr8_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr8_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr8_list)==0) echo '<input type="hidden" name="'.$attr8_name.'" value="" />';
if (count($$attr8_list)==1) echo '<input type="hidden" name="'.$attr8_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr8_list);unset($attr8_name);unset($attr8_onchange);unset($attr8_title);unset($attr8_class);unset($attr8_addempty);unset($attr8_multiple);unset($attr8_size);unset($attr8_lang); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$attr6_tmp_class='';
	$attr6_last_class = $attr6_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr6_tmp_class));
?><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr8_class='text';  $attr8_key='date_time';  $attr8_escape=true;  ?><?php
		$attr8_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
		$langF = $attr8_escape?'langHtml':'lang';
		$tmp_text = $langF($attr8_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_key);unset($attr8_escape); ?><?php  ?></td><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr8_list='all_hours';  $attr8_name='hour';  $attr8_onchange='';  $attr8_title='';  $attr8_class='';  $attr8_addempty=false;  $attr8_multiple=false;  $attr8_size='1';  $attr8_lang=false;  ?><?php
$attr8_tmp_list = $$attr8_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr8_name)?'- '.lang('EMPTY').' -':$attr8_tmp_list[$$attr8_name];
}
else
{
if ( $attr8_addempty!==FALSE  )
{
	if ($attr8_addempty===TRUE)
		$$attr8_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr8_list;
	else
		$$attr8_list = array(''=>'- '.lang($attr8_addempty).' -')+$$attr8_list;
}
?><select<?php if ($attr8_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr8_name ?>"  name="<?php echo $attr8_name; if ($attr8_multiple) echo '[]'; ?>" onchange="<?php echo $attr8_onchange ?>" title="<?php echo $attr8_title ?>" class="<?php echo $attr8_class ?>"<?php
if (count($$attr8_list)<=1) echo ' disabled="disabled"';
if	($attr8_multiple) echo ' multiple="multiple"';
if (in_array($attr8_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr8_size).'"';
?>><?php
		if	( isset($$attr8_name) && isset($attr8_tmp_list[$$attr8_name]) )
			$attr8_tmp_default = $$attr8_name;
		elseif ( isset($attr8_default) )
			$attr8_tmp_default = $attr8_default;
		else
			$attr8_tmp_default = '';
		foreach( $attr8_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr8_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr8_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr8_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr8_list)==0) echo '<input type="hidden" name="'.$attr8_name.'" value="" />';
if (count($$attr8_list)==1) echo '<input type="hidden" name="'.$attr8_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr8_list);unset($attr8_name);unset($attr8_onchange);unset($attr8_title);unset($attr8_class);unset($attr8_addempty);unset($attr8_multiple);unset($attr8_size);unset($attr8_lang); ?><?php  $attr8_class='text';  $attr8_raw='_-_';  $attr8_escape=true;  ?><?php
		$attr8_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
		$langF = $attr8_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr8_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_raw);unset($attr8_escape); ?><?php  $attr8_list='all_minutes';  $attr8_name='minute';  $attr8_onchange='';  $attr8_title='';  $attr8_class='';  $attr8_addempty=false;  $attr8_multiple=false;  $attr8_size='1';  $attr8_lang=false;  ?><?php
$attr8_tmp_list = $$attr8_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr8_name)?'- '.lang('EMPTY').' -':$attr8_tmp_list[$$attr8_name];
}
else
{
if ( $attr8_addempty!==FALSE  )
{
	if ($attr8_addempty===TRUE)
		$$attr8_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr8_list;
	else
		$$attr8_list = array(''=>'- '.lang($attr8_addempty).' -')+$$attr8_list;
}
?><select<?php if ($attr8_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr8_name ?>"  name="<?php echo $attr8_name; if ($attr8_multiple) echo '[]'; ?>" onchange="<?php echo $attr8_onchange ?>" title="<?php echo $attr8_title ?>" class="<?php echo $attr8_class ?>"<?php
if (count($$attr8_list)<=1) echo ' disabled="disabled"';
if	($attr8_multiple) echo ' multiple="multiple"';
if (in_array($attr8_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr8_size).'"';
?>><?php
		if	( isset($$attr8_name) && isset($attr8_tmp_list[$$attr8_name]) )
			$attr8_tmp_default = $$attr8_name;
		elseif ( isset($attr8_default) )
			$attr8_tmp_default = $attr8_default;
		else
			$attr8_tmp_default = '';
		foreach( $attr8_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr8_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr8_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr8_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr8_list)==0) echo '<input type="hidden" name="'.$attr8_name.'" value="" />';
if (count($$attr8_list)==1) echo '<input type="hidden" name="'.$attr8_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr8_list);unset($attr8_name);unset($attr8_onchange);unset($attr8_title);unset($attr8_class);unset($attr8_addempty);unset($attr8_multiple);unset($attr8_size);unset($attr8_lang); ?><?php  $attr8_class='text';  $attr8_raw='_-_';  $attr8_escape=true;  ?><?php
		$attr8_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
		$langF = $attr8_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr8_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_raw);unset($attr8_escape); ?><?php  $attr8_list='all_seconds';  $attr8_name='second';  $attr8_onchange='';  $attr8_title='';  $attr8_class='';  $attr8_addempty=false;  $attr8_multiple=false;  $attr8_size='1';  $attr8_lang=false;  ?><?php
$attr8_tmp_list = $$attr8_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr8_name)?'- '.lang('EMPTY').' -':$attr8_tmp_list[$$attr8_name];
}
else
{
if ( $attr8_addempty!==FALSE  )
{
	if ($attr8_addempty===TRUE)
		$$attr8_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr8_list;
	else
		$$attr8_list = array(''=>'- '.lang($attr8_addempty).' -')+$$attr8_list;
}
?><select<?php if ($attr8_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr8_name ?>"  name="<?php echo $attr8_name; if ($attr8_multiple) echo '[]'; ?>" onchange="<?php echo $attr8_onchange ?>" title="<?php echo $attr8_title ?>" class="<?php echo $attr8_class ?>"<?php
if (count($$attr8_list)<=1) echo ' disabled="disabled"';
if	($attr8_multiple) echo ' multiple="multiple"';
if (in_array($attr8_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr8_size).'"';
?>><?php
		if	( isset($$attr8_name) && isset($attr8_tmp_list[$$attr8_name]) )
			$attr8_tmp_default = $$attr8_name;
		elseif ( isset($attr8_default) )
			$attr8_tmp_default = $attr8_default;
		else
			$attr8_tmp_default = '';
		foreach( $attr8_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr8_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr8_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr8_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr8_list)==0) echo '<input type="hidden" name="'.$attr8_name.'" value="" />';
if (count($$attr8_list)==1) echo '<input type="hidden" name="'.$attr8_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr8_list);unset($attr8_name);unset($attr8_onchange);unset($attr8_title);unset($attr8_class);unset($attr8_addempty);unset($attr8_multiple);unset($attr8_size);unset($attr8_lang); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_equals='text';  $attr4_value=$type;  ?><?php 
	$attr4_tmp_exec = $attr4_equals == $attr4_value;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_equals);unset($attr4_value); ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  $attr6_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr6_colspan ?>" <?php
?>><?php unset($attr6_colspan); ?><?php  $attr7_class='text';  $attr7_default='';  $attr7_type='text';  $attr7_name='text';  $attr7_size='50';  $attr7_maxlength='255';  $attr7_onchange='';  $attr7_readonly=false;  ?><?php if ($this->isEditable() && !$this->isEditMode()) $attr7_readonly=true;
	  if ($attr7_readonly && empty($$attr7_name)) $$attr7_name = '- '.lang('EMPTY').' -';
      if(!isset($attr7_default)) $attr7_default='';
?><?php if (!$attr7_readonly || $attr7_type=='hidden') {
?><input<?php if ($attr7_readonly) echo ' disabled="true"' ?> id="id_<?php echo $attr7_name ?><?php if ($attr7_readonly) echo '_disabled' ?>" name="<?php echo $attr7_name ?><?php if ($attr7_readonly) echo '_disabled' ?>" type="<?php echo $attr7_type ?>" size="<?php echo $attr7_size ?>" maxlength="<?php echo $attr7_maxlength ?>" class="<?php echo $attr7_class ?>" value="<?php echo isset($$attr7_name)?$$attr7_name:$attr7_default ?>" <?php if (in_array($attr7_name,$errors)) echo 'style="border-rightx:10px solid red; background-colorx:yellow; border:2px dashed red;"' ?> /><?php
if	($attr7_readonly) {
?><input type="hidden" id="id_<?php echo $attr7_name ?>" name="<?php echo $attr7_name ?>" value="<?php echo isset($$attr7_name)?$$attr7_name:$attr7_default ?>" /><?php
 } } else { ?><span class="<?php echo $attr7_class ?>"><?php echo isset($$attr7_name)?$$attr7_name:$attr7_default ?></span><?php } ?><?php unset($attr7_class);unset($attr7_default);unset($attr7_type);unset($attr7_name);unset($attr7_size);unset($attr7_maxlength);unset($attr7_onchange);unset($attr7_readonly); ?><?php  $attr7_field='text';  ?><?php
if (isset($errors[0])) $attr7_field = $errors[0];
?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr7_field ?>.focus();
document.forms[0].<?php echo $attr7_field ?>.select();
</script>
<?php unset($attr7_field); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_equals='longtext';  $attr4_value=$type;  ?><?php 
	$attr4_tmp_exec = $attr4_equals == $attr4_value;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_equals);unset($attr4_value); ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  $attr6_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr6_colspan ?>" <?php
?>><?php unset($attr6_colspan); ?><?php  $attr7_equals='html';  $attr7_value=$editor;  ?><?php 
	$attr7_tmp_exec = $attr7_equals == $attr7_value;
	$attr7_tmp_last_exec = $attr7_tmp_exec;
	if	( $attr7_tmp_exec )
	{
?>
<?php unset($attr7_equals);unset($attr7_value); ?><?php  $attr8_name='text';  $attr8_type='html';  ?><?php
	function checkbox( $name,$value=false,$writable=true,$params=Array() )
	{
		$src = '<input type="checkbox" id="id_'.$name.'" name="'.$name.'"';
		foreach( $params as $name=>$val )
			$src .= " $name=\"$val\"";
		if	( !$writable )
			$src .= ' disabled="disabled"';
		if	( $value )
			$src .= ' value="1" checked="checked"';
		$src .= ' />';
		return $src;
	}
	function selectBox( $name,$values,$default='',$params=Array() )
	{
		if	( ! is_array($values) )
			$values = array($values);
		$src = '<select size="1" name="'.$name.'"';
		foreach( $params as $name=>$value )
			$src .= " $name=\"$value\"";
		$src .= '>';
		foreach( $values as $key=>$value )
		{
			$src .= '<option value="'.$key.'"';
			if ($key == $default)
				$src .= ' selected="selected"';
			$src .= '>'.$value.'</option>';
		}
		$src .= '</select>';
		return $src;
	}
	function add_control($type,$image)
	{
		global $image_dir;
		echo '<td><noscript>'.checkbox($type).'</noscript><label for="id_'.$type.'"><a href="javascript:'.$type.'();" title="'.langHtml('PAGE_EDITOR_ADD_'.$type).'"><img src="'.$image_dir.'/editor/'.$image.'" border"0" /></a></label>';
	}
 ?><?php
switch( $attr8_type )
{
	case 'fckeditor':
	case 'html':
		if	( $this->isEditMode() )
		{
			include('./editor/fckeditor.php');
			$editor = new FCKeditor( $attr8_name ) ;
			$editor->BasePath	= defined('OR_BASE_URL')?slashify(OR_BASE_URL).'editor/':'./editor/';
			$editor->Value = $$attr8_name;
			$editor->Height = '290';
			$editor->Config['CustomConfigurationsPath'] = '../openrat-fckconfig.js';
			$editor->Create();
		}
		else
		{
			echo ($$attr8_name);
		}
		break;
	case 'wiki':
		$conf_tags = $conf['editor']['text-markup'];
		if	( $this->isEditMode() )
		{
		?>
<script name="Javascript" type="text/javascript" src="<?php echo $tpl_dir ?>../../js/editor.js"></script>
<script name="JavaScript" type="text/javascript">
function strong()
{
	insert('<?php echo $attr8_name ?>','<?php echo $conf_tags['strong-begin'] ?>','<?php echo $conf_tags['strong-end'] ?>');
}
function emphatic()
{
	insert('<?php echo $attr8_name ?>','<?php echo $conf_tags['emphatic-begin'] ?>','<?php echo $conf_tags['emphatic-end'] ?>');
}
function link()
{
	objectid = document.forms[0].objectid.value;
	if	(objectid=="" ||objectid=="0"||objectid==null)
		objectid = window.prompt("Id","");
	if	(objectid=="" ||objectid=="0"||objectid==null)
		return;
	insert('<?php echo $attr8_name ?>','"','"<?php echo $conf_tags['linkto'] ?>"'+objectid+'"');
}
function image()
{
	objectid = document.forms[0].objectid.value;
	if	(objectid=="" ||objectid=="0"||objectid==null)
		objectid = window.prompt("Id","");
	if	(objectid=="" ||objectid=="0"||objectid==null)
		return;
	insert('<?php echo $attr8_name ?>','','<?php echo $conf_tags['image-begin'] ?>"'+objectid+'"<?php echo $conf_tags['image-end'] ?>');
}
function list()
{
 	insert('<?php echo $attr8_name ?>',"","\n");
	while( true )
	{
		t = window.prompt('<?php echo langHtml('EDITOR_PROMPT_LIST_ENTRY') ?>','');
		if	( t != '' && t != null )
		 	insert('<?php echo $attr8_name ?>',"<?php echo $conf_tags['list-unnumbered'] ?> "+t+"\n","");
		else
			break;
	}
}
function numlist()
{
	insert('<?php echo $attr8_name ?>',"\n\n<?php echo $conf_tags['list-numbered'] ?> ","\n<?php echo $conf_tags['list-numbered'] ?> \n<?php echo $conf_tags['list-numbered'] ?> \n");
}
function table()
{
	column=1;
	while( true )
	{
		if	( column==1 )
			text='<?php echo langHtml('EDITOR_PROMPT_TABLE_CELL_FIRST_COLUMN') ?>';
		else
			text='<?php echo langHtml('EDITOR_PROMPT_TABLE_CELL') ?>';
		t = window.prompt(text,'');
		if	( t != '' && t != null )
		{
		 	insert('<?php echo $attr8_name ?>',"<?php echo $conf_tags['table-cell-sep'] ?>"+t,"");
		 	column++;
		}
		else
		{
			if (column==1)
			{
				break;
			}
			else
			{
			 	insert('text',"\n","");
			 	column=1;
			 }
		}
	}
}
</script>
    <fieldset><legend><?php echo langHtml('EDITOR') ?></legend></fieldset>
    <table>
      <tr>
      	<td><noscript><input type="text" name="addtext" size="30" /></noscript></td>
        <td><?php add_control('strong'  ,'bold.png'  )?></td>
        <td><?php add_control('emphatic','italic.png') ?></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php add_control('table','table.png') ?></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php add_control('list'   ,'list.png')  ; ?></td>
        <td><?php add_control('numlist','numlist.png') ?></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php add_control('image','image.png') ?></td>
        <td><?php add_control('link' ,'link.png' ) ?></td>
        <td><input name="objectid" size="6" title="<?php echo langHtml('LINK_TO') ?>"></td>
        <td><noscript>&nbsp;&nbsp;<input type="submit" class="submit" name="addmarkup" value="<?php echo langHtml('ADD') ?>"/></noscript></td>
      </tr>
    </table>
    <fieldset><legend><?php echo langHtml('CONTENT') ?></legend></fieldset>
	<textarea name="<?php echo $attr8_name ?>" class="editor" style="width:100%;height:300px;"><?php echo $$attr8_name ?></textarea>
<?php
		}
		else
		{
			$attr8_tmp_text = $$attr8_name;
			if	( !is_array($attr8_tmp_text))
				$attr8_tmp_text = explode("\n",$attr8_tmp_text);
			echo implode('',$attr8_tmp_text);
		}
		break;
	case 'text':
	case 'raw':
		if	( $this->isEditMode() )
			echo '<textarea name="'.$attr8_name.'" class="editor" style="width:100%;height:300px;">'.$$attr8_name.'</textarea>';
		else
			echo nl2br($$attr8_name);
		break;
	case 'dom':
	case 'tree':
		$attr8_tmp_doc = new DocumentElement();
		$attr8_tmp_text = $$attr8_name;
		if	( !is_array($attr8_tmp_text))
			$attr8_tmp_text = explode("\n",$attr8_tmp_text);
		$attr8_tmp_doc->parse($attr8_tmp_text);
		echo $attr8_tmp_doc->render('application/html-dom');
		break;
	default:
		echo "Unknown editor type: ".$attr8_type;
}
?><?php unset($attr8_name);unset($attr8_type); ?><?php  ?><?php } ?><?php  ?><?php  $attr7_equals='wiki';  $attr7_value=$editor;  ?><?php 
	$attr7_tmp_exec = $attr7_equals == $attr7_value;
	$attr7_tmp_last_exec = $attr7_tmp_exec;
	if	( $attr7_tmp_exec )
	{
?>
<?php unset($attr7_equals);unset($attr7_value); ?><?php  $attr8_present='preview';  ?><?php 
	$attr8_tmp_exec = isset($$attr8_present);
	$attr8_tmp_last_exec = $attr8_tmp_exec;
	if	( $attr8_tmp_exec )
	{
?>
<?php unset($attr8_present); ?><?php  $attr9_title=lang('page_preview');  ?><fieldset><?php if(isset($attr9_title)) { ?><legend><?php echo encodeHtml($attr9_title) ?></legend><?php } ?><?php unset($attr9_title); ?><?php  $attr10_class='text';  $attr10_var='preview';  $attr10_escape=false;  ?><?php
		$attr10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr10_class ?>" title="<?php echo $attr10_title ?>"><?php
		$langF = $attr10_escape?'langHtml':'lang';
		$tmp_text = isset($$attr10_var)?$$attr10_var:'?unset:'.$attr10_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr10_class);unset($attr10_var);unset($attr10_escape); ?><?php  ?></fieldset><?php  ?><?php  ?><br/><?php  ?><?php  ?><br/><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr8_present='languagetext';  ?><?php 
	$attr8_tmp_exec = isset($$attr8_present);
	$attr8_tmp_last_exec = $attr8_tmp_exec;
	if	( $attr8_tmp_exec )
	{
?>
<?php unset($attr8_present); ?><?php  $attr9_title=$languagename;  ?><fieldset><?php if(isset($attr9_title)) { ?><legend><?php echo encodeHtml($attr9_title) ?></legend><?php } ?><?php unset($attr9_title); ?><?php  $attr10_class='text';  $attr10_var='languagetext';  $attr10_escape=true;  ?><?php
		$attr10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr10_class ?>" title="<?php echo $attr10_title ?>"><?php
		$langF = $attr10_escape?'langHtml':'lang';
		$tmp_text = isset($$attr10_var)?$$attr10_var:'?unset:'.$attr10_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr10_class);unset($attr10_var);unset($attr10_escape); ?><?php  ?></fieldset><?php  ?><?php  ?><br/><?php  ?><?php  ?><br/><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr8_name='text';  $attr8_type='wiki';  ?><?php
	function checkbox( $name,$value=false,$writable=true,$params=Array() )
	{
		$src = '<input type="checkbox" id="id_'.$name.'" name="'.$name.'"';
		foreach( $params as $name=>$val )
			$src .= " $name=\"$val\"";
		if	( !$writable )
			$src .= ' disabled="disabled"';
		if	( $value )
			$src .= ' value="1" checked="checked"';
		$src .= ' />';
		return $src;
	}
	function selectBox( $name,$values,$default='',$params=Array() )
	{
		if	( ! is_array($values) )
			$values = array($values);
		$src = '<select size="1" name="'.$name.'"';
		foreach( $params as $name=>$value )
			$src .= " $name=\"$value\"";
		$src .= '>';
		foreach( $values as $key=>$value )
		{
			$src .= '<option value="'.$key.'"';
			if ($key == $default)
				$src .= ' selected="selected"';
			$src .= '>'.$value.'</option>';
		}
		$src .= '</select>';
		return $src;
	}
	function add_control($type,$image)
	{
		global $image_dir;
		echo '<td><noscript>'.checkbox($type).'</noscript><label for="id_'.$type.'"><a href="javascript:'.$type.'();" title="'.langHtml('PAGE_EDITOR_ADD_'.$type).'"><img src="'.$image_dir.'/editor/'.$image.'" border"0" /></a></label>';
	}
 ?><?php
switch( $attr8_type )
{
	case 'fckeditor':
	case 'html':
		if	( $this->isEditMode() )
		{
			include('./editor/fckeditor.php');
			$editor = new FCKeditor( $attr8_name ) ;
			$editor->BasePath	= defined('OR_BASE_URL')?slashify(OR_BASE_URL).'editor/':'./editor/';
			$editor->Value = $$attr8_name;
			$editor->Height = '290';
			$editor->Config['CustomConfigurationsPath'] = '../openrat-fckconfig.js';
			$editor->Create();
		}
		else
		{
			echo ($$attr8_name);
		}
		break;
	case 'wiki':
		$conf_tags = $conf['editor']['text-markup'];
		if	( $this->isEditMode() )
		{
		?>
<script name="Javascript" type="text/javascript" src="<?php echo $tpl_dir ?>../../js/editor.js"></script>
<script name="JavaScript" type="text/javascript">
function strong()
{
	insert('<?php echo $attr8_name ?>','<?php echo $conf_tags['strong-begin'] ?>','<?php echo $conf_tags['strong-end'] ?>');
}
function emphatic()
{
	insert('<?php echo $attr8_name ?>','<?php echo $conf_tags['emphatic-begin'] ?>','<?php echo $conf_tags['emphatic-end'] ?>');
}
function link()
{
	objectid = document.forms[0].objectid.value;
	if	(objectid=="" ||objectid=="0"||objectid==null)
		objectid = window.prompt("Id","");
	if	(objectid=="" ||objectid=="0"||objectid==null)
		return;
	insert('<?php echo $attr8_name ?>','"','"<?php echo $conf_tags['linkto'] ?>"'+objectid+'"');
}
function image()
{
	objectid = document.forms[0].objectid.value;
	if	(objectid=="" ||objectid=="0"||objectid==null)
		objectid = window.prompt("Id","");
	if	(objectid=="" ||objectid=="0"||objectid==null)
		return;
	insert('<?php echo $attr8_name ?>','','<?php echo $conf_tags['image-begin'] ?>"'+objectid+'"<?php echo $conf_tags['image-end'] ?>');
}
function list()
{
 	insert('<?php echo $attr8_name ?>',"","\n");
	while( true )
	{
		t = window.prompt('<?php echo langHtml('EDITOR_PROMPT_LIST_ENTRY') ?>','');
		if	( t != '' && t != null )
		 	insert('<?php echo $attr8_name ?>',"<?php echo $conf_tags['list-unnumbered'] ?> "+t+"\n","");
		else
			break;
	}
}
function numlist()
{
	insert('<?php echo $attr8_name ?>',"\n\n<?php echo $conf_tags['list-numbered'] ?> ","\n<?php echo $conf_tags['list-numbered'] ?> \n<?php echo $conf_tags['list-numbered'] ?> \n");
}
function table()
{
	column=1;
	while( true )
	{
		if	( column==1 )
			text='<?php echo langHtml('EDITOR_PROMPT_TABLE_CELL_FIRST_COLUMN') ?>';
		else
			text='<?php echo langHtml('EDITOR_PROMPT_TABLE_CELL') ?>';
		t = window.prompt(text,'');
		if	( t != '' && t != null )
		{
		 	insert('<?php echo $attr8_name ?>',"<?php echo $conf_tags['table-cell-sep'] ?>"+t,"");
		 	column++;
		}
		else
		{
			if (column==1)
			{
				break;
			}
			else
			{
			 	insert('text',"\n","");
			 	column=1;
			 }
		}
	}
}
</script>
    <fieldset><legend><?php echo langHtml('EDITOR') ?></legend></fieldset>
    <table>
      <tr>
      	<td><noscript><input type="text" name="addtext" size="30" /></noscript></td>
        <td><?php add_control('strong'  ,'bold.png'  )?></td>
        <td><?php add_control('emphatic','italic.png') ?></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php add_control('table','table.png') ?></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php add_control('list'   ,'list.png')  ; ?></td>
        <td><?php add_control('numlist','numlist.png') ?></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php add_control('image','image.png') ?></td>
        <td><?php add_control('link' ,'link.png' ) ?></td>
        <td><input name="objectid" size="6" title="<?php echo langHtml('LINK_TO') ?>"></td>
        <td><noscript>&nbsp;&nbsp;<input type="submit" class="submit" name="addmarkup" value="<?php echo langHtml('ADD') ?>"/></noscript></td>
      </tr>
    </table>
    <fieldset><legend><?php echo langHtml('CONTENT') ?></legend></fieldset>
	<textarea name="<?php echo $attr8_name ?>" class="editor" style="width:100%;height:300px;"><?php echo $$attr8_name ?></textarea>
<?php
		}
		else
		{
			$attr8_tmp_text = $$attr8_name;
			if	( !is_array($attr8_tmp_text))
				$attr8_tmp_text = explode("\n",$attr8_tmp_text);
			echo implode('',$attr8_tmp_text);
		}
		break;
	case 'text':
	case 'raw':
		if	( $this->isEditMode() )
			echo '<textarea name="'.$attr8_name.'" class="editor" style="width:100%;height:300px;">'.$$attr8_name.'</textarea>';
		else
			echo nl2br($$attr8_name);
		break;
	case 'dom':
	case 'tree':
		$attr8_tmp_doc = new DocumentElement();
		$attr8_tmp_text = $$attr8_name;
		if	( !is_array($attr8_tmp_text))
			$attr8_tmp_text = explode("\n",$attr8_tmp_text);
		$attr8_tmp_doc->parse($attr8_tmp_text);
		echo $attr8_tmp_doc->render('application/html-dom');
		break;
	default:
		echo "Unknown editor type: ".$attr8_type;
}
?><?php unset($attr8_name);unset($attr8_type); ?><?php  $attr8_true=$mode=="edit";  ?><?php 
	if	(gettype($attr8_true) === '' && gettype($attr8_true) === '1')
		$attr8_tmp_exec = $$attr8_true == true;
	else
		$attr8_tmp_exec = $attr8_true == true;
	$attr8_tmp_last_exec = $attr8_tmp_exec;
	if	( $attr8_tmp_exec )
	{
?>
<?php unset($attr8_true); ?><?php  $attr9_title=lang('help');  ?><fieldset><?php if(isset($attr9_title)) { ?><legend><?php echo encodeHtml($attr9_title) ?></legend><?php } ?><?php unset($attr9_title); ?><?php  ?></fieldset><?php  ?><?php  $attr9_width='100%';  $attr9_space='0px';  $attr9_padding='0px';  ?><?php
	$coloumn_widths = array();
	$row_classes    = array();
	$column_classes = array();
		$attr9_class='';
		$column_widths = explode(',',$attr9_widths);
		unset($attr9['widths']);
?><table class="<?php echo $attr9_class ?>" cellspacing="<?php echo $attr9_space ?>" width="<?php echo $attr9_width ?>" cellpadding="<?php echo $attr9_padding ?>"><?php unset($attr9_width);unset($attr9_space);unset($attr9_padding); ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr10_class))
		$attr10_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr10_rowspan) )
		$attr10_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['strong-begin'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_key='text_markup_strong';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $langF($attr11_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_key);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['strong-end'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  ?><br/><?php  ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['emphatic-begin'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_key='text_markup_emphatic';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $langF($attr11_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_key);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['emphatic-end'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  ?></td><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr10_class))
		$attr10_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr10_rowspan) )
		$attr10_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['list-numbered'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_key='text_markup_numbered_list';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $langF($attr11_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_key);unset($attr11_escape); ?><?php  ?><br/><?php  ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['list-numbered'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_raw='...';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  ?><br/><?php  ?><?php  ?></td><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr10_class))
		$attr10_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr10_rowspan) )
		$attr10_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['list-unnumbered'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_key='text_markup_unnumbered_list';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $langF($attr11_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_key);unset($attr11_escape); ?><?php  ?><br/><?php  ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['list-unnumbered'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_raw='...';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  ?><br/><?php  ?><?php  ?></td><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr10_class))
		$attr10_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr10_rowspan) )
		$attr10_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['table-cell-sep'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_key='text_markup_table';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $langF($attr11_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_key);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['table-cell-sep'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_raw='...';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['table-cell-sep'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_raw='...';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['table-cell-sep'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  ?><br/><?php  ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['table-cell-sep'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_raw='...';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['table-cell-sep'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_raw='...';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['table-cell-sep'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_raw='...';  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = str_replace('_','&nbsp;',$attr11_raw);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_raw);unset($attr11_escape); ?><?php  $attr11_class='text';  $attr11_value=@$conf['editor']['text-markup']['table-cell-sep'];  $attr11_escape=true;  ?><?php
		$attr11_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr11_class ?>" title="<?php echo $attr11_title ?>"><?php
		$langF = $attr11_escape?'langHtml':'lang';
		$tmp_text = $attr11_value;
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr11_class);unset($attr11_value);unset($attr11_escape); ?><?php  ?><br/><?php  ?><?php  ?></td><?php  ?><?php  ?></table><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr7_equals='text';  $attr7_value=$editor;  ?><?php 
	$attr7_tmp_exec = $attr7_equals == $attr7_value;
	$attr7_tmp_last_exec = $attr7_tmp_exec;
	if	( $attr7_tmp_exec )
	{
?>
<?php unset($attr7_equals);unset($attr7_value); ?><?php  $attr8_name='text';  $attr8_rows='25';  $attr8_cols='70';  $attr8_class='longtext';  $attr8_default='';  ?><?php if ($this->isEditable() && !$this->isEditMode()) $attr8_readonly=true;
      if ( !$attr8_readonly) {
?><textarea <?php if ($attr8_readonly) echo ' disabled="true"' ?> class="<?php echo $attr8_class ?>" name="<?php echo $attr8_name ?>" rows="<?php echo $attr8_rows ?>" cols="<?php echo $attr8_cols ?>"><?php echo htmlentities(isset($$attr8_name)?$$attr8_name:$attr8_default) ?></textarea><?php
 } else {
?><span class="<?php echo $attr8_class ?>"><?php echo isset($$attr8_name)?$$attr8_name:$attr8_default ?></span><?php } ?><?php unset($attr8_name);unset($attr8_rows);unset($attr8_cols);unset($attr8_class);unset($attr8_default); ?><?php  $attr8_field='text';  ?><?php
if (isset($errors[0])) $attr8_field = $errors[0];
?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr8_field ?>.focus();
document.forms[0].<?php echo $attr8_field ?>.select();
</script>
<?php unset($attr8_field); ?><?php  ?><?php } ?><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_equals='link';  $attr4_value=$type;  ?><?php 
	$attr4_tmp_exec = $attr4_equals == $attr4_value;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_equals);unset($attr4_value); ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr7_class='text';  $attr7_key='link_target';  $attr7_escape=true;  ?><?php
		$attr7_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr7_class ?>" title="<?php echo $attr7_title ?>"><?php
		$langF = $attr7_escape?'langHtml':'lang';
		$tmp_text = $langF($attr7_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_key);unset($attr7_escape); ?><?php  ?></td><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr7_list='objects';  $attr7_name='linkobjectid';  $attr7_onchange='';  $attr7_title='';  $attr7_class='';  $attr7_addempty=false;  $attr7_multiple=false;  $attr7_size='1';  $attr7_lang=false;  ?><?php
$attr7_tmp_list = $$attr7_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr7_name)?'- '.lang('EMPTY').' -':$attr7_tmp_list[$$attr7_name];
}
else
{
if ( $attr7_addempty!==FALSE  )
{
	if ($attr7_addempty===TRUE)
		$$attr7_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr7_list;
	else
		$$attr7_list = array(''=>'- '.lang($attr7_addempty).' -')+$$attr7_list;
}
?><select<?php if ($attr7_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr7_name ?>"  name="<?php echo $attr7_name; if ($attr7_multiple) echo '[]'; ?>" onchange="<?php echo $attr7_onchange ?>" title="<?php echo $attr7_title ?>" class="<?php echo $attr7_class ?>"<?php
if (count($$attr7_list)<=1) echo ' disabled="disabled"';
if	($attr7_multiple) echo ' multiple="multiple"';
if (in_array($attr7_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr7_size).'"';
?>><?php
		if	( isset($$attr7_name) && isset($attr7_tmp_list[$$attr7_name]) )
			$attr7_tmp_default = $$attr7_name;
		elseif ( isset($attr7_default) )
			$attr7_tmp_default = $attr7_default;
		else
			$attr7_tmp_default = '';
		foreach( $attr7_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr7_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr7_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr7_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr7_list)==0) echo '<input type="hidden" name="'.$attr7_name.'" value="" />';
if (count($$attr7_list)==1) echo '<input type="hidden" name="'.$attr7_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr7_list);unset($attr7_name);unset($attr7_onchange);unset($attr7_title);unset($attr7_class);unset($attr7_addempty);unset($attr7_multiple);unset($attr7_size);unset($attr7_lang); ?><?php  $attr7_field='linkobjectid';  ?><?php
if (isset($errors[0])) $attr7_field = $errors[0];
?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr7_field ?>.focus();
document.forms[0].<?php echo $attr7_field ?>.select();
</script>
<?php unset($attr7_field); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  $attr5_true=$mode=="edit";  ?><?php 
	if	(gettype($attr5_true) === '' && gettype($attr5_true) === '1')
		$attr5_tmp_exec = $$attr5_true == true;
	else
		$attr5_tmp_exec = $attr5_true == true;
	$attr5_tmp_last_exec = $attr5_tmp_exec;
	if	( $attr5_tmp_exec )
	{
?>
<?php unset($attr5_true); ?><?php  ?><?php
	$attr6_tmp_class='';
	$attr6_last_class = $attr6_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr6_tmp_class));
?><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr8_class='text';  $attr8_key='link_url';  $attr8_escape=true;  ?><?php
		$attr8_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
		$langF = $attr8_escape?'langHtml':'lang';
		$tmp_text = $langF($attr8_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_key);unset($attr8_escape); ?><?php  ?></td><?php  ?><?php  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?>><?php  ?><?php  $attr8_class='text';  $attr8_default='';  $attr8_type='text';  $attr8_name='linkurl';  $attr8_size='40';  $attr8_maxlength='256';  $attr8_onchange='';  $attr8_readonly=false;  ?><?php if ($this->isEditable() && !$this->isEditMode()) $attr8_readonly=true;
	  if ($attr8_readonly && empty($$attr8_name)) $$attr8_name = '- '.lang('EMPTY').' -';
      if(!isset($attr8_default)) $attr8_default='';
?><?php if (!$attr8_readonly || $attr8_type=='hidden') {
?><input<?php if ($attr8_readonly) echo ' disabled="true"' ?> id="id_<?php echo $attr8_name ?><?php if ($attr8_readonly) echo '_disabled' ?>" name="<?php echo $attr8_name ?><?php if ($attr8_readonly) echo '_disabled' ?>" type="<?php echo $attr8_type ?>" size="<?php echo $attr8_size ?>" maxlength="<?php echo $attr8_maxlength ?>" class="<?php echo $attr8_class ?>" value="<?php echo isset($$attr8_name)?$$attr8_name:$attr8_default ?>" <?php if (in_array($attr8_name,$errors)) echo 'style="border-rightx:10px solid red; background-colorx:yellow; border:2px dashed red;"' ?> /><?php
if	($attr8_readonly) {
?><input type="hidden" id="id_<?php echo $attr8_name ?>" name="<?php echo $attr8_name ?>" value="<?php echo isset($$attr8_name)?$$attr8_name:$attr8_default ?>" /><?php
 } } else { ?><span class="<?php echo $attr8_class ?>"><?php echo isset($$attr8_name)?$$attr8_name:$attr8_default ?></span><?php } ?><?php unset($attr8_class);unset($attr8_default);unset($attr8_type);unset($attr8_name);unset($attr8_size);unset($attr8_maxlength);unset($attr8_onchange);unset($attr8_readonly); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_equals='list';  $attr4_value=$type;  ?><?php 
	$attr4_tmp_exec = $attr4_equals == $attr4_value;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_equals);unset($attr4_value); ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  $attr6_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr6_colspan ?>" <?php
?>><?php unset($attr6_colspan); ?><?php  $attr7_list='objects';  $attr7_name='linkobjectid';  $attr7_onchange='';  $attr7_title='';  $attr7_class='';  $attr7_addempty=false;  $attr7_multiple=false;  $attr7_size='1';  $attr7_lang=false;  ?><?php
$attr7_tmp_list = $$attr7_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr7_name)?'- '.lang('EMPTY').' -':$attr7_tmp_list[$$attr7_name];
}
else
{
if ( $attr7_addempty!==FALSE  )
{
	if ($attr7_addempty===TRUE)
		$$attr7_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr7_list;
	else
		$$attr7_list = array(''=>'- '.lang($attr7_addempty).' -')+$$attr7_list;
}
?><select<?php if ($attr7_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr7_name ?>"  name="<?php echo $attr7_name; if ($attr7_multiple) echo '[]'; ?>" onchange="<?php echo $attr7_onchange ?>" title="<?php echo $attr7_title ?>" class="<?php echo $attr7_class ?>"<?php
if (count($$attr7_list)<=1) echo ' disabled="disabled"';
if	($attr7_multiple) echo ' multiple="multiple"';
if (in_array($attr7_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr7_size).'"';
?>><?php
		if	( isset($$attr7_name) && isset($attr7_tmp_list[$$attr7_name]) )
			$attr7_tmp_default = $$attr7_name;
		elseif ( isset($attr7_default) )
			$attr7_tmp_default = $attr7_default;
		else
			$attr7_tmp_default = '';
		foreach( $attr7_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr7_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr7_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr7_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr7_list)==0) echo '<input type="hidden" name="'.$attr7_name.'" value="" />';
if (count($$attr7_list)==1) echo '<input type="hidden" name="'.$attr7_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr7_list);unset($attr7_name);unset($attr7_onchange);unset($attr7_title);unset($attr7_class);unset($attr7_addempty);unset($attr7_multiple);unset($attr7_size);unset($attr7_lang); ?><?php  $attr7_field='linkobjectid';  ?><?php
if (isset($errors[0])) $attr7_field = $errors[0];
?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr7_field ?>.focus();
document.forms[0].<?php echo $attr7_field ?>.select();
</script>
<?php unset($attr7_field); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_equals='insert';  $attr4_value=$type;  ?><?php 
	$attr4_tmp_exec = $attr4_equals == $attr4_value;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_equals);unset($attr4_value); ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  $attr6_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr6_colspan ?>" <?php
?>><?php unset($attr6_colspan); ?><?php  $attr7_list='objects';  $attr7_name='linkobjectid';  $attr7_onchange='';  $attr7_title='';  $attr7_class='';  $attr7_addempty=false;  $attr7_multiple=false;  $attr7_size='1';  $attr7_lang=false;  ?><?php
$attr7_tmp_list = $$attr7_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr7_name)?'- '.lang('EMPTY').' -':$attr7_tmp_list[$$attr7_name];
}
else
{
if ( $attr7_addempty!==FALSE  )
{
	if ($attr7_addempty===TRUE)
		$$attr7_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr7_list;
	else
		$$attr7_list = array(''=>'- '.lang($attr7_addempty).' -')+$$attr7_list;
}
?><select<?php if ($attr7_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr7_name ?>"  name="<?php echo $attr7_name; if ($attr7_multiple) echo '[]'; ?>" onchange="<?php echo $attr7_onchange ?>" title="<?php echo $attr7_title ?>" class="<?php echo $attr7_class ?>"<?php
if (count($$attr7_list)<=1) echo ' disabled="disabled"';
if	($attr7_multiple) echo ' multiple="multiple"';
if (in_array($attr7_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr7_size).'"';
?>><?php
		if	( isset($$attr7_name) && isset($attr7_tmp_list[$$attr7_name]) )
			$attr7_tmp_default = $$attr7_name;
		elseif ( isset($attr7_default) )
			$attr7_tmp_default = $attr7_default;
		else
			$attr7_tmp_default = '';
		foreach( $attr7_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr7_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr7_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr7_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr7_list)==0) echo '<input type="hidden" name="'.$attr7_name.'" value="" />';
if (count($$attr7_list)==1) echo '<input type="hidden" name="'.$attr7_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr7_list);unset($attr7_name);unset($attr7_onchange);unset($attr7_title);unset($attr7_class);unset($attr7_addempty);unset($attr7_multiple);unset($attr7_size);unset($attr7_lang); ?><?php  $attr7_field='linkobjectid';  ?><?php
if (isset($errors[0])) $attr7_field = $errors[0];
?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr7_field ?>.focus();
document.forms[0].<?php echo $attr7_field ?>.select();
</script>
<?php unset($attr7_field); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_equals='number';  $attr4_value=$type;  ?><?php 
	$attr4_tmp_exec = $attr4_equals == $attr4_value;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_equals);unset($attr4_value); ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  $attr6_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr6_colspan ?>" <?php
?>><?php unset($attr6_colspan); ?><?php  $attr7_name='decimals';  $attr7_default='decimals';  ?><?php
if (isset($$attr7_name))
	$attr7_tmp_value = $$attr7_name;
elseif ( isset($attr7_default) )
	$attr7_tmp_value = $attr7_default;
else
	$attr7_tmp_value = "";
?><input type="hidden" name="<?php echo $attr7_name ?>" value="<?php echo $attr7_tmp_value ?>" /><?php unset($attr7_name);unset($attr7_default); ?><?php  $attr7_class='text';  $attr7_default='';  $attr7_type='text';  $attr7_name='number';  $attr7_size='15';  $attr7_maxlength='20';  $attr7_onchange='';  $attr7_readonly=false;  ?><?php if ($this->isEditable() && !$this->isEditMode()) $attr7_readonly=true;
	  if ($attr7_readonly && empty($$attr7_name)) $$attr7_name = '- '.lang('EMPTY').' -';
      if(!isset($attr7_default)) $attr7_default='';
?><?php if (!$attr7_readonly || $attr7_type=='hidden') {
?><input<?php if ($attr7_readonly) echo ' disabled="true"' ?> id="id_<?php echo $attr7_name ?><?php if ($attr7_readonly) echo '_disabled' ?>" name="<?php echo $attr7_name ?><?php if ($attr7_readonly) echo '_disabled' ?>" type="<?php echo $attr7_type ?>" size="<?php echo $attr7_size ?>" maxlength="<?php echo $attr7_maxlength ?>" class="<?php echo $attr7_class ?>" value="<?php echo isset($$attr7_name)?$$attr7_name:$attr7_default ?>" <?php if (in_array($attr7_name,$errors)) echo 'style="border-rightx:10px solid red; background-colorx:yellow; border:2px dashed red;"' ?> /><?php
if	($attr7_readonly) {
?><input type="hidden" id="id_<?php echo $attr7_name ?>" name="<?php echo $attr7_name ?>" value="<?php echo isset($$attr7_name)?$$attr7_name:$attr7_default ?>" /><?php
 } } else { ?><span class="<?php echo $attr7_class ?>"><?php echo isset($$attr7_name)?$$attr7_name:$attr7_default ?></span><?php } ?><?php unset($attr7_class);unset($attr7_default);unset($attr7_type);unset($attr7_name);unset($attr7_size);unset($attr7_maxlength);unset($attr7_onchange);unset($attr7_readonly); ?><?php  $attr7_field='number';  ?><?php
if (isset($errors[0])) $attr7_field = $errors[0];
?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr7_field ?>.focus();
document.forms[0].<?php echo $attr7_field ?>.select();
</script>
<?php unset($attr7_field); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_equals='select';  $attr4_value=$type;  ?><?php 
	$attr4_tmp_exec = $attr4_equals == $attr4_value;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_equals);unset($attr4_value); ?><?php  ?><?php
	$attr5_tmp_class='';
	$attr5_last_class = $attr5_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr5_tmp_class));
?><?php  ?><?php  $attr6_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr6_class))
		$attr6_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr6_rowspan) )
		$attr6_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr6_colspan ?>" <?php
?>><?php unset($attr6_colspan); ?><?php  $attr7_list='items';  $attr7_name='text';  $attr7_onchange='';  $attr7_title='';  $attr7_class='';  $attr7_addempty=false;  $attr7_multiple=false;  $attr7_size='1';  $attr7_lang=false;  ?><?php
$attr7_tmp_list = $$attr7_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr7_name)?'- '.lang('EMPTY').' -':$attr7_tmp_list[$$attr7_name];
}
else
{
if ( $attr7_addempty!==FALSE  )
{
	if ($attr7_addempty===TRUE)
		$$attr7_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr7_list;
	else
		$$attr7_list = array(''=>'- '.lang($attr7_addempty).' -')+$$attr7_list;
}
?><select<?php if ($attr7_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr7_name ?>"  name="<?php echo $attr7_name; if ($attr7_multiple) echo '[]'; ?>" onchange="<?php echo $attr7_onchange ?>" title="<?php echo $attr7_title ?>" class="<?php echo $attr7_class ?>"<?php
if (count($$attr7_list)<=1) echo ' disabled="disabled"';
if	($attr7_multiple) echo ' multiple="multiple"';
if (in_array($attr7_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr7_size).'"';
?>><?php
		if	( isset($$attr7_name) && isset($attr7_tmp_list[$$attr7_name]) )
			$attr7_tmp_default = $$attr7_name;
		elseif ( isset($attr7_default) )
			$attr7_tmp_default = $attr7_default;
		else
			$attr7_tmp_default = '';
		foreach( $attr7_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr7_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr7_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr7_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr7_list)==0) echo '<input type="hidden" name="'.$attr7_name.'" value="" />';
if (count($$attr7_list)==1) echo '<input type="hidden" name="'.$attr7_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr7_list);unset($attr7_name);unset($attr7_onchange);unset($attr7_title);unset($attr7_class);unset($attr7_addempty);unset($attr7_multiple);unset($attr7_size);unset($attr7_lang); ?><?php  $attr7_field='text';  ?><?php
if (isset($errors[0])) $attr7_field = $errors[0];
?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr7_field ?>.focus();
document.forms[0].<?php echo $attr7_field ?>.select();
</script>
<?php unset($attr7_field); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_true=$mode=="edit";  ?><?php 
	if	(gettype($attr4_true) === '' && gettype($attr4_true) === '1')
		$attr4_tmp_exec = $$attr4_true == true;
	else
		$attr4_tmp_exec = $attr4_true == true;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_true); ?><?php  $attr5_equals='longtext';  $attr5_value=$type;  ?><?php 
	$attr5_tmp_exec = $attr5_equals == $attr5_value;
	$attr5_tmp_last_exec = $attr5_tmp_exec;
	if	( $attr5_tmp_exec )
	{
?>
<?php unset($attr5_equals);unset($attr5_value); ?><?php  $attr6_equals='wiki';  $attr6_value=$editor;  ?><?php 
	$attr6_tmp_exec = $attr6_equals == $attr6_value;
	$attr6_tmp_last_exec = $attr6_tmp_exec;
	if	( $attr6_tmp_exec )
	{
?>
<?php unset($attr6_equals);unset($attr6_value); ?><?php  $attr7_present='languages';  ?><?php 
	$attr7_tmp_exec = isset($$attr7_present);
	$attr7_tmp_last_exec = $attr7_tmp_exec;
	if	( $attr7_tmp_exec )
	{
?>
<?php unset($attr7_present); ?><?php  ?><?php
	$attr8_tmp_class='';
	$attr8_last_class = $attr8_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr8_tmp_class));
?><?php  ?><?php  $attr9_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr9_class))
		$attr9_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr9_rowspan) )
		$attr9_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr9_colspan ?>" <?php
?>><?php unset($attr9_colspan); ?><?php  $attr10_title=lang('editor_show_language');  ?><fieldset><?php if(isset($attr10_title)) { ?><legend><?php echo encodeHtml($attr10_title) ?></legend><?php } ?><?php unset($attr10_title); ?><?php  ?></fieldset><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$attr8_tmp_class='';
	$attr8_last_class = $attr8_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr8_tmp_class));
?><?php  ?><?php  $attr9_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr9_class))
		$attr9_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr9_rowspan) )
		$attr9_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr9_colspan ?>" <?php
?>><?php unset($attr9_colspan); ?><?php  $attr10_list='languages';  $attr10_extract=false;  $attr10_key='languageid';  $attr10_value='languagename';  ?><?php
	$attr10_list_tmp_key   = $attr10_key;
	$attr10_list_tmp_value = $attr10_value;
	$attr10_list_extract   = $attr10_extract;
	unset($attr10_key);
	unset($attr10_value);
	if	( !isset($$attr10_list) || !is_array($$attr10_list) )
		$$attr10_list = array();
	foreach( $$attr10_list as $$attr10_list_tmp_key => $$attr10_list_tmp_value )
	{
		if	( $attr10_list_extract )
		{
			if	( !is_array($$attr10_list_tmp_value) )
			{
				print_r($$attr10_list_tmp_value);
				die( 'not an array at key: '.$$attr10_list_tmp_key );
			}
			extract($$attr10_list_tmp_value);
		}
?><?php unset($attr10_list);unset($attr10_extract);unset($attr10_key);unset($attr10_value); ?><?php  $attr11_readonly=false;  $attr11_name='otherlanguageid';  $attr11_value=$languageid;  $attr11_default=false;  $attr11_prefix='';  $attr11_suffix='';  $attr11_class='';  $attr11_onchange='';  ?><?php
		if ($this->isEditable() && !$this->isEditMode()) $attr11_readonly=true;
		if	( isset($$attr11_name)  )
			$attr11_tmp_default = $$attr11_name;
		elseif ( isset($attr11_default) )
			$attr11_tmp_default = $attr11_default;
		else
			$attr11_tmp_default = '';
 ?><input onclick="<?php echo $attr11_name.'_'.$attr11_value ?>_valueChanged(this);" class="radio" type="radio" id="id_<?php echo $attr11_name.'_'.$attr11_value ?>"  name="<?php echo $attr11_prefix.$attr11_name ?>"<?php if ( $attr11_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr11_value ?>" <?php if($attr11_value==$attr11_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr11_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> />
<?php /* #END-IF# */ ?><?php unset($attr11_readonly);unset($attr11_name);unset($attr11_value);unset($attr11_default);unset($attr11_prefix);unset($attr11_suffix);unset($attr11_class);unset($attr11_onchange); ?><?php  $attr11_for='otherlanguageid_'.$languageid.'';  ?><label for="id_<?php echo $attr11_for ?><?php if (!empty($attr11_value)) echo '_'.$attr11_value ?>"><?php unset($attr11_for); ?><?php  $attr12_class='text';  $attr12_var='languagename';  $attr12_escape=true;  ?><?php
		$attr12_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr12_class ?>" title="<?php echo $attr12_title ?>"><?php
		$langF = $attr12_escape?'langHtml':'lang';
		$tmp_text = isset($$attr12_var)?$$attr12_var:'?unset:'.$attr12_var.'?';
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr12_class);unset($attr12_var);unset($attr12_escape); ?><?php  ?></label><?php  ?><?php  ?><br/><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php
	$attr7_tmp_class='';
	$attr7_last_class = $attr7_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr7_tmp_class));
?><?php  ?><?php  $attr8_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr8_class))
		$attr8_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr8_rowspan) )
		$attr8_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr8_colspan ?>" <?php
?>><?php unset($attr8_colspan); ?><?php  $attr9_title=lang('PAGE_PREVIEW');  ?><fieldset><?php if(isset($attr9_title)) { ?><legend><?php echo encodeHtml($attr9_title) ?></legend><?php } ?><?php unset($attr9_title); ?><?php  ?></fieldset><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$attr7_tmp_class='';
	$attr7_last_class = $attr7_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr7_tmp_class));
?><?php  ?><?php  $attr8_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr8_class))
		$attr8_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr8_rowspan) )
		$attr8_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr8_colspan ?>" <?php
?>><?php unset($attr8_colspan); ?><?php  $attr9_default=false;  $attr9_readonly=false;  $attr9_name='preview';  ?><?php
	if ($this->isEditable() && !$this->isEditMode()) $attr9_readonly=true;
	if	( isset($$attr9_name) )
		$checked = $$attr9_name;
	else
		$checked = $attr9_default;
?><input class="checkbox" type="checkbox" id="id_<?php echo $attr9_name ?>" name="<?php echo $attr9_name  ?>"  <?php if ($attr9_readonly) echo ' disabled="disabled"' ?> value="1" <?php if( $checked ) echo 'checked="checked"' ?><?php if (in_array($attr9_name,$errors)) echo ' style="background-color:red;"' ?> /><?php
if ( $attr9_readonly && $checked )
{ 
?><input type="hidden" name="<?php echo $attr9_name ?>" value="1" /><?php
}
?><?php unset($attr9_name); unset($attr9_readonly); unset($attr9_default); ?><?php unset($attr9_default);unset($attr9_readonly);unset($attr9_name); ?><?php  $attr9_for='preview';  ?><label for="id_<?php echo $attr9_for ?><?php if (!empty($attr9_value)) echo '_'.$attr9_value ?>"><?php unset($attr9_for); ?><?php  $attr10_class='text';  $attr10_key='PAGE_PREVIEW';  $attr10_escape=true;  ?><?php
		$attr10_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr10_class ?>" title="<?php echo $attr10_title ?>"><?php
		$langF = $attr10_escape?'langHtml':'lang';
		$tmp_text = $langF($attr10_key);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr10_class);unset($attr10_key);unset($attr10_escape); ?><?php  ?></label><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr4_true=$mode=="edit";  ?><?php 
	if	(gettype($attr4_true) === '' && gettype($attr4_true) === '1')
		$attr4_tmp_exec = $$attr4_true == true;
	else
		$attr4_tmp_exec = $attr4_true == true;
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_true); ?><?php  $attr5_present='release';  ?><?php 
	$attr5_tmp_exec = isset($$attr5_present);
	$attr5_tmp_last_exec = $attr5_tmp_exec;
	if	( $attr5_tmp_exec )
	{
?>
<?php unset($attr5_present); ?><?php  $attr6_present='publish';  ?><?php 
	$attr6_tmp_exec = isset($$attr6_present);
	$attr6_tmp_last_exec = $attr6_tmp_exec;
	if	( $attr6_tmp_exec )
	{
?>
<?php unset($attr6_present); ?><?php  ?><?php
	$attr7_tmp_class='';
	$attr7_last_class = $attr7_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr7_tmp_class));
?><?php  ?><?php  $attr8_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr8_class))
		$attr8_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr8_rowspan) )
		$attr8_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr8_colspan ?>" <?php
?>><?php unset($attr8_colspan); ?><?php  $attr9_title=lang('options');  ?><fieldset><?php if(isset($attr9_title)) { ?><legend><?php echo encodeHtml($attr9_title) ?></legend><?php } ?><?php unset($attr9_title); ?><?php  ?></fieldset><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr5_present='release';  ?><?php 
	$attr5_tmp_exec = isset($$attr5_present);
	$attr5_tmp_last_exec = $attr5_tmp_exec;
	if	( $attr5_tmp_exec )
	{
?>
<?php unset($attr5_present); ?><?php  ?><?php
	$attr6_tmp_class='';
	$attr6_last_class = $attr6_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr6_tmp_class));
?><?php  ?><?php  $attr7_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr7_colspan ?>" <?php
?>><?php unset($attr7_colspan); ?><?php  $attr8_default=false;  $attr8_readonly=false;  $attr8_name='release';  ?><?php
	if ($this->isEditable() && !$this->isEditMode()) $attr8_readonly=true;
	if	( isset($$attr8_name) )
		$checked = $$attr8_name;
	else
		$checked = $attr8_default;
?><input class="checkbox" type="checkbox" id="id_<?php echo $attr8_name ?>" name="<?php echo $attr8_name  ?>"  <?php if ($attr8_readonly) echo ' disabled="disabled"' ?> value="1" <?php if( $checked ) echo 'checked="checked"' ?><?php if (in_array($attr8_name,$errors)) echo ' style="background-color:red;"' ?> /><?php
if ( $attr8_readonly && $checked )
{ 
?><input type="hidden" name="<?php echo $attr8_name ?>" value="1" /><?php
}
?><?php unset($attr8_name); unset($attr8_readonly); unset($attr8_default); ?><?php unset($attr8_default);unset($attr8_readonly);unset($attr8_name); ?><?php  $attr8_for='release';  ?><label for="id_<?php echo $attr8_for ?><?php if (!empty($attr8_value)) echo '_'.$attr8_value ?>"><?php unset($attr8_for); ?><?php  $attr9_class='text';  $attr9_text='GLOBAL_RELEASE';  $attr9_escape=true;  ?><?php
		$attr9_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr9_class ?>" title="<?php echo $attr9_title ?>"><?php
		$langF = $attr9_escape?'langHtml':'lang';
		$tmp_text = $langF($$attr9_textvar);
		$tmp_text = $langF($attr9_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr9_class);unset($attr9_text);unset($attr9_escape); ?><?php  ?></label><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr5_present='publish';  ?><?php 
	$attr5_tmp_exec = isset($$attr5_present);
	$attr5_tmp_last_exec = $attr5_tmp_exec;
	if	( $attr5_tmp_exec )
	{
?>
<?php unset($attr5_present); ?><?php  ?><?php
	$attr6_tmp_class='';
	$attr6_last_class = $attr6_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr6_tmp_class));
?><?php  ?><?php  $attr7_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr7_class))
		$attr7_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr7_rowspan) )
		$attr7_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> colspan="<?php echo $attr7_colspan ?>" <?php
?>><?php unset($attr7_colspan); ?><?php  $attr8_default=false;  $attr8_readonly=false;  $attr8_name='publish';  ?><?php
	if ($this->isEditable() && !$this->isEditMode()) $attr8_readonly=true;
	if	( isset($$attr8_name) )
		$checked = $$attr8_name;
	else
		$checked = $attr8_default;
?><input class="checkbox" type="checkbox" id="id_<?php echo $attr8_name ?>" name="<?php echo $attr8_name  ?>"  <?php if ($attr8_readonly) echo ' disabled="disabled"' ?> value="1" <?php if( $checked ) echo 'checked="checked"' ?><?php if (in_array($attr8_name,$errors)) echo ' style="background-color:red;"' ?> /><?php
if ( $attr8_readonly && $checked )
{ 
?><input type="hidden" name="<?php echo $attr8_name ?>" value="1" /><?php
}
?><?php unset($attr8_name); unset($attr8_readonly); unset($attr8_default); ?><?php unset($attr8_default);unset($attr8_readonly);unset($attr8_name); ?><?php  $attr8_for='publish';  ?><label for="id_<?php echo $attr8_for ?><?php if (!empty($attr8_value)) echo '_'.$attr8_value ?>"><?php unset($attr8_for); ?><?php  $attr9_class='text';  $attr9_text='PAGE_PUBLISH_AFTER_SAVE';  $attr9_escape=true;  ?><?php
		$attr9_title = '';
		$tmp_tag = 'span';
?><<?php echo $tmp_tag ?> class="<?php echo $attr9_class ?>" title="<?php echo $attr9_title ?>"><?php
		$langF = $attr9_escape?'langHtml':'lang';
		$tmp_text = $langF($$attr9_textvar);
		$tmp_text = $langF($attr9_text);
	$tmp_text = nl2br($tmp_text);
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr9_class);unset($attr9_text);unset($attr9_escape); ?><?php  ?></label><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php
	$attr4_tmp_class='';
	$attr4_last_class = $attr4_tmp_class;
	echo Html::open_tag('tr',array('class'=>$attr4_tmp_class));
?><?php  ?><?php  $attr5_class='act';  $attr5_colspan='2';  ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr5_class))
		$attr5_class=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr5_rowspan) )
		$attr5_width=$column_widths[$cell_column_nr-1];
?><td<?php
?> class="<?php   echo $attr5_class   ?>" <?php
?> colspan="<?php echo $attr5_colspan ?>" <?php
?>><?php unset($attr5_class);unset($attr5_colspan); ?><?php  $attr6_type='ok';  $attr6_class='ok';  $attr6_value='ok';  $attr6_text='button_ok';  ?><?php
		if ($this->isEditable() && !$this->isEditMode())
		$attr6_text = 'MODE_EDIT';
		$attr6_type = 'submit';
		$attr6_src  = '';
?><input type="<?php echo $attr6_type ?>"<?php if(isset($attr6_src)) { ?> src="<?php echo $image_dir.'icon_'.$attr6_src.IMG_ICON_EXT ?>"<?php } ?> name="<?php echo $attr6_value ?>" class="<?php echo $attr6_class ?>" title="<?php echo lang($attr6_text.'_DESC') ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;<?php echo langHtml($attr6_text) ?>&nbsp;&nbsp;&nbsp;&nbsp;" /><?php unset($attr6_src) ?><?php
?><?php unset($attr6_type);unset($attr6_class);unset($attr6_value);unset($attr6_text); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?>      </table>
	</td>
  </tr>
</table>
</center>
<?php if ($showDuration)
      { ?>
<br/>
<center><small>&nbsp;
<?php $dur = time()-START_TIME;
      echo floor($dur/60).':'.str_pad($dur%60,2,'0',STR_PAD_LEFT); ?></small></center>
<?php } ?>
<?php  ?><?php  ?></form>
<?php  ?><?php  ?></body>
</html><?php  ?>