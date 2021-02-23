import {InputPreviewImage} from "@main/components/InputPreviewImage"

document.addEventListener("DOMContentLoaded", function () {
    const inputsImagesNode = document.querySelectorAll(".js-images-block");

    inputsImagesNode.forEach(node => {
        if (node) {
            new InputPreviewImage(node);
        }
    })
});
