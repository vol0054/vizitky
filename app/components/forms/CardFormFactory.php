<?php

namespace App\components\forms;
use Nette\Application\UI\Form;
use Nette\Forms\Controls;

class CardFormFactory {
    
    /** @return Form */
    
    public function create()
    {
	$f = new Form;
	
	$f->addText('name','Jméno:');//->setRequired();
	$f->addText('surname','Příjmení:');//->setRequired();
	$f->addText('institution','Pracoviště:');
	$f->addText('project','Projekt:');	
	$f->AddText('www','web:');
	$f->addText('date','Datum setkání:')
		->setAttribute('type','date');
	$f->addTextArea('note','Poznámka')
		->setAttribute('rows','10');
	$f->addMultiUpload('img','Vizitka');
	$f->addUpload('foto','Foto:');
	$f->addSubmit('submit','Uložit');
	
	// setup form rendering
	$renderer = $f->getRenderer();
	$renderer->wrappers['controls']['container'] = NULL;
	$renderer->wrappers['pair']['container'] = 'div class=form-group';
	$renderer->wrappers['pair']['.error'] = 'has-error';
	$renderer->wrappers['control']['container'] = 'div class=col-sm-8';
	$renderer->wrappers['label']['container'] = 'div class="col-sm-2 control-label"';
	$renderer->wrappers['control']['description'] = 'span class=help-block';
	$renderer->wrappers['control']['errorcontainer'] = 'span class=help-block';

	$f->getElementPrototype()->class('form-horizontal');
	
	foreach ($f->getControls() as $control) {
	    if ($control instanceof Controls\Button) {
		    $control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-success' : 'btn btn-default');
		    $usedPrimary = TRUE;
	    } elseif ($control instanceof Controls\TextBase || $control instanceof Controls\SelectBox || $control instanceof Controls\MultiSelectBox) {
		    $control->getControlPrototype()->addClass('form-control');
	    } elseif ($control instanceof Controls\Checkbox || $control instanceof Controls\CheckboxList || $control instanceof Controls\RadioList) {
		    $control->getSeparatorPrototype()->setName('div')->addClass($control->getControlPrototype()->type);
	    }
	}	
	return $f;
    }
}
