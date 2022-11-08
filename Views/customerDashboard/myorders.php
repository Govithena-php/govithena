<?php include 'dashboard.php';?> 
<?php
 echo '<div class="content">
 <div class="search-container">
     <form action="#">
     <button type="submit"><i class="fa fa-search"></i></button>
         <input type="text" placeholder="Search.." name="search">
         
     </form>
 </div>
 <div class="content-navbar">         
     <a class="active" href="#">All</a>
     <a href="#">Current</a>
     <a href="#">Completed</a>
 </div>'
 ?>
 
<?php
 echo '<table class="tb">
     <tr>
         <th>Type</th>
         <th>Farmer</th>
         <th>Date</th>
         <th>Amount</th>
         <th>Price</th>
     </tr>'
     ?>
     <?php
           
           foreach ($customer as $row) {
               echo "<tr>";
               echo "<td>".$row['productId']."</td>";
               echo "<td>".$row['farmerId']."</td>";
               echo "<td>".$row['orderDate']."</td>";
               echo "<td>".$row['qty']."</td>";
               echo "<td>".$row['price']."</td>";
               echo "</tr>";
           }

        ?>
        <?php
 echo '</table>
</div>';

?>