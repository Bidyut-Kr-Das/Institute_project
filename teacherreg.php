<!DOCTYPE html>
<html>
<head>
    <title>Teacher-master form</title>  

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" type="text/css" href="css/stud_from.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
   
</head>

<body>
    <div class="heading">
        <h2>Teacher's Registation Form</h2>
        <div class="form">
        <form>
            <div class="inputname">
                <ion-icon name="person"></ion-icon>
                <input type ="text" placeholder=" First name" class="studname">

                <span>
                    <ion-icon name="person"></ion-icon>
                    <input type ="text" placeholder=" Last name" class="studname">
                </span>
            </div>
            <div class="inputname" >
                <ion-icon name="mail-unread"></ion-icon>
                <input type ="text" placeholder=" Enter your E-Mail" class="allname">
            </div>

            <div class="inputname">
                <ion-icon name="call"></ion-icon>
                <input type ="number" placeholder=" Enter your Ph.no" class="allname">
            </div>

            <div class="inputname">
                <input type ="radio" class="gender-redio" name="gender">
                <label style="margin-right: 2rem;" >Male</label>

                <input type ="radio" class="gender-redio" name="gender">
                <label>Female</label>
            </div>

            <div class="inputname">
                <ion-icon name="book"></ion-icon> 
                <input type ="number" placeholder=" Higher Qualification" class="studname">
           
                <span>
                    
                <ion-icon name="bookmarks"></ion-icon>
                <select class="studname">
                    <option> GROUPS</option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                  </select>
                 </span>
            </div>
            


            <div class="inputname">
                <ion-icon name="accessibility"></ion-icon>
                <input type ="number" placeholder=" Enter your age" class="allname">
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
               <input type ="checkbox" id="cb" class="check-button">
               <label for="cb" class="check">I accept the terms and conditions</label>
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