<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/investor/myaccount.css">


    <title>Account | Investor</title>
    <!-- <style>
        *{
            outline: 1px solid limegreen;
        }
    </style> -->
</head>

<body>

    <?php

    function printValue($value)
    {
        if (isset($value)) echo $value;
        else echo "-";
    }



    $active = "myaccount";
    $title = "My Account";
    require_once("navigator.php");
    ?>

    <dialog id="editDetailsModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Personal Details</h2>
                <p>Update your Personal Details.</p>
            </div>
            <form class="[ new__details_form ]" action="<?php echo URLROOT ?>/dashboard/update_user_details" method="post" enctype="multipart/form-data">
                <div class="[ grid ]" sm="1" lg="2" gap="1">
                    <div class="[ input__control ]">
                        <label for="u-firstName">First Name</label>
                        <input type="text" id="u-firstName" name="u-firstName" value="<?php printValue($personalDetails['firstName']) ?>" placeholder="First Name">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-lastName">Last Name</label>
                        <input type="text" id="u-lastName" name="u-lastName" value="<?php printValue($personalDetails['lastName']) ?>" placeholder="Last Name">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-addressLine1">Address Line 1</label>
                        <input type="text" id="u-addressLine1" name="u-addressLine1" value="<?php printValue($personalDetails['addressLine1']) ?>" placeholder="Address Line 1">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-addressLine2">Address Line 2</label>
                        <input type="text" id="u-addressLine2" name="u-addressLine2" value="<?php printValue($personalDetails['addressLine2']) ?>" placeholder="Address Line 2">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-postalCode">Postal Code</label>
                        <input type="text" id="u-postalCode" name="u-postalCode" value="<?php printValue($personalDetails['postalCode']) ?>" placeholder="Postal Code">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-phone">Phone Number</label>
                        <input type="text" id="u-phone" name="u-phone" value="<?php printValue($personalDetails['phoneNumber']) ?>" placeholder="NIC">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-city">City</label>
                        <input type="text" id="u-city" name="u-city" value="<?php printValue($personalDetails['city']) ?>" placeholder="City">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-district">District</label>
                        <input type="text" id="u-district" name="u-district" value="<?php printValue($personalDetails['district']) ?>" placeholder="District">
                    </div>
                </div>

                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeEditCategoryModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-submitBtn" name="u-submitBtn" value="<?php echo $personalDetails['uid'] ?>" class="[ button__primary button__submit ]" data-dismiss="modal">Update</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="editProfilePictureModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Change Profile Picture</h2>
            </div>
            <form class="[ new__profile_picture ]" action="<?php echo URLROOT ?>/dashboard/change_profile_picture" method="post" enctype="multipart/form-data">
                <div class="[ image__uploader ]">
                    <div class="previewer">
                        <div class="preview__image">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                    <div class="[ title ]">
                        <p id="u-image_message">Select a picture</p>
                    </div>

                    <div class="[ text__box ]">
                        <div class="[ text__box_preview ]">
                        </div>
                        <img class="[ upload__svg ]" src="<?php echo IMAGES ?>svg/upload.svg" />
                        <p>Darg and drop your image here<br>or</p>
                        <label class="[ browse__btn ]" for="u-image-uploader">Browse</label>
                        <input id="u-image-uploader" class="text__box_input" type="file" name="u-profilePicture">
                    </div>
                </div>
                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeEditProfilePictureModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-submitBtn" name="u-submitBtn" value="<?php echo $personalDetails['uid'] ?>" class="[ button__primary button__submit ]" data-dismiss="modal">Update</button>
                </div>
            </form>
        </div>
    </dialog>


    <!-- <dialog id="editCategoryModal" class="[ categoryModal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Update category</h2>
                <p>Edit a category.</p>
            </div>
            <form class="[ new__category_form ]" action="<?php echo URLROOT ?>/admin/update_category" method="post" enctype="multipart/form-data">
                <div class="[ grid ]" sm="1" lg="3" gap="1">
                    <div class="[ input__control ]">
                        <label for="category">Category Name</label>
                        <input type="text" id="u-category" name="u-name" placeholder="Category Name">
                    </div>
                    <div class="[ input__control ]">
                        <label for="slug">Slug</label>
                        <input type="text" id="u-slug" name="u-slug" placeholder="Slug">
                    </div>
                    <div class="[ input__control ]">
                        <label for="mainCategory">Main Category</label>
                        <select id="u-mainCategory" name="u-type">
                            <option value="VEGETABLE">Vegetables</option>
                            <option value="FRUIT">Fruits</option>
                            <option value="GRAINS">Grains</option>
                            <option value="SPICES">Spices</option>
                            <option value="OTHER">Other</option>
                        </select>
                    </div>
                </div>
                <div class="[ input__control image__uploader ]">
                    <div class="[ title ]">
                        <p id="u-image_message">Category Thumbnail</p>
                    </div>

                    <div class="[ text__box ]">
                        <div class="[ text__box_preview text__box_preview--update  ]">
                        </div>
                        <img class="[ upload__svg ]" src="<?php echo IMAGES ?>svg/upload.svg" />
                        <p>Darg and drop your image here<br>or</p>
                        <label class="[ browse__btn ]" for="u-image-uploader">Browse</label>
                        <input id="u-image-uploader" class="text__box_input" type="file" name="u-thumbnail">
                    </div>
                </div>
                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeEditCategoryModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-submitBtn" name="u-submitBtn" class="[ button__primary button__submit ]" data-dismiss="modal">Update</button>
                </div>
            </form>
        </div>
    </dialog> -->

    <div class="[ container ][ ]" container-type="dashboard-section">
        <div class="[ left__right ]">
            <div class="[ left ]">
                <div class="[ details__card ]">
                    <div class="top">
                        <div class="[ caption ]">
                            <h3>Personal Details</h3>
                            <p>View and edit your personal details.</p>
                        </div>
                        <button onclick='openEditCategoryModal()' class="button__primary edit_details">Edit Details</button>
                    </div>
                    <div class="[ bottom ]">
                        <div class="[ de__row ]">
                            <div class="[ field ]">
                                <small>First Name</small>
                                <p><?php printValue($personalDetails['firstName']) ?></p>
                            </div>
                            <div class="[ field ]">
                                <small>Last Name</small>
                                <p><?php printValue($personalDetails['lastName']) ?></p>
                            </div>
                        </div>
                        <div class="[ de__row de__row-3 ]">
                            <div class="[ field ]">
                                <small>Email</small>
                                <p style="text-transform:lowercase;"><?php printValue($personalDetails['email']) ?></p>
                            </div>
                            <div class="[ field ]">
                                <small>Phone Number</small>
                                <p><?php printValue($personalDetails['phoneNumber']) ?></p>
                            </div>
                            <div class="[ field ]">
                                <small>NIC</small>
                                <p><?php printValue($personalDetails['NIC']) ?></p>
                            </div>
                        </div>
                        <div class="[ de__row ]">
                            <div class="[ field ]">
                                <small>Address</small>
                                <p><?php printValue($personalDetails['addressLine1']) ?>,</p>
                                <p><?php printValue($personalDetails['addressLine2']) ?>.</p>
                                <p><?php printValue($personalDetails['postalCode']) ?></p>
                            </div>
                        </div>
                        <div class="[ de__row ]">
                            <div class="[ field ]">
                                <small>City</small>
                                <p><?php printValue($personalDetails['city']) ?></p>
                            </div>
                            <div class="[ field ]">
                                <small>District</small>
                                <p><?php printValue($personalDetails['district']) ?></p>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="[ details__card ]">
                    <div class="top">
                        <div class="[ caption ]">
                            <h3>Bank Account Details</h3>
                            <p>View and edit your Bank Account Details.</p>
                        </div>
                        <button class="button__primary edit_details">Add New</button>
                    </div>
                    <div class="[ bottom ]">
                        <div class="[ grid__table ]" style="
                        --xl-cols: 1fr 1fr 1fr 1fr 2fr;
                        --lg-cols: 1fr 1fr 1fr 1fr;
                        --md-cols: 1fr 1fr 1fr 1fr;
                        --sm-cols: 1fr 1fr 1fr 1fr;
                        ">
                            <div class="[ head ]">
                                <div class="[ row ]">
                                    <div class="[ data ]">
                                        <p>Account Number</p>
                                    </div>
                                    <div class="[ data ]">
                                        <p>Bank</p>
                                    </div>
                                    <div class="[ data ]">
                                        <p>Branch</p>
                                    </div>
                                    <div class="[ data ]">
                                        <p>Branch Code</p>
                                    </div>
                                    <div class="[ data ]">
                                        <p>Actions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="[ body ]">
                                <div class="[ row ]">
                                    <div class="[ data ]">
                                        <p>123456789</p>
                                    </div>
                                    <div class="[ data ]">
                                        <p>Commercial Bank</p>
                                    </div>
                                    <div class="[ data ]">
                                        <p>Matara</p>
                                    </div>
                                    <div class="[ data ]">
                                        <p>1234</p>
                                    </div>

                                    <div class="[ data ]">
                                        <button class="button__primary edit_details">expnad</button>
                                        <button class="button__primary edit_details">Edit</button>
                                        <button class="button__primary edit_details">Delete</button>
                                    </div>

                                    <div class="[ expand ]">
                                        <div class="[ data ]">
                                            <p>Matara</p>
                                        </div>
                                        <div class="[ data ]">
                                            <p>1234</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="[ right ]">
                <div class="[ profile__card ]">
                    <div class="[ top ]">
                        <div class="[ profile__image ]">
                            <?php

                            if ($personalDetails['image'] == null) {
                                $personalDetails['image'] = "default.png";
                            }

                            ?>
                            <img src="<?php echo UPLOADS . 'profilePictures/' . $personalDetails['image'] ?>" alt="profile">
                        </div>
                        <button onclick="openEditProfilePictureModal()" class="button__primary edit_photo">Change Picture</button>
                        <p class="profile__name"><?php printValue($personalDetails['firstName']) ?> <?php printValue($personalDetails['lastName']) ?></p>
                        <p class="profile__actor"><?php printValue($personalDetails['userType']) ?></p>
                    </div>
                    <div class="[ bottom ]">
                        <div class="[ card ]">
                            <small>You have Invested :</small>
                            <p class="[ LKR ]">12345600</p>
                        </div>
                        <div class="[ card ]">
                            <small>You have Earned :</small>
                            <p class="[ LKR ]">12345600</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        function openEditCategoryModal() {
            const editDetailsModal = document.getElementById("editDetailsModal")
            editDetailsModal.showModal()
        }

        function closeEditCategoryModal() {
            location.reload()
            const editDetailsModal = document.getElementById("editDetailsModal")
            editDetailsModal.close()
        }

        function openEditProfilePictureModal() {
            const editProfilePictureModal = document.getElementById("editProfilePictureModal")
            editProfilePictureModal.showModal()
        }

        function closeEditProfilePictureModal() {
            location.reload()
            const editProfilePictureModal = document.getElementById("editProfilePictureModal")
            editProfilePictureModal.close()
        }

        function openDeleteAlert(id) {
            const deleteConformationModal = document.getElementById("deleteConformationModal")
            const confirmDeleteBtn = document.getElementById("confirmDeleteBtn")
            confirmDeleteBtn.value = id
            deleteConformationModal.showModal()
        }

        function closeDeleteAlert() {
            const deleteConformationModal = document.getElementById("deleteConformationModal")
            deleteConformationModal.close()
        }
    </script>

    <script>
        const preview = (dropzone, images) => {
            const previewElement = document.querySelector('.preview__image');
            previewElement.style.display = 'grid';
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
            const previewElement = document.querySelector('.preview__image');

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