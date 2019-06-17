<?php

class User extends CI_Controller {

  /**
  * Check if the user is logged in, if he's not,
  * send him to the login page
  * @return void
  */
    function index()
    {
      if($this->session->userdata('is_logged_in')){
          $msg=$this->input->get('msg');
          $action=$this->input->get('action');
          $resultArr='';
          if(empty($action)){   //Action
            $config = array();
            $config['base_url'] = base_url('index.php/user/index');
            $config['total_rows'] = $this->Db_model->get_count('users');
            $config["per_page"] = 2;
            $config['full_tag_open'] = "<ul class='pagination pull-right'>";
             $config['full_tag_close'] = '</ul>';
             $config['num_tag_open'] = '<li>';
             $config['num_tag_close'] = '</li>';
             $config['cur_tag_open'] = '<li class="active"><a href="#">';
             $config['cur_tag_close'] = '</a></li>';
             $config['prev_tag_open'] = '<li>';
             $config['prev_tag_close'] = '</li>';
             $config['first_tag_open'] = '<li>';
             $config['first_tag_close'] = '</li>';
             $config['last_tag_open'] = '<li>';
             $config['last_tag_close'] = '</li>';
             $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
             $config['prev_tag_open'] = '<li>';
             $config['prev_tag_close'] = '</li>';
             $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
             $config['next_tag_open'] = '<li>';
             $config['next_tag_close'] = '</li>';

            $config["uri_segment"] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["links"] = $this->pagination->create_links();
            if (!empty($_POST['nameFilter'])) {
              $data['resultArr']=$this->Db_model->GetAllData('users',$config["per_page"], $page);
            }else{
              $data['resultArr']=$this->Db_model->GetAllData('users',$config["per_page"], $page);
            }
          }
          if($msg == 'success'){
            $msg ="Record inserted Successfully!";
          }

          $data['msg']=$msg;
          $data['action']=$action;
          $this->load->view('includes/header');
          $this->load->view('user',$data);
          $this->load->view('includes/footer');

        }else{
          $this->load->view('login');
        }

    }

    function Insertdata(){ //Store Data

          $name = $this->input->post('name');
          $user_name = $this->input->post('user_name');
          $pass_word = $this->input->post('pass_word');
          $u_type = $this->input->post('u_type');
          $status = $this->input->post('status');

           $insert['name']=$name;
           $insert['user_name']=$user_name;
           $insert['pass_word']=base64_encode($pass_word);
           $insert['u_type']=$u_type;
           $insert['status']=$status;
           $insert['created_at']=date('Y-m-d');
           $RecId = $this->Db_model->InsertDB('users',$insert);
           If($RecId>0){
             redirect('user?msg=success');
           }
    }


}
