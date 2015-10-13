<?php require_once($_SERVER['DOCUMENT_ROOT']."/inc/config.php");?>
<html>
    <head>
    	<title><?php echo $pageTitle; ?></title>
    	<link rel="stylesheet" href="<?php echo BASE_URL;?>css/style.css" type="text/css">
    	<link href='https://fonts.googleapis.com/css?family=Oswald:400,700|Special+Elite' rel='stylesheet' type='text/css'>
    	<link rel="shortcut icon" href="<?php echo BASE_URL;?>favicon.ico">
    </head>
    <body>
    
    	<div class="header">
    
    		<div class="wrapper">
    
    			<h1 class="branding-title"><a href="<?php echo BASE_URL;?>">Shirts 4 Mike</a></h1>
    
    			<ul class="nav">
    				<li class="shirts<?php if($pageSection == 'shirts'){echo " on";}?>"><a href="<?php echo BASE_URL;?>shirts/">Shirts</a></li>
    				<li class="contact<?php if($pageSection == 'contact'){echo " on";}?>" ><a href="<?php echo BASE_URL;?>contact/">Contact</a></li>
    				<li class="search<?php if($pageSection == 'search'){echo " on";}?>" ><a href="<?php echo BASE_URL;?>search/">Search</a></li>
    				<li class="cart"><a target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=L5TEXHXEL9F28&amp;display=1">Shopping Cart</a></li>
    			</ul>
    
    		</div>
    
    	</div>
