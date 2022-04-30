function CountWords() {
    let str = document.getElementById('input').value;
    let strStripped = str.replace(/[,.!]/g, '');
    let words = strStripped.toLowerCase().split(' ');
    let wordCounts = {};
    words.forEach(word => {
        wordCounts[word] = (wordCounts[word] || 0) + 1;
    });
    console.log(wordCounts);

    let div = document.getElementById('answer');

    output = "";
    for (const word in wordCounts) {
        if (Object.hasOwnProperty.call(wordCounts, word)) {
            output += `${word} => ${wordCounts[word]} \n` ;
        }
    }

    div.innerText = output;
}
