page
	form

RAW
<?php
	function editBar()
	{
		global $image_dir,$objects;
		?>
<tr>
  <td colspan="2" class="f1">
    <table>
      <tr>
        <noscript><input type="text" name="addtext" size="10" /></noscript>
        <td><noscript><?php echo Html::Checkbox('strong') ?></noscript><a href="javascript:strong();" title="<?php echo lang('PAGE_EDITOR_ADD_STRONG') ?>"><img src="<?php echo $image_dir ?>/editor/bold.png" border"0"   /></a></td>
        <td><noscript><?php echo Html::Checkbox('emphatic') ?></noscript><a href="javascript:emphatic();" title="<?php echo lang('PAGE_EDITOR_ADD_EMPHATIC') ?>"><img src="<?php echo $image_dir ?>/editor/italic.png" border"0" /></a></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><noscript><?php echo Html::Checkbox('table') ?></noscript><a href="javascript:table();" title="<?php echo lang('PAGE_EDITOR_ADD_TABLE') ?>"><img src="<?php echo $image_dir ?>/editor/table.png" border"0" /></a></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><noscript><?php echo Html::Checkbox('list') ?></noscript><a href="javascript:list();" title="<?php echo lang('PAGE_EDITOR_ADD_LIST') ?>"><img src="<?php echo $image_dir ?>/editor/list.png" border"0" /></a></td>
        <td><noscript><?php echo Html::Checkbox('numlist') ?></noscript><a href="javascript:numlist();" title="<?php echo lang('PAGE_EDITOR_ADD_NUMLIST') ?>"><img src="<?php echo $image_dir ?>/editor/numlist.png" border"0" /></a></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><noscript><?php echo Html::Checkbox('image') ?></noscript><a href="javascript:image();" title="<?php echo lang('PAGE_EDITOR_ADD_IMAGE') ?>"><img src="<?php echo $image_dir ?>/editor/image.png" border"0" /></a></td>
        <td><noscript><?php echo Html::Checkbox('link') ?></noscript><a href="javascript:link();" title="<?php echo lang('PAGE_EDITOR_ADD_LINK') ?>"><img src="<?php echo $image_dir ?>/editor/link.png" border"0" /></a></td>
        <td><?php echo Html::selectBox('objectid',$objects) ?><noscript>&nbsp;&nbsp;&nbsp;<input type="submit" class="submit" name="addmarkup" value="<?php echo lang('GLOBAL_ADD') ?>"/></noscript></td>
      </tr>
    </table>
  </td>
</tr>

<?php } ?>

<script name="Javascript" type="text/javascript" src="<?php echo $tpl_dir ?>../js/editor.js"></script>
<script name="JavaScript" type="text/javascript">
<!--

function strong()
{
	insert('text','*','*');
}


function emphatic()
{
	insert('text','_','_');
}


function link()
{
	insert('text','"','"->"'+document.forms[0].objectid.value+'"');
}


function image()
{
	insert('text','','{"'+document.forms[0].objectid.value+'"}');
}


function list()
{
	insert('text',"\n\n- ","\n- \n- \n");
}


function numlist()
{
	insert('text',"\n\n# ","\n# \n# \n");
}


function table()
{
	insert('text',"\n|","| |\n| | |\n");
}


//-->
-->
</script>
END

		window name:element
			row
				cell colspan:2 class:help
					text var:desc

			if present:preview_text
				row
					cell colspan:2 class:fx
						text var:preview_text
RAW
<?php editBar() ?>
END

			row
				cell colspan:2 class:fx
					inputarea class:longtext name:text
			
RAW			
<tr>
  <td class="f2"><?php if ( $release ) echo Html::checkBox('release',true).' '.lang('GLOBAL_RELEASE') ?></td>
  <td class="f2"><?php echo Html::checkBox('html',$html,false) ?> <span title="<?php echo lang('EL_PROP_HTML_DESC') ?>"><?php echo lang('EL_PROP_HTML') ?></span></td>
</tr>

<tr>
  <td class="f2"><?php if	( $publish ) echo Html::checkBox('publish',false).' '.lang('PAGE_PUBLISH_AFTER_SAVE') ?>&nbsp;</td>
  <td class="f2" rowspan="2"><?php echo Html::checkBox('wiki',$wiki,false) ?> <span title="<?php echo lang('EL_PROP_WIKI_DESC') ?>"><?php echo lang('EL_PROP_WIKI') ?></span><?php if ($wiki) echo '<br/>'.lang('PAGE_LONGTEXT_WIKI_DESC') ?></td>
</tr>
END

			row
				cell colspan:2 class:act
					button type:ok

	focus field:text