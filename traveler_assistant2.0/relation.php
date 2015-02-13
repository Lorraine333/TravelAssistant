<?php
							$Oracle_conn=oci_connect("SCOTT","tiger","orcl");
      
							//分配并返回一个游标句柄
							//$cur=oci_new_cursor($Oracle_conn);
							//创建调用语句
							$query="begin:res:=traveler_admin_package.all_dependent_objects(:OBJECT_NAME);end;";
							$statement=oci_parse($Oracle_conn,$query);
							//提供输入参数
							$OBJECT_NAME=$_POST['object'];
							$res;
							//绑定游标句柄，接收返回的游标参数
							oci_bind_by_name($statement,":OBJECT_NAME",$OBJECT_NAME);
							oci_bind_by_name($statement,":res",$res);
							//执行
							oci_execute($statement);
							//获取返回的游标数据到游标句柄
							//oci_execute($cur);o
							//遍历游标内容
								
								echo "<blockquote><font size='3' style='LINE-HEIGHT:25px'><span style='font-weight:bold;'>Object name : </span>";
								echo($res[0]);
								echo"</br>";
								echo "<span style='font-weight:bold;'>Object type : </span>";
								echo($res[1]);
								echo"</br>";
								echo "<span style='font-weight:bold;'>Referenced name : </span>";
								echo($res[2]);
								echo"</br>";
								echo "<span style='font-weight:bold;'>Referenced type : </span>";
								echo($res[3]);
								echo"</font>";
								echo"</bloackquote>";
							
							oci_free_statement($statement);
							oci_close($Oracle_conn);
							?>