<!DOCTYPE html >
<!--  Website template by freewebsitetemplates.com  -->
<html>

<head>
	<title>Traveller Assistant</title>
	<meta  charset="iso-8859-1" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/popup.css" rel="stylesheet" type="text/css" />
	<link href="css/button.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="js/tinybox.js"></script>
	<script type="text/javascript">
//window.document.getElementsByName("text").value();
function aa()
{
	var name1=window.document.getElementById("ctr_name").value;
	TINY.box.show({url:'d.php',post:'name='+name1,width:200,height:200,opacity:50,topsplit:3});
	//alert(name1);
}

</script>
</head>

<body>
<?
    require_once "connect_database.php";
?>

	  <div id="background">
			  <div id="page">
			
					 <div class="header">
						<div class="footer">
							<div class="body">
							  
									<div id="sidebar">
									    <a href="index.php"><img id="logo" src="images/logo2.png" with="169" height="81.4" alt="" title=""/></a>
									
										
										<ul class="navigation">
										    <li><a href="index.php">INTRO</a></li>
											<li><a href="basic.php">BASIC</a></li>
											<li><a href="region_currency.php">REGION&CURRENCY</a></li>
											<li><a href="flag.php">FLAG</a></li>
											<li class="active" ><a href="language.php">LANGUAGE</a></li>
											<li><a href="region.php">REGION</a></li>							
											<li><a href="US.php">About US</a></li>
										</ul>
										

										
										<div class="footenote">
										  <span>&copy; Copyright &copy; 2012.</span>
										  <span><a href="index.php">Traveller Assistant Group</a> all rights reserved</span>
										</div>
										
									</div>
									<div id="content" >
									
									    <img src="images/languages.jpg" width="726" height="546" alt="" title="">
										<div class="featured">
										      <div class="header">
											     <ul>
														<li class="first">
															<!--<p>hi.</p> -->
															<img src="images/hi.jpg" width="50" height="62" alt="" title="" >
														</li>
														<li class="last">
															<p>
																You can know which languages do people speak in this country and its official language.^_^
															</p>
														</li>
												 </ul>
											  </div>
											  <div class="body">
											  <p></p>
											    <center><img src="images/traveler.jpg" width="95.8" height="92" alt="" title=""></center>
												<p></p>
											   <p>
													<center><input type="text" id="ctr_name" class="half" value="" name="ctr_name" style="width:200px;"/></center>
												<center>
												<p></p>
												<input id="frame" type="button" class="btn btn-green" value="Search" onclick="aa()"/>
												</center>	
												</div>
									    </div>
									</div>
						</div>
					 </div>
					 <div class="shadow">&nbsp;</div>
			  </div>    
	  </div>    
	
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script>
</div>


<script type="text/javascript" src="js/jquery.min2.js"></script>
<script type="text/javascript" src="js/jquery-pop.js"></script>
</body>
</html>