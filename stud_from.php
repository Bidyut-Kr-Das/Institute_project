<!DOCTYPE html>
<html>
<head>
    <title>student-master from</title>  

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" type="text/css" href="css/stud_from.css">
   
</head>

<body>
    <div class="heading">
        <h2>Student Registation From</h2>
        <div class="form">
        <form>
            <div class="inputname">
                <ion-icon name="person-circle-outline"></ion-icon>
                <input type ="text" placeholder="First name" class="studname">

                <span>
                    <ion-icon name="person-circle-outline"></ion-icon> 
                    <input type ="text" placeholder="Last name" class="studname">
                </span>
            </div>
            <div class="inputname" >
                <!-- <label>Email</label> -->
                <ion-icon name="mail-outline"></ion-icon>
                <input type ="text" placeholder="Enter your E-Mail" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="call-outline"></ion-icon>
                <input type ="number" placeholder="Enter your Ph.no" class="allname">
            </div>

            <div class="inputname">
                <input type ="radio" class="gender-redio" name="gender">
                <label>Male</label>

                <input type ="radio" class="gender-redio" name="gender">
                <label>Female</label>
            </div>

            <div class="inputname">
                <ion-icon name="book-outline"></ion-icon>
                <input type ="number" placeholder="Class" class="studname">
           
                <span>
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
                <ion-icon name="accessibility-outline"></ion-icon>
                <input type ="number" placeholder="Enter your age" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="person-circle-outline"></ion-icon>
                <input type ="text" placeholder="Guardian's Name" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="call-outline"></ion-icon>
                <input type ="number" placeholder="Guardian's Ph.No" class="allname">
            </div>

            <div class="inputname">
               <input type ="checkbox" class="check-button">
               <label>I accept the terms and conditions</label>
            </div>

            <div class="inputname">
                <input type ="submit" class="button" value="Register">
                
             </div>
             
        </form>
        </div>
    </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>