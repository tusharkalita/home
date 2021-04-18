<?php
include('file1.php');
$jml_ol = new usersOnline();
if (count($jml_ol->error) == 0) {
    if ($jml_ol->count_users() == 1) {
        echo $jml_ol->count_users() . "<br />";
        echo "Your IP: " . $jml_ol->ipCheck();
        }
    else{
        echo $jml_ol->count_users() . "<br />";
        echo "Your IP: " . $jml_ol->ipCheck();
        }
}
?> 
