<?php
        //连接数据库        
        $Oracle_conn=oci_connect("SCOTT","tiger","orcl");
		$q = strtoupper($_GET["term"]); //获取用户输入的内容 
		
$query="select COUNTRY_NAME from WF_COUNTRIES where COUNTRY_NAME like '$q%'"; 
$statement=oci_parse($Oracle_conn,$query);
oci_execute($statement);
//查询数据库，并将结果集组成数组 
while (($row=oci_fetch_array($statement))) { 
    $result[] = array
	
	( 
        'label' => $row['COUNTRY_NAME'] 
    ); 
} 
echo json_encode($result);  //输出JSON数据 