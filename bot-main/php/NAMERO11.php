<<?php
ob_start();
$token = "@s_P_p1"; # Token
$tokensan3 = "@NameroBots"; # Token
$admin = file_get_contents("admin.txt");
$sudo = array("$admin","6704860429");
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

require ("../../bots/SALEH.php"); 
  


// الملف برمجه المبرمج ناميرو كامل لا تغيير الحقوق لاني مش هسامح اي حدا ليوم الدين
// القناه @bots_5
# المعرف @S_P_P1
$update = json_decode(file_get_contents('php://input'));
if ($update->message) {
    $message = $update->message;
    $message_id = $message->message_id;
    $chat_id = $message->chat->id;
    $title = $message->chat->title;
    $text = $message->text;
    $user = $message->from->username;
    $name = $message->from->first_name;
    $from_id = $message->from->id;
    $lang = $message->from->language_code;
    $audio = $message->audio; $audio_file_id = $audio->file_id ?? null;
    $video = $message->video; $video_file_id = $video->file_id ?? null;
    $voice = $message->voice; $voice_file_id = $voice->file_id ?? null;
    $photo = $message->photo; $photo_file_id = $photo[0]->file_id ?? null;
    $sticker = $message->sticker; $sticker_file_id = $sticker->file_id ?? null;
    $contact = $message->contact;
    $contact_number = $contact->phone_number ?? null;
    $contact_name = $contact->first_name ?? null;
    $video_note = $message->video_note; $video_note_file_id = $video_note->file_id ?? null;
    $document = $message->document;
    $document_name = $document->file_name ?? null;
    $document_file_id = $document->file_id ?? null;
    $gif = $message->animation; $gif_file_id = $gif->file_id ?? null;
    $pin = $message->pinned_message;
    $pin_id = $pin->from->id ?? null;
    $pin_first_name = $pin->from->first_name ?? null;
    $pin_tag = $pin_first_name ? "[$pin_first_name](tg://user?id=$pin_id)" : null;
    $inline = $message->reply_markup->inline_keyboard ?? null;
    $entities = $message->entities ?? null;
    $location = $message->location; $location_file_id = $location->file_id ?? null;
}
if ($update->callback_query) {
    $callback = $update->callback_query;
    $data = $callback->data;
    $chat_id = $callback->message->chat->id;
    $title = $callback->message->chat->title;
    $message_id = $callback->message->message_id;
    $name = $callback->from->first_name;
    $user = $callback->from->username;
    $from_id = $callback->from->id;
}
// الملف برمجه المبرمج ناميرو كامل لا تغيير الحقوق لاني مش هسامح اي حدا ليوم الدين
// القناه @bots_5
# المعرف @S_P_P1
$title = $message->chat->title;
 $usrbot = bot("getme")->result->username;
$emoji ="" ;
$emoji = explode ("\n", $emoji) ;
$b = $emoji[rand(0,4)];
$NamesBACK = "رجوع $b" ;
define("USR_BOT",$usrbot); 
mkdir("bbot") ;
mkdir("bbot/". USR_BOT) ;
mkdir("bbot/". USR_BOT. "/BACKUP") ;
$bbot=json_decode(file_get_contents("bbot/".USR_BOT."/bbot.json"),1);
function SETJSON($INPUT){
    if ($INPUT != NULL || $INPUT != "") {
        $F = "bbot/".USR_BOT."/bbot.json";
        $N = json_encode($INPUT, JSON_PRETTY_PRINT);     
        file_put_contents($F, $N);
        sleep(1);
    }
}

 if(!preg_match("/-/", $chat_id)) {
 $chis = $bbot[$from_id]["ch"]??"لم يتم التعيين ⭕" ;
 $chis = "`$chis`" ;
 $emo = $bbot[$from_id]["emo"]??"❤️" ;
 $emo = "*$emo*" ;
 $klish = $bbot[$from_id]["klish"]??"يجب عليك الاشتراك للتمكن من التصويت ℹ️" ;
 $rshq = $bbot[$from_id]["rshq"]??"❌" ;
 $ish = $bbot[$from_id]["ish" ]??"✅" ;
 $klish = "*$klish*" ;
 if(!$rshq) { $bbot[$from_id]["rshq"] = "❌" ; SETJSON($bbot);
 } 
 
$update = json_decode(file_get_contents("php://input"));
$message = $update->message ?? null;
$callback = $update->callback_query ?? null;
if($message){
$chat_id = $message->chat->id;
$text = $message->text ?? "";
$from_id = $message->from->id; 
$name = $message->from->first_name;
}
if($callback){
$data = $callback->data;
$chat_id = $callback->message->chat->id; 
$message_id = $callback->message->message_id;
$from_id = $callback->from->id;
$name = $callback->from->first_name; 
}
$S_P_P1 = $data ?? $text; 
if(!empty($NaMerOset["wellcom"])){
$start = $NaMerOset["wellcom"];
} else {
$start = "• مرحبا بك عزيزي [$name] في بوت مسابقات ناميرو ❤
----------------------------
❤]- الايموجي : $emo
🧬]- قناة الاشتراك الاجباري : $chis
📝]- كليشة الاشتراك الاجباري : $klish
ℹ️]- اشعار التصويت : $ish
🛍]- استخدام الرشق : $rshq 
";
}
function buildKeyboard($NaMerOset, $name){
$keyboard = ["inline_keyboard" => []];
$keyboard["inline_keyboard"][] = [
['text' => $name, 'callback_data' => 'jghhg']
];
if (!empty($NaMerOset["azrari"])) {
$row = [];
foreach ($NaMerOset["azrari"] as $i => $btn) {
$row[] = ['text' => $btn, 'callback_data' => $btn];
if (count($row) == 2) { 
$keyboard["inline_keyboard"][] = $row;
$row = [];
}
}
if (!empty($row)) {
$keyboard["inline_keyboard"][] = $row;
}
}
return json_encode($keyboard);
}
 
 if($text == "/start") {
 	bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"$start", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
           [['text'=>"تسجيل اسم متسابق 👩‍💻",'callback_data'=>"Namero" ]],  
           [['text'=>" كليشة الاشتراك الاجباري 📝",'callback_data'=>"klish" ],['text'=> "معلومات اكثر ⚠️","callback_data"=>"NAMERO"]], 
           [['text'=>"تعيين قناة الاشتراك 📤",'callback_data'=>"setcha" ], ['text'=>"تعيين الاموجي ❤",'callback_data'=>"emo" ]], 
           [['text'=>" استخدام الرشق 🧬",'callback_data'=>"rshq" ], ['text'=>"$rshq",'callback_data'=>"@S_P_P1" ]],  
           [['text'=>"اخطار التصويت ℹ️",'callback_data'=>"ish" ],['text'=>"$ish",'callback_data'=>"@S_P_P1" ]], 
           [['text'=>"خصم تصويتات 🛍",'callback_data'=>"xasm" ]],  
      ]
    ])
]); return false ;
}

if($data == "back") {
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"$start ", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
           [['text'=>"تسجيل اسم متسابق 👩‍💻",'callback_data'=>"Namero" ]],  
           [['text'=>" كليشة الاشتراك الاجباري 📝",'callback_data'=>"klish" ],['text'=> "معلومات اكثر ⚠️","callback_data"=>"NAMERO"]], 
           [['text'=>"تعيين قناة الاشتراك 📤",'callback_data'=>"setcha" ], ['text'=>"تعيين الاموجي ❤",'callback_data'=>"emo" ]], 
           [['text'=>" استخدام الرشق 🧬",'callback_data'=>"rshq" ], ['text'=>"$rshq",'callback_data'=>"@S_P_P1" ]],  
           [['text'=>"اخطار التصويت ℹ️",'callback_data'=>"ish" ],['text'=>"$ish",'callback_data'=>"@S_P_P1" ]], 
           [['text'=>"خصم تصويتات 🛍",'callback_data'=>"xasm" ]],  
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				if($data == "ish" or $data == "rshq" ) {
					
					if($bbot[$from_id][$data] == "✅" or $bbot[$from_id][$data] == null) {
						$bbot[$from_id][$data] = "❌" ;
						SETJSON($bbot) ;
						} else {
							$bbot[$from_id][$data] = "✅" ;
							SETJSON($bbot) ;
							} 
							
							$rshq = $bbot[$from_id]["rshq"]??"❌" ;
 $ish = $bbot[$from_id]["ish"]??"✅" ;
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"$start ", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
           [['text'=>"تسجيل اسم متسابق 👩‍💻",'callback_data'=>"Namero" ]],  
           [['text'=>" كليشة الاشتراك الاجباري 📝",'callback_data'=>"klish" ],['text'=> "معلومات اكثر ⚠️","callback_data"=>"NAMERO"]], 
           [['text'=>"تعيين قناة الاشتراك 📤",'callback_data'=>"setcha" ], ['text'=>"تعيين الاموجي ❤",'callback_data'=>"emo" ]], 
           [['text'=>" استخدام الرشق 🧬",'callback_data'=>"rshq" ], ['text'=>"$rshq",'callback_data'=>"@S_P_P1" ]],  
           [['text'=>"اخطار التصويت ℹ️",'callback_data'=>"ish" ],['text'=>"$ish",'callback_data'=>"@S_P_P1" ]], 
           [['text'=>"خصم تصويتات 🛍",'callback_data'=>"xasm" ]],  
      ]
    ])
]); 
return false ;
				} 
	
						
if($data == "NAMERO") {
    bot('editMessagetext', [
        'message_id'=>$message_id,
        'chat_id'=>$chat_id,
        'text'=>"
🌟 *مرحبًا بك في بوت مسابقات ناميرو!* 🌟

📝 *ما هو بوت المسابقات؟*  
بوت مسابقات ناميرو يساعدك في إنشاء مسابقات تفاعلية تعتمد على الإعجابات والتصويتات، مع ميزات قوية مثل:
  
🔹 **تصويت بالإعجاب** 👍  
🔹 **إدارة المسابقات بسهولة** 🏆  
🔹 **إشعارات تلقائية لأصحاب المنشورات** 📢  
🔹 **نظام اشتراك إجباري في القنوات** 📌  
🔹 **منع التصويت المزدوج باستخدام IP** 🚫  
🔹 **إمكانية خصم التصويتات** ❌  
🔹 **واجهة سهلة وجميلة** 🎨  

⚙️ *إعدادات البوت:*  
💬 *الإيموجي:* $emo  
📢 *قناة الاشتراك:* $chis  
📜 *كليشة الاشتراك:* $klish  
🔔 *إشعار التصويت:* $ish  
🚀 *استخدام الرشق:* $rshq  

✏️ **للمزيد من الإعدادات، استخدم الأزرار أدناه:**
",
        'parse_mode'=>"markdown",
        'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🔙 العودة", 'callback_data'=>"back"]],
            ]
        ])
    ]);

    $bbot[$from_id]["mode"] = $data;
    SETJSON($bbot);
    return false;
}																
		if($data == "klish") {
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
ارسل كليشة الاشتراك الاجباري التي تريد وضعها .
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				if($text and $bbot[$from_id]["mode"] == "klish") {
					bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم حفظ الكليشة بنجاح
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["klish"] = $text;
$bbot[$from_id]["mode"] = null ;
SETJSON($bbot) ;
return false ;
					} 
if ($data == "Namero") { 
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "📝 *أرسل الآن الاسم الذي تريد تسجيله في المسابقة.*\n\n🎭 *يمكنك إرسال:* (نص، صورة، فيديو، ماركدون جاهز).",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true
    ]);
    $bbot[$from_id]["mode"] = "waiting_for_name"; 
    SETJSON($bbot);
    return false;
}		
 if($data == "xasm") {
    bot('editMessagetext', [
    'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
ارسل كود المنشور الان  مثل

67048604296704860429
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				if(is_numeric($text) and $bbot[$from_id]["mode"] == "xasm") {
					
					if(!$bbot[$text]["name"]) {
						bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• يبدو ان الكود خاطء تأكد من الكود 

- الكود عباره عن الكود الذي يعطيك يا بعد ارسال اسم المتسابق للبوت
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
  exit;
} 
						
						$f=strlen(strval($from_id)) + 1;
						for($i=0;$i<$f;$i++){
							$s=$s.$text[$i] ;
							} 
						if ($f == $s) {
						bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• يبدو ان هذا المتسابق ليس بمسابقتك ✅
$s
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
						exit;
						} 
						$b = $bbot[$text]["name"] ;
						$v = $bbot[$text]["like"] ;
					bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم وجود المتسابق ارسل عدد الاصوات لخصمها من الشخص
- $b 
- اصواته. : $v
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["xasm"] = $text;
$bbot[$from_id]["mode"] = "S2" ;
SETJSON($bbot) ;
return false ;
					} 
					
					
					
					if(is_numeric($text) and $bbot[$from_id]["mode"] == "S2") {
						$v = $bbot[$bbot[$from_id]["xasm"]]["name"] ;
						bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم خصم العدد ($text) من $v.
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 

$inline = $bbot[$from_id]["xasm"];
mkdir("msabg") ;
	mkdir("msabg/". USR_BOT ) ;
	mkdir("msabg/". USR_BOT. "/". $inline) ;
	$fileName = "msabg/". USR_BOT. "/".$inline."/v.txt";
$fileContent = file_get_contents($fileName);
$lines = explode("\n", $fileContent);
$linesToRemove = 30;
$updatedContent = implode("\n", array_slice($lines, $linesToRemove));
file_put_contents($fileName, $updatedContent);



$text1 = $bbot[$bbot[$from_id]["xasm"]]["like"]-$text ;
$bbot[$bbot[$from_id]["xasm"]]["like"] = $text1 ;
$bbot[$from_id]["mode"] = null ;
SETJSON($bbot) ; 
return false ;
						} 
if ($data == "emo") {
    bot('editMessagetext', [
        'message_id' => $message_id,
        'chat_id' => $chat_id,
        'text' => "📝 أرسل الإيموجي الذي تريد حفظه.",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "⬅️ رجوع", 'callback_data' => "back"]]
            ]
        ])
    ]);
    $bbot[$from_id]["mode"] = "emo";
    SETJSON($bbot);
    return false;
}
if (isset($bbot[$from_id]["mode"]) && $bbot[$from_id]["mode"] == "emo") {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ تم حفظ الإيموجي بنجاح!",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "⬅️ رجوع", 'callback_data' => "back"]]
            ]
        ])
    ]);
    $bbot[$from_id]["emo"] = $text;
    $bbot[$from_id]["mode"] = null;
    SETJSON($bbot);
    return false;
}
				// الملف برمجه المبرمج ناميرو كامل لا تغيير الحقوق لاني مش هسامح اي حدا ليوم الدين
// القناه @bots_5
# المعرف @S_P_P1
if($data == "setcha") {
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
قم برفع البوت ادمن في القناة ومن ثم ارسل توجيه من القناة .
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				if($update->message->forward_from_chat->id and $bbot[$from_id]["mode"] == "setcha" ) {
					$mt = json_encode(bot('getChatMember', ['chat_id' => $update->message->forward_from_chat->id, 'user_id' => IDBot]));
		$nt = json_decode($mt, true);
		if ($nt['result']['status'] == "administrator") {
			bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم حفظ القناة بنجاح
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["ch"] = $update->message->forward_from_chat->id;
$bbot[$from_id]["mode"] = null ;
SETJSON($bbot) ;
return false ;
			} else {
				bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• البوت ليس ادمن في القناة
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
return false ;
				} 
					} 
					
					
					if($text) {
						
			if($bbot[$from_id]["ch"] == null) {
				
				if($update->message->chat->type != "private") {
						exit;
						} 
				
				bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"- تعيين قناة الاشتراك الاجباري -",'callback_data'=>"setcha" ]], 
       
      ]
    ])
]);
}

if ($text || isset($message->photo) || isset($message->video)) {
    if (empty($bbot[$from_id]["ch"])) {
        if ($update->message->chat->type != "private") {
            exit;
        }

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "📌 *عليك تعيين قناة الاشتراك الإجباري أولًا!*",
            'parse_mode' => "markdown",
            'disable_web_page_preview' => true,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => "➕ تعيين قناة الاشتراك", 'callback_data' => "setcha"]]
                ]
            ])
        ]);
        return false;
    }
}

if (isset($bbot[$from_id]["mode"]) && $bbot[$from_id]["mode"] == "waiting_for_name") {
    $rnd = rand(1234567, 7654321);
    $content = null;
    if (!empty($text)) {
        $content = $text;
    } elseif (isset($message->photo)) {
        $photo = end($message->photo)->file_id;
        bot('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => $photo,
            'caption' => "✅ *تم تسجيل هذه الصورة في المسابقة!*",
            'parse_mode' => "markdown"
        ]);
        $content = $photo;
    } elseif (isset($message->video)) {
        $video = $message->video->file_id;
        bot('sendVideo', [
            'chat_id' => $chat_id,
            'video' => $video,
            'caption' => "✅ *تم تسجيل هذا الفيديو في المسابقة!*",
            'parse_mode' => "markdown"
        ]);
        $content = $video;
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "⚠️ *الرجاء إرسال نص، صورة، أو فيديو فقط.*",
            'parse_mode' => "markdown"
        ]);
        return false;
    }

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ *تم إنشاء الكود بنجاح!*",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true
    ]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
• `@".bot("getme")->result->username." ".$from_id."$rnd`
",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "• اضغط هنا للمشاركة  🔗", 'switch_inline_query' => "$from_id$rnd"]]
            ]
        ])
    ]);

    $bbot[$from_id . $rnd] = [
        "like" => 0,
        "name" => $content,
        "emo" => isset($emo) ? $emo : "",
        "klish" => isset($klish) ? $klish : "",
        "ch" => isset($chis) ? $chis : "",
        "ish" => isset($ish) ? $ish : "",
        "own" => $from_id,
        "rshq" => isset($rshq) ? $rshq : ""
    ];
    
    $bbot[$from_id]["mode"] = null;
    SETJSON($bbot);
    return false;
}
			} 
			

} 
		
			
			$cuser = $update->callback_query->from->username;
$cid = $update->callback_query->from->id;
$data = $update->callback_query->data;
$inline = $update->inline_query->query;
$username = $update->inline_query->from->username;
if($inline){
$ex = $bbot[$inline]["name"];
$like = $bbot[$inline]["like"];
$emo = str_replace("*", null, $bbot[$inline]["emo"]) ;
if($emo and $ex) {
$user = trim($ex[0],"@");
$wh = str_replace($ex[0], $wh, $inline);
bot('answerInlineQuery',[
'inline_query_id'=>$update->inline_query->id,    
'results' => json_encode([[
'type'=>'article',
'id'=>base64_encode(rand(5,555)),
'title'=>"اضغط هنا للارسال المتسابق في القناه 📤", 'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"$ex"],
'reply_markup'=>['inline_keyboard'=>[
                    [['text' => '>>>', 'callback_data' => "remove_vote%$inline%$user_id"], ['text' => "$like $emo", 'callback_data' => "liked%$inline"], ['text' => '<<<', 'callback_data' => "next%$inline"]]
]]
]])
]);
}else{
	exit;
	} 
}

$d = explode("%", $data);
if ($d[0] == "liked") {
    $inline = $d[1];
    $ex = $bbot[$inline]["name"];
    $like = $bbot[$inline]["like"];
    $chx = str_replace("*", null, $bbot[$inline]["ch"]);
    $own = str_replace("*", null, $bbot[$inline]["own"]);
    $klish = str_replace("*", null, $bbot[$inline]["klish"]);
    $emo = str_replace("*", null, $bbot[$inline]["emo"]);
    if ($emo && $ex) {
        $getChatMemberReq = file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=" . $chx . "&user_id=" . $from_id);
        $getChatMemberRes = json_decode($getChatMemberReq, true);

        if ($getChatMemberRes['result']['status'] == "left") {
            bot('answerCallbackQuery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => $klish,
                'show_alert' => true,
            ]);
            return false;
        }
        if ($update->callback_query->from->language_code != "ar" && $bbot[$inline]["rshq"] == "❌") {
            bot('answerCallbackQuery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "عذرا ولكن التصويت بحسابات en ممنوع في المسابقه ✅",
                'show_alert' => true,
            ]);
            return false;
        }
$lan = $update->callback_query->from->language_code;
mkdir("msabg");
mkdir("msabg/" . USR_BOT);
mkdir("msabg/" . USR_BOT . "/" . $inline);
$Z = "msabg/" . USR_BOT . "/" . $inline . "/v.txt";
$IP_FILE = "msabg/" . USR_BOT . "/" . $inline . "/ips.txt";
$ip = file_get_contents("https://api64.ipify.org?format=json");
$ip = json_decode($ip, true)['ip'];
$votes = file_exists($Z) ? file($Z, FILE_IGNORE_NEW_LINES) : [];
$ips = file_exists($IP_FILE) ? file($IP_FILE, FILE_IGNORE_NEW_LINES) : [];

if ($d[0] == "remove_vote") {
    $from_id = $d[2];
    $votes = array_diff($votes, [$from_id]);
    file_put_contents($Z, implode("\n", $votes));
    $ips = array_diff($ips, [$ip]);
    file_put_contents($IP_FILE, implode("\n", $ips));
    bot('answerCallbackQuery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "❌ تم حذف تصويتك بنجاح!",
        'show_alert' => false,
    ]);

    return false;
}

if (!in_array($from_id, $votes)) {
    bot('answerCallbackQuery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "تم تسجيل اعجابك بنجاح ♥",
        'show_alert' => false,
    ]);

    $db_id = $update->callback_query;
    $in_id = $db_id->inline_message_id;
    $like++;

    bot('editMessageReplyMarkup', [
        'inline_message_id' => $in_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => '>>>', 'callback_data' => "remove_vote%$inline%$from_id"], ['text' => "$like $emo", 'callback_data' => "liked%$inline"], ['text' => '<<<', 'callback_data' => "next%$inline"]]
            ]
        ])
    ]);

    if ($bbot[$inline]["ish"]) {
        bot('sendMessage', [
            'chat_id' => $own,
            'text' => "
• تصويت جديد على المنشور ($emo) :
$ex ♥
----------------
- اسم المستخدم : [$name](tg://user?id=$from_id)
- ايدي المستخدم : `$from_id` 
- معرف المستخدم :[$user] 
- لغه الجهاز : $lan
----------------------------
• عدد الاصوات الكلي : $like
",
            'parse_mode' => "markdown",
            'disable_web_page_preview' => true,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => '❌ خصم التصويت', 'callback_data' => "remove_vote%$inline%$from_id"]]
                ]
            ])
        ]);
    }

    $bbot[$inline]["like"] = $like;
    SETJSON($bbot);
    file_put_contents($Z, file_get_contents($Z) . "\n$from_id");
    file_put_contents($IP_FILE, file_get_contents($IP_FILE) . "\n$ip");
} else {
    bot('answerCallbackQuery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "⚠️ لا يمكنك التصويت أكثر من مرة بنفس الجهاز!",
        'show_alert' => true,
    ]);
    bot('sendMessage', [
        'chat_id' => $own,
        'text' => "
🚨 **تحذير! محاولة تصويت مزدوج 🚨**
- اسم المستخدم : [$name](tg://user?id=$from_id)
- ايدي المستخدم : `$from_id`
- معرف المستخدم :[$user] 
- لغه الجهاز : $lan

⚠️ هذا المستخدم حاول التصويت أكثر من مرة بنفس الجهاز!",
        'parse_mode' => "markdown",
        'disable_web_page_preview' => true
    ]);
}
}} 

if ($d[0] == "prev" || $d[0] == "next") {
    bot('answerCallbackQuery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "اضغط على زر التصويت لتسجيلك 🩴",
        'show_alert' => true
    ]);
    return false;
}
if ($d[0] == "remove_vote") {
    $inline = $d[1];
    $user_id = $d[2];
    $vote_file = "msabg/" . USR_BOT . "/" . $inline . "/v.txt";
    $ip_file = "msabg/" . USR_BOT . "/" . $inline . "/ips.txt";
    $votes = file_exists($vote_file) ? file($vote_file, FILE_IGNORE_NEW_LINES) : [];
    $ips = file_exists($ip_file) ? file($ip_file, FILE_IGNORE_NEW_LINES) : [];
    if (in_array($user_id, $votes)) {
        $bbot[$inline]["like"] -= 1;
        file_put_contents($vote_file, implode("\n", array_diff($votes, [$user_id])));
        file_put_contents($ip_file, implode("\n", array_diff($ips, [$user_id]))); 
        SETJSON($bbot);
        bot('answerCallbackQuery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ تم خصم التصويت بنجاح.",
            'show_alert' => true
        ]);
        bot('sendMessage', [
            'chat_id' => $user_id,
            'text' => "⚠️ لقد تم خصم تصويتك على المنشور ($emo) بواسطة الإدارة.",
            'parse_mode' => "markdown"
        ]);
    } else {
        bot('answerCallbackQuery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "⚠️ لا يوجد تصويت لهذا المستخدم ليتم خصمه.",
            'show_alert' => true
        ]);
    }
}
if ($d[0] == "remove_vote") {
    $inline = $d[1];
    $user_id = $d[2];
    $vote_file = "msabg/" . USR_BOT . "/" . $inline . "/v.txt";
    $votes = file_exists($vote_file) ? file($vote_file, FILE_IGNORE_NEW_LINES) : [];
    if (in_array($user_id, $votes)) {
        $bbot[$inline]["like"] -= 1;
        file_put_contents($vote_file, implode("\n", array_diff($votes, [$user_id])));
        bot('answerCallbackQuery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ تم سحب تصويتك بنجاح.",
            'show_alert' => true
        ]);
        $db_id = $update->callback_query;
        $in_id = $db_id->inline_message_id;
        $like = $bbot[$inline]["like"];
        bot('editMessageReplyMarkup', [
            'inline_message_id' => $in_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => '>>>', 'callback_data' => "remove_vote%$inline%$user_id"], ['text' => "$like $emo", 'callback_data' => "liked%$inline"], ['text' => '<<<', 'callback_data' => "next%$inline"]]
                ]
            ])
        ]);

        SETJSON($bbot);
    } else {
        bot('answerCallbackQuery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "⚠️ لا يوجد تصويت لك ليتم سحبه!",
            'show_alert' => true
        ]);
    }
}

// الملف برمجه المبرمج ناميرو كامل لا تغيير الحقوق لاني مش هسامح اي حدا ليوم الدين
// القناه @bots_5
# المعرف @S_P_P1
