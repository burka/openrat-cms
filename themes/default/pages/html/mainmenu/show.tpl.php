<?php $attr1_debug_info = 'a:1:{s:5:"class";s:4:"menu";}' ?><?php $attr1 = array('class'=>'menu') ?><?php $attr1_class='menu' ?><?php
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
?><script type="text/javascript" src="themes/default/js/jquery.js"></script>
    <script type="text/javascript" src="themes/default/js/jquery-lightbox.js"></script>
    <link rel="stylesheet" type="text/css" href="themes/default/js/lightbox/css/jquery-lightbox.css" media="screen" />
    <script type="text/javascript">
    $(function() {
        $('a.image').lightBox();
    });
    </script>
<?php if(!empty($root_stylesheet)) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $root_stylesheet ?>" />
<?php } ?>
<?php if($root_stylesheet!=$user_stylesheet) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $user_stylesheet ?>" />
<?php } ?>
</head>
<body class="<?php echo $attr1_class ?>" <?php if (@$conf['interface']['application_mode']) { ?> style="padding:0px;margin:0px;"<?php } ?> >
<?php unset($attr1) ?><?php unset($attr1_class) ?><?php $attr2_debug_info = 'a:5:{s:5:"width";s:4:"100%";s:5:"space";s:1:"0";s:7:"padding";s:1:"5";s:10:"rowclasses";s:3:"a,b";s:13:"columnclasses";s:3:"a,b";}' ?><?php $attr2 = array('width'=>'100%','space'=>'0','padding'=>'5','rowclasses'=>'a,b','columnclasses'=>'a,b') ?><?php $attr2_width='100%' ?><?php $attr2_space='0' ?><?php $attr2_padding='5' ?><?php $attr2_rowclasses='a,b' ?><?php $attr2_columnclasses='a,b' ?><?php
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
?><table class="<?php echo $attr2_class ?>" cellspacing="<?php echo $attr2_space ?>" width="<?php echo $attr2_width ?>" cellpadding="<?php echo $attr2_padding ?>"><?php unset($attr2) ?><?php unset($attr2_width) ?><?php unset($attr2_space) ?><?php unset($attr2_padding) ?><?php unset($attr2_rowclasses) ?><?php unset($attr2_columnclasses) ?><?php $attr3_debug_info = 'a:1:{s:4:"true";s:34:"!config:interface/application_mode";}' ?><?php $attr3 = array('true'=>! @$conf['interface']['application_mode']) ?><?php $attr3_true=! @$conf['interface']['application_mode'] ?><?php 
	if	( isset($attr3_true) )
	{
		if	(gettype($attr3_true) === '' && gettype($attr3_true) === '1')
			$exec = $$attr3_true == true;
		else
			$exec = $attr3_true == true;
	}
	elseif	( isset($attr3_false) )
	{
		if	(gettype($attr3_false) === '' && gettype($attr3_false) === '1')
			$exec = $$attr3_false == false;
		else
			$exec = $attr3_false == false;
	}
	elseif( isset($attr3_contains) )
		$exec = in_array($attr3_value,explode(',',$attr3_contains));
	elseif( isset($attr3_equals)&& isset($attr3_value) )
		$exec = $attr3_equals == $attr3_value;
	elseif( isset($attr3_lessthan)&& isset($attr3_value) )
		$exec = intval($attr3_lessthan) > intval($attr3_value);
	elseif( isset($attr3_greaterthan)&& isset($attr3_value) )
		$exec = intval($attr3_greaterthan) < intval($attr3_value);
	elseif	( isset($attr3_empty) )
	{
		if	( !isset($$attr3_empty) )
			$exec = empty($attr3_empty);
		elseif	( is_array($$attr3_empty) )
			$exec = (count($$attr3_empty)==0);
		elseif	( is_bool($$attr3_empty) )
			$exec = true;
		else
			$exec = empty( $$attr3_empty );
	}
	elseif	( isset($attr3_present) )
	{
		$exec = isset($$attr3_present);
	}
	else
	{
		trigger_error("error in IF, assume: FALSE");
		$exec = false;
	}
	if  ( !empty($attr3_invert) )
		$exec = !$exec;
	if  ( !empty($attr3_not) )
		$exec = !$exec;
	unset($attr3_true);
	unset($attr3_false);
	unset($attr3_notempty);
	unset($attr3_empty);
	unset($attr3_contains);
	unset($attr3_present);
	unset($attr3_invert);
	unset($attr3_not);
	unset($attr3_value);
	unset($attr3_equals);
	$last_exec = $exec;
	if	( $exec )
	{
?>
<?php unset($attr3) ?><?php unset($attr3_true) ?><?php $attr4_debug_info = 'a:0:{}' ?><?php $attr4 = array() ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr4_class))
		$attr4_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr4_class ?>"><?php unset($attr4) ?><?php $attr5_debug_info = 'a:1:{s:5:"class";s:4:"menu";}' ?><?php $attr5 = array('class'=>'menu') ?><?php $attr5_class='menu' ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr5_class))
		$attr5['class']=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr5_rowspan) )
		$attr5['width']=$column_widths[$cell_column_nr-1];
?><td <?php foreach( $attr5 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr5) ?><?php unset($attr5_class) ?><?php $attr6_debug_info = 'a:3:{s:6:"equals";s:5:"empty";s:5:"value";s:8:"var:type";s:3:"not";s:4:"true";}' ?><?php $attr6 = array('equals'=>'empty','value'=>$type,'not'=>true) ?><?php $attr6_equals='empty' ?><?php $attr6_value=$type ?><?php $attr6_not=true ?><?php 
	if	( isset($attr6_true) )
	{
		if	(gettype($attr6_true) === '' && gettype($attr6_true) === '1')
			$exec = $$attr6_true == true;
		else
			$exec = $attr6_true == true;
	}
	elseif	( isset($attr6_false) )
	{
		if	(gettype($attr6_false) === '' && gettype($attr6_false) === '1')
			$exec = $$attr6_false == false;
		else
			$exec = $attr6_false == false;
	}
	elseif( isset($attr6_contains) )
		$exec = in_array($attr6_value,explode(',',$attr6_contains));
	elseif( isset($attr6_equals)&& isset($attr6_value) )
		$exec = $attr6_equals == $attr6_value;
	elseif( isset($attr6_lessthan)&& isset($attr6_value) )
		$exec = intval($attr6_lessthan) > intval($attr6_value);
	elseif( isset($attr6_greaterthan)&& isset($attr6_value) )
		$exec = intval($attr6_greaterthan) < intval($attr6_value);
	elseif	( isset($attr6_empty) )
	{
		if	( !isset($$attr6_empty) )
			$exec = empty($attr6_empty);
		elseif	( is_array($$attr6_empty) )
			$exec = (count($$attr6_empty)==0);
		elseif	( is_bool($$attr6_empty) )
			$exec = true;
		else
			$exec = empty( $$attr6_empty );
	}
	elseif	( isset($attr6_present) )
	{
		$exec = isset($$attr6_present);
	}
	else
	{
		trigger_error("error in IF, assume: FALSE");
		$exec = false;
	}
	if  ( !empty($attr6_invert) )
		$exec = !$exec;
	if  ( !empty($attr6_not) )
		$exec = !$exec;
	unset($attr6_true);
	unset($attr6_false);
	unset($attr6_notempty);
	unset($attr6_empty);
	unset($attr6_contains);
	unset($attr6_present);
	unset($attr6_invert);
	unset($attr6_not);
	unset($attr6_value);
	unset($attr6_equals);
	$last_exec = $exec;
	if	( $exec )
	{
?>
<?php unset($attr6) ?><?php unset($attr6_equals) ?><?php unset($attr6_value) ?><?php unset($attr6_not) ?><?php $attr7_debug_info = 'a:2:{s:5:"align";s:4:"left";s:4:"type";s:8:"var:type";}' ?><?php $attr7 = array('align'=>'left','type'=>$type) ?><?php $attr7_align='left' ?><?php $attr7_type=$type ?><?php
if (isset($attr7_elementtype)) {
?><img src="<?php echo $image_dir.'icon_el_'.$attr7_elementtype.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_type)) {
?><img src="<?php echo $image_dir.'icon_'.$attr7_type.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_icon)) {
?><img src="<?php echo $image_dir.'icon_'.$attr7_icon.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_tree)) {
?><img src="<?php echo $image_dir.'tree_'.$attr7_tree.IMG_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_url)) {
?><img src="<?php echo $attr7_url ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_fileext)) {
?><img src="<?php echo $image_dir.$attr7_fileext ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_file)) {
?><img src="<?php echo $image_dir.$attr7_file.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php } ?><?php unset($attr7) ?><?php unset($attr7_align) ?><?php unset($attr7_type) ?><?php $attr5_debug_info = 'a:0:{}' ?><?php $attr5 = array() ?><?php } ?><?php unset($attr5) ?><?php $attr6_debug_info = 'a:4:{s:4:"list";s:4:"path";s:7:"extract";s:4:"true";s:3:"key";s:8:"list_key";s:5:"value";s:2:"xy";}' ?><?php $attr6 = array('list'=>'path','extract'=>true,'key'=>'list_key','value'=>'xy') ?><?php $attr6_list='path' ?><?php $attr6_extract=true ?><?php $attr6_key='list_key' ?><?php $attr6_value='xy' ?><?php
	$attr6_list_tmp_key   = $attr6_key;
	$attr6_list_tmp_value = $attr6_value;
	$attr6_list_extract   = $attr6_extract;
	unset($attr6_key);
	unset($attr6_value);
	if	( !isset($$attr6_list) || !is_array($$attr6_list) )
		$$attr6_list = array();
	foreach( $$attr6_list as $$attr6_list_tmp_key => $$attr6_list_tmp_value )
	{
		if	( $attr6_list_extract )
		{
			if	( !is_array($$attr6_list_tmp_value) )
			{
				print_r($$attr6_list_tmp_value);
				die( 'not an array at key: '.$$attr6_list_tmp_key );
			}
			extract($$attr6_list_tmp_value);
		}
?><?php unset($attr6) ?><?php unset($attr6_list) ?><?php unset($attr6_extract) ?><?php unset($attr6_key) ?><?php unset($attr6_value) ?><?php $attr7_debug_info = 'a:4:{s:5:"title";s:9:"var:title";s:6:"target";s:8:"cms_main";s:3:"url";s:7:"var:url";s:5:"class";s:4:"path";}' ?><?php $attr7 = array('title'=>$title,'target'=>'cms_main','url'=>$url,'class'=>'path') ?><?php $attr7_title=$title ?><?php $attr7_target='cms_main' ?><?php $attr7_url=$url ?><?php $attr7_class='path' ?><?php
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
?><a<?php if (isset($attr7_name)) echo ' name="'.$attr7_name.'"'; else echo ' href="'.$tmp_url.($attr7_anchor?'#'.$attr7_anchor:'').'"' ?> class="<?php echo $attr7_class ?>" target="<?php echo $attr7_target ?>"<?php if (isset($attr7_accesskey)) echo ' accesskey="'.$attr7_accesskey.'"' ?>  title="<?php echo encodeHtml($attr7_title) ?>"><?php unset($attr7) ?><?php unset($attr7_title) ?><?php unset($attr7_target) ?><?php unset($attr7_url) ?><?php unset($attr7_class) ?><?php $attr8_debug_info = 'a:4:{s:5:"class";s:4:"text";s:3:"var";s:4:"name";s:9:"maxlength";s:2:"20";s:6:"escape";s:4:"true";}' ?><?php $attr8 = array('class'=>'text','var'=>'name','maxlength'=>'20','escape'=>true) ?><?php $attr8_class='text' ?><?php $attr8_var='name' ?><?php $attr8_maxlength='20' ?><?php $attr8_escape=true ?><?php
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
?></<?php echo $tmp_tag ?>><?php unset($attr8) ?><?php unset($attr8_class) ?><?php unset($attr8_var) ?><?php unset($attr8_maxlength) ?><?php unset($attr8_escape) ?><?php $attr6_debug_info = 'a:0:{}' ?><?php $attr6 = array() ?></a><?php unset($attr6) ?><?php $attr7_debug_info = 'a:1:{s:4:"type";s:7:"filesep";}' ?><?php $attr7 = array('type'=>'filesep') ?><?php $attr7_type='filesep' ?><?php
	if ($attr7_type=='filesep')
		echo '&nbsp;<strong>&raquo;</strong>&nbsp;';
	else
		echo "char error";
?><?php unset($attr7) ?><?php unset($attr7_type) ?><?php $attr5_debug_info = 'a:0:{}' ?><?php $attr5 = array() ?><?php } ?><?php unset($attr5) ?><?php $attr6_debug_info = 'a:4:{s:5:"title";s:8:"var:text";s:5:"class";s:5:"title";s:3:"var";s:4:"text";s:6:"escape";s:4:"true";}' ?><?php $attr6 = array('title'=>$text,'class'=>'title','var'=>'text','escape'=>true) ?><?php $attr6_title=$text ?><?php $attr6_class='title' ?><?php $attr6_var='text' ?><?php $attr6_escape=true ?><?php
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
?></<?php echo $tmp_tag ?>><?php unset($attr6) ?><?php unset($attr6_title) ?><?php unset($attr6_class) ?><?php unset($attr6_var) ?><?php unset($attr6_escape) ?><?php $attr4_debug_info = 'a:0:{}' ?><?php $attr4 = array() ?></td><?php unset($attr4) ?><?php $attr5_debug_info = 'a:2:{s:5:"style";s:18:":text-align:right;";s:5:"class";s:4:"menu";}' ?><?php $attr5 = array('style'=>'text-align:right;','class'=>'menu') ?><?php $attr5_style='text-align:right;' ?><?php $attr5_class='menu' ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr5_class))
		$attr5['class']=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr5_rowspan) )
		$attr5['width']=$column_widths[$cell_column_nr-1];
?><td <?php foreach( $attr5 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr5) ?><?php unset($attr5_style) ?><?php unset($attr5_class) ?><?php $attr6_debug_info = 'a:1:{s:4:"true";s:15:"property:search";}' ?><?php $attr6 = array('true'=>$this->search) ?><?php $attr6_true=$this->search ?><?php 
	if	( isset($attr6_true) )
	{
		if	(gettype($attr6_true) === '' && gettype($attr6_true) === '1')
			$exec = $$attr6_true == true;
		else
			$exec = $attr6_true == true;
	}
	elseif	( isset($attr6_false) )
	{
		if	(gettype($attr6_false) === '' && gettype($attr6_false) === '1')
			$exec = $$attr6_false == false;
		else
			$exec = $attr6_false == false;
	}
	elseif( isset($attr6_contains) )
		$exec = in_array($attr6_value,explode(',',$attr6_contains));
	elseif( isset($attr6_equals)&& isset($attr6_value) )
		$exec = $attr6_equals == $attr6_value;
	elseif( isset($attr6_lessthan)&& isset($attr6_value) )
		$exec = intval($attr6_lessthan) > intval($attr6_value);
	elseif( isset($attr6_greaterthan)&& isset($attr6_value) )
		$exec = intval($attr6_greaterthan) < intval($attr6_value);
	elseif	( isset($attr6_empty) )
	{
		if	( !isset($$attr6_empty) )
			$exec = empty($attr6_empty);
		elseif	( is_array($$attr6_empty) )
			$exec = (count($$attr6_empty)==0);
		elseif	( is_bool($$attr6_empty) )
			$exec = true;
		else
			$exec = empty( $$attr6_empty );
	}
	elseif	( isset($attr6_present) )
	{
		$exec = isset($$attr6_present);
	}
	else
	{
		trigger_error("error in IF, assume: FALSE");
		$exec = false;
	}
	if  ( !empty($attr6_invert) )
		$exec = !$exec;
	if  ( !empty($attr6_not) )
		$exec = !$exec;
	unset($attr6_true);
	unset($attr6_false);
	unset($attr6_notempty);
	unset($attr6_empty);
	unset($attr6_contains);
	unset($attr6_present);
	unset($attr6_invert);
	unset($attr6_not);
	unset($attr6_value);
	unset($attr6_equals);
	$last_exec = $exec;
	if	( $exec )
	{
?>
<?php unset($attr6) ?><?php unset($attr6_true) ?><?php $attr7_debug_info = 'a:6:{s:6:"action";s:6:"search";s:9:"subaction";s:11:"quicksearch";s:4:"name";s:0:"";s:6:"target";s:13:"cms_main_main";s:6:"method";s:4:"post";s:7:"enctype";s:33:"application/x-www-form-urlencoded";}' ?><?php $attr7 = array('action'=>'search','subaction'=>'quicksearch','name'=>'','target'=>'cms_main_main','method'=>'post','enctype'=>'application/x-www-form-urlencoded') ?><?php $attr7_action='search' ?><?php $attr7_subaction='quicksearch' ?><?php $attr7_name='' ?><?php $attr7_target='cms_main_main' ?><?php $attr7_method='post' ?><?php $attr7_enctype='application/x-www-form-urlencoded' ?><?php
	if	(empty($attr7_action))
		$attr7_action = $actionName;
	if	(empty($attr7_subaction))
		$attr7_subaction = $targetSubActionName;
	if	(empty($attr7_id))
		$attr7_id = $this->getRequestId();
	if ($this->isEditable() && $this->getRequestVar('mode')!='edit')
		$attr7_subaction = $subActionName;
?><form name="<?php echo $attr7_name ?>"
      target="<?php echo $attr7_target ?>"
      action="<?php echo Html::url( $attr7_action,$attr7_subaction,$attr7_id ) ?>"
      method="<?php echo $attr7_method ?>"
      enctype="<?php echo $attr7_enctype ?>" style="margin:0px;padding:0px;">
<?php if ($this->isEditable() && $this->getRequestVar('mode')!='edit') { ?>
<input type="hidden" name="mode" value="edit" />
<?php } ?>
<input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo $attr7_action ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo $attr7_subaction ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo $attr7_id ?>" /><?php
		if	( $conf['interface']['url_sessionid'] )
			echo '<input type="hidden" name="'.session_name().'" value="'.session_id().'" />'."\n";
?><?php unset($attr7) ?><?php unset($attr7_action) ?><?php unset($attr7_subaction) ?><?php unset($attr7_name) ?><?php unset($attr7_target) ?><?php unset($attr7_method) ?><?php unset($attr7_enctype) ?><?php $attr8_debug_info = 'a:8:{s:5:"class";s:6:"search";s:7:"default";s:0:"";s:4:"type";s:4:"text";s:4:"name";s:6:"search";s:4:"size";s:2:"15";s:9:"maxlength";s:3:"256";s:8:"onchange";s:0:"";s:8:"readonly";s:5:"false";}' ?><?php $attr8 = array('class'=>'search','default'=>'','type'=>'text','name'=>'search','size'=>'15','maxlength'=>'256','onchange'=>'','readonly'=>false) ?><?php $attr8_class='search' ?><?php $attr8_default='' ?><?php $attr8_type='text' ?><?php $attr8_name='search' ?><?php $attr8_size='15' ?><?php $attr8_maxlength='256' ?><?php $attr8_onchange='' ?><?php $attr8_readonly=false ?><?php if ($this->isEditable() && $this->getRequestVar('mode')!='edit') $attr8_readonly=true;
	  if ($attr8_readonly && empty($$attr8_name)) $$attr8_name = '- '.lang('EMPTY').' -';
      if(!isset($attr8_default)) $attr8_default='';
?><?php if (!$attr8_readonly || $attr8_type=='hidden') {
?><input<?php if ($attr8_readonly) echo ' disabled="true"' ?> id="id_<?php echo $attr8_name ?><?php if ($attr8_readonly) echo '_disabled' ?>" name="<?php echo $attr8_name ?><?php if ($attr8_readonly) echo '_disabled' ?>" type="<?php echo $attr8_type ?>" size="<?php echo $attr8_size ?>" maxlength="<?php echo $attr8_maxlength ?>" class="<?php echo $attr8_class ?>" value="<?php echo isset($$attr8_name)?$$attr8_name:$attr8_default ?>" <?php if (in_array($attr8_name,$errors)) echo 'style="border-rightx:10px solid red; background-colorx:yellow; border:2px dashed red;"' ?> /><?php
if	($attr8_readonly) {
?><input type="hidden" id="id_<?php echo $attr8_name ?>" name="<?php echo $attr8_name ?>" value="<?php echo isset($$attr8_name)?$$attr8_name:$attr8_default ?>" /><?php
 } } else { ?><span class="<?php echo $attr8_class ?>"><?php echo isset($$attr8_name)?$$attr8_name:$attr8_default ?></span><?php } ?><?php unset($attr8) ?><?php unset($attr8_class) ?><?php unset($attr8_default) ?><?php unset($attr8_type) ?><?php unset($attr8_name) ?><?php unset($attr8_size) ?><?php unset($attr8_maxlength) ?><?php unset($attr8_onchange) ?><?php unset($attr8_readonly) ?><?php $attr8_debug_info = 'a:1:{s:4:"true";s:37:"config:search/quicksearch/show_button";}' ?><?php $attr8 = array('true'=>@$conf['search']['quicksearch']['show_button']) ?><?php $attr8_true=@$conf['search']['quicksearch']['show_button'] ?><?php 
	if	( isset($attr8_true) )
	{
		if	(gettype($attr8_true) === '' && gettype($attr8_true) === '1')
			$exec = $$attr8_true == true;
		else
			$exec = $attr8_true == true;
	}
	elseif	( isset($attr8_false) )
	{
		if	(gettype($attr8_false) === '' && gettype($attr8_false) === '1')
			$exec = $$attr8_false == false;
		else
			$exec = $attr8_false == false;
	}
	elseif( isset($attr8_contains) )
		$exec = in_array($attr8_value,explode(',',$attr8_contains));
	elseif( isset($attr8_equals)&& isset($attr8_value) )
		$exec = $attr8_equals == $attr8_value;
	elseif( isset($attr8_lessthan)&& isset($attr8_value) )
		$exec = intval($attr8_lessthan) > intval($attr8_value);
	elseif( isset($attr8_greaterthan)&& isset($attr8_value) )
		$exec = intval($attr8_greaterthan) < intval($attr8_value);
	elseif	( isset($attr8_empty) )
	{
		if	( !isset($$attr8_empty) )
			$exec = empty($attr8_empty);
		elseif	( is_array($$attr8_empty) )
			$exec = (count($$attr8_empty)==0);
		elseif	( is_bool($$attr8_empty) )
			$exec = true;
		else
			$exec = empty( $$attr8_empty );
	}
	elseif	( isset($attr8_present) )
	{
		$exec = isset($$attr8_present);
	}
	else
	{
		trigger_error("error in IF, assume: FALSE");
		$exec = false;
	}
	if  ( !empty($attr8_invert) )
		$exec = !$exec;
	if  ( !empty($attr8_not) )
		$exec = !$exec;
	unset($attr8_true);
	unset($attr8_false);
	unset($attr8_notempty);
	unset($attr8_empty);
	unset($attr8_contains);
	unset($attr8_present);
	unset($attr8_invert);
	unset($attr8_not);
	unset($attr8_value);
	unset($attr8_equals);
	$last_exec = $exec;
	if	( $exec )
	{
?>
<?php unset($attr8) ?><?php unset($attr8_true) ?><?php $attr9_debug_info = 'a:4:{s:4:"type";s:2:"ok";s:5:"class";s:12:"searchbutton";s:5:"value";s:2:"ok";s:4:"text";s:6:"search";}' ?><?php $attr9 = array('type'=>'ok','class'=>'searchbutton','value'=>'ok','text'=>'search') ?><?php $attr9_type='ok' ?><?php $attr9_class='searchbutton' ?><?php $attr9_value='ok' ?><?php $attr9_text='search' ?><?php
	if ($attr9_type=='ok')
	{
		if ($this->isEditable() && !$this->isEditMode())
		$attr9_text = 'MODE_EDIT';
	}
	if ($attr9_type=='ok')
		$attr9_type  = 'submit';
	if (isset($attr9_src))
		$attr9_type  = 'image';
	else
		$attr9_src  = '';
?><input type="<?php echo $attr9_type ?>"<?php if(isset($attr9_src)) { ?> src="<?php echo $image_dir.'icon_'.$attr9_src.IMG_ICON_EXT ?>"<?php } ?> name="<?php echo $attr9_value ?>" class="<?php echo $attr9_class ?>" title="<?php echo lang($attr9_text.'_DESC') ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;<?php echo langHtml($attr9_text) ?>&nbsp;&nbsp;&nbsp;&nbsp;" /><?php unset($attr9_src) ?><?php
?><?php unset($attr9) ?><?php unset($attr9_type) ?><?php unset($attr9_class) ?><?php unset($attr9_value) ?><?php unset($attr9_text) ?><?php $attr7_debug_info = 'a:0:{}' ?><?php $attr7 = array() ?><?php } ?><?php unset($attr7) ?><?php $attr6_debug_info = 'a:0:{}' ?><?php $attr6 = array() ?></form>
<?php unset($attr6) ?><?php $attr5_debug_info = 'a:0:{}' ?><?php $attr5 = array() ?><?php } ?><?php unset($attr5) ?><?php $attr4_debug_info = 'a:0:{}' ?><?php $attr4 = array() ?></td><?php unset($attr4) ?><?php $attr3_debug_info = 'a:0:{}' ?><?php $attr3 = array() ?></tr><?php unset($attr3) ?><?php $attr2_debug_info = 'a:0:{}' ?><?php $attr2 = array() ?><?php } ?><?php unset($attr2) ?><?php $attr3_debug_info = 'a:0:{}' ?><?php $attr3 = array() ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];
	if (empty($attr3_class))
		$attr3_class=$row_class;
	global $cell_column_nr;
	$cell_column_nr=0;
	$column_class_idx = 999;
?><tr class="<?php echo $attr3_class ?>"><?php unset($attr3) ?><?php $attr4_debug_info = 'a:2:{s:5:"class";s:9:"subaction";s:7:"colspan";s:1:"2";}' ?><?php $attr4 = array('class'=>'subaction','colspan'=>'2') ?><?php $attr4_class='subaction' ?><?php $attr4_colspan='2' ?><?php
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr4_class))
		$attr4['class']=$column_class;
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr4_rowspan) )
		$attr4['width']=$column_widths[$cell_column_nr-1];
?><td <?php foreach( $attr4 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr4) ?><?php unset($attr4_class) ?><?php unset($attr4_colspan) ?><?php $attr5_debug_info = 'a:4:{s:4:"list";s:10:"windowMenu";s:7:"extract";s:4:"true";s:3:"key";s:8:"list_key";s:5:"value";s:2:"xy";}' ?><?php $attr5 = array('list'=>'windowMenu','extract'=>true,'key'=>'list_key','value'=>'xy') ?><?php $attr5_list='windowMenu' ?><?php $attr5_extract=true ?><?php $attr5_key='list_key' ?><?php $attr5_value='xy' ?><?php
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
?><?php unset($attr5) ?><?php unset($attr5_list) ?><?php unset($attr5_extract) ?><?php unset($attr5_key) ?><?php unset($attr5_value) ?><?php $attr6_debug_info = 'a:2:{s:3:"not";s:4:"true";s:5:"empty";s:3:"url";}' ?><?php $attr6 = array('not'=>true,'empty'=>'url') ?><?php $attr6_not=true ?><?php $attr6_empty='url' ?><?php 
	if	( isset($attr6_true) )
	{
		if	(gettype($attr6_true) === '' && gettype($attr6_true) === '1')
			$exec = $$attr6_true == true;
		else
			$exec = $attr6_true == true;
	}
	elseif	( isset($attr6_false) )
	{
		if	(gettype($attr6_false) === '' && gettype($attr6_false) === '1')
			$exec = $$attr6_false == false;
		else
			$exec = $attr6_false == false;
	}
	elseif( isset($attr6_contains) )
		$exec = in_array($attr6_value,explode(',',$attr6_contains));
	elseif( isset($attr6_equals)&& isset($attr6_value) )
		$exec = $attr6_equals == $attr6_value;
	elseif( isset($attr6_lessthan)&& isset($attr6_value) )
		$exec = intval($attr6_lessthan) > intval($attr6_value);
	elseif( isset($attr6_greaterthan)&& isset($attr6_value) )
		$exec = intval($attr6_greaterthan) < intval($attr6_value);
	elseif	( isset($attr6_empty) )
	{
		if	( !isset($$attr6_empty) )
			$exec = empty($attr6_empty);
		elseif	( is_array($$attr6_empty) )
			$exec = (count($$attr6_empty)==0);
		elseif	( is_bool($$attr6_empty) )
			$exec = true;
		else
			$exec = empty( $$attr6_empty );
	}
	elseif	( isset($attr6_present) )
	{
		$exec = isset($$attr6_present);
	}
	else
	{
		trigger_error("error in IF, assume: FALSE");
		$exec = false;
	}
	if  ( !empty($attr6_invert) )
		$exec = !$exec;
	if  ( !empty($attr6_not) )
		$exec = !$exec;
	unset($attr6_true);
	unset($attr6_false);
	unset($attr6_notempty);
	unset($attr6_empty);
	unset($attr6_contains);
	unset($attr6_present);
	unset($attr6_invert);
	unset($attr6_not);
	unset($attr6_value);
	unset($attr6_equals);
	$last_exec = $exec;
	if	( $exec )
	{
?>
<?php unset($attr6) ?><?php unset($attr6_not) ?><?php unset($attr6_empty) ?><?php $attr7_debug_info = 'a:5:{s:5:"title";s:9:"var:title";s:6:"target";s:13:"cms_main_main";s:3:"url";s:7:"var:url";s:5:"class";s:4:"menu";s:9:"accesskey";s:7:"var:key";}' ?><?php $attr7 = array('title'=>$title,'target'=>'cms_main_main','url'=>$url,'class'=>'menu','accesskey'=>$key) ?><?php $attr7_title=$title ?><?php $attr7_target='cms_main_main' ?><?php $attr7_url=$url ?><?php $attr7_class='menu' ?><?php $attr7_accesskey=$key ?><?php
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
?><a<?php if (isset($attr7_name)) echo ' name="'.$attr7_name.'"'; else echo ' href="'.$tmp_url.($attr7_anchor?'#'.$attr7_anchor:'').'"' ?> class="<?php echo $attr7_class ?>" target="<?php echo $attr7_target ?>"<?php if (isset($attr7_accesskey)) echo ' accesskey="'.$attr7_accesskey.'"' ?>  title="<?php echo encodeHtml($attr7_title) ?>"><?php unset($attr7) ?><?php unset($attr7_title) ?><?php unset($attr7_target) ?><?php unset($attr7_url) ?><?php unset($attr7_class) ?><?php unset($attr7_accesskey) ?><?php $attr8_debug_info = 'a:4:{s:5:"class";s:4:"text";s:7:"textvar";s:4:"text";s:9:"accesskey";s:7:"var:key";s:6:"escape";s:4:"true";}' ?><?php $attr8 = array('class'=>'text','textvar'=>'text','accesskey'=>$key,'escape'=>true) ?><?php $attr8_class='text' ?><?php $attr8_textvar='text' ?><?php $attr8_accesskey=$key ?><?php $attr8_escape=true ?><?php
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
?></<?php echo $tmp_tag ?>><?php unset($attr8) ?><?php unset($attr8_class) ?><?php unset($attr8_textvar) ?><?php unset($attr8_accesskey) ?><?php unset($attr8_escape) ?><?php $attr6_debug_info = 'a:0:{}' ?><?php $attr6 = array() ?></a><?php unset($attr6) ?><?php $attr5_debug_info = 'a:0:{}' ?><?php $attr5 = array() ?><?php } ?><?php unset($attr5) ?><?php $attr6_debug_info = 'a:1:{s:5:"empty";s:3:"url";}' ?><?php $attr6 = array('empty'=>'url') ?><?php $attr6_empty='url' ?><?php 
	if	( isset($attr6_true) )
	{
		if	(gettype($attr6_true) === '' && gettype($attr6_true) === '1')
			$exec = $$attr6_true == true;
		else
			$exec = $attr6_true == true;
	}
	elseif	( isset($attr6_false) )
	{
		if	(gettype($attr6_false) === '' && gettype($attr6_false) === '1')
			$exec = $$attr6_false == false;
		else
			$exec = $attr6_false == false;
	}
	elseif( isset($attr6_contains) )
		$exec = in_array($attr6_value,explode(',',$attr6_contains));
	elseif( isset($attr6_equals)&& isset($attr6_value) )
		$exec = $attr6_equals == $attr6_value;
	elseif( isset($attr6_lessthan)&& isset($attr6_value) )
		$exec = intval($attr6_lessthan) > intval($attr6_value);
	elseif( isset($attr6_greaterthan)&& isset($attr6_value) )
		$exec = intval($attr6_greaterthan) < intval($attr6_value);
	elseif	( isset($attr6_empty) )
	{
		if	( !isset($$attr6_empty) )
			$exec = empty($attr6_empty);
		elseif	( is_array($$attr6_empty) )
			$exec = (count($$attr6_empty)==0);
		elseif	( is_bool($$attr6_empty) )
			$exec = true;
		else
			$exec = empty( $$attr6_empty );
	}
	elseif	( isset($attr6_present) )
	{
		$exec = isset($$attr6_present);
	}
	else
	{
		trigger_error("error in IF, assume: FALSE");
		$exec = false;
	}
	if  ( !empty($attr6_invert) )
		$exec = !$exec;
	if  ( !empty($attr6_not) )
		$exec = !$exec;
	unset($attr6_true);
	unset($attr6_false);
	unset($attr6_notempty);
	unset($attr6_empty);
	unset($attr6_contains);
	unset($attr6_present);
	unset($attr6_invert);
	unset($attr6_not);
	unset($attr6_value);
	unset($attr6_equals);
	$last_exec = $exec;
	if	( $exec )
	{
?>
<?php unset($attr6) ?><?php unset($attr6_empty) ?><?php $attr7_debug_info = 'a:3:{s:5:"class";s:13:"menu_disabled";s:7:"textvar";s:4:"text";s:6:"escape";s:4:"true";}' ?><?php $attr7 = array('class'=>'menu_disabled','textvar'=>'text','escape'=>true) ?><?php $attr7_class='menu_disabled' ?><?php $attr7_textvar='text' ?><?php $attr7_escape=true ?><?php
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
?></<?php echo $tmp_tag ?>><?php unset($attr7) ?><?php unset($attr7_class) ?><?php unset($attr7_textvar) ?><?php unset($attr7_escape) ?><?php $attr5_debug_info = 'a:0:{}' ?><?php $attr5 = array() ?><?php } ?><?php unset($attr5) ?><?php $attr6_debug_info = 'a:3:{s:5:"class";s:4:"text";s:3:"raw";s:2:"__";s:6:"escape";s:4:"true";}' ?><?php $attr6 = array('class'=>'text','raw'=>'__','escape'=>true) ?><?php $attr6_class='text' ?><?php $attr6_raw='__' ?><?php $attr6_escape=true ?><?php
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
?></<?php echo $tmp_tag ?>><?php unset($attr6) ?><?php unset($attr6_class) ?><?php unset($attr6_raw) ?><?php unset($attr6_escape) ?><?php $attr4_debug_info = 'a:0:{}' ?><?php $attr4 = array() ?><?php } ?><?php unset($attr4) ?><?php $attr5_debug_info = 'a:3:{s:5:"class";s:4:"text";s:3:"raw";s:1:"_";s:6:"escape";s:4:"true";}' ?><?php $attr5 = array('class'=>'text','raw'=>'_','escape'=>true) ?><?php $attr5_class='text' ?><?php $attr5_raw='_' ?><?php $attr5_escape=true ?><?php
	if	( isset($attr5_prefix)&& isset($attr5_key))
		$attr5_key = $attr5_prefix.$attr5_key;
	if	( isset($attr5_suffix)&& isset($attr5_key))
		$attr5_key = $attr5_key.$attr5_suffix;
	if(empty($attr5_title))
			$attr5_title = '';
	if	(empty($attr5_type))
		$tmp_tag = 'span';
	else
		switch( $attr5_type )
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
?><<?php echo $tmp_tag ?> class="<?php echo $attr5_class ?>" title="<?php echo $attr5_title ?>"><?php
	$attr5_title = '';
	if	( $attr5_escape )
		$langF = 'langHtml';
	else
		$langF = 'lang';
	if (!empty($attr5_array))
	{
		$tmpArray = $$attr5_array;
		if (!empty($attr5_var))
			$tmp_text = $tmpArray[$attr5_var];
		else
			$tmp_text = $langF($tmpArray[$attr5_text]);
	}
	elseif (!empty($attr5_text))
		$tmp_text = $langF($attr5_text);
	elseif (!empty($attr5_textvar))
		$tmp_text = $langF($$attr5_textvar);
	elseif (!empty($attr5_key))
		$tmp_text = $langF($attr5_key);
	elseif (!empty($attr5_var))
		$tmp_text = isset($$attr5_var)?$$attr5_var:'?unset:'.$attr5_var.'?';	
	elseif (!empty($attr5_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr5_raw);
	elseif (!empty($attr5_value))
		$tmp_text = $attr5_value;
	else
	  $tmp_text = '&nbsp;';
	if	( !empty($attr5_maxlength) && intval($attr5_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr5_maxlength) );
	if	(isset($attr5_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr5_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
	echo $tmp_text;
	unset($tmp_text);
?></<?php echo $tmp_tag ?>><?php unset($attr5) ?><?php unset($attr5_class) ?><?php unset($attr5_raw) ?><?php unset($attr5_escape) ?><?php $attr3_debug_info = 'a:0:{}' ?><?php $attr3 = array() ?></td><?php unset($attr3) ?><?php $attr2_debug_info = 'a:0:{}' ?><?php $attr2 = array() ?></tr><?php unset($attr2) ?><?php $attr1_debug_info = 'a:0:{}' ?><?php $attr1 = array() ?></table><?php unset($attr1) ?><?php $attr0_debug_info = 'a:0:{}' ?><?php $attr0 = array() ?></body>
</html><?php unset($attr0) ?>