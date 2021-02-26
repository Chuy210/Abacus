<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbacusController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('welcome_message');
	}
    public function TEST() {
		$this->load->helper('xml');
		$this->load->library('xmlrpc');
	$this->load->library('xmlrpcs');
        
	// $abacusXml='<Application>DEBI</Application>';
$abacusXml='<?xml version="1.0" encoding="utf-8"?>
		<AbaConnectContainer>
		  <TaskCount>1</TaskCount>
		  <Task>
			<Parameter>
			  <Application>DEBI</Application>
			  <Id>Zahlungen</Id>
			  <MapId>fidevision</MapId>
			  <Version>2020.00</Version>
			</Parameter>
			<Transaction>
			  <Payment mode="Save">
				<PaymentFields mode="Save">
				  <DocumentNumber>8014</DocumentNumber>
				  <PaymentCode>Z</PaymentCode>
				  <Currency>CHF</Currency>
				  <PaymentAmount>114404.35</PaymentAmount>
				  <DocumentAmount>114404.35</DocumentAmount>
				  <DocumentOI>0.00</DocumentOI>
				</PaymentFields>
			  </Payment>
			</Transaction>
			<Transaction>
			  <Payment mode="Save">
				<PaymentFields mode="Save">
				  <DocumentNumber>8015</DocumentNumber>
				  <PaymentCode>Z</PaymentCode>
				  <Currency>CHF</Currency>
				  <PaymentAmount>730.20</PaymentAmount>
				  <DocumentAmount>730.20</DocumentAmount>
				  <DocumentOI>0.00</DocumentOI>
				</PaymentFields>
			  </Payment>
			</Transaction>
			<Transaction>
			  <Payment mode="Save">
				<PaymentFields mode="Save">
				  <DocumentNumber>8016</DocumentNumber>
				  <PaymentCode>Z</PaymentCode>
				  <Currency>CHF</Currency>
				  <PaymentAmount>1387.80</PaymentAmount>
				  <DocumentAmount>1387.80</DocumentAmount>
				  <DocumentOI>0.00</DocumentOI>
				</PaymentFields>
			  </Payment>
			</Transaction>
		  </Task>
		</AbaConnectContainer>';

	$abacusXmls = simplexml_load_string($abacusXml);
	$json = json_encode($abacusXmls);
	// $arrays = json_decode($json,TRUE);
	echo $json;
	return $json;

        
	
       
        
	}

}
