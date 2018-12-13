<?php

namespace Outright\LaravelAvb;

class Connection
{
    // Build wonderful things
    public static $status = [];
    public static function Request(){
    	$message = "0101000501000001FF";
        $hexToBin = hex2bin($message);
        return $message;
    }
    public static function ConnectionStatusLength(){
    	return [
    		'version' => 8,
    		'tag' => 8,
    		'length' => 16,
    		'sms_id' => 32,
    		'cas_id' => 32,
    		'link' => 8
    	];
    }
    public static function ConnectionTestingLength(){
    	return [
    		'version' => 8,
    		'tag' => 8,
    		'length' => 16,
    		'link' => 8
    	];
    }
    // public static 
    public static function SetStatus($hexStatus){
    	$lengths = self::ConnectionStatusLength();
    	$unit_binary = config('laravelavb.unit_length_binary');
    	$unit_hex = config('laravelavb.unit_length_hex');
    	$offset = 0;
    	foreach($lengths as $key => $val){
    		$take = ($val/$unit_binary)*$unit_hex;
    		self::$status[$key] = substr($hexStatus, $offset, $take);
    		$offset += $take;
    	}
    	session(['abv_session' => self::$status]);
    }
    public static function getStatus(){
    	self::$status = session('abv_session');
    	return self::$status;
    	// return self::$status;
    }
    public static function ConnectionTesting(){
    	$con = self::$status;
    	$message_string = [config('laravelavb.protocol_version'),
    						Command::get('ConnectionTesting'),
    						'0001',
    						$con['link']
    					];
    	var_dump($message_string);
    	return implode( $message_string);
    	// $tag = Command::get('ConnectionTesting');
    	// var_dump('self_status');
    	// var_dump();
    	// var_dump($con);
    }
}