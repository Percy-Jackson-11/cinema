const biglietto = document.querySelector(".biglietto");
const piantina = document.querySelector(".piantina");
let conta = false;
let conta2 = false;

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

function apri_piantina() {
    if (!conta2) {
        piantina.style.display = "flex";
        conta2 = true;
    }
    else
        chiudi_piantina();

}

function chiudi_piantina() {
    piantina.style.display = "none";
    conta2 = !conta2;
}