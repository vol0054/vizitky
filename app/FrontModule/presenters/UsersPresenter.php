<?php

namespace App\FrontModule\presenters;

class UsersPresenter extends BasePresenter{
    
    public function renderDefault(){
	$this->template->cards = $this->Card->getAll();
    }
    
    
}
