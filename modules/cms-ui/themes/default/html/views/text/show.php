<?php if (!defined('OR_TITLE')) die('Forbidden'); ?>
			<tr>
				<td colspan="2">
					<iframe src="<?php echo $preview_url ?>"></iframe>
					<a class="action" target="_self" data-action="file" data-method="edit" data-id="<?php echo OR_ID ?>" data-extra="[]" href="./#/file/">
						<img src="./modules/cms-ui/themes/default/images/icon/icon/edit.png" />
						<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'menu_file_edit'.'')))); ?></span>
					</a>
					<a class="action" target="_self" data-action="file" data-method="editvalue" data-id="<?php echo OR_ID ?>" data-extra="[]" href="./#/file/">
						<img src="./modules/cms-ui/themes/default/images/icon/icon/editvalue.png" />
						<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'menu_file_editvalue'.'')))); ?></span>
					</a>
				</td>
			</tr>