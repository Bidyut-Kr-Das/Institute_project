<?php
if (isset($_REQUEST['studDeactiveId'])) {
    $studId = $_REQUEST['studDeactiveId'];
    $query = "UPDATE `studentmaster` SET `active`='N' WHERE `id`='$studId' ";
    $res = mysqli_query($connection, $query);
    if ($res) {
        @header("location:studFilter.php?studByClass=true");
    }
}
