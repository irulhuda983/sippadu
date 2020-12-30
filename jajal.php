<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://103.87.16.111/api/user/status/3204123420042020",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic ZXNpZ246cXdlcnR5",
    "Cookie: JSESSIONID=B593738F8EDE00BBB39220AC15D5F9FA"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
