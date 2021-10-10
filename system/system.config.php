<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'lib/mail.php';

if (isset($_SESSION['userId'])) {
  define('ID_USER', $_SESSION['userId']);
}

function XSS($var) {
  $var = trim($var);
  $var = htmlspecialchars($var);
  $var = stripslashes($var);

  return $var;
}

function clear($var){
  $var = trim($var);
  $var = abs($var);
  $var = intval($var);

  return $var;
}

function success($text) {
 echo '<div class="card">';
    echo '<div class="row">';
        echo '<div class="card" style="background: #689f38">';
            echo $text;
        echo '</div>';
    echo '</div>';
 echo '</div>';
}

function errors($text) {
 echo '<div class="card">';
    echo '<div class="row">';
        echo '<div class="card warning">';
            echo $text;
        echo '</div>';
    echo '</div>';
 echo '</div>';
}

function fatalError($text) {
 echo '<div class="card">';
    echo '<div class="row">';
        echo '<div class="card error">';
            echo $text;
        echo '</div>';
    echo '</div>';
 echo '</div>';
 exit();
}

function show($text) {
  echo '<div class="alert alert-primary" role="alert">';
  echo $text;
  echo '</div>';
}

function genRnd($number)  
{  
  $arr = array('a','b','c','d','e','f',  
   'g','h','i','j','k','l',  
   'm','n','o','p','r','s',  
   't','u','v','x','y','z',  
   'A','B','C','D','E','F',  
   'G','H','I','J','K','L',  
   'M','N','O','P','R','S',  
   'T','U','V','X','Y','Z',  
   '1','2','3','4','5','6',  
   '7','8','9','0');  
  $pass = "";  
  for($i = 0; $i < $number; $i++)  
  {    
    $index = rand(0, count($arr) - 1);  
    $pass .= $arr[$index];  
  }  
  return $pass;  
} 