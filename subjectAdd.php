<?php
session_start();
if (empty($_SESSION['id'])) {
    @header("location:index.php?msg=unknown Admin");
    exit();
}
if (empty($_REQUEST['groupId'])) {
    @header("location:group_add.php?msg=No Group Found");
    exit();
}
$groupId = $_REQUEST['groupId'];
include("connection/connection.php");
$addingSubject = false;
$edittingSubject = false;
$subjectNameEdit = "";
//to bring the modal of adding subject.
if (isset($_REQUEST['addSubject'])) {
    $addingSubject = true;
}
//to bring the modal of editting subject 
if (isset($_REQUEST['editSubject'])) {
    $edittingSubject = true;
    $subjectId = $_REQUEST['subjectId'];
    $query = "SELECT * FROM `subject_master`WHERE `group_Id`='$groupId' AND `sub_Id`='$subjectId'";
    $result = mysqli_query($connection, $query);
    $rowarr1 = mysqli_fetch_array($result);
    $subjectNameEdit = $rowarr1['sub_Name'];
    $subjectId = $rowarr1['sub_Id'];
}
//queries to add the subject in database
if (isset($_REQUEST['add'])) {
    $groupId1 = $_REQUEST['add'];
    $subjectName = $_REQUEST['subjectNamefield'];
    $query = "INSERT INTO `subject_master` SET `sub_Name`='$subjectName',
                                                                                            `group_Id`='$groupId1' ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:subjectAdd.php?groupId=" . $groupId);
    }
}
if (isset($_REQUEST['edit'])) {
    $groupId1 = $_REQUEST['groupId'];
    $subjectId1 = $_REQUEST['edit'];
    $subjectName = $_REQUEST['subjectNamefield'];
    $query = "UPDATE `subject_master` SET `sub_Name`='$subjectName' WHERE `group_Id`='$groupId1' AND `sub_Id`='$subjectId1' ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:subjectAdd.php?groupId=" . $groupId1);
    }
}
//query to bring the right subjects from database
$query = "SELECT * FROM `subject_master` WHERE `group_Id`='$groupId' ORDER BY 'sub_Id' ";
$result = mysqli_query($connection, $query);

include("nav.php");

?>


<groupid class="groupIdPassed" groupIdgiven="<?php echo $groupId; ?>"></groupid>
<div class="mainDiv">
    <div class="cardHolder">
        <div class="card" id="addSubject">
            <div class="card-body addCard">
                <ion-icon name="add-circle-outline" class="addIcon"></ion-icon>
                <h5 class="card-title1">Add Subject</h5>
            </div>
        </div>
        <?php
        while ($rowarr = mysqli_fetch_array($result)) {
            ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="subjectName">
                            <?php echo $rowarr['sub_Name']; ?>
                        </h5>
                    </div>
                    <div class="buttonPart">
                        <div class="deleteBtnSubj"><i class="fa-solid fa-trash"></i></div>
                        <a href="subjectAdd.php?editSubject=true&groupId=<?php echo $groupId; ?>&subjectId=<?php echo $rowarr['sub_Id']; ?>"
                            class="btn btn-primary editSubjBtn" id="" subjectId=""><i class="fa-solid fa-pen"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php //------------------------------------popup-----------------------------------------//
if ($addingSubject || $edittingSubject) {
    ?>
    <div class="blackwindow">
        <div class="popupMain">
            <div class="popupBody">
                <?php
                if ($edittingSubject) {
                    ?>
                    <div class="heading1">
                        Edit <span class="headingsub1"> Subject </span>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="heading1">
                        Add <span class="headingsub1"> New Subject </span>
                    </div>
                    <?php
                }
                ?>
                <form action="" method="post">
                    <div class="subjectNameBody">
                        <div class="subjectNamePopup">Enter Subject Name:</div>
                        <input type="text" value="<?php echo $subjectNameEdit; ?>" name="subjectNamefield" id=""
                            class="subjectNamefield" required autocomplete="off" />
                        <?php
                        if ($edittingSubject) {
                            ?>
                            <input type="hidden" name="edit" value="<?php echo $subjectId; ?>" />
                            <?php
                        } else {
                            ?>
                            <input type="hidden" name="add" value="<?php echo $groupId; ?>" />
                            <?php
                        }
                        ?>
                        <input type="submit" value=<?php
                        if ($edittingSubject) {
                            echo "'Update'";
                        } else {
                            echo "'Add Subject'";
                        } ?> class="submitBtn" />
                        <input type="button" value="Cancel" class="closeSubjBtn">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
include("footer.php");
?>