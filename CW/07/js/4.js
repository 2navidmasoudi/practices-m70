let inputs = document.querySelectorAll("input");

function addtoTable() {
    const tr = document.createElement('tr')

    for (let i = 0; i < 3; i++) {
        const td = document.createElement('td');
        td.innerHTML = inputs[i].value;
        tr.appendChild(td);
    }

    const table = document.getElementById('table');
    table.appendChild(tr);
}


