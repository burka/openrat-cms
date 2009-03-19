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
<?php unset($attr1_class); ?><?php  $attr2_name='';  $attr2_target='_self';  $attr2_method='post';  $attr2_enctype='application/x-www-form-urlencoded';  ?>    <?php
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
    ?><?php unset($attr2_name);unset($attr2_target);unset($attr2_method);unset($attr2_enctype); ?><?php  $attr3_icon='search';  $attr3_width='93%';  $attr3_rowclasses='odd,even';  $attr3_columnclasses='1,2,3';  ?>      <?php
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
<?php unset($attr3_icon);unset($attr3_width);unset($attr3_rowclasses);unset($attr3_columnclasses); ?><?php  ?>        <?php
        	$row_class_idx++;
        	if ($row_class_idx > count($row_classes))
        		$row_class_idx=1;
        	$row_class=$row_classes[$row_class_idx-1];
        	if (empty($attr4_class))
        		$attr4_class=$row_class;
        	global $cell_column_nr;
        	$cell_column_nr=0;
        	$column_class_idx = 999;
        ?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_colspan='2';  ?>          <?php
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
          ?>><?php unset($attr5_colspan); ?><?php  $attr6_title=lang('global_user');  ?>            <fieldset><?php if(isset($attr6_title)) { ?><legend><?php echo encodeHtml($attr6_title) ?></legend><?php } ?><?php unset($attr6_title); ?><?php  ?>          </fieldset><?php  ?><?php  ?>        </td><?php  ?><?php  ?>      </tr><?php  ?><?php  ?>        <?php
        	$row_class_idx++;
        	if ($row_class_idx > count($row_classes))
        		$row_class_idx=1;
        	$row_class=$row_classes[$row_class_idx-1];
        	if (empty($attr4_class))
        		$attr4_class=$row_class;
        	global $cell_column_nr;
        	$cell_column_nr=0;
        	$column_class_idx = 999;
        ?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  ?>          <?php
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
          ?>><?php  ?><?php  $attr6_readonly=false;  $attr6_name='type';  $attr6_value='create_user';  $attr6_default=false;  $attr6_prefix='';  $attr6_suffix='';  $attr6_class='';  $attr6_onchange='';  ?>            <?php
            		if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
            		if	( isset($$attr6_name)  )
            			$attr6_tmp_default = $$attr6_name;
            		elseif ( isset($attr6_default) )
            			$attr6_tmp_default = $attr6_default;
            		else
            			$attr6_tmp_default = '';
             ?><input type="radio" id="id_<?php echo $attr6_name.'_'.$attr6_value ?>"  name="<?php echo $attr6_prefix.$attr6_name ?>"<?php if ( $attr6_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr6_value ?>" <?php if($attr6_value==$attr6_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr6_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr6_readonly);unset($attr6_name);unset($attr6_value);unset($attr6_default);unset($attr6_prefix);unset($attr6_suffix);unset($attr6_class);unset($attr6_onchange); ?><?php  $attr6_for='type';  $attr6_value='create_user';  ?>            <label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for);unset($attr6_value); ?><?php  $attr7_class='text';  $attr7_key='create_user';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_key);unset($attr7_escape); ?><?php  ?>          </label><?php  ?><?php  ?>            <br/><?php  ?><?php  $attr6_readonly=false;  $attr6_name='type';  $attr6_value='lastchange_user';  $attr6_default=false;  $attr6_prefix='';  $attr6_suffix='';  $attr6_class='';  $attr6_onchange='';  ?>            <?php
            		if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
            		if	( isset($$attr6_name)  )
            			$attr6_tmp_default = $$attr6_name;
            		elseif ( isset($attr6_default) )
            			$attr6_tmp_default = $attr6_default;
            		else
            			$attr6_tmp_default = '';
             ?><input type="radio" id="id_<?php echo $attr6_name.'_'.$attr6_value ?>"  name="<?php echo $attr6_prefix.$attr6_name ?>"<?php if ( $attr6_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr6_value ?>" <?php if($attr6_value==$attr6_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr6_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr6_readonly);unset($attr6_name);unset($attr6_value);unset($attr6_default);unset($attr6_prefix);unset($attr6_suffix);unset($attr6_class);unset($attr6_onchange); ?><?php  $attr6_for='type';  $attr6_value='lastchange_user';  ?>            <label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for);unset($attr6_value); ?><?php  $attr7_class='text';  $attr7_key='lastchange_user';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_key);unset($attr7_escape); ?><?php  ?>          </label><?php  ?><?php  ?>        </td><?php  ?><?php  ?>          <?php
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
          ?>><?php  ?><?php  $attr6_list='users';  $attr6_name='userid';  $attr6_default=$act_userid;  $attr6_onchange='';  $attr6_title='';  $attr6_class='';  $attr6_addempty=false;  $attr6_multiple=false;  $attr6_size='1';  $attr6_lang=false;  ?>            <?php
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
            ?><?php unset($attr6_list);unset($attr6_name);unset($attr6_default);unset($attr6_onchange);unset($attr6_title);unset($attr6_class);unset($attr6_addempty);unset($attr6_multiple);unset($attr6_size);unset($attr6_lang); ?><?php  ?>        </td><?php  ?><?php  ?>      </tr><?php  ?><?php  ?>        <?php
        	$row_class_idx++;
        	if ($row_class_idx > count($row_classes))
        		$row_class_idx=1;
        	$row_class=$row_classes[$row_class_idx-1];
        	if (empty($attr4_class))
        		$attr4_class=$row_class;
        	global $cell_column_nr;
        	$cell_column_nr=0;
        	$column_class_idx = 999;
        ?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  $attr5_colspan='2';  ?>          <?php
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
          ?>><?php unset($attr5_colspan); ?><?php  $attr6_title=lang('MENU_SEARCH_PROP');  ?>            <fieldset><?php if(isset($attr6_title)) { ?><legend><?php echo encodeHtml($attr6_title) ?></legend><?php } ?><?php unset($attr6_title); ?><?php  ?>          </fieldset><?php  ?><?php  ?>        </td><?php  ?><?php  ?>      </tr><?php  ?><?php  ?>        <?php
        	$row_class_idx++;
        	if ($row_class_idx > count($row_classes))
        		$row_class_idx=1;
        	$row_class=$row_classes[$row_class_idx-1];
        	if (empty($attr4_class))
        		$attr4_class=$row_class;
        	global $cell_column_nr;
        	$cell_column_nr=0;
        	$column_class_idx = 999;
        ?><tr class="<?php echo $attr4_class ?>"><?php  ?><?php  ?>          <?php
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
          ?>><?php  ?><?php  $attr6_readonly=false;  $attr6_name='type';  $attr6_value='id';  $attr6_default=false;  $attr6_prefix='';  $attr6_suffix='';  $attr6_class='';  $attr6_onchange='';  ?>            <?php
            		if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
            		if	( isset($$attr6_name)  )
            			$attr6_tmp_default = $$attr6_name;
            		elseif ( isset($attr6_default) )
            			$attr6_tmp_default = $attr6_default;
            		else
            			$attr6_tmp_default = '';
             ?><input type="radio" id="id_<?php echo $attr6_name.'_'.$attr6_value ?>"  name="<?php echo $attr6_prefix.$attr6_name ?>"<?php if ( $attr6_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr6_value ?>" <?php if($attr6_value==$attr6_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr6_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr6_readonly);unset($attr6_name);unset($attr6_value);unset($attr6_default);unset($attr6_prefix);unset($attr6_suffix);unset($attr6_class);unset($attr6_onchange); ?><?php  $attr6_for='type';  $attr6_value='id';  ?>            <label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for);unset($attr6_value); ?><?php  $attr7_class='text';  $attr7_key='id';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_key);unset($attr7_escape); ?><?php  ?>          </label><?php  ?><?php  ?>            <br/><?php  ?><?php  $attr6_readonly=false;  $attr6_name='type';  $attr6_value='name';  $attr6_default=true;  $attr6_prefix='';  $attr6_suffix='';  $attr6_class='';  $attr6_onchange='';  ?>            <?php
            		if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
            		if	( isset($$attr6_name)  )
            			$attr6_tmp_default = $$attr6_name;
            		elseif ( isset($attr6_default) )
            			$attr6_tmp_default = $attr6_default;
            		else
            			$attr6_tmp_default = '';
             ?><input type="radio" id="id_<?php echo $attr6_name.'_'.$attr6_value ?>"  name="<?php echo $attr6_prefix.$attr6_name ?>"<?php if ( $attr6_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr6_value ?>" <?php if($attr6_value==$attr6_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr6_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr6_readonly);unset($attr6_name);unset($attr6_value);unset($attr6_default);unset($attr6_prefix);unset($attr6_suffix);unset($attr6_class);unset($attr6_onchange); ?><?php  $attr6_for='type';  $attr6_value='name';  ?>            <label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for);unset($attr6_value); ?><?php  $attr7_class='text';  $attr7_key='name';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_key);unset($attr7_escape); ?><?php  ?>          </label><?php  ?><?php  ?>            <br/><?php  ?><?php  $attr6_readonly=false;  $attr6_name='type';  $attr6_value='description';  $attr6_default=false;  $attr6_prefix='';  $attr6_suffix='';  $attr6_class='';  $attr6_onchange='';  ?>            <?php
            		if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
            		if	( isset($$attr6_name)  )
            			$attr6_tmp_default = $$attr6_name;
            		elseif ( isset($attr6_default) )
            			$attr6_tmp_default = $attr6_default;
            		else
            			$attr6_tmp_default = '';
             ?><input type="radio" id="id_<?php echo $attr6_name.'_'.$attr6_value ?>"  name="<?php echo $attr6_prefix.$attr6_name ?>"<?php if ( $attr6_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr6_value ?>" <?php if($attr6_value==$attr6_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr6_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr6_readonly);unset($attr6_name);unset($attr6_value);unset($attr6_default);unset($attr6_prefix);unset($attr6_suffix);unset($attr6_class);unset($attr6_onchange); ?><?php  $attr6_for='type';  $attr6_value='description';  ?>            <label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for);unset($attr6_value); ?><?php  $attr7_class='text';  $attr7_key='description';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_key);unset($attr7_escape); ?><?php  ?>          </label><?php  ?><?php  ?>            <br/><?php  ?><?php  $attr6_readonly=false;  $attr6_name='type';  $attr6_value='filename';  $attr6_default=false;  $attr6_prefix='';  $attr6_suffix='';  $attr6_class='';  $attr6_onchange='';  ?>            <?php
            		if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
            		if	( isset($$attr6_name)  )
            			$attr6_tmp_default = $$attr6_name;
            		elseif ( isset($attr6_default) )
            			$attr6_tmp_default = $attr6_default;
            		else
            			$attr6_tmp_default = '';
             ?><input type="radio" id="id_<?php echo $attr6_name.'_'.$attr6_value ?>"  name="<?php echo $attr6_prefix.$attr6_name ?>"<?php if ( $attr6_readonly ) echo ' disabled="disabled"' ?> value="<?php echo $attr6_value ?>" <?php if($attr6_value==$attr6_tmp_default) echo 'checked="checked"' ?><?php if (in_array($attr6_name,$errors)) echo ' style="borderx:2px dashed red; background-color:red;"' ?> /><?php unset($attr6_readonly);unset($attr6_name);unset($attr6_value);unset($attr6_default);unset($attr6_prefix);unset($attr6_suffix);unset($attr6_class);unset($attr6_onchange); ?><?php  $attr6_for='type';  $attr6_value='filename';  ?>            <label for="id_<?php echo $attr6_for ?><?php if (!empty($attr6_value)) echo '_'.$attr6_value ?>"><?php unset($attr6_for);unset($attr6_value); ?><?php  $attr7_class='text';  $attr7_key='filename';  $attr7_escape=true;  ?>              <?php
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
              ?></<?php echo $tmp_tag ?>><?php unset($attr7_class);unset($attr7_key);unset($attr7_escape); ?><?php  ?>          </label><?php  ?><?php  ?>            <br/><?php  ?><?php  ?>        </td><?php  ?><?php  ?>          <?php
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
          ?>><?php  ?><?php  $attr6_class='';  $attr6_default='';  $attr6_type='text';  $attr6_name='text';  $attr6_size='40';  $attr6_maxlength='256';  $attr6_onchange='';  $attr6_readonly=false;  ?>            <?php if ($this->isEditable() && !$this->isEditMode()) $attr6_readonly=true;
            	  if ($attr6_readonly && empty($$attr6_name)) $$attr6_name = '- '.lang('EMPTY').' -';
                  if(!isset($attr6_default)) $attr6_default='';
            ?><?php if (!$attr6_readonly || $attr6_type=='hidden') {
            ?><input<?php if ($attr6_readonly) echo ' disabled="true"' ?> id="id_<?php echo $attr6_name ?><?php if ($attr6_readonly) echo '_disabled' ?>" name="<?php echo $attr6_name ?><?php if ($attr6_readonly) echo '_disabled' ?>" type="<?php echo $attr6_type ?>" size="<?php echo $attr6_size ?>" maxlength="<?php echo $attr6_maxlength ?>" class="<?php echo $attr6_class ?>" value="<?php echo isset($$attr6_name)?$$attr6_name:$attr6_default ?>" <?php if (in_array($attr6_name,$errors)) echo 'style="border-rightx:10px solid red; background-colorx:yellow; border:2px dashed red;"' ?> /><?php
            if	($attr6_readonly) {
            ?><input type="hidden" id="id_<?php echo $attr6_name ?>" name="<?php echo $attr6_name ?>" value="<?php echo isset($$attr6_name)?$$attr6_name:$attr6_default ?>" /><?php
             } } else { ?><span class="<?php echo $attr6_class ?>"><?php echo isset($$attr6_name)?$$attr6_name:$attr6_default ?></span><?php } ?><?php unset($attr6_class);unset($attr6_default);unset($attr6_type);unset($attr6_name);unset($attr6_size);unset($attr6_maxlength);unset($attr6_onchange);unset($attr6_readonly); ?><?php  ?>        </td><?php  ?><?php  ?>      </tr><?php  ?><?php  $attr4_class='';  ?>        <?php
        	$row_class_idx++;
        	if ($row_class_idx > count($row_classes))
        		$row_class_idx=1;
        	$row_class=$row_classes[$row_class_idx-1];
        	if (empty($attr4_class))
        		$attr4_class=$row_class;
        	global $cell_column_nr;
        	$cell_column_nr=0;
        	$column_class_idx = 999;
        ?><tr class="<?php echo $attr4_class ?>"><?php unset($attr4_class); ?><?php  $attr5_class='act';  $attr5_colspan='2';  ?>          <?php
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
          ?>><?php unset($attr5_class);unset($attr5_colspan); ?><?php  $attr6_type='ok';  $attr6_class='ok';  $attr6_value='ok';  $attr6_text='button_ok';  ?>            <?php
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
            ?><?php unset($attr6_type);unset($attr6_class);unset($attr6_value);unset($attr6_text); ?><?php  ?>        </td><?php  ?><?php  ?>      </tr><?php  ?><?php  ?>          </table>
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
<?php  ?><?php  ?>  </form>
<?php  ?><?php  $attr2_field='name';  ?>    <?php
    if (isset($errors[0])) $attr2_field = $errors[0];
    ?><script name="JavaScript" type="text/javascript"><!--
    document.forms[0].<?php echo $attr2_field ?>.focus();
    document.forms[0].<?php echo $attr2_field ?>.select();
    </script>
<?php unset($attr2_field); ?><?php  ?></body>
</html><?php  ?>