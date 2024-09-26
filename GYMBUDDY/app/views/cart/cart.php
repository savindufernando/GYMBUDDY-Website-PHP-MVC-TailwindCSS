<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
</head>
<body>
    <h1 class="text-center">Your Shopping Cart</h1>

    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" width="50"></td>
                        <td>Rs <?php echo $item['price']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>Rs <?php echo $item['price'] * $item['quantity']; ?></td>
                        <td>
                            <form method="POST" action="<?php echo BASE_URL . '/removeFromCart'; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-total">
            <p>Total: Rs 
                <?php 
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['price'] * $item['quantity'];
                    }
                    echo $total;
                ?>
            </p>
        </div>
    <?php endif; ?>

    <a href="<?php echo BASE_URL; ?>/checkout" class="btn">Proceed to Checkout</a>
</body>
</html>
