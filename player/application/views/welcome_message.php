<!DOCTYPE html>
<html>
<head>
<title></title>

	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="shortcut icon" href=http://www.freshdesignweb.com/wp-content/themes/fv24/images/icon.ico />
    
</head>
<style>
/* Slider
http://www.freshdesignweb.com/free-beautiful-css3-table-style.html
*/
#fdw-pricing-table {
		margin:0 auto;
		text-align: center;
		width: 928px; /* total computed width */
		zoom: 1;
	}

	#fdw-pricing-table:before, #fdw-pricing-table:after {
	  content: "";
	  display: table
	}

	#fdw-pricing-table:after {
	  clear: both
	}

	/* --------------- */	

	#fdw-pricing-table .plan {
		font: 13px 'Lucida Sans', 'trebuchet MS', Arial, Helvetica;     
		background: #fff;      
		border: 1px solid #ddd;
		color: #333;
		padding: 20px;
		width: 180px;
		float: left;
		_display: inline; /* IE6 double margin fix */
		position: relative;
		margin: 0 5px;
		-moz-box-shadow: 0 2px 2px -1px rgba(0,0,0,.3);
		-webkit-box-shadow: 0 2px 2px -1px rgba(0,0,0,.3);
		box-shadow: 0 2px 2px -1px rgba(0,0,0,.3);		
	}

	#fdw-pricing-table .plan:after {
	  z-index: -1; 
	  position: absolute; 
	  content: "";
	  bottom: 10px;
	  right: 4px;
	  width: 80%; 
	  top: 80%; 
	  -webkit-box-shadow: 0 12px 5px rgba(0, 0, 0, .3);   
	  -moz-box-shadow: 0 12px 5px rgba(0, 0, 0, .3);
	  box-shadow: 0 12px 5px rgba(0, 0, 0, .3);
	  -webkit-transform: rotate(3deg);    
	  -moz-transform: rotate(3deg);   
	  -o-transform: rotate(3deg);
	  -ms-transform: rotate(3deg);
	  transform: rotate(3deg);	
	}	
	
	#fdw-pricing-table .popular-plan {
		top: -20px;
		padding: 40px 20px;   
	}
	
	/* --------------- */	

	#fdw-pricing-table .header {
		position: relative;
		font-size: 20px;
		font-weight: normal;
		text-transform: uppercase;
		padding: 40px;
		margin: -20px -20px 20px -20px;
		border-bottom: 8px solid;
		background-color: #eee;
		background-image: -moz-linear-gradient(#fff,#eee);
		background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));    
		background-image: -webkit-linear-gradient(#fff, #eee);
		background-image: -o-linear-gradient(#fff, #eee);
		background-image: -ms-linear-gradient(#fff, #eee);
		background-image: linear-gradient(#fff, #eee);
	}

	#fdw-pricing-table .header:after {
		position: absolute;
		bottom: -8px; left: 0;
		height: 3px; width: 100%;
		content: '';
		background-image: url(images/bar.png);
	}
	
	#fdw-pricing-table .popular-plan .header {
		margin-top: -40px;
		padding-top: 60px;		
	}

	#fdw-pricing-table .plan1 .header{
		border-bottom-color:#63BDED;
	}

	#fdw-pricing-table .plan2 .header{
		border-bottom-color: #CA0000;
	}

	#fdw-pricing-table .plan3 .header{
		border-bottom-color:#F1D04B;
	}

	#fdw-pricing-table .plan4 .header{
		border-bottom-color: #F08833;
	}			
	
	/* --------------- */

	#fdw-pricing-table .price{
		font-size: 45px;
	}

	#fdw-pricing-table .monthly{
		font-size: 13px;
		margin-bottom: 20px;
		text-transform: uppercase;
		color: #999;
	}

	/* --------------- */

	#fdw-pricing-table ul {
		margin: 20px 0;
		padding: 0;
		list-style: none;
	}

	#fdw-pricing-table li {
		padding: 10px 0;
	}
	
	/* --------------- */
		
	#fdw-pricing-table .signup {
		position: relative;
		padding: 10px 20px;
		color: #fff;
		font: bold 14px Arial, Helvetica;
		text-transform: uppercase;
		text-decoration: none;
		display: inline-block;       
		background-color: #72ce3f;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
		border-radius: 3px;     
		text-shadow: 0 -1px 0 rgba(0,0,0,.15);
		opacity: .9;       
	}

	#fdw-pricing-table .signup:hover {
		opacity: 1;       
	}

	#fdw-pricing-table .signup:active {
		-moz-box-shadow: 0 2px 2px rgba(0,0,0,.3) inset;
		-webkit-box-shadow: 0 2px 2px rgba(0,0,0,.3) inset;
		box-shadow: 0 2px 2px rgba(0,0,0,.3) inset;       
	}			

	#fdw-pricing-table .plan1 .signup{
		background: #63BDED;
	}

	#fdw-pricing-table .plan2 .signup{
		background:#CA0000;
	}

	#fdw-pricing-table .plan3 .signup{
		background: #F1D04B;
	}

	#fdw-pricing-table .plan4 .signup{
		background:#F08833;
	}	
	
	/* end --------------- */
	/* CSS reset */
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td { 
	margin:0;
	padding:0;
}
html,body {
	margin:0;
	padding:0;
	height: 100%;
}
table {
	border-collapse:collapse;
	border-spacing:0;
}
fieldset,img { 
	border:0;
}
address,caption,cite,code,dfn,th,var {
	font-style:normal;
	font-weight:normal;
}
ol,ul {
	list-style:none;
}
caption,th {
	text-align:left;
}
h1,h2,h3,h4,h5,h6 {
	font-size:100%;
	font-weight:normal;
}
q:before,q:after {
	content:'';
}
abbr,acronym { border:0;
}
section, header{
	display: block;
}
/* General Demo Style */
body{
	font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;
	background:url(images/bgnoise_lg.png);
	font-weight: 400;
	font-size: 15px;
	color: #3a2127;
	overflow-y: scroll;
}
a{
	color: #333;
	text-decoration: none;
}
.container{
	width: 100%;
	height: 100%;
	position: relative;
}
.clr{
	clear: both;
}
.container > header{
	padding: 20px 30px 20px 30px;
	margin: 0px 20px 10px 20px;
	position: relative;
	display: block;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
    text-align: center;
}
.container > header h1{
	position: relative;
	color: #498ea5;
	font-weight: 700;
	font-style: normal;
	font-size: 30px;
	padding: 0px 0px 5px 0px;
	text-shadow: 0px 1px 1px rgba(255,255,255,0.8);
}
.container > header h1 span{
	font-family: 'Alegreya SC', Georgia, serif;
	font-size: 20px;
	line-height: 20px;
	display: block;
	font-weight: 400;
	font-style: italic;
	color: #719dab;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
}
.container > header h2{
	font-size: 16px;
	font-style: italic;
	color: #2d6277;
	text-shadow: 0px 1px 1px rgba(255,255,255,0.8);
}
/* Header Style */
.freshdesignweb-top{
	line-height: 24px;
	font-size: 11px;
	background: rgba(0, 0, 0, 0.05);
	text-transform: uppercase;
	z-index: 9999;
	position: relative;
	box-shadow: 1px 0px 2px rgba(0,0,0,0.2);
}
.freshdesignweb-top a{
	padding: 0px 10px;
	letter-spacing: 1px;
	color: #333;
	text-shadow: 0px 1px 1px #fff;
	display: block;
	float: left;
}
.freshdesignweb-top a:hover{
	background: #fff;
}
.freshdesignweb-top span.right{
	float: right;
}
.freshdesignweb-top span.right a{
	float: left;
	display: block;
}
.freshdesignweb-demos{
    text-align:center;
	display: block;
	line-height: 30px;
	padding: 20px 0px;
}
.freshdesignweb-demos a{
    display: inline-block;
	margin: 0px 4px;
	padding: 0px 4px;
	color: #fff;
	line-height: 20px;	
	font-style: italic;
	font-size: 13px;
	border-radius: 3px;
	background: rgba(41,77,95,0.1);
	-webkit-transition: all 0.2s linear;
	-moz-transition: all 0.2s linear;
	-o-transition: all 0.2s linear;
	-ms-transition: all 0.2s linear;
	transition: all 0.2s linear;
}
.freshdesignweb-demos a:hover{
	background: rgba(41,77,95,0.3);
}
.freshdesignweb-demos a.current,
.freshdesignweb-demos a.current:hover{
	background: rgba(41,77,95,0.3);
}
</style>
<body>
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
               
          
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
				<h1><span></span>OT联盟</h1>
            </header>       
     <!-- start header here-->
	<header>

	<div id="fdw-pricing-table">
	
<div id="fdw-pricing-table">
<form role="form" action="index.php/team/team/<?php echo '1'?>"  method="post" >
    <div class="plan plan1">
        <div class="header">野马队</div>
        <div class="price"><img src="<?php echo base_url().'images/yema.jpg'?>" width="150" height="150" align="middle"></div>  
        <div class="monthly">Mustang</div>      
        <ul>
             <li><b></b> </li>				
        </ul>
         <button type="submit" class="signup">详 情</button></div>
		 </form>
		 <form role="form" action="index.php/team/team/<?php echo '2'?>"  method="post" >
    <div class="plan plan2 ">
        <div class="header">红魔队</div>
        <div class="price"><img src="<?php echo base_url().'images/hongmo.jpg'?>" width="150" height="150" align="middle"></div>
        <div class="monthly">RED DEVIL</div>  
        <ul>
           <li><b></b> </li>				
        </ul>
        <button type="submit" class="signup">详 情</button>   </div>
				 </form>
		 <form role="form" action="index.php/team/team/<?php echo '3'?>"  method="post" >
    <div class="plan plan3">
        <div class="header">黑鹰队</div>
        <div class="price"><img src="<?php echo base_url().'images/heiying.jpg'?>" width="150" height="150" align="middle"></div>
        <div class="monthly">BLACKHAWK</div>
        <ul>
            <li><b></b> </li>					
        </ul>
        <button type="submit" class="signup">详 情</button>    </div>
				 </form>
		 <form role="form" action="index.php/team/team/<?php echo '4'?>"  method="post" >
    <div class="plan plan4">
        <div class="header">熊猫队</div>
        <div class="price"><img src="<?php echo base_url().'images/xiongmao.jpg'?>" width="150" height="150" align="middle"></div>
        <div class="monthly">PANDA</div>
        <ul>
		 <li><b></b> </li>				
        </ul>
        <button type="submit" class="signup">详 情</button>    </div> 	
		</form>
</div>



	</header><!-- end header -->
    
</div>
</body>
</html>
