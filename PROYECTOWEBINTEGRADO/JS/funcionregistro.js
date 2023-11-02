document.addEventListener('DOMContentLoaded', function () {
    const link = document.querySelector('.olvidepw');
    const popup = document.querySelector('.popup');
    const closeBtn = document.querySelector('.close-popup');

    link.addEventListener('click', function (e) {
        e.preventDefault();
        popup.style.display = 'block';
    });

    closeBtn.addEventListener('click', function () {
        popup.style.display = 'none';
    });
});

$(document).ready(function() {
$('#buscar').click(function() {
const dni = $('#dni').val();

$.ajax({
    url: 'consultadni.php', // Ruta a tu script PHP que conecta con la API
    type: 'post',
    data: { dni: dni }, // Enviar el DNI al servidor
    dataType: 'json',
    success: function(response) {
        if (response.error) {
            alert('Error: ' + response.error);
        } else {
            // Llenar los campos de nombre y apellido con la respuesta de la API
            $('#nombre').val(response.nombres);
            $('#apellido').val(response.apellidoPaterno + ' ' + response.apellidoMaterno);
        }
    }
});
});
});