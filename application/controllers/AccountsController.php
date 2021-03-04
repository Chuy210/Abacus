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
<<<<<<< Updated upstream

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
=======
        $this->load->helper('date');

        $request = $this->request = json_decode(file_get_contents('php://input'));

        //$post = json_decode('{"data":[{"CodeName":"test1111112223333 dsadsf acc","CustomerNumber":"99999","PaymentTermNumber":"","Name":"test1111112223333 dsadsf acc","Line1":"","ZIP":"3434","City":"dsadsad","Phone1":"","SalutationNumber":3,"SalutationName":"","IndustryCode":3,"Website":"","Email":"test1Juan@mail.com","Language":"","SubjectType":2,"HouseNumber":26,"Street":"fdsfdsf","Currency":"CHF","CurrencyRisk":0,"CurrencyLimitAmount":0,"PaymentOrderESRProcedure":1,"PaymentOrderIPIProcedure":0,"StandardProcedure":0},{"CodeName":"test Account JL","CustomerNumber":"0","PaymentTermNumber":"","Name":"test Account JL","Line1":"","ZIP":"","City":"","Phone1":"","SalutationNumber":3,"SalutationName":"","IndustryCode":3,"Website":"","Email":"","Language":"","SubjectType":2,"HouseNumber":26,"Street":"","Currency":"CHF","CurrencyRisk":0,"CurrencyLimitAmount":0,"PaymentOrderESRProcedure":1,"PaymentOrderIPIProcedure":0,"StandardProcedure":0}]}');

        $respuesta = new stdClass();

        $data = json_encode($request->data);
        
        //return json_encode($request->data);

        // for ($i = 0; $i <= count(json_encode($data)) ; $i++) {
        //     echo  json_encode($data[$i]["Currency"]);
        // }
        
        //return json_encode($request->data);

        // for ($i = 0; $i <= count(json_encode($data)) ; $i++) {
        //     echo  json_encode($data[$i]["Currency"]);
        // }

        $start_xml="<?xml version='1.0' encoding='UTF-8'?>
        <AbaConnectContainer>
          <TaskCount>1</TaskCount>
          <Task>
            <Parameter>
              <Application>DEBI</Application>
              <Id>Kunden</Id>
              <MapId>AbaDefault</MapId>
              <Version>2019.00</Version>
            </Parameter>";

            $xml_string = "";

        for($i = 0; $i <= count($data) ; $i++) {
             //echo   $request->data[$i]->Currency;
             $index = $i + 1;
             $Currency = $request->data[$i]->Currency;
             $CustomerNumber = $request->data[$i]->CustomerNumber;
             $PaymentTermNumber = $request->data[$i]->PaymentTermNumber;
             $CodeName = $request->data[$i]->CodeName;
             $Name = $request->data[$i]->Name;
             $FirstName = $request->data[$i]->FirstName;
             $AdditionalLine = $request->data[$i]->AdditionalLine;
             $Line1= $request->data[$i]->Line1;
             $ZIP = $request->data[$i]->ZIP;
             $City= $request->data[$i]->City;
             $Phone1 = $request->data[$i]->Phone1;
             $Phone2 = $request->data[$i]->Phone2;
             $SalutationNumber = $request->data[$i]->SalutationNumber;
             $SalutationName = $request->data[$i]->SalutationName;
             $IndustryCode = $request->data[$i]->IndustryCode;
             $Website = $request->data[$i]->Website;
             $Email = $request->data[$i]->Email;
             $Language = $request->data[$i]->Language;
             $SubjectType = $request->data[$i]->SubjectType;
             $HouseNumber = $request->data[$i]->HouseNumber;
             $AddressNumber= $request->data[$i]->AddressNumber;
             $Street = $request->data[$i]->Street;
             $CurrencyRisk= $request->data[$i]->CurrencyRisk;
             $CurrencyLimitAmount = $request->data[$i]->CurrencyLimitAmount;
             $PaymentOrderESRProcedure = $request->data[$i]->PaymentOrderESRProcedure;
             $PaymentOrderIPIProcedure = $request->data[$i]->PaymentOrderIPIProcedure;
             $StandardProcedure = $request->data[$i]->StandardProcedure;
             $Country = $request->data[$i]->Country;
             $Fax =$request->data[$i]->Fax;
             $Mobile = $request->data[$i]->Mobil;

         
                $xml_string .= '<Transaction id="'.$index.'">
                   <Customer mode="SAVE">
                     <CodeName>'.strtoupper($CodeName).'</CodeName>
                     <CustomerNumber>'.$CustomerNumber.'</CustomerNumber>
                     <PaymentTermNumber>1</PaymentTermNumber>
                     <Division>0</Division>
                     <AddressData mode="SAVE">
                       <AddressNumber>'.$AddressNumber.'</AddressNumber>
                       <CodeName>'.strtoupper($CodeName).'</CodeName>
                       <Name>'.$Name.'</Name>
                       <FirstName>'.$FirstName.'</FirstName>
                       <AdditionalLine>'.$AdditionalLine.'</AdditionalLine>
                       <Line1>'.$Line1.'</Line1>
                       <Line2/>
                       <Line3/>
                       <Line4/>
                       <Country>'.$Country.'</Country>
                       <ZIP>'.$ZIP.'</ZIP>
                       <City>'.$City.'</City>
                       <Phone1>'.$Phone1.'</Phone1>
                       <Phone2>'.$Phone2.'</Phone2>
                       <Fax>'.$Fax.'<Fax/>
                       <Mobile>'.$Mobile.'<Mobile/>
                       <SalutationNumber>'.$SalutationNumber.'</SalutationNumber>
                       <SalutationName>'.$SalutationName.'<SalutationName/>
                       <Title/>
                       <IndustryCode>'.$IndustryCode.'</IndustryCode>
                       <Text/>
                       <Website>'.$Website.'</Website>
                       <Email>'.$Email.'</Email>
                       <Language>'.$Language.'</Language>
                       <SubjectType>'.$SubjectType.'</SubjectType>
                       <HouseNumber>'.$HouseNumber.'</HouseNumber>
                       <Street>'.$Street.'</Street>
                     </AddressData>
                     <CurrencyData mode="SAVE">
                       <Currency>'.$Currency.'</Currency>
                       <TaxCode/>
                       <CurrencyRisk>'.$CurrencyRisk.'</CurrencyRisk>
                       <CurrencyLimitAmount>'.$CurrencyLimitAmount.'</CurrencyLimitAmount>
                       <PaymentOrderESRProcedure>'.$PaymentOrderESRProcedure.'</PaymentOrderESRProcedure>
                       <PaymentOrderIPIProcedure>'.$PaymentOrderIPIProcedure.'</PaymentOrderIPIProcedure>
                       <StandardProcedure>'.$StandardProcedure.'</StandardProcedure>
                     </CurrencyData>
                   </Customer>
                 </Transaction>
            ';
        }

             $end_xml ="</Task>
             </AbaConnectContainer>";



            
             $all_xml = $start_xml . $xml_string . $end_xml;

                 $bad_date = '9-11-2001';
        //      // Should Produce: 2001-09-11
                 $better_date = nice_date($bad_date, 'Y-m-d');
                 $archivo = fopen("./src/InAbacus/Customers_".$better_date.".xml","w+b");
                 if( $archivo == false ) {
                   echo "Error al crear el archivo";
                 }
                 else
                 {
                     // Escribir en el archivo:
                      fwrite($archivo, $all_xml);
                     // Fuerza a que se escriban los datos pendientes en el buffer:
                      fflush($archivo);
                 }
                 // Cerrar el archivo:
                 fclose($archivo);

             echo $all_xml;
             return $all_xml;

    
}


public function send_infoZohoCRM()
{

    
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

    $res = $this->output->set_status_header(200)->set_output($json2)->_display();


	return $res;

}


>>>>>>> Stashed changes
}

