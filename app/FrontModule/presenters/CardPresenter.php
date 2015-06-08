<?php

namespace App\FrontModule\Presenters;
use App\components\forms\CardFormFactory;
use Tracy\Debugger;
class CardPresenter extends BasePresenter{   
    
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
	$form = (new CardFormFactory())->create();
	//$form->onValidate[] = $this->validateForm;
	$form->onSuccess[] = $this->cardFormSucceeded;
	return $form;
    }  
    
    public function validateForm($form){
	/** overeni datumu */
	$values = $form->values;	
	if($values->date > date("RRR-mm-dd")){
	    $form->addError('zadané datum nesmí být pozdější než dnešní!');
	}
    }
    
    public function cardFormSucceeded($form)
    {
	$values = $form->getValues();
	$cardId = $this->getParameter('id');
	
	/** pokud uz vizitka existuje - pouze se upravi zaznamy */
	if($cardId){
	    $card = $this->database->table('card')->get($cardId);
	    if(!$values->img){
		unset( $values->img);
	    }
	    if(!$values->foto){
		unset($values->foto);
	    }
	    $card->update($values);
	    
	    //$this->Card->insert($values);
	    $this->flashMessage('vizitka byla úspěšně upravena','alert alert-success');
	    $this->redirect('Card:view',$card->id);

	
	/** pokud vizitka neni v systemu pak se vytvori novy zaznam */    
	}else{	    
	    $card = $this->Card->insert($values);    
	    $this->flashMessage('vizitka osoby '.$card->surname.' '.$card->name.' byla úspěšně přidána','alert alert-success');	    
	    $this->redirect('Card:view',$card->id);
	}
    }
    
    public function actionEdit($id){
	
	$data = $this->Card->getId($id);
	
	if(!$data){
	    $this->error('neexistující vizitka');
	}
	$this['cardForm']->setDefaults($data->toArray());
	
	/** backlink = id vizitky , pro presmerovani na stejnou vizitku po editaci */
	$this->template->card = $data;
    }
    
    public function actionDelete($id){	
	$delete = $this->Card->delete($id);
	$this->flashMessage('Vizitka byla úspěšně smazána!', 'alert alert-success');
        $this->redirect('Homepage:');
	
    }
}
