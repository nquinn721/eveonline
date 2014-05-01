<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
require_once 'ale-0.6.12/ale/factory.php';
/**
* 
*/
class Players {
	
	private $api_key;
	private $user;

	private $urls = array(
		// 'AccountBalance',
		// 'AssetList',
		// 'CalendarEventAttendees', // BAD REQUEST
		'CharacterSheet'//,
		// 'ContactList',
		// 'ContactNotifications',
		// 'Contracts',
		// 'ContractItems', // BAD REQUEST
		// 'ContractBids',
		// 'FactionalWarfareStats', // BAD REQUEST
		// 'IndustryJobs',
		// 'KillLog',
		// 'Locations', // BAD REQUEST
		// 'MailBodies', // BAD REQUEST
		// 'MailingLists',
		// 'MailMessages',
		// 'MarketOrders',
		// 'Medals',
		// 'Notifications',
		// 'NotificationTexts', // BAD REQUEST
		// 'Research',
		// 'SkillinTraining',
		// 'SkillQueue',
		// 'Standings',
		// 'UpcomingCalendarEvents',
		// 'WalletJournal',
		// 'WalletTransactions'
	);



	function __construct($keyId, $vCode){
		//get ALE object
		 try {
		     $ale = AleFactory::getEVEOnline();
		     //set user credentials, third parameter $characterID is also possible;
		     $ale->setKey($keyId, $vCode);
		     //all errors are handled by exceptions
		     //let's fetch characters first.
		     $account = $ale->account->Characters();
		  	echo '<pre>';
		  	print_r($account);
		  	echo '</pre>';


		     //you can traverse <rowset> element with attribute name="characters" as array
		     // foreach ($account->result->characters as $character) {
		     //     //this is how you can get attributes of element
		     //     $characterID = (string) $character->characterID;

		     //     $ale->setCharacterID($characterID);

		     //     // $this->getXML($ale);
		     // }
		 }
		 //and finally, we should handle exceptions
		 catch (Exception $e) {
		     echo $e->getMessage();
		 }
	}

	function getXML($api){


		foreach($this->urls as $url){

			$xml = $api->char->$url();
			echo "<pre>";
			print_r($xml);
			echo "</pre>";
		}
	}
}

// class Players {
	
	
	
// 	public function __construct($api_key, $vCode ){
// 		// $this->api_key = $api_key;
// 		// $this->user = $user;
// 		echo 'hi';
// 		 
// 	}


// 	public function get($call = ''){

// 		// Full url with the whatever call passed from params
// 		$full_url = "/char/$call.xml.aspx";



// 		$ch = curl_init();
		

// 		curl_setopt($ch, CURLOPT_URL,$full_url);
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
// 		 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// 	        'X-Sifter-Token: ',
// 	        'Accept: application/json',
// 	  ));


// 		$data = curl_exec($ch);
		

// 		if (curl_errno($ch))
// 			$this->error(curl_error($ch));
// 		else $this->save($data);



// 		curl_close($ch);
// 	}


// 	public function fileDump(){
		
// 		if(!is_dir(dirname(__FILE__) . '/users/' . $this->user));
// 			mkdir(dirname(__FILE__) . '/users/' . $this->user);

// 		/**
// 		 * TODO
// 		 * Update userid_webservicecall_time.xml. with correct userid and time
// 		 * 
// 		 * time === $_SERVER["REQUEST_TIME"]
// 		 *
// 		 */
// 		$file = fopen('userid_webservicecall_time.xml.', "w");
// 		fwrite($file, $this->xml);
// 		fclose($file);

// 	}


// 	public function error($msg = ''){
// 		throw new Exception($msg, 1);
// 	}

// 	/**
// 	 * TODO
// 	 * Set Up DB Save Function
// 	 */
// 	public function save($data){

// 	}


// }

new Players('2708829', 'tkbQT2gatc1jqHQY8K7ZQC3yzqau0oOEBGGtMQxOfaBbfaBskpaf2aMIEZksmSr6');



?>
