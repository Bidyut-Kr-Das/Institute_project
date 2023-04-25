<?php
// session_start();
// if (empty($_SESSION['id'])) {
//     @header("location:index.php?msg=unknown Admin");
//     exit();
// }
// if (empty($_REQUEST['groupId'])) {
//     @header("location:group_add.php?msg=No Group Found");
//     exit();
// }
// $groupId = $_REQUEST['groupId'];
include("connection/connection.php");
$addingSubject = false;
$edittingSubject = false;
$subjectNameEdit = "";
$deletingSubject=false;
//to bring the modal of adding subject.
if (isset($_REQUEST['addSubject'])) {
    $addingSubject = true;
}
if(isset($_REQUEST['deleteSubj'])){
    $deletingSubject=true;
    $subjectId=$_REQUEST['subjId'];
    $query="SELECT * FROM `subject_master` WHERE `sub_Id`='$subjectId'";
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_array($result);
    $subjName=$row['sub_Name'];
    $subId=$row['sub_Id'];
}
//to bring the modal of editting subject
if (isset($_REQUEST['editSubject'])) {
    $edittingSubject = true;
    $subjectId = $_REQUEST['subjectId'];
    $query = "SELECT * FROM `subject_master`WHERE `sub_Id`='$subjectId'";
    $result = mysqli_query($connection, $query);
    $rowarr1 = mysqli_fetch_array($result);
    $subjectNameEdit = $rowarr1['sub_Name'];
    $subjectId = $rowarr1['sub_Id'];
    $subjectBaseFee=$rowarr1['baseFee'];
}
//queries to add the subject in database
if (isset($_REQUEST['add'])) {
    // $groupId1 = $_REQUEST['add'];
    $subjectName = $_REQUEST['subjectNamefield'];
    $baseSubjFee= $_REQUEST['baseSubjFees'];
    $query = "INSERT INTO `subject_master` SET `sub_Name`='$subjectName', `baseFee`='$baseSubjFee'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:subjectAdd.php?msg=Subject Added SuccessFully");
    }
}
if (isset($_REQUEST['edit'])) {
    $groupId1 = $_REQUEST['groupId'];
    $subjectId1 = $_REQUEST['edit'];
    $subjectName = $_REQUEST['subjectNamefield'];
    $newBaseFee=$_REQUEST['baseSubjFees'];
    $query = "UPDATE `subject_master` SET `sub_Name`='$subjectName',`baseFee`='$newBaseFee'WHERE `sub_Id`='$subjectId1' ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:subjectAdd.php?msg=Subject Updated Successfully");
    }
}
//todo: query to delete subject from database
if(isset($_REQUEST['delete'])){
    $subId=$_REQUEST['delete'];
    $query="DELETE FROM `subject_master` WHERE `sub_Id`='$subId'";
    $result=mysqli_query($connection,$query);
    $query="DELETE FROM `group-subj` WHERE `subjectId`='$subId'";
    $result=mysqli_query($connection,$query);
    if($result){
        @header("location:subjectAdd.php?msg=successfully deleted subject");
    }
}
//query to bring the right subjects from database
$query = "SELECT * FROM `subject_master`ORDER BY 'sub_Id' ";
$result = mysqli_query($connection, $query);

include("nav.php");

?>


<!-- <groupid class="groupIdPassed" groupIdgiven="<?php //echo $groupId; ?>"></groupid> -->
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
                        <a href="subjectAdd.php?editSubject=true&subjectId=<?php echo $rowarr['sub_Id']; ?>"
                        class="btn btn-primary editSubjBtn" id="" subjectId=""><i class="fa-solid fa-pen"></i> Edit
                    </a>
                    <a href="subjectAdd.php?deleteSubj=true&subjId=<?php echo $rowarr['sub_Id'];?>"class="deleteBtnSubj"><i class="fa-solid fa-trash"></i></a>
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
                <div class="subjectNameBody">
                <?php
                if ($edittingSubject) {
                    ?>
                    <div class="heading1Subj">
                        Edit <span class="headingsub1"> Subject </span>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="heading1Subj">
                        Add <span class="headingsub1"> New Subject </span>
                    </div>
                    <?php
                }
                ?>
                <form action="" method="post" class="subjBodySubPart">
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
                        <div class="buttonDivSubjEdit">
                            <input type="number" value="<?php echo $subjectBaseFee;?>"name="baseSubjFees" id="baseSubjFees" placeholder="Base Subject Fee" required>
                                <input type="submit" value=<?php
                            if ($edittingSubject) {
                                echo "'Update'";
                            } else {
                                echo "'Add Subject'";
                            } ?> class="submitBtnSubj" />
                            <input type="button" value="Cancel" class="closeSubjBtn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
if ($deletingSubject) {
    ?>
    <div class="blackwindow">
        <div class="popupMain">
            <div class="popupBody">
                <form action="">
                <div class="heading1DeleteModal">
                    Delete <span class="headingsub1"> The Subject? </span>
                </div>
                    <div class="groupNameBody">
                        <div class="inputField">

                            <div class="groupNamePopup">Are you sure you want to delete <span class="colorGrpName">
                                    <?php echo $subjName; ?>
                                </span>
                                Subject?
                            </div>
                            <div class="warning">
                                <p><strong>Warning!</strong> It will delete the subject from all the groups permanently
                                   </p>
                            </div>   
                        </div>
                        <div class="buttonDivDeleteModal">
                            <input type="hidden" name="delete" value="<?php echo $subId; ?>" />
                            <input type="submit" value="Yes" class="submitBtnDeleteModal" />
                            <a href="subjectAdd.php"><input type="button" class="closeBtnDeleteModal" value="No"></a>
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