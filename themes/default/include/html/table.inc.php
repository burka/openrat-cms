<?php
	$coloumn_widths = array();
	$row_classes    = array();
	$column_classes = array();

	#IF-ATTR class#
	#ELSE
		$attr_class='';
	#END-IF

	#IF-ATTR widths#
		$column_widths = explode(',',$attr_widths);
	#END-IF

	#IF-ATTR classes#
		$row_classes   = explode(',',$attr_rowclasses);
		$row_class_idx = 999;
	#END-IF
		
	#IF-ATTR rowclasses#
		$row_classes   = explode(',',$attr_rowclasses);
		$row_class_idx = 999;
	#END-IF
		
	#IF-ATTR columnclasses#
		$column_classes   = explode(',',$attr_columnclasses);
	#END-IF
		
?><table class="<?php echo $attr_class ?>" cellspacing="<?php echo $attr_space ?>" width="<?php echo $attr_width ?>" cellpadding="<?php echo $attr_padding ?>">