<?php
$mysqli = new mysqli("localhost","root","","banhang");

// Check connection
if ($mysqli->connect_errno) {
  echo "Kết nối SQL lỗi: " . $mysqli->connect_error;
  exit();
}
?>