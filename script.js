
const img = ["img/cat.png", "img/chicken.png", "img/dog.png", "img/fox.png", "img/gorilla.png", "img/koala.png", "img/meerkat.png", "img/panda.png", "img/polar-bear.png", "img/puffer-fish.png", "img/rabbit.png", "img/shark.png", "img/walrus.png"];
var numero_casuale = Math.floor(Math.random() * 12);
console.log(numero_casuale);

document.querySelector(".cerchio").style.backgroundImage = `url(${img[numero_casuale]})`;

var strega = document.querySelector(".strega");

var position = -5;




