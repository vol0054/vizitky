<?php

namespace App\components\sidebar;
use App\components\BaseControl;
class SidebarControl extends BaseControl{
    
    public function render(){
	$this->template->setFile(__DIR__.'/Sidebar.latte');
	$this->template->render();	
    }
}
