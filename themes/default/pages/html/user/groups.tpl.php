<?php include( $tpl_dir.'header.tpl.php') ?>

<!-- $Id$ -->

<center>

<?php echo Html::form('user','addgroup',$userid) ?>

<?php windowOpen( 'USER_MEMBERSHIPS') ?>

<?php $f1=true;
      foreach( $memberships as $id=>$name )
      { ?>
<tr>
<td width="70%" class="<?php if($f1==true) {echo'f1';          }else{echo'f2';         }?>"><img src="<?php echo $image_dir.'icon_group'.IMG_EXT ?>" align="left"><?php echo $name ?></td>
<td width="30%" class="<?php if($f1==true) {echo'f1';$f1=false;}else{echo'f2';$f1=true;}?>"><a href="<?php echo Html::url('user','delgroup',$userid,array('groupid'=>$id)) ?>"><?php echo lang('GLOBAL_DELETE') ?></a></td>
</tr>
<?php }
      if   ( count($memberships) == 0 )
      {
?>
<tr>
<td colspan="2" class="f1"><?php echo lang('GLOBAL_NOT_FOUND') ?></td>
</tr>
<?php } ?>

<?php if   ( count($groups) > 0 )
      {  ?>

<tr>
  <td width="70%" class="act"><?php echo Html::selectBox('groupid',$groups) ?></a></td>
  <td width="30%" class="act"><input type="submit" class="submit" value="<?php echo lang('GLOBAL_ADD') ?>"></td>
</tr>
<?php windowClose() ?>

</form>

<?php } ?>

</center>
<?php include( $tpl_dir.'footer.tpl.php') ?>