<?php
    require_once('pdo.php');
    session_start();

    function random_code($limit){
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

    function insertOrder($input){
        global $conn;
        $sql = "INSERT INTO `order_details`(`Order_ID`, `Valid_To_Date`) VALUES (:ref, :valid)";
        $query = $conn->prepare($sql);
        if($query->execute($input)){}else{echo "Ntorr!";}
    }

    function insertTicket($input){
        global $conn;
        $sql = "INSERT INTO `ticket`(`Order_ID`, `Product`, `Total_Price`) VALUES (:ref, :product, :total)";
        $query = $conn->prepare($sql);
        if($query->execute($input)){}else{echo "Ntorr!";}
    }

    

     
    
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/checkout.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
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
      input[type=text], input[type=email], input[type=tel], input[type=number] {
        border: none;
        border-bottom: 2px solid #38b64b;
        outline: none;
}
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    margin-left: -60px;
}

.tooltip .tooltiptext::after {
    content: "bhbyjjhj";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: black transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
    </style>
</head>

<body>

<a  class="pay text-center" style="position: fixed; top: 0; left: 0; background-color: white; color: #38b64b; margin-left: 0;" href="../index.php">Go Home</a>

    <div id="card" style="height:auto;">

        <h4 class="text-center">Receipt</h4>

        <div class="table-responsive" id="cart">
            <table class="table">
             <thead>
                    <tr>
                        <td class="border-right item">Food</td>
                        <td class="total" style="padding-right: 150px; padding-bottom: 0px; padding-top: 40px;">Price</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_SESSION["shopping_cart"])) {
                            $total = 0;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                    <tr>
                        <td class="border-right" style="padding-bottom: 20px; padding-top: 20px;"><?php echo $values["item_name"]; ?></td>
                        <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    </tr>
                    <?php 
                                $total = $total + ($values["item_price"] * $values["item_quantity"]);
                            }
                        ?>
                        <tr>
                        <td class="border-right" style="padding-bottom: 20px; padding-top: 20px; border-bottom: none;"></td>
                        <td style="border-bottom: none;"></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
            </table>
        </div>
<?php 
         if(isset($_POST["online"])){
        $ref = $_POST["hidden_ref"];
        $name = $_POST["name"];
        $mail = $_POST["email"];
        $phone = $_POST["phone"];
        $date = $_POST["date"];
        try{ 
            $array = array(
                ':ref' => $_POST["hidden_ref"],
                ':valid' => $_POST["date"]
            );
            insertOrder($array);
            if(!empty($_SESSION["shopping_cart"])) {
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    $product = $values["item_name"];
                    $tot = ($values["item_price"] * $values["item_quantity"]);
                    $array = array(
                        ':ref' => $_POST["hidden_ref"],
                        ':product' => $product,
                        ':total' => $tot
                    );
                    insertTicket($array);
                }
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        } ?>
                   
        <div class="table-responsive" id="info">
            <table class="table table-bordered" style="border-left-width: 0px; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <th scope="row">Reference</th>
                        <td style="border-top: 1px solid #dee2e6"><?= $_POST["hidden_ref"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td><?= $name ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td><?= $mail ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td><?= $phone ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Expiry Date</th>
                        <td><?= $date ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Amount Payable</th>
                        <?php if(!empty($_SESSION["shopping_cart"])){ ?>
                        <td><?php echo number_format($total, 2); ?></td>
                        <?php } else { ?>
                        <td>0.00</td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <p align="center"><i style="color:red">*Funds are non-refundable after expiry of the reciept</i></p>
            <form method="post" action="test.php">
        <input type="hidden" name="hidden_ref" value="<?= $ref ?>">
        <input type="hidden" name="hidden_name" value="<?= $name ?>">
        <input type="hidden" name="hidden_email" value="<?= $mail ?>">
        <input type="hidden" name="hidden_phone" value="<?= $phone ?>">
        <input type="hidden" name="hidden_date" value="<?= $date ?>">
        <input type="submit" name="create_pdf" value="PRINT" class="pay text-center" style="position: fixed; top: 0; right: 0; background-color: white; color: #38b64b;" onlick="validate()">
        </form>
        </div>
<?php } elseif (isset($_POST["atm"])) { 
        $ref = $_POST["hidden_ref"];
        $name = $_POST["name"];
        $mail = $_POST["email"];
        $phone = $_POST["phone"];
        $date = $_POST["date"];
        $atm = "88884566556";
         ?>
         <div class="tooltip">HOVERRRRR
  <span class="tooltiptext">Tooltip text</span>
</div>
         <form method="post" action="test.php">
        <div class="table-responsive" id="info">
            <table class="table table-bordered" style="border-left-width: 0px; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <th scope="row">Reference</th>
                        <td style="border-top: 1px solid #dee2e6"><?= $_POST["hidden_ref"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Reference Code     <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="This is our reference code. Input it at the ATM when paying"></i></th>
                        <td title="This is our ATM reference"><?= $atm ?></td>
                    </tr>
                    <tr>
                        <th scope="row">ATM Payment Reference</th>
                        <td><input type="number" min="111111111111" max="999999999999" name="atm" id="" placeholder="Enter ATM payment reference code" required></td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td><?= $name ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td><?= $mail ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td><?= $phone ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Expiry Date</th>
                        <td><?= $date ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Amount Payable</th>
                        <?php if(!empty($_SESSION["shopping_cart"])){ ?>
                        <td><?php echo number_format($total, 2); ?></td>
                        <?php } else { ?>
                        <td>0.00</td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <p align="center"><i style="color:red">*Funds are non-refundable after expiry of the reciept</i></p>
        <input type="hidden" name="hidden_ref" value="<?= $ref ?>">
        <input type="hidden" name="hidden_name" value="<?= $name ?>">
        <input type="hidden" name="hidden_email" value="<?= $mail ?>">
        <input type="hidden" name="hidden_phone" value="<?= $phone ?>">
        <input type="hidden" name="hidden_date" value="<?= $date ?>">
        <input type="hidden" name="hidden_code" value="<?= $atm ?>">
        <input type="submit" name="atm_create_pdf" value="CHECKOUT" class="pay text-center" style="margin-bottom: 20px; background-color: #38b64b; color: white;">
        </form>
        </div>
    <?php } ?>
    </div>


    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>

</html>