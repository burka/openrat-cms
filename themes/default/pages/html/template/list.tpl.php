<?php include( $tpl_dir.'header.tpl.php') ?>

<!-- $Id$ -->
<center>

<?php echo Html::form('template','add') ?>

<table class="main" width="50%" cellspacing="0" cellpadding="4">

<tr>
  <th colspan="2"><?php echo lang('GLOBAL_TEMPLATES') ?></th>
</tr>

<?php $f1=true;
	 $fx='';
      foreach( $templates as $id=>$e )
      {
      	$fx = fx( $fx ); ?>
<tr>
<td class="<?php echo $fx ?>"><a href="<?php echo $e['url'] ?>" target="cms_main"><?php echo $e['name'] ?></a></td>
</tr>
<?php } ?>


<?php if ( count($templates)==0 )
      { ?>
 <tr>
    <td class="help"><?php echo lang('GLOBAL_NO_TEMPLATES_AVAILABLE_DESC') ?></td>
  </tr>
<?php } ?>
  
<tr>
<td class="act"><input type="text" name="name" value="">&nbsp;<input type="submit" class="submit" value="<?php echo lang('GLOBAL_ADD') ?>"></td>
</tr>

</table>

</form>

<script name="JavaScript" type="text/javascript"><!--
document.forms[0].name.focus();
//--></script>
</center>
<?php include( $tpl_dir.'footer.tpl.php') ?>