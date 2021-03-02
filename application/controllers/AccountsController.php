<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountsController extends CI_Controller {

    public function index()
	{
		$this->load->helper('url');
		//$this->load->view('welcome_message');
	}

    public function get_infoZoho_Crm()
    {
        $this->load->helper('url');

        $test = $this->input->post("Currency");
        //$test2 ="JOSE L";
        

        //echo $test2;


        echo $test;

        return $test;

    }
}

