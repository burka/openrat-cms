<?php if (!defined('OR_TITLE')) die('Forbidden'); ?> 
	
		<div class="or-table-wrapper"><div class="or-table-filter"><input type="search" name="filter" placeholder="<?php echo lang('SEARCH_FILTER') ?>" /></div><div class="or-table-area"><table width="100%">
			<tr>
				<td>
				</td>
				<td>
					<em><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_COMPARE')))); ?></em>
					
					<span><?php echo nl2br('&nbsp;'); ?></span>
					
					<?php include_once( 'modules/template-engine/components/html/date/component-date.php') ?><?php component_date($date_left) ?>
					
				</td>
				<td>
				</td>
				<td>
					<em><?php echo nl2br(encodeHtml(htmlentities(lang('GLOBAL_WITH')))); ?></em>
					
					<span><?php echo nl2br('&nbsp;'); ?></span>
					
					<?php include_once( 'modules/template-engine/components/html/date/component-date.php') ?><?php component_date($date_right) ?>
					
				</td>
			</tr>
			<tr>
				<td colspan="4">
				</td>
			</tr>
			<?php foreach($diff as $list_key=>$list_value){ ?><?php extract($list_value) ?>
				<tr class="diff">
					<?php $if5=(isset($left)); if($if5){?>
						<td width="5%" class="line">
							<tt><?php echo nl2br(encodeHtml(htmlentities(@$left[line]))); ?></tt>
							
						</td>
						<td width="45%" class="<?php echo @$left[type] ?>">
							<span><?php echo nl2br(encodeHtml(htmlentities(@$left[text]))); ?></span>
							
						</td>
					<?php } ?>
					<?php if(!$if5){?>
						<td width="50%" colspan="2" class="help">
							<span><?php echo nl2br('&nbsp;'); ?></span>
							
						</td>
					<?php } ?>
					<?php $if5=(isset($right)); if($if5){?>
						<td width="5%" class="line">
							<tt><?php echo nl2br(encodeHtml(htmlentities(@$right[line]))); ?></tt>
							
						</td>
						<td width="45%" class="<?php echo @$right[type] ?>">
							<span><?php echo nl2br(encodeHtml(htmlentities(@$right[text]))); ?></span>
							
						</td>
					<?php } ?>
					<?php if(!$if5){?>
						<td width="50%" colspan="2" class="help">
							<span><?php echo nl2br('&nbsp;'); ?></span>
							
						</td>
					<?php } ?>
				</tr>
				<?php unset($left) ?>
				
				<?php unset($right) ?>
				
			<?php } ?>
		</table></div></div>
				<div class="invisible"><input type="submit" 	name="ok" class="%class%"
	title="?BUTTON_BACK_DESC?"
	value="&nbsp;&nbsp;&nbsp;&nbsp;?BUTTON_BACK?&nbsp;&nbsp;&nbsp;&nbsp;" />	
		</div>
	