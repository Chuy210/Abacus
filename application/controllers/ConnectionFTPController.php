<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConnectionFTPController extends CI_Controller {


    function __construct()
    {
        parent::__construct();

        // Load libraries
        $this->load->library('sftp');

    }
    
    function index()
	{
		$this->load->helper('url');
        //$this->load->library('sftp');
		//$this->load->view('welcome_message');
	}
    /*public function __construct($host, $port=22)
    {
        $this->connection = @ssh2_connect($host, $port);
        if (! $this->connection)
            throw new Exception("Could not connect to $host on port $port.");
    }*/
    public function login($username, $password)
    {
        $host = "https://kmuqr.quickapps.mx/";
        $port = 22;
        $this->connection = @ssh2_connect($host, $port);
        if (! @ssh2_auth_password($this->connection, $username, $password))
            throw new Exception("Could not authenticate with username $username " .
                                "and password $password.");

        $this->sftp = @ssh2_sftp($this->connection);
        if (! $this->sftp)
            throw new Exception("Could not initialize SFTP subsystem.");
    }

    public function uploadFile($local_file, $remote_file)
    {
        $sftp = $this->sftp;
        $stream = @fopen("ssh2.sftp://$sftp$remote_file", 'w');

        if (! $stream)
            throw new Exception("Could not open file: $remote_file");

        $data_to_send = @file_get_contents($local_file);
        if ($data_to_send === false)
            throw new Exception("Could not open local file: $local_file.");

        if (@fwrite($stream, $data_to_send) === false)
            throw new Exception("Could not send data from file: $local_file.");

        @fclose($stream);
    }


    public function getFtpConnection()
    {


        /*
		The sFTP config. These are the credentials you use to connect to the remote sFTP server.
		These can also be stored in a seperate config file to save having to enter them in all
		the time.
		
		If 'debug' is set to TRUE, then if the library encounters and error, the error will be displayed
		using the error values with the language file supplied (application/language/english/sftp_lang.php).
		If it's set to FALSE, it will gracefully error with no error messages.
		*/
        //$this->load->library('Sftp2');
        // $sftp_config['hostname'] = 'https://kmuqr.quickapps.mx';
		// $sftp_config['username'] = 'root';
		// $sftp_config['password'] = 'ukv8viu5wj9ge89yxu97';
		// $sftp_config['debug'] = TRUE;
		
		// // Actually try and connect to the remote server...
		// $this->sftp->connect($sftp_config);

        // /*
		// list_files:	This will list all files in a diretory on the remote filesystem.
		// */
		// $success = $this->sftp->list_files("/var/www/html", TRUE);
		
		
		// // Output is the method was successful!
		// print_r($success);
        //  $this->load->library("CI_SFTPConnection");
        //  $connection = ssh2_connect('https://kmuqr.quickapps.mx/', 22);
        //  ssh2_auth_password($connection, 'root', 'ukv8viu5wj9ge89yxu97');

        //  $sftp = ssh2_sftp($connection);

         //Load codeigniter FTP class

        $sftp_config['hostname'] = 'https://kmuqr.quickapps.mx/';
		$sftp_config['username'] = 'root';
		$sftp_config['password'] = 'ukv8viu5wj9ge89yxu97';
		$sftp_config['debug'] = TRUE;
		
		// Actually try and connect to the remote server...
		$success= $this->sftp->connect($sftp_config);


        /*
		list_files:	This will list all files in a diretory on the remote filesystem.
		*/
		// $success = $this->sftp->list_files("/root", TRUE);
		
		
		// // Output is the method was successful!
		// print_r($success);

        return $success;
        //  $this->load->library('ftp');

        //  $ftp_config['hostname'] = 'sftp://45.33.27.222'; 
        //  $ftp_config['username'] = 'root';
        //  $ftp_config['password'] = 'ukv8viu5wj9ge89yxu97';
        //  $ftp_config['debug']    = TRUE;
         
        //  //Connect to the remote server
        //  $this->ftp->connect($ftp_config);
         
        //  //File upload path of remote server
        //  //$destination = '/assets/'.$fileName;
         
        //  //Upload file to the remote server
        // // $this->ftp->upload($source, ".".$destination);
         
        //  //Close FTP connection
        //  $this->ftp->close();

		
        // $this->load->library('sftp');

        // $config['hostname'] = 'https://kmuqr.quickapps.mx';
        // $config['username'] = 'root';
        // $config['password'] = 'ukv8viu5wj9ge89yxu97';

        // $this->sftp->connect($config);

       
        
        // //$success = $this->sftp->list_files("../var/www/html", TRUE);
        // $success = $this->sftp->upload('./src/InAbacus/file.xml', '../var/www/html/', 'ascii', 0644);
        
        // $this->sftp->close();

        // return $success;
        // $connection = ssh2_connect('https://kmuqr.quickapps.mx', 22);
        // ssh2_auth_password($connection, 'root', 'ukv8viu5wj9ge89yxu97');

        // $sftp = ssh2_sftp($connection);

        // print_r($sftp);

        //$stream = fopen('ssh2.sftp://' . intval($sftp) . '/path/to/file', 'r');
		// $sftp_config['hostname'] = 'ftp01.omcolo.net';
		// $sftp_config['username'] = 'ftp_wkverlag';
		// $sftp_config['password'] = 'Z4rbh&kYV1';
		// $sftp_config['debug'] = TRUE;
		
		// // Actually try and connect to the remote server...
		// $success = $this->sftp->connect($sftp_config);

        // /*
		// list_files:	This will list all files in a diretory on the remote filesystem.
		// */
		// //$success = $this->sftp->list_files("/var/www/html", TRUE);
		
		
		// // Output is the method was successful!
		// print_r($success);
	

        // $this->load->library('ftp');

        // //$this->load->library('ftp');

        // $config['hostname'] = 'ftp01.omcolo.net';
        // $config['username'] = 'ftp_wkverlag';
        // $config['password'] = 'Z4rbh&kYV1';
        // $config['debug']        = TRUE;
        
        // $chekcFTP = $this->ftp->connect($config);

        // print_r($chekcFTP);
        
        // // $list = $this->ftp->list_files('/var/www/html');
        
        // // print_r($list);
        
        // $this->ftp->close();

        //$sftp = new SFTPConnection("https://kmuqr.quickapps.mx/", 22);
        //$sftp->login("root", "ukv8viu5wj9ge89yxu97");
        /* $uri = "ftp://root:ukv8viu5wj9ge89yxu97@https://kmuqr.quickapps.mx/var/www/html/Abacus/";
        // Split FTP URI into:
         $match[0] = "ftp://root:ukv8viu5wj9ge89yxu97@https://kmuqr.quickapps.mx/var/www/html/Abacus/";
         $match[1] = "ftp://";
         $match[2] = "root";
         $match[3] = "ukv8viu5wj9ge89yxu97";
         $match[4] = "https://kmuqr.quickapps.mx/";
         $match[5] = "/var/www/html/Abacus/";
        preg_match("/ftp:\/\/(.*?):(.*?)@(.*?)(\/.*)/i", $uri, $match);
    
        // Set up a connection
        $conn = ftp_connect($match[1] . $match[4] . $match[5]);
    
        // Login
        if (ftp_login($conn, $match[2], $match[3]))
        {
            // Change the dir
            ftp_chdir($conn, $match[5]);
    
            // Return the resource
            return $conn;
        }
    
        // Or retun null
        return null;
    }    */

}

}

/*try
{
    $sftp = new SFTPConnection("localhost", 22);
    $sftp->login("username", "password");
    $sftp->uploadFile("/tmp/to_be_sent", "/tmp/to_be_received");
}
catch (Exception $e)
{
    echo $e->getMessage() . "\n";
}*/







