// function addGroup(){
//     window.location.href="group_add.php?addGroup=true";
// }
// function closeAddGroup(){
//     window.location.href="group_add.php";
// }
// function controlPopup(id){
//     if(id=="addGroup"){
//         window.location.href="group_add.php?addGroup=true";
//     }
//     else if(id=="editGroup"){
//         window.location.href="group_add.php?editGroup=true";
//     }
//     else{
//         window.location.href="group_add.php";
//     }
// }
$(document).ready(function () {

    //adding group popup
    $('#addGroup').click(function () {
        window.location.href = "group_add.php?addGroup=true";
    });
    //
    $('input.closeBtn').click(function () {
        window.location.href = "group_add.php";
    });
    $('input.closeBtnDeleteModal').click(function () {
        window.location.href = "group_add.php";
    });
    //To bring popup of editting group---------------
    $('a.editGroupBtn').click(function () {
        var idGrp = $(this).attr('id');
        window.location.href = "group_add.php?editGroup=" + idGrp;
    });
    $('div.deleteGrpBtn').click(function () {
        var deleteGrpId = $(this).attr('deleteGrpId');
        window.location.href = "group_add.php?deleteGroup=" + deleteGrpId;
    });
    $('#addSubject').click(function () {
        // var groupId=$('groupid.groupIdPassed').attr('groupidgiven');
        window.location.href = "subjectAdd.php?addSubject=true";
    });
    $('#addClass').click(function () {
        // var groupId=$('groupid.groupIdPassed').attr('groupidgiven');
        window.location.href = "classAdd.php?addClass=true";
    });
    // $('.editSubjBtn').click(function(){
    //     var idSubj= $(this).attr('subjectId');//here subjectId is a custom attribute in that button.
    //     window.location.href="subjectAdd.php?editSubject="+idSubj;
    // });
    $('input.closeSubjBtn').click(function () {
        // var groupId=$('groupid.groupIdPassed').attr('groupidgiven');
        window.location.href = "subjectAdd.php";
    });
    $('input.closeClsBtn').click(function () {
        // var groupId=$('groupid.groupIdPassed').attr('groupidgiven');
        window.location.href = "classAdd.php";
    });

    //! This part is for checkbox drop down menu to show checked items in select box
    var subjects = [];
    $('input.subjectCheckbox').change(function () {
        var result = "";
        var subjectName = $(this).attr('id');
        console.log(subjectName)
        if ($(this).is(':checked')) {
            subjects.push(subjectName);
        }
        else {//*this part deletes the unchecked value from the select box
            var indexOfUncheck = subjects.indexOf(subjectName);
            subjects.splice(indexOfUncheck, 1);
        }

        $.each(subjects, function (i, val) {
            result += val + ", ";

        });

        if (subjects.length == 0) {
            result = "Select Subjects  ";
        }
        result = result.substring(0, (result.length - 2));
        $('div.selectBox').html(result);
    });
    var newres = "";
    $('input.subjectCheckbox').each(function () {
        if (this.checked) {
            var subj = $(this).attr('id')
            subjects.push(subj);
        }
    })


    var showing = false;
    $('div.dropDown').hide();
    $('div.selectBox').click(function () {
        if (showing == false) {
            $('.fa-chevron-down').css("transform", "rotate(180deg)");
            $('div.dropDown').show();
            showing = true;
        }
        else {
            $('.fa-chevron-down').removeAttr('style');
            // $('div.dropDown').removeAttr('style');
            $('div.dropDown').hide();

            showing = false;

        }
    });
    // let hamMenuIcon = document.getElementById("ham-menu");
    // let navBar = document.getElementById("nav-bar");
    // let navLinks = navBar.querySelectorAll("li");
    // hamMenuIcon.addEventListener("click", () => {
    //     navBar.classList.toggle("active");
    //     hamMenuIcon.classList.toggle("fa-times");
    // });
    // navLinks.forEach((navLinks) => {
    //     navLinks.addEventListener("click", () => {
    //         navBar.classList.remove("active");
    //         hamMenuIcon.classList.toggle("fa-times");
    //     });
    // });
    //todo--It will show group.
    $('div.drop--down--k').hide();
    
    let showingGroup=false;
    
    $('div.openGroup--k').click(function(){
        if(showingGroup==false){
            $('div.drop--down--k').show();
            showingGroup=true;
        }
        else{
            $('div.drop--down--k').hide();
            showingGroup=false;
        }
    });
    //todo--It opens subject dropdown
    let showingSubj=false;
    $('div.drop--downSubj--k').hide();
    $('div.openSubj--k').click(function(){
        if(!showingSubj){
            $('div.drop--downSubj--k').show();
            showingSubj=true;
        }
        else{
            $('div.drop--downSubj--k').hide();
            showingSubj=false;
        }
    });
    //todo--IT opens class dropdown

    let showingClass=false;
    $('div.drop--downClass--k').hide();
    $('div.openClass--k').click(function(){
        if(!showingClass){
            $('div.drop--downClass--k').show();
            showingClass=true;
        }
        else{
            $('div.drop--downClass--k').hide();
            showingClass=false;
        }
    });
    var count=1;
    //todo-- add row on teacher page on clicking the button
    $('#addRow').click(function(){
        var v=$('#selectionSection').clone().appendTo('#cloningSpace');
        $(v).removeClass('d-none');
    });
    // $('i.fa-square-minus').click(function(){
    //     $(this).parent().remove();
    // });
    

    //!--------------not working------------------------------------------- i dont know why
    // var element=$('<div class="abc"><i class="fa-regular fa-square-minus"></i></div>');
    // element.click(function(){
    //     console.log("hello");
    // });
    // $('div.abc').click(function(){
    //     console.log("hello");
    //     $(this).parent().remove();
    // });
    // $('.studname').click(function(){
    //     var ind=$(this).index();
    //     console.log(ind);
    // })
    

});
function del(v){
    $(v).parent().remove();
}

