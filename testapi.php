<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://scommetix-football-betting-tips-v1.p.rapidapi.com/betting-tips",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: scommetix-football-betting-tips-v1.p.rapidapi.com",
		"x-rapidapi-key: 61e761d981msh805757ef9e60f6ap12e75fjsnf616ffe4fddc"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}