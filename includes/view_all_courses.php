<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Course Name</th>
        <th>Course Description</th>
        <th>Cost</th>
    </tr>
    </thead>
    <tbody >

    <?php
    $query = "SELECT * FROM courses";
    $select_courses = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_courses) ) {
        $id = $row['id'];
        $name = $row['course_name'];
        $description = $row['course_descreption'];
        $cost = $row['course_cost'];


        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$description</td>";
        echo "<td>$cost</td>";
        echo "<td><a href = 'courses.php?source=edit_course&c_id={$id}'>Edit</a></td>";
        echo "<td><a href = 'courses.php?delete={$id}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
if(isset($_GET["delete"])){
    $_id = $_GET["delete"];

    $query1 = "DELETE FROM students_courses WHERE id_course = {$_id} ";

    $delete_course_relationship = mysqli_query($connection,$query1);
    $query2 = "DELETE FROM courses WHERE id = {$_id} ";
    $delete_course_from_courses = mysqli_query($connection,$query2);

    Confirm($delete_course_from_courses);
    Confirm($delete_course_relationship);
    header("Location: courses.php");
}

?>
