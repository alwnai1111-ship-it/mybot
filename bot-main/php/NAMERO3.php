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

include ("../../bots/SALEH.php"); 
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$message_id2 = $update->callback_query->message->message_id;
$chat_id2 = $update->callback_query->message->chat->id;
$from_id = $message->from->id;
$nammee = $update->callback_query->from->first_name;
$bot_tele1 = file_get_contents('userstart.json');
$sting = file_get_contents("sting.txt");
$start = file_get_contents("start.txt") ;
$onstart = file_get_contents("onstart.txt");
$setengss = file_get_contents("setengss.txt");
$setengssj = file_get_contents("setengss.txt");
$hadehday = file_get_contents("hadehday.txt");
$hadehdayj = file_get_contents("hadehday.txt");
$sss = file_get_contents('sss.txt');
$bott = bot('getme',['bot'])->result->username;
$alm = file_get_contents('alm.txt');
$ccoinj = file_get_contents("ccoin.txt");
$ccoin = file_get_contents("ccoin.txt");
$$codejj = file_get_contents("codejj.json");
$salesnem = file_get_contents("salesnem.json");
$cccoin = $ccoin;
$sudo = $admin;
$stinggggj = json_decode(file_get_contents("stinggggj.json"),true);
$stingggg = json_decode(file_get_contents("stingggg.json"),true);
$band = array($stingggg['stingggg']['band']);
$stingggi = json_decode(file_get_contents("stingggi.json"),true);
$admins = array($admin,$stingggi['stingggi']['admins']);
$type = $update->message->chat->type;
$u = json_decode(file_get_contents('member.json'),true);
if(!in_array($chat_id, $u) and $type == "private") {
      $u[] = "$chat_id";
      file_put_contents('member.json',json_encode($u));
  }
  $id = $update->inline_query->from->id; 
if(isset($update->inline_query)){
$chat_id = $update->inline_query->chat->id;
$from_id = $update->inline_query->from->id;
$name = $update->inline_query->from->first_name.' '.$update->inline_query->from->last_name;
$text_inline = $update->inline_query->query;
$mes_id = $update->inline_query->inline_message_id; 
$user = strtolower($update->inline_query->from->username); 
}
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
$from_id = $chat_id;
  $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
  $message = $update->message;
 $user = $update->callback_query->from->username;
$sales = json_decode(file_get_contents('sales.json'),true);

$name = $message->from->first_name;
$id=$update->callback_query->from->id;
} 
function save($array){
    file_put_contents('sales.json', json_encode($array));
}
//---------1----


$msharkty = $sales['msh'][$from_id]['modest'];
   $hd = $sales['mrktc'][$from_id]['hd'];
   $th = $sales['mrktc'][$from_id]['th'];
   $mrkt = $sales[$chat_id]['markt'];
   
   $modir = $admin; 
$homse = explode("\n", $bot_tele1);
$name = $update->message->from->first_name;
$id = $message->from->id;

   $mycoin = $sales[$chat_id]['backlect'];
   
   if($msharkty==null){
   	$msharkty = 0;
   }
   
   if($hd==null){
   	$hd = 0;
   }
   
   if($th==null){
   	$th = 0;
   }
   
   if($mrkt==null){
   	$mrkt = 0;
   }
   
   if($mycoin==null){
   	$mycoin = 0;
   }
   
   if($setengssj == null){
   	$setengssj = 1;
   }
   
   if($hadehdayj == null){
   	$hadehdayj = 5;
   }
   
   $hdiatet = $setting["mtgr"]["hdia"];
$thoiltet = $setting["mtgr"]["thoil"];
$kmia = $setting["mtgr"]["kmia"];
if($hdiatet == "✅"){
	$hdiatext = "الهدية اليومية 🎁";
	}
	
	if($thoiltet == "✅"){
	$thoiltext = "تحويل النقاط";
	}
	
	if($alm == null){
	$alm = "لايوجد";
	}
	
	if($kmia == "✅"){
	$kmiatext = "الكميه ➰";
	}
	
	
   
  $setting = json_decode(file_get_contents("setting.json"),true);
if (!file_exists("setting.json")) {
#	$put = [];
$setting["mtgr"]["hdia"]="✅";
$setting["mtgr"]["thoil"]="✅";
$setting["mtgr"]["kmia"]="✅";
file_put_contents("setting.json", json_encode($setting));
}
$thoill =$setting["mtgr"]["thoil"];
$hdia=$setting["mtgr"]["hdia"];
$kmia=$setting["mtgr"]["kmia"];
$modekm=$setting["mtgr"]["kmia"];

$Devv = $admin;
$token = API_KEY;

   
$getmosh1 = file_get_contents("getmosh1.txt");
$getmoshh1 = explode("\n",$getmosh1);
$getmosh = file_get_contents("getmosh.txt");
$getmoshh = explode("\n",$getmosh);
$channels = file_get_contents("channels.txt");
$channel = file_get_contents("channel.txt");
$setcoin1 = file_get_contents("setcoin1.txt");
date_default_timezone_set('Asia/Jordan');
$time = date('h:i a');
$me = bot('getme',['bot'])->result->username;
$sales = json_decode(file_get_contents('sales.json'),1);

if($data == "forall"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• ارسال عدد النقاط المراد ارسالها الى الجميع .",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);   
$sales['mode'] = 'forall';
  save($sales);
  exit;
}
//»»»»»»»»»»»»»»»»»» 

if($text and $sales['mode']  == "forall"){
	$cut = explode("\n",file_get_contents("stats/users.txt"));
	bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
• تم ارسال $text نقطة الى جميع مستخدمين المتجر الخاص بك .

- يمكنك ارسال اذاعة اليهم لكي تخبرهم انك قمت باضافه  $text نقطة الى حساباتهم .
",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);   
for ($i=0; $i < count($cut); $i++) { 
$sales[$cut[$i]]['backlect'] += $text;
$sales['mode'] = null;
save($sales);
}
}

$cut = explode("\n",file_get_contents("stats/users.txt"));
if($data == "delall"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• ارسال عدد النقاط المراد خصمها من الجميع .",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);   
$sales['mode'] = 'delall';
  save($sales);
  exit;
}
//»»»»»»»»»»»»»»»»»» 

if($text and $sales['mode']  == "delall"){
	$cut = explode("\n",file_get_contents("stats/users.txt"));
	bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
• تم خصم $text نقاط من جميع مستخدمين المتجر الخاص بك .
",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);   

for ($i=0; $i < count($cut); $i++) { 
	$sales[$cut[$i]]['backlect'] -= $text;
	$sales['mode'] = null;
  
save($sales);
}
}

if($data == "delto0"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم مسح  تصفير جميع نقاط
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع ",'callback_data'=>"backmk"]],
]])
]);
for ($i=0; $i < count($cut); $i++) { 
$sales[$cut[$i]]['backlect'] = 0;
$sales['mode'] = null;
save($sales);
}
}

if($data == "sendcoin"){
if( $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
   'text'=>"• ارسال الان ايدي الشخص .",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);   ;
  $sales['mode'] = 'chat';
  save($sales);
  exit;
  }
 }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat'){
   if( $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "
• ارسال عدد النقاط المراد ارسالها 
",
  'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);   
   $sales['mode'] = 'poi';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi'){
 if( $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"
• تم ارسال ($text) الي حساب `".$sales['idd']."`
تم إضافة $text نقطة إلى حساب ".$sales['idd']." بنجاح ",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"back"]],
]])
]);   
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"
• تم اضافه ($text) نقاط الى حسابك .
",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['backlect'] += $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}
}
if($data == "takecoin"){
 if( $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
   'text'=>"أرسل أيدي الشخص الذي تريد خصم النقاط منه",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);  
  $sales['mode'] = 'chat1';
  save($sales);
  exit;
  }
 }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat1'){
    if( $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد خصمها",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);   
   $sales['mode'] = 'poi1';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi1'){
  if( $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"
 • تم خصم ($text) نقاط من `".$sales['idd']."`
 
",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);   
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"
  تم خصم ( $text ) من نقاطك .
  ",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['backlect'] -= $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}
}
if($data == "shh"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*- ارسل توجيه من القناة لرساله  او معرف القناة !*
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"مسح القناة وتعطيل النشر ",'callback_data'=>"delandoff"]],
[['text'=>"رجوع ",'callback_data'=>"backmk"]],
]])
]);
file_put_contents("sss.txt","ok");
}
if($data == "delandoff"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*- تم مسح القناة وتعطيل نشر الاثباتات !*
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع ",'callback_data'=>"backmk"]],
]])
]);
file_put_contents("sss.txt",null);
}
if($text and $sss == "ok"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• تم التعين بنجاح",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع ",'callback_data'=>"backmk"]],
]])
]);
file_put_contents("sss.txt","$text");
 }
 if($data == 'alm'){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"• ارسال معرف حسابك او بوت تواصل الخاص بك 📬",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
        [['text'=>'• رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
file_put_contents("alm.txt","ok");
 }
if($text and $alm == "ok"){
 if( $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم الحفظ ✅",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
        [['text'=>'• رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
file_put_contents("alm.txt","$text");
 }
}
  if($data == 'setengss'){
   if( $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"• ارسل عدد النقاط التي يحصل عليها المستخدم من مشاركة الرابط الخاص به .",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
        [['text'=>'• رجوع •','callback_data'=>'back']]
      ]
    ])
  ]);
file_put_contents("setengss.txt","ok");
 }
}
if($text and $setengss == "ok"){
 if( $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• تم الحفظ بنجاح . ",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
        [['text'=>'• رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
unlink('setengss.txt');
file_put_contents("setengss.txt","$text");
 }
}
  if($data == 'hadehday'){
   if( $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"• ارسل عدد النقاط التي بحصل عليها الشخص 📬",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
        [['text'=>'• رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
file_put_contents("hadehday.txt","ok");
  }
 }
if($text and $hadehday == "ok"){
 if( $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" • تم تعين  $text ",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);  
unlink('hadehday.txt');
file_put_contents("hadehday.txt","$text");
 }
}
 
if($data == "toch"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"- مرحباً عزيزي المطور $name 🔥. 

- حساب التواصل : $alm
- عدد النقاط الدخول : $setengssj

- يمكن للعضو ارسال /id لارسال الايدي الخاص به

",
'parse_mode'=>"MARKDOWN",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"تعين حساب التواصل مع المطور",'callback_data'=>"alm"],['text'=>'تعيين عدد نقاط الدخول ','callback_data'=>"setengss"]],
[['text'=>'اضف سلعه','callback_data'=>'add'],['text'=>' حذف سلعة','callback_data'=>'del']],
[['text'=>"ارسال نقاط للكل ",'callback_data'=>"forall"],['text'=>'خصم نقاط للكل','callback_data'=>"delall"]],
[['text'=>'صنع رابط هديه ','callback_data'=>"offerfree"]],
[['text'=>' إرسال نقاط','callback_data'=>"sendcoin"],['text'=>'خصم نقاط','callback_data'=>"takecoin"]],
[['text'=>"الهديه اليوميه : $hdia",'callback_data'=>"hdiamode"],['text'=>'تعيين عدد الهديه','callback_data'=>"hadehday"]],
[['text'=>'تعين عموله التحويل','callback_data'=>"ccoin"],['text'=>"تحويل النقاط : $thoill ",'callback_data'=>"modethoil"]], 
[['text'=>'تعين قناة الاثباتات','callback_data'=>"shh"]],
[['text'=>"كميه السلع المتوفره : $kmia",'callback_data'=>"kmia"]],
[['text'=>'مسح نقاط الجميع','callback_data'=>"delto0"]],
[["text"=>"• رجوع •","callback_data"=>"back"]],
]])
]);   
$stingggi['stingggi']['stingggi'] = null;
$stingggi['stingggi']['id'] = null;
 file_put_contents("stingggi.json",json_encode($stingggi));
$sales['mode'] = null;
  save($sales);
 }
if($data == "backmk"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- مرحباً عزيزي المطور $name 🔥. 

- حساب التواصل : $alm
- عدد النقاط الدخول : $setengssj

- يمكن للعضو ارسال /id لارسال الايدي الخاص به
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"تعين حساب التواصل مع المطور",'callback_data'=>"alm"],['text'=>'تعيين عدد نقاط الدخول ','callback_data'=>"setengss"]],
[['text'=>'اضف سلعه','callback_data'=>'add'],['text'=>' حذف سلعة','callback_data'=>'del']],
[['text'=>"ارسال نقاط للكل ",'callback_data'=>"forall"],['text'=>'خصم نقاط للكل','callback_data'=>"delall"]],
[['text'=>'صنع رابط هديه ','callback_data'=>"offerfree"]],
[['text'=>' إرسال نقاط','callback_data'=>"sendcoin"],['text'=>'خصم نقاط','callback_data'=>"takecoin"]],
[['text'=>"الهديه اليوميه : $hdia",'callback_data'=>"hdiamode"],['text'=>'تعيين عدد الهديه','callback_data'=>"hadehday"]],
[['text'=>'تعين عموله التحويل','callback_data'=>"ccoin"],['text'=>"تحويل النقاط : $thoill ",'callback_data'=>"modethoil"]], 
[['text'=>'تعين قناة الاثباتات','callback_data'=>"shh"]],
[['text'=>"كميه السلع المتوفره : $kmia",'callback_data'=>"kmia"]],
[['text'=>'مسح نقاط الجميع','callback_data'=>"delto0"]],
[["text"=>"• رجوع •","callback_data"=>"back"]],
]])
]);
$stingggi['stingggi']['stingggi'] = null;
$stingggi['stingggi']['id'] = null;
 file_put_contents("stingggi.json",json_encode($stingggi));
$sales['mode'] = null;
  save($sales);
 }

$thoill =$setting["mtgr"]["thoil"];

 

if($data == 'ccoin'){
 if( $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"• ارسل عدد النقاط التي تخصم عند التحويل 📬 ",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
        [['text'=>'• رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
file_put_contents("ccoin.txt","ok");
 }
}
if($text and $ccoin == "ok"){
 if( $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• تم تعين  $text ",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"backmk"]],
]])
]);  
file_put_contents("ccoin.txt","$text");
 }
}
			
if(in_array($data,["modethoil","hdiamode","kmia"]) && $chat_id == $sudo){
    $setting = json_decode(file_get_contents("setting.json"),true);
    $map = [
        "modethoil" => "thoil",
        "hdiamode" => "hdia",
        "kmia"     => "kmia"
    ];
    $key = $map[$data];
    $setting["mtgr"][$key] = ($setting["mtgr"][$key] == "✅") ? "❌" : "✅";
    file_put_contents("setting.json", json_encode($setting));
    bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"- مرحباً عزيزي المطور $name 🔥.

- حساب التواصل : $alm
- عدد النقاط الدخول : $setengssj

- يمكن للعضو ارسال /id لارسال الايدي الخاص به",
        'parse_mode'=>"HTML",
        'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"تعين حساب التواصل مع المطور",'callback_data'=>"alm"],['text'=>'تعيين عدد نقاط الدخول ','callback_data'=>"setengss"]],
                [['text'=>'اضف سلعه','callback_data'=>'add'],['text'=>' حذف سلعة','callback_data'=>'del']],
                [['text'=>"ارسال نقاط للكل ",'callback_data'=>"forall"],['text'=>'خصم نقاط للكل','callback_data'=>"delall"]],
                [['text'=>'صنع رابط هديه ','callback_data'=>"offerfree"]],
                [['text'=>' إرسال نقاط','callback_data'=>"sendcoin"],['text'=>'خصم نقاط','callback_data'=>"takecoin"]],
                [['text'=>"الهديه اليوميه : ".$setting["mtgr"]["hdia"],'callback_data'=>"hdiamode"],['text'=>'تعيين عدد الهديه','callback_data'=>"hadehday"]],
                [['text'=>'تعين عموله التحويل','callback_data'=>"ccoin"],['text'=>"تحويل النقاط : ".$setting["mtgr"]["thoil"],'callback_data'=>"modethoil"]],
                [['text'=>'تعين قناة الاثباتات','callback_data'=>"shh"]],
                [['text'=>"كميه السلع المتوفره : ".$setting["mtgr"]["kmia"],'callback_data'=>"kmia"]],
                [['text'=>'مسح نقاط الجميع','callback_data'=>"delto0"]],
                [["text"=>"• رجوع •","callback_data"=>"back"]],
            ]
        ])
    ]);
}


#56
if($text == "/id"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$chat_id
",
 'parse_mode'=>"MARKDOWN",
'reply_to_message_id'=>$message_id,
]);
}




 if($data == 'add'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'• قم بأرسال اسم السلعة 📬',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'• رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
  $sales['mode'] = 'add';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'add'){
  if( $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحفظ ✅.
~ الان ارسل عدد النقاط ( السعر ) المطلوبة للشراء ، 💸 رقم فقط
',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'• رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
  $sales['n'] = $text;
  $sales['mode'] = 'addm';
  save($sales);
  exit;
 }
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'addm'){
  if( $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
ارسل صوره السلعه يمكنك ارسال اي صوره.!!
",
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'• رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
  $sales['p'] = $text;
  $sales['mode'] = "photo";
  
  save($sales);
  exit;
 }
 }if($text != '/start' and $message->photo != null and $sales['mode'] == 'photo'){
  if( $chat_id == $admin){
  $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,35);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   • تم الحفظ الصورة ✅

- ارسل السلعة الان٬ 🤖

يمكنك ارسال ( ملف او نص او صوره او فيديو )
",
         "parse_mode"=>"markdown"
  ]);
  $dayy_s = array("Sat","Sun","Mon","Tue","Wed","Thu","Fri");
 $dayy_s1 = array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
$dayy_s2 = date('D');
$dayy = str_replace($dayy_s, $dayy_s1, $dayy_s2);
date_default_timezone_set('Asia/Jordan');
$time = date('h:i a');
$year = date('Y');
$month = date('n');
$day = date('j');
  bot('sendMessage',[
   'chat_id'=>$sss,
   'text'=>"
- تم اضافة سلعة جديدة ✅
- من ماركت : [@$me] 🤍

🏷 ¦ السلعة :- *$sales[n]* 📱
💰 ¦ السعر :- *$sales[p]*
📆 ¦ التاريخ :- *$dayy - $year/$month/$day*
",
'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
[['text'=>"بوت الماركت 🤖",'url'=>"https://t.me/$me?start=$chat_id"] ] ] ])
  ]);
  file_put_contents('codejj.json', "\n" . $code ."\n",FILE_APPEND);    
  file_put_contents('salesnem.json', "\n" . $sales[n] . "\n",FILE_APPEND);    
  $sales['sales'][$code]['name'] = $sales['n'];
  $sales['sales'][$code]['price'] = $sales['p'];
  $sales['sales'][$code]['photo'] = $message->photo[0]->file_id;
  $sales['sales'][$code]['caption'] = $message->caption;
  $sales['p'] = null;
  $sales['n'] = null;
  $sales['mode'] = "file";
  $sales["baageel"]=$code;
  save($sales);
  exit;
 }
 }
 
 if($text != '/start'  and $sales['mode'] == 'file'){
  if( $chat_id == $admin){
 if($message->document){
  $file_id=$message->document->file_id;
 $ty="document";
}elseif($message->video){
 $file_id=$message->video->file_id;
 $ty="video";
 }elseif($message->text){
 $file_id=$text;
 $ty="text";
}elseif($message->photo){
 $file_id=$message->photo[0]->file_id;
 $ty="photo";
 }
 $sales['sales'][$sales["baageel"]]['file']=$file_id;
 $sales['sales'][$sales["baageel"]]['file2']=$ty;
 $sales['sales'][$sales["baageel"]]['numbers']='end';
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'• تم الحفظ السلعة ✅.
   
- لتفعيل التسليم التلقائي ؛ 🤖

ارسل عدد مرات بيع السلعة

اذا تريد بيع السلعه للجميع اضغط على لانهائي ',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'• لانهائي • ','callback_data'=>'stengbotttt']]
      ]
    ])
  ]);
  $sales['mode'] = "Numbers";
  save($sales);
  exit;
 }
}
if(is_numeric($text) and $sales['mode'] == 'Numbers'){
	if( $chat_id == $admin){
		 $sales['sales'][$sales["baageel"]]['numbers']= $text;
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'
- تم حفظ عدد مرات بيع السلعة
وتم اضافة السلعه بنجاح ✅
',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- • رجوع •','callback_data'=>'backmk']]
      ]
    ])
  ]);
  $sales['mode'] = "type";
  save($sales);
  exit;
	}
	}
if($data == "stengbotttt"){
 if( $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*
- تم حفظ السلعه لانهائي  ✅
*
",
'parse_mode'=>"MARKDOWN",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"• رجوع •","callback_data"=>"toch"]],
]])
]);   
}
}
 if($data == 'del'){
 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'del×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'• رجوع •','callback_data'=>'backmk']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'اختر السلعة المراد حذفها',
    'reply_markup'=>$json
  ]);
  exit;
 }
 $ex = explode('×',$data);
 if($ex[0] == "del"){
 	if($sales['sales'][$ex[1]] != null){
 	unset($sales['sales'][$ex[1]]);
  $sales['mode'] = null;
  save($sales);
$sales = json_decode(file_get_contents('sales.json'),true);
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'🗑️','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'del×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'• رجوع •','callback_data'=>'backmk']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'

اختر السلعة المراد حذفها الذي تريد حذفها 

',
    'reply_markup'=>$json
  ]);
 }else{
 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>' 🗑️','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'del×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'• رجوع •','callback_data'=>'backmk']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'السلعة غير موجودة يمكنك المحاولة مجددا',
    'reply_markup'=>$json
  ]);
 }
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'del'){
  if( $chat_id == $admin){
  if($sales['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"",
   ]);
  unlink('codejj.json',$text);
  unset($sales['sales'][$text]);
  $sales['mode'] = null;
  save($sales);
  exit;
  } else {
   bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'كود غير صالخ'
   ]);
  }
exit;
}
}
 #---------------
		if(in_array($chat_id,$stingggg['stingggg']['band'])){
	if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"

      ",'reply_to_message_id'=>$message_id,
]);
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"

        ",
]);
		}
		return false;
}
 if(preg_match('/\/(start)(.*)/', $text)){
 $ex = explode(' ', $text);
if($chat_id == $ex[1]){
bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"",]);
     exit;}}
 if(preg_match('/\/(start)(.*)/', $text )){
  $ex = explode(' ', $text);
$okl = bot('getchat',['chat_id'=>$ex[1]])->result->type;
  if(isset($ex[1])){
   if(!in_array($chat_id, $sales[$chat_id]['id'])){
   	if($okl == "private"){
    $sales[$chat_id]['baageel']=$ex[1];
    $sales[$chat_id]['c'] = 'Ok';
    }
    $sales[$chat_id]['id'][] = $chat_id;
    save($sales);
   }
 }

   $bot2 = $setting["mtgr"]["bot"];
$d66 = $setting["mtgr"]["d6"];
   $hdiatet = $setting["mtgr"]["hdia"];
$thoiltet = $setting["mtgr"]["thoil"];
$kmia = $setting["mtgr"]["kmia"];
$d7 = $setting["mtgr"]["d7"];
if($hdiatet == "✅"){
	$hdiatext = "الهدية اليومية 🎁";
	}
	
	if($thoiltet == "✅"){
	$thoiltext = "تحويل النقاط";
	}
	
	if($kmia == "✅"){
	$kmiatext = "الكميه ➰";
	}





	
if(preg_match("/\/(start)/",$text ) and !in_array($chat_id,$homse)){
	$ex = explode(' ', $text);
  if(isset($ex[1])){
	file_put_contents('userstart.json', "\n" . $chat_id . "\n",FILE_APPEND);    
    
  
    $sales[$sales[$chat_id]['baageel']]['backlect'] += $setengssj;
    $sales[$sales[$chat_id]['baageel']]['modest'] += 1;
    $sales['msh'][$from_id]['modest'] += 1;
    $after = $mycoin + $setengssj;
    save($sales);
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
• قمت بالدخول الى الرابط الدعوه الخاص بصديقك وحصل على *$setengssj* نقطه ✨
", 
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
  ]);
    bot('sendMessage',[
     'chat_id'=>$ex[1] ,
     'text'=>"
• قام : [$name](tg://user?id=$from_id) بالدخول الى الرابط الخاص وحصلت على  *$setengssj* نقطه ✨
• عدد نقاطك : $coinafter
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
    ]);
    $sales[$chat_id]['baageel']=0;
    $sales[$chat_id]['id'][] = $chat_id;
    save($sales);
   }
   }
  if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
  $mycoin = $sales[$chat_id]['backlect'];
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"", 
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
   ] 
   ])
  ]);
 }

  if($data == 'zerio'){
  if($sales[$chat_id]['backlect'] == null){
   $sales[$chat_id]['backlect'] = 0;
   save($sales);
   }
   $hdiatet = $setting["mtgr"]["hdia"];
$thoiltet = $setting["mtgr"]["thoil"];
$kmia = $setting["mtgr"]["kmia"];
if($hdiatet == "✅"){
	$hdiatext = "الهدية اليومية 🎁";
	}
	
	if($thoiltet == "✅"){
	$thoiltext = "تحويل النقاط";
	}
	 
	if($kmia == "✅"){
	$kmiatext = "الكميه ➰";
	}
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"",
    'parse_mode'=>"MarkDown",
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     
   ] 
   ])
  ]);
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
$start = "• اهلأ بك عزيزي ([$name](tg://user?id=$from_id)) 👋🏼 .

• البوت مخصص لشراء العروض المقدمه في البوت عن طريق تجميع النقاط ، 💵 .

• قم بأختيار القسم الذي تريده من الكيبورد 👇🏽.";
}
function buildKeyboard($NaMerOset, $name){
global $mycoin, $thoiltext, $hdiatext, $kmiatext;
$keyboard = ["inline_keyboard" => []];
$keyboard["inline_keyboard"][] = [['text'=>'العروض التي يقدمها البوت ✨','callback_data'=>'sales']]; 
$keyboard["inline_keyboard"][] = [['text'=>"عدد نقاطك : $mycoin",'callback_data'=>'nis'],['text'=>'تجميع النقاط','callback_data'=>'ra1']]; 
$keyboard["inline_keyboard"][] = [['text'=>'معلومات حسابك','callback_data'=>'about'],['text'=>"$thoiltext",'callback_data'=>'refccoin']];
$keyboard["inline_keyboard"][] = [['text'=>"$hdiatext",'callback_data'=>'kk']]; 

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

if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$start,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>buildKeyboard($NaMerOset, $name)
]);
}

if($data == "zerio"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$start,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>buildKeyboard($NaMerOset, $name)
]);
}
function backKeyboard(){
return json_encode([
'inline_keyboard'=>[
[['text'=>'• رجوع •','callback_data'=>'zerio']]
]
]);
} 
if($S_P_P1 and isset($NaMerOset["azrar"][$S_P_P1]["text"])){
$army = $NaMerOset["azrar"][$S_P_P1]["text"];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$army,
'disable_web_page_preview'=>true,
'reply_markup'=>backKeyboard()
]);
} 

 if($data == "nis") {
 bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
'text'=>"
عدد نقاطك : $mycoin
",
 'show_alert'=>true,
]); 
}
$me = bot('getme',['bot'])->result->username;
$d = date('D');
$day = explode("\n",file_get_contents($d.".txt"));
$fakyou = file_get_contents("fakyou.txt");
$dayurl = explode("\n",file_get_contents($d."url.txt"));
if($d == "Sat"){
unlink("Fri.txt");
}
if($d == "Sun"){
unlink("Sat.txt");
}
if($d == "Mon"){
unlink("Sun.txt");
}
if($d == "Tue"){
unlink("Mon.txt");
}
if($d == "Wed"){
unlink("The.txt");
}
if($d == "Thu"){
unlink("Wed.txt");
}
if($d == "Fri"){
unlink("Thu.txt");
}
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}

if($data == "offerfree"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
• ارسال عدد النقاط المراد وضعها في الهدية .
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>'• رجوع •','callback_data'=>"zerio"]],
]])
]);
   file_put_contents("fakyou.txt","offerfree");
           }
           if(is_numeric($text) and $fakyou == "offerfree"){
            $cod = substr(str_shuffle('abrffsswa67890swj1259nnzm80jwjd95nz5807'),1,40);
            bot('sendmessage',[
      'chat_id'=>$chat_id,
   'text'=>"
• تم صنع رابط هدية بقيمة $text نقطة   

• الرابط : https://t.me/$me?start=zune=$cod

• الرابط صالح لمده 15
      ",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
     [['text'=>'• تعطيل الرابط • ','callback_data'=>"coulk"]],
     ]])
     ]);
     file_put_contents($cod.".txt",$cod."\n".$text);
     file_put_contents($d.'.txt',$cod."\n",FILE_APPEND);
     unlink("fakyou.txt");
            }
            if(preg_match("/^\/(start)(.*)/s",$text)){

$ex1 = explode(' ',$text);
 $ex = explode('=',$ex1[1]);
if($ex[0] == "zune"){
$cood = explode("\n",file_get_contents($ex[1].".txt"));
$coin = $cood[1];
 if(in_array($ex[1],$day)){
 if(is_file($ex[1].'.txt')){
 	$my_coin = $sales[$chat_id]['backlect'];
 	$coinby2 = $my_coin + $coin;
  bot('sendmessage',[
   'chat_id'=>$admin,
   'text'=>"
   • تم اضافة $coin نقاط الي حساب $from_id ✅
• بواسطه رابط الهدية الخاص بك :
 https://t.me/$me?start=$ex[1]

   ",'parse_mode'=>"MarkDown"]);
    bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   • تم اضافة $coin نقاط الي حسابك ✅
• بواسطه رابط الهدية من قبل مدير البوت 

• اصبحت نقاطك : $coinby2

   
   ",'reply_to_message_id'=>$message_id
]);
unlink($ex[1].'.txt');
$sales[$from_id]['backlect'] += $coin;
save($sales);
sleep(1);
  }else{
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
- الرابط غير صحيح او انتهت مدة الرابط !
   ",'reply_to_message_id'=>$message_id,]);
   }
  }else{
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
- الرابط غير صحيح او انتهت مدة الرابط !
   ",'reply_to_message_id'=>$message_id,]);
   }
 }
}

    if($data == "about"){
bot('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,
        'text'=>'انتضر قليلاً من فضلك',
      ]);
      sleep (1);
for($i = 0;$i <= count($sttingsid)-1;$i++){
$fromid = $sttingsid[$i]; 
$membr=json_decode(file_get_contents("data/$fromid.json"),true);
if($membr[$fromid]["l"] > 0){
$move["bob"][$fromid] =$membr[$fromid]["l"];
file_put_contents("data/$from_id.json",json_encode($move,128|34|256)); 
}
}
$array = [];

foreach($move["bob"] as $key => $value){
$array[$key] = $value;
}
$txt = null;
for($i=1;$i<=5;$i++){
if(!empty($array)){
$arrayValues = array_values($array);
$maxKey = array_search(max($arrayValues),$arrayValues);
$member = array_keys($array)[$maxKey];
$count = $arrayValues[$maxKey];
$kk = array("1","2","3","4","5");
$kk1 = array("🥇","🥈","🥉","🏅","🏅");
$ii = str_replace($kk, $kk1, $i);
$k = $membr[$member]['s']; 
$txt .= "$ii :($count) -> [$member](tg://user?id=$member)\n";
unset($array[$member]);
}
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*• مرحبا بك في معلومات حسابك في بوت المتجر 🌀*

- عدد نقاط حسابك : *$mycoin*

- عدد عمليات التحويل التي قمت بها : *$th*
- عدد الهدايا اليومية التي جمعتها : *$hd*
- عدد السلع التي شتريتها : *$mrkt*
- عدد مشاركاتك لرابط الدعوة : *$msharkty*


• المستخدمين الاكثر مشاركة لرابط الدعوى : 
$txt
"
, 
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' رابط الدعوة ' ,'callback_data'=>"ra1"]],
[['text'=>'رجوع' ,'callback_data'=>"zerio"]],
]])
]);
unset($move["bob"]);
file_put_contents("data/$from_id.json",json_encode($move,128|34|256)); 
}
unset($move["bob"]);
file_put_contents("data/$from_id.json",json_encode($move,128|34|256)); 

    if($data == "ra1"){
bot('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,
        'text'=>'انتضر قليلاً من فضلك',
      ]);
      sleep (1);
for($i = 0;$i <= count($sttingsid)-1;$i++){
$fromid = $sttingsid[$i]; 
$membr=json_decode(file_get_contents("data/$fromid.json"),true);
if($membr[$fromid]["l"] > 0){
$move["bob"][$fromid] =$membr[$fromid]["l"];
file_put_contents("data/$from_id.json",json_encode($move,128|34|256)); 
}
}
$array = [];

foreach($move["bob"] as $key => $value){
$array[$key] = $value;
}
$txt = null;
for($i=1;$i<=5;$i++){
if(!empty($array)){
$arrayValues = array_values($array);
$maxKey = array_search(max($arrayValues),$arrayValues);
$member = array_keys($array)[$maxKey];
$count = $arrayValues[$maxKey];
$kk = array("1","2","3","4","5");
$kk1 = array("🥇","🥈","🥉","🏅","🏅");
$ii = str_replace($kk, $kk1, $i);
$k = $membr[$member]['s']; 
$txt .= "$ii :($count) -> [$member](tg://user?id=$member)\n";
unset($array[$member]);
}
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*انسخ الرابط ثم قم بمشاركته مع اصدقائك 📥 .*

• كل شخص يقوم بالدخول ستحصل على $setengssj نقطه

*- بإمكانك عمل اعلان خاص برابط الدعوة الخاص بك*

~ رابط الدعوة : [https://t.me/$me?start=$chat_id] 


*• مشاركتك للرابط : 0 🌀*

*• المستخدمين الاكثر مشاركة لرابط الدعوى :*
"
, 
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• مشاركة مع اصدقائك •' ,'switch_inline_query'=>"zune"]],
[['text'=>'رجوع' ,'callback_data'=>"zerio"]],
]])
]);
unset($move["bob"]);
file_put_contents("data/$from_id.json",json_encode($move,128|34|256)); 
}
 if($data == "zune"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
افضل بوت متجر سلع في التليكرام 😉🌸
اسعار رخصيه جدا 👍🏻
*

https://t.me/$bott?start=$chat_id
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"دخول للبوت",'url'=>"https://t.me/$bott?start=$chat_id"]],
]
])
]);
} 
    if($data == "refccoin"){
bot('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,
        'text'=>'انتضر قليلاً من فضلك',
      ]);
      sleep (1);
for($i = 0;$i <= count($sttingsid)-1;$i++){
$fromid = $sttingsid[$i]; 
$membr=json_decode(file_get_contents("data/$fromid.json"),true);
if($membr[$fromid]["l"] > 0){
$move["bob"][$fromid] =$membr[$fromid]["l"];
file_put_contents("data/$from_id.json",json_encode($move,128|34|256)); 
}
}
$array = [];

foreach($move["bob"] as $key => $value){
$array[$key] = $value;
}
$txt = null;
for($i=1;$i<=3;$i++){
if(!empty($array)){
$arrayValues = array_values($array);
$maxKey = array_search(max($arrayValues),$arrayValues);
$member = array_keys($array)[$maxKey];
$count = $arrayValues[$maxKey];
$kk = array("0","0","0","0","0");
$kk1 = array("🥇","🥈","🥉","🏅","🏅");
$ii = str_replace($kk, $kk1, $i);
$k = $membr[$member]['s']; 
$txt .= "$ii :($count) -> [$member](tg://user?id=$member)\n";
unset($array[$member]);
}
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
بمكنك تحويل عدد من النقاط الى شخص اخر من هنا  🌐

- فقط ارسل ايدي الشخص وتحت عدد النقاط

- عموله التحويل : *$ccoin*
"
, 
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع' ,'callback_data'=>"zerio"]],
]])
]);
unset($move["bob"]);
file_put_contents("data/$from_id.json",json_encode($move,128|34|256)); 
}

 $addcoin = explode("\n",$text);
  $getchat = bot('getchat',['chat_id'=>$addcoin[0]])->ok;
  if($addcoin[0] and $addcoin[1]){
   $b = str_replace('-','',$addcoin[1]);
if(!preg_match("/(-)/", $addcoin[1]) and is_numeric($addcoin[1])){
   if($getchat == "true"){
    $ccoin = $addcoin[1] + $cccoin;
    if($sales[$chat_id]['backlect'] >= $ccoin){
     $sales[$chat_id]['backlect'] -= $ccoin;
     $sales['mrktc'][$from_id]['th'] += 1;
     $sales[$addcoin[0]]['backlect'] += $addcoin[1];
     save($sales);
     bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text' =>"
• تم خصم ".$addcoin[1]." مـن نقاطك

تم تحويل النقاط الي : ".$addcoin[0]."

💸 ¦ نقاطك الان ".$sales[$chat_id]['backlect']." نقطة 
 ",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• رجوع •","callback_data"=>"back"]],
    ]]),'reply_to_message_id'=>$message_id,
]);
 bot('sendmessage',[
 'chat_id'=>$addcoin[0], 
 'text' =>"
• تم اضافة ".$addcoin[1]." نقاط الي حسابك ✅
• بواسطه : $from_id

• اصبحت نقاطك : *".$sales[$addcoin[0]]['backlect']."*
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
]);
     }else{
      bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text' =>"• ليس لديك هذه القدر من النقاط 🚫!
 ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• رجوع •","callback_data"=>"zerio"]],
    ]]),'reply_to_message_id'=>$message_id,
]);
      }
    }else{
     bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text' =>"الشخص قام بحضر البوت او ليس موجود بالبوت
 ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• رجوع •","callback_data"=>"zerio"]],
    ]]),'reply_to_message_id'=>$message_id,
]);
     }
   }else{
    bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text' =>"
 $error404
 ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"• رجوع •","callback_data"=>"back"]],
    ]]),'reply_to_message_id'=>$message_id,
]);
bot('sendmessage',[
 'chat_id'=>$admin, 
 'text' =>"$error4040
 هناك شخص حاول استخدلم كلج ولكن خصمت منه 5 نقاط
 ",'parse_mode'=>"MarkDown",
]);
$sales[$chat_id]['backlect'] -= 5;
save($sales);

    }
   }   
   
elseif($data == 'sales' and $sales['sales'] == null){
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
- لا يوجد اي عروض الان ✨
*

",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"zerio"]],
]
])
]);
}

 elseif($data == 'sales' and $sales['sales'] !== null){
$kmia = $setting["mtgr"]["kmia"];
	if($kmia == "✅"){
	$kmiatext = "الكميه ➰";
	}
 
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>"$kmiatext",'callback_data'=>'s'],['text'=>'السعر 💵','callback_data'=>'s'],['text'=>'الاسم ℹ','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
  if($ex[1]==$sales["sales"][$code]["type"])	{
    $ap=$sales["sales"][$code]["apps"];
    
    
   
   
 $a= $sales["sales"][$code]["numbers"];
  if($a == 'end'){
  $a="♾️";
  }else{
  $a=" - $a";
  }
  
  
   $reply_markup['inline_keyboard'][] = [['text'=>"$a",'callback_data'=>$code],['text'=>$sale['price'],'callback_data'=>$code],['text'=>$sale['name'],'callback_data'=>$code]];
  }}
if($sales[$chat_id]['backlect'] == null){
   $sales[$chat_id]['backlect'] = 0;
   save($sales);
  }
$reply_markup['inline_keyboard'][] = [['text'=>'- العروض التي يمكنك شرائها -','callback_data'=>'sales']];  
$reply_markup['inline_keyboard'][] = [['text'=>'بحث عن سلعه','callback_data'=>'search']];
$reply_markup['inline_keyboard'][] = [['text'=>'• رجوع •','callback_data'=>'zerio']];
  $reply_markup = json_encode($reply_markup);
  bot('editMessageText',[	

   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>'- العروض التي يقدمها البوت ، 🔥
   ',
   'reply_markup'=>($reply_markup)
  ]);
  $sales[$chat_id]['mode'] = null;
   save($sales);
   exit;
 } elseif($data == 'yes'){
  $price = $sales['sales'][$sales[$chat_id]['mode']]['price'];
$name = $sales['sales'][$sales[$chat_id]['mode']]['name'];
$file=$sales['sales'][$sales[$chat_id]['mode']]['file'];
$file2=$sales['sales'][$sales[$chat_id]['mode']]['file2'];
$mah = $sales[$chat_id]['numbercount'];
  bot('sendmessage',[
  "chat_id"=>$chat_id,
    "text"=>"
- تم خصم $price من نقاطك

*- السلعة الخاصة بك هيه :*
",
'parse_mode'=>"MarkDown",
  ]);
  if($file2=="text"){
  	bot("sendmessage",[
  "chat_id"=>$chat_id,
  "$file2"=>$file
  ]);
    bot('sendmessage',[
  "chat_id"=>$chat_id,
    "text"=>"
    ",
    'parse_mode'=>"MarkDown",
  "message_id"=>$message_id
  ]);
  }else{	
bot("send$file2",[
  "chat_id"=>$chat_id,
  "$file2"=>$file,
  'parse_mode'=>"MarkDown",
  ]);
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>" 
	",
	'parse_mode'=>"MarkDown",
  	]);
 } 
$dayy_s = array("Sat","Sun","Mon","Tue","Wed","Thu","Fri");
 $dayy_s1 = array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
$dayy_s2 = date('D');
$dayy = str_replace($dayy_s, $dayy_s1, $dayy_s2);
date_default_timezone_set('Asia/Jordan');
$time = date('h:i a');
$year = date('Y');
$month = date('n');
$day = date('j');
    $userbot = "{$getMe->username}";
    $userb = strtoupper($userbot);
    	bot('sendmessage',[
	'chat_id'=>$sss,
	'text'=>"
- تم تسـ📦ـليم طلب جديد ✅
- من ماركت : [@$me] 🤍

🏷 ¦ السلعة :- *$name* 📱
💰 ¦ السعر :- *$price*
📆 ¦ التاريخ :- *$dayy - $year/$month/$day*

- معلومات المُشتري 👤 :-
🏷 ¦ الاسم :- [$nammee](tg://user?id=$chat_id)
🆔 ¦ الأيدي :- $chat_id", 
'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				[
['text'=>"بوت الماركت 🤖",'url'=>"https://t.me/$me?start=$chat_id"]
   ],
   
                     ]
               ])
  	]);
  bot('sendmessage',[
   'chat_id'=>$admin,
   'text'=>"
- اسم شخص : [$name](tg://openmessage?user_id=$chat_id) 
- ايدي الشخص : `$chat_id`
* - قام بشراء $name بسعر $price *

*- تم تسليم السلعة تلقائيا*
",
'parse_mode'=>"MarkDown",
  ]);
  $sales[$chat_id]['markt'] += 1;
  $sales[$chat_id]['backlect'] -= $price;
  if($sales['sales'][$sales[$chat_id]['mode']]['numbers'] != 'end'){
  if($sales['sales'][$sales[$chat_id]['mode']]['numbers'] == 0 or $sales['sales'][$sales[$chat_id]['mode']]['numbers'] == 1){
  	unset($sales['sales'][$sales[$chat_id]['mode']]);
  }else{
  	$sales['sales'][$sales[$chat_id]['mode']]['numbers'] -=1;
  }
  }$sales[$chat_id]['mode'] = null;
  save($sales);
  exit;
 } else {
   if($data == 's') { exit; }
   $price = $sales['sales'][$data]['price'];
   $name = $sales['sales'][$data]['name'];
   $caption = $sales['sales'][$data]['caption'];
   if($caltion == null){
   	$caption = "سلعه ";
   }
   if($price != null){
    if($price <= $sales[$chat_id]['backlect']){
     bot('sendphoto',[
      'chat_id'=>$chat_id,
      'photo'=>$sales['sales'][$data]['photo'],
      'caption'=>"
      
      • اسم السلعة : $name
• وصف السلعة : $caption

• سعر السلعة الحالي : $price
• حاله توفر السلعة : عند طلب 

طريقة التسليم : تلقائي ✨

- انت متأكد من شراء ؟


",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
        [['text'=>'نعم ، 🔥','callback_data'=>"yes"],['text'=>'لا 🚫','callback_data'=>"zerio"]],
       ] 
      ])
     ]);
     $sales[$chat_id]['mode'] = $data;
     save($sales);
     exit;
    } else {
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>" نقاطك غير كافية 🚫

",
      'show_alert'=>true
     ]);
    }
   }
 }
if($data=="search"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
• اكتب اسم السعة المراد البحث عنها  🌐
*
",
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>" رجوع  🔙",'callback_data'=>"sales"]],
    ] 
   ])
  ]);
  $sales[$chat_id]["mode"]="search";
  save($sales);
  exit;
}
if($sales[$chat_id]["mode"]=="search"){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
انتضر قليلا ؛ 🔄
",
  ]);
  
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'الكمية ♾️','callback_data'=>'s'],['text'=>'السعر 💰','callback_data'=>'s'],['text'=>'إسم السلعة 🏷️','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
  if(preg_match("/$text/",$sale["name"])||preg_match("/$text/",$name)){
  $co=$sales["sales"][$code]["country"];
  $ap=$sales["sales"][$code]["apps"];
  $a= $sales["sales"][$code]["numbers"];
  if($a == 'end'){
  $a="♾️";
  }
   $reply_markup['inline_keyboard'][] = [['text'=>"$a",'callback_data'=>$code],['text'=>$sale['price'],'callback_data'=>$code],['text'=>$sale['name'],'callback_data'=>$code]];
  }}
if($sales[$chat_id]['backlect'] == null){
   $sales[$chat_id]['backlect'] = 0;
   save($sales);
  }
$reply_markup['inline_keyboard'][] = [['text'=>'بحث عن سلعه','callback_data'=>'search']];
$reply_markup['inline_keyboard'][] = [['text'=>'• رجوع •','callback_data'=>'back']];
  $reply_markup = json_encode($reply_markup);
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>'
•حسناا عزيزي لديك جميع السلع التي تحمل الاسم
- اضغط على السلعة لعرض محتواها ⚙
',
   'reply_markup'=>($reply_markup)
  ]);
  $sales[$chat_id]["mode"]="";#ماعرف شنو
  save($sales);
  exit;
}
$ary = array($admin);
$id = $message->chat->id;
$admins = in_array($id,$ary);
$data = $update->callback_query->data;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cut = explode("\n",file_get_contents("stats/users.txt"));
$users = count($cut)-0;
$mode = file_get_contents("stats/bc.txt");
#Start code 

if ($update && !in_array($id, $cut)) {
    mkdir('stats');
    file_put_contents("stats/users.txt", $id."\n",FILE_APPEND);
  }

  
$d = date('D');
$day = explode("\n",file_get_contents($d.'.txt'));
if($d == "Sat"){
unlink("Fri.txt");
}
if($d == "Sun"){
unlink("Sat.txt");
}
if($d == "Mon"){
unlink("Sun.txt");
}
if($d == "Tue"){
unlink("Mon.txt");
}
if($d == "Wed"){
unlink("The.txt");
}
if($d == "Thu"){
unlink("Wedtxt");
}
if($d == "Fri"){
unlink("Thu.txt");
}
$from_id = $update->callback_query->from->id;
  if($data == "kk"){ 
  if(!in_array($from_id,$day)){
  	bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text'=>"
• لقد حصلت على $hadehdayj نقاط هدية يومية 🎁
    ",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>' • رجوع • ','callback_data'=>'zerio']]    
            ]
        ])
        ]);
$sales[$from_id]['backlect'] += $hadehdayj;
$sales['mrktc'][$from_id]['hd'] += 1;
save($sales);
file_put_contents($d.'.txt',$from_id."\n",FILE_APPEND);

}else{
	bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text'=>"
*• لقد حصلت على الهدية مسبقا , انتظر يوم واعد المحاولة !*
    ",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>' • رجوع • ','callback_data'=>'zerio']]    
            ]
        ])
        ]);
}
}
?>
