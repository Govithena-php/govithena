<?php include 'dashboard.php';?> 
<?php
 echo '<div class="content">
 <div class="search-container">
     <form action="#">
         <button type="submit"><img src="./src/images/search.png" class="search-icon"></button>
         <input type="text" placeholder="Search.." name="search">
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
     <tr>
         <td>Brinjal</td>
         <td>John Doe</td>
         <td>2020/10/10</td>
         <td>50</td>
         <td>100</td>
     </tr>
     <tr>
         <td>Brinjal</td>
         <td>John Doe</td>
         <td>2020/10/10</td>
         <td>50</td>
         <td>100</td>
     </tr>
     <tr>
         <td>Brinjal</td>
         <td>John Doe</td>
         <td>2020/10/10</td>
         <td>50</td>
         <td>100</td>
     </tr>
 </table>
</div>';

?>