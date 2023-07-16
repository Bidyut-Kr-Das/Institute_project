<?php
include("nav.php");
// $students=array();
if (isset($_REQUEST['classId'])) {
  $filterId = $_REQUEST['classId'];
  $query = "SELECT * FROM `stud-cls-grp` WHERE  `classId`='$filterId'";
  $res = mysqli_query($connection, $query);
} else if (isset($_REQUEST['groupId'])) {
  $filterId = $_REQUEST['groupId'];
  $query = "SELECT * FROM `stud-cls-grp` WHERE `groupId`='$filterId' ";
  $res = mysqli_query($connection, $query);
} else {
  $filterId = $_REQUEST['subjectId'];
  $query =  "SELECT * FROM `stud-cls-grp` WHERE `subjId`= '$filterId' ";
  $res = mysqli_query($connection, $query);
}
// $query="SELECT * FROM `studentmaster` WHERE "
?>

<div class="search_S">
  <form action="">
    <input type="search" required autocomplete="off">
    <i class="fa fa-search"></i>
  </form>
</div>
<section>

  <h1>Student Table</h1>
  <div class="adds">
    <a href="stud_from.php"><button id="butn_s"> Add Student</button></a>
  </div>

  <div class="tbl">

    <div class="tbl-heade">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr class="tbl-header">
            <th>Name</th>
            <th>Phone no.</th>
            <th>Email</th>
            <th id="cl">Class</th>
            <th colspan="2" id="cll">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($res) == 0) {
          ?>
            <tr>
              <td colspan="6">No result found</td>
            </tr>
            <?php
          } else {
            while ($row = mysqli_fetch_array($res)) {
              // array_push($students,$row['studId']);
              $student = $row['studId'];
              // echo "<script>alert(' " . $student . " ')</script>";
              $query1 = "SELECT * FROM `studentmaster` WHERE `id`='$student' ";
              $result1 = mysqli_query($connection, $query1);
              $rowarr = mysqli_fetch_array($result1);
              if ($rowarr['active'] == 'N') {
                continue;
              } else {
            ?>
                <tr class="tbl-content" id="info_h">
                  <td id="info_hl"><?php echo $rowarr['studentName']; ?></td>
                  <td><?php echo $rowarr['studPhNo']; ?></td>
                  <td><?php echo $rowarr['email']; ?></td>
                  <td id="clas"><?php echo $rowarr['class']; ?></td>
                  <td><a href="stud_from.php?edittingStudent=<?php echo $rowarr['id'] ?>"><button id="butn_s"> Edit</button></a></td>
                  <td id="info_hr"><a href="deactivate.php?studDeactiveId=<?php echo $rowarr['id']; ?>"><button id="butn_s"> Delete</button></a></td>
                </tr>
          <?php
              }
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</section>




<?php
include("footer.php");
?>