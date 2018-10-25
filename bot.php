<?php
   function pubMqtt($topic,$msg){
    $APPID= "SayOn/"; //enter your appid
    $KEY = "ALVaMBoxFRm7MrO"; //enter your key
    $SECRET = "EYaq59mVqT5N0Py8XUhj8ASRh"; //enter your secret
    $Topic = "$topic"; 
    put("https://api.netpie.io/microgear/".$APPID.$Topic."?retain&auth=".$KEY.":".$SECRET,$msg);
  }

   function put($url,$tmsg){      
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

   $accessToken = "pUSNzzZen370jm5bI5kLCmfbikfsjNmZ91BDlseT7uqm4psB6dUFRa9iC8grOXVCzHahbJoufFH/ez6U0j0ZcwHjX9tiXs3k4fECDbuQNOArtHhAl0BOm4GLen8gM12h8+YzOdqNAmdGMy+UTtxn9gdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"
   if($message == "เปิดไฟ" || $message == "On" || $message == "ON"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "เปิดไฟแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "275";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On";
      pubMqtt($Topic,$text);   
      }
   if($message == "ปิดไฟ" || $message == "Off" || $message == "OFF"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "ปิดไฟให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "Off";
      pubMqtt($Topic,$text);   
      }

   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>
