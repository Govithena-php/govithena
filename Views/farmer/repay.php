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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/newProgress.css">

    <title>Dashboard | Farmer</title>
</head>


<body>

    <?php
    $active = "gigs";
    $title = "Repay";
    require_once("navigator.php");
    ?>



    <div class="container" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>Repay </h3>
            <p>Rrepays the investor's capital and shares profits.</p>
        </div>
        <div class="grid" sm="1" lg="2" gap="2">
            <div class="investment__history">
                <table class="[ ]">
                    <thead>
                        <tr>
                            <th>Gig</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($investments as $investment) {
                            $total += $investment['amount'];
                        ?>
                            <tr>
                                <td><?php echo $investment['description'] ?></td>
                                <td class="[ LKR ]"><?php echo number_format($investment['amount'], 2, '.', ',') ?></td>
                                <td><?php echo $investment['investedDate'] ?></td>
                            </tr>

                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="[ invoice ]">
                <form method="POST" action="<?php echo URLROOT ?>/farmer/deposite_gig" method="POST">
                    <input type="hidden" name="investorId" value="<?php echo $investments[0]['investorId']; ?>">
                    <!-- <input type="hidden" name="farmerId" value="<?php echo $investments[0]['farmerId'] ?>"> -->
                    <div class="input__control">
                        <label for="earnings">Earning</label>
                        <input type="number" min="0" id="earnings" placeholder="LKR" required />
                    </div>
                    <hr>
                    <div class="pay__control">
                        <label for="totalInvestment">Total Investments (LKR)</label>
                        <input type="text" class="LKR" name="totalInvestment" id="totalInvestment" --data-value="<?php echo $total ?>" value="<?php echo number_format($total, 2, '.', ',') ?>" disabled>
                    </div>
                    <div class="pay__control">
                        <label for="profit">Profit (LKR)</label>
                        <input type="text" class="LKR" name="profit" id="profit" placeholder="-" disabled>
                    </div>
                    <div class="pay__control">
                        <label for="profitMargin">Profit Margin (Loss Margin 5%)</label>
                        <input type="text" name="profitMargin" id="profitMargin" --data-value="<?php echo $profitMargin ?>" value="<?php echo $profitMargin ?> %" disabled>
                    </div>
                    <div class="pay__control">
                        <label for="repay">Repay (LKR)</label>
                        <input type="text" class="LKR" name="repay" id="repay" placeholder="-" disabled>
                    </div>
                    <div class="pay__control">
                        <label for="convensionFee">Convension fee (LKR)</label>
                        <input type="text" class="LKR" name="convensionFee" id="convensionFee" --data-value="<?php echo CONVENSION_FEES ?>" value="<?php echo number_format(CONVENSION_FEES, 2, '.', ',') ?>" disabled>
                    </div>
                    <hr>
                    <div class="pay__control">
                        <label class="sub_total" for="subTotal">Sub Total (LKR)</label>
                        <input type="hidden" id="earningsHidden" name="earnings" />
                        <input type="hidden" id="subTotal" name="subTotal" />
                        <input type="text" id="subpreview" name="" placeholder="calculating.." disabled>
                    </div>
                    <div class="pay__button">
                        <button type="submit" name="gigId" value="<?php echo $gigId ?>" class="[ button button__primary ]">Repay</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php
    require_once("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script src="<?php echo JS ?>/imageUploader.js"></script>
    <script>
        const earnings = document.getElementById('earnings');
        const earningsHidden = document.getElementById('earningsHidden');

        function numberFormat(number, decimals = 0, thousandsSeparator = ',') {
            const fixedNumber = number.toFixed(decimals);
            const parts = fixedNumber.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSeparator);
            return parts.join('.');
        }



        earnings.addEventListener('keyup', (e) => {
            earningsHidden.value = e.target.value;
            total = document.getElementById('totalInvestment').getAttribute('--data-value')

            if (e.target.value == '') {
                e.target.value = 0;
            }

            if (parseFloat(e.target.value) < parseFloat(total)) {
                profitMargin = -5

                loss = parseFloat(total) * profitMargin / 100;
                document.getElementById('profit').value = numberFormat(loss, 2, ',');
                document.getElementById('repay').value = loss;
                document.getElementById('subTotal').value = parseFloat(total) + parseFloat(loss);
                document.getElementById('subpreview').value = numberFormat(parseFloat(total) + parseFloat(loss), 2, ',');

            } else {
                profitMargin = document.getElementById('profitMargin').getAttribute('--data-value')
                profit = parseFloat(e.target.value) - parseFloat(total);
                document.getElementById('profit').value = numberFormat(profit, 2, ',');

                repay = (profit * parseFloat(profitMargin)) / 100;
                document.getElementById('repay').value = numberFormat(repay, 2, ',');

                convensionFee = document.getElementById('convensionFee').getAttribute('--data-value')

                subTotal = parseFloat(total) + parseFloat(repay) - parseFloat(convensionFee);

                // subTotal = numberFormat(subTotal, 2, ',');

                console.log(subTotal, total, profit, convensionFee);
                document.getElementById('subTotal').value = subTotal;
                document.getElementById('subpreview').value = numberFormat(subTotal, 2, ',');

            }
        });
    </script>
</body>

</html>