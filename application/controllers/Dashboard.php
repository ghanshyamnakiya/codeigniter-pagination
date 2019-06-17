<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function index(){
    if($this->session->userdata('is_logged_in')){
      $this->load->view('includes/header');
      $this->load->view('dashboard');
      $this->load->view('includes/footer');

    }else{
      $this->load->view('login');
    }
  }


}
