<?php

    if(isset($_POST["add_trainer"])){
        $trainer_name = $_POST["name"];
        $trainer_lastname = $_POST["lastname"];
        $email = $_POST["email"];


        $query = "INSERT INTO trainers(trainer_name, trainer_lastname, trainer_email) ";
        $query.= "VALUES('{$trainer_name}','{$trainer_lastname}','{$email}') ";

        $add_trainer = mysqli_query($connection,$query);
        $result = Confirm($add_trainer);
        if($result){
            echo "<p>Record added</p>";
        }


    }
?>
<form action="" method="post" enctype="multipart/form-data">

     <div class="form-group">
         <label for="name">Trainer Name</label>
         <input type="text" name="name" class="form-control" >
     </div>
     <div class="form-group">
         <label for="lastname">Trainer Last Name</label>
         <input type="text" name="lastname"  class="form-control">
     </div>
     <div class="form-group">
         <label for="email">Trainers Email</label>
         <input type="text" name="email" class="form-control" >
     </div>
     <div class="form-group">
         <input type="submit" name="add_trainer" class="btn btn-primary" value="Add Trainer">
     </div>
</form>
