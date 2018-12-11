<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    	$this->load->helper('URL','text','form');
    	$this->load->model('P_model');
	    $this->load->library('form_validation');
	    $this->load->library('session');
    }
	// public function index()
	// {
	// 	$data = [
	// 		'action' => site_url('contact/register')
	// 	];
	// 	$this->load->view('dashboard/home', $data);
	// }

public function index()
    {  
      
        $this->form_validation->set_rules('username', 'name', 'required|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('email', 'email', 'required|callback_mail_check|valid_email');
        $this->form_validation->set_rules('address', 'location', 'required');
        $this->form_validation->set_rules('tel', 'phone number', 'required|callback_phone_check');
        /*$this->form_validation->set_rules('tel', 'phone number', 'required|callback_phone_check|regex_match[/^[0-9]{10}$/]|numeric|max_length[15]');*/
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        if($this->form_validation->run())
        {
          $now = date('Y-m-d H:i:s');
           $store = [
             'name' => $this->input->post('username'),
	           'email' => $this->input->post('email'),
	           'address' => $this->input->post('address'),
	           'phone' => $this->input->post('tel'),
	           'gender' => $this->input->post('gender'),
	           'created_date' => $now
           ];
	           if($this->P_model->create($store)){
	           	     $data = array(
	                      'msg' => '<div class="alert alert-success alert-dismissible fade show">
		                                <p>Personal Info created succesfully</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
		                            </div>'
	                );
	                $this->session->set_userdata($data);
	                redirect(base_url());
	           }
	           else
	           {
	           	$data = array(
	                      'msg' => '<div class="alert alert-danger alert-dismissible fade show">
                                    <p>Error, Personal Info not created!</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
		                            </div>'
	                );
                 $this->session->set_userdata($data);
                 redirect(base_url());
	           }
        }
        else
        {
          $data = [
                    'action' => site_url()
                  ];
         $this->load->view('dashboard/home', $data);
        }
    }

   function phone_check($tel)
    {
       $num_length = strlen((string)$tel);
       if($num_length >= 7 && $num_length <= 15 && preg_match('/^[0-9]+$/', $tel))
       {
        return TRUE;
       }
       else
       {
        $this->form_validation->set_message('phone_check', 'Please enter a valid phone number');
        return FALSE;
       }
    }

  function mail_check()
    {
       $this->db->where('email', $this->input->post('email'));
       $result = $this->db->get('biodata');
       if($result->num_rows() > 0)
       {
        //mail_check can also be replace with __FUNCTION__
        $this->form_validation->set_message('mail_check', 'Please input another email address');
        return FALSE;
       }
       else
       {
        
        return TRUE;
       }
    }

}