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
$(document).ready(function(){
    $('#addGroup').click(function(){
        window.location.href="group_add.php?addGroup=true";    
    });
    $('input.closeBtn').click(function(){
        window.location.href="group_add.php";
    });
    $('.btn').click(function(){
        var id= $(this).attr('id');
        window.location.href="group_add.php?editGroup="+id;
    });



});