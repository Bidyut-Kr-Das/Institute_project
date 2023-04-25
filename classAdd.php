<?php
include("nav.php"); 
$addingClass=false;
$edittingClass=false;
$deletingClass=false;
$classBaseFee="";
$className="";
$classNameEdit="";
if(isset($_REQUEST['addClass'])){
    $addingClass=true;
}
if(isset($_REQUEST['editClass'])){
    $edittingClass=true;
    $classId=$_REQUEST['classId'];
    $query="SELECT * FROM `classmaster` WHERE `classId`='$classId'";
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_array($result);
    $classId=$row['classId'];
    $classNameEdit=$row['className'];
    $classBaseFee=$row['baseFee'];
}
if(isset($_REQUEST['deleteClass'])){
    $deletingClass=true;
    $classId=$_REQUEST['classId'];
    $query="SELECT * FROM `classmaster` WHERE `classId`='$classId'";
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_array($result);
    $classId=$row['classId'];
    $className=$row['className'];
}
//todo-- This part adds class to database----------------------------->
if(isset($_REQUEST['add'])){
    $className=$_REQUEST['classNamefield'];
    $classBaseFee=$_REQUEST['baseClsFees'];
    $query="INSERT INTO `classmaster` SET `className`='$className',`baseFee`='$classBaseFee'";
    $result=mysqli_query($connection,$query);
    if($result){
        @header("location:classAdd.php?msg=Successfully Added Group");
    }
}
//todo-- This part edits Class to database------------------------------->
if(isset($_REQUEST['edit'])){
    $classId=$_REQUEST['edit'];
    $classNameEdit=$_REQUEST['classNamefield'];
    $classBaseFee=$_REQUEST['baseClsFees'];
    $query="UPDATE `classmaster` SET `className`='$classNameEdit',`baseFee`='$classBaseFee' WHERE  `classId`='$classId'";
    $result=mysqli_query($connection,$query);
    if($result){
        @header("location:classAdd.php?msg=Successfully updated Class");
    }
}   
//todo-- This parts deletes class from 3 table respectively `classmaster`,`stud-cls-grp` and `teach-cls-grp`
if(isset($_REQUEST['delete'])){
    $classId=$_REQUEST['delete'];
    $query="DELETE FROM `classmaster` WHERE `classId`='$classId' ";
    $result1=mysqli_query($connection,$query);
    $query="DELETE FROM `stud-cls-grp` WHERE `classId`='$classId'";
    $result2=mysqli_query($connection,$query);
    $query="DELETE FROM `teach-cls-grp` WHERE  `classId`='$classId'";
    $result3=mysqli_query($connection,$query);
    if($result1&&$result2&&$result3){
        @header("location:classAdd.php?msg=Successfully deleted");
    }
}
$query="SELECT * FROM `classmaster` ORDER BY `classId` DESC";
$res=mysqli_query($connection,$query);


?>


<div class="mainDiv">
    <div class="cardHolder">
        <div class="card" id="addClass">
            <div class="card-body addCard">
                <ion-icon name="add-circle-outline" class="addIcon"></ion-icon>
                <h5 class="card-title1">Add Class</h5>
            </div>
        </div>
        <?php
        while ($rowarr = mysqli_fetch_array($res)) {
            ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="subjectName">
                            <?php echo $rowarr['className']; ?>
                        </h5>
                    </div>
                    <div class="buttonPart">
                        <a href="classAdd.php?editClass=true&classId=<?php echo $rowarr['classId']; ?>"
                        class="btn btn-primary editSubjBtn" id="" subjectId=""><i class="fa-solid fa-pen"></i> Edit
                    </a>
                    <a href="classAdd.php?deleteClass=true&classId=<?php echo $rowarr['classId'];?>"class="deleteBtnSubj"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php //------------------------------------popup-----------------------------------------//
if ($addingClass || $edittingClass) {
    ?>
    <div class="blackwindow">
        <div class="popupMain">
            <div class="popupBody">
                <div class="subjectNameBody">
                <?php
                if ($edittingClass) {
                    ?>
                    <div class="heading1Subj">
                        Edit <span class="headingsub1"> Class </span>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="heading1Subj">
                        Add <span class="headingsub1"> New Class </span>
                    </div>
                    <?php
                }
                ?>
                <form action="" method="post" class="subjBodySubPart">
                        <div class="subjectNamePopup">Enter Class Name:</div>
                        <input type="text" value="<?php echo $classNameEdit; ?>" name="classNamefield" id=""
                            class="subjectNamefield" required autocomplete="off" />
                        <?php
                        if ($edittingClass) {
                            ?>
                            <input type="hidden" name="edit" value="<?php echo $classId; ?>" />
                            <?php
                        } else {
                            ?>
                            <input type="hidden" name="add" value="1" />
                            <?php
                        }
                        ?>
                        <div class="buttonDivSubjEdit">
                            <input type="number" value="<?php echo $classBaseFee;?>"name="baseClsFees" id="baseClsFees" placeholder="Base Class Fee" required>
                                <input type="submit" value=<?php
                            if ($edittingClass) {
                                echo "'Update'";
                            } else {
                                echo "'Add Class'";
                            } ?> class="submitBtnSubj" />
                            <input type="button" value="Cancel" class="closeClsBtn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
if ($deletingClass) {
    ?>
    <div class="blackwindow">
        <div class="popupMain">
            <div class="popupBody">
                <form action="">
                <div class="heading1DeleteModal">
                    Delete <span class="headingsub1"> The Class? </span>
                </div>
                    <div class="groupNameBody">
                        <div class="inputField">

                            <div class="groupNamePopup">Are you sure you want to delete <span class="colorGrpName">
                                    <?php echo $className; ?>
                                </span>
                             ?</div>
                            <div class="warning">
                                <p><strong>Warning!</strong> It will delete the class permanently for all students and all teachers.
                                   </p>
                            </div>   
                        </div>
                        <div class="buttonDivDeleteModal">
                            <input type="hidden" name="delete" value="<?php echo $classId; ?>" />
                            <input type="submit" value="Yes" class="submitBtnDeleteModal" />
                            <a href="classAdd.php"><input type="button" class="closeBtnDeleteModal" value="No"></a>
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