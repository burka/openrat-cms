page
	window name:USER_MEMBERSHIPS widths:70%,30% width:70%
		list list:memberships extract:true
			row
				cell class:fx
					image file:icon_group
					text var:name
				cell class:fx
					link url:var:delgroupurl
						text text:GLOBAL_DELETE
