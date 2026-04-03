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
$start = "• اهلا بك عزيزي ، ([$name](tg://user?id=$from_id)) في بوت أهمسلي 🤍

💬| يمكنك استخدامي لارسال رسائل سرية (همسات) في اي مجموعة تشاء

🔮| انا اعمل عن بعد, هذا يعني انك تستيطع استخدامي دون الحاجة لوجودي في المجموعة

🐝| كل ماعليك هو ارسال (معرف الشخص او توجيه او ايدي) الشخص المراد الهمس له.";
}
function buildKeyboard($NaMerOset, $name){
global $mycoin, $thoiltext, $hdiatext, $kmiatext;
$keyboard = ["inline_keyboard" => []];
$keyboard["inline_keyboard"][] = [['text'=>"• استخدام البوت اونلاين •",'switch_inline_query'=>""]];

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
///by @NameroBots
//by @S_P_P1
/// Programmer Namero (Rights are not allowed to change ⚡) 

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
  #همسة
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$username0 = $message->from->username;
$text = $message->text;
$message_id = $message->message_id;
$type = $message->chat->type;
$from_id = $message->from->id;
$username22 = $message->chat->username;
$cuser    = $update->callback_query->from->username;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$scam = ['[','*',']','_','(',')','`','َ','ٕ','ُ','ِ','ٓ','ٓ','ٰ','ٖ','ً','ّ','ٌ','ٍ','ْ','ٔ',';'];
$name = str_replace($scam,null,$message->from->first_name." ".$message->from->last_name);
$name2 = str_replace($scam,null,$update->callback_query->from->first_name." ".$update->callback_query->from->last_name);
$chat_id2 = $update->callback_query->message->chat->id;
$from_id2 = $update->callback_query->from->id;
$message_id2 = $update->callback_query->message->message_id;
$user = $update->callback_query->from->username;
$hamsa = json_decode(file_get_contents("hamsa.json"),true);
function save($array){
file_put_contents("hamsa.json",json_encode($array));
}
function filterName($name){
  $scam = ['[','*',']','_','(',')','`','َ','ٕ','ُ','ِ','ٓ','ٓ','ٰ','ٖ','ً','ّ','ٌ','ٍ','ْ','ٔ'];
  return str_replace($scam,null,$name);
 }
$userbot = "$Userbot";
if($message->reply_to_message->from->is_bot == true || $message->reply_to_message->from->is_bot == 1 ){
if($type !== "private"){
if($text == "همسه" || $text == "همسة" || $text == "اهمس" || $text == "أهمس"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"لا يمكنك عمل همسة لبوت 🙄",
'reply_to_message_id'=>$message->message_id,
]);
exit;}}}
if($message->reply_to_message->from->id == $from_id && $type !== "private"){
if($text == "همسه" || $text == "همسة" || $text == "اهمس" || $text == "أهمس"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"لا يمكنك عمل همسة لنفسك 🙄",
'reply_to_message_id'=>$message->message_id,
]);
exit;}}
if($text == "/start" && $type == "private"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
       'text'=>"
",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
]])
]);
}
if($data == "hamsamedia"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"قم بارسال كلمة 'همسه' للبوت ومن ثم اتبع الخطوات ",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>'backtoback']],
],
]),
]);
}
if($data == "backtoback"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"اهلاً بك في بوت الهمسة",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'همسة ميديا','callback_data'=>'hamsamedia']],
[['text'=>'همسة بالرد','callback_data'=>'hamsareply'],['text'=>'همسة بالمعرف','callback_data'=>'hamsauser']],
[['text'=>'همسة بالانلاين','callback_data'=>'hamsainline']],
],
]),
]);
return false;
}
if($data == "hamsauser"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"عن طريق ارسال همسه + معرف في المجموعة ومن ثم اتباع الخطوات",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>'backtoback']],
],
]),
]);
}
if($data == "hamsareply"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"عن طريق الرد على إحدى رسائل شخص بكلمة همسه ومن ثم اتباع الخطوات",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>'backtoback']],
],
]),
]);
}
if($data == "hamsainline"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"ضع معرف البوت ثم الكلام + معرف الشخص",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>'backtoback']],
],
]),
]);
}
function info($put,$key){
if($put && $key == "name"){
$get = file_get_contents("https://api.telegram.org/bot".$API_KEY."/getChat?chat_id=$put"); 
$js = json_decode($get); 
$res = $js->result; 
$name = filterName($res->first_name);
return $name;}}
if($text == "همسة" or $text == "همسه" or $text == "أهمس" or $text == "اهمس"){
if($message->reply_to_message->message_id){
if($type !== "private"){
$hamsa[$from_id]['chat_id'] = $message->chat->id; 
$hamsa[$from_id]['for'] = $message->from->id; 
$hamsa[$from_id]['to'] = 
$message->reply_to_message->from->id;
$hamsa[$from_id]['message_id'] =$message->message_id;
$hamsa[$from_id]['reply_message_id'] = $message->reply_to_message->message_id;
save($hamsa);
$eee = bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك يمكنك الضغط على الزر وإرسال الهمسة في خاص البوت",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"قم بإرسال الهمسة بالخاص ✨","callback_data"=>'hamsa'."|".$from_id]],
],
]),
]);
$hamsa[$from_id]['msg_id_bot']= $eee->result->message_id;
save($hamsa);
}}}
 if($data == "hamsa|$from_id2"){ 
unset($hamsa[$from_id2]['hamsa']);
save($hamsa);
$hamsa[$from_id2]['hamsa'] = "send_hamsa";
save($hamsa);
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'url'=>"https://t.me/$Userbot?start=hamsa",
]);
}
if($text == "/start hamsa" && $hamsa[$from_id]['hamsa'] == "send_hamsa"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"حسناً ارسل الهمسة الآن",
]);
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$hamsa[$from_id]['hamsa'] = "sendhamsa";
save($hamsa);
exit;
}
if($text && $text !== "/start" && $hamsa[$from_id]['hamsa'] == "sendhamsa"){
if($type == "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ارسال الهمسة بنجاح",
]);
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$hamsa[$from_id]['text']=$text;
save($hamsa);
$info= info($from_id,"name");
$get_msg_id = bot('SendMessage',[
'chat_id'=>$hamsa[$from_id]['chat_id'],
'parse_mode'=>"MarkDown",
'text'=>"
صديقي لديك همسة من 

[$name](tg://user?id=$from_id)",
'reply_to_message_id'=>$hamsa[$from_id]['reply_message_id'],
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"عرض الهمسة","callback_data"=>$hamsa[$from_id]['to']."&".$from_id],['text'=>"حذف الهمسه",'callback_data'=>"del#".$from_id]],
],
]),
]);
$hamsa['hamsa'][$get_msg_id->result->message_id] = $text;
save($hamsa);
bot('DeleteMessage',[
'chat_id'=>$hamsa[$from_id]['chat_id'],
'message_id'=>$hamsa[$from_id]['msg_id_bot'],
]);
bot('DeleteMessage',[
'chat_id'=>$hamsa[$from_id]['chat_id'],
'message_id'=>$hamsa[$from_id]['message_id'],
]);
unset($hamsa[$from_id]);
save($hamsa);
}}
$explode = explode("&",$data);
$explod = explode("#",$data);
if(in_array($from_id2,$explode) && preg_match("/(&)/",$data)){
$send = bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>$hamsa['hamsa'][$message_id2],
  'show_alert'=>true,
]);
if($from_id2 == $explode[0] && $send->ok !== true){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسه طويلة جدا ، لذلك تم ارسال الهمسه لك في الخاص",
  'show_alert'=>true,
]);
$tt = bot('SendMessage',[
'chat_id'=>$from_id2,
'text'=>$hamsa['hamsa'][$message_id2],
]);
bot('SendMessage',[
'chat_id'=>$from_id2,
'parse_mode'=>"MarkDown",
'text'=>"الهمسه مرسلة لك من قبل 

[$explode[1]](tg://user?id=$explode[1])",
'reply_to_message_id'=>$tt->result->message_id,
]);
unset($hamsa['hamsa'][$message_id2]);
save($hamsa);
}
if($from_id2 == $explode[1] && $send->ok !== true){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسه طويلة جدا ، لذلك سيتم إرسال الهمسة للشخص في الخاص",
  'show_alert'=>true,
]);
}
}elseif(!in_array($from_id2,$explode) && preg_match("/(&)/",$data)){
bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>" الهمسه ليست الك ❗️ ",
  'show_alert'=>true,
]);
bot('SendMessage',[
'chat_id'=>$explode[1],
'parse_mode'=>"MarkDown",
'text'=>"هناك شخص يحاول كشف همستك 

الشخص : [$name2](tg://user?id=$from_id2)".

"\n\nرابط الهمسة : https://t.me/c/".str_replace("-100","",$chat_id2)."/$message_id2",
]);
}
if($explod[1] == $from_id2){
bot('DeleteMessage',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
]);
unset($hamsa['hamsa'][$message_id2]);
save($hamsa);
}elseif($explod[1] !== $from_id2 && preg_match("/(#)/",$data)){
bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>"لحذف الهمسة يجب أن تكون انت من ارسل هذه الهمسة ",
  'show_alert'=>true
]);
}
$inline   = $update->inline_query->query;
$in_id       = $update->inline_query->from->id;
$msg_id   = $update->inline_query->inline_message_id;
$username = $update->inline_query->from->username;
$cid      = $update->callback_query->from->id;
if ($inline == null) { 
bot('answerInlineQuery',[ 
'inline_query_id'=>$update->inline_query->id,     
'results' => json_encode([[ 
'type'=>'article', 
'description'=>"@$Userbot سلام عليكم @user", 
'id'=>base64_encode(rand(5,555)), 
'title'=>"أكتب محتوى الهمسة ثم يوزر الشخص",'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"طريقة الهمسة : \n لشخص واحد فقط :\n @$Userbot سلام عليكم‏ @user \n لأكثر من شخص : \n @$Userbot سلام عليكم‏ @user @‏user"],]])]); 
}
if(preg_match("/(.*) (@all)$/",$inline,$q)){
$rand = rand(0,10000000);
$rree = base64_encode(rand(5,555));
    bot('answerInlineQuery',[ 'inline_query_id'=>$update->inline_query->id,    
            'results' => json_encode([[
                'type'=>'article',
                'id'=>$rree,
                'title'=>"هـذه الـهـمـسـة للجميع ",
             'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"هـذه الـهـمـسـة للجميع "],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>' 🔒 اضغط للرؤيه ','callback_data'=>'hamsa'.$rand.'>'.'all']
                ],
             ]]
          ]])
        ]);
$hamsa['hamsa'.$rand] = $q[1];
save($hamsa);
return false;
}
if ($inline !== null && !preg_match("/(photo|sticker|audio|voice|video)#(.*) (@)(.*)/",$inline) && !preg_match("/^(@)/",$inline) && !preg_match("/(@all)/",$inline)) {
$ert = explode("@",$inline);
if(!isset($ert[0])){
return;}
$ee = explode(" ",$inline);
for($i=0;$i<count($ee);$i++){
if(preg_match("/(@)/",$ee[$i])){
$ok .= "or".str_replace("@","",$ee[$i]);
}elseif(is_numeric($ee[$i])){
$ok .= "or".$ee[$i];
}}
if($ok == null){
return;}
if(preg_match("/(bot)/",$ok) or preg_match("/(bot)/",$ok)){
return;}
$tttt = str_replace([$ok,"or"],"",$inline);
if($tttt == null){return;}
$rand = rand(0,10000000);
$rree = base64_encode(rand(5,555));
preg_match_all("/(@)(.*)/",$inline,$r);
    bot('answerInlineQuery',[ 'inline_query_id'=>$update->inline_query->id,    
            'results' => json_encode([[
                'type'=>'article',
                'id'=>$rree,
                 'title'=>"هذه همسه سريه هو فقط من يستطيع روئيتها 🧌: ".$r[0][0]." ",
             'input_message_content'=>['parse_mode'=>'HTML','message_text'=>" هذه همسه سريه هو فقط من يستطيع روئيتها 🧌: ".$r[0][0]." "],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>' 🔒 اضغط للرؤيه','callback_data'=>'hamsa'.$rand.'or'.$in_id.$ok]
                ],
             ]]
          ]])
        ]);

$ey = preg_replace(["/@(.*)/","/or\d/"],"",$inline);
$ey = str_replace($ok,"",$ey);
$hamsa['hamsa'.$rand] = $ey;
save($hamsa);
}
    $ex = explode("or", $data);
    if (in_array($cuser,$ex) || in_array($cid,$ex)) {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>$hamsa[$ex[0]],
            'show_alert'=>true
            ]);
    }
$exx = explode(">", $data);
    if($exx[1] == "all") {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>$hamsa[$exx[0]],
            'show_alert'=>true
            ]);
    }

if(isset($ex[0])){
   if (!in_array($cuser,$ex) && !in_array($cid,$ex)) {
if(preg_match("/(or)/",$data) && !preg_match("/(form)/",$data) && !preg_match("/(=)/",$data)){
        bot('answerCallbackQuery',[
    'callback_query_id'=>$update->callback_query->id,
            'text'=>" الهمسه ليست الك ❗️  ",
            'show_alert'=>true,
            ]);
    }}}
if(preg_match("/^(همسه|همسة|أهمس|اهمس) (@)(.*)$/",$text,$match)){
if($type !== "private"){
$eeee = explode(" ",$match[3]);
if(is_string($eeee[0]) && !preg_match("/(bot)/",$eeee[0]) && !preg_match("/(bot)/",$eeee[0])){
if($eeee[0] == $username0){return;}
$hamsa[$from_id]['for'] = $from_id;
$hamsa[$from_id]['to'] = $eeee[0];
$hamsa[$from_id]['chat'] = $chat_id;
$hamsa[$from_id]['message_id'] = $message->message_id;
save($hamsa);
$eee = bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك يمكنك الضغط على الزر وإرسال الهمسة في خاص البوت",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"قم بإرسال الهمسة بالخاص ✨","callback_data"=>'hamsa'."form".$from_id]],
],
]),
]);
$hamsa[$from_id]['msg_id_bot']= $eee->result->message_id;
save($hamsa);
}}}
 if($data == "hamsaform$from_id2"){ 
unset($hamsa[$from_id2]['hamsa']);
save($hamsa);
$hamsa[$from_id2]['hamsa'] = "send_hamsauser";
save($hamsa);
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'url'=>"https://t.me/$Userbot?start=hamsa_user",
]);
}
if($text == "/start hamsa_user" && $hamsa[$from_id]['hamsa'] == "send_hamsauser"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"حسناً ارسل الهمسة الآن",
]);
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$hamsa[$from_id]['hamsa'] = "sendhamsauser";
save($hamsa);
exit;
}
if($text !== "/start" && $hamsa[$from_id]['hamsa'] == "sendhamsauser"){
if($type == "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ارسال الهمسة بنجاح",
]);
$too = $hamsa[$from_id]['to'];
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$get_msg_id = bot('SendMessage',[
'chat_id'=>$hamsa[$from_id]['chat'],
'parse_mode'=>"MarkDown",
'text'=>"
صديقي [@$too] لديك همسة من 

[$name](tg://user?id=$from_id)",
'reply_to_message_id'=>$hamsa[$from_id]['reply_message_id'],
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"عرض الهمسة","callback_data"=>$hamsa[$from_id]['to']."=".$from_id],['text'=>"حذف الهمسة ",'callback_data'=>"del#".$from_id]],
],
]),
]);
$hamsa['hamsa'][$get_msg_id->result->message_id] = $text;
save($hamsa);
bot('DeleteMessage',[
'chat_id'=>$hamsa[$from_id]['chat'],
'message_id'=>$hamsa[$from_id]['msg_id_bot'],
]);
bot('DeleteMessage',[
'chat_id'=>$hamsa[$from_id]['chat'],
'message_id'=>$hamsa[$from_id]['message_id'],
]);
unset($hamsa[$from_id]);
save($hamsa);
}}
$a = explode("=",$data);
if($cuser == $a[0] || $from_id2 == $a[1]){
$sendh = bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>$hamsa['hamsa'][$message_id2],
  'show_alert'=>true,
]);
if($cuser == $a[0] && $sendh->ok !== true){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسه طويلة جدا ، لذلك تم ارسال الهمسه لك في الخاص",
  'show_alert'=>true,
]);
$tt = bot('SendMessage',[
'chat_id'=>$from_id2,
'text'=>$hamsa['hamsa'][$message_id2],
]);
bot('SendMessage',[
'chat_id'=>$from_id2,
'parse_mode'=>"MarkDown",
'text'=>"الهمسه مرسلة لك من قبل 

[$explode[1]](tg://user?id=$explode[1])",
'reply_to_message_id'=>$tt->result->message_id,
]);
unset($hamsa['hamsa'][$message_id2]);
save($hamsa);
}
if($from_id2 == $a[1] && $sendh->ok !== true){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسه طويلة جدا ، لذلك سيتم إرسال الهمسة للشخص في الخاص",
  'show_alert'=>true,
]);
}
}elseif(!in_array($cuser,$a) && preg_match("/(=)/",$data) && !in_array($from_id2,$a)){
bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسة ليست لك",
  'show_alert'=>true,
]);
bot('SendMessage',[
'chat_id'=>$a[1],
'parse_mode'=>"MarkDown",
'text'=>"هناك شخص يحاول كشف همستك 

الشخص : [$name2](tg://user?id=$from_id2)".

"\n\nرابط الهمسة : https://t.me/c/".str_replace("-100","",$chat_id2)."/$message_id2",
]);
}
if($text == "همسه" || $text == "همسة" ||$text == "اهمس" || $text == "أهمس"){
if($type == "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
حسناً يمكنك ارسل صوتية ، مقطع صوتي ، فيديو ، صورة ، ملصق ",
]);
$hamsa[$from_id]['hamsa'] = "hamsa_media";
save($hamsa);
exit;
}}
if($message->voice || $message->audio || $message->video || $message->photo || $message->sticker){
if($hamsa[$from_id]['hamsa'] == "hamsa_media" && $type == "private"){
if($message->voice){
$file_id = $message->voice->file_id;
$type_media = "الصوتية";
$media = "voice";
}elseif($message->audio){
$file_id = $message->audio->file_id;
$type_media = "المقطع الصوتي";
$media = "audio";
}elseif($message->video){
$file_id = $message->video->file_id;
$type_media = "الفيديو";
$media = "video";
}elseif($message->photo){
$file_id = $message->photo[0]->file_id;
$type_media = "الصورة";
$media = "photo";
}elseif($message->sticker){
$file_id = $message->sticker->file_id;
$type_media = "الملصق";
$media = "sticker";
}
$rendom = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWYZ0123456789'),1,5);
bot('SendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"تم حفظ $type_media بنجاح 💯
\n
كود الهمسة 

`$media#$rendom`

يمكنك الهمسة الميديا بالشكل التالي 

`@$Userbot $media#$rendom @` +id or user


example : 

`@$Userbot $media#$rendom @username`

`@$Userbot $media#$rendom @164667787`

",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'مشاركة الهمسة','switch_inline_query'=>"$media#$rendom"]],
],
]),
]);
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$hamsa[$rendom] = $file_id;
save($hamsa);
}
}
if(preg_match("/(photo|sticker|audio|voice|video)#(.*) (@)(.*)/",$inline,$match)){
if(!$hamsa[$match[2]]){return;}
if($match[4] == null){return;}
if(is_numeric($match[4])){$u_hamsa="[$match[4]](tg://user?id=$match[4])";}else{$u_hamsa="[@$match[4]]";}
    bot('answerInlineQuery',[ 'inline_query_id'=>$update->inline_query->id,   
        'cache_time'=>'300', 
            'results' => json_encode([[
                'type'=>'article',
                'id'=>base64_encode(rand(5,555)),
                   'title'=>"اهذه همسه سريه الى  $match[4]  هو فقط من يستطيع روئيتها ",
             'input_message_content'=>['parse_mode'=>'Markdown','message_text'=>"اهذه همسه سريه الى $u_hamsa هو فقط من يستطيع روئيتها "],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>' 🔒 اضغط للرؤيه','callback_data'=>$in_id."~".$match[4]."~".$match[1]."~".$match[2]]
                ],
             ]]
          ]])
        ]);

}
$rrr = explode("~",$data);
if(preg_match("/(~)/",$data)){
if($from_id2 == $rrr[1] || $cuser == $rrr[1]){
$send = bot('Send'.$rrr[2],[
'chat_id'=>$from_id2,
$rrr[2]=>$hamsa[$rrr[3]],
]);
bot('SendMessage',[
'chat_id'=>$from_id2,
'parse_mode'=>"MarkDown",
'text'=>"*هذه الهمسة مرسلة إليك من قبل*

[$rrr[0]](tg:user?id=$rrr[0])",
'reply_to_message_id'=>$send->result->message_id,
]);
bot('EditMessageText',[
'inline_message_id'=>$update->callback_query->inline_message_id,
'parse_mode'=>"MarkDown",
'text'=>"عزيزي [$from_id2](tg://user?id=$from_id2)

*تم إرسال همسة الميديا اليك بالخاص*",
]);
unset($hamsa[$rrr[3]]);
save($hamsa);
}}
if(!in_array($from_id2,$rrr) && !in_array($cuser,$rrr) && preg_match("/(~)/",$data)){
bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسة ليست لك",
  'show_alert'=>true,
]);}
if($text == "همسة" or $text == "همسه" or $text == "أهمس" or $text == "اهمس"){
if(!$message->reply_to_message->message_id){
if($type !== "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"بوت الهمسة : @$Userbot",
'reply_to_message_id'=>$message_id,
]);
}}}

