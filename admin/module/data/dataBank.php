<?php

$string = file_get_contents("bank.json");
if ($string === false) {
    // deal with error...
}

$data_bank = json_decode($string, true);
if ($data_bank === null) {
    // deal with error...
}

// echo "<pre>";
// print_r($data_bank);
// echo "</pre>";
echo "<option value=''>--Pilih Bank--</option>";
if (!empty($_POST['id_bank'])) {
    $id = $_POST['id_bank'];
    foreach ($data_bank as $key => $tiap_bank) {
        echo "<option 
    value='".$tiap_bank["code"]."'";
        if ($tiap_bank["code"]==$id) {
            echo "selected";
        }
        echo ">";
        echo $tiap_bank["code"]." ";
        echo $tiap_bank["name"];
        echo "</option>";
    }
}else{
    foreach ($data_bank as $key => $tiap_bank) {
        echo "<option 
    value='".$tiap_bank["code"]."'>";
        echo $tiap_bank["code"]." ";
        echo $tiap_bank["name"];
        echo "</option>";
    }  
}

?>