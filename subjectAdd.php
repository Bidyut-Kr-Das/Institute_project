<?php
include("connection/connection.php");
$addingSubject = false;
$edittingSubject = false;
if (isset($_REQUEST['addSubject'])) {
    $addingSubject = true;
}
if (isset($_REQUEST['editSubject'])) {
    $edittingSubject = true;
}
include("nav.php");
?>


<div class="bgImage"></div>
<div class="mainDiv">
    <div class="cardHolder">
        <div class="card" id="addGroup">
            <div class="card-body addCard">
                <ion-icon name="add-circle-outline" class="addIcon"></ion-icon>
                <h5 class="card-title1">Add Subject</h5>
            </div>
        </div>
        <?php
        // --------------------------------------------main cards---------------------------------------//
        ?>
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 class="subjectName">Subject 1</h5>
                </div>
                <div class="buttonPart">
                    <a href class="subject">3 Subjects</a>
                    <a class="btn btn-primary" id="1">Edit Group</a>
                </div>
            </div>
        </div>
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
                <form action="group_add.php" method="post">
                    <div class="groupNameBody">
                        <div class="groupNamePopup">Enter group Name:</div>
                        <input type="text" name="" id="" class="groupNamefield" required autocomplete="off" />
                        <?php
                        if ($edittingGroup) {
                            ?>
                            <input type="hidden" name="edit" value="true" />
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