<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="card_wrapper">
    <?php  
    foreach($gigs as $gig){
        ?>
            <div class="card">
                <h1><?php echo $gig['title']?></h1>
                <p><?php echo $gig['description']?></p>
                <img width="100" src="<?php echo UPLOADS . "/" . $gig['image']?>" />
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
</form>

<!-- <form action="<?php echo URLROOT . '/farmer/abc'?>" method="POST">
    <div>
        <label>number : </label>
        <input type="number" name="num"/>
    </div>
    <button type="submit" name="form2">submit</button>
</form> -->


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


</body>
</html>