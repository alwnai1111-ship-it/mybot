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
$start = "• اهلا بك عزيزي 
• في بوت حماية القنوات والمجموعات من التفليش بالازالة من الادمنيه وفضحه في القناه والخاص 
- ارفع البوت ادمن في القناه واعطه كل الصلاحيات وسيعمل بشكل جيد
----------------------------
";
}
function buildKeyboard($NaMerOset, $name){
$keyboard = ["inline_keyboard" => []];
$keyboard["inline_keyboard"][] = [["text"=>"~ قنواتي ومجموعاتي ~","callback_data"=>"mychannel"]]; 
$keyboard["inline_keyboard"][] = [["text"=>"~ اضف قناة او مجموعة ~","callback_data"=>"addgroup"]]; 
$keyboard["inline_keyboard"][] = [["text"=>"~ تعليمات البوت ~","callback_data"=>"help"]]; 
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

if($data == "home"){
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
[['text'=>'• رجوع •','callback_data'=>'home']]
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



$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$bot = '@'.bot('getme',['bot'])->result->username;
$bot_id = bot('getme', [])->result->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data     = $update->callback_query->data;
### dev @S_P_P1 @iii4040 @bots_5 ###
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$messageid = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$data = $update->callback_query->data;
$from_id = $update->message->from->id;
$from_id2 = $update->callback_query->from->id;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$bi = "@yy30bot";
$sttings = json_decode(file_get_contents("ann.json"),true);
$chanelat = json_decode(file_get_contents("Channel.json"),true);
 $mychannel = json_decode(file_get_contents("mychannel.txt"),true)?? Null;
if($mychannel != Null ){
$x = $mychannel;
}
### dev @S_P_P1 @iii4040 @bots_5 ###

# لا تنسي حقوق المبرمج ناميرو او صالح @s_p_p1
@$statjson = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$text&user_id=".$from_id),true);
@$status = $statjson['result']['status'];
@$statjsonn = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$from_id),true);
@$statuss = $statjsonn['result']['status'];
$message_id2 = $update->callback_query->message->message_id;
$from_id = $update->message->from->id;
$from_id2 = $update->callback_query->from->id;
$message_id2 = $update->callback_query->message->message_id;
$sttings = json_decode(file_get_contents("SETT.txt"),1);
$rt = $update->message->reply_to_message;
$re_id = $update->message->reply_to_message->from->id;
$re_name = $update->message->reply_to_message->from->first_name;
$first_name = $update->message->from->first_name;
$channeladmin = json_decode(file_get_contents("admin.txt"),1);
$up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$chat_id),true);
$result = $up['result'];
foreach($result as $key=>$value){
$found = $result[$key]['status'];
if($found == "creator"){
$owner = $result[$key]['user']['id'];
$owner2 = $result[$key]['user']['username'];
}
}
### dev @S_P_P1 @iii4040 @bots_5 ###
if($text == "/start"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>""
,"reply_markup"=>json_encode([
'inline_keyboard'=>[
]
])
]);
Unset($sttings["$from_id"]);
Unset($sttings["data"]["$from_id"]);
unset($sttings["data$from_id"]);
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}

if($text and $sttings["data$from_id"] == "addgroup"){
 if($status == "creator"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• تم الحفظ بنجاح ✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]]
]
])
]);
$x["$from_id"][] = "$text";
file_put_contents("mychannel.txt",json_encode($x,128|34|256));
unset($sttings["data$from_id"]);
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}else{
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• اما ان البوت ليس ادمن في القناة او انك لست مالك القناة او المجموعة",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]]
]
])
]);
unset($sttings["data$from_id"]);
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}}
if($data == "addgroup"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"• يجب رفع البوت اولا ادمن في المجموعة
لو القناة قبل ارسال المعرف او الايدي
----------------------------
• ارسل معرف قناه / المجموعة @ 
• او الايدي للخاص -100
• او معرف القناة او الايدي
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]]
]
])
]);
$sttings["data$from_id2"] = "addgroup";
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}
if($data == "help"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"اهلا بك البوت يقوم بحفظ قناتك او مجموعتك من التفليش من قبل المشرفين بالازالة .
ملاحظات مهمة يجب ان يتم رفع
 المشرفين في القناة او المجموعة من خلال البوت 
رفع مشرف في القناة من خلا البوت يتم من خاص البوت قسم قنواتي ومجموعاتي قسم اعداد وتقوم بالضغط على رفع مشرف وتقوم بارسال ايدي المشرف تأكد من منح البوت كل الصلاحيات ليعمل بنجاح .
سيقوم البوت بتنزيل اي مشرف يقوم بتنزيل عضو واحد او طرده من مجموعتك او قناتك وسيتم الاشعار في خاصك مع رسالة تحتوي على امكانية اعادة رفع المشرف.

• المطور : @iii4040
• مطور 2 @S_P_P1
• قناه المطور: @bots_5
"
,"reply_markup"=>json_encode([
'inline_keyboard'=>[
[["text"=>"•رجوع ","callback_data"=>"home"]],
]
])
]);}
if($data == "home"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>""
,"reply_markup"=>json_encode([
'inline_keyboard'=>[
]
])
]);
Unset($sttings["$from_id2"]);
Unset($sttings["data"]["$from_id2"]);
unset($sttings["data$from_id2"]);
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}
### dev @S_P_P1 @iii4040 @bots_5 ###

# لا تنسي حقوق المبرمج ناميرو او صالح @s_p_p1

if($data == 'mychannel'){
$mychannel = json_decode(file_get_contents("mychannel.txt"),true)?? Null;
if($mychannel != Null ){
$x = $mychannel;
}
if($x["$from_id2"] != null){
$keyboard["inline_keyboard"]=[];
for($i=0;$i<count($x["$from_id2"]);$i++){
$js = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=".$x["$from_id2"][$i]),1);
$id = $js["result"]["id"];
$na = $js["result"]["title"];
$keyboard["inline_keyboard"][$i] = [['text'=>$x["$from_id2"][$i],'callback_data'=>"."],['text'=>"• اعداد ",'callback_data'=>"getadmin#".$x["$from_id2"][$i]]];
}
$keyboard["inline_keyboard"][] = [['text'=>"• رجوع",'callback_data'=>'back']];
$reply_markup = json_encode($keyboard); 
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
• اهلا بك في قائمه  قنواتك
",
'reply_markup'=>$reply_markup,
]);
}
else
{
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"• *لم تقم باضافة قنوات او مجموعات *",'parse_mode'=>"Markdown",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"• رجوع",'callback_data'=>'back']],
]])
]);
}
}
$ex = explode("#",$data);
### dev @S_P_P1 @iii4040 @bots_5 ###

# لا تنسي حقوق المبرمج ناميرو او صالح @s_p_p1
if($ex[0] == "getadmin"){
$up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$ex[1]),true);
  $result = $up['result'];
  foreach($result as $key=>$value){
    $found = $result[$key]['status'];
    if($found == "creator"){
      $owner = $result[$key]['user']['first_name'];
	  $owner2 = $result[$key]['user']['id'];}
if($found == "administrator"){
if($result[$key]['user']['first_name'] == true){
$innames = str_replace(['[',']'],'',$result[$key]['user']['first_name']);
$msg = $msg."\n"."اسم القناه "."[{$innames}](tg://user?id={$result[$key]['user']['id']})\n• الايدي `{$result[$key]['user']['id']}`";
}
  }
}
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*
- اهلا بك عزيزي المالك اليك قائمة المشرفين *
----------------------------
• المالك ~ $owner 
• الايدي ~ $owner2

$msg
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"رفع مشرف ","callback_data"=>"x#$ex[1]"],["text"=>"تنزيل مشرف","callback_data"=>"y#$ex[1]"]], 
[["text"=>" رجوع","callback_data"=>"home"]],
]
])
]);
}
if($ex[0] == "x"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*• اهلا بك عزيزي المالك 
• ارسل ايدي المشرف لرفعه في القناة او المجموعه *",'parse_mode'=>'markdown','disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]],
]
])
]);
$sttings["$from_id2"]=$ex[1];
$sttings["data"]["$from_id2"]="up";
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}
### dev @S_P_P1 @iii4040 @bots_5 ###

# لا تنسي حقوق المبرمج ناميرو او صالح @s_p_p1
if($ex[0] == "y"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*• اهلا بك عزيزي المالك 
• ارسل ايدي المشرف لتنزيله في القناة او المجموعه *",'parse_mode'=>'markdown','disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]],
]
])
]);
$sttings["$from_id2"]=$ex[1];
$sttings["data"]["$from_id2"]="down";
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}
### dev @S_P_P1 @iii4040 @bots_5 ###
if($text and $sttings["data"]["$from_id"]=="down"){
$js = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=".$sttings["$from_id"]),1);
$id = $js["result"]["id"];
$na = $js["result"]["title"];
$tc = $js["result"]["type"];
$get = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=".$sttings["$from_id"]."&user_id=". $bot_id),true);
$ge = $get["result"]["can_promote_members"];
if($ge == true){

if($tc == "channel"){
bot('promoteChatMember',[
'user_id'=>$text,
'chat_id'=>$sttings["$from_id"],
"can_invite_users"=>false,
"can_change_info"=>false,
"can_promote_members"=>false,
"can_restrict_members"=>false,
"can_manage_voice_chats"=>false,
"can_edit_messages"=>false,
"can_delete_messages"=>false,
"can_manage_chat"=>false,
"is_anonymous"=>false,
"can_post_messages"=>false,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
• تم تنزيله مشرف* $text
•  في [$na](tg://user?id=$id) 
----------------------------
*- بواسطة* [$first_name](tg://user?id=$from_id) 
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]],
]
])
]);
Unset($sttings["$from_id"]);
Unset($sttings["data"]["$from_id"]);
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}else{
bot('restrictChatMember',[
'user_id'=>$text,
'chat_id'=>$sttings["$from_id"],
'can_post_messages'=>true,
'can_add_web_page_previews'=>false,
'can_send_other_messages'=>true,
'can_send_media_messages'=>true,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
• تم تنزيله مشرف* $text
•  في [$na](tg://user?id=$id) 
----------------------------
*• بواسطة* [$first_name](tg://user?id=$from_id) 
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]],
]
])
]);
Unset($sttings["$from_id"]);
Unset($sttings["data"]["$from_id"]);
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}}}
### dev @S_P_P1 @iii4040 @bots_5 ###

# لا تنسي حقوق المبرمج ناميرو او صالح @s_p_p1
if($text and $sttings["data"]["$from_id"]=="up"){
$js = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=".$sttings["$from_id"]),1);
$id = $js["result"]["id"];
$na = $js["result"]["title"];
$tc = $js["result"]["type"];
$get = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=".$sttings["$from_id"]."&user_id=". $bot_id),true);
$ge = $get["result"]["can_promote_members"];
if($ge == true){
if($tc == "channel"){
bot('promoteChatMember',[
 'chat_id'=>$sttings["$from_id"],
'user_id'=>$text,
 "can_invite_users"=>true,
"can_change_info"=>false,
"can_restrict_members"=>true,
'can_promote_members'=>false,
"can_manage_voice_chats"=>false,
"can_edit_messages"=>true,
"can_delete_messages"=>false,
"can_manage_chat"=>true,
"is_anonymous"=>false,
"can_post_messages"=>true,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
• تم رفعه مشرف* $text
•  في [$na](tg://user?id=$id) 
----------------------------
*• بواسطة* [$first_name](tg://user?id=$from_id) 
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]],
]
])
]);
Unset($sttings["$from_id"]);
Unset($sttings["data"]["$from_id"]);
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}else{
bot('promoteChatMember',[
 'chat_id'=>$sttings["$from_id"],
'user_id'=>$text,
 'can_change_info'=>True,
'can_delete_messages'=>True,
'can_invite_users'=>True,
'can_restrict_members'=>True,
'can_pin_messages'=>True,
'can_promote_members'=>false,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
• تم رفعه مشرف* $text
•  في [$na](tg://user?id=$id) 
----------------------------
*• بواسطة* [$first_name](tg://user?id=$from_id) 
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]],
]
])
]);
Unset($sttings["$from_id"]);
Unset($sttings["data"]["$from_id"]);
file_put_contents("SETT.txt",json_encode($sttings,128|34|256));
}}}
if($text and $sttings["data"]["$from_id"]=="up"){
$get = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=".$sttings["$from_id"]."&user_id=". $bot_id),true);
$ge = $get["result"]["can_promote_members"];
if($ge != true){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
• خطاء البوت لا يمتلك صلاحية رفع مشرفين ❌
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]],
]
])
]);
}}
### dev @S_P_P1 @iii4040 @bots_5 ###

# لا تنسي حقوق المبرمج ناميرو او صالح @s_p_p1
if($update->chat_member->new_chat_member->status == "kicked" and $statuss != 'creator'){
$how = $update->chat_member->from->id;
$houe = $update->chat_member->from->username;
$hona = $update->chat_member->from->first_name;
$tii = $update->chat_member->chat->title;
$tiid = $update->chat_member->chat->id;
$js = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$tiid"),1);
$id = $js["result"]["id"];
$na = $js["result"]["title"];
$tc = $js["result"]["type"];
if($tc == "channel"){
bot('sendmessage',[
'chat_id'=>$tiid,
'text'=>"
اهلا بك عزيزي مالك قناة
----------------------------
• $tii  ~  $tiu 
• الايدي ~ $how 
• الاسم ~ $hona
• المعرف ~ @$houe
----------------------------
• حاول ازالة اشخاص وقمت بتنزيلة وانذارك 🤚
"  ,
]);
bot('promoteChatMember',[
'user_id'=>$how,
'chat_id'=>$tiid,
"can_invite_users"=>false,
"can_change_info"=>false,
"can_promote_members"=>false,
"can_restrict_members"=>false,
"can_manage_voice_chats"=>false,
"can_edit_messages"=>false,
"can_delete_messages"=>false,
"can_manage_chat"=>false,
"is_anonymous"=>false,
"can_post_messages"=>false,
]);
$up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$tiid),true);
$result = $up['result'];
foreach($result as $key=>$value){
$found = $result[$key]['status'];
if($found == "creator"){
$owner = $result[$key]['user']['id'];
$owner2 = $result[$key]['user']['username'];
}
}
bot('sendmessage',[
'chat_id'=>$owner,
'text'=>"
اهلا بك عزيزي مالك قناة
----------------------------
• $tii  ~  $tiu 
• الايدي ~ $how 
• الاسم ~ $hona
• المعرف ~ @$houe
----------------------------
• حاول ازالة اشخاص وقمت بتنزيلة وانذارك 🤚
"  ,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"• اعادة رفع ~ ⚙","callback_data"=>"reup#$how&$tiid"]]
]
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$tiid,
'text'=>"
اهلا بك عزيزي مالك قناة
----------------------------
• $tii  ~  $tiu 
• الايدي ~ $how 
• الاسم ~ $hona
• المعرف ~ @$houe
----------------------------
• حاول ازالة اشخاص وقمت بتنزيلة وانذارك 🤚
"  ,
]);
bot('restrictChatMember',[
'user_id'=>$how,
'chat_id'=>$tiid,
'can_post_messages'=>true,
'can_add_web_page_previews'=>false,
'can_send_other_messages'=>true,
'can_send_media_messages'=>true,
]);
$up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$tiid),true);
$result = $up['result'];
foreach($result as $key=>$value){
$found = $result[$key]['status'];
if($found == "creator"){
$owner = $result[$key]['user']['id'];
$owner2 = $result[$key]['user']['username'];
}
}
bot('sendmessage',[
'chat_id'=>$owner,
'text'=>"
ااهلا بك عزيزي مالك قناة
----------------------------
• $tii  ~  $tiu 
• الايدي ~ $how 
• الاسم ~ $hona
• المعرف ~ @$houe
----------------------------
• حاول ازالة اشخاص وقمت بتنزيلة وانذارك 🤚
"  ,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"• اعادة رفع ~ ⚙","callback_data"=>"reup#$how&$tiid"]]
]
])
]);
}}
$fx = explode("#",$data);
if($fx[0] == "reup"){
$gx = explode("&",$fx[1]);
bot('promoteChatMember',[
 'chat_id'=>$gx[1],
'user_id'=>$gx[0],
 "can_invite_users"=>true,
"can_change_info"=>true,
"can_promote_members"=>false,
"can_restrict_members"=>true,
"can_manage_voice_chats"=>true,
"can_edit_messages"=>true,
"can_delete_messages"=>true,
"can_manage_chat"=>true,
"is_anonymous"=>false,
"can_post_messages"=>true,
]);
bot('EditMessageText',[
'chat_id'=>$chat_id2,'message_id'=>$message_id2,
'text'=>"*$id
•  تم رفعه، مشرف مجددا* $gx[0] 
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$update->message->message_id,
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"~ رجوع","callback_data"=>"home"]],
]
])
]);
}
### dev @S_P_P1 @iii4040 @bots_5 ###

# لا تنسي حقوق المبرمج ناميرو او صالح @s_p_p1
if($rt && $text == "رفع مشرف"){
if($statuss == 'creator') {
$get = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=". $bot_id),true);
$ge = $get["result"]["can_promote_members"];
if($ge == true){
bot('promoteChatMember',[
 'chat_id'=>$chat_id,
'user_id'=>$re_id,
 'can_change_info'=>True,
'can_delete_messages'=>True,
'can_invite_users'=>True,
'can_restrict_members'=>True,
'can_pin_messages'=>True,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
• تم رفعه، مشرف * [$re_name](tg://user?id=$re_id) 
----------------------------
*• بواسطة* [$first_name](tg://user?id=$from_id) 
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$update->message->message_id,
 ]);
}
}
}
elseif($rt && $text =="تنزيل مشرف"){
if($statuss == 'creator') {
$get = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=". $bot_id),true);
$ge = $get["result"]["can_promote_members"];
if($ge == true){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
• تم تنزيله مشرف* [$re_name](tg://user?id=$re_id)  
----------------------------
*• بواسطة* [$first_name](tg://user?id=$from_id) 
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
 bot('restrictChatMember',[
'user_id'=>$re_id,
'chat_id'=>$chat_id,
'can_post_messages'=>true,
'can_add_web_page_previews'=>false,
'can_send_other_messages'=>true,
]);
}
}
}
if($rt && $text == "رفع مشرف"){
if($statuss == 'creator'){
$get = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=". $bot_id),true);
$ge = $get["result"]["can_promote_members"];
if($ge != true){
bot('SendMessage',['chat_id'=>$chat_id,
'text'=>"
• لا امتلك صلاحية رفع مشرفين 
",'parse_mode'=>'markdown','reply_to_message_id'=>$message->message_id,'disable_web_page_preview'=>true,
]);
}}}
if($update->message->chat->type == 'group'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"•عذرا لا اعمل سوى في المجموعات الخارقة والقنوات 
----------------------------
- sorry i can't work on group just supergroup and channel",'reply_to_meesage_id'=>$message->message_id,
]);
bot('LeaveChat',[
'chat_id'=>$chat_id,
]);
}
### dev @S_P_P1 @iii4040 @bots_5 ###

# لا تنسي حقوق المبرمج ناميرو او صالح @s_p_p1