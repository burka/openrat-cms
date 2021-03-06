<?php

namespace template_engine\components;

class DateComponent extends Component
{
	public $date;
	
	protected function begin()
	{
		$date = $this->date;
		
		$this->includeResource( 'date/component-date.php');
		echo '<?php component_date('.$this->value($this->date).') ?>';
	}
}


?>