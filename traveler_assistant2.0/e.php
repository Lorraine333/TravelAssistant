<?php
        //�������ݿ�        
        $Oracle_conn=oci_connect("SCOTT","tiger","orcl");
        /*���������䣨�˴�ִ��һ��������������ͷ����α�Ĵ洢���̣�
        �洢���̵Ĵ������£�
        create or replace procedure get_emp_inf
        (v_deptno in emp.deptno%type,v_res out sys_refcursor) 
        is
        begin
            open v_res for select * from emp where deptno=v_deptno; 
        end get_emp_inf;
        �洢���̵ĵ�������д���У�begin...end��call����д��
        */
        //���䲢����һ���α���
        $cur=oci_new_cursor($Oracle_conn);
        //�����������
        $query="call traveler_assistance_package.countries_in_same_region(:REGION_NAME,:v_cur)";
        $statement=oci_parse($Oracle_conn,$query);
        //�ṩ�������
        $REGION_NAME=$_POST['name'];
        //���α��������շ��ص��α����
        oci_bind_by_name($statement,":REGION_NAME",$REGION_NAME,16);
        oci_bind_by_name($statement,":v_cur",$cur,-1,OCI_B_CURSOR);
        //ִ��
        oci_execute($statement);
        //��ȡ���ص��α����ݵ��α���
        oci_execute($cur);
        //�����α�����
		echo "<span style='font-weight:bold;'>Region name : </span>";
		 while ($dat = oci_fetch_row($cur)) {
           
		    print($dat[0]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Country name : </span>";
			print($dat[1]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Currency name : </span>";
			print($dat[2]);
			
        }
        oci_free_statement($statement);
        oci_close($Oracle_conn);                
        ?>