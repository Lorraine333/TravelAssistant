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
        //�������ݿ�        
        $Oracle_conn=oci_connect("SCOTT","tiger","orcl");
      
        //���䲢����һ���α���
        $cur=oci_new_cursor($Oracle_conn);
        //�����������
        $query="call traveler_assistance_package.country_demographics(:COUNTRY_NAME,:v_cur)";
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