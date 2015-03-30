<?php
namespace App\components\forms;
use Nette\Application\UI\Form;

class SearchFormFactory {

    /** @return Form */
    public function create(){
	
	$f = new Form();
	$f->getElementPrototype()->class('ajax');
	$f->addText('keywords')
		->setRequired()
		->setAttribute('placeholder', 'Jmeno');
	$f->addSubmit('submit','Vyhledat')
		->setAttribute('class', 'btn btn-primary');
	
	return $f;
    }
    
}
