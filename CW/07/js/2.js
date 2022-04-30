function CountVavels() {
    let str = document.getElementById('input').value;
    str = str.toLowerCase();

    let vavels = str.match(/[aoeui]/g || []);

    let div = document.getElementById('answer');
    div.innerText = vavels.length;
}

