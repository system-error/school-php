<?php

    if(isset($_GET["s_id"])){
        $getTheStudentId = $_GET["s_id"];

    }
    $query = "SELECT * FROM students WHERE id = {$getTheStudentId} ";
        $editStudentsById = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($editStudentsById) ) {
            $id = $row['id'];
            $studentName = $row['student_name'];
            $studentLastName = $row['student_lastname'];
            $studentBirthDate = $row['student_dirthdate'];
        }

        if(isset($_POST["update_student"])){
            

             $name = $_POST["name"];

             $student_course_id = $_POST["student_courses"];

             $lastName = $_POST["lastName"];
             
             $birthDate = $_POST["birthDate"];

            $query1 = "UPDATE students SET ";
            $query1.= "student_name  = '{$name}', ";
            $query1.= "id_course  = '{$student_course_id}', ";
            $query1.= "student_lastname = '{$lastName}', ";
            $query1.= "student_dirthdate = '{$birthDate}' ";
            $query1.= "WHERE id = {$getTheStudentId}";

            $updateStudent = mysqli_query($connection,$query1);
            $result1 = Confirm($updateStudent);

            $query2 = "UPDATE students_courses SET ";
            $query2.= "id_course  = '{$student_course_id}' ";
            $query2.= "WHERE id_student = {$getTheStudentId}";
            $updateRelationship = mysqli_query($connection,$query2);
            $result2 = Confirm($updateStudent);
            if($result1 && $result2){
                echo "<p>Record updated</p>";
            }
//            header("Location: students.php?source=edit_student&s_id=$getTheStudentId");
        }

        
?>
<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
     <label for="name">Student Name</label>
     <input value = "<?php echo $studentName ?>" type="text" name="name" class="form-control" >
 </div>    
 <div class="form-group">
     <select name="student_courses" id="student_courses">
         <?php

         //            $query1 = "SELECT * FROM students_courses where id_student = '".$id."'";
         //            $select_the_course = mysqli_query($connection,$query1);
         //            while($row = mysqli_fetch_assoc($connection,$select_the_course)){
         //                $course_id = $row['id_course'];
         //            }
         //
         //            $query = "SELECT course_name FROM courses where id = '".$course_id."' ";
         //            $course_name = mysqli_query($connection,$query);
         //
         //            while ($row = mysqli_fetch_assoc($course_name) ) {
         //                $id = $row['id'];
         //                $course_name = $row['course_name'];
         //                echo "<option value='{$id}'>{$course_name}</option>";
         //            }
         $query = "SELECT * FROM courses";
         $select_courses = mysqli_query($connection,$query);
         while ($row = mysqli_fetch_assoc($select_courses) ) {
             $id = $row['id'];
             $course_name = $row['course_name'];
             echo "<option value='{$id}'>{$course_name}</option>";
         }
         ?>
     </select>
 </div>
 <div class="form-group">
     <label for="last_name">Student Last Name</label>
     <input value = "<?php echo $studentLastName ?>" type="text" name="lastName" class="form-control" >
 </div>
 <div class="form-group">
     <label for="birthDate">Student BirthDate</label>
     <input value = "<?php echo $studentBirthDate ?>" type="date" name="birthDate" class="form-control" >
 </div>

 <div class="form-group">
     <input type="submit" name="update_student" class="btn btn-primary" value="Update Student">
 </div>
</form>