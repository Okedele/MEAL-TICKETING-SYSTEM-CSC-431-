<?php
    session_start();
    function random_code($limit){
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check-Out</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <style>
        .table td {
            border-bottom: 1px solid #dee2e6;
            border-top: none;
        }
        ::-webkit-scrollbar {
            width: 8px; 
            background-color: rgba(0,0,0,0);
            -webkit-border-radius: 100px;
        }
        ::-webkit-scrollbar:hover {
            background-color: rgba(0, 0, 0, 0.09);
        }
        ::-webkit-scrollbar-thumb:vertical {
            background: rgba(0,0,0,0.5);
            -webkit-border-radius: 100px;
        }
        ::-webkit-scrollbar-thumb:vertical:active {
            background: rgba(0,0,0,0.61);
            -webkit-border-radius: 100px;
        }
        input{
            height: 23.98438px;
        }
        div#info.table-responsive {
          margin-top: 40px;
        }
        input[type=text], input[type=email], input[type=tel], input[type=date] {
        border: none;
        border-bottom: 2px solid #38b64b;
        outline: none;
        }
    </style>
</head>

<body>

        <p><a href="orders.php" class="text-center" title="Go to Order Page" style="position: fixed; top: 0; left: 0; background-color: white; color: #38b64b; margin-left: 10px; padding-left: 60px; padding-right: 70px; border-radius: 10px; border: none;">Shop Again?</a>
        <p><a href="../index.php" class="text-center" title="Homepage" style="position: fixed; top: 0; right: 0; background-color: white; color: #38b64b; margin-left: 100px; padding-left: 60px; padding-right: 70px; border-radius: 10px; border: none;">Go Home</a>

    <div id="card" style="height: auto">

        <h4 class="text-center">Invoice/Confirmation</h4>

        <div class="table-responsive" id="cart" style="height: 219.746px;">
            <table class="table">
                <thead>
                    <tr>
                        <td class="border-right item" style="padding-right: 10px;">Item</td>
                        <td class="border-right quantity">Quantity</td>
                        <td class="total text-center" style="padding-left: 5px; border-right: 2px solid #dee2e6;">Total <br> (&#8358;)</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_SESSION["shopping_cart"])) {
                            $total = 0;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                    <tr>
                        <td class="border-right" style="padding-bottom: 20px; padding-top: 20px; padding-right: 10px;"><?php echo $values["item_name"]; ?></td>
                        <td class="border-right"><?php echo $values["item_quantity"]; ?></td>
                        <td style="border-right: 2px solid #dee2e6;"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                        <td><a class='close' style="outline: none;" href="../Controller/CheckoutController.php?action=delete&id=<?= $values["item_name"] ?>">&times;</a></td>
                    </tr>
                    <?php 
                                $total = $total + ($values["item_price"] * $values["item_quantity"]);
                            }
                        ?>
                    <tr>
                        <td class="border-right item" style="padding-top:30px; padding-bottom: 20px; border-bottom: none; padding-right: 10px;">Total</td>
                        <td class="border-right" style="border-bottom: none;"></td>
                        <td style="padding-bottom: 20px; padding-top: 30px; border-bottom: none; border-right: 2px solid #dee2e6;"><?php echo number_format($total, 2); ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
                        
        <form action="validate.php" method="post">
            <div class="table-responsive" id="info">
                <table class="table table-bordered" style="border-left-width: 0px; margin-bottom: 20px">
                    <tbody>
                        <tr>
                            <th scope="row">Reference</th>
                            <td style="border-top: 1px solid #dee2e6"><?php $ran = random_code(16); echo $ran ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td><input type="text" name="name" id="" placeholder="Enter your name" required></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><input type="email" name="email" id="" placeholder="Enter your email" required></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td><input type="tel" name="phone" id="" placeholder="Enter your phone number" required></td>
                        </tr>
                        <tr>
                            <th scope="row">Expiry Date</th>
                            <td><input type="date" min="<?= date('Y-m-d') ?>" name="date" required></td>
                        </tr>
                        <tr>
                            <th scope="row">Amount Payable</th>
                            <?php if(!empty($_SESSION["shopping_cart"])){ ?>
                            <td><?php echo $total ?></td>
                            <?php } else { ?>
                            <td>0.00</td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="hidden_ref" value="<?= $ran ?>">
            <input type="submit" name="online" value="Pay Online" class="pay text-center"> <br>
            <input type="submit" name="atm" value="Pay ATM" class="atm text-center" style="margin-bottom: 20px;padding-right: 75px;padding-left: 70px;">
        </form>
    </div>

</body>

</html>