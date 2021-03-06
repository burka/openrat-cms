<?php

namespace template_engine\components;

class PartComponent extends Component
{
	public $class = '';
	public $id;
	
	public function begin()
	{
		echo '<div';

		$this->class = strtr($this->class,[','=>' ']);
		
		if	( !empty($this->class))
			echo ' class="'.$this->htmlvalue($this->class).'"';
			
		if	( !empty($this->id))
			echo ' id="'.$this->htmlvalue($this->id).'"';
			
		echo '>';
	}
	
	public function end()
	{
		echo '</div>';
	}
}
