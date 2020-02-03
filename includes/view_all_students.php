
<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Course</th>
        <th>Birth Date</th>
    </tr>
</thead>
<tbody >

    <?php
        $query = "SELECT * FROM students";
        $select_students = mysqli_query($connection,$query);
    
        while ($row = mysqli_fetch_assoc($select_students) ) {
            $id = $row['id'];
            $name = $row['student_name'];
            $lastName = $row['student_lastname'];
            $birthdate = $row['student_dirthdate'];

            
            echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$lastName</td>";

                $query1 = "SELECT id_course FROM students WHERE id = {$id} ";
                $student_course = mysqli_query($connection,$query1);

                while ($row = mysqli_fetch_assoc($student_course) ) {
                    $id = $row['id_course'];
                 }

                $query2 = "SELECT course_name FROM courses WHERE id = {$id} ";
                $student_course = mysqli_query($connection,$query2);

                while ($row = mysqli_fetch_assoc($student_course) ) {
                    $course_name = $row['course_name'];
                }


                echo "<td>{$course_name}</td>";
//
//                echo "<td>$postStatus</td>";
//                echo "<td><img width=100 src='../images/$postImage' alt ='image'> </td>";
//                echo "<td>$postTags</td>";
//                echo "<td>$postCommentCount</td>";
                echo "<td>$birthdate</td>";
                echo "<td><a href = 'students.php?source=edit_student&s_id={$id}'>Edit</a></td>";
                echo "<td><a href = 'students.php?delete={$id}'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
</tbody>
</table>

<?php
if(isset($_GET["delete"])){
    $_id = $_GET["delete"];

    $query = "DELETE FROM students WHERE id = {$_id} ";
    $delete_post = mysqli_query($connection,$query);
    Confirm($delete_post);
    header("Location: students.php");
}

?>
