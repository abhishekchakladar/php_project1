<?php
    $PRODUCT_NUMBER = 5;
    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
    $PREPARE_STATEMENT = $SQL_CON->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT ?,?');
    $PREPARE_STATEMENT->bindValue(1, ($current_page - 1) * $PRODUCT_NUMBER, PDO::PARAM_INT);
    $PREPARE_STATEMENT->bindValue(2, $PRODUCT_NUMBER, PDO::PARAM_INT);
    $PREPARE_STATEMENT->execute();
    $products = $PREPARE_STATEMENT->fetchAll(PDO::FETCH_ASSOC);
    $PRODUCT_COUNT = $SQL_CON->query('SELECT * FROM products')->rowCount();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Product</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="table_style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>The Book Store</h1>
            </div>
        </header>
        <main>

<div class="products content-wrapper">
    <h1>Products</h1>
    <p><?=$PRODUCT_COUNT?> Available Books</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($PRODUCT_COUNT > ($current_page * $PRODUCT_NUMBER) - $PRODUCT_NUMBER + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>
  </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; 2020, The Book Store</p>
            </div>
        </footer>
        
    </body>
</html>
