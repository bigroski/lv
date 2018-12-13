<?php

namespace Outright\LaravelAvb;

class Command
{
	public static $commands = [
		'ConnectionTesting' => '03',
		'ConnectionClosing' => '04',
		'EntitlementUpdating' => '10',
		'EntitlementPause' => '12',
		'EntitlementResuming' => '13',
		'EntitlementCanceling' => '14',
		'EntitlementEnquiring' => '15',
		'AreaEntitlementUpdating' => '20',
		'AreaEntitlementCanceling' => '21',
		'AreaEntitlementEnquiring' => '22',
		'PPVEntitlementUpdating' => '17',
		'PPVEntitlementEnquiring' => '18',
		'PPVEntitlementCanceling' => '19',
		'AreaPPVEntitlementUpdating' => '23',
		'AreaPPVEntitlementCanceling' => '24',
		'AreaPPVEntitlementEnquiring' => '25',
		'Remove All Product' => '26',
		'Reauthorize All Product' => '27',
		'Smartcard Adding' => '40',
		'Smartcard Deleting' => '41',
		'Smartcard Transfer' => '42',
		'Smartcard Suspending' => '43',
		'Smartcard Resuming' => '44',
		'Smartcard Binding' => '45',
		'Smartcard Unbinding' => 46,
		'Smartcard area Modifying' => 47,
		'Smartcard Charging' => '48',
		'Smartcard Password Resetting' => '',
		'Master smart card Bind/Cancel' => '4D',
		// Need conformation about the top
		'Smartcard status Enquiring Request' => '50',
		'Smartcard Statistics Request' => '51',
		'Package Statistics' => '52',
		'Smartcard Active PPID' => '53',
		'Program Updating' => 'A1',
		'Program Query' => 'A2',
		

	];
	public static function get($tag){
		return self::$commands[$tag];
	}
}