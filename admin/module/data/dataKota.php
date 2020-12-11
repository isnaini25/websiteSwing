<?php
$id_prov = $_POST["id_provinsi"];
$id = $_POST["id_kota"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_prov,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: f29f7334bcb46d3a163816501cd97b10"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_response = json_decode($response, TRUE);
  $data_kota = $array_response["rajaongkir"]["results"];

// echo "<pre>";
// print_r($data_kota);
// echo "</pre>";

echo "<option value=''>--Pilih Kota/Kabupaten--</option>";
foreach ($data_kota as $key => $tiap_kota) {
    echo "<option 
    value='".$tiap_kota["city_id"]."' 
    id_kota ='".$tiap_kota["city_id"]."'";
    if($tiap_kota["city_id"]==$id){echo "selected";}
    echo ">";
    echo $tiap_kota["type"]." ";
    echo $tiap_kota["city_name"];
    echo "</option>";
}
}