page

	form
		window name:objectName title:global_prop icon:folder widths:50%,50% width:90%
			row
				cell class:fx
					text text:global_name
				cell class:fx
					input name:name size:50
			row
				cell class:fx
					text text:global_filename
				cell class:fx
					input name:filename
			row
				cell class:fx
					text text:global_description
				cell class:fx
					inputarea name:description
			row
				cell colspan:2
					button type:ok
	focus field:name