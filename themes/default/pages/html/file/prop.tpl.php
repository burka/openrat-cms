<?php include( $tpl_dir.'header.tpl.php') ?>

<!-- $Id$ -->
<center>

<?php echo Html::form('file','save') ?>

<table class="main" width="90%" cellspacing="0" cellpadding="4">

<tr>
  <th colspan="2"><?php echo lang('GLOBAL_PROP') ?></th>
</tr>

<?php if (isset($message))
      { ?>
<tr>
  <td colspan="2" class="message"><?php echo $message ?></td>
</tr>
<?php } ?>

<tr>
  <td width="50%" class="f1" rowspan="2"><?php echo lang('GLOBAL_NAME') ?></a></td>
  <td width="50%" class="f1"><input type="text" class="name" name="name" size="50" value="<?php echo $name ?>"></td>
</tr>
<tr>
  <td width="50%" class="help"><?php echo lang('GLOBAL_NAME_DESC') ?></td>
</tr>
<tr>
  <td width="50%" class="f1" rowspan="2"><?php echo lang('GLOBAL_FILENAME') ?></a></td>
  <td width="50%" class="f1"><input class="filename" type="text" name="filename" size="40" value="<?php echo $filename ?>"></td>
</tr>
<tr>
  <td width="50%" class="help"><?php echo lang('GLOBAL_FILENAME_DESC') ?></td>
</tr>
<tr>
  <td width="50%" class="f2"><?php echo lang('FILE_extension') ?></a></td>
  <td width="50%" class="f2"><input class="filename" type="text" name="extension" size="10" value="<?php echo $extension ?>"></td>
</tr>
<tr>
  <td width="50%" class="f2"><?php echo lang('GLOBAL_description') ?></a></td>
  <td width="50%" class="f2"><textarea class="desc" cols="40" rows="10" name="desc"><?php echo $desc ?></textarea></td>
</tr>
<tr>
  <td width="50%" class="f2"><?php echo lang('FILE_SIZE') ?></a></td>
  <td width="50%" class="f2"><?php echo number_format($size/1000,0,',','.') ?> kB</td>
</tr>
<tr>
  <td width="50%" class="f2"><?php echo lang('FILE_mimetype') ?></a></td>
  <td width="50%" class="f2"><tt><?php echo $mimetype; ?></tt></td>
</tr>
<tr>
  <td width="50%" class="f2"><?php echo lang('GLOBAL_FULL_FILENAME') ?></a></td>
  <td width="50%" class="f2"><tt><?php echo $full_filename ?></tt></td>
</tr>
 <tr>
    <td width="50%" class="f2"><?php echo lang('GLOBAL_created') ?></a></td>
    <td width="50%" class="f2"><?php echo date(lang('DATE_FORMAT'),$create_date) ?>, <?php Html::printUser($create_user) ?></td>
  </tr>
  <tr>
    <td width="50%" class="f2"><?php echo lang('GLOBAL_lastchange') ?></a></td>
    <td width="50%" class="f2"><?php echo date(lang('DATE_FORMAT'),$lastchange_date) ?>, <?php Html::printUser($lastchange_user) ?></td>
  </tr>
<tr>
  <td class="act" colspan="2"><input type="submit" class="submit" value="<?php echo lang('GLOBAL_SAVE') ?>" /></td>
</tr>

</table>

</form>







<table class="main" width="90%" cellspacing="0" cellpadding="4">

<tr>
  <th colspan="2"><?php echo lang('FILE_PAGES') ?></th>
</tr>
<tr>
  <td colspan="2" class="help"><?php echo lang('FILE_PAGES_DESC') ?></td>
</tr>

<?php $f1=true;
      foreach( $pages as $id=>$p )
      { ?>
<tr>
<td class="f1"><a href="<?php echo $p['url'] ?>" target="cms_main"><img src="<?php echo $image_dir.'icon_page'.IMG_EXT ?>" align="left" border="0"><?php echo $p['name'] ?></a></td>
</tr>
<?php }
      if ( count($pages)==0)
      { ?>
<tr>
<td class="f1"><?php echo lang('GLOBAL_NOT_FOUND') ?></td>
</tr>
<?php } ?>
  

</table>

</center>

<?php Html::focusField('name') ?>

<?php include( $tpl_dir.'footer.tpl.php') ?>