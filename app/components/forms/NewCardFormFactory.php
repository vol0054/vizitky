<?php

namespace App\components\forms;
use Nette\Application\UI\Form;

class NewCardFormFactory {
    
    /** @return Form */
    
    public function create()
    {
	$f = new Form;
	$f->addText('name','Jmeno:');//->setRequired('Osoba se přece musí nějak jmenovat!');
	//$f->addText('midlename','Prostredni jmeno:');
	$f->addText('surname','Prijmeni:')->setRequired('Osoba musí mít nějaké příjmení');
	$f->addText('workplace','Pracoviste:');
	$f->addText('project','Projekt:');	
	$f->AddText('www','web:');
	$f->addUpload('photo','Foto:');
	$f->addText('date','Datum setkani:');
	$f->addTextArea('note','Poznamka');
	$f->addMultiUpload('path','Obrazek');//->setRequired();
	$f->addSubmit('submit','Nahrat')->setAttribute('class','btn btn-success');
	
	
	return $f;
    }
}
