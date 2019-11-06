<?php if (!defined('OR_TITLE')) die('Forbidden'); ?>
	<form name="" target="_self" data-target="view" action="./" data-method="name" data-action="object" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="or-form object" data-async="false" data-autosave="false"><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="object" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="name" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
		<input type="hidden" name="languageid" value="<?php echo $languageid ?>"/>
		<fieldset class="toggle-open-close<?php echo true?" open":" closed" ?><?php echo true?" show":"" ?>"><legend class="on-click-open-close"><div class="arrow arrow-right on-closed"></div><div class="arrow arrow-down on-open"></div><?php echo lang('alias') ?></legend><div class="closable">
			<label class="or-form-row"><span class="or-form-label"><?php echo lang('name') ?></span><span class="or-form-input"><div class="inputholder"><input id="<?php echo REQUEST_ID ?>_name" name="<?php if ('') echo ''.'_' ?>name<?php if (false) echo '_disabled' ?>" required="required" type="text" maxlength="255" class="" value="<?php echo Text::encodeHtml(@$name) ?>" /><?php if (false) { ?><input type="hidden" name="name" value="<?php $name ?>"/><?php } ?></div></span></label>
			<label class="or-form-row"><span class="or-form-label">?description?</span><span class="or-form-input"><div class="inputholder"><textarea class="description" name="<?php if ('') echo ''.'_' ?>description<?php if (false) echo '_disabled' ?>" maxlength="255"><?php echo Text::encodeHtml($description) ?></textarea></div></span></label>
		</div></fieldset>
	<div class="or-form-actionbar"><input type="button" class="or-form-btn or-form-btn--secondary or-form-btn--cancel" value="<?php echo lang("CANCEL") ?>" /><input type="submit" class="or-form-btn or-form-btn--primary" value="<?php echo lang('global_save') ?>" /></div></form>