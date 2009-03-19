<?php  $attr1_class='main';  ?>  <?php
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
<?php unset($attr1_class); ?><?php  $attr2_name='GLOBAL_MODELS';  $attr2_icon='group';  $attr2_widths='50%,25%,25%';  $attr2_width='93%';  $attr2_rowclasses='odd,even';  $attr2_columnclasses='1,2,3';  ?>    <?php
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
    		if (@$conf['interface']['application_mode'] )
    		{
    			echo '<table class="main" cellspacing="0" cellpadding="4" width="100%" style="margin:0px;border:0px; padding:0px;" height_oo="100%">';
    		}
    		else
    		{
    			echo '<br/><br/><br/><center>';
    			echo '<table class="main" cellspacing="0" cellpadding="4" width="'.$attr2_width.'">';
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
<?php unset($attr2_name);unset($attr2_icon);unset($attr2_widths);unset($attr2_width);unset($attr2_rowclasses);unset($attr2_columnclasses); ?><?php  $attr3_list='el';  $attr3_extract=true;  $attr3_key='list_key';  $attr3_value='list_value';  ?>      <?php
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
      ?><?php unset($attr3_list);unset($attr3_extract);unset($attr3_key);unset($attr3_value); ?><?php  ?>        <?php
        	$row_class_idx++;
        	if ($row_class_idx > count($row_classes))
        		$row_class_idx=1;
        	$row_class=$row_classes[$row_class_idx-1];
        	if (empty($attr4_class))
        		$attr4_class=$row_class;
        	global $cell_column_nr;
        	$cell_column_nr=0;
        	$column_class_idx = 999;
        ?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_class='fx';  ?>          <?php
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
          ?>><?php unset($attr5_class); ?><?php  $attr6_title='';  $attr6_target='cms_main';  $attr6_url=$url;  $attr6_class='';  ?>            <?php
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
            ?><a<?php if (isset($attr6_name)) echo ' name="'.$attr6_name.'"'; else echo ' href="'.$tmp_url.($attr6_anchor?'#'.$attr6_anchor:'').'"' ?> class="<?php echo $attr6_class ?>" target="<?php echo $attr6_target ?>"<?php if (isset($attr6_accesskey)) echo ' accesskey="'.$attr6_accesskey.'"' ?>  title="<?php echo encodeHtml($attr6_title) ?>"><?php unset($attr6_title);unset($attr6_target);unset($attr6_url);unset($attr6_class); ?><?php  $attr7_file='icon_model';  $attr7_align='left';  ?>              <?php
              	$attr7_tmp_image_file = $image_dir.$attr7_fileext;
              	$attr7_tmp_image_file = $image_dir.$attr7_file.IMG_ICON_EXT;
              ?><img src="<?php echo $attr7_tmp_image_file ?>" border="0"<?php if(isset($attr7_align)) echo ' align="'.$attr7_align.'"' ?><?php if (isset($attr7_size)) { list($attr7_tmp_width,$attr7_tmp_height)=explode('x',$attr7_size);echo ' width="'.$attr7_tmp_width.'" height="'.$attr7_tmp_height.'"';} ?>><?php unset($attr7_file);unset($attr7_align); ?><?php  $attr7_class='text';  $attr7_var='name';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_var);unset($attr7_escape); ?><?php  ?>          </a><?php  ?><?php  ?>        </td><?php  ?><?php  $attr5_class='fx';  ?>          <?php
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
          ?>><?php unset($attr5_class); ?><?php  $attr6_present='default_url';  ?>            <?php 
            	$attr6_tmp_exec = isset($$attr6_present);
            	$attr6_tmp_last_exec = $attr6_tmp_exec;
            	if	( $attr6_tmp_exec )
            	{
            ?>
<?php unset($attr6_present); ?><?php  $attr7_title='';  $attr7_target='cms_main';  $attr7_url=$default_url;  $attr7_class='';  ?>              <?php
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
              ?><a<?php if (isset($attr7_name)) echo ' name="'.$attr7_name.'"'; else echo ' href="'.$tmp_url.($attr7_anchor?'#'.$attr7_anchor:'').'"' ?> class="<?php echo $attr7_class ?>" target="<?php echo $attr7_target ?>"<?php if (isset($attr7_accesskey)) echo ' accesskey="'.$attr7_accesskey.'"' ?>  title="<?php echo encodeHtml($attr7_title) ?>"><?php unset($attr7_title);unset($attr7_target);unset($attr7_url);unset($attr7_class); ?><?php  $attr8_class='text';  $attr8_text='GLOBAL_make_default';  $attr8_escape=true;  ?>                <?php
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
                ?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_text);unset($attr8_escape); ?><?php  ?>            </a><?php  ?><?php  ?>          <?php } ?><?php  ?><?php  ?>            <?php if (!$attr6_tmp_last_exec) { ?>
<?php  ?><?php  $attr7_class='text';  $attr7_text='GLOBAL_is_default';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_text);unset($attr7_escape); ?><?php  ?>          <?php }
          unset($attr5_tmp_last_exec) ?><?php  ?><?php  ?>        </td><?php  ?><?php  $attr5_class='fx';  ?>          <?php
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
          ?>><?php unset($attr5_class); ?><?php  $attr6_present='select_url';  ?>            <?php 
            	$attr6_tmp_exec = isset($$attr6_present);
            	$attr6_tmp_last_exec = $attr6_tmp_exec;
            	if	( $attr6_tmp_exec )
            	{
            ?>
<?php unset($attr6_present); ?><?php  $attr7_title='';  $attr7_target=@$conf['interface']['frames']['top'];  $attr7_url=$select_url;  $attr7_class='';  ?>              <?php
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
              ?><a<?php if (isset($attr7_name)) echo ' name="'.$attr7_name.'"'; else echo ' href="'.$tmp_url.($attr7_anchor?'#'.$attr7_anchor:'').'"' ?> class="<?php echo $attr7_class ?>" target="<?php echo $attr7_target ?>"<?php if (isset($attr7_accesskey)) echo ' accesskey="'.$attr7_accesskey.'"' ?>  title="<?php echo encodeHtml($attr7_title) ?>"><?php unset($attr7_title);unset($attr7_target);unset($attr7_url);unset($attr7_class); ?><?php  $attr8_class='text';  $attr8_text='GLOBAL_select';  $attr8_escape=true;  ?>                <?php
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
                ?></<?php echo $tmp_tag ?>><?php unset($attr8_class);unset($attr8_text);unset($attr8_escape); ?><?php  ?>            </a><?php  ?><?php  ?>          <?php } ?><?php  ?><?php  ?>            <?php if (!$attr6_tmp_last_exec) { ?>
<?php  ?><?php  $attr7_class='text';  $attr7_text='GLOBAL_selected';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_text);unset($attr7_escape); ?><?php  ?>          <?php }
          unset($attr5_tmp_last_exec) ?><?php  ?><?php  ?>        </td><?php  ?><?php  ?>      </tr><?php  ?><?php  $attr4_var='select_url';  ?>        <?php
        	if (!isset($attr4_value))
        		unset($$attr4_var);
        	elseif (isset($attr4_key))
        		$$attr4_var = $attr4_value[$attr4_key];
        	else
        		$$attr4_var = $attr4_value;
        ?><?php unset($attr4_var); ?><?php  $attr4_var='default_url';  ?>        <?php
        	if (!isset($attr4_value))
        		unset($$attr4_var);
        	elseif (isset($attr4_key))
        		$$attr4_var = $attr4_value[$attr4_key];
        	else
        		$$attr4_var = $attr4_value;
        ?><?php unset($attr4_var); ?><?php  ?>    <?php } ?><?php  ?><?php  ?>        </table>
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
<?php  ?><?php  ?></body>
</html><?php  ?>