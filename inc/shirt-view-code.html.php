

                <ul class="products">
                    
                    <?php foreach($products as $product):?><li>
                        <a href="<?php echo BASE_URL; ?>shirts/<?php echo $product["sku"]; ?>/">
                            <img src="<?php echo BASE_URL.$product["image"]; ?>" alt="<?php echo $product["name"]; ?>"/>
                            <p><?php echo strtoupper($product['name']); ?></p>
                        </a>
                    </li><?php endforeach;?>
                    
                </ul>
