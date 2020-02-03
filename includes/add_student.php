<?php

    if(isset($_POST["add_student"])){
        $student_name = $_POST["name"];
        $student_course_id = $_POST["student_courses"];
        $student_last_name = $_POST["last_name"];
        $birthDate = $_POST["birthDate"];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($birthDate), date_create($today));

        if($diff->format('%y%') < 10){
            echo "<p>Wrong Birthdate</p>";
            return false;
        }


        $query1 = "INSERT INTO students(id_course, student_name, student_lastname, student_dirthdate) ";
        $query1.= "VALUES('{$student_course_id}','{$student_name}','{$student_last_name}','{$birthDate}') ";

        $add_student_record = mysqli_query($connection,$query1);
        $result_student = Confirm($add_student_record);



        $query2 = "SELECT id,id_course FROM students where student_name = '" . $student_name . "' ";

        $add_relationship = mysqli_query($connection,$query2);
        while ($row = mysqli_fetch_assoc($add_relationship) ) {
            $id_student = $row['id'];
            $id_course = $row['id_course'];

        }
        $query3 = "INSERT INTO students_courses(id_course, id_student) ";
        $query3.= "VALUES('{$id_course}','{$id_student}') ";
        $add_student_courses = mysqli_query($connection,$query3);
        $result_query3 = Confirm($add_student_courses);

        if($result_student && $result_query3){
            echo "<p>Record added</p>";
        }



    }
?>
<form action="" method="post" enctype="multipart/form-data">

     <div class="form-group">
         <label for="name">Student Name</label>
         <input type="text" name="name" class="form-control" >
     </div>    
     <div class="form-group">
        <select name="student_courses" id="student_courses">
            <?php
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
         <input type="text" name="last_name" class="form-control" >
     </div>
     <div class="form-group">
         <label for="birthDate">Student BirthDate</label>
         <input type="date" name="birthDate" class="form-control" >
     </div>
     <div class="form-group">
         <input type="submit" name="add_student" class="btn btn-primary" value="Add Student">
     </div>
</form>
