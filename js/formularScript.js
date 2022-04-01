
let formularObj = {
    geometrischeForm: "rechteck",
    einheit: "bitteWaehlen"
};

new Vue({
    el: '#formular',
    data: formularObj
});

function valdidateCheckboxes(){
    let umfangCheckbox = document.getElementById("berechneUmfang").checked;
    let flaecheCheckbox = document.getElementById("berechneFlaeche").checked;
    
    if(!(umfangCheckbox || flaecheCheckbox)){
        fehlerAnzeigen();
        return false;
    } else {
        return true;
    }
}

function fehlerAnzeigen(){
    document.getElementById("fehlermeldung").classList.remove("w3-hide");
}