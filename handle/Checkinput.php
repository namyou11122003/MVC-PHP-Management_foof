<?php
function CheckInput($check)
{
    $check = trim($check);
    $check = stripslashes($check);
    $check = htmlspecialchars($check, ENT_QUOTES, 'UTF-8');
    return $check;
}
?>