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
	$json2 = json_encode($abacusXmls);	
	echo $json2;
	// strval($json2);

	// $json= json_decode($json2, true);
	// 	function array2xml($json, $xml = false){
	// 		if($xml === false){
	// 			$xml = new SimpleXMLElement('<AbaConnectContainer/>');
	// 		}
	// 		foreach($json as $key => $value){
	// 			if(is_array($value)){
	// 				array2xml($value, $xml->addChild($key));
	// 			}else{
	// 				$xml->addChild($key, $value);
	// 			}
	// 		}
	// 		return $xml->asXML();
	// 	}
		
		
	// 	header('Content-type: text/xml');
	// 	print array2xml($json);
	return $json2;
       
        
	}
	public function TEST2() {
        $jsonString='{
			"AddressLine1":"123 Fakest St",
			"Age":"56",
			"AlertShowWhenDisplayingPatientDetails":"False",
			"AlertShowWhenEnteringEncounters":"False",
			"AlertShowWhenPostingPayments":"False",
			"AlertShowWhenPreparingPatientStatements":"False",
			"AlertShowWhenSchedulingAppointments":"False",
			"AlertShowWhenViewingClaimDetails":"False",
			"City":"Cherry Hill",
			"CollectionCategoryName":"Current ",
			"CreatedDate":"2/5/2021 6:48:10 AM",
			"DOB":"01/01/1965",
			"EmailAddress":"testing@gmail.com",
			"FirstName":"OMAR TEST",
			"Gender":"M",
			"GuarantorDifferentThanPatient":"False",
			"ID":"01",
			"LastAppointmentDate":"2/9/2021 7:00:00 AM",
			"LastModifiedDate":"2/5/2021 6:48:10 AM",
			"LastName":"TESTER",
			"MobilePhone":{"Parameter":{
				"Application":"DEBI",
				"Id":"Zahlungen",
				"MapId":"fidevision",
				"Version":"2020.00"
			 }
			},
			"PatientFullName":"OMAR TEST TESTER",
			"PracticeId":"3",
			"PracticeName":"Sandbox",
			"State":"NJ",
			"StatementNote":"",
			"Suffix":"",
			"TotalBalance":"",
			"WorkPhone":"",
			"WorkPhoneExt":"",
			"ZipCode":"08002"
		 }';
		//  echo $jsonString;
		$json= json_decode($jsonString, true);
		function array2xml($json, $xml = false){
			if($xml === false){
				$xml = new SimpleXMLElement('<AbaConnectContainer/>');
			}
			foreach($json as $key => $value){
				if(is_array($value)){
					array2xml($value, $xml->addChild($key));
				}else{
					$xml->addChild($key, $value);
				}
			}
			return $xml->asXML();
		}
		
		
		header('Content-type: text/xml');
		print array2xml($json);
        return $json;
        
	

    }
	public function TEST3() {
        $jsonString='{
			"AddressLine1":"123 Fakest St",
			"Age":"56",
			"AlertShowWhenDisplayingPatientDetails":"False",
			"AlertShowWhenEnteringEncounters":"False",
			"AlertShowWhenPostingPayments":"False",
			"AlertShowWhenPreparingPatientStatements":"False",
			"AlertShowWhenSchedulingAppointments":"False",
			"AlertShowWhenViewingClaimDetails":"False",
			"City":"Cherry Hill",
			"CollectionCategoryName":"Current ",
			"CreatedDate":"2/5/2021 6:48:10 AM",
			"DOB":"01/01/1965",
			"EmailAddress":"testing@gmail.com",
			"FirstName":"OMAR TEST",
			"Gender":"M",
			"GuarantorDifferentThanPatient":"False",
			"ID":"01",
			"LastAppointmentDate":"2/9/2021 7:00:00 AM",
			"LastModifiedDate":"2/5/2021 6:48:10 AM",
			"LastName":"TESTER",
			"MobilePhone":{"Parameter":{
				"Application":"DEBI",
				"Id":"Zahlungen",
				"MapId":"fidevision",
				"Version":"2020.00"
			 }
			},
			"PatientFullName":"OMAR TEST TESTER",
			"PracticeId":"3",
			"PracticeName":"Sandbox",
			"State":"NJ",
			"StatementNote":"",
			"Suffix":"",
			"TotalBalance":"",
			"WorkPhone":"",
			"WorkPhoneExt":"",
			"ZipCode":"08002"
		 }';
		//  echo $jsonString;
		$json= json_decode($jsonString, true);
		function array2xml($json, $xml = false){
			if($xml === false){
				$xml = new SimpleXMLElement('<AbaConnectContainer/>');
			}
			foreach($json as $key => $value){
				if(is_array($value)){
					array2xml($value, $xml->addChild($key));
				}else{
					$xml->addChild($key, $value);
				}
			}
			return $xml->asXML();
		}
		
		
		header('Content-type: text/xml');
		print array2xml($json);
        return $json;
        
	

    }
}