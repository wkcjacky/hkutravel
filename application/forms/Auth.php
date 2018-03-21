<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<?php
class Application_Form_Auth extends Zend_Form
{
    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add a Login ID element
        $this->addElement('text', 'memberLogin', array(
            'label'      => 'Login ID:',
            'required'   => true,      
			'validators' => array('Alnum',
                array('validator' => 'StringLength', 'options' => array(5, 50))
                )
        ));
		
		// Add a password element
        $this->addElement('password', 'memberPassword', array(
            'label'      => 'Password:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(5,5))
        )));

		// Add a confirm password element
        $this->addElement('password', 'confirm_password', array(
            'label'      => 'Confirm Password:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(5,5)),
				array('Identical', false, array('token' => 'memberPassword'))
        )));
		
		// Add an first name element
        $this->addElement('text', 'firstName', array(
            'label'      => 'First Name:',
            'required'   => true,
			'validators' => array('Alnum',
                array('validator' => 'StringLength', 'options' => array(3, 50))
                )
        ));
		
	
		// Add an last name element
        $this->addElement('text', 'lastName', array(
            'label'      => 'Last name:',
            'required'   => false,
			'validators' => array('Alnum',
                array('validator' => 'StringLength', 'options' => array(3, 50))
                )
        ));
		
			// Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Email:',
            'required'   => true,
			'validators' => array(
			array('validaror' => 'EmailAddress')
        )));

		// Add a birthday element
        $this->addElement('text', 'datepicker', array(
            'label'      => 'Birthday:',
            'required'   => true,
        ));
	
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Sign Up',
        ));
		
		 
    }
}
