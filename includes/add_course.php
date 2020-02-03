<?php

    if(isset($_POST["add_course"])){
        $course_name = $_POST["name"];
        $course_description = $_POST["description"];
        $cost = $_POST["cost"];


        $query = "INSERT INTO courses(course_name, course_descreption, course_cost) ";
        $query.= "VALUES('{$course_name}','{$course_description}','{$cost}') ";

        $add_course = mysqli_query($connection,$query);
        $result = Confirm($add_course);
        if($result){
            echo "<p>Record added</p>";
        }


    }
?>
<form action="" method="post" enctype="multipart/form-data">

     <div class="form-group">
         <label for="name">Course Name</label>
         <input type="text" name="name" class="form-control" >
     </div>
     <div class="form-group">
         <label for="description">Course Description</label>
         <textarea type="text" class="form-control" name="description" id="" cols="30" rows="10"></textarea>
     </div>
     <div class="form-group">
         <label for="cost">Course Cost</label>
         <input type="number" name="cost" class="form-control" step="0.01">
     </div>
     <div class="form-group">
         <input type="submit" name="add_course" class="btn btn-primary" value="Add Course">
     </div>
</form>
