import Dropzone from "dropzone";
import "flowbite";

Dropzone.autoDiscover = false; // para indicarle nosotros mismo a que ruta va a hacer la descarga

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFiles: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,
    init: function () {
        console.log(document.querySelector('[name="image"]').value.trim());
        if (document.querySelector('[name="image"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name =
                document.querySelector('[name="image"]').value;
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );
            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("sending", function (file, xhr, formData) {
    console.log(formData);
});

dropzone.on("success", function (file, response) {
    const inputImagen = document.querySelector('[name="image"]');
    inputImagen.value = response.imagen;
});

dropzone.on("error", function (file, message) {
    console.log(message);
});

dropzone.on("removedfile", function () {
    console.log("Archivo Eliminado");
});
