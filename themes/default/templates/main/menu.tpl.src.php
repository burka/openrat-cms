page
	table padding:5 space:0 width:100%
	
		row
			cell class:menu
				image type:type

				list list:path extract:true value:xy
					#image type:icon
					link url:url title:title class:path target:cms_main
						text var:name maxlength:20
					char type:filesep

				text var:text title:text class:title
		row
			cell class:subaction
				list list:windowMenu extract:true
					link url:url target:cms_main_main
						text var:text
					text raw:__
