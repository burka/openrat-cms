
	
		<?php $if2=(config('security','nopublish')); if($if2){?>
			<div class="message warn">
				<span class="help"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_NOPUBLISH_DESC'.'')))); ?></span>
				
			</div>
		<?php } ?>
		<form name="" target="_self" data-target="view" action="./" data-method="pub" data-action="file" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="or-form file" data-async="1" data-autosave=""><input type="hidden" name="<?php echo REQ_PARAM_EMBED ?>" value="1" /><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="file" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="pub" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
			<tr>
				<td>
					<br/>
					
				</td>
			</tr>
			<tr>
				<td class="act">
							<div class="invisible"><input type="submit" 	name="ok" class="%class%"
	title="Bestätigen"
	value="&nbsp;&nbsp;&nbsp;&nbsp;OK&nbsp;&nbsp;&nbsp;&nbsp;" />	
					</div>
				</td>
			</tr>
		<div class="or-form-actionbar"><input type="button" class="or-form-btn or-form-btn" value="<?php echo lang("CANCEL") ?>" /><input type="submit" class="or-form-btn or-form-btn--primary" value="<?php echo lang('publish') ?>" /></div></form>
	