<?php
include("nav.php");
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="search_S">
    <form action="">
      <input type="search" required autocomplete="off">
      <i class="fa fa-search"></i>
    </form>
</div>
<section>

  <h1>Student Table</h1>
  <div class="adds">
    <button id="butn_s"> Add Student</button>
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
            <th>Gender</th>
            <th colspan="2" id="cll">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="tbl-content" id="info_h">
          <td id="info_hl">Swarnadip</td>
          <td>0987654321 </td>
          <td>loverboy69@harder.com</td>
          <td id="clas">12</td>
          <td >m/f</td>
          <td ><button id="butn_s"> Edit</button></td>
          <td id="info_hr"><button id="butn_s"> Delete</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</section>




<?php
include("footer.php");
?>