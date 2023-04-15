<?php
include("connection/connection.php");
include("nav.php");
$addingGroup = false;
$edittingGroup = false;
$deletingGroup = false;
$groupName = "";
$deleteGroupName = "";

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
}
//This adds a group 
if (isset($_REQUEST['add'])) {
    $newgroupName = $_REQUEST['groupName'];
    $query = "INSERT INTO `groupmaster` SET `groupName`='$newgroupName'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location:group_add.php?msg=Successfully added group");
    }
}
//This edits group
if (isset($_REQUEST['edit'])) {
    $newgroupName = $_REQUEST['groupName'];

    $groupId = $_REQUEST['edit'];
    $query = "UPDATE `groupmaster` SET `groupName`='$newgroupName' WHERE `groupId`='$groupId'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location:group_add.php");
    }
}
//This deletes group along with all the subject in that group
if (isset($_REQUEST['delete'])) {
    $groupId = $_REQUEST['delete'];
    $query = "DELETE FROM `groupmaster` WHERE `groupId`='$groupId' ";
    $result = mysqli_query($connection, $query);
    $query = "DELETE FROM `subject_master` WHERE `group_Id`='$groupId' ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:group_add.php");
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
                            $query2 = "SELECT * FROM `subject_master` WHERE `group_Id`='$groupId1' ";
                            $result2 = mysqli_query($connection, $query2);
                            // $row2 = mysqli_fetch_array($result2);
                            $rownumber = mysqli_num_rows($result2);

                            ?>
                        </h5>
                        <a href="subjectAdd.php?groupId=<?php echo $groupId1; ?>" class="subject">
                            <?php echo $rownumber; ?> Subjects
                        </a>
                    </div>
                    <div class="buttonPart">
                        <div class="deleteGrpBtn deleteBtn" deleteGrpId="<?php echo $groupId1; ?>"><i
                                class="fa-solid fa-trash"></i>
                        </div>
                        <a class="btn btn-primary editGroupBtn" id="<?php echo $groupId1; ?>"><i
                                class="fa-solid fa-pen"></i>
                            Edit
                            Group</a>
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
                <form method="post">
                    <div class="groupNameBody">
                        <div class="groupNamePopup">Enter group Name:</div>
                        <input type="text" name="groupName" id="" value="<?php echo $groupName; ?>" class="groupNamefield"
                            required autocomplete="off" />
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
                        <input type="submit" value=<?php
                        if ($edittingGroup) {
                            echo "'Update'";
                        } else {
                            echo "'Add Group'";
                        } ?> class="submitBtn" />
                        <input type="button" value="Cancel" class="closeBtn closeBtnGrp">
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
                <div class="heading1">
                    Delete <span class="headingsub1"> The Group? </span>
                </div>
                <form action="">
                    <div class="groupNameBody">
                        <div class="groupNamePopup">Are you sure you want to delete <span class="colorGrpName">
                                <?php echo $row1['groupName']; ?>
                            </span>
                            group?
                        </div>
                        <div class="warning">
                            <p><strong>Warning!</strong> It will delete the group permanently along with all the subjects
                                inside
                                this group</p>
                        </div>
                        <input type="hidden" name="delete" value="<?php echo $row1['groupId']; ?>" />
                        <input type="submit" value="Yes" class="submitBtn" />
                        <input type="button" class="closeBtn" value="No">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
include("footer.php");
?>