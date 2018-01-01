
	
		<form name="" target="_self" action="<?php echo OR_ACTION ?>" data-method="diff" data-action="<?php echo OR_ACTION ?>" data-id="<?php echo OR_ID ?>" method="get" enctype="application/x-www-form-urlencoded" class="<?php echo OR_ACTION ?>" data-async="" data-autosave="" onSubmit="formSubmit( $(this) ); return false;"><input type="submit" class="invisible" /><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo OR_ACTION ?>" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="diff" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
			<table width="100%">
				<tr class="headline">
					<td class="help">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_NR')))); ?></span>
						
					</td>
					<td class="help" colspan="2">
						<?php $if6=(!empty($compareid)); if($if6){?>
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_COMPARE')))); ?></span>
							
						<?php } ?>
						<?php if(!$if6){?>
							<span class="text"><?php echo nl2br('&nbsp;'); ?></span>
							
						<?php } ?>
					</td>
					<td class="help">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('DATE')))); ?></span>
						
					</td>
					<td class="help">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_USER')))); ?></span>
						
					</td>
					<td class="help">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_VALUE')))); ?></span>
						
					</td>
					<td class="help">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_STATE')))); ?></span>
						
					</td>
					<td class="help">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_ACTION')))); ?></span>
						
					</td>
				</tr>
				<?php $if4=(empty($el)); if($if4){?>
					<tr>
						<td colspan="8">
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_NOT_FOUND')))); ?></span>
							
						</td>
					</tr>
				<?php } ?>
				<?php foreach($el as $list_key=>$list_value){ ?><?php extract($list_value) ?>
					<tr class="data">
						<td>
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities($lfd_nr))); ?></span>
							
						</td>
						<td>
							<?php $if7=(!empty($compareid)); if($if7){?>
								<input  class="radio" type="radio" id="<?php echo REQUEST_ID ?>_compareid_<?php echo $id ?>" name="compareid" value="<?php echo $id ?>"<?php if($id==@$compareid)echo ' checked="checked"' ?> />
								
							<?php } ?>
							<?php if(!$if7){?>
								<span class="text"><?php echo nl2br('&nbsp;'); ?></span>
								
							<?php } ?>
						</td>
						<td>
							<?php $if7=(!empty($compareid)); if($if7){?>
								<input  class="radio" type="radio" id="<?php echo REQUEST_ID ?>_withid_<?php echo $id ?>" name="withid" value="<?php echo $id ?>"<?php if($id==@$withid)echo ' checked="checked"' ?> />
								
							<?php } ?>
							<?php if(!$if7){?>
								<span class="text"><?php echo nl2br('&nbsp;'); ?></span>
								
							<?php } ?>
						</td>
						<td>
							<?php include_once( 'modules/template-engine/components/html/date/component-date.php') ?><?php component_date($date) ?>
							
						</td>
						<td>
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities($user))); ?></span>
							
						</td>
						<td>
							<span class="text"><?php echo nl2br(encodeHtml(htmlentities($value))); ?></span>
							
						</td>
						<?php $if6=($public); if($if6){?>
							<td>
								<strong class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_PUBLIC'.'')))); ?></strong>
								
							</td>
						<?php } ?>
						<?php if(!$if6){?>
							<?php $if7=(!empty($releaseUrl)); if($if7){?>
								<td class="clickable">
									<a title="<?php echo lang('GLOBAL_RELEASE_DESC') ?>" target="_self" data-type="post" data-action="<?php echo OR_ACTION ?>" data-method="release" data-id="<?php echo $objectid ?>" data-data="{&quot;action&quot;:&quot;<?php echo OR_ACTION ?>&quot;,&quot;subaction&quot;:&quot;release&quot;,&quot;id&quot;:&quot;<?php echo $objectid ?>&quot;,&quot;token&quot;:&quot;<?php echo token() ?>&quot;,&quot;var1&quot;:&quot;<?php echo $valueid ?>&quot;,&quot;none&quot;:&quot;0&quot;}">
										<strong class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_RELEASE'.'')))); ?></strong>
										
									</a>

								</td>
							<?php } ?>
							<?php if(!$if7){?>
								<td>
									<em class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_INACTIVE'.'')))); ?></em>
									
								</td>
							<?php } ?>
						<?php } ?>
						<?php $if6=($active); if($if6){?>
							<td>
								<em class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_ACTIVE'.'')))); ?></em>
								
							</td>
						<?php } ?>
						<?php if(!$if6){?>
							<?php $if7=(!empty($useUrl)); if($if7){?>
								<td class="clickable">
									<a title="<?php echo lang('GLOBAL_USE_DESC') ?>" target="_self" data-type="post" data-action="<?php echo OR_ACTION ?>" data-method="use" data-id="<?php echo $objectid ?>" data-data="{&quot;action&quot;:&quot;<?php echo OR_ACTION ?>&quot;,&quot;subaction&quot;:&quot;use&quot;,&quot;id&quot;:&quot;<?php echo $objectid ?>&quot;,&quot;token&quot;:&quot;<?php echo token() ?>&quot;,&quot;var1&quot;:&quot;<?php echo $valueid ?>&quot;,&quot;none&quot;:&quot;0&quot;}">
										<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_USE'.'')))); ?></span>
										
									</a>

								</td>
							<?php } ?>
							<?php if(!$if7){?>
								<td>
								</td>
							<?php } ?>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>
		
<div class="bottom">
	<div class="command 1">
	
		<input type="button" class="submit ok" value="<?php echo lang('compare') ?>" onclick="$(this).closest('div.sheet').find('form').submit(); " />
		
		<!-- Cancel-Button nicht anzeigen, wenn cancel==false. -->	</div>
</div>
</form>
	