<?php

require_once('pdo.php');

class OrderModel{

 function getTraditional(){
        try{
            global $conn;
            $sql=$conn->prepare("SELECT * FROM traditional_food");
            if($sql->execute()){
                $result = $sql->fetchAll();
                foreach($result as $row){ ?>
                    <div class="col-md-3">
                        <form method="post" action="../Controller/OrderController.php?action=add&id=<?php echo $row["Food"]; ?>">
                            <div class="data-img" align="center" style="border: 1px solid #cccccc; font-size: 14px; border-radius: 5px; padding: 16px; margin-bottom:10px;">
                                <img src="<?= $row["Image"]?>" alt="" class="img-fluid">
                                <h6 class="text-info" style="margin-top: 8px;"><?= $row["Food"]?></h6>
                                <h6 class="text-danger">N<?= $row["Price"]?>.00</h6>
                                <input type="number" name="quantity" class="form-control" value="1" style="text-align: center;">
                                <input type="hidden" name="hidden_name" value="<?= $row["Food"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?= $row["Price"] ?>">
                                <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                <?php
                } 
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }

    function getAssorted(){
        global $conn;
        try{
            $sql=$conn->prepare("SELECT * FROM assorted");
            if($sql->execute()){
                $result = $sql->fetchAll();
                foreach($result as $row){ ?>
                    <div class="col-md-3">
                        <form method="post" action="../Controller/OrderController.php?action=add&id=<?php echo $row["Food"]; ?>">
                            <div class="data-img" align="center" style="border: 1px solid #cccccc; font-size: 14px; border-radius: 5px; padding: 16px; margin-bottom:10px;">
                                <img src="<?= $row["Image"]?>" alt="" class="img-fluid">
                                <h6 class="text-info" style="margin-top: 8px;"><?= $row["Food"]?></h6>
                                <h6 class="text-danger">N<?= $row["Price"]?>.00</h6>
                                <input type="number" name="quantity" class="form-control" value="1" style="text-align: center;">
                                <input type="hidden" name="hidden_name" value="<?= $row["Food"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?= $row["Price"] ?>">
                                <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                <?php
                } 
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }

    function getDrinks(){
        try{
            global $conn;
            $sql=$conn->prepare("SELECT * FROM drinks");
            if($sql->execute()){
                $result = $sql->fetchAll();
                foreach($result as $row){ ?>
                    <div class="col-md-3">
                        <form method="post" action="../Controller/OrderController.php?action=add&id=<?php echo $row["Product"]; ?>">
                            <div class="data-img" align="center" style="border: 1px solid #cccccc; font-size: 14px; border-radius: 5px; padding: 16px; margin-bottom:10px;">
                                <img src="<?= $row["Image"]?>" alt="" class="img-fluid">
                                <h6 class="text-info" style="margin-top: 8px;"><?= $row["Product"]?></h6>
                                <h6 class="text-danger">N<?= $row["Price"]?>.00</h6>
                                <input type="number" name="quantity" class="form-control" value="1" style="text-align: center;">
                                <input type="hidden" name="hidden_name" value="<?= $row["Product"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?= $row["Price"] ?>">
                                <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                <?php
                } 
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }

    function getContinental(){
        try{
            global $conn;
            $sql=$conn->prepare("SELECT * FROM continental_food");
            if($sql->execute()){
                $result = $sql->fetchAll();
                foreach($result as $row){ ?>
                    <div class="col-md-3">
                        <form method="post" action="../Controller/OrderController.php?action=add&id=<?php echo $row["Food"]; ?>">
                            <div class="data-img" align="center" style="border: 1px solid #cccccc; font-size: 14px; border-radius: 5px; padding: 16px; margin-bottom:10px;">
                                <img src="<?= $row["Image"]?>" alt="" class="img-fluid">
                                <h6 class="text-info" style="margin-top: 8px;"><?= $row["Food"]?></h6>
                                <h6 class="text-danger">N<?= $row["Price"]?>.00</h6>
                                <input type="number" name="quantity" class="form-control" value="1" style="text-align: center;">
                                <input type="hidden" name="hidden_name" value="<?= $row["Food"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?= $row["Price"] ?>">
                                <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                <?php
                }
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }
}
?>