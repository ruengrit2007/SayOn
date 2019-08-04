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
    curl_setopt($ch, CURLOPT_USERPWD, "ALVaMBoxFRm7MrO:EYaq59mVqT5N0Py8XUhj8ASRh");
    $response = curl_exec($ch);
      curl_close($ch);
      echo $response . "\r\n";
    return $response;
   }
   $accessToken = "pUSNzzZen370jm5bI5kLCmfbikfsjNmZ91BDlseT7uqm4psB6dUFRa9iC8grOXVCzHahbJoufFH/ez6U0j0ZcwHjX9tiXs3k4fECDbuQNOArtHhAl0BOm4GLen8gM12h8+YzOdqNAmdGMy+UTtxn9gdB04t89/1O/w1cDnyilFU=";  
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];

   if($message == "1"){
       for($i=1;$i<=1;$i++){
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = $i;
          $arrayPostData['messages'][0]['text'] = $id;
          pushMsg($arrayHeader,$arrayPostData);
       }
      $Topic = "NodeMCU1" ;
      $text = $id;
      pubMqtt($Topic,$text);
    }
    if($message == "2"){
       for($i=1;$i<=1;$i++){
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = $i;
          pushMsg($arrayHeader,$arrayPostData);
       }
      $Topic = "NodeMCU1" ;
      $text = "1";
      pubMqtt($Topic,$text);
    }
    if($message == "3"){
       for($i=1;$i<=2;$i++){
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = $i;
          pushMsg($arrayHeader,$arrayPostData);
       }
      $Topic = "NodeMCU1" ;
      $text = $groupId;
      pubMqtt($Topic,$text);
    }
    if($message == "4"){
       for($i=1;$i<=2;$i++){
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = $i;
          pushMsg($arrayHeader,$arrayPostData);
       }
      $Topic = "NodeMCU1" ;
      $text = $room;
      pubMqtt($Topic,$text);
    }

   #ตัวอย่าง Message Type "Text + Sticker"
   if($message == "On"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งทดสอบระบบ...ถ้าไฟสีฟ้าติดคือพร้อมครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "1";
      $arrayPostData['messages'][1]['stickerId'] = "406";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On#1";
      pubMqtt($Topic,$text);
      }
   if($message == "OnAll" || $message == "เปิดทั้งหมด" || $message == "เปิดไฟทั้งหมด"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดหลอดไฟทั้งหมดครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "263";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "OnAll#1";
      pubMqtt($Topic,$text);   
      }
   if($message == "เปิดไฟหลอดที่ 1" || $message == "On1" || $message == "เปิดไฟดวงที่ 1" || $message == "เปิดไฟห้องโถง"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟห้องโถงแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "513";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On1#1";
      pubMqtt($Topic,$text);   
      }
   if($message == "เปิดไฟหลอดที่ 2" || $message == "On2" || $message == "เปิดไฟดวงที่ 2" || $message == "เปิดไฟห้องนอน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟห้องนอนแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "523";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On2#1";
      pubMqtt($Topic,$text);   
      }
   if($message == "เปิดไฟหลอดที่ 3" || $message == "On3" || $message == "เปิดไฟดวงที่ 3" || $message == "เปิดไฟห้องครัว"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟห้องครัวแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "510";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On3#1";
      pubMqtt($Topic,$text);   
      }
   if($message == "เปิดไฟหลอดที่ 4" || $message == "On4" || $message == "เปิดไฟดวงที่ 4" || $message == "เปิดไฟหน้าบ้าน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟหน้าบ้านแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "509";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On4#1";
      pubMqtt($Topic,$text);   
      }
    if($message == "เปิดไฟหลอดที่ 5" || $message == "On5" || $message == "เปิดไฟดวงที่ 5" || $message == "เปิดไฟหลังบ้าน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟหลังบ้านแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "275";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On5#1";
      pubMqtt($Topic,$text);   
      }
    if($message == "เปิดพัดลม" || $message == "On6"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดพัดลมให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "27";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On6#1";
      pubMqtt($Topic,$text);   
      }
    if($message == "เปิดไฟหลอดที่ 7" || $message == "On7" || $message == "เปิดไฟดวงที่ 7" || $message == "เปิดไฟห้องน้ำ"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟห้องน้ำให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "508";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On7#1";
      pubMqtt($Topic,$text);   
      }
    if($message == "เปิดไฟหลอดที่ 8" || $message == "On8" || $message == "เปิดไฟดวงที่ 8" || $message == "เปิดประตูเลื่อน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดประตูเลื่อนหน้าบ้านให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "512";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On8#1";
      pubMqtt($Topic,$text);   
      }

    if($message == "Off"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งทดสอบระบบ...ถ้าไฟสีฟ้าดับคือพร้อมครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "161";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On#0";
      pubMqtt($Topic,$text);   
      }
   if($message == "OffAll" || $message == "ปิดทั้งหมด" || $message == "ปิดไฟทั้งหมด"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดหลอดไฟทั้งหมดครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "264";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "OnAll#0";
      pubMqtt($Topic,$text);   
      }
   if($message == "ปิดไฟหลอดที่ 1" || $message == "Off1" || $message == "ปิดไฟดวงที่ 1" || $message == "ปิดไฟห้องโถง"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟห้องโถงให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "506";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On1#0";
      pubMqtt($Topic,$text);   
      }
   if($message == "ปิดไฟหลอดที่ 2" || $message == "Off2" || $message == "ปิดไฟดวงที่ 2" || $message == "ปิดไฟห้องนอน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟห้องนอนให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "26";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On2#0";
      pubMqtt($Topic,$text);   
      }
   if($message == "ปิดไฟหลอดที่ 3" || $message == "Off3" || $message == "ปิดไฟดวงที่ 3" || $message == "ปิดไฟห้องครัว"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟห้องครัวให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "143";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On3#0";
      pubMqtt($Topic,$text);   
      }
   if($message == "ปิดไฟหลอดที่ 4" || $message == "Off4" || $message == "ปิดไฟดวงที่ 4" || $message == "ปิดไฟหน้าบ้าน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟหน้าบ้านให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "146";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On4#0";
      pubMqtt($Topic,$text);   
      }
    if($message == "ปิดไฟหลอดที่ 5" || $message == "Off5" || $message == "ปิดไฟดวงที่ 5" || $message == "ปิดไฟหลังบ้าน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟหลังบ้านแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On5#0";
      pubMqtt($Topic,$text);   
      }
    if($message == "ปิดพัดลม" || $message == "Off6"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดพัดลมให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "619";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On6#0";
      pubMqtt($Topic,$text);   
      }
    if($message == "ปิดไฟหลอดที่ 7" || $message == "Off7" || $message == "ปิดไฟดวงที่ 7" || $message == "ปิดไฟห้องน้ำ"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟห้องน้ำให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "511";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On7#0";
      pubMqtt($Topic,$text);   
      }
    if($message == "ปิดไฟหลอดที่ 8" || $message == "Off8" || $message == "ปิดไฟดวงที่ 8" || $message == "ปิดประตูเลื่อน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดประตูเลื่อนหน้าบ้านแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "290";
      pushMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On8#0";
      pubMqtt($Topic,$text);   
      }

    function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;
?>
