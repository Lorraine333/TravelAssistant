
                        
        
<!DOCTYPE html >
<!--  Website template by freewebsitetemplates.com  -->
<html>

<head>
	<title>Traveller Assistant</title>
	<meta  charset="utf-8" />
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/button.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="style.css" />
	
    <script type="text/javascript" src="js/tinybox.js"></script>
	<link rel="stylesheet" href="jquery.ui.autocomplete.css"/> 
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript" src="ui/jquery.ui.core.js"></script> 
<script type="text/javascript" src="ui/jquery.ui.widget.js"></script> 
<script type="text/javascript" src="ui/jquery.ui.position.js"></script> 
<script type="text/javascript" src="ui/jquery.ui.autocomplete.js"></script> 
<script type="text/javascript">

//window.document.getElementsByName("text").value();
function aa()
{
	var name1=window.document.getElementById("text").value;
	TINY.box.show({url:'a.php',post:'name='+name1,width:200,height:200,opacity:50,topsplit:3});
	//alert(name1);
}

$(function(){
	$( "#text" ).autocomplete({
		source: "hint.php",
		minLength: 1,
		autoFocus: true
	});
});
 

</script>



</head>

<body>

    <form name="frmLogin" method="post" action="a.php"> 
	  <div id="background">
			  <div id="page">
			
					 <div class="header">
						<div class="footer">
							<div class="body">
							  
									<div id="sidebar">
									    <a href="index.php"><img id="logo" src="images/logo2.png" width="169" height="81.4" alt="" title=""/></a>
									
										
										<ul class="navigation">
										    <li><a href="index.php">INTRO</a></li>
											<li class="active"><a href="basic.php">BASIC</a></li>
											<li><a href="region_currency.php">REGION&CURRENCY</a></li>
											<li><a href="flag.php">FLAG</a></li>
											<li><a href="language.php">LANGUAGE</a></li>
											<li><a href="region.php">REGION</a></li>							
											<li><a href="US.php">About US</a></li>
											
										</ul>
										

										
										<div class="footenote">
										  <span>&copy; Copyright &copy; 2012.</span>
										  <span><a href="index.php">Traveller Assistant Group</a> all rights reserved</span>
										</div>
										
									</div>
									<div id="content" >
									
									    <img src="images/basic.jpg" width="726" height="546" alt="" title="">
										<div class="featured">
										      <div class="header">
											     <ul>
														<li class="first">
															<!--<p>hi.</p> -->
															<img src="images/hi.jpg" width="50" height="62" alt="" title="" >
														</li>
														<li class="last">
															<p>
																Please type in the name of a country and you will see its basic information which may help you a lot.  ^_^
															</p>
														</li>
												 </ul>
											  </div>
											  <div class="body">
											    <p></p>
											    <center><img src="images/traveler.jpg" width="95.8" height="92" alt="" title=""></center>
												<p></p>
											   <p>
													<center><input type="text" id="text"  style="width:200px;"/></center>
												<center>
												<p></p>
												<div class="post">    	
											<input id="frame" type="button" class="btn btn-green" value="Search" onclick="aa()"/>
											 
										

												</div>
										
												
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
</form>
</body>
</html>