<?php
require_once('header.php');
include_once('connect.php');
?>

<div class="container">
    <div class="row">
        <?php
        $c = new Connect();
        $dblink = $c->connectToPDO();

        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];
        } else {
            $cid = "";
        }

        $sql = "SELECT * FROM product WHERE product_cat=?";
        $re = $dblink->prepare($sql);
        $valueArray = [$cid];
        $re->execute($valueArray);
        $row = $re->fetchAll(PDO::FETCH_BOTH);

        foreach ($row as $r):
            ?>

            <div class="card mb-3 col-3 mx-auto my-3" style="width: 18rem;">
                <img src="img/<?= $r['pro_img'] ?>" class="card-img-top mt-3" alt="..."
                    style="border: 1px solid black; border-radius: 6px;" with="545px" height="250px">
                <div class="card-body">
                    <a href="detail.php?id=<?= $r['product_id'] ?>" class="text-decoration-none">
                        <h6 class="text-center" style="font-size: 15px; color: black;">
                            <?= $r['product_name'] ?>
                        </h6>
                    </a>

                    <p class="card-cost text-center mb-3" style="font-weight: bold; font-size: 30px;"><small
                            class="text-muted">
                            <?= $r['sale_price'] ?>
                        </small></p>
                </div>
                <button type="submit" name="btnAddToCart" class="btn btn-warning my-3"
                    onclick="location.href='cart.php?id=<?= $r['product_id'] ?>';">
                    Add to cart<i class="fas fa-shopping-cart"></i></a>
                </button>
            </div>

            <?php
        endforeach;
        ?>
    </div>
</div>
<?php
require_once('footer.php');
?>