// let event = document.getElementById('input').addEventListener()

let input_user = document.createElement("input");
input_user.id = "input";
document.body.appendChild(input_user);

let p = document.createElement("p");
p.id = "answer";
document.body.appendChild(p);

const input = document.getElementById('input');
const log = document.getElementById('answer');

input.addEventListener('input', _reverse);

function _reverse(e) {
    str = e.target.value;
    str = str.split("").reverse().join("");
    log.textContent = str;
}

