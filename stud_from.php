<?php
include("header.php");
?>
<div class="heading">
    <h2>Student's Registation Form</h2>
    <div class="form">
        <form>
            <div class="inputname">
                <ion-icon name="person"></ion-icon>
                <input type="text" placeholder=" First name" class="studname">

                <span>
                    <ion-icon name="person"></ion-icon>
                    <input type="text" placeholder=" Last name" class="studname">
                </span>
            </div>
            <div class="inputname">
                <ion-icon name="mail-unread"></ion-icon>
                <input type="text" placeholder=" Enter your E-Mail" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="call"></ion-icon>
                <input type="number" placeholder=" Enter your Ph.no" class="allname">
            </div>

            <div class="inputname">
                <input type="radio" class="gender-redio" name="gender">
                <label style="margin-right: 2rem;">Male</label>

                <input type="radio" class="gender-redio" name="gender">
                <label>Female</label>
            </div>

            <div class="inputname">
                <ion-icon name="book"></ion-icon>
                <input type="number" placeholder=" Class" class="studname">

                <span>
                    <ion-icon name="bookmarks"></ion-icon>
                    <select class="studname">
                        <option>Select Educatioal Board</option>
                        <option>WBBSE</option>
                        <option>WBCHSE</option>
                        <option>ICSE</option>
                        <option>ISC</option>
                        <option>CBSE</option>
                    </select>
                </span>
            </div>



            <div class="inputname">
                <ion-icon name="accessibility"></ion-icon>
                <input type="number" placeholder=" Enter your age" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="person"></ion-icon>
                <input type="text" placeholder=" Guardian's Name" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="call"></ion-icon>
                <input type="number" placeholder=" Guardian's Ph.No" class="allname">
            </div>

            <div class="inputname">
                <input type="checkbox" id="cb" class="check-button">
                <label for="cb" class="check">I accept the terms and conditions</label>
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