<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    	$this->load->helper("URL",'text');
    	$this->load->model('P_model');
	    $this->load->library('form_validation');
	    $this->load->library('session');
    }
	public function index()
	{
		$data = [
			'action' => site_url('Contact/register')
		];
		$this->load->view('dashboard/home', $data);
	}

public function register()
    {   
        $this->form_validation->set_rules('username', 'name', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'location', 'required');
        $this->form_validation->set_rules('tel', 'Contact No', 'callback_contact_check');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        if($this->form_validation->run())
        {
           // $name = $this->post('username');
           // $email = $this->post('email');
           // $address = $this->post('address');
           // $tel = $this->post('tel');
           // $gender = $this->post('gender');
           $store = [
               'name' => $this->post('username'),
	           'email' => $this->post('email'),
	           'address' => $this->post('address'),
	           'phone' => $this->post('tel'),
	           'gender' => $this->post('gender'),
	           'created_date' => $this->post('y-m-d')
           ];
	           if($this->P_model->create($store)){
	           	     $data = array(
	                      'msg' => '<div class="alert alert-success">
		                                <p>Personal Info created succesfully</p>
		                            </div>'
	                );
	                $this->session->set_userdata($data);
	                // redirect(site_url('Login_controller/login'));
	                $this->load->view('dashboard/home');
	           }
	           else
	           {
	           	$data = array(
	                      'msg' => '<div class="alert alert-danger">
		                                <p>Error, Personal Info not created!</p>
		                            </div>'
	                );
                 $this->session->set_userdata($data);
	             $this->load->view('dashboard/home');
	           }
        }
        else
        {
           $this->index();
        }
    }
    public function contact_check($num)
    {
       return ( ! preg_match("/^([0-9-\s])+$/D", $num)) ? FALSE : TRUE;
    }
}
