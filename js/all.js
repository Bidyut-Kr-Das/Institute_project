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
    
    //adding group popup
    $('#addGroup').click(function(){
        window.location.href="group_add.php?addGroup=true";    
    });
    //
    $('input.closeBtn').click(function(){
        window.location.href="group_add.php";
    });
    //To bring popup of editting group---------------
    $('a.editGroupBtn').click(function(){
        var idGrp= $(this).attr('id');
        window.location.href="group_add.php?editGroup="+idGrp;
    });
    $('div.deleteGrpBtn').click(function(){
        var deleteGrpId=$(this).attr('deleteGrpId');
        window.location.href="group_add.php?deleteGroup="+deleteGrpId;
    });
    $('#addSubject').click(function(){
        var groupId=$('groupid.groupIdPassed').attr('groupidgiven');
        window.location.href="subjectAdd.php?addSubject=true";
    });
    // $('.editSubjBtn').click(function(){
    //     var idSubj= $(this).attr('subjectId');//here subjectId is a custom attribute in that button.
    //     window.location.href="subjectAdd.php?editSubject="+idSubj;
    // });
    $('input.closeSubjBtn').click(function(){
        // var groupId=$('groupid.groupIdPassed').attr('groupidgiven');
        window.location.href="subjectAdd.php";
    });
    
    //! This part is for checkbox drop down menu to show checked items in select box
    var subjects= [];
    $('input.subjectCheckbox').change(function(){
        var result="";
        var subjectName=$(this).attr('id');
        console.log(subjectName)
        if($(this).is(':checked')){
            subjects.push(subjectName);
        }
        else{
            var indexOfUncheck=subjects.indexOf(subjectName);
            subjects.splice(indexOfUncheck,1);
        }
        $.each(subjects, function(i,val){
            result += val +", ";
        });
        if(subjects.length==0){
            result="Select Subjects"
        }
        $('div.selectBox').html(result);
    });
    var showing=false;
    $('div.dropDown').hide();
    $('div.selectBox').click(function(){
        if(showing==false){
            $('.fa-chevron-down').css("transform","rotate(180deg)");
            $('div.dropDown').show();
            showing=true;
        }
        else{
            $('.fa-chevron-down').removeAttr('style');
            // $('div.dropDown').removeAttr('style');
            $('div.dropDown').hide();
            
            showing=false;
        
        }
    });

    
});

