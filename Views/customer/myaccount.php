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
 $db_host = "localhost";
 $db_user = "root";
 $db_password = "";
 $db_name = "govithena";
 
 try {
    $db = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOEXCEPTION $e){
     echo $e->getMessage();
}
$select_stmt = $db->prepare("select * from orders");
$select_stmt->execute();
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
           $i = 0;
           while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
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