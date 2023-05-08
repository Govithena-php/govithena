<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/styles-hotel.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/table.css" />

        <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">

<style>
        .table-container,
        .table-container::before,
        .table-container::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0; 
        }

        .table-container {
        font-family: 'Poppins';
        height: auto;
        min-height: 50vh;
        display: grid;
        justify-content: center;
        align-items: center;
        color: #4f546c;
        background-color: #f9fbff;
        }

        .table-container table {
        border-collapse: collapse;
        box-shadow: 0 5px 10px #e1e5ee;
        background-color: white;
        text-align: left;
        overflow: hidden;
        border-style:none !important;
        }

        .table-container thead {
            box-shadow: 0 5px 10px #e1e5ee;
        }

        .table-container th {
            padding: 2rem 3rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            font-size: 12px;
            font-weight: 900;
            border-style:none !important;
        } 

        .table-container td {
            padding: 2rem 3.8rem;
            border-style:none !important;
            font-size: 12px;
        }

        .table-container a {
            text-decoration: none;
            color: #2962ff;
        }

        .table-container .status {
            border-radius: 0.2rem;
            /* background-color: red; */
            padding: 0.2rem 1rem;
            text-align: center;
        }
        .table-container .status-pending {
            background-color: #fff0c2;
            color: #a68b00;
            }

        .table-container .status-paid {
            background-color: #c8e6c9;
            color: #388e3c;
            }

        .table-container .status-unpaid {
            background-color: #ffcdd2;
            color: #c62828;
            }


        .table-container .amount {
            text-align: right;
        }

        .table-container tr:nth-child(even) {
            background-color: #f4f6fb;
        }

        .filter-card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 40%;
            border-radius: 5px;
            margin: 10px;
            padding: 10px 10px 10px 10px;
        }

        .filter-card .container {
            padding: 2px 16px;
            font-size:14px;
        }
        .filter-card .container label {
            margin-left:8px;
        }
        .filter-card.month .container input {
            margin-left:25px;
        }

        @media print {
            .footer{
                display: none;
            }

            @page:first {
                margin-left: 0.1in;
                margin-right: 0.1in;
                margin-top: -0.9in;
                margin-bottom: 0.2in;
            }
            @page {
                margin-left: 0.1in;
                margin-right: 0.1in;
                margin-top: 0.2in;
                margin-bottom: 0.2in;
            }
        }
</style>


<title>TruEvent Horizons - Report - Hotel Manager</title>

</head>

<body>
<!-- <?php require APPROOT . "/views/hotelManager/header-hotel.php" ?> -->
   
    
<?php $dataRows = $data[0]; ?>
<?php $custDetails = $data[1]; ?>
<?php $resCount = 0; ?>
        <div class="main-content">

       <form action="<?php echo URLROOT; ?>/hotelDashboard/reports" method="post">
                <div class="row">
                        <div class="text-group">
                                <label for="servicetype" style="font-size:18px; font-weight:500;">Service Type</label>
                                <input type="text" value="Hotel" name="serviceType" style="margin-top:-5px;">
                                    <!-- <select name = "event_name" class="dropdownmenu" id="event_name" required> 
                                            <option value="">Select event name or type...</option>
                                            <option value = "hotel">Hotel</option>
                                            <option value = "decoration">Decoration</option>
                                            <option value = "band">Band</option>
                                            <option value = "photography">Photography</option>
                                            <option value = "package">Package</option>
                                    </select> -->
                        </div>
                </div>

                <!-- <button class="btn-btn-report" style="font-size:18px; font-weight:500;"><a href="<?php echo URLROOT ?>/adminDashboard/generateReports" style="color:white;">Generate Reports<a></button> -->

                <div class="row">
                        <div class="text-group2" style="margin-left:150px;">
                                <label for="fromdate" style="font-size:18px; font-weight:500;">From</label>
                                <input type="date" name="startDate" style="margin-top:-30px;">      
                        </div>  
                        <div class="text-group2-1" style="font-size:18px; font-weight:500;">
                                <label for="todate" class="todate">To</label>
                                <input type="date" name="endDate" style="margin-top:-30px;">
                        </div>

                        <button class="btn-btn-search" id="search" style="font-size:18px; font-weight:500; margin-top:25px;" type="submit" onclick="func()">Search</button>
                </div>
        </form>
                <div class="totaldetails">
                        <div class="totalres">
                                <label for="totReservation">Total Reservation</label>
                                <p id="totReservation" style="background-color:red; margin-top:70px; height:60px;">
                        </div>
        
                        <div class="totalincome">
                                <label for="totalincome">Total Income</label>
                                <input type="text" id="total_income" style="background-color:red;  margin-top:70px; height:60px;">

                        </div>
                       
                </div>
                <div class="charts">
                        <div class="res">
                                <label for="reservation">Reservations</label>
                        </div>
        
                        <div class="income">
                                <label for="income">Income</label>
                        </div>  
                </div>

                <section class="container">
   <!-- <input type="search" class="lighter-table-filter" data-table="table-info" placeholder="Filter/Search Here" style="margin-bottom:20px ;"> -->
   <table style="margin-top:25px; margin-bottom:50px; margin-left:100px;" id="tab">
            <thead>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Reservation Date</th>
                <th>Reservation Type</th>
                <th>Customer Name</th>
                <th>Service Provider/Package</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($dataRows as $rvdetails):
                    $customer_id = $rvdetails->customer_id;
            

                    foreach($custDetails as $customerDetails):
                        if($customerDetails->customer_id == $customer_id){
                            $customer_name = $customerDetails->fname." ".$customerDetails->lname;
                        }
                    endforeach;
                ?>
                    
                    <tr>
                        <?php $resCount = $resCount + 1; ?>
                        <td><?=$rvdetails->rv_id?></td>
                        <td><?=$rvdetails->eventName?></td>
                        <td><?=$rvdetails->rvDate?></td>
                        <td><?=$rvdetails->rvType?></td>
                        <td><?=$customer_name?></td>
                        <td><?php if($rvdetails->rvType =="service") echo $rvdetails->spName; else echo $rvdetails->packageName?></td>
                        <td>
                            <?php if($rvdetails->status == "pending"){?>
                                <p class="status status-pending">Pending</p>
                            <?php }elseif($rvdetails->status == "confirm"){?>
                                <p class="status status-paid">Confirmed</p>
                            <?php }else{?>
                                <p class="status status-unpaid">Declined</p>
                            <?php }?>
                        </td>
                        <td>
                            <?php if($rvdetails->payment == "not-paid"){?>
                                <p class="status status-unpaid">Not Paid</p>
                            <?php }elseif($rvdetails->payment == "confirm"){?>
                                <p class="status status-pending">Advance Payment</p>
                            <?php }else{?>
                                <p class="status status-paid">Complete</p>
                            <?php }?>
                        </td>
                        <td class="amount">LKR. <?=number_format($rvdetails->price, 2, '.', '')?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
</section>
        
                
        </div> 
        
         <!-- footer start -->
    <section class="footer">
        <div class="overlay"></div>
        <div class="box-container">
            <div class="box">
                <h3>Quick Access</h3>
            <a href="admin-home.php"><i class="fas fa-angle-right"></i>  Home</a>
            <a href="packages.php"><i class="fas fa-angle-right"></i> Packages</a>
            <a href="admin-add-packages.php"><i class="fas fa-angle-right"></i> Add Packages</a>
            </div>
    
            <div class="box">
                <h3>Extra</h3>
            <a href="#"><i class="fas fa-angle-right"></i>  About US</a>
            <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
            <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
            </div>
    
            <div class="box">
                <h3>Contact Us</h3>
            <a href="#"><i class="fas fa-phone"></i>  +94 123-456-789</a>
            <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
            <a href="#"><i class="fas fa-map"></i> Colombo</a>
    
    
            </div>
           
            <div class="box">
                <h3>Follow US</h3>
            <a href="#"><i class="fab fa-facebook"></i>  facebook</a>
            <a href="#"><i class="fab fa-instagram"></i> instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i>  linkedin</a>
    
            </div>
        </div>
    
        
    
        <div class="credit">
            Created By <span>TruEvent Horizon</span> | All Rights Reserved
        </div>
    
    </section>
    
    
    <!-- footer ends -->
    <!-- <script src="<?php echo URLROOT ?>/public/js/admin/function.js"></script> -->
    <script>
       function func(){
                document.getElementById("totReservation").value = $resCount;
    }
        
    </script>

</body>


</html>