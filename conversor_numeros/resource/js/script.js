const inputRomanos = document.querySelector("#romanos");
const num = document.querySelector('#indo');

if (num.textContent >= 10000) {
    num.classList.add('overline');
}

inputRomanos.addEventListener("keypress", (e) => {
    const keyCode =  (e.keyCode ? e.keyCode : e.wich);
    console.log(keyCode);
    // números = 47 ao 58
    if (keyCode > 47 && keyCode < 58) {
        e.preventDefault();
    }
});