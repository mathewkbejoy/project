<?php
require_once($_SERVER['DOCUMENT_ROOT']."/inc/config.php");
$search = "";
if(isset($_GET['s'])){
    $search = $_GET['s'];
    trim($search);
    if($search != ""){
        require_once(ROOT_PATH."/inc/products.php");
        $products =  searchProducts($search);
    }
}

$pageTitle='Search';
$pageSection='search';
include(ROOT_PATH.'inc/header.php');
?>

    <div class="section shirts search page">
        
        <div class="wrapper">
            
            <h1>Search</h1>
            
            <form method="get" action="./">
                <input type="text" name="s" value="<?php echo htmlspecialchars($_GET['s'])?>">
                <input type="submit" value="GO">
            </form>
            <?php
            if($search != ""){
                if(!empty($products)){
                    include(ROOT_PATH."/inc/shirt-view-code.html.php");
                }else{
                    echo "<p id='no_results'>no results found!</p>";
                }
            }
            ?>
        </div>
    </div>




<?php include(ROOT_PATH.'inc/footer.php');?>