document.addEventListener("DOMContentLoaded", function () {
    const inputImagen = document.getElementById("imagen");
    const imagenPreview = document.getElementById("imagenActual");

    if (inputImagen && imagenPreview) {
        inputImagen.addEventListener("change", function (event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagenPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
});

