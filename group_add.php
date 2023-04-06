<?php
include("connection/connection.php");
$addingGroup = false;
$edittingGroup = false;
if (isset($_REQUEST['addGroup'])) {
    $addingGroup = true;
}
if (isset($_REQUEST['editGroup'])) {
    $edittingGroup = true;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="css/group_add.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css"
        integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="js/all.js" defer></script>
    <div class="bgImage"></div>
    <div class="mainDiv">
        <div class="cardHolder">
            <div class="card" onclick="controlPopup('addGroup')">
                <div class="card-body addCard">
                    <ion-icon name="add-circle-outline" class="addIcon"></ion-icon>
                    <h5 class="card-title1">Add Group</h5>
                </div>
            </div>
            <?php
            // --------------------------------------------main cards---------------------------------------//
            ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="groupName">Group</h5>
                    </div>
                    <div class="buttonPart">
                        <a href="" class="subject">3 Subjects</a>
                        <a href="#" class="btn btn-primary" onclick="controlPopup('editGroup')">Edit Group</a>
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
                    <form action="" method="post">
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
                            <input type="button" value="Cancel" class="closeBtn" onclick="controlPopup()">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } ?>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
        crossorigin="anonymous"></script>
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>