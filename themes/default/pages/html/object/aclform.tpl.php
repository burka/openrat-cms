<?php  $attr1_class='main';  ?><?php
 if (!headers_sent()) header('Content-Type: text/html; charset='.$charset)
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <title><?php echo isset($attr1_title)?$attr1_title.' - ':(isset($windowTitle)?lang($windowTitle).' - ':'') ?><?php echo $cms_title ?></title>
  <meta http-equiv="content-type" content="text/html; charset=<?php echo $charset ?>" />
  <meta name="MSSmartTagsPreventParsing" content="true" />
  <meta name="robots" content="noindex,nofollow" />
<?php if (isset($windowMenu) && is_array($windowMenu)) foreach( $windowMenu as $menu )
      {
       	?>
  <link rel="section" href="<?php echo Html::url($actionName,@$menu['subaction'],$this->getRequestId() ) ?>" title="<?php echo lang($menu['text']) ?>" />
<?php
      }
?><?php if (isset($metaList) && is_array($metaList)) foreach( $metaList as $meta )
      {
       	?>
  <link rel="<?php echo $meta['name'] ?>" href="<?php echo $meta['url'] ?>" title="<?php echo lang($meta['title']) ?>" /><?php
      }
?><?php if(!empty($root_stylesheet)) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $root_stylesheet ?>" />
<?php } ?>
<?php if($root_stylesheet!=$user_stylesheet) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $user_stylesheet ?>" />
<?php } ?>
</head>
<body class="<?php echo $attr1_class ?>" <?php if (@$conf['interface']['application_mode']) { ?> style="padding:0px;margin:0px;"<?php } ?> >
<?php unset($attr1_class); ?><?php  $attr2_name='';  $attr2_target='_self';  $attr2_method='post';  $attr2_enctype='application/x-www-form-urlencoded';  ?><?php
	if	(empty($attr2_action))
		$attr2_action = $actionName;
	if	(empty($attr2_subaction))
		$attr2_subaction = $targetSubActionName;
	if	(empty($attr2_id))
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
?><?php unset($attr2_name);unset($attr2_target);unset($attr2_method);unset($attr2_enctype); ?><?php  $attr3_title='GLOBAL_ADD';  $attr3_width='93%';  $attr3_rowclasses='odd,even';  $attr3_columnclasses='1,2,3';  ?><?php
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
    <td colspan="2" class="subaction" style="padding:2px; white-space:nowrap; border-bottom:1px solid black;"><img src="<?php echo $image_dir.'icon_'.$notice['type'].IMG_ICON_EXT ?>" align="left" /><?php echo $notice['name'] ?>
    </td>
  </tr>
<?php } ?>
  <tr class="notice_<?php echo $notice['status'] ?>">
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
      <table class="n" cellspacing="0" width="100%" cellpadding="4">
<?php unset($attr3_title);unset($attr3_width);unset($attr3_rowclasses);unset($attr3_columnclasses); ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_colspan='3';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_colspan); ?><?php  $attr6_title=lang('users');  ?><fieldset><?php if(isset($attr6_title)) { ?><legend><?php echo encodeHtml($attr6_title) ?></legend><?php } ?><?php unset($attr6_title); ?><?php  ?></fieldset><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_width='10px';  $attr5_class='fx';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_width);unset($attr5_class); ?><?php  $attr6_readonly=false;  $attr6_name='type';  $attr6_value='all';  $attr6_default=false;  $attr6_prefix='';  $attr6_suffix='';  $attr6_class='';  $attr6_onchange='';  ?><?php
		if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
		if	( isset($$attr6_name)  )
			$attr6_tmp_default = $$attr6_name;
		elseif ( isset($attr6_default) )
			$attr6_tmp_default = $attr6_default;
		else
			$attr6_tmp_default = '';
 ?><input type="radio" id="id_<?php echo $attr6_name.'_'.$attr6_value ?>"  name="<?php echo $attr6_prefix.$attr6_name ?>"<?php if ( $attr6_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr6_value ?>" <?php if($attr6_value==$attr6_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr6_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr6_readonly);unset($attr6_name);unset($attr6_value);unset($attr6_default);unset($attr6_prefix);unset($attr6_suffix);unset($attr6_class);unset($attr6_onchange); ?><?php  ?></td><?php  ?><?php  $attr5_class='fx';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_class); ?><?php  $attr6_for='type';  $attr6_value='all';  ?><label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for);unset($attr6_value); ?><?php  $attr7_class='text';  $attr7_text='GLOBAL_ALL';  $attr7_escape=true;  ?><?php
	if	( isset($attr7_prefix)&& isset($attr7_key))
		$attr7_key = $attr7_prefix.$attr7_key;
	if	( isset($attr7_suffix)&& isset($attr7_key))
		$attr7_key = $attr7_key.$attr7_suffix;
	if(empty($attr7_title))
			$attr7_title = '';
	if	(empty($attr7_type))
		$tmp_tag = 'span';
	else
		switch( $attr7_type )
		{
			case 'emphatic':
			case 'italic':
				$tmp_tag = 'em';
				break;
			case 'strong':
			case 'bold':
				$tmp_tag = 'strong';
				break;
			case 'tt':
			case 'teletype':
				$tmp_tag = 'tt';
				break;
			default:
				$tmp_tag = 'span';
		}
?><<?php echo $tmp_tag ?> class="<?php echo $attr7_class ?>" title="<?php echo $attr7_title ?>"><?php
	$attr7_title = '';
	if	( $attr7_escape )
		$langF = 'langHtml';
	else
		$langF = 'lang';
	if (!empty($attr7_array))
	{
		$tmpArray = $$attr7_array;
		if (!empty($attr7_var))
			$tmp_text = $tmpArray[$attr7_var];
		else
			$tmp_text = $langF($tmpArray[$attr7_text]);
	}
	elseif (!empty($attr7_text))
		$tmp_text = $langF($attr7_text);
	elseif (!empty($attr7_textvar))
		$tmp_text = $langF($$attr7_textvar);
	elseif (!empty($attr7_key))
		$tmp_text = $langF($attr7_key);
	elseif (!empty($attr7_var))
		$tmp_text = isset($$attr7_var)?$$attr7_var:'?unset:'.$attr7_var.'?';	
	elseif (!empty($attr7_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr7_raw);
	elseif (!empty($attr7_value))
		$tmp_text = $attr7_value;
	else
	  $tmp_text = '&nbsp;';
	if	( !empty($attr7_maxlength) && intval($attr7_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr7_maxlength) );
	if	(isset($attr7_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr7_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_text);unset($attr7_escape); ?><?php  ?></label><?php  ?><?php  ?></td><?php  ?><?php  $attr5_class='fx';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_class); ?><?php  $attr6_class='text';  $attr6_raw='_';  $attr6_escape=true;  ?><?php
	if	( isset($attr6_prefix)&& isset($attr6_key))
		$attr6_key = $attr6_prefix.$attr6_key;
	if	( isset($attr6_suffix)&& isset($attr6_key))
		$attr6_key = $attr6_key.$attr6_suffix;
	if(empty($attr6_title))
			$attr6_title = '';
	if	(empty($attr6_type))
		$tmp_tag = 'span';
	else
		switch( $attr6_type )
		{
			case 'emphatic':
			case 'italic':
				$tmp_tag = 'em';
				break;
			case 'strong':
			case 'bold':
				$tmp_tag = 'strong';
				break;
			case 'tt':
			case 'teletype':
				$tmp_tag = 'tt';
				break;
			default:
				$tmp_tag = 'span';
		}
?><<?php echo $tmp_tag ?> class="<?php echo $attr6_class ?>" title="<?php echo $attr6_title ?>"><?php
	$attr6_title = '';
	if	( $attr6_escape )
		$langF = 'langHtml';
	else
		$langF = 'lang';
	if (!empty($attr6_array))
	{
		$tmpArray = $$attr6_array;
		if (!empty($attr6_var))
			$tmp_text = $tmpArray[$attr6_var];
		else
			$tmp_text = $langF($tmpArray[$attr6_text]);
	}
	elseif (!empty($attr6_text))
		$tmp_text = $langF($attr6_text);
	elseif (!empty($attr6_textvar))
		$tmp_text = $langF($$attr6_textvar);
	elseif (!empty($attr6_key))
		$tmp_text = $langF($attr6_key);
	elseif (!empty($attr6_var))
		$tmp_text = isset($$attr6_var)?$$attr6_var:'?unset:'.$attr6_var.'?';	
	elseif (!empty($attr6_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr6_raw);
	elseif (!empty($attr6_value))
		$tmp_text = $attr6_value;
	else
	  $tmp_text = '&nbsp;';
	if	( !empty($attr6_maxlength) && intval($attr6_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr6_maxlength) );
	if	(isset($attr6_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr6_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr6_class);unset($attr6_raw);unset($attr6_escape); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_width='10px';  $attr5_class='fx';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_width);unset($attr5_class); ?><?php  $attr6_readonly=false;  $attr6_name='type';  $attr6_value='user';  $attr6_default=false;  $attr6_prefix='';  $attr6_suffix='';  $attr6_class='';  $attr6_onchange='';  ?><?php
		if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
		if	( isset($$attr6_name)  )
			$attr6_tmp_default = $$attr6_name;
		elseif ( isset($attr6_default) )
			$attr6_tmp_default = $attr6_default;
		else
			$attr6_tmp_default = '';
 ?><input type="radio" id="id_<?php echo $attr6_name.'_'.$attr6_value ?>"  name="<?php echo $attr6_prefix.$attr6_name ?>"<?php if ( $attr6_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr6_value ?>" <?php if($attr6_value==$attr6_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr6_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr6_readonly);unset($attr6_name);unset($attr6_value);unset($attr6_default);unset($attr6_prefix);unset($attr6_suffix);unset($attr6_class);unset($attr6_onchange); ?><?php  ?></td><?php  ?><?php  $attr5_class='fx';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_class); ?><?php  $attr6_for='type';  $attr6_value='user';  ?><label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for);unset($attr6_value); ?><?php  $attr7_class='text';  $attr7_text='GLOBAL_USER';  $attr7_escape=true;  ?><?php
	if	( isset($attr7_prefix)&& isset($attr7_key))
		$attr7_key = $attr7_prefix.$attr7_key;
	if	( isset($attr7_suffix)&& isset($attr7_key))
		$attr7_key = $attr7_key.$attr7_suffix;
	if(empty($attr7_title))
			$attr7_title = '';
	if	(empty($attr7_type))
		$tmp_tag = 'span';
	else
		switch( $attr7_type )
		{
			case 'emphatic':
			case 'italic':
				$tmp_tag = 'em';
				break;
			case 'strong':
			case 'bold':
				$tmp_tag = 'strong';
				break;
			case 'tt':
			case 'teletype':
				$tmp_tag = 'tt';
				break;
			default:
				$tmp_tag = 'span';
		}
?><<?php echo $tmp_tag ?> class="<?php echo $attr7_class ?>" title="<?php echo $attr7_title ?>"><?php
	$attr7_title = '';
	if	( $attr7_escape )
		$langF = 'langHtml';
	else
		$langF = 'lang';
	if (!empty($attr7_array))
	{
		$tmpArray = $$attr7_array;
		if (!empty($attr7_var))
			$tmp_text = $tmpArray[$attr7_var];
		else
			$tmp_text = $langF($tmpArray[$attr7_text]);
	}
	elseif (!empty($attr7_text))
		$tmp_text = $langF($attr7_text);
	elseif (!empty($attr7_textvar))
		$tmp_text = $langF($$attr7_textvar);
	elseif (!empty($attr7_key))
		$tmp_text = $langF($attr7_key);
	elseif (!empty($attr7_var))
		$tmp_text = isset($$attr7_var)?$$attr7_var:'?unset:'.$attr7_var.'?';	
	elseif (!empty($attr7_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr7_raw);
	elseif (!empty($attr7_value))
		$tmp_text = $attr7_value;
	else
	  $tmp_text = '&nbsp;';
	if	( !empty($attr7_maxlength) && intval($attr7_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr7_maxlength) );
	if	(isset($attr7_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr7_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_text);unset($attr7_escape); ?><?php  ?></label><?php  ?><?php  ?></td><?php  ?><?php  $attr5_class='fx';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_class); ?><?php  $attr6_list='users';  $attr6_name='userid';  $attr6_onchange='';  $attr6_title='';  $attr6_class='';  $attr6_addempty=true;  $attr6_multiple=false;  $attr6_size='1';  $attr6_lang=false;  ?><?php
$attr6_tmp_list = $$attr6_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr6_name)?'- '.lang('EMPTY').' -':$attr6_tmp_list[$$attr6_name];
}
else
{
if ( $attr6_addempty!==FALSE  )
{
	if ($attr6_addempty===TRUE)
		$$attr6_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr6_list;
	else
		$$attr6_list = array(''=>'- '.lang($attr6_addempty).' -')+$$attr6_list;
}
?><select<?php if ($attr6_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr6_name ?>"  name="<?php echo $attr6_name; if ($attr6_multiple) echo '[]'; ?>" onchange="<?php echo $attr6_onchange ?>" title="<?php echo $attr6_title ?>" class="<?php echo $attr6_class ?>"<?php
if (count($$attr6_list)<=1) echo ' disabled="disabled"';
if	($attr6_multiple) echo ' multiple="multiple"';
if (in_array($attr6_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr6_size).'"';
?>><?php
		if	( isset($$attr6_name) && isset($attr6_tmp_list[$$attr6_name]) )
			$attr6_tmp_default = $$attr6_name;
		elseif ( isset($attr6_default) )
			$attr6_tmp_default = $attr6_default;
		else
			$attr6_tmp_default = '';
		foreach( $attr6_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr6_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr6_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr6_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr6_list)==0) echo '<input type="hidden" name="'.$attr6_name.'" value="" />';
if (count($$attr6_list)==1) echo '<input type="hidden" name="'.$attr6_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr6_list);unset($attr6_name);unset($attr6_onchange);unset($attr6_title);unset($attr6_class);unset($attr6_addempty);unset($attr6_multiple);unset($attr6_size);unset($attr6_lang); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  $attr4_present='groups';  ?><?php 
	$attr4_tmp_exec = isset($$attr4_present);
	$attr4_tmp_last_exec = $attr4_tmp_exec;
	if	( $attr4_tmp_exec )
	{
?>
<?php unset($attr4_present); ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr5_class))
		$attr5_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr5_class ?>"><?php  ?><?php  $attr6_width='10px';  $attr6_class='fx';  ?><?php
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
if	( isset($attr6_width  )) { ?> width="<?php   echo $attr6_width   ?>" <?php }
if	( isset($attr6_style  )) { ?> style="<?php   echo $attr6_style   ?>" <?php }
if	( isset($attr6_class  )) { ?> class="<?php   echo $attr6_class   ?>" <?php }
if	( isset($attr6_colspan)) { ?> colspan="<?php echo $attr6_colspan ?>" <?php }
if	( isset($attr6_rowspan)) { ?> rowspan="<?php echo $attr6_rowspan ?>" <?php }
?>><?php unset($attr6_width);unset($attr6_class); ?><?php  $attr7_readonly=false;  $attr7_name='type';  $attr7_value='group';  $attr7_default=false;  $attr7_prefix='';  $attr7_suffix='';  $attr7_class='';  $attr7_onchange='';  ?><?php
		if ($this->isEditable() && !$this->isEditMode()) $attr7_readonly=true;
		if	( isset($$attr7_name)  )
			$attr7_tmp_default = $$attr7_name;
		elseif ( isset($attr7_default) )
			$attr7_tmp_default = $attr7_default;
		else
			$attr7_tmp_default = '';
 ?><input type="radio" id="id_<?php echo $attr7_name.'_'.$attr7_value ?>"  name="<?php echo $attr7_prefix.$attr7_name ?>"<?php if ( $attr7_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr7_value ?>" <?php if($attr7_value==$attr7_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr7_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr7_readonly);unset($attr7_name);unset($attr7_value);unset($attr7_default);unset($attr7_prefix);unset($attr7_suffix);unset($attr7_class);unset($attr7_onchange); ?><?php  ?></td><?php  ?><?php  $attr6_class='fx';  ?><?php
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
if	( isset($attr6_width  )) { ?> width="<?php   echo $attr6_width   ?>" <?php }
if	( isset($attr6_style  )) { ?> style="<?php   echo $attr6_style   ?>" <?php }
if	( isset($attr6_class  )) { ?> class="<?php   echo $attr6_class   ?>" <?php }
if	( isset($attr6_colspan)) { ?> colspan="<?php echo $attr6_colspan ?>" <?php }
if	( isset($attr6_rowspan)) { ?> rowspan="<?php echo $attr6_rowspan ?>" <?php }
?>><?php unset($attr6_class); ?><?php  $attr7_for='type';  $attr7_value='group';  ?><label for="id_<?php echo $attr7_for ?><?php if (!empty($attr7_value)) echo '_'.$attr7_value ?>"><?php unset($attr7_for);unset($attr7_value); ?><?php  $attr8_class='text';  $attr8_text='GLOBAL_GROUP';  $attr8_escape=true;  ?><?php
	if	( isset($attr8_prefix)&& isset($attr8_key))
		$attr8_key = $attr8_prefix.$attr8_key;
	if	( isset($attr8_suffix)&& isset($attr8_key))
		$attr8_key = $attr8_key.$attr8_suffix;
	if(empty($attr8_title))
			$attr8_title = '';
	if	(empty($attr8_type))
		$tmp_tag = 'span';
	else
		switch( $attr8_type )
		{
			case 'emphatic':
			case 'italic':
				$tmp_tag = 'em';
				break;
			case 'strong':
			case 'bold':
				$tmp_tag = 'strong';
				break;
			case 'tt':
			case 'teletype':
				$tmp_tag = 'tt';
				break;
			default:
				$tmp_tag = 'span';
		}
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
	$attr8_title = '';
	if	( $attr8_escape )
		$langF = 'langHtml';
	else
		$langF = 'lang';
	if (!empty($attr8_array))
	{
		$tmpArray = $$attr8_array;
		if (!empty($attr8_var))
			$tmp_text = $tmpArray[$attr8_var];
		else
			$tmp_text = $langF($tmpArray[$attr8_text]);
	}
	elseif (!empty($attr8_text))
		$tmp_text = $langF($attr8_text);
	elseif (!empty($attr8_textvar))
		$tmp_text = $langF($$attr8_textvar);
	elseif (!empty($attr8_key))
		$tmp_text = $langF($attr8_key);
	elseif (!empty($attr8_var))
		$tmp_text = isset($$attr8_var)?$$attr8_var:'?unset:'.$attr8_var.'?';	
	elseif (!empty($attr8_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr8_raw);
	elseif (!empty($attr8_value))
		$tmp_text = $attr8_value;
	else
	  $tmp_text = '&nbsp;';
	if	( !empty($attr8_maxlength) && intval($attr8_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr8_maxlength) );
	if	(isset($attr8_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr8_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_text);unset($attr8_escape); ?><?php  ?></label><?php  ?><?php  ?></td><?php  ?><?php  $attr6_class='fx';  ?><?php
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
if	( isset($attr6_width  )) { ?> width="<?php   echo $attr6_width   ?>" <?php }
if	( isset($attr6_style  )) { ?> style="<?php   echo $attr6_style   ?>" <?php }
if	( isset($attr6_class  )) { ?> class="<?php   echo $attr6_class   ?>" <?php }
if	( isset($attr6_colspan)) { ?> colspan="<?php echo $attr6_colspan ?>" <?php }
if	( isset($attr6_rowspan)) { ?> rowspan="<?php echo $attr6_rowspan ?>" <?php }
?>><?php unset($attr6_class); ?><?php  $attr7_list='groups';  $attr7_name='groupid';  $attr7_onchange='';  $attr7_title='';  $attr7_class='';  $attr7_addempty=true;  $attr7_multiple=false;  $attr7_size='1';  $attr7_lang=false;  ?><?php
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
?><?php unset($attr7_list);unset($attr7_name);unset($attr7_onchange);unset($attr7_title);unset($attr7_class);unset($attr7_addempty);unset($attr7_multiple);unset($attr7_size);unset($attr7_lang); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_colspan='3';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_colspan); ?><?php  $attr6_title=lang('language');  ?><fieldset><?php if(isset($attr6_title)) { ?><legend><?php echo encodeHtml($attr6_title) ?></legend><?php } ?><?php unset($attr6_title); ?><?php  ?></fieldset><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_width='10px';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_width); ?><?php  $attr6_class='text';  $attr6_raw='_';  $attr6_escape=true;  ?><?php
	if	( isset($attr6_prefix)&& isset($attr6_key))
		$attr6_key = $attr6_prefix.$attr6_key;
	if	( isset($attr6_suffix)&& isset($attr6_key))
		$attr6_key = $attr6_key.$attr6_suffix;
	if(empty($attr6_title))
			$attr6_title = '';
	if	(empty($attr6_type))
		$tmp_tag = 'span';
	else
		switch( $attr6_type )
		{
			case 'emphatic':
			case 'italic':
				$tmp_tag = 'em';
				break;
			case 'strong':
			case 'bold':
				$tmp_tag = 'strong';
				break;
			case 'tt':
			case 'teletype':
				$tmp_tag = 'tt';
				break;
			default:
				$tmp_tag = 'span';
		}
?><<?php echo $tmp_tag ?> class="<?php echo $attr6_class ?>" title="<?php echo $attr6_title ?>"><?php
	$attr6_title = '';
	if	( $attr6_escape )
		$langF = 'langHtml';
	else
		$langF = 'lang';
	if (!empty($attr6_array))
	{
		$tmpArray = $$attr6_array;
		if (!empty($attr6_var))
			$tmp_text = $tmpArray[$attr6_var];
		else
			$tmp_text = $langF($tmpArray[$attr6_text]);
	}
	elseif (!empty($attr6_text))
		$tmp_text = $langF($attr6_text);
	elseif (!empty($attr6_textvar))
		$tmp_text = $langF($$attr6_textvar);
	elseif (!empty($attr6_key))
		$tmp_text = $langF($attr6_key);
	elseif (!empty($attr6_var))
		$tmp_text = isset($$attr6_var)?$$attr6_var:'?unset:'.$attr6_var.'?';	
	elseif (!empty($attr6_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr6_raw);
	elseif (!empty($attr6_value))
		$tmp_text = $attr6_value;
	else
	  $tmp_text = '&nbsp;';
	if	( !empty($attr6_maxlength) && intval($attr6_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr6_maxlength) );
	if	(isset($attr6_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr6_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr6_class);unset($attr6_raw);unset($attr6_escape); ?><?php  ?></td><?php  ?><?php  $attr5_class='fx';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_class); ?><?php  $attr6_for='languageid';  ?><label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for); ?><?php  $attr7_class='text';  $attr7_text='GLOBAL_LANGUAGE';  $attr7_escape=true;  ?><?php
	if	( isset($attr7_prefix)&& isset($attr7_key))
		$attr7_key = $attr7_prefix.$attr7_key;
	if	( isset($attr7_suffix)&& isset($attr7_key))
		$attr7_key = $attr7_key.$attr7_suffix;
	if(empty($attr7_title))
			$attr7_title = '';
	if	(empty($attr7_type))
		$tmp_tag = 'span';
	else
		switch( $attr7_type )
		{
			case 'emphatic':
			case 'italic':
				$tmp_tag = 'em';
				break;
			case 'strong':
			case 'bold':
				$tmp_tag = 'strong';
				break;
			case 'tt':
			case 'teletype':
				$tmp_tag = 'tt';
				break;
			default:
				$tmp_tag = 'span';
		}
?><<?php echo $tmp_tag ?> class="<?php echo $attr7_class ?>" title="<?php echo $attr7_title ?>"><?php
	$attr7_title = '';
	if	( $attr7_escape )
		$langF = 'langHtml';
	else
		$langF = 'lang';
	if (!empty($attr7_array))
	{
		$tmpArray = $$attr7_array;
		if (!empty($attr7_var))
			$tmp_text = $tmpArray[$attr7_var];
		else
			$tmp_text = $langF($tmpArray[$attr7_text]);
	}
	elseif (!empty($attr7_text))
		$tmp_text = $langF($attr7_text);
	elseif (!empty($attr7_textvar))
		$tmp_text = $langF($$attr7_textvar);
	elseif (!empty($attr7_key))
		$tmp_text = $langF($attr7_key);
	elseif (!empty($attr7_var))
		$tmp_text = isset($$attr7_var)?$$attr7_var:'?unset:'.$attr7_var.'?';	
	elseif (!empty($attr7_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr7_raw);
	elseif (!empty($attr7_value))
		$tmp_text = $attr7_value;
	else
	  $tmp_text = '&nbsp;';
	if	( !empty($attr7_maxlength) && intval($attr7_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr7_maxlength) );
	if	(isset($attr7_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr7_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_text);unset($attr7_escape); ?><?php  ?></label><?php  ?><?php  ?></td><?php  ?><?php  $attr5_class='fx';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_class); ?><?php  $attr6_list='languages';  $attr6_name='languageid';  $attr6_onchange='';  $attr6_title='';  $attr6_class='';  $attr6_addempty=false;  $attr6_multiple=false;  $attr6_size='1';  $attr6_lang=false;  ?><?php
$attr6_tmp_list = $$attr6_list;
if ($this->isEditable() && !$this->isEditMode())
{
	echo empty($$attr6_name)?'- '.lang('EMPTY').' -':$attr6_tmp_list[$$attr6_name];
}
else
{
if ( $attr6_addempty!==FALSE  )
{
	if ($attr6_addempty===TRUE)
		$$attr6_list = array(''=>lang('LIST_ENTRY_EMPTY'))+$$attr6_list;
	else
		$$attr6_list = array(''=>'- '.lang($attr6_addempty).' -')+$$attr6_list;
}
?><select<?php if ($attr6_readonly) echo ' disabled="disabled"' ?> id="id_<?php echo $attr6_name ?>"  name="<?php echo $attr6_name; if ($attr6_multiple) echo '[]'; ?>" onchange="<?php echo $attr6_onchange ?>" title="<?php echo $attr6_title ?>" class="<?php echo $attr6_class ?>"<?php
if (count($$attr6_list)<=1) echo ' disabled="disabled"';
if	($attr6_multiple) echo ' multiple="multiple"';
if (in_array($attr6_name,$errors)) echo ' style="background-color:red; border:2px dashed red;"';
echo ' size="'.intval($attr6_size).'"';
?>><?php
		if	( isset($$attr6_name) && isset($attr6_tmp_list[$$attr6_name]) )
			$attr6_tmp_default = $$attr6_name;
		elseif ( isset($attr6_default) )
			$attr6_tmp_default = $attr6_default;
		else
			$attr6_tmp_default = '';
		foreach( $attr6_tmp_list as $box_key=>$box_value )
		{
			if	( is_array($box_value) )
			{
				$box_key   = $box_value['key'  ];
				$box_title = $box_value['title'];
				$box_value = $box_value['value'];
			}
			elseif( $attr6_lang )
			{
				$box_title = lang( $box_value.'_DESC');
				$box_value = lang( $box_value        );
			}
			else
			{
				$box_title = '';
			}
			echo '<option class="'.$attr6_class.'" value="'.$box_key.'" title="'.$box_title.'"';
			if ($box_key==$attr6_tmp_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr6_list)==0) echo '<input type="hidden" name="'.$attr6_name.'" value="" />';
if (count($$attr6_list)==1) echo '<input type="hidden" name="'.$attr6_name.'" value="'.$box_key.'" />';
}
?><?php unset($attr6_list);unset($attr6_name);unset($attr6_onchange);unset($attr6_title);unset($attr6_class);unset($attr6_addempty);unset($attr6_multiple);unset($attr6_size);unset($attr6_lang); ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_colspan='3';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_colspan); ?><?php  $attr6_title=lang('acl');  ?><fieldset><?php if(isset($attr6_title)) { ?><legend><?php echo encodeHtml($attr6_title) ?></legend><?php } ?><?php unset($attr6_title); ?><?php  ?></fieldset><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  $attr4_list='show';  $attr4_extract=false;  $attr4_key='k';  $attr4_value='t';  ?><?php
	$attr4_list_tmp_key   = $attr4_key;
	$attr4_list_tmp_value = $attr4_value;
	$attr4_list_extract   = $attr4_extract;
	unset($attr4_key);
	unset($attr4_value);
	if	( !isset($$attr4_list) || !is_array($$attr4_list) )
		$$attr4_list = array();
	foreach( $$attr4_list as $$attr4_list_tmp_key => $$attr4_list_tmp_value )
	{
		if	( $attr4_list_extract )
		{
			if	( !is_array($$attr4_list_tmp_value) )
			{
				print_r($$attr4_list_tmp_value);
				die( 'not an array at key: '.$$attr4_list_tmp_key );
			}
			extract($$attr4_list_tmp_value);
		}
?><?php unset($attr4_list);unset($attr4_extract);unset($attr4_key);unset($attr4_value); ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr5_class))
		$attr5_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr5_class ?>"><?php  ?><?php  $attr6_width='10px';  ?><?php
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
if	( isset($attr6_width  )) { ?> width="<?php   echo $attr6_width   ?>" <?php }
if	( isset($attr6_style  )) { ?> style="<?php   echo $attr6_style   ?>" <?php }
if	( isset($attr6_class  )) { ?> class="<?php   echo $attr6_class   ?>" <?php }
if	( isset($attr6_colspan)) { ?> colspan="<?php echo $attr6_colspan ?>" <?php }
if	( isset($attr6_rowspan)) { ?> rowspan="<?php echo $attr6_rowspan ?>" <?php }
?>><?php unset($attr6_width); ?><?php  $attr7_equals='read';  $attr7_value=$t;  ?><?php 
	$attr7_tmp_exec = $attr7_equals == $attr7_value;
	$attr7_tmp_last_exec = $attr7_tmp_exec;
	if	( $attr7_tmp_exec )
	{
?>
<?php unset($attr7_equals);unset($attr7_value); ?><?php  $attr8_var=$t;  $attr8_value=true;  ?><?php
	if (!isset($attr8_value))
		unset($$attr8_var);
	elseif (isset($attr8_key))
		$$attr8_var = $attr8_value[$attr8_key];
	else
		$$attr8_var = $attr8_value;
?><?php unset($attr8_var);unset($attr8_value); ?><?php  $attr8_default=false;  $attr8_readonly=true;  $attr8_name=$t;  ?><?php
	if ($this->isEditable() && !$this->isEditMode()) $attr8_readonly=true;
	if	( isset($$attr8_name) )
		$checked = $$attr8_name;
	else
		$checked = $attr8_default;
?><input type="checkbox" id="id_<?php echo $attr8_name ?>" name="<?php echo $attr8_name  ?>"  <?php if ($attr8_readonly) echo ' disabled="disabled"' ?> value="1" <?php if( $checked ) echo 'checked="checked"' ?><?php if (in_array($attr8_name,$errors)) echo ' style="background-color:red;"' ?> /><?php
if ( $attr8_readonly && $checked )
{ 
?><input type="hidden" name="<?php echo $attr8_name ?>" value="1" /><?php
}
?><?php unset($attr8_name); unset($attr8_readonly); unset($attr8_default); ?><?php unset($attr8_default);unset($attr8_readonly);unset($attr8_name); ?><?php  ?><?php } ?><?php  ?><?php  ?><?php if (!$attr7_tmp_last_exec) { ?>
<?php  ?><?php  $attr8_var=$t;  $attr8_value=false;  ?><?php
	if (!isset($attr8_value))
		unset($$attr8_var);
	elseif (isset($attr8_key))
		$$attr8_var = $attr8_value[$attr8_key];
	else
		$$attr8_var = $attr8_value;
?><?php unset($attr8_var);unset($attr8_value); ?><?php  $attr8_default=false;  $attr8_readonly=false;  $attr8_name=$t;  ?><?php
	if ($this->isEditable() && !$this->isEditMode()) $attr8_readonly=true;
	if	( isset($$attr8_name) )
		$checked = $$attr8_name;
	else
		$checked = $attr8_default;
?><input type="checkbox" id="id_<?php echo $attr8_name ?>" name="<?php echo $attr8_name  ?>"  <?php if ($attr8_readonly) echo ' disabled="disabled"' ?> value="1" <?php if( $checked ) echo 'checked="checked"' ?><?php if (in_array($attr8_name,$errors)) echo ' style="background-color:red;"' ?> /><?php
if ( $attr8_readonly && $checked )
{ 
?><input type="hidden" name="<?php echo $attr8_name ?>" value="1" /><?php
}
?><?php unset($attr8_name); unset($attr8_readonly); unset($attr8_default); ?><?php unset($attr8_default);unset($attr8_readonly);unset($attr8_name); ?><?php  ?><?php }
unset($attr6_tmp_last_exec) ?><?php  ?><?php  ?></td><?php  ?><?php  $attr6_colspan='2';  ?><?php
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
if	( isset($attr6_width  )) { ?> width="<?php   echo $attr6_width   ?>" <?php }
if	( isset($attr6_style  )) { ?> style="<?php   echo $attr6_style   ?>" <?php }
if	( isset($attr6_class  )) { ?> class="<?php   echo $attr6_class   ?>" <?php }
if	( isset($attr6_colspan)) { ?> colspan="<?php echo $attr6_colspan ?>" <?php }
if	( isset($attr6_rowspan)) { ?> rowspan="<?php echo $attr6_rowspan ?>" <?php }
?>><?php unset($attr6_colspan); ?><?php  $attr7_for=$t;  ?><label for="id_<?php echo $attr7_for ?><?php if (!empty($attr7_value)) echo '_'.$attr7_value ?>"><?php unset($attr7_for); ?><?php  $attr8_class='text';  $attr8_key=$t;  $attr8_prefix='acl_';  $attr8_escape=true;  ?><?php
	if	( isset($attr8_prefix)&& isset($attr8_key))
		$attr8_key = $attr8_prefix.$attr8_key;
	if	( isset($attr8_suffix)&& isset($attr8_key))
		$attr8_key = $attr8_key.$attr8_suffix;
	if(empty($attr8_title))
			$attr8_title = '';
	if	(empty($attr8_type))
		$tmp_tag = 'span';
	else
		switch( $attr8_type )
		{
			case 'emphatic':
			case 'italic':
				$tmp_tag = 'em';
				break;
			case 'strong':
			case 'bold':
				$tmp_tag = 'strong';
				break;
			case 'tt':
			case 'teletype':
				$tmp_tag = 'tt';
				break;
			default:
				$tmp_tag = 'span';
		}
?><<?php echo $tmp_tag ?> class="<?php echo $attr8_class ?>" title="<?php echo $attr8_title ?>"><?php
	$attr8_title = '';
	if	( $attr8_escape )
		$langF = 'langHtml';
	else
		$langF = 'lang';
	if (!empty($attr8_array))
	{
		$tmpArray = $$attr8_array;
		if (!empty($attr8_var))
			$tmp_text = $tmpArray[$attr8_var];
		else
			$tmp_text = $langF($tmpArray[$attr8_text]);
	}
	elseif (!empty($attr8_text))
		$tmp_text = $langF($attr8_text);
	elseif (!empty($attr8_textvar))
		$tmp_text = $langF($$attr8_textvar);
	elseif (!empty($attr8_key))
		$tmp_text = $langF($attr8_key);
	elseif (!empty($attr8_var))
		$tmp_text = isset($$attr8_var)?$$attr8_var:'?unset:'.$attr8_var.'?';	
	elseif (!empty($attr8_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr8_raw);
	elseif (!empty($attr8_value))
		$tmp_text = $attr8_value;
	else
	  $tmp_text = '&nbsp;';
	if	( !empty($attr8_maxlength) && intval($attr8_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr8_maxlength) );
	if	(isset($attr8_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr8_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_key);unset($attr8_prefix);unset($attr8_escape); ?><?php  ?></label><?php  ?><?php  ?></td><?php  ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_class='act';  $attr5_colspan='3';  ?><?php
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
if	( isset($attr5_width  )) { ?> width="<?php   echo $attr5_width   ?>" <?php }
if	( isset($attr5_style  )) { ?> style="<?php   echo $attr5_style   ?>" <?php }
if	( isset($attr5_class  )) { ?> class="<?php   echo $attr5_class   ?>" <?php }
if	( isset($attr5_colspan)) { ?> colspan="<?php echo $attr5_colspan ?>" <?php }
if	( isset($attr5_rowspan)) { ?> rowspan="<?php echo $attr5_rowspan ?>" <?php }
?>><?php unset($attr5_class);unset($attr5_colspan); ?><?php  $attr6_type='ok';  $attr6_class='ok';  $attr6_value='ok';  $attr6_text='button_ok';  ?><?php
	if ($attr6_type=='ok')
	{
		if ($this->isEditable() && !$this->isEditMode())
		$attr6_text = 'MODE_EDIT';
	}
	if ($attr6_type=='ok')
		$attr6_type  = 'submit';
	if (isset($attr6_src))
		$attr6_type  = 'image';
	else
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