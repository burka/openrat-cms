frameset-page

	frameset rows:23,3,*,3,5
		frame file:frame_src_title name:cms_title
		frame file:frame_src_border
		#frame file:frame_src_background

		frameset columns:25%,*
			#frame file:frame_src_background
			#frame file:frame_src_border
			frameset rows:54,*
				#frame file:frame_src_border
				frame file:frame_src_tree_title name:cms_treemenu
				frame file:frame_src_tree name:cms_tree scrolling:auto
				//frame file:frame_src_clipboard name:cms_clipboard
				#frame file:frame_src_border
				//frame file:frame_src_tree_menu name:cms_treemenu
				//frame file:frame_src_border
			#frame file:frame_src_border
			#frame file:frame_src_background
			#frame file:frame_src_border
			frame file:frame_src_main name:cms_main
			#frame file:frame_src_border
			#frame file:frame_src_background
		frame file:frame_src_border
		frame file:frame_src_background
				
//	frameset rows:20,5,*,5
//		frame file:frame_src_title name:cms_title
//		frame file:frame_src_background
//
//		frameset columns:5,25%,5,*,5
//			frame file:frame_src_background
//			frameset rows:54,*
//				frame file:frame_src_tree_title name:cms_treemenu
//				frame file:frame_src_tree name:cms_tree scrolling:auto
//			frame file:frame_src_background
//			frame file:frame_src_main name:cms_main
//			frame file:frame_src_background
//		frame file:frame_src_background
				