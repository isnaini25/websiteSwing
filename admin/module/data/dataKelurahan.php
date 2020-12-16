<?php

$id_kecamatan = $_POST["id_kecamatan"];
$string = file_get_contents("kelurahan.json");
if ($string === false) {
  // deal with error...
}

$array_response = json_decode($string, true);
$data_kelurahan = $array_response["records"];
if ($data_kelurahan === null) {
  // deal with error...
}

// echo "<pre>";
// print_r($data_kelurahan);
// echo "</pre>";
echo "<option value=''>--Pilih Kelurahan-- </option>";
if (!empty($_POST['id_kelurahan'])) {

  $id = $_POST["id_kelurahan"];
  
  foreach ($data_kelurahan as $key => $tiap_kelurahan) {
    if($tiap_kelurahan[4] != $id_kecamatan){
      continue;
    }
    echo "<option 
    value='".$tiap_kelurahan[1]."' 
    id_kelurahan='".$tiap_kelurahan[1]."'";
      if (intval($tiap_kelurahan[1]) == $id) {echo "selected";}
      echo ">";
      echo $tiap_kelurahan[3];
      echo "</option>";
    
  }
} else {
  foreach ($data_kelurahan as $key => $tiap_kelurahan) {
    if($tiap_kelurahan[4] != $id_kecamatan){
      continue;
    }
      echo "<option 
     value='" . $tiap_kelurahan[1] . "'
     id_kelurahan='" . $tiap_kelurahan[1] . "'>";
      echo $tiap_kelurahan[3];
      echo "</option>";
    
  }
}
