<?php if (!defined('OR_TITLE')) die('Forbidden'); ?>
	<div class="or-table-wrapper"><div class="or-table-filter"><input type="search" name="filter" placeholder="<?php echo lang('SEARCH_FILTER') ?>" /></div><div class="or-table-area"><table width="100%">
		<tr class="headline">
			<td>
				<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'name'.'')))); ?></span>
			</td>
		</tr>
		<?php foreach($el as $list_key=>$list_value){ ?><?php extract($list_value) ?>
			<tr class="data">
				<td data-name="<?php echo $name ?>" data-action="group" data-id="<?php echo $id ?>" class="clickable clickable">
					<a target="_self" date-name="<?php echo $name ?>" name="<?php echo $name ?>" data-type="open" data-action="group" data-method="show" data-id="<?php echo $id ?>" data-extra="[]" href="./#/group/<?php echo $id ?>">
						<i class="image-icon image-icon--action-group"></i>
						<span><?php echo nl2br(encodeHtml(htmlentities(Text::maxLength( $name,30,'..',constant('STR_PAD_BOTH') )))); ?></span>
					</a>
				</td>
			</tr>
		<?php } ?>
		<tr class="data">
			<td colspan="2" class="clickable">
				<a target="_self" date-name="<?php echo lang('menu_add') ?>" name="<?php echo lang('menu_add') ?>" data-type="dialog" data-action="" data-method="add" data-id="<?php echo OR_ID ?>" data-extra="{'dialogAction':null,'dialogMethod':'add'}" href="./#//">
					<i class="image-icon image-icon--method-add"></i>
					<span><?php echo nl2br(encodeHtml(htmlentities(lang('new')))); ?></span>
				</a>
			</td>
		</tr>
	</table></div></div>