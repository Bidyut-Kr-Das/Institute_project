<?php
$connection = mysqli_connect("localhost", "root", "", "institute");
if (mysqli_connect_errno()) {
    echo "Failed to connect to database" . mysqli_connect_error();
}
?>