<?php

namespace App\components\navigation;
use App\components;

class NavigationControl extends components\BaseControl{
     
    public function render(){
	
	$this->template->menuItems = [
	    'Vizitky' => 'Homepage:default',	    
	];
	$this->template->setFile(__DIR__.'/navigation.latte');
	$this->template->render();
	
    }
}
