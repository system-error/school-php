<form action="" method="post">
                                
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <?php 
            if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                $update_categories = mysqli_query($connection,$query);
        
            while ($row = mysqli_fetch_assoc($update_categories) ) {
                $id = $row['cat_id'];
                $cat_title = $row['category_title'];

            
            
            ?>
            <input value="<?php if(isset($cat_title)) echo $cat_title ?>" class="form-control" type="text" name="" id="">

            <?php }
                } ?>
    <?php //update categories
    if(isset($_POST['update_category'])){
        $cat_title = $_POST['category_title'];
        echo "<p>$cat_title</p>";
        $query = "UPDATE categories SET category_title = '{$cat_title}' WHERE cat_id = {$cat_id} ";
        $update_category_title = mysqli_query($connection,$query);
        header("Location: categories.php");
        if(!$update_category_title){
            echo "QUERY FAILED".mysqli_error($connection);
        }
    }
    ?>
        
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category" id="">
    </div>  
</form>
                        