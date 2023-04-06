// function addGroup(){
//     window.location.href="group_add.php?addGroup=true";
// }
// function closeAddGroup(){
//     window.location.href="group_add.php";
// }
function controlPopup(id){
    if(id=="addGroup"){
        window.location.href="group_add.php?addGroup=true";
    }
    else if(id=="editGroup"){
        window.location.href="group_add.php?editGroup=true";
    }
    else{
        window.location.href="group_add.php";
    }
}