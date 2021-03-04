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

