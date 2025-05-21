console.log(document.title);
console.log(document.URL);

let parag_js = document.getElementById("parag_id");

let div_js = document.getElementById("div_id");

parag_js.textContent = "Modifions le contenu de « Cette page est le premier exercice du 6ème travail pratique »";
parag_js.style.backgroundColor = "lightblue";
parag_js.style.textAlign = "center";

div_js.style.border = "2.5px solid black";
div_js.style.padding = "25px";
div_js.style.cursor = "pointer";

function event_listen () {

    parag_js.textContent = "Un clic a été détecté";
}

div_js.addEventListener("click", event_listen);