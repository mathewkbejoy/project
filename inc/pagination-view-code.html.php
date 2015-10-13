
    <div class="pagination">
        <?php
            for($i=1; $i<=$total_page; $i++){
                if($current_page == $i){
                    echo "<span>$i</span>";
                }else{
                    echo "<a href='./?pg=$i'>$i</a>";
                }
            }
        ?>
    </div>