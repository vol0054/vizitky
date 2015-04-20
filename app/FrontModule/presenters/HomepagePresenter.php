<?php

namespace App\FrontModule\Presenters;
use NasExt;
use Nette\Utils\Paginator;
use App\components\forms\SearchFormFactory;
use Tracy\Debugger;

class HomepagePresenter extends BasePresenter{   
    
    
    public function renderDefault($cards){
	
	$list = $this->Card->getAll();
	$listCount = $list->count();
	/** @var NasExt\Controls\VisualPaginator $vp */
	$vp = $this['vp'];
	$paginator = $vp->getPaginator();
	$paginator->itemsPerPage = 10;
	$paginator->itemCount = $listCount;
	$cards = $list->limit($paginator->itemsPerPage, $paginator->offset);
	$this->template->cards = $cards;
	
    }    
        
    public function createComponentVp()
    {
	return new \NasExt\Controls\VisualPaginator();
    }
   
    public function handleSearch()
    {
	$this->template->results = $this->Card->getAll();
	$this->redrawControl('results');
    }
   
    public function createComponentSearchForm()
    {
	$form = (new SearchFormFactory())->create();
	$form->onSuccess[] = $this->SearchFormOk;
	return $form;
    }
    
    public function SearchFormOk($form){
	
	$values = $form->getValues();	
	$results = $this->Card->search($values->search);
	$this->template->cards = $results;	
	
	/*$values = $form->values;
	$this->template->cards = $this->Card->search($values->keywords);
	
	// !!! funguje $this->redirect('Homepage:default',array('cards'=> $values->keywords));
	
	if($this->isAjax()){
	    $this->redrawControl('cards');
	}else{
	    $this->flashMessage('vizitka s jmenem '.$values->keywords.' nebyla nalezena','alert alert-danger');
	    $this->redrawControl('vyhledavani');
	 }*/
    }
    
    public function renderSearch(){
	
    }

}
