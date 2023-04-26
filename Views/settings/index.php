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
    <link rel="stylesheet" href="<?php echo CSS ?>/settings/index.css">

    <title>Govithena | Settings</title>
</head>

<body>


    <?php

    if (Session::has('password_changed_alert')) {
        $alert = Session::pop('password_changed_alert');
        $alert->show_default_alert();
    }

    if (Session::has('email_changed_alert')) {
        $alert = Session::pop('email_changed_alert');
        $alert->show_default_alert();
    }

    ?>

    <?php require_once(COMPONENTS . "navbar.php");
    ?>


    <dialog id="changePassowrdModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption caption__modal ]">
                <h2>Change your Password</h2>
                <p>you can change your password here. if you don't remember your current password, signout and use forgot password option to reset your password.</p>
            </div>
            <form class="[ ]" action="<?php echo URLROOT ?>/settings/change_password" method="post">
                <div class="[ grid ]" sm="1" lg="1" gap="1">
                    <div class="[ input__control ]">
                        <label for="u-currentPassword">Current Password</label>
                        <input type="password" id="u-currentPassword" name="u-currentPassword" placeholder="Current Password">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-newPassword">New Password</label>
                        <input type="password" id="u-newPassword" name="u-newPassword" placeholder="New Password">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-confirmNewPassword">Confirm New Password</label>
                        <input type="password" id="u-confirmNewPassword" name="u-confirmNewPassword" placeholder="Confirm New Password">
                    </div>
                </div>

                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeChangePassowrdModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-uid" name="u-uid" class="[ button__primary button__submit ]" data-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="changeEmailModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption caption__modal ]">
                <h2>Change your Email</h2>
                <p>you can change your Email address here.</p>
            </div>
            <form class="[ ]" action="<?php echo URLROOT ?>/settings/change_email" method="post">
                <div class="[ grid ]" sm="1" lg="1" gap="1">
                    <div class="[ input__control ]">
                        <label for="u-newEmail">New Email</label>
                        <input type="email" id="u-newEmail" name="u-newEmail" placeholder="New Email">
                    </div>

                    <p>Please enter your current password to verify your identity before changing your email address.</p>

                    <div class="[ input__control ]">
                        <input type="password" id="u-currentPassword" name="u-currentPassword" placeholder="Password">
                    </div>
                </div>

                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeChangeEmailModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-uid" name="u-uid" class="[ button__primary button__submit ]" data-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </dialog>


    <dialog id="deleteAccountModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption caption__modal ]">
                <h2>Delete Your Account</h2>
                <p>
                    We're sorry to see you go!
                </p>
            </div>
            <form class="[ ]" action="<?php echo URLROOT ?>/settings/delete_account" method="post">
                <div class="[ grid ]" sm="1" lg="1" gap="1">
                    <p>Are you sure you want to delete your account? This action is permanent and cannot be undone. If you delete your account, you will lose access to all of your data and any associated services..</p>
                    <p>
                        Please confirm that you wish to proceed with deleting your account by entering your password below.
                    </p>
                    <div class="[ input__control ]">
                        <input type="password" id="d-currentPassword" name="d-currentPassword" placeholder="Password">
                    </div>
                </div>

                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeChangePassowrdModal()" class="[ button__primary ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="delete-button" name="u-uid" class="[ button__danger button__submit ]" data-dismiss="modal">Delete Account</button>
                </div>
            </form>
        </div>
    </dialog>



    <div class="[ container ][ ]" container-type="section">
        <div class="[ caption ]">
            <h3>Security</h3>
            <p>Manage your security settings</p>
        </div>
        <div class="[ settings ]">
            <div class="[ row ]">
                <div>
                    <h3>Change your Password</h3>
                    <p>you can change your password here. if you don't remember your current password, <br>signout and use forgot password option to reset your password.</p>
                </div>
                <button type="button" onclick="openChangePassowrdModal()" class="button__primary">Change Password</button>
            </div>
            <div class="[ row ]">
                <div>
                    <h3>Change your Email</h3>
                    <p>you can change your Email address here.</p>
                </div>
                <button type="button" onclick="openChangeEmailModal()" class="button__primary">Change Email</button>
            </div>
            <div class="[ row delete__row ]">
                <div>
                    <h3>Delete your Account</h3>
                    <p>You can delete your account here.</p>
                </div>
                <button type="button" onclick="openDeleteAccountModal()" class="button__danger">Delete Account</button>
            </div>
        </div>
    </div>
    <?php
    require COMPONENTS . "footer.php";
    ?>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        function openChangePassowrdModal() {
            const changePassowrdModal = document.getElementById("changePassowrdModal")
            changePassowrdModal.showModal()
        }

        function closeChangePassowrdModal() {
            location.reload()
            const changePassowrdModal = document.getElementById("changePassowrdModal")
            changePassowrdModal.close()
        }

        function openChangeEmailModal() {
            const changeEmailModal = document.getElementById("changeEmailModal")
            changeEmailModal.showModal()
        }

        function closeChangeEmailModal() {
            location.reload()
            const changeEmailModal = document.getElementById("changeEmailModal")
            changeEmailModal.close()
        }

        function openDeleteAccountModal() {
            const deleteAccountModal = document.getElementById("deleteAccountModal")
            deleteAccountModal.showModal()
        }

        function closeDeleteAccountModal() {
            location.reload()
            const deleteAccountModal = document.getElementById("deleteAccountModal")
            deleteAccountModal.close()
        }
    </script>
</body>

</html>