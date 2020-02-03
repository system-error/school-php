<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Trainer Name</th>
        <th>Trainer Last Name</th>
        <th>Trainer Email</th>
    </tr>
    </thead>
    <tbody >

    <?php
    $query = "SELECT * FROM trainers";
    $select_trainers = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_trainers) ) {
        $id = $row['id'];
        $trainer_name = $row['trainer_name'];
        $trainer_lastname = $row['trainer_lastname'];
        $trainer_email = $row['trainer_email'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$trainer_name</td>";
        echo "<td>$trainer_lastname</td>";
        echo "<td>$trainer_email</td>";
        echo "<td><a href = 'trainers.php?source=edit_trainer&t_id={$id}'>Edit</a></td>";
        echo "<td><a href = 'trainers.php?delete={$id}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
if(isset($_GET["delete"])){
    $_id = $_GET["delete"];

    $query = "DELETE FROM trainers WHERE id = {$_id} ";
    $delete_trainers = mysqli_query($connection,$query);
    Confirm($delete_trainers);
    header("Location: trainers.php");
}

?>
