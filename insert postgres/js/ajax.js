function guardar(fmr, e){
    e.preventDefault();
    let nombre = fmr.elements.nombre.value;
    let civil = fmr.elements.civil.value;
    let genero = fmr.elements.genero.value;
    fetch('data.php', {
        method: 'POST',
        headers: {
            'Accept': 'text/plain',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `nombre=${encodeURIComponent(nombre)}&civil=${encodeURIComponent(civil)}&genero=${encodeURIComponent(genero)}`
    })
    .then(res => res.text())
    .then(res => {
        console.log(res);
        let div = document.getElementById('resultado');
        div.innerHTML = res;
    })
    .catch(error => console.log('Error: ', error)
    );
}