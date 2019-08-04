<?php
   $accessToken = "pUSNzzZen370jm5bI5kLCmfbikfsjNmZ91BDlseT7uqm4psB6dUFRa9iC8grOXVCzHahbJoufFH/ez6U0j0ZcwHjX9tiXs3k4fECDbuQNOArtHhAl0BOm4GLen8gM12h8+YzOdqNAmdGMy+UTtxn9gdB04t89/1O/w1cDnyilFU=";  
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัดสยามพารากอน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
        replyMsg($arrayHeader,$arrayPostData);
    }

   else if($message == "On"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งทดสอบระบบ...ถ้าไฟสีฟ้าติดคือพร้อมครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "1";
      $arrayPostData['messages'][1]['stickerId'] = "406";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On#1";
      pubMqtt($Topic,$text);
      }
   else if($message == "OnAll" || $message == "เปิดทั้งหมด" || $message == "เปิดไฟทั้งหมด"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดหลอดไฟทั้งหมดครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "263";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "OnAll#1";
      pubMqtt($Topic,$text);   
      }
   else if($message == "เปิดไฟหลอดที่ 1" || $message == "On1" || $message == "เปิดไฟดวงที่ 1" || $message == "เปิดไฟห้องโถง"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟห้องโถงแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "513";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On1#1";
      pubMqtt($Topic,$text);   
      }
   else if($message == "เปิดไฟหลอดที่ 2" || $message == "On2" || $message == "เปิดไฟดวงที่ 2" || $message == "เปิดไฟห้องนอน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟห้องนอนแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "523";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On2#1";
      pubMqtt($Topic,$text);   
      }
   else if($message == "เปิดไฟหลอดที่ 3" || $message == "On3" || $message == "เปิดไฟดวงที่ 3" || $message == "เปิดไฟห้องครัว"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟห้องครัวแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "510";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On3#1";
      pubMqtt($Topic,$text);   
      }
   else if($message == "เปิดไฟหลอดที่ 4" || $message == "On4" || $message == "เปิดไฟดวงที่ 4" || $message == "เปิดไฟหน้าบ้าน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟหน้าบ้านแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "509";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On4#1";
      pubMqtt($Topic,$text);   
      }
    else if($message == "เปิดไฟหลอดที่ 5" || $message == "On5" || $message == "เปิดไฟดวงที่ 5" || $message == "เปิดไฟหลังบ้าน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟหลังบ้านแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "275";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On5#1";
      pubMqtt($Topic,$text);   
      }
    else if($message == "เปิดพัดลม" || $message == "On6"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดพัดลมให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "27";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On6#1";
      pubMqtt($Topic,$text);   
      }
    else if($message == "เปิดไฟหลอดที่ 7" || $message == "On7" || $message == "เปิดไฟดวงที่ 7" || $message == "เปิดไฟห้องน้ำ"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดไฟห้องน้ำให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "508";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On7#1";
      pubMqtt($Topic,$text);   
      }
    else if($message == "เปิดไฟหลอดที่ 8" || $message == "On8" || $message == "เปิดไฟดวงที่ 8" || $message == "เปิดประตูเลื่อน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งเปิดประตูเลื่อนหน้าบ้านให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "512";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On8#1";
      pubMqtt($Topic,$text);   
      }
    else if($message == "Off"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งทดสอบระบบ...ถ้าไฟสีฟ้าดับคือพร้อมครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "161";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On#0";
      pubMqtt($Topic,$text);   
      }
   else if($message == "OffAll" || $message == "ปิดทั้งหมด" || $message == "ปิดไฟทั้งหมด"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดหลอดไฟทั้งหมดครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "264";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "OnAll#0";
      pubMqtt($Topic,$text);   
      }
   else if($message == "ปิดไฟหลอดที่ 1" || $message == "Off1" || $message == "ปิดไฟดวงที่ 1" || $message == "ปิดไฟห้องโถง"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟห้องโถงให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "506";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On1#0";
      pubMqtt($Topic,$text);   
      }
   else if($message == "ปิดไฟหลอดที่ 2" || $message == "Off2" || $message == "ปิดไฟดวงที่ 2" || $message == "ปิดไฟห้องนอน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟห้องนอนให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "26";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On2#0";
      pubMqtt($Topic,$text);   
      }
   else if($message == "ปิดไฟหลอดที่ 3" || $message == "Off3" || $message == "ปิดไฟดวงที่ 3" || $message == "ปิดไฟห้องครัว"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟห้องครัวให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "143";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On3#0";
      pubMqtt($Topic,$text);   
      }
   else if($message == "ปิดไฟหลอดที่ 4" || $message == "Off4" || $message == "ปิดไฟดวงที่ 4" || $message == "ปิดไฟหน้าบ้าน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟหน้าบ้านให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "146";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On4#0";
      pubMqtt($Topic,$text);   
      }
    else if($message == "ปิดไฟหลอดที่ 5" || $message == "Off5" || $message == "ปิดไฟดวงที่ 5" || $message == "ปิดไฟหลังบ้าน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟหลังบ้านแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On5#0";
      pubMqtt($Topic,$text);   
      }
    else if($message == "ปิดพัดลม" || $message == "Off6"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดพัดลมให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "619";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On6#0";
      pubMqtt($Topic,$text);   
      }
    else if($message == "ปิดไฟหลอดที่ 7" || $message == "Off7" || $message == "ปิดไฟดวงที่ 7" || $message == "ปิดไฟห้องน้ำ"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดไฟห้องน้ำให้แล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "511";
      replyMsg($arrayHeader,$arrayPostData);
      
      $Topic = "NodeMCU1" ;
      $text = "On7#0";
      pubMqtt($Topic,$text);   
      }
    else if($message == "ปิดไฟหลอดที่ 8" || $message == "Off8" || $message == "ปิดไฟดวงที่ 8" || $message == "ปิดประตูเลื่อน"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สั่งปิดประตูเลื่อนหน้าบ้านแล้วครับ";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "4";
      $arrayPostData['messages'][1]['stickerId'] = "290";
      replyMsg($arrayHeader,$arrayPostData);
      
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
