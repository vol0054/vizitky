<?php

namespace App\components\footer;
use Nette\Application\UI\Control;

class FooterControl extends Control{
    
    public function render(){
	$this->template->setFile(__DIR__.'/footer.latte');
	$this->template->render();
    }
}
