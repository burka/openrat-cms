<?php include( $tpl_dir.'header.tpl.php') ?>

<!-- $Id$ -->

<center>

<?php echo Html::form('group','save',$groupid) ?>

<?php windowOpen( 'GLOBAL_GROUP') ?>

  <tr>
    <td width="50%" class="f1"><?php echo lang('GLOBAL_NAME') ?></a></td>
    <td width="50%" class="f1"><input type="text" name="name" value="<?php echo $name ?>"></td>
  </tr>

  <tr>
    <td class="f1" rowspan="2"><?php echo lang('GLOBAL_DELETE') ?></a></td>
    <td class="f1"><input type="checkbox" name="delete" value="1"></td>
  </tr>
  <tr>
    <td class="help"><?php echo lang('GROUP_DELETE_DESC') ?></td>
  </tr>

  <tr>
    <td class="act" colspan="2"><input type="submit" class="submit" value="<?php echo lang('GLOBAL_SAVE') ?>"></td>
  </tr>

<?php windowClose() ?>

</form>

<script name="JavaScript" type="text/javascript"><!--
document.forms[0].name.focus();
//--></script>

</center>
<?php include( $tpl_dir.'footer.tpl.php') ?>