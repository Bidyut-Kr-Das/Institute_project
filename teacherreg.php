<?php
include("header.php");
session_start();
if (empty($_SESSION['id'])) {
    @header("location:index.php?msg=unknown Admin");
    exit();
}
if (isset($_REQUEST['mode'])) {
    $teachFName = $_REQUEST['teachFName'];
    $teachLName = $_REQUEST['teachLName'];
    $teacherFullName = $teachFName . " " . $teachLName; //done
    $teachEmail = $_REQUEST['teachEmail']; //done
    $teachMobile = $_REQUEST['teachMobile']; //done
    $teachGender = $_REQUEST['teachGender']; //done
    $teachHQ = $_REQUEST['teachHQ']; //done
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
                    <div class="studname openSubj--k">Select Subject</div>
                    <div class="drop--downSubj--k">
                        <?php 
                        $query="SELECT * FROM `subject_master`ORDER BY `sub_Id`";
                        $res=mysqli_query($connection,$query);
                        while($rowarr=mysqli_fetch_array($res)){      
                        ?>
                        <div class="checkboxDiv--k">
                            <input type="checkbox" class="checkbox--form--stud" value="<?php echo $rowarr['sub_Id'];?>" name="group-add--form[]" id="<?php echo $rowarr['sub_Name'];?>">
                            <label for="<?php echo $rowarr['sub_Name'];?>"><?php echo $rowarr['sub_Name'];?></label>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </span>
            </div>



            <div class="inputname">
                <span class="span1 book1">
                    <ion-icon name="accessibility"></ion-icon>
                    <input type="number" placeholder=" Enter your age" class="allname" name="teachAge">
                </span>
                <span class="span1 board">

                    <ion-icon name="bookmarks"></ion-icon>
                    <div class="studname openClass--k">Select Class</div>
                    <div class="drop--downClass--k">
                        <?php 
                        $query="SELECT * FROM `classmaster`ORDER BY `classId`";
                        $res=mysqli_query($connection,$query);
                        while($rowarr=mysqli_fetch_array($res)){      
                        ?>
                        <div class="checkboxDiv--k">
                            <input type="checkbox" class="checkbox--form--stud" value="<?php echo $rowarr['classId'];?>" name="group-add--form[]" id="<?php echo $rowarr['className'];?>">
                            <label for="<?php echo $rowarr['className'];?>"><?php echo $rowarr['className'];?></label>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
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