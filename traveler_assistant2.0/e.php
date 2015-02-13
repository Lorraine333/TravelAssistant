<?php
        //连接数据库        
        $Oracle_conn=oci_connect("SCOTT","tiger","orcl");
        /*定义调用语句（此处执行一个具有输入参数和返回游标的存储过程）
        存储过程的代码如下：
        create or replace procedure get_emp_inf
        (v_deptno in emp.deptno%type,v_res out sys_refcursor) 
        is
        begin
            open v_res for select * from emp where deptno=v_deptno; 
        end get_emp_inf;
        存储过程的调用语句的写法有：begin...end和call两种写法
        */
        //分配并返回一个游标句柄
        $cur=oci_new_cursor($Oracle_conn);
        //创建调用语句
        $query="call traveler_assistance_package.countries_in_same_region(:REGION_NAME,:v_cur)";
        $statement=oci_parse($Oracle_conn,$query);
        //提供输入参数
        $REGION_NAME=$_POST['name'];
        //绑定游标句柄，接收返回的游标参数
        oci_bind_by_name($statement,":REGION_NAME",$REGION_NAME,16);
        oci_bind_by_name($statement,":v_cur",$cur,-1,OCI_B_CURSOR);
        //执行
        oci_execute($statement);
        //获取返回的游标数据到游标句柄
        oci_execute($cur);
        //遍历游标内容
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