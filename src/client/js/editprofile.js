function editProfile() {
    var fields = document.getElementsByClassName("accMod");
    fields.forEach(fld => {
        fld.disabled = false;
    });
    var hidden = document.getElementsByClassName("hide");
    hidden.forEach(hide => {
        hide.style.display = "block";
    });
    document.getElementById("saveProfile").style.display = "block";
    document.getElementById("editProfile").style.display = "none";
}