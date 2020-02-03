<?php
function Confirm($result){
    global $connection;
    if(!$result){
        return "QUERY FAILED. ".mysqli_error($connection);
    }else{
        return true;
    }
}
