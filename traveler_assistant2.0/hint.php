<?php
        //�������ݿ�        
        $Oracle_conn=oci_connect("SCOTT","tiger","orcl");
		$q = strtoupper($_GET["term"]); //��ȡ�û���������� 
		
$query="select COUNTRY_NAME from WF_COUNTRIES where COUNTRY_NAME like '$q%'"; 
$statement=oci_parse($Oracle_conn,$query);
oci_execute($statement);
//��ѯ���ݿ⣬���������������� 
while (($row=oci_fetch_array($statement))) { 
    $result[] = array
	
	( 
        'label' => $row['COUNTRY_NAME'] 
    ); 
} 
echo json_encode($result);  //���JSON���� 