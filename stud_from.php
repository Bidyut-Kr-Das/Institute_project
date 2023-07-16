<?php
include("nav.php");
// session_start();
// if (empty($_SESSION['id'])) {
//     @header("location:index.php?msg=unknown Admin");
//     exit();
// }
$studFName = "";
$studLName = "";
$studEmail = "";
$studMobile = "";
$studGender = "";
$studClass = "";
$studBoard = "";
$studAge = "";
$guardName = "";
$guardMobile = "";

$studId = "A";
$edittingStudent = false;
if (isset($_REQUEST['edittingStudent'])) {
    $studId = $_REQUEST['edittingStudent'];
    $edittingStudent = true;
    $query = "SELECT * FROM `studentmaster` WHERE  `id`='$studId' ";
    $result = mysqli_query($connection, $query);
    $rowarr = mysqli_fetch_array($result);
    $studfullName = $rowarr['studentName'];
    $indexofspace = strpos($studfullName, " ");
    $studFName = substr($studfullName, 0, $indexofspace);
    $studLName = substr($studfullName, ($indexofspace + 1));
    // echo "<script>alert('" . $studFName . "')</script>";
    $studEmail = $rowarr['email'];
    $studMobile = $rowarr['studPhNo'];
    $studGender = $rowarr['gender'];
    $studClass = $rowarr['class'];
    $studBoard = $rowarr['eduBoard'];
    $studAge = $rowarr['age'];
    $guardName = $rowarr['parentName'];
    $guardMobile = $rowarr['prntPhNo'];
    $selectedGroup = array();
    $query = "SELECT * FROM `stud-cls-grp` WHERE  `studId`='$studId' ";
    $result = mysqli_query($connection, $query);
    while ($row2 = mysqli_fetch_array($result)) {
        array_push($selectedGroup, $row2['groupId']);
    }
}

if (isset($_REQUEST['mode1'])) {

    // // //!                   kingshuk
    // // //?                  sil
    // // //*                  kingshuk sil
    $studFName = $_REQUEST['studFName'];
    $studLName = $_REQUEST['studLName'];
    $studfullName = $studFName . " " . $studLName; //done

    $studEmail = $_REQUEST['studEmail']; //done
    $studMobile = $_REQUEST['studMobile']; //done
    $studGender = $_REQUEST['studGender']; //done
    $studClass = $_REQUEST['studClass']; //done
    $query = "SELECT * FROM `classmaster` WHERE `classId`='$studClass' ";
    $res = mysqli_query($connection, $query);
    $row1 = mysqli_fetch_array($res);
    $class = $row1['className'];
    $studBoard = $_REQUEST['studBoard']; //board
    $studAge = $_REQUEST['studAge']; //done
    $guardName = $_REQUEST['guardName']; //done
    $guardMobile = $_REQUEST['guardMobile']; //done
    $groups = $_REQUEST['group-add--form']; //done
    $query = "INSERT INTO `studentmaster` SET `studentName`='$studfullName',
                                                                                            `studPhNo`='$studMobile',
                                                                                            `email`='$studEmail',
                                                                                            `gender`='$studGender',
                                                                                            `class`='$class',
                                                                                            `eduBoard`='$studBoard',
                                                                                            `age`='$studAge',
                                                                                            `parentName`='$guardName',
                                                                                            `prntPhNo`='$guardMobile'";
    $result = mysqli_query($connection, $query);
    $query = "SELECT s.id FROM studentmaster as s WHERE `studentName`='$studfullName' AND `studPhNo`='$studMobile' ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    $studId = $row['id'];
    // echo "<script>".$studClass."</script>";

    foreach ($groups as $val) {
        $query = "INSERT INTO `stud-cls-grp` SET `studId`='$studId',`classId`='$studClass',`groupId`='$val' ";
        $result = mysqli_query($connection, $query);
    }
    if ($result) {
        @header("location:studFilter.php?studByClass=true");
    }
}
if (isset($_REQUEST['mode2'])) {
    $studId = $_REQUEST['mode2'];
    $studFName = $_REQUEST['studFName'];
    $studLName = $_REQUEST['studLName'];
    $studfullName = $studFName . " " . $studLName; //done

    $studEmail = $_REQUEST['studEmail']; //done
    $studMobile = $_REQUEST['studMobile']; //done
    $studGender = $_REQUEST['studGender']; //done
    $studClass = $_REQUEST['studClass']; //done
    $query = "SELECT * FROM `classmaster` WHERE `classId`='$studClass' ";
    $res = mysqli_query($connection, $query);
    $row1 = mysqli_fetch_array($res);
    $class = $row1['className'];
    $studBoard = $_REQUEST['studBoard']; //board
    $studAge = $_REQUEST['studAge']; //done
    $guardName = $_REQUEST['guardName']; //done
    $guardMobile = $_REQUEST['guardMobile']; //done
    $groups = $_REQUEST['group-add--form']; //done
    $query = "UPDATE `studentmaster` SET `studentName`='$studfullName',
                                                                                            `studPhNo`='$studMobile',
                                                                                            `email`='$studEmail',
                                                                                            `gender`='$studGender',
                                                                                            `class`='$class',
                                                                                            `eduBoard`='$studBoard',
                                                                                            `age`='$studAge',
                                                                                            `parentName`='$guardName',
                                                                                            `prntPhNo`='$guardMobile' WHERE `id`='$studId' ";
    $result = mysqli_query($connection, $query);
    $query = "DELETE FROM `stud-cls-grp` WHERE `studId`='$studId' ";
    $res = mysqli_query($connection, $query);
    foreach ($groups as $val) {
        $query = "INSERT INTO `stud-cls-grp` SET `studId`='$studId',`classId`='$studClass',`groupId`='$val' ";
        $result = mysqli_query($connection, $query);
    }
    if ($result) {
        @header("location:studFilter.php?studByClass=true&msg=Successfully Editted.");
    }
}

?>
<div class="heading">
    <h2>Student's Registation Form</h2>
    <div class="form">
        <form>
            <input type="hidden" name="<?php
                                        if ($edittingStudent) {
                                            echo "mode2";
                                        } else {
                                            echo "mode1";
                                        }
                                        ?>" value="<?php echo $studId; ?>">
            <div class="inputname">
                <span class="span1 fname">
                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" First name" value="<?php echo $studFName; ?>" name="studFName" class="studname">
                </span>
                <span class="span1 lname">
                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" Last name" value="<?php echo $studLName; ?>" name="studLName" class="studname">

                </span>
            </div>
            <div class="inputname">

                <span class="span2">
                    <ion-icon name="mail-unread"></ion-icon>
                    <input type="text" placeholder=" Enter your E-Mail" name="studEmail" value="<?php echo $studEmail; ?>" class="studname">

            </div>

            <div class="inputname">
                <span class="span2">
                    <ion-icon name="call"></ion-icon>
                    <input type="number" placeholder=" Enter your Ph.no" value="<?php echo $studMobile; ?>" name="studMobile" class="studname">
                </span>
            </div>

            <div class="inputname">

                <select name="studGender" class="studname">
                    <option value="">Select your gender</option>
                    <option value="Male" <?php if ($studGender == 'M') {
                                                echo "selected";
                                            } ?>>Male</option>
                    <option value="Female" <?php if ($studGender == 'F') {
                                                echo "selected";
                                            } ?>>Female</option>

                </select>
                <i class="fa-solid fa-person"></i>
            </div>

            <div class="inputname">
                <span class="span1 book1">
                    <ion-icon name="book"></ion-icon>

                    <select class="studname" name="studClass">
                        <option>Select Your Class</option>
                        <?php
                        $query = "SELECT * FROM  `classmaster` ORDER BY  `classId` DESC";
                        $res = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <option value="<?php echo $row['classId']; ?>" <?php if ($row['className'] == $studClass) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row['className']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </span>
                <span class="span1 board">
                    <ion-icon name="bookmarks"></ion-icon>

                    <select class="studname" name="studBoard">
                        <option>Select Educatioal Board</option>
                        <option value="WBBSE" <?php if ($studBoard == "WBBSE") {
                                                    echo "selected";
                                                } ?>>WBBSE</option>
                        <option value="WBCHSE" <?php if ($studBoard == "WBCHSE") {
                                                    echo "selected";
                                                } ?>>WBCHSE</option>
                        <option value="ICSE" <?php if ($studBoard == "ICSE") {
                                                    echo "selected";
                                                } ?>>ICSE</option>
                        <option value="ISC" <?php if ($studBoard == "ISC") {
                                                echo "selected";
                                            } ?>>ISC</option>
                        <option value="CBSE" <?php if ($studBoard == "CBSE") {
                                                    echo "selected";
                                                } ?>>CBSE</option>
                    </select>
                </span>
            </div>



            <div class="inputname">
                <span class="span1 book1">
                    <ion-icon name="accessibility"></ion-icon>
                    <input type="number" placeholder=" Enter your age" value="<?php echo $studAge; ?>" name="studAge" class="studname">
                </span>
                <span class="span1 board">
                    <ion-icon name="people"></ion-icon>

                    <div class="studname openGroup--k">Group</div>
                    <div class="drop--down--k">
                        <?php
                        $query = "SELECT * FROM `groupmaster`ORDER BY `groupId`";
                        $res = mysqli_query($connection, $query);
                        while ($rowarr = mysqli_fetch_array($res)) {
                        ?>
                            <div class="checkboxDiv--k">
                                <input type="checkbox" class="checkbox--form--stud" value="<?php echo $rowarr['groupId']; ?>" name="group-add--form[]" id="<?php echo $rowarr['groupName']; ?>" <?php
                                                                                                                                                                                                if (in_array($rowarr['groupId'], $selectedGroup)) {
                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                }
                                                                                                                                                                                                ?>>
                                <label for="<?php echo $rowarr['groupName']; ?>"><?php echo $rowarr['groupName']; ?></label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </span>
            </div>

            <div class="inputname">
                <span class="span2">

                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" Guardian's Name" value="<?php echo $guardName; ?>" name="guardName" class="studname">
                </span>
            </div>

            <div class="inputname">
                <span class="span2">

                    <ion-icon name="call"></ion-icon>
                    <input type="number" placeholder=" Guardian's Ph.No" value="<?php echo $guardMobile; ?>" name="guardMobile" class="studname">
                </span>
            </div>

            <div class="inputname">
                <span class="span2">

                    <input type="checkbox" id="cb" class="check-button">
                    <label for="cb" class="check">I accept the terms and conditions</label>
                </span>

            </div>

            <div class="inputname">
                <input type="submit" class="button" value="<?php
                                                            if ($edittingStudent) {
                                                                echo "Update";
                                                            } else {
                                                                echo "Register";
                                                            }
                                                            ?>">
            </div>
        </form>
    </div>
</div>
<?php
include("footer.php");
?>