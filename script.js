function visualizzaForm() {
    document.getElementById("formBiglietti").style.display = "block";
    generaCodiciFiscali();
}

function nascondiForm() {
    document.getElementById("formBiglietti").style.display = "none";
    document.getElementById("numBiglietti").value = 1;
}

function generaCodiciFiscali() {
    let biglietti = document.getElementById("numBiglietti").value;
    let div = document.getElementById("inserisciCodiceFiscale");
    div.innerHTML = "";
    for (let i = 1; i <= biglietti; i++) {
        let labelCF = document.createElement("label");
        labelCF.setAttribute("type", "text");
        labelCF.setAttribute("for", "cf" + i);
        labelCF.innerHTML = "Inserire codice fiscale: ";
        let codiceFiscale = document.createElement("input");
        codiceFiscale.setAttribute("type", "text");
        codiceFiscale.setAttribute("name", "cf" + i);
        codiceFiscale.setAttribute("maxlength", "16");
        div.appendChild(labelCF);
        div.appendChild(codiceFiscale);
        div.appendChild(document.createElement("br"));
    }
}

function aumentaBiglietti() {
    if (document.getElementById("numBiglietti").value != "4") {
        document.getElementById("numBiglietti").value = parseInt(document.getElementById("numBiglietti").value) + 1;
        generaCodiciFiscali();
    } else {
        alert("Hai raggiunto il numero massimo di biglietti consentiti!");
    }
}

function diminuisciBiglietti() {
    if (document.getElementById("numBiglietti").value != "1") {
        document.getElementById("numBiglietti").value -= 1;
        generaCodiciFiscali();
    } else {
        alert("Non puoi sottrarre più biglietti!");
    }
}