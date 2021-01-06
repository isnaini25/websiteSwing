<?php

$curl = curl_init();
$kurir = $_POST['kurir'];
$kota_asal = 501;
$kota_tujuan = $_POST['kota_tujuan'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=".$kota_asal."&destination=".$kota_tujuan."&weight=1700&courier=".$kurir,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: f29f7334bcb46d3a163816501cd97b10"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  
$data = json_decode($response, TRUE);
echo "<option selected disabled>--pilih layanan kurir--</option>";
  foreach ($data['rajaongkir']['results'][0]['costs'] as $key => $value) {
    foreach ($value['cost'] as $tarif) {
        echo "<option 
    value='".$value["service"]."'
    tarif='".$tarif["value"]."'";

    echo ">";
    echo $value["service"]." ".$tarif["etd"]." hari";
    echo "</option>";
       }  
    
}


}