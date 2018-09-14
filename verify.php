<?php
$access_token = 'tCFfog05pnNUDnqL2VZxR6NMUxeSrWq/Boi0+E8spF4A4ofr3rlSxUQAF1qbSWEWmZM7mG4blFkmD6j4JwmpW5YO+pNn9YDyGyXWG156fdHl8uO5ZEr15glAEWRbzR84wEfA0MFGTVPE1lkO8/CEmQdB04t89/1O/w1cDnyilFU=';
$proxy = 'velodrome.usefixie.com:80';
$proxyauth = 'fixie:W8B1EissNtwSwyk';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
