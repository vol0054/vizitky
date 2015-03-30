<?php

namespace App\AdminModule\Presenters;

use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use Nette\Security\IIdentity;
use App\components\forms\SignInFormFactory;

class AuthPresenter extends BasePresenter{
    
    /** 
     * @inject 
     * @var \App\Model\userManager
    */
    public $userManager;
    
    
    /** @persistent */
    public $backlink = '';
  
    protected function createComponentLoginForm() {
	$form = (new SignInFormFactory)->create();
	
	$form->onSuccess[] = array($this, 'loginFormSubmitted');
	return $form;
    }

    public function loginFormSubmitted($form, $values)
	{
		if ($values->remember) {
			$this->getUser()->setExpiration('14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->username, $values->password);
			$this->redirect('Homepage:');
			
			
		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

    public function actionLogout() {
        $this->user->logout(TRUE);
        $this->flashMessage('Byl jsi odhlášen.');
        if($this->isAjax()) {
            $this->invalidateControl('logform');
            $this->invalidateControl('page');
        }else {
            $this->redirect('Auth:'); 
        }
    }
}

