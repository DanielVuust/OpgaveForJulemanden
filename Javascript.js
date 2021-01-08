function changeForm($formName){
    if (document.getElementById($formName).style.opacity == 1){
        removeForms();
    }
    else{
        addForm($formName);
    }
}

function removeForms(){
    for (var i = 0; i < 3; i++){
    document.getElementsByClassName('form')[i].style.opacity = 0;
    document.getElementsByClassName('form')[i].style.pointerEvents="none";
    }
    
}
function addForm($formName){
    removeForms();
    document.getElementById($formName).style.opacity = 1;
    document.getElementById($formName).style.pointerEvents="all";
}
