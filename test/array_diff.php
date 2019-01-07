<?php

$term_names=[1,2,3,4,5,6,7,8];

$result = array_diff($term_names,[3]);

echo '<pre>';
print_r($result);