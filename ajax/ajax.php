<?php 

ob_start();
session_start();
require_once 'baglan.php';
require_once 'fonksiyon.php';


$ilId = $_POST['il'];
$ilceList = $db->query("SELECT * FROM ilceler WHERE il_no='".$ilId."'")->fetchAll(PDO::FETCH_ASSOC);
echo '<option> İlçe Seçin </option> ';
foreach ($ilceList as $key => $value) {
 
  echo '<option value="' . $value['ilce_no'] . '">' . $value['isim'] . '</option>';
}
