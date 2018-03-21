<?php
    class AuthController extends Zend_Controller_Action
    {

		    public function init() {
        /* Initialize action controller here */
    }
		public function indexAction()
		{
			$this->view->pageTitle = "Zend_Form Example";
			$this->view->bodyCopy = "";
		}

    //Sign Up Function
		public function authAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Auth();

		if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $member = new Application_Model_Auth($form->getValues());
                $mapper  = new Application_Model_AuthMapper();
                $mapper->save($member);
                return $this->_helper->redirector('');
            }
        }

        $this->view->form = $form;
    }

    //Login In Function
    public function loginAction() {
        $request	= $this->getRequest();
        $form		= new Application_Form_Login();

		if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
				$email	= $form->getValue('email');
				$memberPassword	= $form->getValue('memberPassword');

				// authentication here
				$adapter	= $this->authenticate($email, $memberPassword);
				$auth		= Zend_Auth::getInstance();
				$result		= $auth->authenticate($adapter);

				if($result->isValid()) {
					// allow entering edit view, pass the login and password for verifying again
					return $this->_helper->redirector->gotoSimple(
						'landing', 'index', null,
						array('email' => $email, 'memberPassword' => $memberPassword))
					;
				} else{
					// login fail, redirect to signup view
	                return $this->_helper->redirector('auth');
	            }
            }
        }

        $this->view->form = $form;
    }

	public function editAction() {
    $request = $this->getRequest();
		$form    = new Application_Form_Member();
		$mapper  = new Application_Model_MemberMapper();

		$email	= $request->getParam("email");
		$memberPassword	= $request->getParam("memberPassword");

		// authentication here
		$adapter	= $this->authenticate($email, $memberPassword);
		$auth		= Zend_Auth::getInstance();
		$result		= $auth->authenticate($adapter);

		if($result->isValid()) {
			// extract the id from the result row
			$id	= $adapter->getResultRowObject()->member_id;

			// populate the form with db value
 			$form->populate($mapper->toArray($id));

			if ($this->getRequest()->isPost()) {
        		if ($form->isValid($request->getPost())) {
        			$member	= new Application_Model_Member($form->getValues());

        			// set id to trigger db update
        			$member->setId($id);
        			$mapper->save($member);
        			return $this->_helper->redirector('login');
        		}
        	}
		} else {
			// login fail, redirect to signup view
        	return $this->_helper->redirector('signup');
	    }

		$this->view->form=$form;
    }

    public function logoutAction() {
    	// redirect logout to index view
        return $this->_helper->redirector('index');
    }

    // return an auth adapter
    public function authenticate($email, $memberPassword) {
    	$dbAdapter	= Zend_Db_Table_Abstract::getDefaultAdapter();
    	$adapter	= new Zend_Auth_Adapter_DbTable(
			$dbAdapter,
			'members',
			'email',
			'member_password'
		);

		$adapter->setIdentity($email);
		$adapter->setCredential($memberPassword);

		return $adapter;
    }
    }
