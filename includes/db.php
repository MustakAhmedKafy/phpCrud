<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "crud_operation");
$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($connect->connect_error) {
  die("<script>console.error('Connection failed: " . $connect->connect_error . "');</script>");
} else {
  echo "<script>console.log('Database connected successfully');</script>";
}
