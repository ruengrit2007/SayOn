<?php
  function pubMqtt($topic,$msg){
    $APPID= "SayOn/"; //enter your appid
    $KEY = "ALVaMBoxFRm7MrO"; //enter your key
    $SECRET = "EYaq59mVqT5N0Py8XUhj8ASRh"; //enter your secret
    $Topic = "$topic"; 
    put("https://api.netpie.io/microgear/".$APPID.$Topic."?retain&auth=".$KEY.":".$SECRET,$msg);
 
  }
 function getMqttfromlineMsg($Topic,$lineMsg){ 
    $pos = strpos($lineMsg, ":");
    if($pos){
      $splitMsg = explode(":", $lineMsg);
      $topic = $splitMsg[0];
      $msg = $splitMsg[1];
      pubMqtt($topic,$msg);
    }else{
      $topic = $Topic;
      $msg = $lineMsg;
      pubMqtt($topic,$msg);
    }
  }
 
  function put($url,$tmsg)
{      
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg); 
    //curl_setopt($ch, CURLOPT_USERPWD, "ALVaMBoxFRm7MrO:EYaq59mVqT5N0Py8XUhj8ASRh");
     
    $response = curl_exec($ch);
    
      curl_close($ch);
      echo $response . "\r\n";
    return $response;
}
 //$Topic = "NodeMCU1";
 //$lineMsg = "CHECK";
 //getMqttfromlineMsg($Topic,$lineMsg);

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
//if (!is_null($events['ESP'])) {
	
	//send_LINE($events['ESP']);
		
	//echo "OK";
	//}
//if (!is_null($events['events'])) {
//	echo "line bot";
////	// Loop through each event
//	foreach ($events['events'] as $event) {
//		// Reply only when message sent is in 'text' format
//		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
//			// Get text sent
//			$text = $event['message']['text'];
//			// Get replyToken
//			$replyToken = $event['replyToken'];
//			// Build message to reply back
//			$Topic = "NodeMCU1" ;
//			getMqttfromlineMsg($Topic,$text);
//			   
//			
//		}
//	}
//}
$Topic = "NodeMCU1" ;
$text = "Off";
getMqttfromlineMsg($Topic,$text);
echo "OK3";
?>
