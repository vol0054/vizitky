<?php

namespace App\components\forms;
use Nette\Application\UI\Form;

class SignInFormFactory {
    /**
     * @return Form
     */
    
    public function create(){
	
	$f = new Form;
	
	$f->addText('username','jmeno:')->setRequired('vypln prosim sve prihlasovaci jmeno');
	$f->addPassword('password','heslo:')->setRequired('zadej heslo');
	$f->addCheckbox('remember', 'zustat prihlaseny');
	$f->addSubmit('Submit','prihlasit');
	
	return $f;
	
    }
}
