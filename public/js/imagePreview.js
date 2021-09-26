const previewImg = () => {
    const image = document.querySelector(".img-input");
    const imgPreview = document.querySelector(".img-preview");
    const imgContainer = document.querySelector(".img-container");

    imgContainer.style.display = "block";
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
};
