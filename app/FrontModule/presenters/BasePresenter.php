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
   
   public function createComponentNavigation(){
       return new components\navigation\NavigationControl;
   } 
   
   public function createComponentSidebar(){
       return new components\sidebar\SidebarControl();
   }
   
    
}
