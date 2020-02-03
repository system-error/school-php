<?php

    if(isset($_GET["c_id"])){
        $getTheCourseId = $_GET["c_id"];

    }
    $query = "SELECT * FROM courses WHERE id = {$getTheCourseId} ";
        $editCourseById = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($editCourseById) ) {
            $id = $row['id'];
            $courseName = $row['course_name'];
            $courseDescription = $row['course_descreption'];
            $courseCost = $row['course_cost'];
        }

        if(isset($_POST["update_course"])){

             $name = $_POST["name"];

             $description = $_POST["description"];
             
             $cost = $_POST["course_cost"];

            $query = "UPDATE courses SET ";
            $query.= "course_name  = '{$name}', ";
            $query.= "course_descreption = '{$description}', ";
            $query.= "course_cost = '{$cost}' ";
            $query.= "WHERE id = {$getTheCourseId}";

            $updateCourse = mysqli_query($connection,$query);
            $result = Confirm($updateCourse);
            if($result){
                echo "<p>Record updated</p>";
            }
//            header("Location: courses.php?source=edit_course&c_id=$getTheCourseId");
        }
?>
<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
     <label for="name">Course Name</label>
     <input value = "<?php echo $courseName ?>" type="text" name="name" class="form-control" >
 </div>
 <div class="form-group">
     <label for="description">Course Description</label>
     <textarea  type="text" name="description" class="form-control" cols="30" rows="10"><?php echo $courseDescription ?></textarea>
 </div>
 <div class="form-group">
     <label for="cost">Course Cost</label>
     <input value = "<?php echo $courseCost ?>" type="number" name="course_cost" class="form-control" step="0.01">
 </div>
 <div class="form-group">
     <input type="submit" name="update_course" class="btn btn-primary" value="Update Course">
 </div>
</form>