<?php if (!defined('OR_TITLE')) die('Forbidden'); ?>
	<div class="or-table-wrapper"><div class="or-table-filter"><input type="search" name="filter" placeholder="<?php echo lang('SEARCH_FILTER') ?>" /></div><div class="or-table-area"><table width="100%">
		<tr class="headline">
			<td>
				<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_TYPE'.'')))); ?></span>
				<span><?php echo nl2br('&nbsp;/&nbsp;'); ?></span>
				<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_NAME'.'')))); ?></span>
			</td>
		</tr>
		<?php $if3=(isset($up_url)); if($if3){?>
			<tr class="data">
				<td>
					<img src="./modules/cms-ui/themes/default/images/icon_folder_up.png" />
					<span><?php echo nl2br('..'); ?></span>
				</td>
			</tr>
		<?php } ?>
		<?php foreach($content as $list_key=>$list_value){ ?><?php extract($list_value) ?>
			<tr class="data">
				<td class="clickable">
					<a target="_self" date-name="<?php echo $name ?>" name="<?php echo $name ?>" data-type="open" data-action="<?php echo $type ?>" data-method="edit" data-id="<?php echo $id ?>" data-extra="[]" href="./#/<?php echo $type ?>/<?php echo $id ?>">
						<i class="image-icon image-icon--action-<?php echo $type ?>"></i>
						<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.$name.'')))); ?></span>
						<span><?php echo nl2br('&nbsp;'); ?></span>
					</a>
				</td>
			</tr>
		<?php } ?>
	</table></div></div>