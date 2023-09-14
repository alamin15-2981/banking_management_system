<?php
spl_autoload_register(function($name){
  require_once("php/$name.php");
});
function pre($data){
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}
?>