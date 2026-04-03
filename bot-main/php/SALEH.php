<?php
///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 

$NaMerOset = json_decode(file_get_contents("zune.txt"),true);
$upNamero = json_decode(file_get_contents('php://input'));
$mNamero = $upNamero->message;
$Nameroch2 = $upNamero->callback_query->message->chat->id;
$S_P_P1 = $upNamero->callback_query->data;
$ffff = $mNamero->from->id;
$SALEH = $mNamero->text;
$Nameroch = $mNamero->chat->id;
$saleh = $mNamero->from->username;
$mNamero = $upNamero->message;
$Nameroch = $mNamero->chat->id;
$SALEH = $mNamero->text;
$Nameroch2 = $upNamero->callback_query->message->chat->id;
$mNamero_id2 = $upNamero->callback_query->message->message_id;
$mNamero_id = $mNamero->message_id;
$S_P_P1 = $upNamero->callback_query->data;
$name = $upNamero->message->from->first_name;
$NameroBots = $upNamero->message->from->id;
$NameroBots2 = $upNamero->callback_query->from->id;
$tc = $upNamero->message->chat->type;
$NaMerOset = json_decode(file_get_contents("zune.txt"),true);
if(!$NaMerOset["sudo"]){
$iidsod = $Df;
}elseif($NaMerOset["sudo"]){
$iidsod = $NaMerOset["sudo"];
}
///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 

$admin = $iidsod;
$suodo = $NaMerOset["sudoarr"];
$S_P_P1 = $upNamero->callback_query->data;
$Nameroch2 = $upNamero->callback_query->message->chat->id;
$mNamero_id2 =$upNamero->callback_query->message->message_id;
$name = $mNamero->from->first_name;
$saleh = $mNamero->from->username;
$NameroBots = $mNamero->from->id;
$first_name = $upNamero->message->form->first_name;
$all = explode("\n",file_get_contents("allUser.txt"));
$mx = explode("@",$S_P_P1);
$rex = explode("#",$S_P_P1);
$vss = explode("#",$S_P_P1);
$SAllg = $NaMerOset["idgroup"];
$band = $NaMerOset["band"];
$SAll = count($all);
$ad = count($NaMerOset["sudoarr"]);
$bn = count($NaMerOset["band"]);
$SAllgg = count($NaMerOset["idgroup"]);
$SAllco = count($NaMerOset["idch"]);
$allcou = $SAll+$SAllgg+$SAllco;
$con = $SAllco + $SAllgg;
$ch11 = $NaMerOset['ch1'];
$ch1 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ch11."&user_id=".$NameroBots);
function send($Nameroch,$NameroBots,$mNamero_id){
bot('copymessage',[
'chat_id'=>$Nameroch,
'from_chat_id'=>$NameroBots,
'message_id'=>$mNamero_id,
]);}
function forw($Nameroch,$NameroBots,$mNamero_id){
bot('forwardMessage', [
'chat_id'=>$Nameroch,
'from_chat_id'=>$NameroBots,
'message_id'=>$mNamero_id,
]);}
if($mNamero && !in_array($Nameroch,$NaMerOset["idgroup"]) and $tc == 'supergroup'){
$NaMerOset["idgroup"][] = "$Nameroch";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
$SAllc = $NaMerOset["idch"];
$SAllco = count($NaMerOset["idch"]);
$chtre = $upNamero->channel_post;
$chid = $chtre->chat->id;
if($chtre && !in_array($chid,$NaMerOset["idch"])){
$NaMerOset["idch"][] = $chid;
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
$d = date('D');
if($upNamero and !$NaMerOset["well"]){
$NaMerOset["well"] = "✅";
$NaMerOset["sendad"] = "✅";
$NaMerOset["bot"] = "✅";
$NaMerOset["chinv"] = "✅";
$NaMerOset["chsii"] = "✅";
$NaMerOset["xert"] = "✅";
$NaMerOset["zweyu"] = "✅";
$NaMerOset["gher"] = "✅";
$NaMerOset["csgu"] = "✅";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if(!$NaMerOset["typeinv"]){
$NaMerOset["typeinv"] = "قناة تليجرام";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($NaMerOset["info"]){
unset($NaMerOset["info"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}


if($tc == 'private' and $NameroBots !=$admin){
if($mNamero && (strpos($ch1,'"status":"left"') or strpos($ch1,'"Bad Request: USER_ID_INVALID"') or strpos($ch1,'"status":"kicked"'))!== false){
$x = "https://t.me/".str_replace("@","",$NaMerOset['ch1']);
if(!$NaMerOset['chhi']){
$a = "🚸| عذرا عزيزي
🔰| عليك الاشتراك لتتمكن من استخدام البوت

- $x

‼️| اشترك ثم ارسل /start";
}else{
$a = $NaMerOset['chhi']."\n".$x;
}
bot('sendMessage', [
'chat_id'=>$Nameroch,
'text'=>$a,'disable_web_page_preview'=>true,'reply_to_message_id'=>$mNamero_id 
]);exit();
}
}
if($tc == "private"){
if($mNamero and $NaMerOset["soshal"] != null and $NaMerOset["typeinv"] == "حساب سوشال ميديا" and $NaMerOset["chinv"] == "✅" and !in_array($NameroBots,$NaMerOset["charray"]) and $NameroBots !=$admin){
$chinvi = count($NaMerOset["charray"])+1;
$NaMerOset["charray"][] = $NameroBots;
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
if(!$NaMerOset['chhipre']){
$a = "🚸| عذرا عزيزي
🔰| عليك متابعه حسابي

- ".$NaMerOset["soshal"]." 

‼️| تابعني من ثم ارسل /start
";
}else{
$a = $NaMerOset['chhipre']."\n".$NaMerOset["soshal"];
}
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"📥| شاهد شخص جديد الاشتراك الخاص بك ( حساب سواشال ميديا ) 

- الحساب : ".$NaMerOset["soshal"]."

- العضو : ".$upNamero->message->from->first_name."

- ايدي العضو: $NameroBots

العدد الكلي للمشاهدين : $chinvi
",'disable_web_page_preview'=>true,
]);
bot('sendMessage',[
'chat_id'=>$Nameroch,
'text'=>"$a",
'disable_web_page_preview'=>true,'reply_to_message_id'=>$mNamero_id 
]);exit();
}}
if($mNamero and $tc == 'private' and $NameroBots !=$admin){
for($i=0;$i<count($NaMerOset['secondch']);$i++){
$ch22 = $NaMerOset['secondch'][$i];
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ch22."&user_id=".$NameroBots);
if(strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"')!== false){
$x = "https://t.me/".str_replace("@","",$NaMerOset['secondch'][$i]);
if(!$NaMerOset['chhi']){
$a = "🚸| عذرا عزيزي
🔰| عليك الاشتراك لتتمكن من استخدام البوت

- $x

‼️| اشترك ثم ارسل /start";
}else{
$a = $NaMerOset['chhi']."\n".$x;
}
bot('sendMessage', [
'chat_id'=>$Nameroch,
'text'=>$a,'disable_web_page_preview'=>true,'reply_to_message_id'=>$mNamero_id 
]);exit();
}
}
}
if($upNamero and $tc == 'private'){
if($NameroBots != $admin){
if($makerinve["makerish"] == "✅"){
$cab = $makerinve["setchmaker"];
$mou = $makerinve["Apisetchmaker"];
$chaoi = file_get_contents("https://api.telegram.org/bot$mou/getChatMember?chat_id=$cab&user_id=$NameroBots");
$inac = json_decode($chaoi);
if($inac->result->status == "left" or $inac->result->status == "kicked"){
$x = "https://t.me/".str_replace("@","",$makerinve["setchmaker"]);
if($makerinve["ishon"] == "✅"){
$SALEHcoin = urlencode("
📥| شترك شخص في قناة الاشتراك الاجباري (جميع البوتات)

- الرابط :$x 

- العضو : $name
- ايدي العضو : $NameroBots
- شترك بواسطة بوت : @$user");
$tik = $makerinve["Apisetchmaker"];
file_get_contents("https://api.telegram.org/bot".$tik."/sendMessage?chat_id=".$makerinve["devish"]."&text=".$SALEHcoin."&disable_web_page_preview=true");
}
$a = "🚸| عذرا عزيزي
🔰| عليك الاشتراك لتتمكن من استخدام البوت

- $x

‼️| اشترك ثم ارسل /start";
bot('sendMessage',[
'chat_id'=>$Nameroch,
'text'=>$a,
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$mNamero_id 
]);exit();
}
}
}
}
if($mNamero and in_array($NameroBots,$NaMerOset['band'])){
bot('sendMessage', [
'chat_id'=>$Nameroch,
'text'=>'
A🏷:انت محظور من البوت 
 — — — — — — — — —
','reply_to_message_id'=>$mNamero_id 
,
]);exit();
}
if($mNamero and $NaMerOset['bot'] == "❌" and $NameroBots != $admin){
bot('sendMessage', [
'chat_id'=>$Nameroch,
'text'=>$NaMerOset["setclose"],'parse_mode'=>"MarkDown",'reply_to_message_id'=>$mNamero_id ,
]);exit();
}


if($SALEH == "/start"and $NaMerOset["well"] == "✅" and !in_array($NameroBots,$all) and $tc =='private'){
bot("sendmessage",[
"chat_id"=>$admin,
"text"=>"
*٭ تم دخول شخص جديد الى البوت الخاص بك 👾*
-----------------------
• معلومات العضو الجديد .
• الاسم : [$name](tg://user?id=$NameroBots) 
• المعرف : [@$saleh](tg://user?id=$NameroBots)
• الايدي : [$NameroBots](tg://user?id=$NameroBots)
-----------------------
*• عدد الاعضاء الكلي* : { $SAll }",
 'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
]);
file_put_contents("allUser.txt",$NameroBots."\n",FILE_APPEND);
}
if($NaMerOset["well"] != "✅" and !in_array($NameroBots,$all) and $tc == 'private'){
file_put_contents("allUser.txt",$NameroBots."\n",FILE_APPEND);
}
if($NaMerOset["typeinv"] == "قناة تليجرام"){
$chh = json_encode([ 
'inline_keyboard'=>[
[['text'=>"تعين القناة",'callback_data'=>"addch1"],['text'=>'مسح القناة' ,'callback_data'=>"OKDelCh1"]],
[['text'=>"تعين الكليشه " ,'callback_data'=>"mchc"],['text'=>"عرض رسالة الاشتراك" ,'callback_data'=>"chhii"]],
[['text'=>"حذف رسالة الاشتراك" ,'callback_data'=>"delchi"]],
[['text'=>'وضع الاداء :'.$NaMerOset["chsii"],'callback_data'=>"#@chsii"],['text'=>'اشعار الاشتراك :'.$NaMerOset["chinv"],'callback_data'=>"#@chinv"]],
[['text'=>'ازرار شفافه :'.$NaMerOset["xert"],'callback_data'=>"#@xert"],['text'=>'ماركدون :'.$NaMerOset["gher"],'callback_data'=>"#@gher"]],
[['text'=>'زر تحقق من الاشتراك:'.$NaMerOset["zweyu"],'callback_data'=>"#@zweyu"]],
[['text'=>"قسم الاشتراك الثانوي " ,'callback_data'=>"secind"]],
[['text'=>"عرض كل القنوات" ,'callback_data'=>"geetallch"]],
[['text'=>"نوع الاشتراك الاجباري : ".$NaMerOset["typeinv"],'callback_data'=>"typeinv"]],
[['text'=>'رجوع' ,'callback_data'=>"back"]],
]]);
}else{
$chh = json_encode([ 
'inline_keyboard'=>[
[['text'=>" تعين رابط الحساب",'callback_data'=>"addsoshql"],['text'=>'مسح الاشتراك ' ,'callback_data'=>"okdelsosh"]],
[['text'=>"عرض رسالة الاشتراك" ,'callback_data'=>"chppost"],['text'=>"عرض الحساب" ,'callback_data'=>"getsosh"]],
[['text'=>"تغيير رسالة الاشتراك" ,'callback_data'=>"chprch"],['text'=>"حذف رسالة الاشتراك" ,'callback_data'=>"delchip"]],
[['text'=>"قسم الاشتراك الثانوي " ,'callback_data'=>"secind"]],
[['text'=>"نوع الاشتراك الاجباري : ".$NaMerOset["typeinv"],'callback_data'=>"typeinv"]],
[['text'=>'رجوع' ,'callback_data'=>"back"]],
]]);
}
$back = json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"back"]],]]);

$startadmin = json_encode([ 
'inline_keyboard'=>[
[['text'=>"اخر تحديثات البوتات 🪢" ,'url'=>"https://t.me/Namerobots"]],
[['text'=>"عمل البوت :".$NaMerOset["bot"],'callback_data'=>"1#bot"],['text'=>"اشعار الدخول :".$NaMerOset["well"],'callback_data'=>"1#well"]],
[['text'=>"الردود ",'callback_data'=>"rdod"],['text'=>"تعديل الازرار",'callback_data'=>"azrario"],['text'=>"التوجيه :".$NaMerOset["sendad"],'callback_data'=>"1#sendad"]],
[['text'=>'(/start) رسالة الترحيب' ,'callback_data'=>"what"]],
[['text'=>"الاشتراك الاجباري" ,'callback_data'=>"ch"],['text'=>"الادمنيه" ,'callback_data'=>"admin"]],
[['text'=>"الاذاعه" ,'callback_data'=>"tonum"],['text'=>"الاحصائيات" ,'callback_data'=>"countall"]],
[['text'=>"• لوحة تحكم البوت •" ,'callback_data'=>"toch"]],
]]);

if($S_P_P1 == "chprch"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• ارسل كليشه الاشتراك مع رابط حسابك الذي قمت بتعينه .",'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["data"] = "chprch";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
if($SALEH and $NaMerOset["data"] == "chprch"){
$allcou = $SAll+$SAllgg+$SAllco;
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>"تم حفظ رسالة الاشتراك الاجباري⚙
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع • ' ,'callback_data'=>"back"]],
]])
]);
$NaMerOset["chhipre"] = "$SALEH";
$NaMerOset["data"] = "stop";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
if($S_P_P1 == "chppost"){
if(!$NaMerOset['chhipre']){
$a = "🚸| عذرا عزيزي
🔰| عليك متابعه حسابي

- الرابط !

‼️| تابعني من ثم ارسل /start
";
}else{
$a = $NaMerOset['chhipre'];
}
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>$a,'disable_web_page_preview'=>true,
'reply_markup'=>$back
]);
}
if($S_P_P1 == "delchip"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"تم حذف رسالة الاشتراك بنجاح ✅",
'reply_markup'=>$back
]);
unset($NaMerOset["chhipre"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}

if($S_P_P1 == "typeinv"){
if($NaMerOset["typeinv"]!="قناة تليجرام"){
$iu = "قناة تليجرام";
}else{
$iu ="حساب سوشال ميديا";
}
$NaMerOset["typeinv"] = $iu;
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"*• تم تغيير نوع الاشتراك الاجباري بنجاح ✅ *

- الى وضع الاشتراك الاجباري : ".$iu,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"• رجوع • ",'callback_data'=>"ch"]]
]
])
]);
}
if($S_P_P1 == "addsoshql"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>'• ارسل رابط حسابك في اي موقع من مواقع التواصل الاجتماعي . ',
'reply_markup'=>$back
]);
$NaMerOset["data"] = "okaddshosh";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($SALEH and $NaMerOset["data"] == "okaddshosh"){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"])){
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>"تم الحفظ 🫡",
'reply_markup'=>$back
]);
unset($NaMerOset['ch1']);
$NaMerOset["soshal"] = $SALEH;
$NaMerOset["data"] = "stop";
unset($NaMerOset["charray"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
if($S_P_P1 == "dellsosh"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>'،🖇:هل أنت متأكد من أنك تريد حذف الحساب ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم",'callback_data'=>"okdelsosh"],['text'=>"رجوع",'callback_data'=>"back"]]
]
])
]);
}
if($S_P_P1 == "okdelsosh"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>'• تم حذف الحساب من الاشتراك الاجباري!',
'reply_markup'=>$back
]);
unset($NaMerOset["soshal"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}

if($S_P_P1 == "getsosh" ){
if($NaMerOset["soshal"]){
$sosh1 = $NaMerOset["soshal"];}else{$sosh1 = "لايوجد حساب";}
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"
• هذه قائمة للحساب الاساسي للأشتراك الاجباري ⚙

• الحساب الاساسي : $sosh1
",
'reply_markup'=>$back
]);
}


if($mx[0] == "#" ){
if($NaMerOset[$mx[1]]!="✅"){
$iu = "✅";
}else{
$iu ="❌";
}
$NaMerOset[$mx[1]] = $iu;
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
if($NaMerOset["typeinv"] == "قناة تليجرام"){
$chh = json_encode([ 
'inline_keyboard'=>[
[['text'=>"تعين القناة",'callback_data'=>"addch1"],['text'=>'مسح القناة' ,'callback_data'=>"OKDelCh1"]],
[['text'=>"تعين الكليشه" ,'callback_data'=>"mchc"],['text'=>"عرض رسالة الاشتراك" ,'callback_data'=>"chhii"]],
[['text'=>"حذف رسالة الاشتراك" ,'callback_data'=>"delchi"]],
[['text'=>'وضع الاداء :'.$NaMerOset["chsii"],'callback_data'=>"#@chsii"],['text'=>'اشعار الاشتراك :'.$NaMerOset["chinv"],'callback_data'=>"#@chinv"]],
[['text'=>'ازرار شفافه :'.$NaMerOset["xert"],'callback_data'=>"#@xert"],['text'=>'ماركدون :'.$NaMerOset["gher"],'callback_data'=>"#@gher"]],
[['text'=>'زر تحقق من الاشتراك:'.$NaMerOset["zweyu"],'callback_data'=>"#@zweyu"]],
[['text'=>"قسم الاشتراك الثانوي " ,'callback_data'=>"secind"]],
[['text'=>"عرض كل القنوات" ,'callback_data'=>"geetallch"]],
[['text'=>"نوع الاشتراك الاجباري : ".$NaMerOset["typeinv"],'callback_data'=>"typeinv"]],
[['text'=>'رجوع' ,'callback_data'=>"back"]],
]]);
}else{
$chh = json_encode([ 
'inline_keyboard'=>[
[['text'=>" تعين رابط الحساب",'callback_data'=>"addsoshql"],['text'=>'مسح الاشتراك ' ,'callback_data'=>"okdelsosh"]],
[['text'=>"عرض رسالة الاشتراك" ,'callback_data'=>"chppost"],['text'=>"عرض الحساب" ,'callback_data'=>"getsosh"]],
[['text'=>"تغيير رسالة الاشتراك" ,'callback_data'=>"chprch"],['text'=>"حذف رسالة الاشتراك" ,'callback_data'=>"delchip"]],
[['text'=>"قسم الاشتراك الثانوي " ,'callback_data'=>"secind"]],
[['text'=>"نوع الاشتراك الاجباري : ".$NaMerOset["typeinv"],'callback_data'=>"typeinv"]],
[['text'=>'رجوع' ,'callback_data'=>"back"]],
]]);
}
bot('editMessageReplyMarkup',[
'chat_id'=>$upNamero->callback_query->message->chat->id,
'message_id'=>$upNamero->callback_query->message->message_id,
'disable_web_page_preview'=>'true',
'reply_markup'=>$chh,
]);
}
if($rex[0] == "1"){
if($NaMerOset[$rex[1]]!="✅"){
$iu = "✅";
}else{
$iu ="❌";
}
$NaMerOset[$rex[1]] = $iu;
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
$startadmin = json_encode([ 
'inline_keyboard'=>[
[['text'=>"اخر تحديثات البوتات 🪢" ,'url'=>"https://t.me/Namerobots"]],
[['text'=>"عمل البوت :".$NaMerOset["bot"],'callback_data'=>"1#bot"],['text'=>"اشعار الدخول :".$NaMerOset["well"],'callback_data'=>"1#well"]],
[['text'=>"الردود ",'callback_data'=>"rdod"],['text'=>"تعديل الازرار",'callback_data'=>"azrario"],['text'=>"التوجيه :".$NaMerOset["sendad"],'callback_data'=>"1#sendad"]],
[['text'=>'(/start) رسالة الترحيب' ,'callback_data'=>"what"]],
[['text'=>"الاشتراك الاجباري" ,'callback_data'=>"ch"],['text'=>"الادمنيه" ,'callback_data'=>"admin"]],
[['text'=>"الاذاعه" ,'callback_data'=>"tonum"],['text'=>"الاحصائيات" ,'callback_data'=>"countall"]],
[['text'=>"• لوحة تحكم البوت •" ,'callback_data'=>"toch"]],
]]);
bot('editMessageReplyMarkup',[
'chat_id'=>$upNamero->callback_query->message->chat->id,
'message_id'=>$upNamero->callback_query->message->message_id,
'disable_web_page_preview'=>'true',
'reply_markup'=>$startadmin,
]);
}
if($SALEH and $NaMerOset["data"] == "setclose" and $NameroBots == $admin){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"• تم حفظ رسالة الاغلاق بنجاح 

 • الرسالة : $SALEH

",'parse_mode'=>'markdown','reply_markup'=>$back,
]);
$NaMerOset["data"] = "done";
$NaMerOset["setclose"] = "$SALEH";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($rex[1] == "bot" and $NaMerOset["bot"] == "❌"){
bot('sendmessage',[
'chat_id'=>$Nameroch2,
'text'=>"
• ارسل الرساله التي تظهر عند ارسال اي شيئ الى البوت (يمكنك استخدام الماركداون)
",
'reply_markup'=> json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"back"]],
]])
]);
$NaMerOset["data"] = "setclose";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
elseif($SALEH == "/start" ){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"]) or $NameroBots == $ds){
bot('sendMessage',[
'chat_id'=>$Nameroch,
'text'=>"*• اهلا بك في لوحه الأدمن الخاصه بالبوت 🤖
- يمكنك التحكم في البوت الخاص بك من هنا
~~~~~~~~~~~~~* 
- عليك تفعيل الانلاين لكي يعمل البوت بشكل صحيح 
•[اضغط هنا لمعرفة كيف تفعل الانلاين](https://t.me/W_J90/44)",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$startadmin,
]);
}}
elseif($mNamero and $NaMerOset["sendad"] == "✅" and $NaMerOset["tawa"] != "❌" and $NameroBots != $admin){
if(strstr($SALEH,":")==false){
bot('forwardMessage', [
'chat_id'=>$admin,
'from_chat_id'=>$NameroBots,
'message_id'=>$mNamero->message_id
]);}}
if($mNamero and $NaMerOset["sendad"] == "✅" and $NaMerOset["tawa"] != "❌" and $NameroBots == $admin){
bot('copymessage',[
'chat_id'=>$mNamero->reply_to_message->forward_from->id,
'from_chat_id'=>$admin,
'message_id'=>$mNamero->message_id,
]);
}
elseif($S_P_P1 == "back"){
if($NameroBots2 == $admin or in_array($NameroBots2, $NaMerOset["sudoarr"]) or $NameroBots2 == $ds){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"*• اهلا بك في لوحه الأدمن الخاصه بالبوت 🤖
- يمكنك التحكم في البوت الخاص بك من هنا
~~~~~~~~~~~~~* 
- عليك تفعيل الانلاين لكي يعمل البوت بشكل صحيح 
•[اضغط هنا لمعرفة كيف تفعل الانلاين](https://t.me/W_J90/44)",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$startadmin,
]);
unset($NaMerOset["data"]);
unset($NaMerOset["addradArmof"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}}
if($S_P_P1 == 'secind'){
if($NaMerOset["secondch"] != null and $NaMerOset["secondch"] != "{"){
$keyboard["inline_keyboard"]=[];
for($i=0;$i<count($NaMerOset["secondch"]);$i++){
$keyboard["inline_keyboard"][$i] = [['text'=>$NaMerOset["secondch"][$i],'url'=>"t.me/".str_replace("@","",$NaMerOset["secondch"][$i])],['text'=>"🗑",'callback_data'=>"dll@".$NaMerOset["secondch"][$i]]];
}
$keyboard["inline_keyboard"][] = [['text'=>"• اضافة قناة جديدة •" ,'callback_data'=>"addch2"]];
$keyboard["inline_keyboard"][] = [['text'=>'• رجوع •' ,'callback_data'=>"back"]];
$reply_markup = json_encode($keyboard); 
bot('editmessagetext',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"*• مرحبا بك في قسم الاشتراك الاجباري الثانوي ⚙️*

- يمكنك وضع 3 قنوات فقط 

*- الاشتراك سيظهر عند ضغط /start فقط لكي لا يؤثر على عمل البوت *
ستظهر قناة الاشتراك الاساسية اولا !

- اضغط على القناة لتعديل رساله الاشتراك الاجباري .",'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$reply_markup,
]);
}
else
{
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"*• مرحبا بك في قسم الاشتراك الاجباري الثانوي ⚙️*

- يمكنك وضع 3 قنوات فقط 

*- الاشتراك سيظهر عند ضغط /start فقط لكي لا يؤثر على عمل البوت *
ستظهر قناة الاشتراك الاساسية اولا !

- اضغط على القناة لتعديل رساله الاشتراك الاجباري .",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"• اضافة قناة جديدة •",'callback_data'=>"addch2"]],
[['text'=>'رجوع' ,'callback_data'=>"back"]],
]])
]);
}
}
if($S_P_P1 == "addch2"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>' 
• قم برفع البوت ادمن في قناتك او مجموعتك اولا 🌟

• من ثم ارسال معرف القناة او قم بعمل توجيه لاي منشور من قناتك الى البوت
• يمكنك وضع شتراك جباري لمجموعتك عن طريق اضافه البوت الى المجموعة وارسل تفعيل الاشتراك
',
'reply_markup'=>$back
]);
$NaMerOset["data"] = "addch2";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
if(preg_match('/@(.*?)/',$SALEH) and $NaMerOset["data"] == "addch2" ){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["secondch"])){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"• تم الحفظ بنجاح 🎠
",
'reply_markup'=> json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"secind"]],
]])
]);
$NaMerOset["secondch"][] = "$SALEH";
unset($NaMerOset["data"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 

$deloch = explode("@",$S_P_P1);
if($deloch[0] == "dll"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• تم حذف القناة من الاشتراك الاجباري!",
'reply_markup'=> json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"secind"]],
]])
]);
$key = array_search($deloch[1],$NaMerOset["secondch"]);
unset($NaMerOset["secondch"][$key]);
$NaMerOset["secondch"] = array_values($NaMerOset["secondch"]); 
unset($NaMerOset["data"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}


if($S_P_P1 == 'admin'){
if($NaMerOset["sudoarr"] != null and $NaMerOset["sudoarr"] != "{"){
$keyboard["inline_keyboard"]=[];
for($i=0;$i<count($NaMerOset["sudoarr"]);$i++){
$keyboard["inline_keyboard"][$i] = [['text'=>$NaMerOset["sudoarr"][$i],'url'=>"tg://openmessage?user_id=".$NaMerOset["sudoarr"][$i]],['text'=>"🗑",'callback_data'=>"dll^".$NaMerOset["sudoarr"][$i]]];
}
$keyboard["inline_keyboard"][] = [['text'=>"• اضافة ادمن جديد •" ,'callback_data'=>"addsod"]];
$keyboard["inline_keyboard"][] = [['text'=>'• رجوع •' ,'callback_data'=>"back"]];
$reply_markup = json_encode($keyboard); 
bot('editmessagetext',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• مرحبا بك في الادمنيه 👮‍♀️
- يمكنك رفع 5 ادمنيه في البوت او حذفهم 

- يمكن للادمنيه تحكم في لوحه البوت مثلك ويمكنهم استلام رسائل الموجهة او سايت او تواصل .",
'reply_markup'=>$reply_markup,
]);
}
else
{
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• مرحبا بك في الادمنيه 👮‍♀️
- يمكنك رفع 5 ادمنيه في البوت او حذفهم 

- يمكن للادمنيه تحكم في لوحه البوت مثلك ويمكنهم استلام رسائل الموجهة او سايت او تواصل .",
'reply_markup'=> json_encode([ 
'inline_keyboard'=>[
[['text'=>"• اضافة ادمن جديد •" ,'callback_data'=>"addsod"]],
[['text'=>'• رجوع •' ,'callback_data'=>"back"]],
]])
]);
}
}
if($S_P_P1 == "addsod"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• ارسل ايدي الشخص الان او معرف الشخص !",
'reply_markup'=>$back
]);
$NaMerOset["data"] = "addsod";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
if($SALEH and $NaMerOset["data"] == "addsod" ){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"])){
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>" اوه حسناا عزيزي تم رفعه ادمن 🫥💞",
'reply_markup'=>$back
]);
bot("sendmessage",[
"chat_id"=>$SALEH,
"text"=>" تم رفعك ادمن بالبوت 🌀",
]);
$NaMerOset["sudoarr"][] = "$SALEH";
unset($NaMerOset["data"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}}
$dellad = explode("^",$S_P_P1);
if($dellad[0] == "dll"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• تم تنزيلة من الادمنية •",
'reply_markup'=> json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"admin"]],
]])
]);
$key = array_search($dellad[1],$NaMerOset["sudoarr"]);
unset($NaMerOset["sudoarr"][$key]);
$NaMerOset["sudoarr"] = array_values($NaMerOset["sudoarr"]); 
unset($NaMerOset["data"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}



if($S_P_P1 == "what"){
$set = $NaMerOset["wellcom"] ?? null;
if(!$set){
$set = "• الرسالة الافتراضية: 
اهلا بك ([$name](tg://user?id=$from_id)) في البوت الخاص بي ❤
- ارسل رسالتك الان ليتم ارسالها الى مدير البوت.";
}

bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"
• مرحبا بك في قسم رسالة الترحيب (/start) 🌾
- ستظهر هذه الرسالة عند إرسال (/start) الى البوت الخاص بك 

- الرسالة الحالية : 
$set
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رسالة الترحيب ' ,'callback_data'=>"hi"]],
[['text'=>"اضف رسالة ",'callback_data'=>"pthi"],['text'=>"حذف رسالة ",'callback_data'=>"delhi"]],
[['text'=>"رجوع" ,'callback_data'=>"back"]]
]
])
]);
}
if($S_P_P1 == "pthi" ){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"
مرحبا بك في قسم رسالة الترحيب (/start) 🌾
- ستظهر هذه الرسالة عند ارسال (/start) الى البوت الخاص بك. 
- قم بارسال رسالتك الان.
",
'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["data"] = "pthi";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($SALEH and $NaMerOset["data"] == "pthi" ){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"])){
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>"✅ تم حفظ رسالة الترحيب",
'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["wellcom"] = "$SALEH";
$NaMerOset["data"] = "stop";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
}
if($S_P_P1 == "hi" ){
if($NaMerOset["wellcom"]){
$set = $NaMerOset["wellcom"];
}else{
$set = "• الرسالة الافتراضية لم تقم باضافة رسالة !";
}
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"$set",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"back"]],
]
])
]);
}
if($S_P_P1 == "delhi" ){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"🗑 تم حذف رسالة الترحيب",
'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["wellcom"] = null;
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}


if($S_P_P1 == "countall"){
$SAll = count($all);
$ad = count($NaMerOset["sudoarr"]);
$bn = count($NaMerOset["band"]);
$SAllgg = count($NaMerOset["idgroup"]);
$SAllco = count($NaMerOset["idch"]);
$allcou = $SAll+$SAllgg+$SAllco;
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"
مرحبا بك في قسم الاحصائيات 📊

• عدد المسخدمين الكلي : *$all*
- عدد المستخدمين في الخاص : *$SAll*
- عدد الكروبات والقنوات : *$con*

• عدد المحظورين : *$bn*

- قائمة اخر الاعضاء الذين شتركوا :

1. ".$all[1]."
————
$rip
",'parse_mode'=>'markdown',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🗑 مسح المحظورين' ,'callback_data'=>"delc"],['text'=>' المحظورين' ,'callback_data'=>"ALAA"]],
[['text'=>"حظر شخص",'callback_data'=>"k"],['text'=>"الغاء حظر شخص",'callback_data'=>"unk"]],
[['text'=>'قسم الاذاعه' ,'callback_data'=>"tonum"]],
[['text'=>"رجوع" ,'callback_data'=>"back"]]
]])
]);
}
if($S_P_P1 =="ALAA" ){
for($i=0;$i<count($NaMerOset["band"]);$i++){
$admi = $admi.$NaMerOset["band"][$i]."\n";
}
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"اهلا بك في قائمة المحظورين 
$admi",
'reply_markup'=>$back
]);
}
if($S_P_P1 =="unk" ){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"- ارسل ايدي الشخص او معرف الشخص لكي اقوم بالغاء حظره من البوت",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$back,
]);
$NaMerOset["data"] = "un";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
if($SALEH and $NaMerOset["data"] == "un"){
bot('sendMessage',[
'chat_id'=>$Nameroch,
'text'=>"تم الغاء حظره $SALEH",
]);
$key = array_search($SALEH,$NaMerOset["band"]);
unset($NaMerOset["data"]);
unset($NaMerOset["band"][$key]);
$NaMerOset["band"]= array_values($NaMerOset["band"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($S_P_P1 =="delc"){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"تم حذف المحظورين",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$back,
]);
unset($NaMerOset["band"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($S_P_P1 =="k"){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"- ارسل ايدي الشخص او معرف الشخص لكي اقوم بحظره من البوت ",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$back,
]);
$NaMerOset["data"] = "ok";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($SALEH and $NaMerOset["data"] == "ok"){
if($NameroBots == $admin){
bot('sendMessage',[
'chat_id'=>$Nameroch,
'text'=>"تم حظره $SALEH",
]);
$NaMerOset["band"][] = $SALEH;
unset($NaMerOset["data"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
if($S_P_P1 =="tonum"){
$ad = count($NaMerOset["sudoarr"]);
$bn = count($NaMerOset["band"]);
$allcou = $SAll+$SAllgg+$SAllco;
$con = $SAllco + $SAllgg;
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"
• مرحبا بك في قسم الاذاعه 🔥

- عدد المسخدمين الكلي : $allcou
- عدد الخاص : $SAll
- عدد الكروبات والقنوات : $con

- عدد المحظورين : $bn",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"اذاعة للكل",'callback_data'=>"allsend"],['text'=>"اذاعة توجيه للكل",'callback_data'=>"tallsend"]],
[['text'=>'اذاعة للخاص' ,'callback_data'=>"psend"],['text'=>'اذاعة توجيه للخاص' ,'callback_data'=>"tpsend"]],
[['text'=>"اذاعة كروبات" ,'callback_data'=>"gsend"],['text'=>'اذاعة توجيه كروبات' ,'callback_data'=>"tgsend"]],
[['text'=>'رجوع' ,'callback_data'=>"back"]]
]])
]);
}
if($S_P_P1 == "ch"){
if($NaMerOset['ch1']){
$c1 = $NaMerOset['ch1'];
}else{
$c1 = "لايوجد قناة";
}
if($NaMerOset["soshal"]){
$cosh = $NaMerOset["soshal"];
}else{
$cosh = "لايوجد حساب";
}
if($NaMerOset["typeinv"]=="قناة تليجرام"){
$startsosh = "*• مرحبا بك في قسم الاشتراك الاجباري ✨*

- قناة الاشتراك الاساسية : $c1 

- يمكنك تعيين اكثر من قناة من خاصية قسم الاشتراك الثانوي";
}else{
$startsosh = "*• مرحبا بك في قسم الاشتراك الاجباري ✨*

- رابط الحساب : $cosh 

- يمكنك تعين نوع الاشتراك الاجباري من خلال الضغط 'نوع الاشتراك الاجباري";
}
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"$startsosh",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$chh
]);
}


####الاشتراك####


if($S_P_P1 == "mchc"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"حسنا قم بارسال رسالة الاشتراك الاجباري ",'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["data"] = "mchc";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
if($SALEH and $NaMerOset["data"] == "mchc"){
$allcou = $SAll+$SAllgg+$SAllco;
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>"تم حفظ رسالة الاشتراك الاجباري⚙
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'• رجوع •' ,'callback_data'=>"back"]],
]])
]);
$NaMerOset["chhi"] = "$SALEH";
$NaMerOset["data"] = "stop";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
if($S_P_P1 == "chhii"){
if(!$NaMerOset['chhi']){
$a = "🚸| عذرا عزيزي
🔰| عليك الاشتراك بقناة البوت لتتمكن من استخدامه

- https://t.me/

‼️| اشترك ثم ارسل /start";
}else{
$a = $NaMerOset['chhi'];}
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>$a,'disable_web_page_preview'=>true,
'reply_markup'=>$back
]);
}
if($S_P_P1 == "delchi"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"تم حذف رسالة الاشتراك بنجاح ✅",
'reply_markup'=>$back
]);
unset($NaMerOset["chhi"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($S_P_P1 == "addch1"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>'• اولا قم برفع البوت ادمن في قناتك او مجموعتك🌟

• ومن ثمه قم بارسال معرف القناة او الكروب( ارسل معرف القناة او الكروب بشكل يوزر وليس رابط )',
'reply_markup'=>$back
]);
$NaMerOset["data"] = "okch1";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if(preg_match('/@(.*?)/',$SALEH)and $NaMerOset["data"] == "okch1"){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"])){
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>" 
• تم الحفظ بنجاح 
",
'reply_markup'=>$back
]);
$NaMerOset['ch1'] = $SALEH;
$NaMerOset["data"] = "stop";
unset($NaMerOset["charray"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
if($S_P_P1 == "delch1"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>' هل أنت متأكد من أنك تريد حذف القناة ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم",'callback_data'=>"OKDelCh1"],['text'=>"رجوع",'callback_data'=>"back"]]
]
])
]);
}
if($S_P_P1 == "OKDelCh1"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>'• تم حذف القناة من الاشتراك الاجباري!',
'reply_markup'=>$back
]);
unset($NaMerOset['ch1']);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($S_P_P1 == "geetallch" ){
if($NaMerOset['ch1']){
$c1 = $NaMerOset['ch1'];}else{$c1 = "لايوجد قناة";}
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"هذه قائمة القناة الاساسية للأشتراك الاجباري 
• القناة الاساسية : $c1
",
'reply_markup'=>$back
]);
}
if($S_P_P1 == "geet"){
if($NameroBots2 == $admin or $NameroBots2 == $ds){
$allcou = $SAll+$SAllgg+$SAllco;
bot('senddocument',[
'chat_id'=>$Nameroch2,
'document'=>new CURLFile("allUser.txt"),
'caption'=>"
📋:تم جلب نسخه
🔖: الاعضاء : $SAll
-------------------------
Back /start ",
]);
bot('senddocument',[
'chat_id'=>$Nameroch2,
'document'=>new CURLFile("zune.txt"),
'caption'=>"
قاعدة البيانات ⚙
-------------------------
Back /start ",
]);
}else{
bot('answerCallbackQuery',[ 
'callback_query_id'=>$upNamero->callback_query->id, 
'text'=>"⚠️الامر ليس لك", 
'show_alert'=>true 
 ]); 
}}

###الاذاعة###

$set = json_decode(file_get_contents("set.json"),1);
$NAMERO = json_decode(file_get_contents("NameroF.json"),true);
if($S_P_P1 == "tpsend"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"،🖇:ارسل رسالتك وسيتم توجيهها لـ [ $SAll ] ",
'reply_markup'=>$back
]);
$set['ok'] = 0;
$set['start'] = 100;
file_put_contents("set.json",json_encode($set));
$NAMERO['ok'] = "on";
$NAMERO['data'] = "okoo";
file_put_contents("NameroF.json",json_encode($NAMERO,32|128|265));
}
if($S_P_P1 == "psend"){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"،🖇:ارسل رسالتك وسيتم ارسالها[ $SAll ] مشترك",
 'reply_markup'=>$back
]);
$set['ok'] = 0;
$set['start'] = 100;
file_put_contents("set.json",json_encode($set));
$NAMERO['ok'] = "on";
$NAMERO['data'] = "oksend";
file_put_contents("NameroF.json",json_encode($NAMERO,32|128|265));
}
if($mNamero and $NAMERO['data'] == "oksend" and $NameroBots == $admin){
if($NAMERO['ok'] == "on"){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>'،🖇:جاري الارسال'
]);
$NAMERO['ok'] = "of";
file_put_contents("NameroF.json",json_encode($NAMERO,32|128|265));
}
for($v=$set['ok'];$v<$set['start'];$v++){
bot('EditMessageText',[
'chat_id' =>$Nameroch,
'message_id'=>$mNamero->message_id + 1,
'text'=>"تم الوصول الى ~ ".$v,'reply_markup'=>$back
]);
}
for($v=$set['ok'];$v<$set['start'];$v++){
bot('copymessage',[
'chat_id'=>$all[$v],
'from_chat_id'=>$admin,
'message_id'=>$mNamero->message_id,
]);
}
if($v = $set['start']){
$set['ok'] = $set['ok']+100;
$set['start'] = $set['start']+100;
file_put_contents("set.json",json_encode($set));
header("Refresh:2");
header("Location: https://".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
file_get_contents("https://".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
}
$set = json_decode(file_get_contents("set.json"),1);
if($set['start'] >= count($all)){
bot("sendmessage",[
"chat_id"=>$admin,
"text"=>"،🖇✅:تم الارسال الى $SAll اعضاء",
]);
unlink("ok.txt");
unlink("set.json");
$NAMERO['data'] = "notsend";
$NAMERO['ok'] = "on";
file_put_contents("NameroF.json",json_encode($NAMERO,32|128|265));
}
}
if($mNamero and $NAMERO['data'] == "okoo" and $NameroBots == $admin){
if($NAMERO['ok'] == "on"){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>'،🖇: تم الارسال',
]);
$NAMERO['ok'] = "of";
file_put_contents("NameroF.json",json_encode($NAMERO,32|128|265));
}
for($v=$set['ok'];$v<$set['start'];$v++){
bot('EditMessageText',[
'chat_id' =>$Nameroch,
'message_id'=>$mNamero->message_id + 1,
'text'=>"تم الوصول الى ~ ".$v, 'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"NameroF"]],
]])
]);
}
for($v=$set['ok'];$v<$set['start'];$v++){
bot('forwardMessage', [
'chat_id'=>$all[$v],
'from_chat_id'=>$admin,
'message_id'=>$mNamero->message_id
]);
}
if($v = $set['start']){
$set['ok'] = $set['ok']+100;
$set['start'] = $set['start']+100;
file_put_contents("set.json",json_encode($set));
header("Refresh:2");
header("Location: https://".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
file_get_contents("https://".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
}
if($set['start'] >= count($all)){
bot("sendmessage",[
"chat_id"=>$admin,
"text"=>"،🖇✅:تم الارسال الى $SAll اعضاء",
 'reply_markup'=>$back
]);
unlink("ok.txt");
unlink("set.json");
$NAMERO['data'] = "notsend";
file_put_contents("NameroF.json",json_encode($NAMERO,32|128|265));
}
}
##########
if($S_P_P1 == "allsend"){
if($NameroBots2 == $admin or in_array($NameroBots2, $NaMerOset["sudoarr"])){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• ارسال الان الكليشه ( نص او جميع الميديا ) 
• يمكنك استخدام كود جاهز في الاذاعه او يمكنك استخدام الماركداون",'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["data"] = "allsend";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
if($mNamero and $NaMerOset["data"] == "allsend"){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"])){
$allcou = $SAll+$SAllgg+$SAllco;
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>"• جاري الاذاعة الى ($SAll) مستخدم",'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
for($i=0;$i<count($all);$i++){
send($all[$i],$NameroBots,$mNamero_id);
send($NaMerOset["idch"][$i],$NameroBots,$mNamero_id);
send($NaMerOset["idgroup"][$i],$NameroBots,$mNamero_id);
}
if($i<=3){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"• تم الاذاعة بنجاح 🎉

• الاعضاء الذين شاهدو الاذاعه {$SAll} عضو حقيقي

• تم الارسال الى {$con} قنوات وكروبات",
]);
}
$NaMerOset["data"] = "stop";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
}
if($S_P_P1 == "tallsend"){
if($NameroBots2 == $admin or in_array($NameroBots2, $NaMerOset["sudoarr"])){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• ارسال الان الكليشه ( نص او جميع الميديا ) 
• يمكنك استخدام كود جاهز في الاذاعه او يمكنك استخدام الماركداون
",'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["data"] = "tallsend";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
if($mNamero and $NaMerOset["data"] == "tallsend"){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"])){
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>"• جاري الاذاعة الى ($SAll) مستخدم",'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
for($i=0;$i<count($all);$i++){
forw($all[$i],$NameroBots,$mNamero_id);
forw($NaMerOset["idch"][$i],$NameroBots,$mNamero_id);
forw($NaMerOset["idgroup"][$i],$NameroBots,$mNamero_id);
}
if($i<=3){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"• تم الاذاعة بنجاح 🎉

• الاعضاء الذين شاهدو الاذاعه {$SAll} عضو حقيقي

• تم الارسال الى {$con} قنوات وكروبات",
]);
}
$NaMerOset["data"] = "stop";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
}
if($S_P_P1 == "gsend"){
if($NameroBots2 == $admin or in_array($NameroBots2, $NaMerOset["sudoarr"])){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• ارسال الان الكليشه ( نص او جميع الميديا ) 
• يمكنك استخدام كود جاهز في الاذاعه او يمكنك استخدام الماركداون",'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["data"] = "gsend";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}}
if($SALEH and $NaMerOset["data"] == "gsend"){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"])){
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>"• جاري الاذاعة الى ($SAllgg) مستخدم",'parse_mode'=>"MarkDown",
 'reply_markup'=>$back
]);
for($i=0;$i<count($NaMerOset["idgroup"]); $i++){
send($NaMerOset["idch"][$i],$NameroBots,$mNamero_id);
send($NaMerOset["idgroup"][$i],$NameroBots,$mNamero_id);
}
$x = count($NaMerOset["idch"])+count($NaMerOset["idgroup"]);
if($i<=2){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"• تم الاذاعة بنجاح 🎉

• القنوات والكروبات الذين شاهدو الاذاعة {$x}",
]);
}
$NaMerOset["data"] = "stop";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
}
if($S_P_P1 == "tgsend"){
if($NameroBots2 == $admin or in_array($NameroBots2, $NaMerOset["sudoarr"])){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• ارسال الان الكليشه ( نص او جميع الميديا ) 
• يمكنك استخدام كود جاهز في الاذاعه او يمكنك استخدام الماركداون",'parse_mode'=>"MarkDown",
'reply_markup'=>$back
]);
$NaMerOset["data"] = "tgsend";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
}
if($mNamero and $NaMerOset["data"] == "tgsend"){
if($NameroBots == $admin or in_array($NameroBots, $NaMerOset["sudoarr"])){
bot("sendmessage",[
"chat_id"=>$Nameroch,
"text"=>"• جاري الاذاعة الى ($SAllgg) مستخدم",'parse_mode'=>"MarkDown",
 'reply_markup'=>$back
]);
for($i=0;$i<count($NaMerOset["idgroup"]);$i++){
forw($NaMerOset["idgroup"][$i],$NameroBots,$mNamero_id);
forw($NaMerOset["idch"][$i],$NameroBots,$mNamero_id);
}
$x = count($NaMerOset["idch"])+count($NaMerOset["idgroup"]);
if($i<=2){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"• تم الاذاعة بنجاح 🎉

• القنوات والكروبات الذين شاهدو الاذاعة {$x}",
]);
}
$NaMerOset["data"] = "stop";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
}
if($S_P_P1 =="rdod"){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>" 
• مرحبا بك في قسم الردود 👮‍♀️

- يمكنك اضافه ردود وحذفها 
- يمكنك استخدام الاوامر (اضف رد-مسح رد) 

- اضغط على نص الزر لعرض محتواه .
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"اضافة رد جديد ",'callback_data'=>"addrd"],['text'=>"الردود ",'callback_data'=>"rdode"]],
[['text'=>'رجوع' ,'callback_data'=>"back"]],]])]);}
if($S_P_P1 == "addrd"){
if($NameroBots2 == $admin){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"
• ارسل الكلمة الان .
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$back
]);
$NaMerOset["addradArmof"]="$NameroBots2";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
elseif($SALEH and $NaMerOset["addradArmof"] =="$NameroBots"){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"
ف• ارسل الرد الان , يمكنك ارسال ( نص او ميديا ) 

- يمكنك وضع بعض الاضافات الى الرد من خلال استخدام الاهاشتاكات التاليه :

1. `#id` : لوضع ايدي الشخص 
2. `#username` : لوضع اسم مستخدم الشخص مع اضافه @ 
3. `#name` : لوضع اسم الشخص
",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset["addradArmof"]="$NameroBots.don";
$NaMerOset["setrad"]="$SALEH";
$NaMerOset["setraddArmof"][]="$SALEH";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
elseif($mNamero->photo && $NaMerOset["addradArmof"] =="$NameroBots.don"){
$photo = $mNamero->photo[0]->file_id;
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset[$NaMerOset["setrad"]]["photo"]="$photo";
$NaMerOset["addradArmof"]="$NameroBots.done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
elseif($mNamero->video && $NaMerOset["addradArmof"] =="$NameroBots.don"){
$video = $mNamero->video->file_id;
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset[$NaMerOset["setrad"]]["video"]="$video";
$NaMerOset["addradArmof"]="$NameroBots.done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
elseif($mNamero->voice && $NaMerOset["addradArmof"] =="$NameroBots.don"){
$voice = $mNamero->voice->file_id;
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset[$NaMerOset["setrad"]]["voice"]="$voice";
$NaMerOset["addradArmof"]="$NameroBots.done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
elseif($mNamero->audio && $NaMerOset["addradArmof"] == "$NameroBots.don"){
$audio = $mNamero->audio->file_id;
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset[$NaMerOset["setrad"]]["audio"]="$audio";
$NaMerOset["addradArmof"]="$NameroBots.done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
elseif($mNamero->sticker && $NaMerOset["addradArmof"] =="$NameroBots.don"){
$sticker = $mNamero->sticker->file_id;
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset[$NaMerOset["setrad"]]["sticker"]="$sticker";
$NaMerOset["addradArmof"]="$NameroBots.done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
elseif($mNamero->text && $NaMerOset["addradArmof"] =="$NameroBots.don"){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset[$NaMerOset["setrad"]]["text"]="$SALEH";
$NaMerOset["addradArmof"]="$NameroBots.done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
elseif($mNamero->document && $NaMerOset["addradArmof"] =="$NameroBots.don"){
$document = $mNamero->document->file_id;
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset[$NaMerOset["setrad"]]["animation"]="$document";
$NaMerOset["addradArmof"]="$NameroBots.done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}
if($SALEH and $NaMerOset[$SALEH]["text"]!=null and $NaMerOset[$SALEH]["text"]!="{"){
$army = $NaMerOset[$SALEH]["text"];
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>$NaMerOset[$SALEH]["text"],'reply_to_message_id'=>$mNamero->message_id,'disable_web_page_preview'=>true,
]);
}
elseif($SALEH and $NaMerOset[$SALEH]["photo"]!=null){
bot('sendphoto',[
'chat_id'=>$Nameroch,
'photo'=>$NaMerOset[$NaMerOset["setrad"]]["photo"],'reply_to_message_id'=>$mNamero->message_id, 
]);
}
elseif($SALEH !== "اضف رد" and $NaMerOset[$SALEH]["video"]!=null){
bot('sendvideo',[
'chat_id'=>$Nameroch,
'video'=>$NaMerOset[$SALEH]["video"],'reply_to_message_id'=>$mNamero->message_id, 
]);
}
elseif($SALEH and $NaMerOset[$SALEH]["animation"]!=null){
bot('senddocument',[
'chat_id'=>$Nameroch,
'document'=>$NaMerOset[$SALEH]["animation"],'reply_to_message_id'=>$mNamero->message_id, 
]);
}
elseif($SALEH and $NaMerOset[$SALEH]["audio"]!=null){
bot('sendaudio',[
'chat_id'=>$Nameroch,
'audio'=>$NaMerOset[$SALEH]["audio"],'reply_to_message_id'=>$mNamero->message_id, 
]);
}
elseif($SALEH and $NaMerOset[$SALEH]["voice"]!=null){
bot('sendvoice',[
'chat_id'=>$Nameroch,
'voice'=>$NaMerOset[$SALEH]["voice"],'reply_to_message_id'=>$mNamero->message_id, 
]);
}
elseif($SALEH and $NaMerOset[$SALEH]["sticker"]!=null){
bot('sendsticker',[
'chat_id'=>$Nameroch,
'sticker'=>$NaMerOset[$SALEH]["sticker"],'reply_to_message_id'=>$mNamero->message_id, 
]);
}
if($S_P_P1 == 'rdode'){
if($NaMerOset["setraddArmof"] !=null){
$keyboard["inline_keyboard"]=[];
foreach($NaMerOset["setraddArmof"] as $tx){
$keyboard["inline_keyboard"][] = [['text'=>$tx,'callback_data'=>"0"],['text'=>"🗑",'callback_data'=>"dll#".$tx]];
}
$keyboard["inline_keyboard"][] = [['text'=>"• رجوع •",'callback_data'=>'back']];
$reply_markup = json_encode($keyboard); 
bot('editmessagetext',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"
• مرحبا بك في قسم الردود 👮‍♀️

- يمكنك اضافه ردود وحذفها 
- يمكنك استخدام الاوامر (اضف رد-مسح رد) 

- اضغط على نص الزر لعرض محتواه . ",
'reply_markup'=>$reply_markup,
]);
}
else
{
bot('editmessagetext',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"🌀 لم تقم بأضافة ردود ",'parse_mode'=>"Markdown",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"• رجوع • ",'callback_data'=>'back']],
]])
]);
}
}
if($vss[0] == "dll"){
bot('editmessagetext',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"🌀 تم حذف الرد بنجاح ",
'parse_mode'=>"Markdown",
'reply_markup'=>$back
]);
$key = array_search($vss[1],$NaMerOset["setraddArmof"]);
unset($NaMerOset[$vss[1]]["sticker"]);
unset($NaMerOset[$vss[1]]["photo"]);
unset($NaMerOset[$vss[1]]["video"]);
unset($NaMerOset[$vss[1]]["text"]);
unset($NaMerOset[$vss[1]]["animation"]);
unset($NaMerOset[$vss[1]]["voice"]);
unset($NaMerOset[$vss[1]]["audio"]);
unset($NaMerOset["setraddArmof"][$key]);
$NaMerOset["setraddArmof"] = array_values($NaMerOset["setraddArmof"]); 
$NaMerOset["addradArmof"]="done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}

if($S_P_P1 == "delrd"){
if($NameroBots2 == $admin){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>" 🌀تم الحذف ",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$back
]);
unset($NaMerOset["setraddArmof"]);
unset($NaMerOset[$NaMerOset["setrad"]]["text"]);
unset($NaMerOset[$NaMerOset["setrad"]]["photo"]);
unset($NaMerOset[$NaMerOset["setrad"]]["video"]);
unset($NaMerOset[$NaMerOset["setrad"]]["voice"]);
unset($NaMerOset[$NaMerOset["setrad"]]["animation"]);
unset($NaMerOset[$NaMerOset["setrad"]]["sticker"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}

elseif($mNamero->text && $NaMerOset["data"] =="$NameroBots.don"){
$url = $upNamero->message->entities[0]->type;
 if($url != "url"){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset["azrar"][$NaMerOset["setrad"]]["text"]="$SALEH";
$NaMerOset["data"]="$NameroBots.done";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
}
##الازرار##

if($S_P_P1 == "azraaddrd"){
if($NameroBots2 == $admin){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"
• ارسل الان اسم الزر المراد اضافته
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$back
]);
$NaMerOset["data"]="s$NameroBots2";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
$url = $upNamero->message->entities[0]->type;
if($mNamero->text && $NaMerOset["data"] == "$NameroBots.don"){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"*تم الحفظ *".$xo.json_encode($NaMerOset["type"][$NaMerOset["setrad"]]["text"]),'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset["azrar"][$NaMerOset["setrad"]]["text"]="$SALEH";
unset($NaMerOset["data"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
elseif($SALEH and $NaMerOset["data"] =="s$NameroBots"){
bot('sendmessage',[
'chat_id'=>$Nameroch,
'text'=>"
• ارسل الان محتوي الزر 💯
",'parse_mode'=>"MARKDOWN",'reply_to_message_id'=>$mNamero->message_id, 
'reply_markup'=>$back
]);
$NaMerOset["data"]="$NameroBots.don";
$NaMerOset["setrad"]="$SALEH";
$NaMerOset["azrari"][]="$SALEH";
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));}

if($S_P_P1 == 'azrario'){
if($NaMerOset["azrari"] !=null){
$keyboard["inline_keyboard"]=[];
foreach($NaMerOset["azrari"] as $tx){
$keyboard["inline_keyboard"][] = [['text'=>$tx,'callback_data'=>"0"],['text'=>"🗑",'callback_data'=>"dll#".$tx]];
}
$keyboard["inline_keyboard"][] = [['text'=>" • اضف زر • ",'callback_data'=>'azraaddrd']];
$keyboard["inline_keyboard"][] = [['text'=>" • رجوع • ",'callback_data'=>'back']];
$reply_markup = json_encode($keyboard); 
bot('editmessagetext',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• مرحبا بك في قسم تعديل ازرار البوت 👋🏼

- يمكنك اضافه تعديلات للازرار وحذفها 
- اضغط على نص الزر لعرض التعديل الذي اصبح عليه الزر .",
'reply_markup'=>$reply_markup,
]);
}else{
bot('editmessagetext',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"• مرحبا بك في قسم تعديل ازرار البوت 👋🏼

- يمكنك اضافه تعديلات للازرار وحذفها 
- اضغط على نص الزر لعرض التعديل الذي اصبح عليه الزر ",'parse_mode'=>"Markdown",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
 [['text'=>" • اضف زر • ",'callback_data'=>'azraaddrd']], 
[['text'=>"• رجوع • ",'callback_data'=>'back']],
]])
]);
}
}
if($vss[0] == "dll"){
bot('editmessagetext',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>"* 🌀 تم حذف الزر بنجاح ",
'parse_mode'=>"Markdown",
'reply_markup'=>$back
]);
$NaMerOset["data"]="done";
$key = array_search($vss[1],$NaMerOset["azrari"]);
unset($NaMerOset["azrar"][$vss[1]]["sticker"]);
unset($NaMerOset["azrar"][$vss[1]]["photo"]);
unset($NaMerOset["azrar"][$vss[1]]["video"]);
unset($NaMerOset["azrar"][$vss[1]]["text"]);
unset($NaMerOset["azrar"][$vss[1]]["animation"]);
unset($NaMerOset["azrar"][$vss[1]]["voice"]);
unset($NaMerOset["azrar"][$vss[1]]["audio"]);
unset($NaMerOset["azrari"][$key]);
unset($NaMerOset["type"][$key]);
$NaMerOset["type"] = array_values($NaMerOset["type"]); 
$NaMerOset["azrari"] = array_values($NaMerOset["azrari"]); 
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}
if($S_P_P1 == "azradelrd"){
if($NameroBots2 == $admin){
bot('editMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
'text'=>" 🌀 تم الحذف ",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$back
]);
unset($NaMerOset["azrar"]);
unset($NaMerOset["azrari"]);
unset($NaMerOset["type"]);
file_put_contents("zune.txt",json_encode($NaMerOset,128|34|256));
}}
$update = json_decode(file_get_contents("php://input"));
file_put_contents("update.txt",json_encode($update));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;$type = $message->chat->type;
$message_id = $message->message_id;
$name = $message->from->first_name.' '.$message->from->last_name;
$user = strtolower($message->from->username);
$t =$message->chat->title; 
if(isset($update->callback_query)){
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = strtolower($up->from->username); 
$name = $up->from->first_name.' '.$up->from->last_name;
$message_id = $up->message->message_id;
$mes_id = $update->callback_query->inline_message_id; 
$data = $up->data;
}
if(isset($update->inline_query)){
$chat_id = $update->inline_query->chat->id;
$from_id = $update->inline_query->from->id;
$name = $update->inline_query->from->first_name.' '.$update->inline_query->from->last_name;
$text_inline = $update->inline_query->query;
$mes_id = $update->inline_query->inline_message_id; 
$user = strtolower($update->inline_query->from->username); 
}
$caption = $update->message->caption;
function getChatstats($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id='.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}
///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 

 function getmember($token,$idchannel,$from_id) {
  $join = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=$idchannel&user_id=".$from_id);
if((strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"Bad Request: user not found"') or strpos($join,'"ok": false') or strpos($join,'"status":"kicked"')) !== false){
$wataw="no";}else{$wataw="yes";}
return $wataw;
}
$admin = file_get_contents("admin.txt");
$anb =$admin;
$blp = $admin;
$usernamebot= bot("getme")->result->username;
$no3mak=$infobot['6'];
$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("sudo/ban.txt"));
$countban = count($ban)-1;
@$watawjson = json_decode(file_get_contents("../NAMERO.json"),true);
$st_ch_bots=$watawjson["info"]["st_ch_bots"];
$id_ch_sudo1=$watawjson["info"]["id_channel"];
$link_ch_sudo1=$watawjson["info"]["link_channel"];
$id_ch_sudo2=$watawjson["info"]["id_channel2"];
$link_ch_sudo2=$watawjson["info"]["link_channel2"];
$user_bot_sudo=$watawjson["info"]["user_bot"];
@$projson = json_decode(file_get_contents("pro.json"),true);
$pro=$projson["info"]["pro"];
$dateon=$projson["info"]["dateon"];
$dateoff=$projson["info"]["dateoff"];
$time=time()+(3600 * 1);
function isAdmin($tokensan3, $channel_id) {
    $url = "https://api.telegram.org/bot$tokensan3/getChatMember?chat_id=$channel_id&user_id=".explode(':', $tokensan3)[0];
    $response = json_decode(file_get_contents($url), true);
    return ($response['ok'] && in_array($response['result']['status'], ['administrator', 'creator']));
}
if ($message && ($st_ch_bots == "✅" || $st_ch_bots == "مفعل") && $pro != "yes") {
    $stuts1 = getmember($tokensan3, $id_ch_sudo1, $from_id);
    $stuts2 = getmember($tokensan3, $id_ch_sudo2, $from_id);
    if ($stuts1 == "no") {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'reply_to_message_id' => $message_id,
            'text' => "⁦⁉️⁩ عذرا عزيزي يجب الاشتراك في قناة البوت أولا وهذا يساعد مصنع المبرمج ناميرو علي الاستمرار 🗣
            
• ثم اضغط /start ⚙️️",
            'disable_web_page_preview' => true,
            'parse_mode' => "markdown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => "اضغط للاشتراك في القناة", 'url' => "https://t.me/$link_ch_sudo1"]]
                ]
            ])
        ]);
        exit; 
    }

    if ($stuts2 == "no") {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'reply_to_message_id' => $message_id,
            'text' => "⁦⁉️⁩ عذرا عزيزي يجب الاشتراك في قناة البوت أولا وهذا يساعد مصنع المبرمج ناميرو علي الاستمرار 🗣
            
• ثم اضغط /start ⚙️️",
            'disable_web_page_preview' => true,
            'parse_mode' => "markdown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => "اضغط للاشتراك في القناة", 'url' => "https://t.me/$link_ch_sudo2"]]
                ]
            ])
        ]);
        exit;
    }
}
/*if($S_P_P1 and $NaMerOset["azrar"][$S_P_P1]["text"]!=null and $NaMerOset["azrar"][$S_P_P1]["text"]!="{"){
$army = $NaMerOset["azrar"][$S_P_P1]["text"];
bot('sendmessage',[
'chat_id'=>$Nameroch2,
'text'=>$NaMerOset["azrar"][$S_P_P1]["text"],'reply_to_message_id'=>$mNamero->message_id,'disable_web_page_preview'=>true,
]);
}*/
$toch = json_encode([ 
'inline_keyboard'=>[
[['text'=>"جلب نسخه 🗳" ,'callback_data'=>"geet"]],
[['text'=>"رجوع" ,'callback_data'=>"back"]],
]]);
if($S_P_P1 == "ت" and $toch !=null){
bot('EditMessageText',[
'chat_id'=>$Nameroch2,
'message_id'=>$mNamero_id2,
"text"=>"*⚙: اهلا بك عزيزي 

في لوحه الاوامر ألخاصة لبوت الزخرفة
*",
 'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>$toch
]);
}
/*
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
$start = "
• اهلا بك ([$name](tg://user?id=$from_id)) في البوت الخاص بي ❤
- هذه هي الرسالة الافتراضية لانك لم تقم بإضافة رسالة ترحيب بعد.
";
}

function buildKeyboard($NaMerOset){
$keyboard = ["inline_keyboard"=>[]];
if(!empty($NaMerOset["azrari"])){
foreach($NaMerOset["azrari"] as $btn){
$keyboard["inline_keyboard"][] = [['text'=>$btn, 'callback_data'=>$btn]];
}
}

$keyboard["inline_keyboard"][] = [['text'=>'• رجوع •','callback_data'=>'geet']];
return json_encode($keyboard);
}

if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$start,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>buildKeyboard($NaMerOset)
]);
}

if($data == "home"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$start,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>buildKeyboard($NaMerOset)
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

*/