<?php
include("nav.php");
$title = "";
$studByClass = false;
$studByGroup = false;
$studBySubject = false;
if (isset($_REQUEST['studByClass'])) {
    $studByClass = true;
    $query = "SELECT * FROM `classmaster` ORDER BY  `classId`";
    $res = mysqli_query($connection, $query);
} else if (isset($_REQUEST['studByGroup'])) {
    $studByGroup = true;
    $query = "SELECT * FROM  `groupmaster`ORDER BY `groupId`";
    $res = mysqli_query($connection, $query);
} else if (isset($_REQUEST['studBySubj'])) {
    $studBySubject = true;
    $query = "SELECT * FROM `subject_Master` ORDER BY `sub_Id`";
    $res = mysqli_query($connection, $query);
} else {
    @header("location:studFilter.php?studByClass=true");
}
?>
<div class="mainDiv">
    <div class="cardHolder">
        <?php
        while ($row = mysqli_fetch_array($res)) {
            if ($studByClass) {
                $title = $row['className'];
                $Id = $row['classId'];
            } else if ($studByGroup) {
                $title = $row['groupName'];
                $Id = $row['groupId'];
            } else {
                $title = $row['sub_Name'];
                $Id = $row['sub_Id'];
            }
            if ($studByClass) {
        ?>
                <a class="filterAnchor" href="studentTable.php?classId=<?php echo $Id; ?>">
                <?php
            } else if ($studByGroup) {
                ?>
                    <a class="filterAnchor" href="studentTable.php?groupId=<?php echo $Id; ?>">
                    <?php
                } else {
                    ?>
                        <a class="filterAnchor" href="studentTable.php?subjectId=<?php echo $Id; ?>">
                        <?php
                    }
                        ?>
                        <div class="card" id="findStud">
                            <div class="card-body addCard">
                                <input type="hidden" name="id" value="<?php echo $Id; ?>">
                                <!-- <ion-icon name="add-circle-outline" class="addIcon"></ion-icon> -->
                                <h5 class="card-title-filter"><?php echo $title; ?></h5>
                            </div>
                        </div>
                        </a>
                    <?php
                }
                    ?>
    </div>
</div>

<?php

include("footer.php");
?>