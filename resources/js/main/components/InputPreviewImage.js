export class InputPreviewImage {
    constructor(node) {
        this.inputImageNode = node;
        this.input = this.inputImageNode.querySelector("input");
        this.close = this.inputImageNode.querySelector(".close");
        this.clone = this.inputImageNode.cloneNode(true);
 
        this.setListeners();
    }

    setListeners() {
        this.input.addEventListener("change", el => {
            if (el.target.files) {
                [].forEach.call(el.target.files, (file) => {
                    console.log(file);
                    this.setImage(file);
                })
            }
        })

        this.close.addEventListener("click", e => {
            e.preventDefault();
            this.imageRemove();
            this.input.value = "";
        })
    }

    setImage(file) {
        this.imageRemove();
        if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
            let reader = new FileReader();
            reader.addEventListener("load", (e) => {
                let image = new Image();
                image.title = file.name;
                image.height = 200;
                image.src = e.currentTarget.result;
                this.inputImageNode.appendChild(image);

                this.addNewInput();
            });

            reader.readAsDataURL(file);
        }
    }

    imageRemove() {
        let image = this.inputImageNode.querySelector("img");
        if (image) {
            image.remove();
        }
    }

    addNewInput() {
        this.inputImageNode.parentNode.insertBefore(this.clone, this.inputImageNode.nextSibling);
        new InputPreviewImage(this.clone);
    }
}
