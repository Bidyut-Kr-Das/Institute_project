<?php
include("header.php");

if (isset($_REQUEST['mode'])) {

    //!                   kingshuk
    //?                  sil
    //*                  kingshuk sil
    $studFName = $_REQUEST['studFName'];
    $studLName = $_REQUEST['studLName'];
    $studfullName = $studFName . " " . $studLName; //done

    $studEmail = $_REQUEST['studEmail']; //done
    $studMobile = $_REQUEST['studMobile']; //done
    $studGender = $_REQUEST['studGender']; //done
    $studClass = $_REQUEST['studClass']; //done
    $studBoard = $_REQUEST['studBoard']; //board
    $studAge = $_REQUEST['studAge']; //done
    $guardName = $_REQUEST['guardName'];
    $guardMobile = $_REQUEST['guardMobile'];
    $query = "INSERT INTO `studentmaster` SET `studentName`='$studfullName',
                                                                                            `studPhNo`='$studMobile',
                                                                                            `email`='$studEmail',
                                                                                            `gender`='$studGender',
                                                                                            `class`='$studClass',
                                                                                            `eduBoard`='$studBoard',
                                                                                            `age`='$studAge',
                                                                                            `parentName`='$guardName',
                                                                                            `prntPhNo`='$guardMobile'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:group_add.php");
    }

}

?>
<div class="heading">
    <h2>Student's Registation Form</h2>
    <div class="form">
        <form>
            <input type="hidden" name="mode" value="1">
            <div class="inputname">
                <span class="span1">
                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" First name" name="studFName" class="studname">
                </span>
                <span class="span1">
                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" Last name" name="studLName" class="studname">
                </span>
            </div>
            <div class="inputname">

                <span class="span2">
                    <ion-icon name="mail-unread"></ion-icon>
                    <input type="text" placeholder=" Enter your E-Mail" name="studEmail" class="allname">

            </div>

            <div class="inputname">
                <span class="span2">
                    <ion-icon name="call"></ion-icon>
                    <input type="number" placeholder=" Enter your Ph.no" name="studMobile" class="allname">
                </span>
            </div>

            <div class="inputname">

                <select name="studGender" class="studname">
                    <option value="">Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                </select>
                <i class="fa-solid fa-person"></i>

            </div>

            <div class="inputname">
                <span class="span1">
                    <ion-icon name="book"></ion-icon>
                    <input type="number" placeholder=" Class" name="studClass" class="studname">
                </span>
                <span class="span1">
                    <ion-icon name="bookmarks"></ion-icon>
                    <select class="studname" name="studBoard">
                        <option>Select Educatioal Board</option>
                        <option value="WBBSE">WBBSE</option>
                        <option value="WBCHSE">WBCHSE</option>
                        <option value="ICSE">ICSE</option>
                        <option value="ISC">ISC</option>
                        <option value="CBSE">CBSE</option>
                    </select>
                </span>
            </div>



            <div class="inputname">
                <span class="span2">
                    <ion-icon name="accessibility"></ion-icon>
                    <input type="number" placeholder=" Enter your age" name="studAge" class="allname">
                </span>
            </div>

            <div class="inputname">
                <span class="span2">

                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" Guardian's Name" name="guardName" class="allname">
                </span>
            </div>

            <div class="inputname">
                <span class="span2">

                    <ion-icon name="call"></ion-icon>
                    <input type="number" placeholder=" Guardian's Ph.No" name="guardMobile" class="allname">
                </span>
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