<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoicesController extends CI_Controller {

    public function index()
	{
		$this->load->helper('url');
		//$this->load->view('welcome_message');
	}

    public function get_invoicesBooks()
    {
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
}

