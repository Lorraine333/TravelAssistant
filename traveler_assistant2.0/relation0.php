<?php
        //�������ݿ�        
        $Oracle_conn=oci_connect("SCOTT","tiger","orcl");
      
        //���䲢����һ���α���
        $cur=oci_new_cursor($Oracle_conn);
        //�����������
        $query="call traveler_admin_package.dependent_objects_all(:OBJECT_NAME,:v_cur)";
        $statement=oci_parse($Oracle_conn,$query);
        //�ṩ�������
        $COUNTRY_NAME=$_POST['object'];
        //���α��������շ��ص��α����
        oci_bind_by_name($statement,":OBJECT_NAME",$OBJECT_NAME,16);
        oci_bind_by_name($statement,":v_cur",$cur,-1,OCI_B_CURSOR);
        //ִ��
        oci_execute($statement);
        //��ȡ���ص��α����ݵ��α���
        oci_execute($cur);
        //�����α�����
              

	        while ($dat = oci_fetch_row($cur)) {
            echo "<blockquote><font size='3' style='LINE-HEIGHT:25px' color='black'><span style='font-weight:bold;'>Object name : </span>";
			echo($dat[0]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Object type : </span>";
			echo($dat[1]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Reference name : </span>";
			echo($dat[2]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Reference type : </span>";
			echo($dat[3]);
			echo"</font>";
			echo"</bloackquote>";
        }
        oci_free_statement($statement);
        oci_close($Oracle_conn); 
		
		?>