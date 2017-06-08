<?php

function connect() {
   $link = @mysqli_connect('localhost', 'root', '', 'livraria'); // Database Information Required.

   if (!$link) {
      die('Erro de conexão: ' . mysqli_connect_error());
   }

   return $link;
}

function fListAuthors($link, $ISBN) {

    $sql = "SELECT nameF, nameL
            FROM bookauthors, bookauthorsbooks
            WHERE bookauthorsbooks.ISBN = '$ISBN'
            AND bookauthors.AuthorID = bookauthorsbooks.AuthorID
            ORDER BY nameL";

    $result = $result = mysqli_query($link, $sql)
          or die('SQL syntax error: ' . mysqli_error($link));
    $AuthorList ="";
    while ($row = mysqli_fetch_array($result)) {
        $nameF = $row['nameF'];
        $nameL = $row['nameL'];
        $AuthorList .= "<a href='SearchBrowse.php?search=".
                       "$nameL'>$nameF $nameL</a>, ";
    }

    
    return substr_replace($AuthorList, "",-2);
}


function fIsValidLength($input, $minLength, $maxLength) {

   $input = trim($input);
   $IsValid = (strlen($input) >= $minLength && strlen($input) <= $maxLength);
   return $IsValid;
}


function fIsValidEmail($email) {

   $email = trim($email);
   return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function fIsValidStateAbbr($state) {
   $ValidAbbr = array("AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL",
       "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA",
       "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC",
       "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT",
       "VA", "WA", "WV", "WI", "WY");


   $state = trim(strtoupper($state));

 
   return in_array($state, $ValidAbbr);
}

function fIsValidPhone($phone) {

   $pattern = "/[-,.()\s]/";
   $phone = preg_replace($pattern, '', $phone);

 
   return ((strlen($phone) == 10) && is_numeric($phone));
}


function fIsValidDate($date) {
   $date = str_replace('-', '/', $date);
   $test_arr = explode('/', $date);
   if (count($test_arr) == 3 &&
           is_numeric($test_arr[0]) &&
           is_numeric($test_arr[1]) &&
           is_numeric($test_arr[2])) {
      if (checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {
         return true;
      } else {
         return false; 
      }
   } else {
      return false;
   }
}
?>