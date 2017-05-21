<?php 
$phone = '(56) 5556 2222'; 
$phone_pattern =  '/^\([[:digit:]]{2}\)\s[[:digit:]]{4}\s[[:digit:]]{4}$/';
$match = preg_match($phone_pattern, $phone);
echo $match;
?>