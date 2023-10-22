<?php
//goi noi dung
require_once('header.php');
include_once('connect.php');
$c = new Connect();
//goi ham
$dbLink = $c->connectToMySQL();
$sql = 'SELECT * FROM product';
//thuc hien truy van
$re = $dbLink->query($sql);

if ($re->num_rows > 0) {
    ?>

    <div class="container">
        <div class="row mx-auto">
            <?php
            while ($row = $re->fetch_assoc()) {
                ?>
                <div class="card mb-3 col-3 mx-auto my-3" style="width: 18rem;">
                    <img src="img/<?= $row['pro_img'] ?>" class="card-img-top mt-3" alt="..."
                        style="border: 1px solid black; border-radius: 6px;" with="545px" height="250px">
                    <div class="card-body">

                        <a href="detail.php?id=<?= $row['product_id'] ?>" class="text-decoration-none">
                            <h6 class="text-center" style="font-size: 15px; color: black;">
                                <?= $row['product_name'] ?>
                            </h6>
                        </a>

                        <p class="card-cost text-center mb-3" style="font-weight: bold; font-size: 30px;"><small
                                class="text-muted">
                                <?= $row['sale_price'] ?>&#8363;
                            </small></p>
                    </div>
                </div>
                <?php
            } //while
} //if
?>
    </div>
</div>

<?php
require_once('footer.php');
?>