console.log(document.title);
console.log(document.URL);

let form = document.getElementById("to_do");
let input_js = document.getElementById("task_input");
let list_js = document.getElementById("task_list");

function form_subbmission(event) {
    event.preventDefault();

    const task_txt = input_js.value.trim();

    if (task_txt !== "") {

        const task_itm = document.createElement("li");

        task_itm.classList.add("task-item");

        task_itm.textContent = task_txt;

        const task_btn = document.createElement("div");

        task_btn.classList.add("task-buttons");

        const complet_btn = document.createElement("button");

        complet_btn.textContent = "Complet";

        complet_btn.classList.add("complete-btn");

        function complet_button() {
            task_itm.classList.toggle("complet");
        }

        complet_btn.addEventListener("click", complet_button);

        const delete_btn = document.createElement("button");

        delete_btn.textContent = "Supprimer";

        delete_btn.classList.add("delete-btn");

        function delete_button() {
            task_itm.remove();
        }

        delete_btn.addEventListener("click", delete_button);

        task_btn.appendChild(complet_btn);

        task_btn.appendChild(delete_btn);

        task_itm.appendChild(task_btn);

        list_js.appendChild(task_itm);

        input_js.value = "";
    }
}

form.addEventListener("submit", form_subbmission);

form.setAttribute("data-form-purpose", "to-do-list");

console.log(form.getAttribute("data-form-purpose"));

form.style.border = "2.5px solid blue";

setTimeout(function () {

    alert("Bienvenue !");

}, 333);

const taskReminder = setInterval(function () {

    alert("N'oubliez pas d'accomplir vos tâches !");

}, 55555);

let header_js = document.getElementById("header_id")

const newHeader = document.createElement("h2");

newHeader.textContent = "To-Do List";

const oldHeader = document.querySelector("h1");

function event_to_do () {

    if (oldHeader) {

        oldHeader.parentNode.replaceChild(newHeader, oldHeader);
    }
}

header_js.addEventListener("click", event_to_do);