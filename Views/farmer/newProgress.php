<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/newProgress.css">

    <title>Dashboard | Farmer</title>
</head>


<body>

    <?php
    $active = "progress";
    $title = "New Progress";
    require_once("navigator.php");
    ?>



    <div class="container" container-type="dashboard-section">

        <div class="[ caption ]">
            <h3>Keep us updated on your farming progress.</h3>
            <p>From seed to harvest, let us know how it grows: Update your farming progress below.</p>
        </div>

        <div class="[ form__wrapper ]">
            <form method="POST" enctype="multipart/form-data">
                <div class="[ form__control ]">
                    <label>Subject</label>
                    <input type="text" name="subject">
                </div>
                <div class="[ form__control ]">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="[ form__control image__uploader ]">
                    <div class="[ title ]">
                        <p>Upload Images <span>*</span></p>
                    </div>

                    <div class="[ text__box ]">
                        <div class="[ text__box_preview ]"></div>
                        <img class="[ upload__svg ]" src="<?php echo IMAGES ?>svg/upload.svg" />
                        <p>Darg and drop your images here<br>or</p>
                        <label class="[ browse__btn ]" for="image-uploader">Browse</label>
                        <input id="image-uploader" class="text__box_input" type="file" name="images[]" multiple>
                    </div>
                </div>
                <div class="[ form__control submit__button ]">
                    <button type="submit" name="progress-save">Save</button>
                </div>
            </form>
        </div>

    </div>
    <?php
    require_once("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
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
    </script>
</body>

</html>