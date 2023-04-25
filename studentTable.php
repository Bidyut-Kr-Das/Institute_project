<?php
include("nav.php");
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="search_S">


    <form action="">
    <input type="search" required>
    <i class="fa fa-search"></i>

    </form>
</div>
<section>

  <h1>Student Table</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone no.</th>
          <th>Email</th>
          <th>Class</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr id="info_h">
          <td id="info_hl">Swarnadip</td>
          <td>0987654321 </td>
          <td>loverboy69@harder.com</td>
          <td>12</td>
          <td ><button id="butn_s"> Edit</button></td>
          <td id="info_hr"><button id="butn_s"> Delete</button></td>
        </tr>
        <tr id="info_h">
          <td>mia boudi</td>
          <td>6969696969</td>
          <td>omago@arojore.com</td>
          <td>69</td>
          <td></td>
        </tr>
        
      </tbody>
    </table>
  </div>
</section>




<?php
include("footer.php");
?>