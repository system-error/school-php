<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header>
    
<p>Category</p>
    <form method="" action="search.php">
    <select name="category" id="">
        <option value="test1">mobile</option>
        <option value="test2">cases</option>
    </select>
    <input type="submit" value="seach" name="submit">
    </form>
</header>

    
    <?php 
        if(isset($_POST['submit'])){
            include("config.php");
            $category = $_POST['category'];
            

            // $sql = "INSERT INTO products (name,price,description) VALUES ('$pname','$pprice','$pdescription') ";
            $sql = "SELECT * FROM products where category = '" . $category . "' ";
            // $conn->query($sql);

            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)){
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<div class='col-md-3'>";
                    echo  "<h3>".$row['name']."</h3>";  
                    echo "<h3>".$row['description']." </h3>";
                    echo "</div>";
                    
                }

            }
        }    
    
    
    ?> 
    
</body>
</html>

