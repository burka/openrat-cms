<?php  $attr1_class='tree';  ?><?php
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
<?php unset($attr1_class); ?><?php  $attr2_class='tree';  $attr2_width='100%';  $attr2_space='0';  $attr2_padding='0';  $attr2_rowclasses='odd,even';  ?><?php
	$coloumn_widths=array();
	$row_classes   = array('');
	$column_classes= array('');
	if(empty($attr2_class))
		$attr2_class='';
	if	(!empty($attr2_widths))
	{
		$column_widths = explode(',',$attr2_widths);
		unset($attr2['widths']);
	}
	if	(!empty($attr2_classes))
	{
		$row_classes   = explode(',',$attr2_rowclasses);
		$row_class_idx = 999;
		unset($attr2['rowclasses']);
	}
	if	(!empty($attr2_rowclasses))
	{
		$row_classes   = explode(',',$attr2_rowclasses);
		$row_class_idx = 999;
		unset($attr2['rowclasses']);
	}
	if	(!empty($attr2_columnclasses))
	{
		$column_classes   = explode(',',$attr2_columnclasses);
		unset($attr2['columnclasses']);
	}
?><table class="<?php echo $attr2_class ?>" cellspacing="<?php echo $attr2_space ?>" width="<?php echo $attr2_width ?>" cellpadding="<?php echo $attr2_padding ?>"><?php unset($attr2_class);unset($attr2_width);unset($attr2_space);unset($attr2_padding);unset($attr2_rowclasses); ?><?php  $attr3_list='zeilen';  $attr3_extract=true;  $attr3_key='list_key';  $attr3_value='list_value';  ?><?php
	$attr3_list_tmp_key   = $attr3_key;
	$attr3_list_tmp_value = $attr3_value;
	$attr3_list_extract   = $attr3_extract;
	unset($attr3_key);
	unset($attr3_value);
	if	( !isset($$attr3_list) || !is_array($$attr3_list) )
		$$attr3_list = array();
	foreach( $$attr3_list as $$attr3_list_tmp_key => $$attr3_list_tmp_value )
	{
		if	( $attr3_list_extract )
		{
			if	( !is_array($$attr3_list_tmp_value) )
			{
				print_r($$attr3_list_tmp_value);
				die( 'not an array at key: '.$$attr3_list_tmp_key );
			}
			extract($$attr3_list_tmp_value);
		}
?><?php unset($attr3_list);unset($attr3_extract);unset($attr3_key);unset($attr3_value); ?><?php  ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_list='cols';  $attr5_extract=false;  $attr5_key='list_key';  $attr5_value='i';  ?><?php
	$attr5_list_tmp_key   = $attr5_key;
	$attr5_list_tmp_value = $attr5_value;
	$attr5_list_extract   = $attr5_extract;
	unset($attr5_key);
	unset($attr5_value);
	if	( !isset($$attr5_list) || !is_array($$attr5_list) )
		$$attr5_list = array();
	foreach( $$attr5_list as $$attr5_list_tmp_key => $$attr5_list_tmp_value )
	{
		if	( $attr5_list_extract )
		{
			if	( !is_array($$attr5_list_tmp_value) )
			{
				print_r($$attr5_list_tmp_value);
				die( 'not an array at key: '.$$attr5_list_tmp_key );
			}
			extract($$attr5_list_tmp_value);
		}
?><?php unset($attr5_list);unset($attr5_extract);unset($attr5_key);unset($attr5_value); ?><?php  $attr6_class='treecol';  ?><?php
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
?>><?php unset($attr6_class); ?><?php  $attr7_align='left';  $attr7_tree=$i;  ?><?php
	$attr7_tmp_image_file = $image_dir.'tree_'.$attr7_tree.IMG_EXT;
	$attr7_size = '18x18';
?><img src="<?php echo $attr7_tmp_image_file ?>" border="0"<?php if(isset($attr7_align)) echo ' align="'.$attr7_align.'"' ?><?php if (isset($attr7_size)) { list($attr7_tmp_width,$attr7_tmp_height)=explode('x',$attr7_size);echo ' width="'.$attr7_tmp_width.'" height="'.$attr7_tmp_height.'"';} ?>><?php unset($attr7_align);unset($attr7_tree); ?><?php  ?></td><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr5_present='image';  ?><?php 
	$attr5_tmp_exec = isset($$attr5_present);
	$attr5_tmp_last_exec = $attr5_tmp_exec;
	if	( $attr5_tmp_exec )
	{
?>
<?php unset($attr5_present); ?><?php  $attr6_class='treeimage';  ?><?php
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
?>><?php unset($attr6_class); ?><?php  $attr7_present='image_url';  ?><?php 
	$attr7_tmp_exec = isset($$attr7_present);
	$attr7_tmp_last_exec = $attr7_tmp_exec;
	if	( $attr7_tmp_exec )
	{
?>
<?php unset($attr7_present); ?><?php  $attr8_title='image_url_desc';  $attr8_target='_self';  $attr8_url=$image_url;  $attr8_class='tree';  $attr8_anchor=$name;  ?><?php
	$params = array();
	if (!empty($attr8_var1) && isset($attr8_value1))
		$params[$attr8_var1]=$attr8_value1;
	if (!empty($attr8_var2) && isset($attr8_value2))
		$params[$attr8_var2]=$attr8_value2;
	if (!empty($attr8_var3) && isset($attr8_value3))
		$params[$attr8_var3]=$attr8_value3;
	if (!empty($attr8_var4) && isset($attr8_value4))
		$params[$attr8_var4]=$attr8_value4;
	if (!empty($attr8_var5) && isset($attr8_value5))
		$params[$attr8_var5]=$attr8_value5;
	if(empty($attr8_class))
		$attr8_class='';
	if(empty($attr8_title))
		$attr8_title = '';
	if(!empty($attr8_url))
		$tmp_url = $attr8_url;
	else
		$tmp_url = Html::url($attr8_action,$attr8_subaction,!empty($attr8_id)?$attr8_id:$this->getRequestId(),$params);
?><a<?php if (isset($attr8_name)) echo ' name="'.$attr8_name.'"'; else echo ' href="'.$tmp_url.($attr8_anchor?'#'.$attr8_anchor:'').'"' ?> class="<?php echo $attr8_class ?>" target="<?php echo $attr8_target ?>"<?php if (isset($attr8_accesskey)) echo ' accesskey="'.$attr8_accesskey.'"' ?>  title="<?php echo encodeHtml($attr8_title) ?>"><?php unset($attr8_title);unset($attr8_target);unset($attr8_url);unset($attr8_class);unset($attr8_anchor); ?><?php  $attr9_align='left';  $attr9_tree=$image;  ?><?php
	$attr9_tmp_image_file = $image_dir.'tree_'.$attr9_tree.IMG_EXT;
	$attr9_size = '18x18';
?><img src="<?php echo $attr9_tmp_image_file ?>" border="0"<?php if(isset($attr9_align)) echo ' align="'.$attr9_align.'"' ?><?php if (isset($attr9_size)) { list($attr9_tmp_width,$attr9_tmp_height)=explode('x',$attr9_size);echo ' width="'.$attr9_tmp_width.'" height="'.$attr9_tmp_height.'"';} ?>><?php unset($attr9_align);unset($attr9_tree); ?><?php  ?></a><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php if (!$attr7_tmp_last_exec) { ?>
<?php  ?><?php  $attr8_align='left';  $attr8_tree=$image;  ?><?php
	$attr8_tmp_image_file = $image_dir.'tree_'.$attr8_tree.IMG_EXT;
	$attr8_size = '18x18';
?><img src="<?php echo $attr8_tmp_image_file ?>" border="0"<?php if(isset($attr8_align)) echo ' align="'.$attr8_align.'"' ?><?php if (isset($attr8_size)) { list($attr8_tmp_width,$attr8_tmp_height)=explode('x',$attr8_size);echo ' width="'.$attr8_tmp_width.'" height="'.$attr8_tmp_height.'"';} ?>><?php unset($attr8_align);unset($attr8_tree); ?><?php  ?><?php }
unset($attr6_tmp_last_exec) ?><?php  ?><?php  ?></td><?php  ?><?php  ?><?php } ?><?php  ?><?php  $attr5_class='treevalue';  $attr5_colspan=$colspan;  ?><?php
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
?>><?php unset($attr5_class);unset($attr5_colspan); ?><?php  $attr6_title='';  $attr6_target='_self';  $attr6_class='';  $attr6_name=$name;  ?><?php
	$params = array();
	if (!empty($attr6_var1) && isset($attr6_value1))
		$params[$attr6_var1]=$attr6_value1;
	if (!empty($attr6_var2) && isset($attr6_value2))
		$params[$attr6_var2]=$attr6_value2;
	if (!empty($attr6_var3) && isset($attr6_value3))
		$params[$attr6_var3]=$attr6_value3;
	if (!empty($attr6_var4) && isset($attr6_value4))
		$params[$attr6_var4]=$attr6_value4;
	if (!empty($attr6_var5) && isset($attr6_value5))
		$params[$attr6_var5]=$attr6_value5;
	if(empty($attr6_class))
		$attr6_class='';
	if(empty($attr6_title))
		$attr6_title = '';
	if(!empty($attr6_url))
		$tmp_url = $attr6_url;
	else
		$tmp_url = Html::url($attr6_action,$attr6_subaction,!empty($attr6_id)?$attr6_id:$this->getRequestId(),$params);
?><a<?php if (isset($attr6_name)) echo ' name="'.$attr6_name.'"'; else echo ' href="'.$tmp_url.($attr6_anchor?'#'.$attr6_anchor:'').'"' ?> class="<?php echo $attr6_class ?>" target="<?php echo $attr6_target ?>"<?php if (isset($attr6_accesskey)) echo ' accesskey="'.$attr6_accesskey.'"' ?>  title="<?php echo encodeHtml($attr6_title) ?>"><?php unset($attr6_title);unset($attr6_target);unset($attr6_class);unset($attr6_name); ?><?php  ?></a><?php  ?><?php  $attr6_present='url';  ?><?php 
	$attr6_tmp_exec = isset($$attr6_present);
	$attr6_tmp_last_exec = $attr6_tmp_exec;
	if	( $attr6_tmp_exec )
	{
?>
<?php unset($attr6_present); ?><?php  $attr7_title=$desc;  $attr7_target=$target;  $attr7_url=$url;  $attr7_class='tree';  ?><?php
	$params = array();
	if (!empty($attr7_var1) && isset($attr7_value1))
		$params[$attr7_var1]=$attr7_value1;
	if (!empty($attr7_var2) && isset($attr7_value2))
		$params[$attr7_var2]=$attr7_value2;
	if (!empty($attr7_var3) && isset($attr7_value3))
		$params[$attr7_var3]=$attr7_value3;
	if (!empty($attr7_var4) && isset($attr7_value4))
		$params[$attr7_var4]=$attr7_value4;
	if (!empty($attr7_var5) && isset($attr7_value5))
		$params[$attr7_var5]=$attr7_value5;
	if(empty($attr7_class))
		$attr7_class='';
	if(empty($attr7_title))
		$attr7_title = '';
	if(!empty($attr7_url))
		$tmp_url = $attr7_url;
	else
		$tmp_url = Html::url($attr7_action,$attr7_subaction,!empty($attr7_id)?$attr7_id:$this->getRequestId(),$params);
?><a<?php if (isset($attr7_name)) echo ' name="'.$attr7_name.'"'; else echo ' href="'.$tmp_url.($attr7_anchor?'#'.$attr7_anchor:'').'"' ?> class="<?php echo $attr7_class ?>" target="<?php echo $attr7_target ?>"<?php if (isset($attr7_accesskey)) echo ' accesskey="'.$attr7_accesskey.'"' ?>  title="<?php echo encodeHtml($attr7_title) ?>"><?php unset($attr7_title);unset($attr7_target);unset($attr7_url);unset($attr7_class); ?><?php  $attr8_icon=$icon;  $attr8_align='left';  ?><?php
	$attr8_tmp_image_file = $image_dir.'icon_'.$attr8_icon.IMG_ICON_EXT;
	$attr8_size = '16x16';
?><img src="<?php echo $attr8_tmp_image_file ?>" border="0"<?php if(isset($attr8_align)) echo ' align="'.$attr8_align.'"' ?><?php if (isset($attr8_size)) { list($attr8_tmp_width,$attr8_tmp_height)=explode('x',$attr8_size);echo ' width="'.$attr8_tmp_width.'" height="'.$attr8_tmp_height.'"';} ?>><?php unset($attr8_icon);unset($attr8_align); ?><?php  $attr8_class='text';  $attr8_var='text';  $attr8_escape=true;  ?><?php
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
?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_var);unset($attr8_escape); ?><?php  ?></a><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?><?php if (!$attr6_tmp_last_exec) { ?>
<?php  ?><?php  $attr7_icon=$icon;  $attr7_align='left';  ?><?php
	$attr7_tmp_image_file = $image_dir.'icon_'.$attr7_icon.IMG_ICON_EXT;
	$attr7_size = '16x16';
?><img src="<?php echo $attr7_tmp_image_file ?>" border="0"<?php if(isset($attr7_align)) echo ' align="'.$attr7_align.'"' ?><?php if (isset($attr7_size)) { list($attr7_tmp_width,$attr7_tmp_height)=explode('x',$attr7_size);echo ' width="'.$attr7_tmp_width.'" height="'.$attr7_tmp_height.'"';} ?>><?php unset($attr7_icon);unset($attr7_align); ?><?php  $attr7_class='text';  $attr7_var='text';  $attr7_escape=true;  ?><?php
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
?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_var);unset($attr7_escape); ?><?php  ?><?php }
unset($attr5_tmp_last_exec) ?><?php  ?><?php  ?></td><?php  ?><?php  $attr5_var='url';  ?><?php
	if (!isset($attr5_value))
		unset($$attr5_var);
	elseif (isset($attr5_key))
		$$attr5_var = $attr5_value[$attr5_key];
	else
		$$attr5_var = $attr5_value;
?><?php unset($attr5_var); ?><?php  $attr5_var='image';  ?><?php
	if (!isset($attr5_value))
		unset($$attr5_var);
	elseif (isset($attr5_key))
		$$attr5_var = $attr5_value[$attr5_key];
	else
		$$attr5_var = $attr5_value;
?><?php unset($attr5_var); ?><?php  ?></tr><?php  ?><?php  ?><?php } ?><?php  ?><?php  ?></table><?php  ?><?php  ?></body>
</html><?php  ?>