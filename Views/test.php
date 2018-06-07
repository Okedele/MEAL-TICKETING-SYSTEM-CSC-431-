<?php
    session_start();

    require_once('pdo.php');

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

     if(isset($_POST["create_pdf"])) {
        $ref = $_POST["hidden_ref"];
        $name = $_POST["hidden_name"];
        $mail = $_POST["hidden_email"];
        $phone = $_POST["hidden_phone"];
        $date = $_POST["hidden_date"];
        require_once("../tcpdf/tcpdf.php");
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $obj_pdf->SetTitle("Receipt");
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
        $obj_pdf->setPrintHeader(false);
        $obj_pdf->setPrintFooter(false);
        $obj_pdf->SetAutoPageBreak(TRUE, 10);
        $obj_pdf->SetFont('helvetica', '', 12);
        $obj_pdf->AddPage();

        $content = '';

        $content .= '<h4 align="center">Receipt</h4>
            <table border="1" cellspacing="0" cellpadding="5">
             <thead>
                    <tr>
                        <td>Food</td>
                        <td style="padding-right: 150px; padding-bottom: 0px; padding-top: 40px;">Price</td>
                    </tr>
                </thead>
                <tbody>';

                        if(!empty($_SESSION["shopping_cart"])) {
                            $total = 0;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                $content .= '
                    <tr>
                        <td style="padding-bottom: 20px; padding-top: 20px;">'.$values["item_name"].'</td>
                        <td>'.number_format($values["item_quantity"] * $values["item_price"], 2).'</td>
                    </tr>';
                                $total = $total + ($values["item_price"] * $values["item_quantity"]);
                            }
                        } 
                    $content .= '
                    </tbody>
            </table>
            <br><br><br>
            <table border="1" cellspacing="0" cellpadding="5">
                <tbody>
                    <tr>
                        <th scope="row">Reference</th>
                        <td>'.$_POST["hidden_ref"].'</td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td>'.$_POST["hidden_name"].'</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>'.$mail.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td>'.$phone.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Expiry Date</th>
                        <td>'.$date.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Amount Payable</th>';
                        if(!empty($_SESSION["shopping_cart"])) { 
                    $content .= '
                        <td>'.number_format($total, 2).'</td>';
                        } else { 
                    $content .= '
                        <td>0.00</td>';
                         } 
                    $content .= '
                    </tr>
                </tbody>
            </table>';

            $content .= '<p align="center"><i style="color:red">*Funds are non-refundable after expiry of the reciept</i></p>';

        $obj_pdf->writeHTML($content);

        $obj_pdf->Output("Receipt.pdf", "D");
        
       
     }elseif(isset($_POST['atm_create_pdf'])){
        $ref = $_POST["hidden_ref"];
        $name = $_POST["hidden_name"];
        $mail = $_POST["hidden_email"];
        $phone = $_POST["hidden_phone"];
        $date = $_POST["hidden_date"];
        $atm_code = $_POST['atm'];
        $code = $_POST['hidden_code'];
        try{ 
            $array = array(
                ':ref' => $_POST["hidden_ref"],
                ':valid' => $_POST["hidden_date"]
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
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
        <div class="table-responsive" id="info">
            <table class="table table-bordered" style="border-left-width: 0px; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <th scope="row">Reference</th>
                        <td style="border-top: 1px solid #dee2e6"><?= $_POST["hidden_ref"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Reference Code</th>
                        <td><?= $code ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Payment Reference</th>
                        <td><?= $atm_code ?></td>
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
            <form method="post" action="test2.php">
            <input type="hidden" name="hidden_ref" value="<?= $ref ?>">
        <input type="hidden" name="hidden_name" value="<?= $name ?>">
        <input type="hidden" name="hidden_email" value="<?= $mail ?>">
        <input type="hidden" name="hidden_phone" value="<?= $phone ?>">
        <input type="hidden" name="hidden_date" value="<?= $date ?>">
        <input type="hidden" name="hidden_code" value="<?= $code ?>">
        <input type="hidden" name="hidden_atm" value="<?= $atm_code ?>">
        <input type="submit" name="atm_create_pdf" value="PRINT" class="pay text-center" style="position: fixed; top: 0; right: 0; background-color: white; color: #38b64b;">
        </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>
?>


