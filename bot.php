<?php
//require 'vendor/autoload.php';

$access_token = 'tCFfog05pnNUDnqL2VZxR6NMUxeSrWq/Boi0+E8spF4A4ofr3rlSxUQAF1qbSWEWmZM7mG4blFkmD6j4JwmpW5YO+pNn9YDyGyXWG156fdHl8uO5ZEr15glAEWRbzR84wEfA0MFGTVPE1lkO8/CEmQdB04t89/1O/w1cDnyilFU=';
$proxy = 'velodrome.usefixie.com:80';
$proxyauth = 'fixie:W8B1EissNtwSwyk';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
  // Loop through each event
  foreach ($events['events'] as $event) {
    // Reply only when message sent is in 'text' format
    if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
	    
//	  $ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "http://203.114.98.244/index.php?r=WebService/sr");
//$productivity = curl_exec($ch);  
	 
 	//header( "location: http://101.109.246.31/dotsmc/pages/testaddtodb.php" );
 $message =$event['message']['text'];
    
       // Get text sen
	$replyText = 'test';   
     
      // Get replyToken
     $replyToken = $event['replyToken'];

      if ($message == 'เมนู') {
        $replyText = '1.หากต้องการตรวจสอบข้อมูลเขหมายJให้พิม!!ตามด้วยหมายเลขวงจร<br/>2.หากต้องการตรวจSessionให้พิม??ตามด้วยหมายเลขวงจร\n\n3.Autoconfig(ZTE)ให้พิม@@ตามด้วยเลขวงจร ';
      } else if ($message == 'sm') {
	     

$client = new SoapClient("http://203.114.98.244/index.php?r=WebService/sr");
	        $usersm = "user_ws_p4";
  $passsm = "wsp4pass";
       		$replyText = 'testsm';
     
	      
	    
      } else if ($message == 'ใครหล่อสุดในsmc') {
        $replyText = 'เตเต้ไง จะใครละ';
      } else {
        $replyText = 'เราอย่าพูดถึงเรื่องนี้เลยดีกว่า';
      }

      // Build message to reply back
      $messages = [
        'type' => 'text',
        'text' => $replyText
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/reply';
      $data = [
        'replyToken' => $replyToken,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
//s
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
      curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n";
    }
  }
}
echo "OK";
