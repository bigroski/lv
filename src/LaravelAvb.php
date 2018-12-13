<?php

namespace Outright\LaravelAvb;

class LaravelAvb
{
	/**
     * Multiplies the two given numbers
     * @param int $a
     * @param int $b
     * @return int
     */
	// public function __construct(){

	// }
    public function multiply($a, $b)
    {
        return $a * $b;
    }
    // Build wonderful things
    public $socket = '';
    public $result = '';
    public function connect(){
    	// var_dump($this->socket);
    	if($this->socket == ''){

	    	$this->socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	        $this->result = socket_connect($this->socket, config('laravelavb.host'), config('laravelavb.port')) or die("Could not connect to server\n");  

    	}
    }
    // // Send the connection Request
    public function connection_request(){
    	// $this->connect();
    	if(!$this->CheckConnection()){
    		$status = $this->write(Connection::Request());
    		Connection::setStatus($status);
    	}
    }
    
    // // Write the message to the socket
    public function convert($message){
    	return hex2bin($message);
    }
    // if Connection status is not empty then connection is true
    public function checkConnection(){
    	if(!empty(Connection::getStatus())){
    		$status = $this->write(Connection::ConnectionTesting());
    		Connection::setStatus($status);
	  		return true;
    	}else{
    		return false;
    	}
    }
    public function write($message){
    	$this->connect();
    	socket_write($this->socket, $this->convert($message), strlen($this->convert($message))) or die("Could not send data to server\n");
     	// get server response
        $result = socket_read ($this->socket, 1024) or die("Could not read server response\n");
        echo "Reply From Server  :".bin2hex($result);
        return $result;
    }

}