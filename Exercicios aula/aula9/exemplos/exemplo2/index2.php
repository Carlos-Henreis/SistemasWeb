<?php

define('PAGE_FOLDER', 'pages/');
include_once('functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (validate_form()) {
        require_once(PAGE_FOLDER.'confirma.php');
    } else {
        require_once(PAGE_FOLDER.'forms.php');
    }
} else {
    include_once(PAGE_FOLDER.'forms1.php');
}