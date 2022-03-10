let inputs = document.querySelectorAll("input");

function addtoTable() {
    const tr = document.createElement('tr')

    const fname = inputs[0].value;
    if (!fname) {
        alert('first name is empty');
        return;
    }
    if (fname.length < 3) {
        alert('first name should be more than 2 chars');
        return;
    }
    const lname = inputs[1].value;
    if (!lname) {
        alert('last name is empty');
        return;
    }
    if (lname.length < 3) {
        alert('last name should be more than 2 chars');
        return;
    }
    const phone = inputs[2].value;
    if (!phone) {
        alert('phone is empty');
        return;
    }
    // var re = new RegExp("^(?:0||\+98)9\d{9}$");
    if (!phone.match(/^(?:0||\+98)9\d{9}$/)) {
        alert('Phone is not valid!')
        return;
    }

    for (let i = 0; i < 3; i++) {
        const td = document.createElement('td');
        td.innerHTML = inputs[i].value;
        // inputs[i].value = "";
        tr.appendChild(td);
    }

    const table = document.getElementById('table');
    table.appendChild(tr);
}


