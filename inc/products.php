<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/inc/config.php");
    
    
    function getSingleProduct($sku){
        require(ROOT_PATH."inc/database.php");
        try{
            $query = $db->prepare("
                            SELECT name, price, image, sku, paypal
                            FROM products
                            WHERE sku = ?
                        ");
            $query->bindParam(1,$sku);
            $query->execute();
        }catch(Exception $e){
            $subject = "[Shirt: $sku]";
            $error = "Could not access the data";
            include(ROOT_PATH."inc/errorhandler.php");
            exit;
        }
        
        $product = $query->fetch(PDO::FETCH_ASSOC);
        
        if($product === false) return $product;
        
        $product['sizes'] = array();
        
        try{
            $query = $db->prepare("
                                SELECT size
                                FROM products_sizes ps 
                                INNER JOIN sizes s ON ps.size_id = s.id
                                WHERE product_sku = ?
                                ORDER BY `order`");
            $query->bindParam(1,$sku);
            $query->execute();
        }catch(Exception $e){
            $subject = "[Shirt: $sku]";
            $error = "Could not access the data";
            include(ROOT_PATH."inc/errorhandler.php");
            exit;
        }
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $product['sizes'][] = $row['size'];
        }
        return $product;
    }
    
    
    function getProductsSubset($pos_start, $pos_end){
        $subset_products = array();
        $row = $pos_end - $pos_start;
        require(ROOT_PATH."inc/database.php");
        try{
            $query = $db->prepare("
                            SELECT name, price, image, sku, paypal
                            FROM products
                            LIMIT ?, ?
                        ");
            $query->bindParam(1,$pos_start,PDO::PARAM_INT);
            $query->bindParam(2,$row,PDO::PARAM_INT);
            $query->execute();
        }catch(Exception $e){
            $subject = "[Shirts Page]";
            $error = "Could not access the data";
            include(ROOT_PATH."inc/errorhandler.php");
            exit;
        }
        $subset_products = $query->fetchAll(PDO::FETCH_ASSOC);
        return $subset_products;
    }
    
    function getProductsLength(){
        require(ROOT_PATH."inc/database.php");
        try{
            $query = $db->query("
                SELECT COUNT(sku)
                FROM products
            ");
        }catch(Exception $e){
            echo "[Product Count]:Could not access the data.";
            exit;
        }
        
        return intval($query->fetchColumn(0));
        
    }
    
    function searchProducts($s){
        $results = array();
        require(ROOT_PATH."inc/database.php");
        try{
            $query = $db->prepare("
                            SELECT name, price, image, sku, paypal
                            FROM products
                            WHERE name LIKE ?
                        ");
            $query->bindValue(1,'%'.$s.'%');
            $query->execute();
        }catch(Exception $e){
            $subject = "[Search:>  $s]";
            $error = "Could not access the searched product";
            include(ROOT_PATH."inc/errorhandler.php");
            exit;
        }
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    
     
    /*
    returns an array of 4 random  shirts
    */
    function randomShirtsQueue(){
        $random_shirts = array();
        require(ROOT_PATH."inc/database.php");
        try{
            $query = $db->query("
                            SELECT name, price, image, sku, paypal
                            FROM products
                            ORDER BY RAND()
                            LIMIT 4");
            
        }catch(Exception $e){
            
            $subject = "[Mike's Random Queue]";
            $error = "Could not access the data";
            include(ROOT_PATH."inc/errorhandler.php");
            exit;
            
        }
        $random_shirts = $query->fetchAll(PDO::FETCH_ASSOC);
        return $random_shirts;
    }
    
    function latestShirts(){
        $latest_shirts = array();
        require(ROOT_PATH."inc/database.php");
        try{
            $query = $db->query("
                            SELECT name, price, image, sku, paypal
                            FROM products
                            ORDER BY sku DESC
                            LIMIT 4");
            
        }catch(Exception $e){
            $subject = "[Mike's latest shirts]";
            $error = "Could not access the data";
            include(ROOT_PATH."inc/errorhandler.php");
            exit;
        }
        $latest_shirts = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $latest_shirts;
    }


/*    function all_products(){
        require(ROOT_PATH."inc/database.php");
        try{
            $query = $db->query("
                SELECT name, price, image, sku, paypal
                FROM products
                ORDER BY sku ASC
            ");
        }catch(Exception $e){
            echo "[All Product]:Could not access the data.";
            exit;
        }
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
*/    
   
?>