<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {

    }

    public function indexAction()
    {

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
