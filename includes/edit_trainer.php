<?php

    if(isset($_GET["t_id"])){
        $getTheTrainerId = $_GET["t_id"];

    }
    $query = "SELECT * FROM trainers WHERE id = {$getTheTrainerId} ";
        $editTrainerById = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($editTrainerById) ) {
            $id = $row['id'];
            $trainerName = $row['trainer_name'];
            $trainerLastName = $row['trainer_lastname'];
            $trainerEmail = $row['trainer_email'];
        }

        if(isset($_POST["update_trainer"])){

             $name = $_POST["name"];

             $lastname = $_POST["lastname"];
             
             $email = $_POST["email"];

            $query = "UPDATE trainers SET ";
            $query.= "trainer_name  = '{$name}', ";
            $query.= "trainer_lastname = '{$lastname}', ";
            $query.= "trainer_email = '{$email}' ";
            $query.= "WHERE id = {$getTheTrainerId}";

            $updateTrainer = mysqli_query($connection,$query);
            $result = Confirm($updateTrainer);
//            header("Location: trainers.php?source=edit_trainer&t_id=$getTheTrainerId");
            if($result){
                echo "<p>Record updated</p>";
            }


        }
?>
<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
     <label for="name">Trainer Name</label>
     <input value = "<?php echo $trainerName ?>" type="text" name="name" class="form-control" >
 </div>
 <div class="form-group">
     <label for="lastname">Trainer Last Name</label>
     <input value = "<?php echo $trainerLastName ?>" type="text" name="lastname" class="form-control" >
 </div>
 <div class="form-group">
     <label for="email">Trainer Email</label>
     <input value = "<?php echo $trainerEmail ?>" type="text" name="email" class="form-control" >
 </div>
 <div class="form-group">
     <input type="submit" name="update_trainer" class="btn btn-primary" value="Update Trainer">
 </div>
</form>