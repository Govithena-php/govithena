<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/account/index.css">


    <title>Govithena | Account</title>
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

    if (Session::has('update_user_details_alert')) {
        $alert = Session::pop('update_user_details_alert');
        $alert->show_default_alert();
    }

    if (Session::has('change_profile_picture_alert')) {
        $alert = Session::pop('change_profile_picture_alert');
        $alert->show_default_alert();
    }

    if (Session::has('add_new_bank_account_alert')) {
        $alert = Session::pop('add_new_bank_account_alert');
        $alert->show_default_alert();
    }

    if (Session::has('delete_bank_account_alert')) {
        $alert = Session::pop('delete_bank_account_alert');
        $alert->show_default_alert();
    }

    if (Session::has('edit_bank_account_alert')) {
        $alert = Session::pop('edit_bank_account_alert');
        $alert->show_default_alert();
    }
    ?>

    <dialog id="editDetailsModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Personal Details</h2>
                <p>Update your Personal Details.</p>
            </div>
            <form class="[ new__details_form ]" action="<?php echo URLROOT ?>/account/update_user_details" method="post" enctype="multipart/form-data">
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
                    <button type="button" onclick="closeEditDetailsModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
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
            <form class="[ new__profile_picture ]" action="<?php echo URLROOT ?>/account/change_profile_picture" method="post" enctype="multipart/form-data">
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


    <dialog id="newBankAccountModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Add New Bank Account</h2>
                <p>Add your new bank account you wish to withdraw.</p>
            </div>
            <form class="[ new__category_form ]" action="<?php echo URLROOT ?>/account/add_new_bank_account" method="post" enctype="multipart/form-data">
                <div class="[ grid ]" sm="1" lg="2" gap="1">
                    <div class="[ input__control ]">
                        <label for="n-accountNumber">Account Number</label>
                        <input type="text" id="n-accountNumber" name="n-accountNumber" placeholder="Account Number">
                    </div>
                    <div class="[ input__control ]">
                        <label for="n-bank">Bank</label>
                        <select id="n-bank" name="n-bank">
                            <?php
                            foreach (BANK as $key => $value)
                                echo "<option value='$key'>$value</option>";
                            ?>
                        </select>
                    </div>
                    <div class="[ input__control ]">
                        <label for="n-branch">Branch</label>
                        <input type="text" id="n-branch" name="n-branch" placeholder="Branch">
                    </div>
                    <div class="[ input__control ]">
                        <label for="n-branchCode">Branch Code</label>
                        <input type="text" id="n-branchCode" name="n-branchCode" placeholder="Branch Code">
                    </div>
                </div>

                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeNewBankAccountModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submitBtn" name="n-userId" value="<?php echo  $personalDetails['uid'] ?>" class="[ button__primary button__submit ]" data-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </dialog>


    <dialog id="deleteConformationModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="fa fa-circle-xmark" aria-hidden="true"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to Delete this bank account ?</p>
            </div>
            <form id="suspendForm" action="<?php echo URLROOT ?>/account/delete_bank_account" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeDeleteAlert()" data-dismiss="modal">No, Cancel</button>
                <button id="confirmDeleteBtn" name="deleteBankAccount-confirm" type="submit" class="[ button__danger ]">Yes, Delete</button>
            </form>
        </div>
    </dialog>

    <dialog id="editBankAccountModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Edit Bank Account</h2>
                <p>Edit your bank account details.</p>
            </div>
            <form class="[ new__category_form ]" action="<?php echo URLROOT ?>/account/edit_bank_account" method="post" enctype="multipart/form-data">
                <div class="[ grid ]" sm="1" lg="2" gap="1">
                    <div class="[ input__control ]">
                        <label for="u-accountNumber">Account Number</label>
                        <input type="text" id="u-accountNumber" name="u-accountNumber" placeholder="Account Number">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-bank">Bank</label>
                        <select id="u-bank" name="u-bank">
                            <?php
                            foreach (BANK as $key => $value)
                                echo "<option value='$key'>$value</option>";
                            ?>
                        </select>
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-branch">Branch</label>
                        <input type="text" id="u-branch" name="u-branch" placeholder="Branch">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-branchCode">Branch Code</label>
                        <input type="text" id="u-branchCode" name="u-branchCode" placeholder="Branch Code">
                    </div>
                </div>

                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeEditBankAccountModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-oldAccountNumber" name="u-oldAccountNumber" class="[ button__primary button__submit ]" data-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </dialog>

    <?php require_once(COMPONENTS . 'navbar.php'); ?>

    <div class="[ container ][ ]" container-type="section">
        <div class="[ left__right ]">
            <div class="[ left ]">
                <div class="[ details__card ]">
                    <div class="top">
                        <div class="[ caption ]">
                            <h3>Personal Details</h3>
                            <p>View and edit your personal details.</p>
                        </div>
                        <button onclick='openEditDetailsModal()' class="button__primary">Edit Details</button>
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
                        <button onclick="openNewBankAccountModal()" class="button__primary">Add New</button>
                    </div>
                    <div class="[ bottom ]">
                        <div class="[ grid__table ]" style="
                        --xl-cols: 1.25fr 2fr 1fr 1fr 1fr;
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

                                <?php
                                if (!isset($bankAccounts) && empty($bankAccounts)) {
                                ?>
                                    <div class="no__details">
                                        <img src="<?php echo IMAGES ?>/svg/no_data.svg" alt="empty">
                                        <p>No Bank Accounts</p>
                                        <button onclick="openNewBankAccountModal()" class="button__primary">Add New</button>
                                    </div>
                                    <?php
                                } else {
                                    foreach ($bankAccounts as $bankAccount) {
                                    ?>
                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p><?php printValue($bankAccount['accountNumber']) ?></p>
                                            </div>
                                            <div class="[ data ]">
                                                <p><?php

                                                    if (!isset($bankAccount['bank']) || empty($bankAccount['bank'])) {
                                                        echo "Other";
                                                    } else {
                                                        echo BANK[$bankAccount['bank']];
                                                    }

                                                    ?></p>
                                            </div>
                                            <div class="[ data ]">
                                                <p><?php printValue($bankAccount['branch']) ?></p>
                                            </div>
                                            <div class="[ data ]">
                                                <p><?php printValue($bankAccount['branchCode']) ?></p>
                                            </div>

                                            <div class="[ data action__buttons ]">
                                                <!-- <button class="edit_details more"><i class="bi bi-chevron-double-down"></i></button> -->
                                                <button onclick='openEditBankAccountModal(<?php echo json_encode($bankAccount) ?>)' class="edit_details edit"><i class="bi bi-pen"></i></button>
                                                <button onclick="openDeleteAlert('<?php echo $bankAccount['accountNumber'] ?>')" class="edit_details delete"><i class="bi bi-trash"></i></button>
                                            </div>

                                            <div class="[ expand ]">
                                                <div class="[ data ]">
                                                    <p><?php printValue($bankAccount['branch']) ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <p><?php printValue($bankAccount['branchCode']) ?></p>
                                                </div>
                                            </div>

                                        </div>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="[ right ]">
                <div class="[ profile__card stick ]">
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
                            <small> Joined</small>
                            <p class="months__ago"><?php echo $monthSinceJoined ?> Months ago</p>
                        </div>
                        <div class="[ card ]">
                            <small>You have Invested</small>
                            <p class="[ LKR ]"><?php echo number_format($totalInvestment, 2, '.', ',') ?></p>
                        </div>
                        <div class="[ card ]">
                            <small>You have Earned</small>
                            <p class="[ LKR ]"><?php echo number_format($totalInvestment, 2, '.', ',') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require COMPONENTS . "footer.php";
    ?>
    <script src="https://kit.fontawesome.com/b8084a92f1.js" crossorigin="anonymous"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        function openEditDetailsModal() {
            const editDetailsModal = document.getElementById("editDetailsModal")
            editDetailsModal.showModal()
        }

        function closeEditDetailsModal() {
            location.reload()
            const editDetailsModal = document.getElementById("editDetailsModal")
            editDetailsModal.close()
        }

        function openNewBankAccountModal() {
            const newBankAccountModal = document.getElementById("newBankAccountModal")
            newBankAccountModal.showModal()
        }

        function closeNewBankAccountModal() {
            location.reload()
            const newBankAccountModal = document.getElementById("newBankAccountModal")
            newBankAccountModal.close()
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

        function openEditBankAccountModal(data) {
            const editBankAccountModal = document.getElementById("editBankAccountModal")
            document.getElementById("u-accountNumber").value = data.accountNumber
            document.getElementById("u-bank").value = data.bank
            document.getElementById("u-branch").value = data.branch
            document.getElementById("u-branchCode").value = data.branchCode
            document.getElementById("u-oldAccountNumber").value = data.accountNumber
            editBankAccountModal.showModal()
        }

        function closeEditBankAccountModal() {
            location.reload()
            const editBankAccountModal = document.getElementById("editBankAccountModal")
            editBankAccountModal.close()
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