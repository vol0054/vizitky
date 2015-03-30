<?php

namespace App\AdminModule\presenters;

use Nette\Security\User;
use Nette\Application\ForbiddenRequestException;

class SecuredPresenter extends BasePresenter{

	/**
	 * (non-phpDoc)
	 *
	 * @see Nette\Application\Presenter#startup()
	 */
	public function startup() {
		parent::startup();
		if(!$this->user->isLoggedIn()) {
		    if($this->user->getLogoutReason() === User::INACTIVITY) {
			$this->flashMessage('Byl jsi odhlášen, protože jsi nebyl dlouho aktivní.', 'warning');
		    }
		    $this->flashMessage('Pro vstup do této části webu se musíš přihlásit.', 'warning');
		    $backlink = $this->storeRequest();
                    
		    $this->redirect('Auth:default', array('backlink' => $backlink));
		} else {
		    if(!$this->user->isLoggedIn()) {
			//throw new ForbiddenRequestException('Pro vstup do této sekce nemáte dostatečné oprávnění.');
			//$this->flashMessage('Pro vstup do této sekce nemáte dostatečné oprávnění.', 'warning');
			//$backlink = $this->storeRequest();
			//$this->redirect(array('backlink'=> $backlink));
		    }
		}
	}
}