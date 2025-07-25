<?php
include("connection/connection.php");
include("nav.php");
session_start();
if (empty($_SESSION['id'])) {
    @header("location:index.php?msg=unknown Admin");
    exit();
}
$addingGroup = false;
$edittingGroup = false;
$deletingGroup = false;
$groupName = "";
$deleteGroupName = "";
$checkedSubj = array();

if (isset($_REQUEST['addGroup'])) {
    $addingGroup = true;
}
//This is to bring the confirmation of delete group
if (isset($_REQUEST['deleteGroup'])) {
    $deletingGroup = true;
    $groupId = $_REQUEST['deleteGroup'];
    $query = "SELECT * FROM `groupmaster` WHERE `groupId`='$groupId' ";
    $result = mysqli_query($connection, $query);
    $row1 = mysqli_fetch_array($result);
}
//This is to bring the confirmation of editting group popup
if (isset($_REQUEST['editGroup'])) {
    $edittingGroup = true;
    // $newgroupId = $_REQUEST['editGroup'];
    $groupId = $_REQUEST['editGroup'];
    $query = "SELECT * FROM `groupmaster` WHERE `groupId`='$groupId'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    $groupName = $row['groupName'];
    $query = "SELECT * FROM `group-subj` WHERE  `groupId`='$groupId'";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        array_push($checkedSubj, $row['subjectId']);
    }
}
//This adds a group 
if (isset($_REQUEST['add'])) {
    $newgroupName = $_REQUEST['groupName'];
    $subjects = $_REQUEST['subjectcheck'];
    //inserting new group
    $query = "INSERT INTO `groupmaster` SET `groupName`='$newgroupName'";
    $result = mysqli_query($connection, $query);
    //fetching the newly inserted group to get the id
    $query = "SELECT * FROM `groupmaster` WHERE `groupName`='$newgroupName'";
    $result = mysqli_query($connection, $query);
    $rowarr2 = mysqli_fetch_array($result);
    $recentGroupId = $rowarr2['groupId'];
    $baseFee = 0;
    foreach ($subjects as $subj) {
        //echo "<script>alert(' " . $subj .  " ')</script>";
        $query = "SELECT s.baseFee FROM `subject_master` as s WHERE `sub_Id`='$subj' ";
        $result = mysqli_query($connection, $query);
        $row3 = mysqli_fetch_array($result);
        $baseFee += $row3['baseFee'];

        $query1 = "INSERT INTO `group-subj` SET `groupId`='$recentGroupId',`subjectId`='$subj' ";
        $result = mysqli_query($connection, $query1);
    }
    $query = "UPDATE `groupmaster` SET `estimatedFee`='$baseFee' WHERE  `groupId`='$recentGroupId' ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location:group_add.php?msg=Successfully added group");
    }
}
//This edits group
if (isset($_REQUEST['edit'])) {
    $newgroupName = $_REQUEST['groupName'];
    $subjects = $_REQUEST['subjectcheck'];

    $groupId = $_REQUEST['edit'];
    $query = "UPDATE `groupmaster` SET `groupName`='$newgroupName' WHERE `groupId`='$groupId'";
    $result = mysqli_query($connection, $query);
    $baseFee = 0;
    foreach ($subjects as $subj) {
        if (in_array($subj, $checkedSubj)) {
            /*checks if newly selected subject is present in the data base given subject list 
            if it is present in the list then we will remove the subject from the array */
            $index = array_search($subj, $checkedSubj);
            array_splice($checkedSubj, $index, 1);
        } else {
            $query = "INSERT INTO `group-subj`SET `groupId`='$groupId',`subjectId`='$subj' ";
            $result = mysqli_query($connection, $query);
        }
        $query = "SELECT s.baseFee FROM `subject_master` as s WHERE `sub_Id`='$subj' ";
        $result = mysqli_query($connection, $query);
        $rowarr = mysqli_fetch_array($result);
        $baseFee += $rowarr['baseFee'];
    }
    foreach ($checkedSubj as $value) {
        $query = "DELETE FROM `group-subj`WHERE `groupId`='$groupId' AND `subjectId`='$value' ";
        $res = mysqli_query($connection, $query);
    }
    $query = "UPDATE `groupmaster` SET `estimatedFee`='$baseFee' WHERE  `groupId`='$groupId' ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:group_add.php?msg=Group updated successfully");
    }
}
//This deletes group along with all the subject in that group
if (isset($_REQUEST['delete'])) {
    $groupId = $_REQUEST['delete'];
    $query = "DELETE FROM `groupmaster` WHERE `groupId`='$groupId' ";
    $result = mysqli_query($connection, $query);
    $query = "DELETE FROM `group-subj` WHERE `groupId`='$groupId' ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:group_add.php?msg=Group Deleted successfully");
    }
}
$query1 = "SELECT * FROM `groupmaster` ORDER BY `groupId`";
$result1 = mysqli_query($connection, $query1);



?>


<div class="bgImage"></div>
<div class="mainDiv">
    <div class="cardHolder">
        <div class="card" id="addGroup">
            <div class="card-body addCard">
                <ion-icon name="add-circle-outline" class="addIcon"></ion-icon>
                <h5 class="card-title1">Add Group</h5>
            </div>
        </div>
        <?php
        // --------------------------------------------main cards---------------------------------------//
        while ($row = mysqli_fetch_array($result1)) {
        ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="groupName">
                            <?php echo $row['groupName'];
                            $groupId1 = $row['groupId'];
                            $query2 = "SELECT * FROM `group-subj` WHERE `groupId`='$groupId1' ";
                            $result2 = mysqli_query($connection, $query2);
                            // $row2 = mysqli_fetch_array($result2);
                            $rownumber = mysqli_num_rows($result2);

                            ?>
                        </h5>
                        <a href="#" class="subject">
                            <?php echo $rownumber; ?> Subjects
                        </a>
                    </div>
                    <div class="buttonPart">
                        <a class="btn btn-primary editGroupBtn" id="<?php echo $groupId1; ?>"><i class="fa-solid fa-pen"></i>
                            Edit</a>
                        <div class="deleteGrpBtn deleteBtn" deleteGrpId="<?php echo $groupId1; ?>"><i class="fa-solid fa-trash"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
//------------------------------------popup-----------------------------------------//
if ($addingGroup || $edittingGroup) {
?>
    <div class="blackwindow">
        <div class="popupMain">
            <div class="popupBody">
                <form method="post">
                    <div class="groupNameBody">
                        <?php
                        if ($edittingGroup) {
                        ?>
                            <div class="heading1">
                                Edit <span class="headingsub1"> Group </span>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="heading1">
                                Add <span class="headingsub1"> New Group </span>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="inputField">
                            <div class="groupNamePopup">Enter group Name:</div>
                            <input type="text" name="groupName" id="" value="<?php echo $groupName; ?>" class="groupNamefield" required autocomplete="off" />

                            <?php
                            if ($edittingGroup) {
                            ?>
                                <input type="hidden" name="edit" value="<?php echo $groupId; ?>" />
                            <?php
                            } else {
                            ?>
                                <input type="hidden" name="add" value="true" />
                            <?php
                            }
                            ?>
                        </div>
                        <div class="buttonDiv">
                            <div class="selectBoxDropdown">
                                <div class="selectBox">Select Subjects</div>
                                <i class="fa-sharp fa-solid fa-chevron-down"></i>
                                <div class="dropDown">
                                    <?php
                                    $query2 = "SELECT * FROM `subject_master` ORDER BY `sub_Id`";
                                    $result2 = mysqli_query($connection, $query2);
                                    while ($rowarr = mysqli_fetch_array($result2)) {
                                        $subjName = $rowarr['sub_Name'];
                                        $subjectId = $rowarr['sub_Id'];
                                    ?>
                                        <div class="checkBoxDiv">
                                            <input type="checkbox" class="subjectCheckbox" name="subjectcheck[]" <?php
                                                                                                                    if (in_array($subjectId, $checkedSubj)) {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> id="<?php echo $subjName; ?>" value="<?php echo $subjectId; ?>">
                                            <label for="<?php echo $subjName; ?>" id="SubjCheckBoxName"> <?php echo $subjName; ?> </label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <!-- <div class="checkBoxDiv">
                                        <input type="checkbox" name="subjectcheck" id="checkBox2" value="TBD">
                                        <label for="checkBox2" id="SubjCheckBoxName">Test Checkbox</label>
                                    </div>
                                    <div class="checkBoxDiv">
                                        <input type="checkbox" name="subjectcheck" id="checkBox3" value="TBD">
                                        <label for="checkBox3" id="SubjCheckBoxName">Test Checkbox</label>
                                    </div> -->
                                </div>
                            </div>
                            <input type="submit" value=<?php
                                                        if ($edittingGroup) {
                                                            echo "'Update'";
                                                        } else {
                                                            echo "'Add Group'";
                                                        } ?> class="submitBtn" />
                            <input type="button" value="Cancel" class="closeBtn closeBtnGrp">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
if ($deletingGroup) {
?>
    <div class="blackwindow">
        <div class="popupMain">
            <div class="popupBody">
                <form action="">
                    <div class="heading1DeleteModal">
                        Delete <span class="headingsub1"> The Group? </span>
                    </div>
                    <div class="groupNameBody">
                        <div class="inputField">

                            <div class="groupNamePopup">Are you sure you want to delete <span class="colorGrpName">
                                    <?php echo $row1['groupName']; ?>
                                </span>
                                group?
                            </div>
                            <div class="warning">
                                <p><strong>Warning!</strong> It will delete the group permanently along with all the
                                    subjects
                                    inside
                                    this group</p>
                            </div>
                        </div>
                        <div class="buttonDivDeleteModal">
                            <input type="hidden" name="delete" value="<?php echo $row1['groupId']; ?>" />
                            <input type="submit" value="Yes" class="submitBtnDeleteModal" />
                            <input type="button" class="closeBtnDeleteModal" value="No">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
include("footer.php");
?>