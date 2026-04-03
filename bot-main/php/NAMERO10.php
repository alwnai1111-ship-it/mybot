<?php
ob_start();
$token = "@s_P_p1"; # Token
$tokensan3 = "@NameroBots"; # Token
$admin = file_get_contents("admin.txt");
$sudo = array("$admin","5180881216");
$Df = $admin;
$infobot=explode("\n",file_get_contents("info.txt"));
$usernamebot=$infobot['1'];
$no3mak=$infobot['6'];
define('API_KEY',$token);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

function sendAction($chat_id, $action) {
    bot('sendchataction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}

function objectToArrays($object) {
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_vars($object);
    }
    return array_map('objectToArrays', $object);
}

include ("../../bots/SALEH.php"); 
  
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
if (!file_exists("data/$from_id")) {
    mkdir("data/$from_id", 0777, true);
}

$ali = file_get_contents("data/$from_id/ali_rahim");
$to = file_get_contents("data/$from_id/token.txt");
$url = file_get_contents("data/$from_id/url.txt");

$ch = "@NameroBots";

if($text == "/start"){
    if (!file_exists("data/$from_id/ali_rahim")) {
        file_put_contents("data/$from_id/ali_rahim","none");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
    
    sendAction($chat_id, 'typing');
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"اهـلا بـك فـي بـوت عـمـل webhook ⚙",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
                [['text'=>"⚙ انـشـاء webhook"],['text'=>"ℹ️ مـعـلـومـات الـتـوكـن"]],
                [['text'=>"❌ حـذف webhook"]]
            ]
        ])
    ]);
}
elseif($text == "↪️ رجـوع"){
    file_put_contents("data/$from_id/ali_rahim","no");
    file_put_contents("data/$from_id/token.txt","no");
    file_put_contents("data/$from_id/url.txt","no");
    
    sendAction($chat_id, 'typing');
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"تـم الـعـودة لـلـرئـيـسـيـة ✔️",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
                [['text'=>"⚙ انـشـاء webhook"],['text'=>"ℹ️ مـعـلـومـات الـتـوكـن"]],
                [['text'=>"❌ حـذف webhook"]]
            ]
        ])
    ]);
}
elseif($text == "⚙ انـشـاء webhook"){
    sendAction($chat_id, 'typing');
    file_put_contents("data/$from_id/ali_rahim","to");
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"حـسـنـا عـزيـزي ارسـل الـتـوكـن الــان 🔖",
        'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
                [['text'=>"↪️ رجـوع"]]
            ]
        ])
    ]);
}
elseif($ali == "to"){
    $token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    
    if ($ok != 1) {
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"خـطـا فـي الـتـوكـن اعـد الـمـحـاولـة 😕"
        ]);
    } else {
        file_put_contents("data/$from_id/ali_rahim","url");
        file_put_contents("data/$from_id/token.txt",$text);
        sendAction($chat_id,'typing');
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"حـسنا عـزيزي! ارسـل رابـط المـلف الـان",
        ]);
    }
}
elseif($ali == "url"){
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text)) {
        sendAction($chat_id,'typing');
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"حـدث خـطـا! رسـائـل مـتـعـدده 🤯",
        ]);
    } else {
        file_put_contents("data/$from_id/url.txt",$text);
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"انـتـضـر قـلـيـلا ،، ⏳",
        ]);
        
        $to = file_get_contents("data/$from_id/token.txt");
        $url = file_get_contents("data/$from_id/url.txt");
        
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"
هل انت متاكد من عمل webhook ⁉️

• التوكن
- $to

• رابط الملف
- $text

اضـغـط /Yes لـلـتـاكـيـد 📛",
        ]);
    }
}
elseif($text == "/Yes" ){
    if($to != "no"){
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"انـتـضـر قـلـيـلا ،، ⏳",
        ]);
        
        file_get_contents("https://api.telegram.org/bot$to/setwebhook?url=$url");
        
        sleep(2);
        file_put_contents("data/$from_id/ali_rahim","no");
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"تـم عـمـل webhook بـنـجـاح ✔️",
            'parse_mode'=>'MarkDown',
            'reply_markup'=>json_encode([
                'resize_keyboard'=>true,
                'keyboard'=>[
                    [['text'=>"⚙ انـشـاء webhook"],['text'=>"ℹ️ مـعـلـومـات الـتـوكـن"]],
                    [['text'=>"❌ حـذف webhook"]]
                ]
            ])
        ]);
    }
}

elseif($text == "ℹ️ مـعـلـومـات الـتـوكـن" ){
    file_put_contents("data/$from_id/ali_rahim","token");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"حـسـنـا عـزيـزي ارسـل الـتـوكـن الــان 🔖",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↪️ رجـوع']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "token"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        SendMessage($chat_id, "خـطـا فـي الـتـوكـن اعـد الـمـحـاولـة 😕");
    } else{
    file_put_contents("data/$from_id/ali_rahim","no");
    
	SendAction($chat_id,'typing');
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"انـتـضـر قـلـيـلا ،، ⏳",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"
📝 مـعـلـومـات الـتـوكـن هـي :
• مـعـرف الـبـوت
- @$un 
• ايـدي الـبـوت
- $id
• اسـم الـبـوت
- $fr
• رابـط الـمـلـف
- $ur
",
  ]);
}
}
elseif($text == "❌ حـذف webhook" ){
    file_put_contents("data/$from_id/ali_rahim","del");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"حـسـنـا عـزيـزي ارسـل الـتـوكـن الــان 🔖",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↪️ رجـوع']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "del"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        SendMessage($chat_id, "خـطـا فـي الـتـوكـن اعـد الـمـحـاولـة 😕");
    } else{
    file_put_contents("data/$from_id/ali_rahim","no");
    
	SendAction($chat_id,'typing');
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"انـتـضـر قـلـيـلا ،، ⏳",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"انـتـضـر قـلـيـلا ،، ⏳",
  ]);
}
file_get_contents("https://api.telegram.org/bot$text/deletewebhook");
sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"تـم حـذف webhook بـنـجـاح ✔️",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/ali_rahim","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"تـم الـعـودة لـلـرئـيـسـيـة ✔️",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"⚙ انـشـاء webhook"],['text'=>"ℹ️ مـعـلـومـات الـتـوكـن"]],
	[['text'=>"❌ حـذف webhook"]]
	]
	])
	]);
}


