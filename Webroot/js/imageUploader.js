const preview = (dropzone, images) => {
    const previewElement = dropzone.querySelector('.text__box_preview');
    previewElement.style.display = 'grid';
    const icon = dropzone.querySelector('.upload__svg');
    icon.style.display = 'none';
    previewElement.innerHTML = "";
    [...images].forEach(image => {
        const reader = new FileReader();
        reader.onload = () => {
            const img = document.createElement('img');
            img.src = reader.result;
            previewElement.appendChild(img);
        }
        reader.readAsDataURL(image);
    })
}



document.querySelectorAll('.text__box_input').forEach(inputElement => {

    const dropZoneElement = inputElement.closest('.text__box');
    const previewElement = dropZoneElement.querySelector('.text__box_preview');

    inputElement.addEventListener('change', e => {
        if (inputElement.files.length) {
            preview(dropZoneElement, inputElement.files);
        }
    })

    dropZoneElement.addEventListener('dragover', e => {
        e.preventDefault();
        dropZoneElement.classList.add('text__box_dragover');
    })

    dropZoneElement.addEventListener('dragleave', e => {
        dropZoneElement.classList.remove('text__box_dragover');
    })

    dropZoneElement.addEventListener('dragend', e => {
        dropZoneElement.classList.remove('text__box_dragover');
    })

    dropZoneElement.addEventListener('drop', e => {
        e.preventDefault();
        // console.log(e.dataTransfer.files);
        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            preview(dropZoneElement, inputElement.files);
            dropZoneElement.classList.remove('text__box_dragover');

        }

        console.log(inputElement.files);
    })

})