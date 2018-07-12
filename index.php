<?php 

ob_start();

$API_KEY = '536611044:AAGdXLPBaZryB2aMK22z_bGS9VK5ziD2yec';
##------------------------------##
define('API_KEY',$API_KEY);
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
 function sendmessage($chat_id, $text, $model){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>$mode
 ]);
 }
 function sendphoto($chat_id, $photo, $captionl){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
 function sendaudio($chat_id, $audio, $caption, $title ,$performer){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 'title'=>$title,
 'performer'=>$performer
 ]);
 }
 function senddocument($chat_id, $document, $caption){
 bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>$document,
 'caption'=>$caption
 ]);
 }
 function sendsticker($chat_id, $sticker){
 bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>$sticker
 ]);
 }
 function sendvideo($chat_id, $video, $caption){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'video'=>$video,
 'caption'=>$caption
 ]);
 }
 function sendvoice($chat_id, $voice, $caption){
 bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>$voice,
 'caption'=>$caption
 ]);
 }
 function sendaction($chat_id, $action){
 bot('sendchataction',[
 'chat_id'=>$chat_id,
 'action'=>$action
 ]);
 }
 function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
//====================CyberTopia======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->userame;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
$fromid = $update->callback_query->message->from->id;
$reply = $update->message->reply_to_message;
$ali = file_get_contents("ali.txt");
$ADMIN = 433477722;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot".$API_KEY."/getChatMember?chat_id=@CyberTopia&user_id=".$chatid));
$tch = $truechannel->result->status;
//====================CyberTopia======================//
if(preg_match('/^\/([Ss]tart)/',$text)){
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>" سلام دوست من 👋

به ربات AllChanger خوش آمدید😀",
                'parse_mode'=>$mode,
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"تبدیلگر📌",'callback_data'=>"a"],['text'=>"راهنما📎",'callback_data'=>"b"]
              ]
              ]
        ])
            ]);
        }

  
  
//====================CyberTopia======================//

 elseif($text == "/panel" && $from_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
                'parse_mode'=>'html',
      'reply_markup'=>json_encode([
            'keyboard'=>[
              [
              ['text'=>"آمار"],['text'=>"پیام همگانی"]
              ],
              ],'resize_keyboard'=>true
        ])
            ]);
        }
elseif($text == "آمار" && $from_id == $ADMIN){
 sendaction($chat_id,'typing');
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
 sendmessage($chat_id , " آمار کاربران : $member_count" , "html");
}
elseif($text == "پیام همگانی" && $from_id == $ADMIN){
    file_put_contents("ali.txt","bc");
 sendaction($chat_id,'typing');
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
   [['text'=>'/panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "bc" && $from_id == $ADMIN){
    file_put_contents("ali.txt","none");
 SendAction($chat_id,'typing');
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی فرستاده شد.",
  ]);
 $all_member = fopen( "Member.txt", "r");
  while( !feof( $all_member)) {
    $user = fgets( $all_member);
   SendMessage($user,$text,"html");
  }
}
//====================CyberTopia======================//
elseif($data == "b"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"CyberTopia

راهنما

تبدیل عکس به استیکر و بر عکس🌌

  تبدیل صدا به آهنگ و بر عکس 🎵

 تبدیل فیلم به گیف 📹

 تبدیل فیلم به اهنگ🎵

 تبدیل متن به صدا فقط انگلیسی ساپورت میشه🎤

 تبدیل متن به عکس⛓
 
 تبدیل متن به استیکر🌌

به کانال ما به پیوندید📣

@metalfun

ما رو به دوستاتون معرفی کنید",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"ab"]
              ]
              ]
        ])
 ]);
}
elseif($data == "ab"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"سلام عضو جدید😊

 سام خوش اومدید به ربات تبدیلگر 📍",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
             [
              ['text'=>"تبدیلگر📌",'callback_data'=>"a"],['text'=>"راهنما📎",'callback_data'=>"b"]
              ]
              ]
        ])
 ]);
}
elseif($data == "a"){
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
bot('editmessagetext', [
                'chat_id' => $chatid,
'message_id'=>$message_id,
                'text' =>"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

 @Metalfun
[channel](https://t.me/Metalfun)

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌",
                'parse_mode'=>"Markdown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"ورود به کانال",'url'=>"https://t.me/Metalfun"]
              ]
              ]
        ])
]);
	
}else{
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"🎊خوب به بخش تبدیل خوش اومدی🎊

 بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"تبدیل عکس🌄",'callback_data'=>"c"],['text'=>"تبدیل به فیلم📹",'callback_data'=>"d"]
              ],
              [
              ['text'=>"تبدیل آهنگ🎵",'callback_data'=>"e"],['text'=>"تبدیل به متن📍",'callback_data'=>"g"]
              ]
              ]
        ])
 ]);
}
}
elseif($data == "back"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"🎊خوب به بخش تبدیل خوش اومدید🎊

 بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"تبدیل عکس🌄",'callback_data'=>"c"],['text'=>"تبدیل به فیلم📹",'callback_data'=>"d"]
              ],
              [
              ['text'=>"تبدیل آهنگ🎵",'callback_data'=>"e"],['text'=>"تبدیل متن 📍",'callback_data'=>"g"]
              ]
              ]
        ])
 ]);
}

//====================Photo======================//
elseif($data == "c"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"به بخش تبدیل عکس خوش اومدید🌄

بخش مورد نظر خود را انتخاب کنید😀 ",
 'parse_mode'=>"MarkDown",
     'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
            ['text'=>"عکس به فایل📁",'callback_data'=>"c1"],['text'=>"فایل به عکس🌌",'callback_data'=>"c2"]
            ],
             [
            ['text'=>"استیکر به عکس🌌",'callback_data'=>"c3"],['text'=>"عکس به استیکر🌄",'callback_data'=>"c4"]
            ],
             [
            ['text'=>"استیکر به فایل📁",'callback_data'=>"c5"],['text'=>"فایل به استیکر🌌",'callback_data'=>"c6"]
            ],
            [
              ['text'=>"Back◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back2"){
bot('sendmessage',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"🎊خوب به بخش تبدیل خوش اومدید🎊

بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
     'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
            ['text'=>"عکس به فایل📁",'callback_data'=>"c1"],['text'=>"فایل به عکس🌌",'callback_data'=>"c2"]
            ],
             [
            ['text'=>"استیکر به عکس🌌",'callback_data'=>"c3"],['text'=>"عکس به استیکر🌄",'callback_data'=>"c4"]
            ],
             [
            ['text'=>"استیکر به فایل📁",'callback_data'=>"c5"],['text'=>"فایل به استیکر🌌",'callback_data'=>"c6"]
            ],
            [
              ['text'=>"Back◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c1"){
file_put_contents("ali.txt","c1");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوب کاربر عزیز عکس خودتون را بفرستید تا تبدیل به فایلش کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c2"){
file_put_contents("ali.txt","c2");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوب کاربر عزیز فایل خودتون را بفرستید تا تبدیل به عکس کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c3"){
file_put_contents("ali.txt","c3");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوب کاربر عزیز استیکر خودتون را بفرستید تا تبدیل به عکس کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c4"){
file_put_contents("ali.txt","c4");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوب کاربر عزیز عکس خودتون را بفرستید تا تبدیل به استیکر کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c5"){
file_put_contents("ali.txt","c5");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز استیکر خودتون را بفرستید تا تبدیل به فایل png کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c6"){
file_put_contents("ali.txt","c6");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوب کاربر عزیز فایل png خودتون را بفرستید تا تبدیل به  استیکر کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($ali == "c1"){
file_put_contents("ali.txt","none");
$photo = $message->photo;
$file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>new CURLFile('CyberTopia.png'),
 ]);
unlink('CyberTopia.png');
}
elseif($ali == "c2"){
file_put_contents("ali.txt","none");
$document = $message->document;
$file = $document->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('CyberTopia.png'),
 ]);
unlink('CyberTopia.png');
 }
elseif($ali == "c3"){
file_put_contents("ali.txt","none");
$sticker = $message->sticker;
$file = $sticker->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('CyberTopia.png'),
 ]);
unlink('CyberTopia.png');
 }
elseif($ali == "c4"){
file_put_contents("ali.txt","none");
$photo = $message->photo;
$file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>new CURLFile('CyberTopia.png'),
 ]);
unlink('CyberTopia.png');
}
elseif($ali == "c5"){
file_put_contents("ali.txt","none");
$sticker = $message->sticker;
$file = $sticker->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>new CURLFile('CyberTopia.png'),
 ]);
unlink('CyberTopia.png');
 }
 elseif($ali == "c6"){
 file_put_contents("ali.txt","none");
$document = $message->document;
$file = $document->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>new CURLFile('CyberTopia.png'),
 ]);
unlink('CyberTopia.png');
 }
//====================video======================//
elseif($data == "d"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوش اومدید به بخش تبدیل فیلم🎥

بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
            ['text'=>"فیلم به آهنگ🎵",'callback_data'=>"d1"],['text'=>"فیلم به گیف🌌",'callback_data'=>"d2"]
            ],
              [
              ['text'=>"Back◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back3"){
bot('sendmessage',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوش اومدید به بخش تبدیل فیلم🎥

بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
            ['text'=>"فیلم به آهنگ🎵",'callback_data'=>"d1"],['text'=>"فیلم به گیف🌌",'callback_data'=>"d2"]
            ],
              [
              ['text'=>"Back◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "d1"){
file_put_contents("ali.txt","d1");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز فیلم خودتون را بفرستید تا تبدیل به  اهنگ کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back3"]
              ]
              ]
        ])
 ]);
}
elseif($data == "d2"){
file_put_contents("ali.txt","d2");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز فیلم خودتون را بفرستید تا تبدیل به  گیف کنم🤓😉",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back3"]
              ]
              ]
        ])
 ]);
}
elseif($data == "d3"){
file_put_contents("ali.txt","d3");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز فایل خودتون را بفرستید تا تبدیل به  فیلم کنم🤓😉",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back3"]
              ]
              ]
        ])
 ]);
}
elseif($ali == "d1"){
 file_put_contents("ali.txt","none");
$video = $message->video;
$file = $video->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.mp3',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>new CURLFile('CyberTopia.mp3'),
 ]);
 }
 elseif($ali == "d2"){
 file_put_contents("ali.txt","none");
$video = $message->video;
$file = $video->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.gif',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>new CURLFile('CyberTopia.gif'),
 ]);
unlink('CyberTopia.gif');
 }
//====================audio======================//
elseif($data == "e"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوش اومدید به بخش تبدیل اهنگ🎷

بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
            ['text'=>"صدا به آهنگ🎤",'callback_data'=>"e1"],['text'=>"آهنگ به صدا🎵",'callback_data'=>"e2"]
            ],
              [
              ['text'=>"Back◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back4"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوش اومدید به بخش تبدیل اهنگ🎷

بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
            ['text'=>"صدا به آهنگ🎤",'callback_data'=>"e1"],['text'=>"آهنگ به صدا🎵",'callback_data'=>"e2"]
            ],
              [
              ['text'=>"Back◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "e1"){
file_put_contents("ali.txt","e1");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز صدا خودتون را بفرستید تا تبدیل به  آهنگ کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back4"]
              ]
              ]
        ])
 ]);
}
elseif($data == "e2"){
file_put_contents("ali.txt","e2");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز اهنگ خودتون را بفرستید تا تبدیل به  صدا کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back4"]
              ]
              ]
        ])
 ]);
}
elseif($ali == "e1"){
 file_put_contents("ali.txt","none");
$voice = $message->voice;
$file = $voice->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.mp3',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>new CURLFile('CyberTopia.mp3'),
 ]);
unlink('CyberTopia.mp3');
 }
elseif($ali == "e2"){
 file_put_contents("ali.txt","none");
$audio = $message->audio;
$file = $audio->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('CyberTopia.ogg',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>new CURLFile('CyberTopia.ogg'),
 ]);
unlink('CyberTopia.ogg');
 }
//====================text======================//
elseif($data == "g"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوش اومدید به بخش تبدیل متن✒️

بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                        [
            ['text'=>"متن به استیکر🌄",'callback_data'=>"g1"],['text'=>"متن به عکس🌌",'callback_data'=>"g2"]
            ],            
            [
            ['text'=>"متن به صدا🎵",'callback_data'=>"g3"]
            ],
              [
              ['text'=>"Back◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back5"){
bot('sendmessage',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"خوش اومدید به بخش تبدیل متن✒️

بخش مورد نظر خودتونو انتخاب کنید و از ربات لذت ببرید📍",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                        [
            ['text'=>"متن به استیکر🌄",'callback_data'=>"g1"],['text'=>"متن به عکس🌌",'callback_data'=>"g2"]
            ],            
            [
            ['text'=>"متن به صدا🎵",'callback_data'=>"g3"]
            ],
              [
              ['text'=>"Back◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "g1"){
file_put_contents("ali.txt","g1");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز متن خودتون را بفرستید تا به استیکر تبدیل کنم🙃",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back5"]
              ]
              ]
        ])
 ]);
}
elseif($data == "g2"){
file_put_contents("ali.txt","g2");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز متن خودتون را بفرستید تا تبدیل عکس کنم🤓",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back5"]
              ]
              ]
        ])
 ]);
}
elseif($data == "g3"){
file_put_contents("ali.txt","g3");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "خوب کاربر عزیز متن خودتون را بفرستید تا تبدیل به صدا کنم 🙃
 فقط کلمه های انگلیسی 
 میتونید بصورت پینگلیش بفرستید 
 مثلا : Ehsan",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"Back◀️",'callback_data'=>"back5"]
              ]
              ]
        ])
 ]);
}
elseif($ali == "g1"){
 file_put_contents("ali.txt","none");
$photo = file_get_contents('http://www.iloveheartstudio.com/-/p.php?t='.urlencode($text).'&bc=FFCBDB&tc=000000&hc=ff0000&f=c&uc=true&ts=true&ff=PNG&w=500&ps=sq');
file_put_contents('logo.png',$photo);
bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>new CURLFile('logo.png'),
 ]);
unlink('logo.png');
 }
elseif($ali == "g2"){
 file_put_contents("ali.txt","none");
	$photo = file_get_contents('http://www.iloveheartstudio.com/-/p.php?t='.urlencode($text).'&bc=FFCBDB&tc=000000&hc=ff0000&f=c&uc=true&ts=true&ff=PNG&w=500&ps=sq');
	file_put_contents('logo.png',$photo);
bot('sendphoto',[
 'chat_id'=>$chat_id,
'photo'=>"http://api.monsterbot.ir/pic/?text=".$text."&bc=blue"
 ]);
unlink('logo.png');
 }
elseif($ali == "g3"){
 file_put_contents("ali.txt","none");
	$vo = file_get_contents('http://tts.baidu.com/text2audio?lan=en&ie=UTF-8&text='.urlencode($text));
 file_put_contents('vo.ogg',$vo);
 bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>new CURLFile('vo.ogg'),
 ]);
unlink('vo.ogg');
 }
//====================CyberTopia======================//

   ?>