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
		$cur1=oci_new_cursor($Oracle_conn);
        //�����������
        $query="call traveler_assistance_package.country_languages(:COUNTRY_NAME,:v_cur,:v_cur1)";
        $statement=oci_parse($Oracle_conn,$query);
        //�ṩ�������
        $COUNTRY_NAME=$_POST['name'];
        //���α��������շ��ص��α����
        oci_bind_by_name($statement,":COUNTRY_NAME",$COUNTRY_NAME,16);
        oci_bind_by_name($statement,":v_cur",$cur,-1,OCI_B_CURSOR);
		oci_bind_by_name($statement,":v_cur1",$cur1,-1,OCI_B_CURSOR);
        //ִ��
        oci_execute($statement);
        //��ȡ���ص��α����ݵ��α���
        oci_execute($cur);
		oci_execute($cur1);
        //�����α�����
		print "<span style='font-weight:bold;'>Spoken language : </span>";
		echo"</br>";
        while ($dat = oci_fetch_row($cur)) {
		print($dat[1]);
		echo"</br>";
			}
		echo "<span style='font-weight:bold;'>Official language : </span>";
		echo"</br>";
			  while ($dat1 = oci_fetch_row($cur1)) {
		 print($dat1[1]);
		 echo"</br>";
		 $i=1;
			}
        oci_free_statement($statement);
        oci_close($Oracle_conn);                
        ?>