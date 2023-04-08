<?php
include("connection/connection.php");
include("nav.php");
$addingGroup = false;
$edittingGroup = false;
$groupName = "";

if (isset($_REQUEST['addGroup'])) {
    $addingGroup = true;
}
if (isset($_REQUEST['editGroup'])) {
    $edittingGroup = true;
    // $newgroupId = $_REQUEST['editGroup'];
    $groupId = $_REQUEST['editGroup'];
    $query = "SELECT * FROM `groupmaster` WHERE `groupId`='$groupId'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    $groupName = $row['groupName'];
}
if (isset($_REQUEST['add'])) {
    $newgroupName = $_REQUEST['groupName'];
    $query = "INSERT INTO `groupmaster` SET `groupName`='$newgroupName'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location:group_add.php?msg=Successfully added group");
    }
}
if (isset($_REQUEST['edit'])) {
    $newgroupName = $_REQUEST['groupName'];

    $groupId = $_REQUEST['edit'];
    $query = "UPDATE `groupmaster` SET `groupName`='$newgroupName' WHERE `groupId`='$groupId'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location:group_add.php");
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
                            <?php echo $row['groupName']; ?>
                        </h5>
                    </div>
                    <div class="buttonPart">
                        <a href class="subject">3 Subjects</a>
                        <a class="btn btn-primary" id="<?php echo $row['groupId']; ?>"><i class="fa-solid fa-house"></i>Edit
                            Group</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php //------------------------------------popup-----------------------------------------//
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
                        <input type="button" value="Cancel" class="closeBtn">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
include("footer.php");
?>