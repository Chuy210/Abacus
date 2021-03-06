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

$abacusXml='<?xml version="1.0" encoding="UTF-8"?>
<AbaConnectContainer>
  <TaskCount>1</TaskCount>
  <Task>
    <Parameter>
      <Application>DEBI</Application>
      <Id>Kunden</Id>
      <MapId>AbaDefault</MapId>
      <Version>2019.00</Version>
    </Parameter>
    <Transaction id="1">
      <Customer mode="SAVE">
        <CodeName>AMINA AG</CodeName>
        <CustomerNumber>2</CustomerNumber>
        <PaymentTermNumber>1</PaymentTermNumber>
        <Division>0</Division>
        <AddressData mode="SAVE">
          <AddressNumber>2</AddressNumber>
          <CodeName>AMINA AG</CodeName>
          <Name>Amina AG</Name>
          <FirstName/>
          <AdditionalLine>Informatik, Software</AdditionalLine>
          <Line1>Bundesgasse 26</Line1>
          <Line2/>
          <Line3/>
          <Line4/>
          <Country>CH</Country>
          <ZIP>3000</ZIP>
          <City>Bern</City>
          <Phone1>+41 31 225 45 22</Phone1>
          <Phone2/>
          <Fax/>
          <Mobile/>
          <SalutationNumber>3</SalutationNumber>
          <SalutationName/>
          <Title/>
          <IndustryCode>3</IndustryCode>
          <Text/>
          <Website>www.aminabeispiel.ch</Website>
          <Email>info@aminabeispiel.ch</Email>
          <Language>de</Language>
          <SubjectType>2</SubjectType>
          <HouseNumber>26</HouseNumber>
          <Street>Bundesgasse</Street>
        </AddressData>
        <CurrencyData mode="SAVE">
          <Currency>CHF</Currency>
          <TaxCode/>
          <CurrencyRisk>0</CurrencyRisk>
          <CurrencyLimitAmount>0</CurrencyLimitAmount>
          <PaymentOrderESRProcedure>1</PaymentOrderESRProcedure>
          <PaymentOrderIPIProcedure>0</PaymentOrderIPIProcedure>
          <StandardProcedure>0</StandardProcedure>
        </CurrencyData>
      </Customer>
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
        $jsonString='{
			"TaskCount":"1",
			"Task":{
			   "Parameter":{
				  "Application":"DEBI",
				  "Id":"Zahlungen",
				  "MapId":"fidevision",
				  "Version":"2020.00"
			   },
			   "Transaction":[
				  {
					 "Payment":{
						"@attributes":{
						   "mode":"Save"
						},
						"PaymentFields":{
						   "@attributes":{
							  "mode":"Save"
						   },
						   "DocumentNumber":"8014",
						   "PaymentCode":"Z",
						   "Currency":"CHF",
						   "PaymentAmount":"114404.35",
						   "DocumentAmount":"114404.35",
						   "DocumentOI":"0.00"
						}
					 }
				  },
				  {
					 "Payment":{
						"@attributes":{
						   "mode":"Save"
						},
						"PaymentFields":{
						   "@attributes":{
							  "mode":"Save"
						   },
						   "DocumentNumber":"8015",
						   "PaymentCode":"Z",
						   "Currency":"CHF",
						   "PaymentAmount":"730.20",
						   "DocumentAmount":"730.20",
						   "DocumentOI":"0.00"
						}
					 }
				  },
				  {
					 "Payment":{
						"@attributes":{
						   "mode":"Save"
						},
						"PaymentFields":{
						   "@attributes":{
							  "mode":"Save"
						   },
						   "DocumentNumber":"8016",
						   "PaymentCode":"Z",
						   "Currency":"CHF",
						   "PaymentAmount":"1387.80",
						   "DocumentAmount":"1387.80",
						   "DocumentOI":"0.00"
						}
					 }
				  }
			   ]
			}
		 }';
		
			$json= json_decode($jsonString, true);
		 	// print_r ($json);
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