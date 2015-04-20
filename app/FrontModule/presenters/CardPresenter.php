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
	
	$form->onSuccess[] = $this->cardFormSucceeded;
	return $form;
    }   
    
    public function cardFormSucceeded($form)
    {
	$values = $form->getValues();
	$cardId = $this->getParameter('id');
	
	/** pokud uz vizitka existuje - pouze se upravi zaznamy */
	if($cardId){	    
	    $card = $this->database->table('card')->get($cardId);
	    /*
	    //pokud nahravam fotku
	    if ( $values[ 'path' ]->isOk() ) {
		//funkce pro zmenseni a ulozeni fotky, vrati nazev fotky
		$aValues['path'] = $this->createNewsPhoto( $aValues["picture"] );
	    }
	    else
	    {
		//nenahravam fotku
		unset( $aValues[ "picture" ] );
	    }*/
	    if(!$values->img){
		unset( $values->img );
	    }	    
	    $card->update($values);
	    $this->flashMessage('vizitka byla úspěšně upravena','alert alert-success');
	
	/** pokud vizitka neni v systemu pak se vytvori novy zaznam */    
	}else{
	    
	    $card = $this->Card->insert($values);    
	    $this->flashMessage('vizitka osoby '.$card->surname.' '.$card->name.' byla úspěšně přidána','alert alert-success');	    
	    $this->redirect('Card:view',$card->id);
	}
	
	/** @TODO vyresit codelat kdyz se zmeni obrazek s vizitkou */
	
	
	
    }
    
    public function actionEdit($id){
	
	$data = $this->Card->getId($id);
	
	if(!$data){
	    $this->error('neexistujici vizitka');
	}
	$this['cardForm']->setDefaults($data->toArray());
	
	/** backlink = id vizitky , pro presmerovani na stejnou vizitku pri editaci */
	$this->template->card = $data;
    }
    
    public function actionDelete($id){
	
	/** @TODO vyskakovaci okno "opravdu si prejete smazat vizitku s .... */
	
	$delete = $this->Card->delete($id);
	
	$this->flashMessage('Vizitka byla úspěšně smazána!', 'alert alert-success');
        $this->redirect('Homepage:');
	
    }
}
