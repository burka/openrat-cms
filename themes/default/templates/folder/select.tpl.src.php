page
	form action:folder subaction:edit
		window name:bla title:titelso widths:5%,75%
			row class:headline
				cell class:help
					text key:SELECT
				cell class:help
					text key:GLOBAL_TYPE
					text raw:_/_
					text key:GLOBAL_NAME
					
			list list:object extract:true
				row class:data
					cell
						if true:writable
							checkbox name:var:id
						if false:writable
							text raw:_

					cell
#						link url:var:url target:cms_main title:desc
						label for:var:id
							image type:var:icon
							text var:name
							text raw:_

			row
				cell colspan:2			
					image fileext:tree_none_end.gif align:left
					text raw:_
					link url::javascript:mark();
						text key:FOLDER_MARK_ALL
					text raw:_|_
					link url::javascript:unmark();
						text key:FOLDER_UNMARK_ALL
					text raw:_|_
					link url::javascript:flip();
						text key:FOLDER_FLIP_MARK
			row
				cell colspan:2
				
					list list:actionlist extract:true
						radio name:type value:var:type
						label for:type value:var:type
							text raw:_
							text key:var:type prefix:FOLDER_SELECT_
						newline
			row
				cell class:act colspan:2
					button type:ok text:button_next
			if empty:object
			
				row
					cell colspan:2
						text text:GLOBAL_NOT_FOUND
	insert script:mark inline:true
			