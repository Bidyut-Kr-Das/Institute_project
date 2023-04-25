<?php
include("header.php");
?>
<header>
    <nav>
        <a href="#home" id="logo">Site Logo</a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
            <li class="active">
                <a href="#" class="f-bl">Student</a>
                <div class="sub-manu1">
                    <ul>
                        <li class="teacher-ul"><a href="studFilter.php?studByClass=true">By Class</a></li>
                        <li class="teacher-ul"><a href="studFilter.php?studByGroup=true">By Group</a></li>
                        <li class="teacher-ul"><a href="studFilter.php?studBySubj=true">By Subject</a></li>
                    </ul>
                </div>
            </li>
            <li class="activeHover">
                <a href="#">Teacher</a>
                <div class="sub-manu1">
                    <ul>
                        <li class="teacher-ul"><a href="#">By Class</a></li>
                        <li class="teacher-ul"><a href="#">By Group</a></li>
                        <li class="teacher-ul"><a href="#">By Subject</a></li>
                    </ul>
                </div>
            </li>
            <li class="activeHover">
                <a href="#">Configuration</a>
                <div class="sub-manu1">
                    <ul>
                        <li class="teacher-ul"><a href="classAdd.php">Add Class</a></li>
                        <li class="teacher-ul"><a href="group_add.php">Add Group</a></li>
                        <li class="teacher-ul"><a href="subjectAdd.php">Add Subject</a></li>
                    </ul>
                </div>
            </li>
            <li class="activeHover">
                <a href="#">Payment</a>
            </li>
            <li class="activeHover">
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
</header>
<!-- Script -->
<?php
// include("footer.php");
?>