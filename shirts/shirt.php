<?php
require_once($_SERVER['DOCUMENT_ROOT']."/inc/config.php");
require_once(ROOT_PATH.'inc/products.php');

if(isset($_GET['id'])){
    $product = getSingleProduct($_GET['id']);
    if(empty($product)){
        header("LOCATION:".BASE_URL."shirts/");
        exit();
    }
}

$pageTitle = $product['name'];
$pageSection='shirts';
include(ROOT_PATH."inc/header.php");
?>

    <div class="section page">
        <div class="wrapper">
            <div class="breadcrumb"> <a href="<?php echo BASE_URL;?>shirts/">Shirts</a> &gt; <?php echo $product['name'];?></div>
                <div class="shirt-picture">
                    <span>
                        <img src="<?php echo BASE_URL. $product['image']?>" alt="<?php echo $product['name']?>"/>
                    </span>
                </div>
                <div class="shirt-details">
                    <h1><span class="price">$<?php echo $product['price']?></span><?php echo $product['name']?></h1>
                    
                    <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?php echo $product['paypal'];?>">
                        <table>
                            <tr>
                                <th>
                                    <label for="sizes">Sizes</label>
                                    <input type="hidden" name="on0" value="Sizes">
                                </th>
                            <td><select id="sizes" name="os0">
                            	<?php foreach($product['sizes'] as $size){ ?>
                            	    <option value="<?php echo $size;?>"><?php echo $size;?></option>
                            	<?php }?>
                            </select></td>
                            </tr>
                        </table>
                        <input type="submit" value="Add to Cart" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    </form>
                    <p class="note-designer">*All shirts are designed by Mike the Frog.</p>
                </div>
            
        </div>
        
    </div>


<?php
include(ROOT_PATH."inc/footer.php");
?>
