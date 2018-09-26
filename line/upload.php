<?php
$files = $_FILES['file'];
$files2 = $_FILES['file2'];

if($files && $files2){
  // $encode = json_encode($files);
  // print_r($encode);
  echo "<hr><br>";
  
  echo "<pre>";
  print_r($_FILES);
  echo "</pre>";
} else {
  echo "Something went wrong";
}