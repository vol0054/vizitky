<?php
namespace App\components\forms;
use Nette\Application\UI\Form;

class SearchFormFactory {

    /** @return Form */
    public function create(){
	
	$f = new Form();
	$f->addText('text')
		->setRequired('TRUE')
		->setAttribute('placeholder', 'Vyhledat');
	$f->addSubmit('submit','Vyhledat')
		->setAttribute('class', 'btn btn-primary');
	
	return $f;
    }
    
}
