document.getElementById("campo").addEventListener("keyup", getCodigos)

function getCodigos() {
    let inputCP = document.getElementById("campo").value
    let lista = document.getElementById("lista")

    if (inputCP.length > 0) {
        let url = "../php/includes/getCodigos.php"
        let formData = new FormData()
        formData.append("campo", inputCP)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors"
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
        limpiarCampos();
    }
}

function mostrar(nombreEmpleado) {
    lista.style.display = 'none';
    document.getElementById('campo').value = nombreEmpleado;

    cargarInformacion(nombreEmpleado);
}

function cargarInformacion(nombreEmpleado) {
    $.ajax({
        url: '../php/includes/get_datos.php',
        method: 'POST',
        data: { nombreEmpleado: nombreEmpleado },
        success: function(response) {
            console.log(response);
            var sugerencias = JSON.parse(response);
            $('#claveArea').val(sugerencias.area);
            $('#junta').val(sugerencias.junta);
        }
    });
}

function limpiarCampos() {
    $('#claveArea').val('');
    $('#junta').val('');
}
