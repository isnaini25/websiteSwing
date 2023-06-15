<?php


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
  //   echo $response;

  $array_response = json_decode($response, TRUE);
  $data_provinsi = $array_response["rajaongkir"]["results"];

  // echo "<pre>";
  // print_r($data_provinsi);
  // echo "</pre>";

  

  if (!empty($_POST['id_provinsi']) || !empty($_POST['page'])) {
    $id = $_POST['id_provinsi'];

    if (!empty($_POST['page'])) {
      foreach ($data_provinsi as $key => $tiap_provinsi) {
        if ($tiap_provinsi["province_id"] == $id) {
          echo $tiap_provinsi["province"];
        }
      }
    } else {
      echo "<option value=''>--Pilih Provinsi--</option>";
      foreach ($data_provinsi as $key => $tiap_provinsi) {
        
        echo "<option 
    value='" . $tiap_provinsi["province_id"] . "' 
    id_provinsi ='" . $tiap_provinsi["province_id"] . "'";
        if ($tiap_provinsi["province_id"] == $id) {
          echo "selected";
        }
        echo ">";
        echo $tiap_provinsi["province"];
        echo "</option>";
      }
    }
  } else {
    echo "<option value=''>--Pilih Provinsi--</option>";
    foreach ($data_provinsi as $key => $tiap_provinsi) {
      
      echo "<option 
    value='" . $tiap_provinsi["province_id"] . "' 
    id_provinsi ='" . $tiap_provinsi["province_id"] . "'>";
      echo $tiap_provinsi["province"];
      echo "</option>";
    }
  }
}
