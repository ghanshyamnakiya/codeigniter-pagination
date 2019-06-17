<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

  function validate($user_name, $password)
  {

   $this->db->select("*");
   $this->db->from("users");
   $query = $this->db->get();
  $result = $query->result_array();
   foreach ($result as $value) {
     if($user_name == $value['user_name']){
           if($password == $value['pass_word']){
              $success=TRUE;
              break;
          }
     }
   }
   return $success;

  }

}
