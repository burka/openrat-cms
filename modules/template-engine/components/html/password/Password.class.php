<?php

namespace template_engine\components;

class PasswordComponent extends Component
{

	public $name;

	public $default;

	public $class;

	public $size = 40;

	public $maxlength = 256;

	public function begin()
	{
		echo '<div class="inputholder">';
		
		echo '<input type="password"';
		echo ' name="' . $this->htmlvalue($this->name) . '"';
		echo ' id="<?php echo REQUEST_ID ?>_' . $this->htmlvalue($this->name) . '"';
		
		echo ' size="' . $this->htmlvalue($this->size) . '"';
		echo ' maxlength="' . $this->htmlvalue($this->maxlength) . '"';
		echo ' class="' . $this->htmlvalue($this->class) . '"';
		
		echo ' value="';
		if (isset($this->default))
			echo $this->htmlvalue($this->default);
		else
			echo '<?php echo @$' . $this->varname($this->name) . '?>';
		
		echo '" />';
		
		echo '</div>';
	}
}

?>