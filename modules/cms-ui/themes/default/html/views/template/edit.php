
	
		
		
		<div class="table-wrapper"><div class="table-filter"><input type="search" name="filter" placeholder="<?php echo lang('SEARCH_FILTER') ?>" /></div><table width="100%"></div>
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
						<a target="_self" date-name="<?php echo $name ?>" name="<?php echo $name ?>" data-type="open" data-action="element" data-method="edit" data-id="<?php echo $id ?>" data-extra="[]" href="<?php echo Html::url('element','',$id,array()) ?>">
							<i class="image-icon image-icon--element-<?php echo $type ?>"></i>
							
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
					<a target="_self" data-type="dialog" data-action="template" data-method="addel" data-id="<?php echo $templateid ?>" data-extra="{'dialogAction':'template','dialogMethod':'addel'}" href="<?php echo Html::url('template','addel',$templateid,array('dialogAction'=>'template','dialogMethod'=>'addel')) ?>">
						<img src="./modules/cms-ui/themes/default/images/icon/add.png" />
						
						<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'menu_template_addel'.'')))); ?></span>
						
					</a>

				</td>
			</tr>
		</table>
		<fieldset class="toggle-open-close<?php echo '1'?" open":" closed" ?><?php echo '1'?" show":"" ?>"><legend class="on-click-open-close"><div class="arrow arrow-right on-closed"></div><div class="arrow arrow-down on-open"></div><?php echo lang('src') ?></legend><div>
			<div class="table-wrapper"><div class="table-filter"><input type="search" name="filter" placeholder="<?php echo lang('SEARCH_FILTER') ?>" /></div><table width="100%"></div>
				<tr class="data">
					<td>
						<div class="clickable">
							<a target="_self" data-type="view" data-action="" data-method="src" data-id="<?php echo OR_ID ?>" data-extra="[]" href="<?php echo Html::url('','src','',array()) ?>">
								<img src="./modules/cms-ui/themes/default/images/icon/template.png" />
								
								<span><?php echo nl2br(encodeHtml(htmlentities(lang(''.'edit'.'')))); ?></span>
								
							</a>

						</div>
					</td>
				</tr>
			</table>
			<code><?php echo nl2br($text); ?></code>
			
		</div></fieldset>
	