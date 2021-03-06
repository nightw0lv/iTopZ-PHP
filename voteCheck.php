<?php
// -------------------------------------------------
// check if user voted
// -------------------------------------------------
$user_ip = '172.69.110.136'; // for debug you can use random (xxx.xxx.xxx.xxx) ip address
$server_id = '325339'; // for debug you can use any id (int)
$api_key = 'd4IUPIZVgS-rkTvbL3fVGLEB5zhFdKq'; // for debug you can use 'DEMO'
$url = "https://itopz.com/check/$api_key/$server_id/$user_ip/";

echo 'has voted:' . getVote($url) . "<br>";
// prints
// JSon: has voted:{ "voted": "FALSE" }

// -------------------------------------------------
// check total server votes
// -------------------------------------------------
$server_id = '325339'; // for debug you can use any id (int)
$api_key = 'd4IUPIZVgS-rkTvbL3fVGLEB5zhFdKq'; // for debug you can use 'DEMO'
$url = "https://itopz.com/check/$api_key/$server_id/";

echo 'Server votes:' . getVote($url) . "<br>";
// prints
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
