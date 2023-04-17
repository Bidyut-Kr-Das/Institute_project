<?php
include("header.php");
if (isset($_REQUEST['mode'])) {
    $teachFName = $_REQUEST['teachFName'];
    $teachLName = $_REQUEST['teachLName'];
    $teacherFullName = $teachFName . " " . $teachLName; //done
    $teachEmail = $_REQUEST['teachEmail']; //done
    $teachMobile = $_REQUEST['teachMobile']; //done
    $teachGender = $_REQUEST['teachGender']; //done
    $teachHQ = $_REQUEST['teachHQ']; //done
    $groupId = $_REQUEST['groupName']; //done
    $teachAge = $_REQUEST['teachAge'];
    $query = "INSERT INTO `teachermaster` SET  `name`='$teacherFullName',
                                                                                            `highest_Dg`='$teachHQ', 
                                                                                            `phone_Number`='$teachMobile',
                                                                                            `group_Id`='$groupId',
                                                                                            `email`='$teachEmail',
                                                                                            `gender`='$teachGender',
                                                                                            `age`='$teachAge' ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        @header("location:group_add.php?msg=Teacher Successfully Added");
    }

}
?>
<div class="heading">
    <h2>Teacher's Registation Form</h2>
    <div class="form">
        <form>
            <input type="hidden" name="mode" value="1">
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

                <span class="span1 board">

                    <ion-icon name="bookmarks"></ion-icon>
                    <select class="studname" name="groupName">
                        <option> GROUPS</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </span>
            </div>



            <div class="inputname">
                <span class="span2">
                    <ion-icon name="accessibility"></ion-icon>
                    <input type="number" placeholder=" Enter your age" class="allname" name="teachAge">
                </span>
            </div>

            <!-- <div class="inputname">
                <ion-icon name="person"></ion-icon>
                <input type ="text" placeholder=" Guardian's Name" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="call"></ion-icon>
                <input type ="number" placeholder=" Guardian's Ph.No" class="allname">
            </div> -->

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