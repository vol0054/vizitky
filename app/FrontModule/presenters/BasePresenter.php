<?php

namespace App\FrontModule\Presenters;

use Nette,
	App\Model;
use Nette\Application\UI\Form;
use App\components;
use NasExt;

class BasePresenter extends \App\Presenters\BasePresenter{
   
    /** @inject @var \App\Model\CardModel */
    public $Card;
   
    /** @var \Nette\Database */
    protected $database;
    
    public function __construct(Nette\Database\Context $database) {
	parent::__construct();
	$this->database = $database;
    }
   
    public function createComponentNavigation(){
	return new components\navigation\NavigationControl;
    } 
   
    public function createComponentFooter(){
	return new components\footer\FooterControl;
    }
    
    

    
}
