<?php

namespace template_engine\components;

class UserComponent extends Component
{
	public $user;
	public $id;
	
	protected function begin()
	{
		parent::includeResource('user/component-user.php');
		
		echo '<?php component_user('.$this->value($this->user).') ?>';
	}
}


?>