<?php
if (isset($_GET['id'])) {
    $PREPARE_STATEMENT = $SQL_CON->prepare('SELECT * FROM products WHERE id = ?');
    $PREPARE_STATEMENT->execute([$_GET['id']]);
    $product = $PREPARE_STATEMENT->fetch(PDO::FETCH_ASSOC);
   
    if (!$product) {
        die ('Product Unavailable');
    }
} 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Product</title>
		<link href="table_style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>The Book Store</h1>
          
            </div>
        </header>
        <main>

<div class="product content-wrapper">
    <img src="imgs/<?=$product['img']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            &dollar;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp"> $ <?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form action="index.php?page=orderconformation&id=<?=$product['id']?>" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['desc']?>
        </div>
    </div>
</div>

  </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; 2020, Book Store</p>
            </div>
        </footer>
    </body>
</html>
