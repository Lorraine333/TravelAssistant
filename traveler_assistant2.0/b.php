<?php
        //�������ݿ�        
        $Oracle_conn=oci_connect("SCOTT","tiger","orcl");
       
        //���䲢����һ���α���
        $cur=oci_new_cursor($Oracle_conn);
        //�����������
        $query="call traveler_assistance_package.find_region_and_currency(:COUNTRY_NAME,:v_cur)";
        $statement=oci_parse($Oracle_conn,$query);
        //�ṩ�������
        $COUNTRY_NAME=$_POST['name'];
        //���α��������շ��ص��α����
        oci_bind_by_name($statement,":COUNTRY_NAME",$COUNTRY_NAME,16);
        oci_bind_by_name($statement,":v_cur",$cur,-1,OCI_B_CURSOR);
        //ִ��
        oci_execute($statement);
        //��ȡ���ص��α����ݵ��α���
        oci_execute($cur);
        //�����α�����
        while ($dat = oci_fetch_row($cur)) {
            echo "<span style='font-weight:bold;'>Country name : </span>";
		    print($dat[0]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Region name : </span>";
			print($dat[1]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Currency name : </span>";
			print($dat[2]);
			
        }
        oci_free_statement($statement);
        oci_close($Oracle_conn);                
        ?>