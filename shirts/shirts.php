<?php
require_once($_SERVER['DOCUMENT_ROOT']."/inc/config.php");
require_once(ROOT_PATH.'inc/products.php');

$current_page = $_GET['pg'];
$current_page = intval($current_page);
$products_per_page = 8;
$total_page = ceil(getProductsLength()/$products_per_page);
if(empty($current_page) || $current_page < 1){
    header("LOCATION:./?pg=1");
}
if($current_page > $total_page){
    header("LOCATION:./?pg=".$total_page);
}

$product_start_pos = (($current_page-1)*$products_per_page);
$product_end_pos = $products_per_page*$current_page;

$products = getProductsSubset($product_start_pos, $product_end_pos);
$pageTitle = 'SHIRTS CATALOG';
$pageSection='shirts';
include(ROOT_PATH.'inc/header.php');
?>
    <div class="section shirts page">
        <div class="wrapper">
            <h1>Full Catalog of Shirts</h1>
            <?php include(ROOT_PATH.'inc/pagination-view-code.html.php');?>
            <?php include(ROOT_PATH."/inc/shirt-view-code.html.php");?>
            <?php include(ROOT_PATH.'inc/pagination-view-code.html.php');?>
        </div>
    </div>


<?php
include(ROOT_PATH.'inc/footer.php');
?>