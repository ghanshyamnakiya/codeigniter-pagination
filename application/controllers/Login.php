<?php

class Login extends CI_Controller {

		    /**
		    * Check if the user is logged in, if he's not,
		    * send him to the login page
		    * @return void
		    */
			function index(){
				if($this->session->userdata('is_logged_in')){
						redirect('dashboard');
		        }else{
		        	$this->load->view('login');
		        }
			}
		  /**
		  * check the username and the password with the database
		  * @return void
		  */
		function validate_credentials()
		{
		  $this->load->model('Users_model');
	  	$user_name = $this->input->post('user_name');
		  $password = MD5($this->input->post('password'));


	  	$is_valid = $this->Users_model->validate($user_name, $password);
		  if($is_valid)
		  {
		    $data = array(
		      'user_name' => $user_name,
		      'is_logged_in' => true
		    );
		    $this->session->set_userdata($data);
		    redirect('dashboard');
		  }
		  else // incorrect username or password
		  {

		    $data['message_error'] = TRUE;
		    $this->load->view('login', $data);
		  }
		}
		/**
		  * Destroy the session, and logout the user.
		  * @return void
		  */
		function logout()
		{
		  $this->session->sess_destroy();
		  redirect('login');
		}
}
