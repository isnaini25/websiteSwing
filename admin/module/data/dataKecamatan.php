<?php

$string = file_get_contents("kecamatan.json");
if ($string === false) {
    // deal with error...
}

$data_kecamatan = json_decode($string, true);
if ($data_kecamatan === null) {
    // deal with error...
}

// echo "<pre>";
// print_r($data_kecamatan);
// echo "</pre>";


if (!empty($_POST['id_kecamatan'])||!empty($_POST['page'])) {
    $id = $_POST['id_kecamatan'];
    
    if(!empty($_POST['page'])){
        foreach ($data_kecamatan as $key => $tiap_kecamatan) {
            if ($tiap_kecamatan["id"]==$id) {
                echo $tiap_kecamatan["nama"];
            }

        }
    }else{
          echo "<option value=''>--Pilih Kecamatan--</option>";
         
          foreach ($data_kecamatan as $key => $tiap_kecamatan) {
              echo "<option 
                    value='".$tiap_kecamatan["id"]."'
                    id_kecamatan='".$tiap_kecamatan["id"]."'";
              if ($tiap_kecamatan["id"]==$id) {
                  echo "selected";
              }
              echo ">";
              echo $tiap_kecamatan["nama"];
              echo "</option>";
          }
      }
}else{
    echo "<option value=''>--Pilih Kecamatan--</option>";
    foreach ($data_kecamatan as $key => $tiap_kecamatan) {
        echo "<option 
    value='".$tiap_kecamatan["id"]."'
    id_kecamatan='".$tiap_kecamatan["id"]."'>"; 
        echo $tiap_kecamatan["nama"];
        echo "</option>";
    }  
}
