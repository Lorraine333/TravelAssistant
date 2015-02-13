<?php
 
$Oracle_conn=oci_connect("SCOTT","tiger","orcl");
 
if (!$conn) { 
 
$e = oci_error(); 
 
print htmlentities($e['message']); 
 
exit; 
 
} 
?>