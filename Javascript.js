function changeForm($formName){
    if (document.getElementById($formName).style.opacity == 1){
        removeForm($formName);
    }
    else{
        addForm($formName);
    }
}

function removeForm($formName){
    document.getElementById($formName).style.opacity = 0;
    document.getElementById($formName).style.pointerEvents="none";
    
}
function addForm($formName){
    document.getElementById($formName).style.opacity = 1;
    document.getElementById($formName).style.pointerEvents="all";
}
