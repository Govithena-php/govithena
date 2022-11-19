<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <title>govithena | dashboard</title>
    <link rel="stylesheet" type="text/css" href="../Webroot/css/sidebar.css">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" href="../Webroot/css/dashHeader.css">
    <link rel="stylesheet" href="../Webroot/css/dashFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray">
    <?php include COMPONENTS . 'dashboard/header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <div class="content">
        <div class="search-container ff-poppins">
            <form action="">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="search__icon fa fa-search"></i></button>

            </form>
        </div>
        <div class="content-navbar">
            <a class="active" href="#">All</a>
            <a href="#">Current</a>
            <a href="#">Completed</a>
        </div>
        <table class="tb">
            <tr>
                <th>Type</th>
                <th>Farmer</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Price</th>
            </tr>
            <?php

            foreach ($customer as $row) {
                echo "<tr>";
                echo "<td>" . $row['productId'] . "</td>";
                echo "<td>" . $row['farmerId'] . "</td>";
                echo "<td>" . $row['orderDate'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
<<<<<<< Updated upstream
    <table class="tb">
        <tr>
            <th>Type</th>
            <th>Farmer</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Price</th>
        </tr>
        <?php

        foreach ($customer as $row) {
            echo "<tr>";
            echo "<td>" . $row['productId'] . "</td>";
            echo "<td>" . $row['farmerId'] . "</td>";
            echo "<td>" . $row['orderDate'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<?php require COMPONENTS . "dashboard/footer.php"; ?>
=======
    <?php require COMPONENTS . "dashboard/footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>
>>>>>>> Stashed changes
