<?php /* source: ./themes/default/include/html/page.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('class'=>'') ?><?php $attr_class='' ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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

<body<?php if( !empty($attr_class) )echo ' class="'.$class.'"' ?>>


<?php unset($attr) ?><?php unset($attr_class) ?><?php /* source: ./themes/default/include/html/form.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('action'=>'folder','subaction'=>'createnew','id'=>'','name'=>'','target'=>'_self','method'=>'post','enctype'=>'application/x-www-form-urlencoded') ?><?php $attr_action='folder' ?><?php $attr_subaction='createnew' ?><?php $attr_id='' ?><?php $attr_name='' ?><?php $attr_target='_self' ?><?php $attr_method='post' ?><?php $attr_enctype='application/x-www-form-urlencoded' ?><form name="<?php echo $attr_name ?>"
      target="<?php echo $attr_target ?>"
      action="<?php echo Html::url( $attr_action,$attr_subaction,$attr_id ) ?>"
      method="<?php echo $attr_method ?>"
      enctype="<?php echo $attr_enctype ?>">
<input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo $attr_action ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo $attr_subaction ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo $attr_id ?>" /><?php
		if	( $conf['interface']['url_sessionid'] )
			echo '<input type="hidden" name="'.session_name().'" value="'.session_id().'" />'."\n";
?>
<?php unset($attr) ?><?php unset($attr_action) ?><?php unset($attr_subaction) ?><?php unset($attr_id) ?><?php unset($attr_name) ?><?php unset($attr_target) ?><?php unset($attr_method) ?><?php unset($attr_enctype) ?>
<?php /* source: ./themes/default/include/html/window.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('title'=>'','name'=>'','widths'=>'','width'=>'') ?><?php $attr_title='' ?><?php $attr_name='' ?><?php $attr_widths='' ?><?php $attr_width='' ?><?php
	$coloumn_widths=array();
	if	(!empty($attr_widths))
	{
		$column_widths = explode(',',$attr_widths);
		unset($attr['widths']);
	}
		global $image_dir;
		if	( !isset($attr_width)) $attr['width']='90%';
		echo '<br/><br/><br/><center>';
		echo '<table class="main" cellspacing="0" cellpadding="4" ';
		foreach( $attr as $aName=>$aValue )
			echo " $aName=\"$aValue\"";
		echo '>';
		echo '<tr><th>';
		if	( !empty($attr_icon) )
			echo '<img src="'.$image_dir.'icon_'.$attr_icon.IMG_EXT.'" align="left" border="0">';
		if	( !isset($$attr_name)) $$attr_name='';
		echo $$attr_name.': ';
		echo lang( $attr_title );
		?>
    </th>
  </tr>
  <tr><td class="subaction">
    <?php foreach( $windowMenu as $menu )
          {
          	?><a href="<?php echo Html::url($actionName,$menu['subaction']) ?>"><?php echo lang($menu['text']) ?></a>&nbsp;&nbsp;&nbsp;<?php
          }
          	?></td>
  </tr>

<?php if (isset($notices) && count($notices)>0 )
      { ?>

  <tr>
    <td><table>

  <?php foreach( $notices as $notice ) { ?>

    <td><img src="<?php echo $image_dir.'notice_'.$notice['status'].IMG_EXT ?>" style="padding:10px" /></td>
    <td class="f1"><?php if ($notice['name']!='') { ?><img src="<?php echo $image_dir.'icon_'.$notice['type'].IMG_EXT ?>" align="left" /><?php echo $notice['name'] ?>: <?php } ?><?php if ($notice['status']=='error') { ?><strong><?php } ?><?php echo $notice['text'] ?><?php if ($notice['status']=='error') { ?></strong><?php } ?></td>
  </tr>
  <?php } ?>

    </table></td>
  </tr>

<?php } ?>



  <tr>
    <td>
      <table class="n" cellspacing="0" width="100%" cellpadding="4">
<?php unset($attr) ?><?php unset($attr_title) ?><?php unset($attr_name) ?><?php unset($attr_widths) ?><?php unset($attr_width) ?><?php /* source: ./themes/default/include/html/row.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?><?php
	global $fx;
	if	( $fx =='f1')
		$fx='f2';
	else $fx='f1';

	global $cell_column_nr;
	$cell_column_nr=0;

?><tr>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'fx','colspan'=>'') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='fx' ?><?php $attr_colspan='' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;

	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];

?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>>
<?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/text.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('title'=>'','class'=>'','var'=>'','text'=>'global_FOLDER','raw'=>'') ?><?php $attr_title='' ?><?php $attr_class='' ?><?php $attr_var='' ?><?php $attr_text='global_FOLDER' ?><?php $attr_raw='' ?><?php
	if(empty($attr_title)) $attr_title = $attr_text;
?><span class="<?php echo $attr_class ?>"><?php
	if (!empty($attr_url))
		echo "<a href=\"".$$attr_url."\" title=\"$attr_title\">";
	if (!empty($attr_array))
	{
		//geht nicht:
		//echo $$attr_array[$attr_var].'%';
		$tmpArray = $$attr_array;
		if (!empty($attr_var))
			echo $tmpArray[$attr_var];
		else
			echo lang($tmpArray[$attr_text]);
	}
	elseif (!empty($attr_text))
		echo lang($attr_text);
	elseif (!empty($attr_var))
		echo $$attr_var;
	elseif (!empty($attr_raw))
		echo str_replace('_',' ',$attr_raw);
	else echo 'text error';

	if (!empty($attr_url))
		echo '</a';
?></span>
<?php unset($attr) ?><?php unset($attr_title) ?><?php unset($attr_class) ?><?php unset($attr_var) ?><?php unset($attr_text) ?><?php unset($attr_raw) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?></td>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'fx','colspan'=>'') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='fx' ?><?php $attr_colspan='' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;

	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];

?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>>
<?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/input.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('default'=>'','type'=>'','index'=>'','name'=>'foldername','prefix'=>'','value'=>'','size'=>'20','maxlength'=>'','onchange'=>'') ?><?php $attr_default='' ?><?php $attr_type='' ?><?php $attr_index='' ?><?php $attr_name='foldername' ?><?php $attr_prefix='' ?><?php $attr_value='' ?><?php $attr_size='20' ?><?php $attr_maxlength='' ?><?php $attr_onchange='' ?><input <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?> value="<?php echo $$attr_name ?>" />
<?php unset($attr) ?><?php unset($attr_default) ?><?php unset($attr_type) ?><?php unset($attr_index) ?><?php unset($attr_name) ?><?php unset($attr_prefix) ?><?php unset($attr_value) ?><?php unset($attr_size) ?><?php unset($attr_maxlength) ?><?php unset($attr_onchange) ?><?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?></td>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/row-end.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?></tr>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/row.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?><?php
	global $fx;
	if	( $fx =='f1')
		$fx='f2';
	else $fx='f1';

	global $cell_column_nr;
	$cell_column_nr=0;

?><tr>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/cell.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('width'=>'','style'=>'','class'=>'act','colspan'=>'2') ?><?php $attr_width='' ?><?php $attr_style='' ?><?php $attr_class='act' ?><?php $attr_colspan='2' ?><?php
	global $fx;
	if (!isset($attr_class)) $attr_class='';
	if ($attr_class=='fx') $attr['class']=$fx;

	global $cell_column_nr;
	$cell_column_nr++;
	if	( isset($column_widths[$cell_column_nr-1]) && !isset($attr_rowspan) )
		$attr['width']=$column_widths[$cell_column_nr-1];

?><td <?php foreach( $attr as $a_name=>$a_value ) echo " $a_name=\"$a_value\"" ?>>
<?php unset($attr) ?><?php unset($attr_width) ?><?php unset($attr_style) ?><?php unset($attr_class) ?><?php unset($attr_colspan) ?><?php /* source: ./themes/default/include/html/button.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('type'=>'ok') ?><?php $attr_type='ok' ?><?php
	if ($attr_type=='ok')
	{
		$attr_type  = 'submit';
		$attr_class = 'ok';
		$attr_text  = 'BUTTON_OK';
		$attr_value = 'ok';
	}
?><input type="<?php echo $attr_type ?>" name="<?php echo $attr_value ?>" class="<?php echo $attr_class ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang($attr_text) ?>&nbsp;&nbsp;&nbsp;&nbsp;" />
<?php unset($attr) ?><?php unset($attr_type) ?>
<?php /* source: ./themes/default/include/html/cell-end.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?></td>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/row-end.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?></tr>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/window-end.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?>      </table>
	</td>
  </tr>
</table>

</center>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/form-end.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?></form>
<?php unset($attr) ?><?php /* source: ./themes/default/include/html/focus.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array('field'=>'foldername') ?><?php $attr_field='foldername' ?><script name="JavaScript" type="text/javascript"><!--
document.forms[0].<?php echo $$attr_field ?>.focus();
//--></script>
<?php unset($attr) ?><?php unset($attr_field) ?><?php /* source: ./themes/default/include/html/page-end.inc.php - compile time: Wed, 11 Jan 2006 22:14:16 +0100 */ ?><?php $attr = array() ?>
<!-- $Id$ -->

<?php if ($showDuration) { ?>
<br/>
<small>&nbsp;
<?php $dur = time()-START_TIME;
      echo floor($dur/60).':'.str_pad($dur%60,2,'0',STR_PAD_LEFT); ?></small>
<?php } ?>

</body>
</html>
<?php unset($attr) ?>