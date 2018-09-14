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
    	 curl_setopt($ch, CURLOPT_URL, "http://101.109.246.31/dotsmc/pages/testaddtodb.php");
 	//header( "location: http://101.109.246.31/dotsmc/pages/testaddtodb.php" );
	
    
       // Get text sen
	$replyText = 'test';   
     
      // Get replyToken
     $replyToken = $event['replyToken'];
/*
      if ($text == 'สวัสดี') {
        $replyText = 'สวัสดีเช่นกัน';
      } else if ($text == 'คุณชื่ออะไร') {
        $replyText = 'ศรีแพรไง';
      } else if ($text == 'ใครหล่อสุดในsmc') {
        $replyText = 'เตเต้ไง จะใครละ';
      } else {
        $replyText = 'เราอย่าพูดถึงเรื่องนี้เลยดีกว่า';
      }
*/
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
