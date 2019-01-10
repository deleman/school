<?php

 function remove_empty_internal($value) {
    if(!empty($value)){
        if($value != 0){
            return $value;
        }
    }
  }

  $a=[1,2,3,4,5,6,0,0,0,0];
  echo '<pre>';

  print_r($a);
  echo '<hr >';
  echo remove_empty_internal('').'<br >';
  echo remove_empty_internal(0).'<br >';
  echo remove_empty_internal(2).'<br >';
  echo '<hr >';

  foreach($a as $key => $value){
      echo remove_empty_internal($value);
  }