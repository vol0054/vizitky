<?php

namespace App\FrontModule\Presenters;
use App\components\forms\NewCardFormFactory;
use Tracy\Debugger;
class CardPresenter extends BasePresenter{
    
    /** @persistent */
    public $backlink = '';
    
    public function renderView($id)
    {
	
	$card= $this->Card->getId($id);
	$this->template->card = $card;
    }
    
    public function renderNew()
    {
	
    }    
    
    public function createComponentCardForm()
    {
	$form = (new NewCardFormFactory())->create();
	
	$form->onSuccess[] = $this->cardFormSucceeded;
	return $form;
    }   
    
    public function cardFormSucceeded($form)
    {
	$values = $form->getValues();
	$cardId = $this->getParameter('id');
	
	if($cardId){
	    
	    $card = $this->database->table('card')->get($cardId);
	    
	    $card->update($values);
	    $this->flashMessage('vizitka byla úspěšně upravena','alert alert-success');
	    
	}else{
	    
	    $card = $this->Card->insert($values);
	    
	    $this->flashMessage('vizitka osoby '.$card->surname.' '.$card->name.' byla úspěšně přidána','alert alert-success');
	    
	    $this->redirect('Card:view',$card->id);
	}
	
	
	
    }
    
    public function actionEdit($id){
	
	$data = $this->Card->getId($id);
	
	if(!$data){
	    $this->error('neexistujici vizitka');
	}
	$this['cardForm']->setDefaults($data->toArray());	
	
    }
    
    public function actionDelete($id){
	
	/** @TODO vyskakovaci okno "opravdu si prejete smazat vizitku s .... */
	
	$delete = $this->Card->delete($id);
	
	$this->flashMessage('Vizitka byla úspěšně smazána!', 'alert alert-success');
        $this->redirect('Homepage:');
	
    }
}
