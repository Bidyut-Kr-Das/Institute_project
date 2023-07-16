<?php
include("nav.php");
session_start();
$addingTeacher = false;
$edittingTeacher = false;
// if (empty($_SESSION['id'])) {
//     @header("location:index.php?msg=unknown Admin");
//     exit();
// }
if (isset($_REQUEST['addTeach'])) {
    $addingTeacher = true;
} else {
    $edittingTeacher = true;
    $teacherId;
}
if (isset($_REQUEST['mode1'])) {
    $teachFName = $_REQUEST['teachFName'];
    $teachLName = $_REQUEST['teachLName'];
    $teacherFullName = $teachFName . " " . $teachLName; //done
    $teachEmail = $_REQUEST['teachEmail']; //done
    $teachMobile = $_REQUEST['teachMobile']; //done
    $teachGender = $_REQUEST['teachGender']; //done
    $teachHQ = $_REQUEST['teachHQ']; //done
    $teachClass = $_REQUEST['class-add--form'];
    $teachSubject = $_REQUEST['subject-add--form'];

    $groupId = $_REQUEST['groupName']; //done
    $teachAge = $_REQUEST['teachAge']; //done
    $query = "INSERT INTO `teachermaster` SET  `name`='$teacherFullName',
                                                                                            `highest_Dg`='$teachHQ', 
                                                                                            `phone_Number`='$teachMobile',
                                                                                            `group_Id`='$groupId',
                                                                                            `email`='$teachEmail',
                                                                                            `gender`='$teachGender',
                                                                                            `age`='$teachAge' ";
    $result = mysqli_query($connection, $query);
    $query = "SELECT  t.teacher_Id FROM `teachermaster`as t WHERE `name`='$teacherFullName' AND `phone_Number`='$teachMobile' ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    $teachId = $row['teacher_Id'];
    // echo "<script>alert('".$teachId."')</script>";

    for ($i = 0; $i < (count($teachClass)); $i++) {
        $classId = $teachClass[$i];
        $subjectId = $teachSubject[$i];
        echo "<script>alert('" . $classId . "')</script>";
        if ($classId == "NULL" && $subjectId == "NULL") {
            continue;
        } else {
            $query = "INSERT INTO `teach-cls-subj` SET  `teacherId`='$teachId',
                                                                                               `subjectId`='$subjectId',
                                                                                               `classId`='$classId' ";
            $result = mysqli_query($connection, $query);
        }
    }
    if ($result) {
        // @header("location:group_add.php?msg=Teacher Successfully Added");
    }
}
?>
<div class="heading">
    <h2>Teacher's Registation Form</h2>
    <div class="form">
        <form>
            <input type="hidden" name="<?php if ($addingTeacher) {
                                            echo "mode1";
                                        } else {
                                            echo "mode2";
                                        } ?>" value="1">
            <div class="inputname">
                <span class="span1 fname">
                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" First name" class="studname" name="teachFName">
                </span>

                <span class="span1 lname">
                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" Last name" class="studname" name="teachLName">
                </span>
            </div>
            <div class="inputname">
                <span class="span2">
                    <ion-icon name="mail-unread"></ion-icon>
                    <input type="text" placeholder=" Enter your E-Mail" class="allname" name="teachEmail">
                </span>
            </div>

            <div class="inputname">
                <span class="span2">
                    <ion-icon name="call"></ion-icon>
                    <input type="number" placeholder=" Enter your Ph.no" class="allname" name="teachMobile">
                </span>
            </div>

            <div class="inputname">

                <select class="studname" name="teachGender">
                    <option value="NULL">Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <i class="fa-solid fa-person"></i>

            </div>
            <div class="inputname">
                <span class="span1 book1">
                    <ion-icon name="book"></ion-icon>
                    <input type="number" placeholder=" Higher Qualification" class="studname" name="teachHQ">
                </span>
                <span class="span1 book1">
                    <ion-icon name="accessibility"></ion-icon>
                    <input type="number" placeholder=" Enter your age" class="allname" name="teachAge">
                </span>


            </div>



            <div class="inputnamenew d-none" id="selectionSection">
                <span class="span1 board">
                    <ion-icon name="bookmarks"></ion-icon>
                    <select name="class-add--form[]" id="" class="studname" required>
                        <option value="NULL">Select Class</option>

                        <?php
                        $query = "SELECT * FROM `classmaster`ORDER BY `classId`";
                        $res = mysqli_query($connection, $query);
                        while ($rowarr = mysqli_fetch_array($res)) {
                        ?>

                            <option value="<?php echo $rowarr['classId']; ?>"><?php echo $rowarr['className']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </span>
                <span class="span1 board">
                    <ion-icon name="bookmarks"></ion-icon>
                    <select name="subject-add--form[]" id="" class="studname" required>
                        <option value="NULL">Select Subject</option>

                        <?php
                        $query = "SELECT * FROM `subject_master`ORDER BY `sub_Id`";
                        $res = mysqli_query($connection, $query);
                        while ($rowarr = mysqli_fetch_array($res)) {
                        ?>

                            <option value="<?php echo $rowarr['sub_Id']; ?>"><?php echo $rowarr['sub_Name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </span>
                <i class="fa-regular fa-square-minus" onclick="del(this)"></i>
                <!-- <span class="removeBtn"></span> -->
            </div>

            <!-- <div class="inputname">
                <ion-icon name="person"></ion-icon>
                <input type ="text" placeholder=" Guardian's Name" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="call"></ion-icon>
                <input type ="number" placeholder=" Guardian's Ph.No" class="allname">
            </div> -->
            <div id="cloningSpace"></div>
            <div id="tooltip">
                <i class="fa-solid fa-square-plus" id="addRow"></i>
                <span id="tooltiptext">Add Row</span>
            </div>

            <div class="inputname">
                <span class="span2">
                    <input type="checkbox" id="cb" class="check-button">
                    <label for="cb" class="check">I accept the terms and conditions</label>
                </span>
            </div>

            <div class="inputname">
                <input type="submit" class="button" value="Register">

            </div>

        </form>
    </div>
</div>
<?php
include("footer.php");
?>