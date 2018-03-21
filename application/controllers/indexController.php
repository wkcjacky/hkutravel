<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		//$this->_redirect('/books/view');
    }

    public function landingAction()
    {
      $request	= $this->getRequest();
      if ($this->getRequest()->isPost()) {
          if ($form->isValid($request->getPost())) {
      $email	= $form->getValue('email');
      $memberPassword	= $form->getValue('memberPassword');
        }
      }
    }

}
