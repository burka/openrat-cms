<?php if (!defined('OR_TITLE')) die('Forbidden'); ?>
	<div class="or-table-wrapper"><div class="or-table-filter"><input type="search" name="filter" placeholder="<?php echo lang('SEARCH_FILTER') ?>" /></div><div class="or-table-area"><table width="100%">
		<tr class="headline">
			<td>
				<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'name'.'')))); ?></span>
			</td>
			<td>
				<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'type'.'')))); ?></span>
			</td>
		</tr>
		<?php foreach($elements as $list_key=>$list_value){ ?><?php extract($list_value) ?>
			<tr class="data">
				<td class="clickable">
					<a target="_self" date-name="<?php echo $name ?>" name="<?php echo $name ?>" data-type="open" data-action="element" data-method="edit" data-id="<?php echo $id ?>" data-extra="[]" href="./#/element/<?php echo $id ?>">
						<i class="image-icon image-icon--action-el_<?php echo $type ?>"></i>
						<span title="<?php echo $description ?>"><?php echo nl2br(encodeHtml(htmlentities($name))); ?></span>
					</a>
				</td>
				<td>
					<span><?php echo nl2br(encodeHtml(htmlentities(lang('EL_'.$type.'')))); ?></span>
				</td>
			</tr>
		<?php } ?>
		<?php $if3=(($elements)==FALSE); if($if3){?>
			<tr>
				<td colspan="2">
					<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_NOT_FOUND'.'')))); ?></span>
				</td>
			</tr>
		<?php } ?>
		<tr class="data">
			<td colspan="2" class="clickable">
				<a target="_self" data-type="dialog" data-action="template" data-method="addel" data-id="<?php echo $templateid ?>" data-extra="{'dialogAction':'template','dialogMethod':'addel'}" href="./#/template/<?php echo $templateid ?>">
					<i class="image-icon image-icon--method-add"></i>
					<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'menu_template_addel'.'')))); ?></span>
				</a>
			</td>
		</tr>
	</table></div></div>
	<?php foreach($models as $list_key=>$list_value){ ?><?php extract($list_value) ?>
		<fieldset class="toggle-open-close<?php echo true?" open":" closed" ?><?php echo true?" show":"" ?>"><legend class="on-click-open-close"><div class="arrow arrow-right on-closed"></div><div class="arrow arrow-down on-open"></div><?php echo $name ?></legend><div class="closable">
			<div class="clickable">
				<code><?php echo nl2br(encodeHtml(htmlentities(Text::maxLength( $source,200,'..',constant('STR_PAD_BOTH') )))); ?></code>
				<br/>
				<a class="or-form-button" target="_self" data-type="edit" data-action="" data-method="src" data-id="<?php echo OR_ID ?>" data-extra="{'modelid':'<?php echo $modelid ?>'}" href="./#//">
					<i class="image-icon image-icon--action-template"></i>
					<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'edit'.'')))); ?></span>
				</a>
			</div>
		</div></fieldset>
	<?php } ?>