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
 if (!empty($_POST['id_kelurahan'])||!empty($_POST['page'])) {
  $id = $_POST["id_kelurahan"];
  if(!empty($_POST['page'])){
    foreach ($data_kelurahan as $key => $tiap_kelurahan) {
      if($tiap_kelurahan[4] != $id_kecamatan){
        continue;
      }
        if (intval($tiap_kelurahan[1]) == $id) {
          echo $tiap_kelurahan[3];
        }

    }
  }else{
    echo "<option value=''>--Pilih Kelurahan-- </option>";
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
  }
 
} else {
  echo "<option value=''>--Pilih Kelurahan-- </option>";
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
