var BT = document.getElementById('bo');
var BC = document.getElementsByClassName('bc');
var BR = document.getElementsByClassName('br');
var FC = document.getElementById('formcomment');
var FR = document.getElementsByClassName('formreply');
var FRR = document.getElementsByClassName('formreplyreply');
var FRRA = document.getElementsByClassName('formreplyreplyannuleer');
var FRA = document.getElementsByClassName('formreplyannuleer');
var FCA = document.getElementById('formcommentannuleer');

if (BT) {
BT.addEventListener("click", function() {
    console.log(BT);
    FC.style.display = "block";
});}

if (BC) {
for (i = 0; i < BC.length; i++) {
    BC[i].addEventListener("click", function() {
        FR[this.dataset.klik].style.display = "block";
    });
}}

if (BR) {
for (i = 0; i < BR.length; i++) {
    BR[i].addEventListener("click", function() {
        console.log(BR[i]);
        FRR[this.dataset.klik].style.display = "block";
    });
}}

if (FCA) {
FCA.addEventListener("click", function() {
    FC.style.display = "none";
});}


if (FRA) {
for (i = 0; i < FRA.length; i++) {
    FRA[i].addEventListener("click", function() {
        for (j = 0; j < FRRA.length; j++) {
            FR[j].style.display = "none";
        }
    });
}}

if (FRRA) {
for (i = 0; i < FRRA.length; i++) {
    FRRA[i].addEventListener("click", function() {
        for (j = 0; j < FRRA.length; j++) {
            FRR[j].style.display = "none";
        }
    });
}}

