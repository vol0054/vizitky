<?php

namespace App\FrontModule\Presenters;
use App\components\forms\NewCardFormFactory;
class CardPresenter extends BasePresenter{
    
    public function renderView($surname){
	
	$card= $this->Card->getSurname($surname);
	$this->template->card = $card;
	
    }
    
    public function renderNew()
    {
	
    }    
    
    public function createComponentNewCard()
    {
	$form = (new NewCardFormFactory())->create();
	
	$form->onSuccess[] = $this->NewCardSuccess;
	return $form;
    }   
    
    public function NewCardSuccess($form)
    {
	$values = $form->values;
	
	$this->Card->insert($values);
	
	$this->flashMessage('Aktualita byla úspěšně publikována.', 'alert alert-success');
        $this->redirect('this');
	
    }
    
    public function actionEdit($surname){
	$card = $this->Card->getSurname($surname);
	if(!$card){
	    $this->error('neexistujici vizitka');
	}
	$this['newCard']->setDefaults($card->toArray());
	
    }
}
