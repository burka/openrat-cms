<?php /* source: ./themes/default/include/html/page.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('class'=>'') ?><?php $attr_class='' ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<!-- $Id$ -->
<head>
  <title><?php echo $cms_title ?></title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="MSSmartTagsPreventParsing" content="true" />
  <meta name="robots" content="noindex,nofollow" />
  <link rel="stylesheet" type="text/css" href="./themes/default/css/default.css" />
<?php if($stylesheet!='default') { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $stylesheet ?>" />
<?php } ?>
</head>

<body<?php echo !empty($$attr_class)?' class="'.$$attr_class.'"':' class="'.$attr_class.'"' ?>>


<?php unset($attr) ?><?php unset($attr_class) ?><?php /* source: ./themes/default/include/html/form.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('action'=>'','subaction'=>'','id'=>'','name'=>'','target'=>'_self','method'=>'post','enctype'=>'application/x-www-form-urlencoded') ?><?php $attr_action='' ?><?php $attr_subaction='' ?><?php $attr_id='' ?><?php $attr_name='' ?><?php $attr_target='_self' ?><?php $attr_method='post' ?><?php $attr_enctype='application/x-www-form-urlencoded' ?><?php
	if	(empty($attr_action))
		$attr_action = $actionName;
	if	(empty($attr_subaction))
		$attr_subaction = $targetSubActionName;
	if	(empty($attr_id))
		$attr_id = $this->getRequestId();
		
?><form name="<?php echo $attr_name ?>"
      target="<?php echo $attr_target ?>"
      action="<?php echo Html::url( $attr_action,$attr_subaction,$attr_id ) ?>"
      method="<?php echo $attr_method ?>"
      enctype="<?php echo $attr_enctype ?>">
<input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo $attr_action ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo $attr_subaction ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo $attr_id ?>" /><?php
		if	( $conf['interface']['url_sessionid'] )
			echo '<input type="hidden" name="'.session_name().'" value="'.session_id().'" />'."\n";
?><?php unset($attr) ?><?php unset($attr_action) ?><?php unset($attr_subaction) ?><?php unset($attr_id) ?><?php unset($attr_name) ?><?php unset($attr_target) ?><?php unset($attr_method) ?><?php unset($attr_enctype) ?><?php /* source: ./themes/default/include/html/window.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('title'=>'','name'=>'','icon'=>'','widths'=>'','width'=>'85%') ?><?php $attr_title='' ?><?php $attr_name='' ?><?php $attr_icon='' ?><?php $attr_widths='' ?><?php $attr_width='85%' ?><?php
	$coloumn_widths=array();
	if	(!empty($attr_widths))
	{
		$column_widths = explode(',',$attr_widths);
		unset($attr['widths']);
	}
		global $image_dir;
		echo '<br/><br/><br/><center>';
		echo '<table class="main" cellspacing="0" cellpadding="4" width="'.$attr_width.'">';
		echo '<tr><td class="menu">';
		if	( !empty($attr_icon) )
			echo '<img src="'.$image_dir.'icon_'.$attr_icon.IMG_ICON_EXT.'" align="left" border="0">';
		foreach( $path as $pathElement)
		{
			extract($pathElement);
			echo '<a href="'.$url.'" class="path">'.lang($name).'</a>';
			echo '&nbsp;&raquo;&nbsp;';
		}
		echo '<span class="title">'.lang($windowTitle).'</span>';
		?>
    </th>
  </tr>
  <tr><td class="subaction">
    <?php foreach( $windowMenu as $menu )
          {
          	?><a href="<?php echo Html::url($actionName,$menu['subaction'],$this->getRequestId() ) ?>" title="<?php echo lang($menu['text'].'_DESC') ?>" class="menu<?php if($this->subActionName==$menu['subaction']) echo '_active' ?>"><?php echo lang($menu['text']) ?></a>&nbsp;&nbsp;&nbsp;<?php
          }
          	?></td>
  </tr>

<?php if (isset($notices) && count($notices)>0 )
      { ?>
      	
  <tr>
    <td><table>
    
  <?php foreach( $notices as $notice ) { ?>
    
    <td><img src="<?php echo $image_dir.'notice_'.$notice['status'].IMG_ICON_EXT ?>" style="padding:10px" /></td>
    <td class="f1"><?php if ($notice['name']!='') { ?><img src="<?php echo $image_dir.'icon_'.$notice['type'].IMG_ICON_EXT ?>" align="left" /><?php echo $notice['name'] ?>: <?php } ?><?php if ($notice['status']=='error') { ?><strong><?php } ?><?php echo $notice['text'] ?><?php if ($notice['status']=='error') { ?></strong><?php } ?></td>
  </tr>
  <?php } ?>
  
    </table></td>
  </tr>

<?php } ?>



  <tr>
    <td>
      <table class="n" cellspacing="0" width="100%" cellpadding="4"><?php unset($attr) ?><?php unset($attr_title) ?><?php unset($attr_name) ?><?php unset($attr_icon) ?><?php unset($attr_widths) ?><?php unset($attr_width) ?><?php /* source: ./themes/default/include/html/row.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?><?php
	global $fx;
	if	( $fx =='f1')
		$fx='f2';
	else $fx='f1';
	
	global $cell_column_nr;
	$cell_column_nr=0;

?><tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'fx','colspan'=>'') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='fx' ?><?php $attr_colspan='' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/text.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('title'=>'','class'=>'','var'=>'','text'=>'page_template','raw'=>'','maxlength'=>'') ?><?php $attr_title='' ?><?php $attr_class='' ?><?php $attr_var='' ?><?php $attr_text='page_template' ?><?php $attr_raw='' ?><?php $attr_maxlength='' ?><?php
	if(empty($attr_title)) $attr_title = $attr_text;
?><span class="<?php echo $attr_class ?>"><?php
	if (!empty($attr_array))
	{
		//geht nicht:
		//echo $$attr_array[$attr_var].'%';
		$tmpArray = $$attr_array;
		if (!empty($attr_var))
			$tmp_text = $tmpArray[$attr_var];
		else
			$tmp_text = lang($tmpArray[$attr_text]);
	}
	elseif (!empty($attr_text))
		$tmp_text = lang($attr_text);
	elseif (!empty($attr_var))
		$tmp_text = isset($$attr_var)?$$attr_var:'error: variable '.$attr_var.' not present';	
	elseif (!empty($attr_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr_raw);
	else echo 'text error';
	
	if	( !empty($attr_maxlength) && intval($attr_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr_maxlength) );
		
	echo $tmp_text;
?></span><?php unset($attr) ?><?php unset($attr_title) ?><?php unset($attr_class) ?><?php unset($attr_var) ?><?php unset($attr_text) ?><?php unset($attr_raw) ?><?php unset($attr_maxlength) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></td><?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'fx','colspan'=>'') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='fx' ?><?php $attr_colspan='' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/link.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('title'=>'','target'=>'','url'=>'template_url','class'=>'','action'=>'','subaction'=>'','id'=>'','var1'=>'','value1'=>'') ?><?php $attr_title='' ?><?php $attr_target='' ?><?php $attr_url='template_url' ?><?php $attr_class='' ?><?php $attr_action='' ?><?php $attr_subaction='' ?><?php $attr_id='' ?><?php $attr_var1='' ?><?php $attr_value1='' ?><?php
	if(!empty($attr_url))
		$tmp_url = $$attr_url;
	else
		$tmp_url = Html::url($attr_action,$attr_subaction,!empty($$attr_id)?$$attr_id:$this->getRequestId(),array(!empty($var1)?$var1:'asdf'=>!empty($value1)?$$value1:''));
?><a href="<?php echo $tmp_url ?>" class="<?php echo $attr_class ?>" target="<?php echo $attr_target ?>" title="<?php echo hasLang($attr_title)?lang($attr_title):lang($$attr_title) ?>"><?php unset($attr) ?><?php unset($attr_title) ?><?php unset($attr_target) ?><?php unset($attr_url) ?><?php unset($attr_class) ?><?php unset($attr_action) ?><?php unset($attr_subaction) ?><?php unset($attr_id) ?><?php unset($attr_var1) ?><?php unset($attr_value1) ?><?php /* source: ./themes/default/include/html/image.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('file'=>'','url'=>'','align'=>'left','type'=>'template','elementtype'=>'') ?><?php $attr_file='' ?><?php $attr_url='' ?><?php $attr_align='left' ?><?php $attr_type='template' ?><?php $attr_elementtype='' ?><?php
if (!empty($attr_elementtype)) {
?><img src="<?php echo $image_dir.'icon_el_'.$$attr_elementtype.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr_align ?>"><?php
} elseif (!empty($attr_type)) {
?><img src="<?php echo $image_dir.'icon_'.$$attr_type.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr_align ?>"><?php
} elseif (!empty($$attr_url)) {
?><img src="<?php echo $$attr_url ?>" border="0" align="<?php echo $attr_align ?>"><?php
} elseif (!empty($attr_file)) {
?><img src="<?php echo $image_dir.$$attr_file.IMG_ICON_EXT ?>" border="0" align="<?php echo $attr_align ?>"><?php } ?><?php unset($attr) ?><?php unset($attr_file) ?><?php unset($attr_url) ?><?php unset($attr_align) ?><?php unset($attr_type) ?><?php unset($attr_elementtype) ?><?php /* source: ./themes/default/include/html/text.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('title'=>'','class'=>'','var'=>'template_name','text'=>'','raw'=>'','maxlength'=>'') ?><?php $attr_title='' ?><?php $attr_class='' ?><?php $attr_var='template_name' ?><?php $attr_text='' ?><?php $attr_raw='' ?><?php $attr_maxlength='' ?><?php
	if(empty($attr_title)) $attr_title = $attr_text;
?><span class="<?php echo $attr_class ?>"><?php
	if (!empty($attr_array))
	{
		//geht nicht:
		//echo $$attr_array[$attr_var].'%';
		$tmpArray = $$attr_array;
		if (!empty($attr_var))
			$tmp_text = $tmpArray[$attr_var];
		else
			$tmp_text = lang($tmpArray[$attr_text]);
	}
	elseif (!empty($attr_text))
		$tmp_text = lang($attr_text);
	elseif (!empty($attr_var))
		$tmp_text = isset($$attr_var)?$$attr_var:'error: variable '.$attr_var.' not present';	
	elseif (!empty($attr_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr_raw);
	else echo 'text error';
	
	if	( !empty($attr_maxlength) && intval($attr_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr_maxlength) );
		
	echo $tmp_text;
?></span><?php unset($attr) ?><?php unset($attr_title) ?><?php unset($attr_class) ?><?php unset($attr_var) ?><?php unset($attr_text) ?><?php unset($attr_raw) ?><?php unset($attr_maxlength) ?><?php /* source: ./themes/default/include/html/link-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></a><?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></td><?php unset($attr) ?><?php /* source: ./themes/default/include/html/row-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/row.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?><?php
	global $fx;
	if	( $fx =='f1')
		$fx='f2';
	else $fx='f1';
	
	global $cell_column_nr;
	$cell_column_nr=0;

?><tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'','colspan'=>'') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='' ?><?php $attr_colspan='' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/text.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('title'=>'','class'=>'','var'=>'','text'=>'page_template','raw'=>'','maxlength'=>'') ?><?php $attr_title='' ?><?php $attr_class='' ?><?php $attr_var='' ?><?php $attr_text='page_template' ?><?php $attr_raw='' ?><?php $attr_maxlength='' ?><?php
	if(empty($attr_title)) $attr_title = $attr_text;
?><span class="<?php echo $attr_class ?>"><?php
	if (!empty($attr_array))
	{
		//geht nicht:
		//echo $$attr_array[$attr_var].'%';
		$tmpArray = $$attr_array;
		if (!empty($attr_var))
			$tmp_text = $tmpArray[$attr_var];
		else
			$tmp_text = lang($tmpArray[$attr_text]);
	}
	elseif (!empty($attr_text))
		$tmp_text = lang($attr_text);
	elseif (!empty($attr_var))
		$tmp_text = isset($$attr_var)?$$attr_var:'error: variable '.$attr_var.' not present';	
	elseif (!empty($attr_raw))
		$tmp_text = str_replace('_','&nbsp;',$attr_raw);
	else echo 'text error';
	
	if	( !empty($attr_maxlength) && intval($attr_maxlength)!=0  )
		$tmp_text = Text::maxLength( $tmp_text,intval($attr_maxlength) );
		
	echo $tmp_text;
?></span><?php unset($attr) ?><?php unset($attr_title) ?><?php unset($attr_class) ?><?php unset($attr_var) ?><?php unset($attr_text) ?><?php unset($attr_raw) ?><?php unset($attr_maxlength) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></td><?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'','colspan'=>'') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='' ?><?php $attr_colspan='' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/selectbox.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('list'=>'templates','name'=>'templateid','default'=>'','onchange'=>'','title'=>'','class'=>'') ?><?php $attr_list='templates' ?><?php $attr_name='templateid' ?><?php $attr_default='' ?><?php $attr_onchange='' ?><?php $attr_title='' ?><?php $attr_class='' ?><select size="1" name="<?php echo $attr_name ?>" onchange="<?php echo $attr_onchange ?>" title="<?php echo $attr_title ?>" class="<?php echo $attr_class ?>"<?php
if (count($$attr_list)==1) echo ' disabled="disabled"'
?>><?php
		foreach( $$attr_list as $box_key=>$box_value )
		{
			echo '<option class="'.$attr_class.'" value="'.$box_key.'"';
			if (isset($$attr_name)&&$box_key==$$attr_name || isset($$attr_default)&&$box_key == $$attr_default)
				echo ' selected="selected"';
			echo '>'.$box_value.'</option>';
		}
?></select><?php
if (count($$attr_list)==1) echo '<input type="hidden" name="'.$attr_name.'" value="'.$box_key.'" />'
?><?php unset($attr) ?><?php unset($attr_list) ?><?php unset($attr_name) ?><?php unset($attr_default) ?><?php unset($attr_onchange) ?><?php unset($attr_title) ?><?php unset($attr_class) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></td><?php unset($attr) ?><?php /* source: ./themes/default/include/html/row-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/row.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?><?php
	global $fx;
	if	( $fx =='f1')
		$fx='f2';
	else $fx='f1';
	
	global $cell_column_nr;
	$cell_column_nr=0;

?><tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'act','colspan'=>'2') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='act' ?><?php $attr_colspan='2' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/button.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('type'=>'ok') ?><?php $attr_type='ok' ?><?php
	if ($attr_type=='ok')
	{
		$attr_type  = 'submit';
		$attr_class = 'ok';
		$attr_text  = 'BUTTON_OK';
		$attr_value = 'ok';
	}
?><input type="<?php echo $attr_type ?>" name="<?php echo $attr_value ?>" class="<?php echo $attr_class ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang($attr_text) ?>&nbsp;&nbsp;&nbsp;&nbsp;" /><?php unset($attr) ?><?php unset($attr_type) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></td><?php unset($attr) ?><?php /* source: ./themes/default/include/html/row-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/window-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?>      </table>
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
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/form-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?></form><?php unset($attr) ?><?php /* source: ./themes/default/include/html/focus.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array('field'=>'templateid') ?><?php $attr_field='templateid' ?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr_field ?>.focus();
document.forms[0].<?php echo $attr_field ?>.select();
//--></script>
<?php unset($attr) ?><?php unset($attr_field) ?><?php /* source: ./themes/default/include/html/page-end.inc.php - compile time: Sun, 29 Jan 2006 19:43:35 +0100 */ ?><?php $attr = array() ?>
<!-- $Id$ -->

<?php if ($showDuration) { ?>
<br/>
<small>&nbsp;
<?php $dur = time()-START_TIME;
//      echo floor($dur/60).':'.str_pad($dur%60,2,'0',STR_PAD_LEFT); ?></small>
<?php } ?>

</body>
</html><?php unset($attr) ?>