<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/formModal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">

    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">

    <title>Document</title>

<style>

.card {
    border: 1px solid black;
    padding: 1rem;
}

.card_wrapper{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1rem;
}

</style>
 

</head>
<body>
<dialog id="requestModal" class="[ alertModal ]">
        <div class="[ container ]">
        <i class="bi bi-x-circle"></i>
            <div class="[ head ]">
                <h3>Send A Request</h3>
            </div>
            <!-- <form action="<?php echo URLROOT ?>/farmer/agrologist_request" method="POST" class="[ content ]">
                <div class="[ input__control ]">
                    <label for="offer">Offer (LKR)</label>
                    <input type="number" name="offer" id="offer" required></input>
                </div>
                <div class="[ input__control ]">
                    <label for="timePeriod">Time Period (Days)</label>
                    <input type="number" name="timePeriod" id="timePeriod" required></input>
                </div>
                <div class="[ input__control ]">
                    <label for="message">Description</label>
                    <textarea name="message" id="message" required></textarea>
                </div>
                <div class="[ buttons ]">
                    <button type="button" class="[ button__danger ]" onclick="closeRequestModal()" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="sendBtn" name="agrologistId" class="[ button__primary ]">Send</button>
                </div>
            </form> -->
            <div class="[ buttons ]">
                    <button type="button" class="[ button__danger ]" onclick="closeRequestModal()" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="sendBtn" name="agrologistId" class="[ button__primary ]">Send</button>
                </div>
        </div>
</dialog>
<div class="card_wrapper">
    <?php  

    foreach($gigs as $gig){
        ?>
            <div class="card">
                <button sdfjdslfjl><?php echo $gig['title']?></button>
                <h1><?php echo $gig['title']?></h1>
                <p><?php echo $gig['description']?></p>
                <!-- <img width="100" src="<?php echo UPLOADS . "/" . $gig['image']?>" /> -->
            </div>
        
        <?php
    }
    ?>
</div>

<!-- localhost/govithena/farmer/abc -->

<form action="<?php echo URLROOT . '/farmer/abc'?>" method="POST">
    <div>
        <label>Name : </label>
        <input type="text" name="uname"/>
        <input type="text" name="pass"/>
    </div>
    <button type="submit" name="form1">submit</button>
    <button type="button" onclick="openRequestModal('<?php echo $gig['gigId'] ?>')" class="requestbtn">Send Request</button>

</form>

<form action="<?php echo URLROOT . '/farmer/abc'?>" method="POST">
    <div>
        <label>number : </label>
        <input type="number" name="num"/>
    </div>
    <button type="submit" name="form2">submit</button>
</form>


<!--     
<div class="card_wrapper">
        foreach
        <div class="card">
            <h1>gig title</h1>
            <p>gig description</p>
            <img src="" />
        </div>
        <div class="card">
            <h1>gig title</h1>
            <p>gig description</p>
            <img src="" />
        </div>
        <div class="card">
            <h1>gig title</h1>
            <p>gig description</p>
            <img src="" />
        </div>
        <div class="card">
            <h1>gig title</h1>
            <p>gig description</p>
            <img src="" />
        </div>
    </div> -->


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