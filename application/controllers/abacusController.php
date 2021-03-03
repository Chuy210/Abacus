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
				"MapId":{"Parameter":{
					"Application":"DEBI",
					"Id":"Zahlungen",
					"MapId":"fidevision",
					"Version":"2020.00"
				 }
				},
				"Version":{"Parameter":{
					"Application":"DEBI",
					"Id":"Zahlungen",
					"MapId":"fidevision",
					"Version":"2020.00"
				 }
				}
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
				$xml = new SimpleXMLElement('<?xml version="1.0"?><AbaConnectContainer></AbaConnectContainer>');
			
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
        $this->load->helper('url');
        $this->load->helper('file');
/*
        $Currency = $this->input->post("currency_symbol");
        $CustomerNumber = $this->input->post("CustomerNumber");
        $PaymentTermNumber = $this->input->post("PaymentTermNumber");
        $Name = $this->input->post("Name");
        $ZIP = $this->input->post("ZIP");
        $City= $this->input->post("City");
        $Phone1 = $this->input->post("Phone1");
        $SalutationNumber = $this->input->post("SalutationNumber");
        $SalutationName = $this->input->post("SalutationName");
        $IndustryCode = $this->input->post("IndustryCode");
        $Website = $this->input->post("Website");
        $Email = $this->input->post("Email");
        $Language = $this->input->post("Language");
        $SubjectType = $this->input->post("SubjectType");
        $HouseNumber = $this->input->post("HouseNumber");
        $Street = $this->input->post("Street");
        $CurrencyRisk= $this->input->post("CurrencyRisk");
        $CurrencyLimitAmount = $this->input->post("CurrencyLimitAmount");
        $PaymentOrderESRProcedure = $this->input->post("PaymentOrderESRProcedure");
        $PaymentOrderIPIProcedure = $this->input->post("PaymentOrderIPIProcedure");
        $StandardProcedure = $this->input->post("StandardProcedure");
        //$test2 ="JOSE L";
	*/

        $invoice_id="107386000024425251";
        $ach_payment_initiated=false;
        $zcrm_potential_id="";
        $zcrm_potential_name="";
        $customer_name="Test lUIS";
        $customer_id="10738600002435391";
        $company_name="";
        $status="draft";
        $color_code="";
        $current_sub_status_id="";
        $current_sub_status="draft";
        $invoice_number="INV-001529";
        $reference_number="";
        $date="2021-03-02";
        $due_date="2021-03-02";
        $due_days="";
        $currency_id="107386000000032071";
        $schedule_time="";
        $email="lgarcia@quickapps.mx";
        $currency_code="CHF";
        $currency_symbol="CHF";
        $template_type="custom";
        $no_of_copies=1;
        $show_no_of_copies=true;
        $is_viewed_by_client=false;
        $has_attachment=false;
        $client_viewed_time="";
        $project_name="";

		// $json= json_decode($jsonString, true);
        $json = array (
            'RequestHeader' => [
                "invoice_id"=>$invoice_id,
                "ach_payment_initiated"=>$ach_payment_initiated,
                "zcrm_potential_id"=>$zcrm_potential_id,
                "zcrm_potential_name"=>$zcrm_potential_name,
                "customer_name"=>$customer_name,
                "customer_id"=>$customer_id,
                "company_name"=>$company_name,
                "status"=>$status,
                "color_code"=>$color_code,
                "current_sub_status_id"=>$current_sub_status_id,
                "current_sub_status"=>$current_sub_status,
                "invoice_number"=>$invoice_number,
                "reference_number"=>$reference_number,
                "date"=>$date,
                "due_date"=>$due_date,
                "due_days"=>$due_days,
                "currency_id"=>$currency_id,
                "schedule_time"=>$schedule_time,
                "email"=>$email,
                "currency_code"=>$currency_code,
                "currency_symbol"=>$currency_symbol,
                "template_type"=>$template_type,
                "no_of_copies"=>$no_of_copies,
                "show_no_of_copies"=>$show_no_of_copies,
                "is_viewed_by_client"=>$is_viewed_by_client,
                "has_attachment"=>$has_attachment,
                "client_viewed_time"=>$client_viewed_time,
                "project_name"=>$project_name
                ]
        );
        // echo json_encode($request) . '<br />';
        // echo '<br />';
    
        $params = array('json' => $json);
        

	    function array2xml($json, $xml = false){
			if($xml === false){
				$xml = new SimpleXMLElement('<?xml version="1.0"?><AbaConnectContainer></AbaConnectContainer>');
			
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
	public function TEST4() {
        $this->load->helper('url');
        $this->load->helper('file');



        $TaskCount="100";
        $Task="100";
        $Parameter="100";
        $Application="100";
        $Id="100";
        $MapId="100";
        $Version="100";

        $Transaction="100";
        $Payment="100";
        $PaymentFields="100";
        $DocumentNumber="100";
        $PaymentCode="100";
        $Currency="100";
        $PaymentAmount="100";
        $DocumentAmount="100";
        $DocumentOI="100";

		// $json= json_decode($jsonString, true);
        $json = array (
            'AbaConnectContainer' => [
                "TaskCount"=>$TaskCount,
                "Task"=> [
                "Parameter"=>[
                "Application"=>$Application,
                "Id"=>$Id,
                "MapId"=>$MapId,
                "Version"=>$Version],
                "Transaction"=> [
                "Payment"=>[
                "PaymentFields"=> [
                "DocumentNumber"=>$DocumentNumber,
                "PaymentCode"=>$PaymentCode,
                "Currency"=>$Currency,
                "PaymentAmount"=>$PaymentAmount,
                "DocumentAmount"=>$DocumentAmount,
                "DocumentOI"=>$DocumentOI
				    ]
			    ]
			]
		]
    ]
        );
		
        $params = array('json' => $json);
        

	    function array2xml($json, $xml = false){
			if($xml === false){
				$xml = new SimpleXMLElement('<?xml version="1.0"?><AbaConnectContainer></AbaConnectContainer>');
			
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