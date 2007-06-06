<?php $attr1 = array('class'=>'main','title'=>$cms_title) ?><?php $attr1_class='main' ?><?php $attr1_title=$cms_title ?><?php header('Content-Type: text/html; charset='.lang('CHARSET'))
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <title><?php echo $attr1_title ?></title>
  <meta http-equiv="content-type" content="text/html; charset=<?php echo lang('CHARSET') ?>" />
  <meta name="MSSmartTagsPreventParsing" content="true" />
  <meta name="robots" content="noindex,nofollow" />
<?php if (isset($windowMenu) && is_array($windowMenu)) foreach( $windowMenu as $menu )
      {
       	?>
  <link rel="section" href="<?php echo Html::url($actionName,@$menu['subaction'],$this->getRequestId() ) ?>" title="<?php echo lang($menu['text']) ?>" />
<?php
      }
?>
<?php if(!empty($root_stylesheet)) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $root_stylesheet ?>" />
<?php } ?>
<?php if($root_stylesheet!=$user_stylesheet) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $user_stylesheet ?>" />
<?php } ?>
</head>

<body class="<?php echo $attr1_class ?>">

<?php unset($attr1) ?><?php unset($attr1_class) ?><?php unset($attr1_title) ?><?php $attr2 = array('title'=>'GLOBAL_PROJECTS','name'=>'login','icon'=>'project','width'=>'600','rowclasses'=>'odd,even','columnclasses'=>'1,2,3') ?><?php $attr2_title='GLOBAL_PROJECTS' ?><?php $attr2_name='login' ?><?php $attr2_icon='project' ?><?php $attr2_width='600' ?><?php $attr2_rowclasses='odd,even' ?><?php $attr2_columnclasses='1,2,3' ?><?php
	$coloumn_widths=array();
	if	(!empty($attr2_widths))
	{
		$column_widths = explode(',',$attr2_widths);
		unset($attr2['widths']);
	}
	if	(!empty($attr2_rowclasses))
	{
		$row_classes   = explode(',',$attr2_rowclasses);
		$row_class_idx = 999;
		unset($attr2['rowclasses']);
	}
	if	(!empty($attr2_columnclasses))
	{
		$column_classes = explode(',',$attr2_columnclasses);
		unset($attr2['columnclasses']);
	}
		global $image_dir;
		echo '<br/><br/><br/><center>';
		echo '<table class="main" cellspacing="0" cellpadding="4" width="'.$attr2_width.'">';
		echo '<tr><td class="menu">';
		if	( !empty($attr2_icon) )
			echo '<img src="'.$image_dir.'icon_'.$attr2_icon.IMG_ICON_EXT.'" align="left" border="0">';
		if	( !isset($path) || is_array($path) )
			$path = array();
		foreach( $path as $pathElement)
		{
			extract($pathElement);
			echo '<a href="'.$url.'" class="path">'.lang($name).'</a>';
			echo '&nbsp;&raquo;&nbsp;';
		}
		echo '<span class="title">'.lang($windowTitle).'</span>';
		?>
		</td><!--<td class="menu" style="align:right;">
    <?php if (isset($windowIcons)) foreach( $windowIcons as $icon )
          {
          	?><a href="<?php echo $icon['url'] ?>" title="<?php echo 'ICON_'.lang($menu['type'].'_DESC') ?>"><image border="0" src="<?php echo $image_dir.$icon['type'].IMG_ICON_EXT ?>"></a>&nbsp;<?php
          }
     ?>
    </td>-->
  </tr>
  <tr><td class="subaction">
  
    <?php if	( !isset($windowMenu) || !is_array($windowMenu) )
			$windowMenu = array();
    foreach( $windowMenu as $menu )
          {
          	$tmp_text = lang($menu['text']);
          	$tmp_key  = strtoupper(lang($menu['key' ]));
			$tmp_pos = strpos(strtolower($tmp_text),strtolower($tmp_key));
			if	( $tmp_pos !== false )
				$tmp_text = substr($tmp_text,0,max($tmp_pos,0)).'<span class="accesskey">'. substr($tmp_text,$tmp_pos,1).'</span>'.substr($tmp_text,$tmp_pos+1);
          	
          	if	( isset($menu['url']) )
          	{
          		?><a href="<?php echo Html::url($actionName,$menu['subaction'],$this->getRequestId() ) ?>" accesskey="<?php echo $tmp_key ?>" title="<?php echo lang($menu['text'].'_DESC') ?>" class="menu<?php echo $this->subActionName==$menu['subaction']?'_highlight':'' ?>"><?php echo $tmp_text ?></a>&nbsp;&nbsp;&nbsp;<?php
          	}
          	else
          	{
          		?><span class="menu_disabled" title="<?php echo lang($menu['text'].'_DESC') ?>" class="menu_disabled"><?php echo $tmp_text ?></span>&nbsp;&nbsp;&nbsp;<?php
          	}
          }
          	if ($conf['help']['enabled'] )
          	{
             ?><a href="<?php echo $conf['help']['url'].$actionName.'/'.$subActionName.$conf['help']['suffix'] ?> " target="_new" title="<?php echo lang('GLOBAL_HELP') ?>" class="menu">?</a><?php
          	}
          	?></td>
  </tr>

<?php if (isset($notices) && count($notices)>0 )
      { ?>
      	
  <tr>
    <td><table>
    
  <?php foreach( $notices as $notice ) { ?>
    
  <tr>
    <td><img src="<?php echo $image_dir.'notice_'.$notice['status'].IMG_ICON_EXT ?>" style="padding:10px" /></td>
    <td class="f1"><?php if ($notice['name']!='') { ?><img src="<?php echo $image_dir.'icon_'.$notice['type'].IMG_ICON_EXT ?>" align="left" /><?php echo $notice['name'] ?>: <?php } ?><?php if ($notice['status']=='error') { ?><strong><?php } ?><?php echo $notice['text'] ?><?php if ($notice['status']=='error') { ?></strong><?php } ?></td>
  </tr>
  <?php } ?>
  
    </table></td>
  </tr>

<?php } ?>



  <tr>
    <td>
      <table class="n" cellspacing="0" width="100%" cellpadding="4"><?php unset($attr2) ?><?php unset($attr2_title) ?><?php unset($attr2_name) ?><?php unset($attr2_icon) ?><?php unset($attr2_width) ?><?php unset($attr2_rowclasses) ?><?php unset($attr2_columnclasses) ?><?php $attr3 = array() ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];

	if (empty($attr3_class))
		$attr3_class=$row_class;
		
	global $cell_column_nr;
	$cell_column_nr=0;
	
	$column_class_idx = 999;

?><tr class="<?php echo $attr3_class ?>"><?php unset($attr3) ?><?php $attr4 = array('class'=>'logo','colspan'=>'2') ?><?php $attr4_class='logo' ?><?php $attr4_colspan='2' ?><?php
//	if (empty($attr4_class))
//		$attr4['class']=$row_class;
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
		
?><td <?php foreach( $attr4 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr4) ?><?php unset($attr4_class) ?><?php unset($attr4_colspan) ?><?php $attr5 = array('name'=>'projectmenu') ?><?php $attr5_name='projectmenu' ?><img src="<?php echo $image_dir.'logo_'.$attr5_name.IMG_ICON_EXT ?>" border="0" align="left"><h2 class="logo"><?php echo lang('logo_'.$attr5_name) ?></h2><p class="logo"><?php echo lang('logo_'.$attr5_name.'_text') ?></p><?php unset($attr5) ?><?php unset($attr5_name) ?><?php $attr3 = array() ?></td><?php unset($attr3) ?><?php $attr2 = array() ?></tr><?php unset($attr2) ?><?php $attr3 = array('list'=>'projects','extract'=>true,'key'=>'list_key','value'=>'list_value') ?><?php $attr3_list='projects' ?><?php $attr3_extract=true ?><?php $attr3_key='list_key' ?><?php $attr3_value='list_value' ?><?php
	$attr3_list_tmp_key   = $attr3_key;
	$attr3_list_tmp_value = $attr3_value;
	$attr3_list_extract   = $attr3_extract;

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
?><?php unset($attr3) ?><?php unset($attr3_list) ?><?php unset($attr3_extract) ?><?php unset($attr3_key) ?><?php unset($attr3_value) ?><?php $attr4 = array() ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];

	if (empty($attr4_class))
		$attr4_class=$row_class;
		
	global $cell_column_nr;
	$cell_column_nr=0;
	
	$column_class_idx = 999;

?><tr class="<?php echo $attr4_class ?>"><?php unset($attr4) ?><?php $attr5 = array('colspan'=>'3') ?><?php $attr5_colspan='3' ?><?php
//	if (empty($attr5_class))
//		$attr5['class']=$row_class;
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
		
?><td <?php foreach( $attr5 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr5) ?><?php unset($attr5_colspan) ?><?php $attr6 = array('title'=>$name) ?><?php $attr6_title=$name ?><fieldset><legend><?php echo $attr6_title ?></legend><?php unset($attr6) ?><?php unset($attr6_title) ?><?php $attr5 = array() ?></fieldset><?php unset($attr5) ?><?php $attr4 = array() ?></td><?php unset($attr4) ?><?php $attr3 = array() ?></tr><?php unset($attr3) ?><?php $attr4 = array() ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];

	if (empty($attr4_class))
		$attr4_class=$row_class;
		
	global $cell_column_nr;
	$cell_column_nr=0;
	
	$column_class_idx = 999;

?><tr class="<?php echo $attr4_class ?>"><?php unset($attr4) ?><?php $attr5 = array() ?><?php
//	if (empty($attr5_class))
//		$attr5['class']=$row_class;
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
		
?><td <?php foreach( $attr5 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr5) ?><?php $attr6 = array('title'=>lang('TREE_CHOOSE_PROJECT'),'target'=>'_self','url'=>$url,'class'=>'') ?><?php $attr6_title=lang('TREE_CHOOSE_PROJECT') ?><?php $attr6_target='_self' ?><?php $attr6_url=$url ?><?php $attr6_class='' ?><?php
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
?><a href="<?php echo $tmp_url ?>" class="<?php echo $attr6_class ?>" target="<?php echo $attr6_target ?>"<?php if (isset($attr6_accesskey)) echo ' accesskey="'.$attr6_accesskey.'"' ?>  title="<?php echo $attr6_title ?>"><?php unset($attr6) ?><?php unset($attr6_title) ?><?php unset($attr6_target) ?><?php unset($attr6_url) ?><?php unset($attr6_class) ?><?php $attr7 = array('var'=>'project','value'=>'project') ?><?php $attr7_var='project' ?><?php $attr7_value='project' ?><?php
	if (!isset($attr7_value))
		unset($$attr7_var);
	elseif (isset($attr7_key))
		$$attr7_var = $attr7_value[$attr7_key];
	else
		$$attr7_var = $attr7_value;
?><?php unset($attr7) ?><?php unset($attr7_var) ?><?php unset($attr7_value) ?><?php $attr7 = array('align'=>'left','type'=>'project') ?><?php $attr7_align='left' ?><?php $attr7_type='project' ?><?php
if (isset($attr7_elementtype)) {
?><img src="<?php echo $image_dir.'icon_el_'.$attr7_elementtype.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_type)) {
?><img src="<?php echo $image_dir.'icon_'.$attr7_type.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_icon)) {
?><img src="<?php echo $image_dir.'icon_'.$attr7_icon.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_url)) {
?><img src="<?php echo $attr7_url ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_fileext)) {
?><img src="<?php echo $image_dir.$attr7_fileext ?>" border="0" align="<?php echo $attr7_align ?>"><?php
} elseif (isset($attr7_file)) {
?><img src="<?php echo $image_dir.$attr7_file.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr7_align ?>"><?php } ?><?php unset($attr7) ?><?php unset($attr7_align) ?><?php unset($attr7_type) ?><?php $attr7 = array('class'=>'text','var'=>'name','escape'=>true) ?><?php $attr7_class='text' ?><?php $attr7_var='name' ?><?php $attr7_escape=true ?><?php
	if	( isset($attr7_prefix)&& isset($attr7_key))
		$attr7_key = $attr7_prefix.$attr7_key;
	if	( isset($attr7_suffix)&& isset($attr7_key))
		$attr7_key = $attr7_key.$attr7_suffix;
		
	if(empty($attr7_title))
		if (!empty($attr7_key))
			$attr7_title = lang($attr7_key.'_HELP');
		else
			$attr7_title = '';

?><span class="<?php echo $attr7_class ?>" title="<?php echo $attr7_title ?>"><?php
	$attr7_title = '';

	if (!empty($attr7_array))
	{
		//geht nicht:
		//echo $$attr7_array[$attr7_var].'%';
		$tmpArray = $$attr7_array;
		if (!empty($attr7_var))
			$tmp_text = $tmpArray[$attr7_var];
		else
			$tmp_text = lang($tmpArray[$attr7_text]);
	}
	elseif (!empty($attr7_text))
		if	( isset($$attr7_text))
			$tmp_text = lang($$attr7_text);
		else
			$tmp_text = lang($attr7_text);
	elseif (!empty($attr7_textvar))
		$tmp_text = lang($$attr7_textvar);
	elseif (!empty($attr7_key))
		$tmp_text = lang($attr7_key);
	elseif (!empty($attr7_var))
		$tmp_text = isset($$attr7_var)?($attr7_escape?htmlentities($$attr7_var):$$attr7_var):'?'.$attr7_var.'?';	
	elseif (!empty($attr7_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr7_raw);
	elseif (!empty($attr7_value))
		$tmp_text = $attr7_value;
	else
	{
	  $tmp_text = '&nbsp;';
	  //Html::debug($attr7);echo 'text error';
	}
	
	if	( !empty($attr7_maxlength) && intval($attr7_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr7_maxlength) );

	if	(isset($attr7_accesskey))
	{
		$pos = strpos(strtolower($tmp_text),strtolower($attr7_accesskey));
		if	( $pos !== false )
			$tmp_text = substr($tmp_text,0,max($pos,0)).'<span class="accesskey">'.substr($tmp_text,$pos,1).'</span>'.substr($tmp_text,$pos+1);
	}
			
	echo $tmp_text;
?></span><?php unset($attr7) ?><?php unset($attr7_class) ?><?php unset($attr7_var) ?><?php unset($attr7_escape) ?><?php $attr5 = array() ?></a><?php unset($attr5) ?><?php $attr4 = array() ?></td><?php unset($attr4) ?><?php $attr5 = array() ?><?php
//	if (empty($attr5_class))
//		$attr5['class']=$row_class;
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
		
?><td <?php foreach( $attr5 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr5) ?><?php $attr6 = array('action'=>'index','subaction'=>'project','id'=>$id,'name'=>'','target'=>'_self','method'=>'post','enctype'=>'application/x-www-form-urlencoded') ?><?php $attr6_action='index' ?><?php $attr6_subaction='project' ?><?php $attr6_id=$id ?><?php $attr6_name='' ?><?php $attr6_target='_self' ?><?php $attr6_method='post' ?><?php $attr6_enctype='application/x-www-form-urlencoded' ?><?php
	if	(empty($attr6_action))
		$attr6_action = $actionName;
	if	(empty($attr6_subaction))
		$attr6_subaction = $targetSubActionName;
	if	(empty($attr6_id))
		$attr6_id = $this->getRequestId();
		
?><form name="<?php echo $attr6_name ?>"
      target="<?php echo $attr6_target ?>"
      action="<?php echo Html::url( $attr6_action,$attr6_subaction,$attr6_id ) ?>"
      method="<?php echo $attr6_method ?>"
      enctype="<?php echo $attr6_enctype ?>">
<input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo $attr6_action ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo $attr6_subaction ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo $attr6_id ?>" /><?php
		if	( $conf['interface']['url_sessionid'] )
			echo '<input type="hidden" name="'.session_name().'" value="'.session_id().'" />'."\n";
?><?php unset($attr6) ?><?php unset($attr6_action) ?><?php unset($attr6_subaction) ?><?php unset($attr6_id) ?><?php unset($attr6_name) ?><?php unset($attr6_target) ?><?php unset($attr6_method) ?><?php unset($attr6_enctype) ?><?php $attr7 = array('width'=>'100%','space'=>'0px','padding'=>'0px','widths'=>'150px,150px','rowclasses'=>'odd,even') ?><?php $attr7_width='100%' ?><?php $attr7_space='0px' ?><?php $attr7_padding='0px' ?><?php $attr7_widths='150px,150px' ?><?php $attr7_rowclasses='odd,even' ?><?php
	$coloumn_widths=array();
	$row_classes   = array('');
	$column_classes= array('');

	if(empty($attr7_class))
		$attr7_class='';

	if	(!empty($attr7_widths))
	{
		$column_widths = explode(',',$attr7_widths);
		unset($attr7['widths']);
	}
	if	(!empty($attr7_classes))
	{
		$row_classes   = explode(',',$attr7_rowclasses);
		$row_class_idx = 999;
		unset($attr7['rowclasses']);
	}
	if	(!empty($attr7_rowclasses))
	{
		$row_classes   = explode(',',$attr7_rowclasses);
		$row_class_idx = 999;
		unset($attr7['rowclasses']);
	}
	if	(!empty($attr7_columnclasses))
	{
		$column_classes   = explode(',',$attr7_columnclasses);
		unset($attr7['columnclasses']);
	}
	
?><table class="<?php echo $attr7_class ?>" cellspacing="<?php echo $attr7_space ?>" width="<?php echo $attr7_width ?>" cellpadding="<?php echo $attr7_padding ?>"><?php unset($attr7) ?><?php unset($attr7_width) ?><?php unset($attr7_space) ?><?php unset($attr7_padding) ?><?php unset($attr7_widths) ?><?php unset($attr7_rowclasses) ?><?php $attr8 = array() ?><?php
	$row_class_idx++;
	if ($row_class_idx > count($row_classes))
		$row_class_idx=1;
	$row_class=$row_classes[$row_class_idx-1];

	if (empty($attr8_class))
		$attr8_class=$row_class;
		
	global $cell_column_nr;
	$cell_column_nr=0;
	
	$column_class_idx = 999;

?><tr class="<?php echo $attr8_class ?>"><?php unset($attr8) ?><?php $attr9 = array() ?><?php
//	if (empty($attr9_class))
//		$attr9['class']=$row_class;
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr9_class))
		$attr9['class']=$column_class;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr9_rowspan) )
		$attr9['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr9 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr9) ?><?php $attr10 = array('list'=>'models','name'=>'modelid','default'=>$defaultmodelid,'onchange'=>'','title'=>'','class'=>'') ?><?php $attr10_list='models' ?><?php $attr10_name='modelid' ?><?php $attr10_default=$defaultmodelid ?><?php $attr10_onchange='' ?><?php $attr10_title='' ?><?php $attr10_class='' ?><?php $attr10_tmp_list = $$attr10_list;
		if	( isset($$attr10_name) && isset($attr10_tmp_list[$$attr10_name]) )
			$attr10_tmp_default = $$attr10_name;
		elseif ( isset($attr10_default) )
			$attr10_tmp_default = $attr10_default;
		else
			$attr10_tmp_default = '';
//			Html::debug($attr10_tmp_default);
		
		foreach( $attr10_tmp_list as $box_key=>$box_value )
		{
			$id = 'id_'.$attr10_name.'_'.$box_key;
			echo '<input id="'.$id.'" name="'.$attr10_name.'" type="radio" class="'.$attr10_class.'" value="'.$box_key.'"';
			if ($box_key==$attr10_tmp_default)
				echo ' checked="checked"';
			echo '>&nbsp;<label for="'.$id.'">'.$box_value.'</label><br>';
		}
?><?php unset($attr10) ?><?php unset($attr10_list) ?><?php unset($attr10_name) ?><?php unset($attr10_default) ?><?php unset($attr10_onchange) ?><?php unset($attr10_title) ?><?php unset($attr10_class) ?><?php $attr8 = array() ?></td><?php unset($attr8) ?><?php $attr9 = array() ?><?php
//	if (empty($attr9_class))
//		$attr9['class']=$row_class;
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr9_class))
		$attr9['class']=$column_class;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr9_rowspan) )
		$attr9['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr9 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr9) ?><?php $attr10 = array('list'=>'languages','name'=>'languageid','default'=>$defaultlanguageid,'onchange'=>'','title'=>'','class'=>'') ?><?php $attr10_list='languages' ?><?php $attr10_name='languageid' ?><?php $attr10_default=$defaultlanguageid ?><?php $attr10_onchange='' ?><?php $attr10_title='' ?><?php $attr10_class='' ?><?php $attr10_tmp_list = $$attr10_list;
		if	( isset($$attr10_name) && isset($attr10_tmp_list[$$attr10_name]) )
			$attr10_tmp_default = $$attr10_name;
		elseif ( isset($attr10_default) )
			$attr10_tmp_default = $attr10_default;
		else
			$attr10_tmp_default = '';
//			Html::debug($attr10_tmp_default);
		
		foreach( $attr10_tmp_list as $box_key=>$box_value )
		{
			$id = 'id_'.$attr10_name.'_'.$box_key;
			echo '<input id="'.$id.'" name="'.$attr10_name.'" type="radio" class="'.$attr10_class.'" value="'.$box_key.'"';
			if ($box_key==$attr10_tmp_default)
				echo ' checked="checked"';
			echo '>&nbsp;<label for="'.$id.'">'.$box_value.'</label><br>';
		}
?><?php unset($attr10) ?><?php unset($attr10_list) ?><?php unset($attr10_name) ?><?php unset($attr10_default) ?><?php unset($attr10_onchange) ?><?php unset($attr10_title) ?><?php unset($attr10_class) ?><?php $attr8 = array() ?></td><?php unset($attr8) ?><?php $attr9 = array() ?><?php
//	if (empty($attr9_class))
//		$attr9['class']=$row_class;
	$column_class_idx++;
	if ($column_class_idx > count($column_classes))
		$column_class_idx=1;
	$column_class=$column_classes[$column_class_idx-1];
	if (empty($attr9_class))
		$attr9['class']=$column_class;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr9_rowspan) )
		$attr9['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr9 as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr9) ?><?php $attr10 = array('type'=>'ok','class'=>'ok','value'=>'ok','text'=>'button_ok') ?><?php $attr10_type='ok' ?><?php $attr10_class='ok' ?><?php $attr10_value='ok' ?><?php $attr10_text='button_ok' ?><?php
	if ($attr10_type=='ok')
		$attr10_type  = 'submit';
	if (isset($attr10_src))
		$attr10_type  = 'image';
	else
		$attr10_src  = '';
?><input type="<?php echo $attr10_type ?>"<?php if(isset($attr10_src)) { ?> src="<?php echo $image_dir.'icon_'.$attr10_src.IMG_ICON_EXT ?>"<?php } ?> name="<?php echo $attr10_value ?>" class="<?php echo $attr10_class ?>" title="<?php echo lang($attr10_text.'_DESC') ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang($attr10_text) ?>&nbsp;&nbsp;&nbsp;&nbsp;" /><?php unset($attr10_src) ?><?php unset($attr10) ?><?php unset($attr10_type) ?><?php unset($attr10_class) ?><?php unset($attr10_value) ?><?php unset($attr10_text) ?><?php $attr8 = array() ?></td><?php unset($attr8) ?><?php $attr7 = array() ?></tr><?php unset($attr7) ?><?php $attr6 = array() ?></table><?php unset($attr6) ?><?php $attr5 = array() ?></form>

<?php unset($attr5) ?><?php $attr4 = array() ?></td><?php unset($attr4) ?><?php $attr3 = array() ?></tr><?php unset($attr3) ?><?php $attr2 = array() ?><?php } ?><?php unset($attr2) ?><?php $attr1 = array() ?>      </table>
	</td>
  </tr>
</table>

</center>

<?php if ($showDuration)
      { ?>
<br/>
<small>&nbsp;
<?php $dur = time()-START_TIME;
      echo floor($dur/60).':'.str_pad($dur%60,2,'0',STR_PAD_LEFT); ?></small>
<?php } ?>
<?php unset($attr1) ?><?php $attr0 = array() ?>
<!-- $Id$ -->

<?php if ($showDuration) { ?>
<br/>
<small>&nbsp;
<?php $dur = time()-START_TIME;
//      echo floor($dur/60).':'.str_pad($dur%60,2,'0',STR_PAD_LEFT); ?></small>
<?php } ?>

</body>
</html><?php unset($attr0) ?>