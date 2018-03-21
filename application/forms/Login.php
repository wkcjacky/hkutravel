<?php

class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

//        $this->addElement('text', 'memberLogin', array(
//            'label'      => 'Login ID:',
//            'required'   => true,
//            'filters'    => array('StringTrim'),
//			'validators' => array(
//                array('validator' => 'StringLength', 'options' => array(5, 20))
//            )
//        ));

        $this->addElement('text', 'email', array(
            'label'      => 'Email:',
            'required'   => true,
//        'validators' => array(
//        array('validaror' => 'EmailAddress'))
        ));


        $this->addElement('password', 'memberPassword', array(
            'label'      => 'Password:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(5, 20))
            )
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
        ));
    }
}
