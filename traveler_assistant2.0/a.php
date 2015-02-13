		<script type="text/javascript">

    $("#frame").click(function() {
        Dialog.frame("luckyYou","a.php", {
            "width":"800px",
            "title":"hello world!",
            'modal':true,
            "closeModal":false,
            "dTopNum":"100px"
        });
    });
</script>
    <?php
        //连接数据库        
        $Oracle_conn=oci_connect("SCOTT","tiger","orcl");
      
        //分配并返回一个游标句柄
        $cur=oci_new_cursor($Oracle_conn);
        //创建调用语句
        $query="call traveler_assistance_package.country_demographics(:COUNTRY_NAME,:v_cur)";
        $statement=oci_parse($Oracle_conn,$query);
        //提供输入参数
        $COUNTRY_NAME=$_POST['name'];
        //绑定游标句柄，接收返回的游标参数
        oci_bind_by_name($statement,":COUNTRY_NAME",$COUNTRY_NAME,16);
        oci_bind_by_name($statement,":v_cur",$cur,-1,OCI_B_CURSOR);
        //执行
        oci_execute($statement);
        //获取返回的游标数据到游标句柄
        oci_execute($cur);
        //遍历游标内容
              

	        while ($dat = oci_fetch_row($cur)) {
            echo "<span style='font-weight:bold;'>Country name : </span>";
			echo($dat[0]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Location : </span>";
			echo($dat[1]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Capital : </span>";
			echo($dat[2]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Population : </span>";
			echo($dat[3]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Airport Number : </span>";
			echo($dat[4]);
			echo"</br>";
			echo "<span style='font-weight:bold;'>Climate : </span>";
			echo($dat[5]);
        }
        oci_free_statement($statement);
        oci_close($Oracle_conn); 
		
		?>