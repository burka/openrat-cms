<?php include( $tpl_dir.'header.tpl.php') ?>

<!-- $Id$ -->

<center>

<?php echo Html::form('user','save',$userid) ?>

<?php windowOpen( 'GLOBAL_USER' ) ?>

<tr>
<td width="50%" class="f1" rowspan="2"><?php echo lang('user_username') ?></a></td>
<td width="50%" class="f1"><input type="text" class="name"  size="20" name="name" value="<?php echo $name ?>"></td>
</tr>
  <tr>
    <td class="help"><?php echo lang('USER_USERNAME_DESC') ?></td>
  </tr>
<tr>
<td width="50%" class="f1"><?php echo lang('user_fullname') ?></a></td>
<td width="50%" class="f1"><input type="text" name="fullname" size="50" value="<?php echo $fullname ?>"></td>
</tr>
<tr>
<td width="50%" class="f1"><?php echo lang('user_mail') ?></a></td>
<td width="50%" class="f1"><input type="text" name="mail" size="50" value="<?php echo $mail ?>"><?php if ($mail!='' && !eregi('^[a-zA-Z0-9_.-]+\@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$',$mail)) echo '<strong>'.lang('USER_MAIL_INVALID').'</strong>' ?></td>
</tr>
<tr>
<td width="50%" class="f1"><?php echo lang('USER_DESC') ?></a></td>
<td width="50%" class="f1"><input type="text" name="desc" size="50" value="<?php echo $desc ?>"></td>
</tr>
<tr>
<td width="50%" class="f1"><?php echo lang('USER_TEL') ?></a></td>
<td width="50%" class="f1"><input type="text" name="tel" size="50" value="<?php echo $tel ?>"></td>
</tr>
<tr>
<td width="50%" class="f1" rowspan="2"><?php echo lang('USER_LDAPDN') ?></a></td>
<td width="50%" class="f1"><input type="text" name="ldap_dn" size="50" value="<?php echo $ldap_dn ?>"></td>
</tr>
  <tr>
    <td class="help"><?php echo lang('USER_LDAPDN_DESC') ?></td>
  </tr>
<tr>
<td width="50%" class="f1" rowspan="2"><?php echo lang('USER_STYLE') ?></a></td>
<td width="50%" class="f1"><?php echo Html::selectBox('style',$allstyles,$style) ?></td>
</tr>
  <tr>
    <td class="help"><?php echo lang('USER_STYLE_DESC') ?></td>
  </tr>
<tr>
<td width="50%" class="f1" rowspan="2"><?php echo lang('USER_ADMIN') ?></a></td>
<td width="50%" class="f1"><input type="checkbox" name="is_admin" value="1"<?php if ($is_admin==1) echo ' checked="checked"' ?>></td>
</tr>
  <tr>
    <td class="help"><?php echo lang('USER_ISADMIN_DESC') ?></td>
  </tr>

  <tr>
    <td class="f1" rowspan="2"><?php echo lang('GLOBAL_DELETE') ?></a></td>
    <td class="f1"><input type="checkbox" name="delete" value="1"></td>
  </tr>
  <tr>
    <td class="help"><?php echo lang('USER_DELETE_DESC') ?></td>
  </tr>

  <tr>
    <td class="act"><input type="submit" class="submit" value="<?php echo lang('GLOBAL_SAVE') ?>"></td>
    <td class="act"><input type="reset"  class="reset"  value="<?php echo lang('GLOBAL_UNDO') ?>" onClick="document.forms[0].name.focus();"></td>
  </tr>

<?php windowClose() ?>

</form>

</center>

<script name="JavaScript" type="text/javascript"><!--
document.forms[0].name.focus();
//--></script>

<?php include( $tpl_dir.'footer.tpl.php') ?>