dummy
	form target:_top
		window name:password icon:user width:400px widths:50%,50%

			row
				cell class:logo colspan:2
					logo name:password
				row
					cell
						text text:mail_code
					cell
						input type:text name:code size:30
	
				row
					cell colspan:2 class:act
						button type:ok

	focus field:code
