const biglietto = document.querySelector(".biglietto");
let conta = false;

function apri_biglietto() {
    if (!conta) {
        biglietto.style.display = "flex";
        conta = true;
    }
    else
        chiudi_biglietto();

}

function chiudi_biglietto() {
    biglietto.style.display = "none";
    conta = !conta;


}