<?php if (!defined('OR_TITLE')) die('Forbidden'); ?>
	<form name="" target="_self" data-target="view" action="./" data-method="createtext" data-action="folder" data-id="<?php echo OR_ID ?>" method="POST" enctype="application/x-www-form-urlencoded" class="or-form folder" data-async="false" data-autosave="false"><input type="hidden" name="<?php echo REQ_PARAM_TOKEN ?>" value="<?php echo token() ?>" /><input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="folder" /><input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="createtext" /><input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo OR_ID ?>" />
		<div class="line">
			<div class="label">
				<label for="<?php echo REQUEST_ID ?>_name" class="label">
					<span><?php echo nl2br(encodeHtml(htmlentities(lang('global_FILE')))); ?></span>
				</label>
			</div>
			<div class="input">
				<input size="40" id="req0_file" type="file" maxlength="<?php echo $maxlength ?>" name="file" class="upload"  multiple="multiple" />
			</div>
		</div>
		<div class="line or-dropzone-upload">
			<div class="label">
			</div>
			<div class="input">
			</div>
		</div>
		<div class="line">
			<div class="label">
				<span class="help"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'file_max_size'.'')))); ?></span>
			</div>
			<div class="input">
				<span><?php echo nl2br(encodeHtml(htmlentities($max_size))); ?></span>
			</div>
		</div>
		<div class="line">
			<div class="label">
				<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'HTTP_URL'.'')))); ?></span>
			</div>
			<div class="input">
				<div class="inputholder"><input id="<?php echo REQUEST_ID ?>_url" name="<?php if ('') echo ''.'_' ?>url<?php if (false) echo '_disabled' ?>" type="text" maxlength="256" class="" value="<?php echo Text::encodeHtml(@$url) ?>" /><?php if (false) { ?><input type="hidden" name="url" value="<?php $url ?>"/><?php } ?></div>
			</div>
		</div>
		<fieldset class="toggle-open-close<?php echo true?" open":" closed" ?><?php echo true?" show":"" ?>"><legend class="on-click-open-close"><div class="arrow arrow-right on-closed"></div><div class="arrow arrow-down on-open"></div><?php echo lang('description') ?></legend><div class="closable">
		</div></fieldset>
		<div class="line">
			<div class="label">
				<span><?php echo nl2br(encodeHtml(htmlentities(lang('global_NAME')))); ?></span>
			</div>
			<div class="input">
				<div class="inputholder"><input id="<?php echo REQUEST_ID ?>_name" name="<?php if ('') echo ''.'_' ?>name<?php if (false) echo '_disabled' ?>" type="text" maxlength="256" class="" value="<?php echo Text::encodeHtml(@$name) ?>" /><?php if (false) { ?><input type="hidden" name="name" value="<?php $name ?>"/><?php } ?></div>
			</div>
		</div>
		<div class="line">
			<div class="label">
				<span><?php echo nl2br(encodeHtml(htmlentities(lang('global_DESCRIPTION')))); ?></span>
			</div>
			<div class="input">
				<div class="inputholder"><textarea class="inputarea" name="<?php if ('') echo ''.'_' ?>description<?php if (false) echo '_disabled' ?>"><?php echo Text::encodeHtml('') ?></textarea></div>
			</div>
		</div>
	<div class="or-form-actionbar"><input type="button" class="or-form-btn or-form-btn--secondary or-form-btn--cancel" value="<?php echo lang("CANCEL") ?>" /><input type="submit" class="or-form-btn or-form-btn--primary or-form-btn--save" value="<?php echo lang('BUTTON_OK') ?>" /></div></form>