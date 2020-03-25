<?php
// -------------------------------------------------
// check if user voted
// -------------------------------------------------
$user_ip = '172.69.110.136'; // for debug you can use random (xxx.xxx.xxx.xxx) ip address
$server_id = '325304'; // for debug you can use any id (int)
$api_key = 'GBE29hUSpc-tOA7bPaYaaeddddErHaV'; // for debug you can use 'DEMO'
$json = true;

if ($json == true)
	$url = "https://itopz.com/check/$api_key/$server_id/$user_ip/?json=true";
else
	$url = "https://itopz.com/check/$api_key/$server_id/$user_ip/";

echo 'has voted:' . getVote($url) . "<br>";
// prints
// Normal: has voted:FALSE
// JSon: has voted:{ "voted": "FALSE" }

// -------------------------------------------------
// check total server votes
// -------------------------------------------------
$server_id = '325304'; // for debug you can use any id (int)
$api_key = 'GBE29hUSpc-tOA7bPaYaaeddddErHaV'; // for debug you can use 'DEMO'
$json = false;

if ($json == true)
	$url = "https://itopz.com/check/$api_key/$server_id/?json=true";
else
	$url = "https://itopz.com/check/$api_key/$server_id/";

echo 'Server votes:' . getVote($url) . "<br>";

// prints
// Normal: Server votes:Array ( [server_votes] => 248 [server_rank] => 1 [next_rank_votes] => 0 [next_rank] => 1 )
// JSon: Server votes:{ "server_votes": 248, "server_rank": 1, "next_rank_votes": 0, "next_rank": 1 }

/**
 * check itopz api
 *
 * @param string $url
 * @return string|int
 */
function getVote($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
