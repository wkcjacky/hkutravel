<?php

class Application_Form_Member extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'memberLogin', array(
            'label'      => 'Login ID (*):',
            'required'   => true,
            'filters'    => array('StringTrim'),
			'validators' => array(
				array('validator' => 'Alnum'),
                array('validator' => 'StringLength', 'options' => array(5, 20))
            )
        ));

        $this->addElement('password', 'memberPassword', array(
            'label'      => 'Password (*):',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(5, 20))
            )
        ));

        $this->addElement('password', 'confirm_password', array(
            'label'      => 'Confirm Password (*):',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
            	array('Identical', false, 'memberPassword'),
                array('validator' => 'StringLength', 'options' => array(5, 20)),
            )
        ));

        $this->addElement('text', 'firstName', array(
            'label'      => 'First name (*):',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(3, 50))
            )
        ));

        $this->addElement('text', 'lastName', array(
            'label'      => 'Last name:',
            'required'   => false,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(3, 50))
            )
        ));

        $this->addElement('text', 'email', array(
            'label'      => 'Email (*):',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array('EmailAddress',)
        ));

//        $this->addElement('text', 'birthday', array(
//            'label'      => 'Birthday:',
//            'required'   => false,
//            'filters'    => array('StringTrim'),
//            'validators' => array(
//                array('validator' => 'Date',)
//            )
//        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Submit',
        ));
    }
}
