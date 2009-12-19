<?php
	#IF-ATTR action#
	#ELSE
		$attr_action = $actionName;
	#END-IF
	#IF-ATTR subaction#
	#ELSE
		$attr_subaction = $targetSubActionName;
	#END-IF
	#IF-ATTR id#
	#ELSE
		$attr_id = $this->getRequestId();
	#END-IF
		
	if ($this->isEditable())
	{
		if	($this->isEditMode())
		{
			$attr_method    = 'POST';
		}
		else
		{
			$attr_method    = 'GET';
			$attr_subaction = $subActionName;
		}
	}
		
?><form name="<?php echo $attr_name ?>"
      target="<?php echo $attr_target ?>"
      action="<?php echo Html::url( $attr_action,$attr_subaction,$attr_id ) ?>"
      method="<?php echo $attr_method ?>"
      enctype="<?php echo $attr_enctype ?>" style="margin:0px;padding:0px;">
      
<?php if ($this->isEditable() && !$this->isEditMode()) { ?>
<input type="hidden" name="mode" value="edit" />
<?php } ?>
	
<input type="hidden" name="<?php echo REQ_PARAM_ACTION ?>" value="<?php echo $attr_action ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_SUBACTION ?>" value="<?php echo $attr_subaction ?>" />
<input type="hidden" name="<?php echo REQ_PARAM_ID ?>" value="<?php echo $attr_id ?>" /><?php
		if	( $conf['interface']['url_sessionid'] )
			echo '<input type="hidden" name="'.session_name().'" value="'.session_id().'" />'."\n";
?>