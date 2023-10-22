<?php
require_once('header.php');
include_once('connect.php');

$c = new Connect();
$dbLink = $c->connectToMySQL();
?>

<?php
if (isset($_GET['del_id'])) {
    $delete_id = $_GET['del_id'];
    $delete_Sql = "DELETE FROM `product` WHERE product_id=?";
    $deleteStmt = $dbLink->prepare($delete_Sql);
    $deleteStmt->bind_param("i", $delete_id);

    if ($deleteStmt->execute()) {
        echo "Product has been deleted!";
    } else {
        echo "Product delete failed!";
    }
}

if(isset($_SESSION["account"])) {
    $account = $_SESSION['account'];
}else{
    header('Location: login.php');
}
?>

<div class="container">
    <?php
    if (isset($_GET['id'])):
        $pid = $_GET['id'];
        $conn = new Connect();
        $dbLink = $conn->connectToPDO();
        $sql = "SELECT * FROM product p, supplier s, employee e, category c WHERE c.cat_id = p.product_cat AND p.supplier_id = s.supplier_id AND p.employee_id = e.employee_id AND product_id=?";
        $stmt = $dbLink->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
        ?>

        <div class="card mb-3 col-3 mx-auto my-3" style="width: 18rem;">
            <img src="img/<?= $re['pro_img'] ?>" class="card-img-top my-3 mx-auto" alt="..."
                style="max-width: 90%; height: auto; border: 1px solid black; border-radius: 6px;">
            <div class="card-body">
                <h2 class="text-center" style="color: blue;">
                    <?= $re['product_name'] ?>
                </h2>
                ID: 
                <?= $re['product_id'] ?>
                <br>
                Category:
                <?=$re['cat_name']?>
                <br>
                Price:
                <?= $re['sale_price'] ?>&#8363;
                <br>
                Date import:
                <?= $re['date'] ?>
                <br>
                Origin price:
                <?= $re['origin_price'] ?>
                <br>
                Supplier:
                <?= $re['supplier_name'] ?>
                <br>
                Employee:
                <?= $re['employee_name'] ?>
            </div>

            <button type="submit" name="btnUpdate" class="btn btn-success my-3 mx-auto">
                <a href="update.php?id=<?=$re['product_id']?>" class="text-decoration-none text-white">Update <i class="fa-solid fa-pen-to-square"></i></i></a>
            </button>
            <button type="submit" name="btnDelete" class="btn btn-danger my-3 mx-auto">
                <a href="?del_id=<?= $re['product_id'] ?>" class="text-decoration-none text-white">Delete
                    <i class="fa-solid fa-trash"></i></a>
            </button>

        </div>
        <div class="pt-5">
            <h6 class="mb-0">
                <a href="index.php" class="text-body text-decoration-none px-5">
                    <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop
                </a>
            </h6>
        </div>

        <?php
    else:
        ?>
        <h2>Nothing to show</h2>
        <div class="pt-5">
            <h6 class="mb-0">
                <a href="index.php" class="text-body text-decoration-none px-5">
                    <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop
                </a>
            </h6>
        </div>
        <?php
    endif;
    ?>
</div>

<?php
require_once('footer.php');
?>