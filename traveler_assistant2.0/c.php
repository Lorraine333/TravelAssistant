<?php


   $conn=oci_connect("SCOTT","tiger","orcl");
   $COUNTRY_NAME = $_REQUEST['name'];

   $stmt = OCIParse( $conn,"SELECT WF_FLAG.FLAG FROM WF_FLAG,WF_COUNTRIES WHERE WF_FLAG.COUNTRY_ID = WF_COUNTRIES.COUNTRY_ID AND WF_COUNTRIES.COUNTRY_NAME = Upper($COUNTRY_NAME)");
   OCIExecute($stmt);
   if( OCIFetchInto($stmt, $result) ) 
   { 
    $objs=OCIResult($stmt,'FLAG');  
    $FLAG=$objs->load();  
    echo $FLAG;
    }
OCIFreeStatement($stmt);
OCILogoff($conn);
?>

