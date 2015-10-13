<?php $pageTitle="HMM SOMETHING WENT WRONG!"; include(ROOT_PATH.'inc/header.php');?>
    <div class="section page">
        <div class="error_handler">
            <h1 id="head">What happened to the clothes?</h1>
            <img src="<?php echo BASE_URL?>img/Imsorry.jpg"></img>
            <p><?php echo $error."</p><p>".strtoupper($subject);?></p>
            <div id="button_wrapper">
                <a href="<?php echo BASE_URL?>"><div class="button">HOME</div></a>
                <a href="<?php echo BASE_URL?>contact/"><div class="button">CONTACT</div></a>
            </div>
        </div>
    </div>
<?php include(ROOT_PATH.'inc/footer.php'); ?>