<?php include 'myorders.php'; ?>
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
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['orderDate'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>