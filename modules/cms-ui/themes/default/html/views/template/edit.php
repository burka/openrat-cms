
	
		
		
		<table width="100%">
			<tr class="headline">
				<td>
					<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'name'.'')))); ?></span>
					
				</td>
				<td>
					<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'type'.'')))); ?></span>
					
				</td>
			</tr>
			<?php foreach($elements as $list_key=>$list_value){ ?><?php extract($list_value) ?>
				<tr class="data">
					<td data-name="<?php echo $name ?>" data-action="element" data-id="<?php echo $id ?>" class="clickable">
						<img class="image-icon image-icon--element" title="" src="./modules/cms-ui/themes/default/images/icon/element/<?php echo $type ?>.svg" />
						
						<span class="text" title="<?php echo $description ?>"><?php echo nl2br(encodeHtml(htmlentities($name))); ?></span>
						
					</td>
					<td>
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang('EL_'.$type.'')))); ?></span>
						
					</td>
				</tr>
			<?php } ?>
			<?php $if3=(empty($el)); if($if3){?>
				<tr>
					<td colspan="2">
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'GLOBAL_NOT_FOUND'.'')))); ?></span>
						
					</td>
				</tr>
			<?php } ?>
			<tr class="data">
				<td colspan="2" class="clickable">
					<a target="_self" data-type="dialog" data-action="template" data-method="addel" data-id="<?php echo $templateid ?>" data-extra="{'dialogAction':'template','dialogMethod':'addel'}" href="<?php echo Html::url('template','addel',$templateid,array('dialogAction'=>'template','dialogMethod'=>'addel')) ?>">
						<img class="" title="" src="./modules/cms-ui/themes/default/images/icon/add.png" />
						
						<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'menu_template_addel'.'')))); ?></span>
						
					</a>

				</td>
			</tr>
		</table>
		<fieldset class="<?php echo '1'?" open":" closed" ?><?php echo '1'?" show":"" ?>"><legend><div class="arrow arrow-right on-closed"></div><div class="arrow arrow-down on-open"></div><?php echo lang('src') ?></legend><div>
			<table width="100%">
				<tr class="data">
					<td>
						<div class="clickable">
							<a target="_self" data-type="view" data-action="" data-method="src" data-id="<?php echo OR_ID ?>" data-extra="[]" href="<?php echo Html::url('','src','',array()) ?>">
								<img class="" title="" src="./modules/cms-ui/themes/default/images/icon/template.png" />
								
								<span class="text"><?php echo nl2br(encodeHtml(htmlentities(lang(''.'edit'.'')))); ?></span>
								
							</a>

						</div>
					</td>
				</tr>
			</table>
			<code class="text"><?php echo nl2br($text); ?></code>
			
		</div></fieldset>
	