const startElement = document.getElementById("start")
startElement.addEventListener("keyup", (event)=> {
    event.preventDefault();
    clearZero(startElement);
    addZero(startElement);
});
startElement.addEventListener("change", (event)=> {
    clearZero(startElement);
    addZero(startElement);
});
startElement.addEventListener("keypress", (event)=> {
    if(startElement.value.length >= 6 && !issetZero(startElement)){
        event.preventDefault();
    }
});

const endElement = document.getElementById("end");
endElement.addEventListener("change", (event)=> {
    clearZero(startElement);
    addZero(startElement);
});

endElement.addEventListener("keyup", (event)=> {
    event.preventDefault();
    clearZero(endElement);
    addZero(endElement);
});
endElement.addEventListener("keypress", (event)=> {
    if(endElement.value.length >= 6 && !issetZero(endElement)){
        event.preventDefault();
    }
});
function issetZero(elem){
    if(elem.value.charAt(0) == '0'){
        return true;
    }
    return false;
}

function clearZero(elem){
    for (var i = 0; i < elem.value.length; i++) {
        if(elem.value.charAt(i) == '0'){
            elem.value = elem.value.slice(1);
        }else{
            break;
        }
    }
}
function addZero(elem){
    while (elem.value.length < 6){
        elem.value = '0'+elem.value;
    }
}