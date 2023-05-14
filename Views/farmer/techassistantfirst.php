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
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/search.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/filters.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/formModal.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/agrologist.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/farmerrequest.css">


    <title>Dashboard | Farmer</title>
</head>


<body class="h-screen">

    <?php
    $active = "techassistant";
    $title = "Tech Assistants";
    require_once("navigator.php");
    ?>

    <?php
    if (isset($message)) {
        if ($message == 'ok') {
    ?>

            <div class="[ alert alert-success ]">
                <i class="fas fa-check"></i>
                <div>
                    <h4>Success</h4>
                    <p>Your request has been sent to the Agrologist</p>
                </div>
            </div>

        <?php
        }
        if ($message == 'already') {
        ?>

            <div class="[ alert alert-error ]">
                <i class="fas fa-times"></i>
                <div>
                    <h4>Error</h4>
                    <p>Request alredy sent.</p>
                </div>
            </div>

        <?php
        }
        if ($message == 'error') {
        ?>

            <div class="[ alert alert-error ]">
                <i class="fas fa-times"></i>
                <div>
                    <h4>Error</h4>
                    <p>Something went wrong.</p>
                </div>
            </div>

    <?php
        }
    }

    ?>
    <dialog id="requestModal" class="[ modal ]">
        <div class="[ container ]">
            <div class="[ head ]">
                <h3>Send A Request</h3>
            </div>
            <form action="<?php echo URLROOT ?>/farmer/tech_assistant_request" method="POST" class="[ content ]">
                <div class="[ input__control ]">
                    <label for="offer">Offer (LKR)</label>
                    <input type="number" name="offer" id="offer" required></input>
                </div>
                <div class="[ input__control ]">
                    <label for="message">Description</label>
                    <textarea name="message" id="message" required></textarea>
                </div>
                <div class="[ buttons ]">
                    <button type="button" class="[ button__danger ]" onclick="closeRequestModal()" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="sendBtn" name="technicalAssistantId" class="[ button__primary ]">Send</button>
                </div>
            </form>
    </dialog>

    <div class="container" container-type="dashboard-section">
        <h1 class="page__heading">Search Technical Assistant</h1>

        <form class="[ filters ]" action="<?php echo URLROOT ?>/farmer/techassistantfirst/" method="GET">
            <div class="[ options ]">
                <div class="[ input__control ]">
                    <label for="location">Location</label>
                    <select id="location" name="location">
                        <option value="">All</option>
                        <?php
                        foreach (DISTRICTS as $key => $value) {
                            echo "<option value='$key'>$value</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="[ input__control ]">
                    <button type="submit" name="apply" value="true" class="button__primary">Apply</button>
                </div>
            </div>
            <div class="search">
                <input type="text" name="term" placeholder="Search">
                <button type="submit" name="search" value="true" class="button__primary"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <div class="[ grid ]" gap="1" sm="1" md="2" lg="3">
            <?php
            if (isset($techAssistants) && !empty($techAssistants)) {
                foreach ($techAssistants as $techAssistant) {
            ?>
                    <div class="requestcardn">
                        <div class=" requestimg1 ">
                            <img class="img" src="<?php echo UPLOADS . $techAssistant['image'] ?>" alt=" profile" <?php echo DEFAULT_PROFILE_PICTURE ?>>

                        </div>
                        <div class="flex flex-row ">
                            <div class=" requestlist ">
                                <a class="namebox" href="<?php echo URLROOT . "/profile/" . $techAssistant['uid'] ?>">
                                    <?php echo $techAssistant['firstName'] . " " . $techAssistant['lastName']; ?>
                                </a>
           
                            </div>
                        </div>
                        <div class=" flex-c-c">
                            <button onclick="openRequestModal('<?php echo $techAssistant['uid'] ?>')" class="requestbtn">Send Request</button>

                        </div>

                    </div>



            <?php
                }
            } else {
                echo "<br>";
                require(COMPONENTS . "dashboard/noDataFound.php");
            }


            ?>

        </div>




    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>

    <script>
        // setTimeout(() => {
        //     document.querySelector(".alert").style.display = "none";
        // }, 5000);
    </script>

    <script>
        function openRequestModal(id) {
            document.getElementById('requestModal').showModal()
            document.getElementById('sendBtn').value = id
        }

        function closeRequestModal() {
            document.getElementById('requestModal').close()
        }
    </script>

</body>

</html>