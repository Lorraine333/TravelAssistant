<?php
							$Oracle_conn=oci_connect("SCOTT","tiger","orcl");
      
							//���䲢����һ���α���
							//$cur=oci_new_cursor($Oracle_conn);
							//�����������
							$query="begin:res:=traveler_admin_package.all_dependent_objects(:OBJECT_NAME);end;";
							$statement=oci_parse($Oracle_conn,$query);
							//�ṩ�������
							$OBJECT_NAME=$_POST['object'];
							$res;
							//���α��������շ��ص��α����
							oci_bind_by_name($statement,":OBJECT_NAME",$OBJECT_NAME);
							oci_bind_by_name($statement,":res",$res);
							//ִ��
							oci_execute($statement);
							//��ȡ���ص��α����ݵ��α���
							//oci_execute($cur);o
							//�����α�����
								
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