function verifierFormulaire() {
    let nombre1 = document.getElementById("nombre1").value;
    let nombre2 = document.getElementById("nombre2").value;

    if (nombre1 === "" || nombre2 === "") {
        alert("Veuillez remplir les deux champs.");
        return false;
    }

    return true;
}
