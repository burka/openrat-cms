<?php /* source: ./themes/default/include/html/page.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array('class'=>'') ?><?php $attr_class='' ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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


<?php unset($attr) ?><?php unset($attr_class) ?><?php /* source: ./themes/default/include/html/form.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array('action'=>'','subaction'=>'','id'=>'','name'=>'','target'=>'_self','method'=>'post','enctype'=>'application/x-www-form-urlencoded') ?><?php $attr_action='' ?><?php $attr_subaction='' ?><?php $attr_id='' ?><?php $attr_name='' ?><?php $attr_target='_self' ?><?php $attr_method='post' ?><?php $attr_enctype='application/x-www-form-urlencoded' ?><?php
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
?><?php unset($attr) ?><?php unset($attr_action) ?><?php unset($attr_subaction) ?><?php unset($attr_id) ?><?php unset($attr_name) ?><?php unset($attr_target) ?><?php unset($attr_method) ?><?php unset($attr_enctype) ?><?php /* source: ./themes/default/include/html/window.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array('title'=>'','name'=>'TEMPLATE_SOURCE','icon'=>'','widths'=>'','width'=>'85%') ?><?php $attr_title='' ?><?php $attr_name='TEMPLATE_SOURCE' ?><?php $attr_icon='' ?><?php $attr_widths='' ?><?php $attr_width='85%' ?><?php
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
      <table class="n" cellspacing="0" width="100%" cellpadding="4"><?php unset($attr) ?><?php unset($attr_title) ?><?php unset($attr_name) ?><?php unset($attr_icon) ?><?php unset($attr_widths) ?><?php unset($attr_width) ?><?php /* source: ./themes/default/include/html/row.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?><?php
	global $fx;
	if	( $fx =='f1')
		$fx='f2';
	else $fx='f1';
	
	global $cell_column_nr;
	$cell_column_nr=0;

?><tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'','colspan'=>'') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='' ?><?php $attr_colspan='' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/inputarea.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array('name'=>'src','rows'=>'25','cols'=>'80','value'=>'','index'=>'','onchange'=>'','prefix'=>'','class'=>'','default'=>'') ?><?php $attr_name='src' ?><?php $attr_rows='25' ?><?php $attr_cols='80' ?><?php $attr_value='' ?><?php $attr_index='' ?><?php $attr_onchange='' ?><?php $attr_prefix='' ?><?php $attr_class='' ?><?php $attr_default='' ?><textarea name="<?php echo $attr_name ?>" rows="<?php echo $attr_rows ?>" cols="<?php echo $attr_cols ?>"><?php echo htmlentities(isset($$attr_name)?$$attr_name:$attr_default) ?></textarea><?php unset($attr) ?><?php unset($attr_name) ?><?php unset($attr_rows) ?><?php unset($attr_cols) ?><?php unset($attr_value) ?><?php unset($attr_index) ?><?php unset($attr_onchange) ?><?php unset($attr_prefix) ?><?php unset($attr_class) ?><?php unset($attr_default) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?></td><?php unset($attr) ?><?php /* source: ./themes/default/include/html/row-end.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?></tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/row.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?><?php
	global $fx;
	if	( $fx =='f1')
		$fx='f2';
	else $fx='f1';
	
	global $cell_column_nr;
	$cell_column_nr=0;

?><tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'act','colspan'=>'') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='act' ?><?php $attr_colspan='' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;
	
	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];
		
?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>><?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/button.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array('type'=>'ok') ?><?php $attr_type='ok' ?><?php
	if ($attr_type=='ok')
	{
		$attr_type  = 'submit';
		$attr_class = 'ok';
		$attr_text  = 'BUTTON_OK';
		$attr_value = 'ok';
	}
?><input type="<?php echo $attr_type ?>" name="<?php echo $attr_value ?>" class="<?php echo $attr_class ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang($attr_text) ?>&nbsp;&nbsp;&nbsp;&nbsp;" /><?php unset($attr) ?><?php unset($attr_type) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?></td><?php unset($attr) ?><?php /* source: ./themes/default/include/html/row-end.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?></tr><?php unset($attr) ?><?php /* source: ./themes/default/include/html/window-end.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?>      </table>
	</td>
  </tr>
</table>

</center><?php unset($attr) ?><?php /* source: ./themes/default/include/html/form-end.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?></form><?php unset($attr) ?><?php /* source: ./themes/default/include/html/focus.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array('field'=>'src') ?><?php $attr_field='src' ?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $attr_field ?>.focus();
document.forms[0].<?php echo $attr_field ?>.select();
//--></script>
<?php unset($attr) ?><?php unset($attr_field) ?><?php /* source: ./themes/default/include/html/page-end.inc.php - compile time: Sun, 29 Jan 2006 01:53:05 +0100 */ ?><?php $attr = array() ?>
<!-- $Id$ -->

<?php if ($showDuration) { ?>
<br/>
<small>&nbsp;
<?php $dur = time()-START_TIME;
      echo floor($dur/60).':'.str_pad($dur%60,2,'0',STR_PAD_LEFT); ?></small>
<?php } ?>

</body>
</html><?php unset($attr) ?>