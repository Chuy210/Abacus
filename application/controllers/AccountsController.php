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
        $this->load->helper('file');

        $Currency = $this->input->post("Currency");
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

        $jsonString='{
            "Currency": "'.$Currency.'",
            "CustomerNumber": "'.$CustomerNumber.'",
            "PaymentTermNumber": "'.$PaymentTermNumber.'",
            "Name": "'.$Name.'",
            "ZIP": "'.$ZIP.'",
            "City":$"'.$City.'",
            "Phone1": "'.$Phone1.'",
            "SalutationNumber": "'.$SalutationNumber.'",
            "SalutationName": "'.$SalutationName.'",
            "IndustryCode": "'.$IndustryCode.'",
            "Website": "'.$Website.'",
            "Email": "'.$Email.'",
            "Language": "'.$Language.'",
            "SubjectType": "'.$SubjectType.'",
            "HouseNumber": "'.$HouseNumber.'",
            "Street": "'.$Street.'",
            "CurrencyRisk":$"'.$CurrencyRisk.'",
            "CurrencyLimitAmount": "'.$CurrencyLimitAmount.'",
            "PaymentOrderESRProcedure": "'.$PaymentOrderESRProcedure.'",
            "PaymentOrderIPIProcedure": "'.$PaymentOrderIPIProcedure.'",
            "StandardProcedure": "'.$StandardProcedure.'"
            
		 }';
	
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

            $data = $xml->asXML();
            
            if ( ! write_file('./src/inAbacus/file.xml', $data))
             {
                     echo 'Unable to write the file';
             }
             else
             {
                     echo 'File written!';
             }
            
			return $xml->asXML();
		}

     
		//header('Content-type: text/xml');
		//print array2xml($json);

        /*$config['upload_path'] = './src/InAbacus';
        $config['allowed_types'] = 'gif|jpg|png|xml';
        $config['max_size']     = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
        $this->upload->initialize($config);*/
        
        //return array2xml($json);
        

    }
}

