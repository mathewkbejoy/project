<?php
require_once($_SERVER['DOCUMENT_ROOT']."/inc/config.php");
require_once(ROOT_PATH.'inc/products.php');
$products=randomShirtsQueue();
$pageTitle='Shirt 4 Mike';
include(ROOT_PATH.'inc/header.php');
?>
	<div id="content">

		<div class="section banner">

			<div class="wrapper">

				<img class="hero" src="img/mike-the-frog.png" alt="Mike the Frog says:">
				<div class="button">
					<a href="<?php echo BASE_URL;?>shirts/">
						<h2>Hey, I&rsquo;m Mike!</h2>
						<p>Check Out My Shirts</p>
					</a>
				</div>
			</div>

		</div>

		<div class="section shirts latest">
			<div class="wrapper">
				<h2>Mike&rsquo;s Random Shirts Queue</h2>
				<?php include(ROOT_PATH."/inc/shirt-view-code.html.php");?>
			</div>
		</div>
	</div>
<?php include(ROOT_PATH.'inc/footer.php');?>