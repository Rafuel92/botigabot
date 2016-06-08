<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$array_of_names = array(
  'Raffaele',
  'Luca',
  'Giorgio',
  'Gianfilippo',
  'Davide',
  'Antonio',
  'Annachiara',
  'Giancarlo',
  'Gaetano Fabozzo',
  'Michele'
);

$rand_keys = array_rand($array_of_names, 3);
$name1 = $array_of_names[$rand_keys[0]];
$name2 = $array_of_names[$rand_keys[1]];
$name3 = $array_of_names[$rand_keys[2]];


if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$wordlist_1 = array(
  'apri un ticket a',
  'manda un email a',
  'come vah? apri un ticket a'
);

$rand_words_wordlist_1 = array_rand($wordlist_1, 1);
$word_wordlist_1_1 = $wordlist_1[$rand_words_wordlist_1];

$wordlist_2 = array(
  'in cui dici a',
  'e assegnalo a',
  'mettendo in copia'
);

$rand_words_wordlist_2 = array_rand($wordlist_2, 1);
$word_wordlist_2_1 = $wordlist_2[$rand_words_wordlist_2];



$wordlist_3 = array(
  'è importante, metti in copia derobertis',
  'di fare la cosa che ti ho scritto nel ticket di ieri'
);
//dpm($wordlist_3);
$rand_words_wordlist_3 = array_rand($wordlist_3, 1);
//dpm($rand_words_wordlist_3);
$word_wordlist_3_1 = $wordlist_3[$rand_words_wordlist_3];


//dpm($word_wordlist_1_1);
//dpm($word_wordlist_2_1);
//dpm($word_wordlist_3_1);

$text = trim($text);
$text = strtolower($text);
$ret = false;



$wordlist_meteo = array(
  'ah il serenoh prima della tempestah',
  'questo weekend porta pioggiah',
  'stamattina il volo dei piccioni era estivo quindi penso che sarah buon tempoh'
);

$rand_words_wordlist_meteo = array_rand($wordlist_meteo, 1);
$rand_meteo = $wordlist_meteo[$rand_words_wordlist_meteo];

switch($text) {
  case 'controllo' : 
    $ret = 'controllo puteca';
  break;
  case 'controllo puteca' : 
    $ret = 'ci sono 3 persone sedute quindi operative';
  break;
  case 'postibot' : 
    $ret = 'ho bisogno di una persona di carattere per questo progetto, come postibot';
  break;
}


if($ret){
  header("Content-Type: application/json");
  $parameters = array('chat_id' => $chatId, "text" => $ret);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}
