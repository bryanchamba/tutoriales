document.addEventListener('DOMContentLoaded', function () {
    function guardar(e, fmr){
        e.preventDefault();
        const values = {
            'nombre': fmr.elements.nombre.value,
            'civil': fmr.elements.civil.value,
            'genero': fmr.elements.genero.value
        }
        let body = [];
        for (const key in values) {
            if (values.hasOwnProperty(key) && values[key] !== '') {
                body.push(`${key}=${encodeURIComponent(values[key])}`);
            }else{
                M.toast({html: '¡Llene todos los<br>campos obligatorios <span class="red-text">*</span>!', classes: 'rounded'});
                return;
            }
        }
        fetch('data.php', {
            method: 'POST',
            headers: {
                'Accept': 'text/plain',
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: body.join('&')
        })
        .then(res => res.text())
        .then(res => {
            let div = document.getElementById('resultado');
            div.innerHTML = res;
        })
        .catch(error => console.log('Error: ', error)
        );
    }
    const FMR = document.getElementById('fmr');
    FMR.addEventListener('submit', (e) => guardar(e, FMR));
});