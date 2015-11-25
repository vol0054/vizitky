<?php

namespace App\FrontModule\Presenters;
use NasExt;
use Nette\Utils\Paginator;
use App\components\forms\SearchFormFactory;
use Tracy\Debugger;

class HomepagePresenter extends BasePresenter{   
    
    public $cards;
    
    public function renderDefault()
	{
		$list = $this->Card->getAll();
		$listCount = $list->count();
		/** @var NasExt\Controls\VisualPaginator $vp */
		$vp = $this['vp'];
		$paginator = $vp->getPaginator();
		$paginator->itemsPerPage = 9;
		$paginator->itemCount = $listCount;
		$cards = $list->limit($paginator->itemsPerPage, $paginator->offset);
		$this->template->cards = $cards;
	
    }
    
    public function createComponentVp()
    {
	return new \NasExt\Controls\VisualPaginator();
    }
   
    public function createComponentSearchForm()
    {
	$form = (new SearchFormFactory())->create();
	$form->onSuccess[] = $this->SearchFormOk;	
	return $form;
    }
    
    public function SearchFormOk($form){
	
	$values = $form->getValues();
	$this->redirect('Homepage:search', array('keywords' => $values->text));	
    }
    
    public function renderSearch($keywords){	
	
	$results = $this->Card->search($keywords);
	$this->template->cards = $results;
    }
    
    public function handleSearch($keywords){
	
	$results = $this->Card->search($keywords);
	$this->cards = $results;
	$this->redirect('Homepage:default', array('keywords' => $keywords));
    }
}
