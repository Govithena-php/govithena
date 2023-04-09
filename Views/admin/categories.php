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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/admin/categories.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">


    <title>Dashboard | Admin</title>
</head>

<body>

    <?php

    $active = "categories";
    $title = "Categories";
    require_once("navigator.php");
    ?>

    <dialog id="deleteConformationModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="fa fa-circle-xmark" aria-hidden="true"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to Delete this category ?</p>
            </div>
            <form id="suspendForm" action="<?php echo URLROOT ?>/admin/delete_category" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeDeleteAlert()" data-dismiss="modal">No, Cancel</button>
                <button id="confirmDeleteBtn" name="cid-confirm" type="submit" class="[ button__danger ]">Yes, Delete</button>
            </form>
        </div>
    </dialog>


    <dialog id="categoryModal" class="[ categoryModal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>New category</h2>
                <p>Create a new category.</p>
            </div>
            <form class="[ new__category_form ]" action="<?php echo URLROOT ?>/admin/newCategory" method="post" enctype="multipart/form-data">
                <div class="[ grid ]" sm="1" lg="3" gap="1">
                    <div class="[ input__control ]">
                        <label for="category">Category Name</label>
                        <input type="text" id="category" name="name" placeholder="Category Name">
                    </div>
                    <div class="[ input__control ]">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" name="slug" placeholder="Slug">
                    </div>
                    <div class="[ input__control ]">
                        <label for="mainCategory">Main Category</label>
                        <select id="mainCategory" name="type">
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
                        <p id="image_message">Category Thumbnail</p>
                    </div>

                    <div class="[ text__box ]">
                        <div class="[ text__box_preview ]"></div>
                        <img class="[ upload__svg ]" src="<?php echo IMAGES ?>svg/upload.svg" />
                        <p>Darg and drop your image here<br>or</p>
                        <label class="[ browse__btn ]" for="image-uploader">Browse</label>
                        <input id="image-uploader" class="text__box_input" type="file" name="thumbnail">
                    </div>
                </div>
                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeCategoryModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submitBtn" class="[ button__primary button__submit ]" data-dismiss="modal">Create</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="editCategoryModal" class="[ categoryModal ]">
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
    </dialog>



    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="[ flex__header ]">
            <div class="[ caption ]">
                <h2>Categories</h2>
                <p>Keep your eyes on the prize by tracking progress with ease.</p>
            </div>
            <div class="[ add_new ]">
                <button onclick="openCategoryModal()" class="[ button__primary ]">Add Category</button>
                <!-- <a href="<?php echo URLROOT ?>/admin/newCategory" class="[ button__primary ]">Add Category</a> -->
            </div>
        </div>
        <div class="[  ]">
            <div class="[ grid__table ]" style="
                                --xl-cols: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
                                --lg-cols: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
                                --md-cols: 1fr 1fr 1fr;
                                --sm-cols: 3fr 1fr;
                                ">
                <div class="[ head stick_to_top ]">
                    <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                        <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                            <div class="[ input__control ]">
                                <label for="location">Main Category</label>
                                <select id="location">
                                    <option value="vegetable">Vegetables</option>
                                    <option value="fruits">Fruits</option>
                                    <option value="grains">Grains</option>
                                    <option value="spices">Spices</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="[ input__control ]">
                                <button type="button">Apply</button>
                            </div>

                        </div>
                        <div class="[ search ]">
                            <input type="text" placeholder="Search">
                            <button type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="[ row ]">
                        <div class="[ data ]">
                            <p>Category</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Name</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Type</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Slug</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Created By</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Create At</p>
                        </div>
                    </div>
                </div>
                <div class="[ body ]">
                    <?php
                    foreach ($subCategories as $subCategory) {
                    ?>
                        <div class="[ view_more row ]">
                            <div class="[ data ]">
                                <div class="[ item__card ]">
                                    <img width="50" src="<?php echo UPLOADS . 'categories/' . $subCategory['thumbnail'] ?>" />
                                </div>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['name'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['type'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['slug'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['firstName'] . " " . $subCategory['lastName'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['createdAt'] ?></p>
                            </div>

                            <div class="[ data buttons ]">
                                <button onclick='openEditCategoryModal(<?php echo json_encode($subCategory) ?>)' class="view_more button__primary">Edit</button>
                                <button onclick="openDeleteAlert('<?php echo $subCategory['id'] ?>')" class="button__danger">Delete</button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        const expandBtns = document.querySelectorAll(".view_more")
        console.log(expandBtns);
        const expands = document.querySelectorAll(".expand")
        const icons = document.querySelectorAll(".actions>button>i")
        Array.from(expandBtns).forEach(expandBtn => {

            expandBtn.addEventListener("click", () => {
                let id = expandBtn.getAttribute("for")

                Array.from(icons).forEach(icon => {
                    icon.removeAttribute("show")
                })

                Array.from(expands).forEach(expand => {
                    if (expand.id == id) {
                        expand.toggleAttribute("show")
                        if (expand.hasAttribute("show")) {
                            expandBtn.children[0].setAttribute("show", null)
                        }
                    } else {
                        expand.removeAttribute("show")
                    }
                })

            })
        })


        function openCategoryModal() {
            const categoryModal = document.getElementById("categoryModal")
            categoryModal.showModal()
        }

        function closeCategoryModal() {
            location.reload()
            const categoryModal = document.getElementById("categoryModal")
            categoryModal.close()
        }

        function openEditCategoryModal(data) {
            const editCategoryModal = document.getElementById("editCategoryModal")
            document.getElementById("u-submitBtn").value = data.id
            document.getElementById("u-category").value = data.name
            document.getElementById("u-mainCategory").value = data.type
            document.getElementById("u-slug").value = data.slug
            document.getElementById("u-image_message").textContent = "Select new Image if you want to change"
            document.querySelector('.text__box_preview--update').innerHTML = `<img src="<?php echo UPLOADS . 'categories/' ?>/${data.thumbnail}" alt="image" />`
            editCategoryModal.showModal()
        }

        function closeEditCategoryModal() {
            location.reload()
            const editCategoryModal = document.getElementById("editCategoryModal")
            editCategoryModal.close()
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
    <script src="<?php echo JS ?>/imageUploader.js"></script>

</body>

</html>