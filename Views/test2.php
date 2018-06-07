<?php
    session_start();

    if(isset($_POST['atm_create_pdf'])){
        $ref = $_POST["hidden_ref"];
        $name = $_POST["hidden_name"];
        $mail = $_POST["hidden_email"];
        $phone = $_POST["hidden_phone"];
        $date = $_POST["hidden_date"];
        $atm_code = $_POST['hidden_atm'];
        $code = $_POST['hidden_code'];

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
                        <th scope="row">Reference Code</th>
                        <td>'.$code.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Payment Reference</th>
                        <td>'.$atm_code.'</td>
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
    }
?>