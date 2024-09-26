<?php $this->view("includes/header", $data); ?>

<section class="py-8">
    <div class="max-w-screen-xl px-4 mx-auto md:px-8">
        <h1 class="text-3xl font-bold text-gray-800">Cart</h1>
        
        <div class="grid gap-8 mt-6 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="pb-2 text-left">Product</th>
                            <th class="pb-2 text-left">Price</th>
                            <th class="pb-2 text-left">Quantity</th>
                            <th class="pb-2 text-left">Subtotal</th>
                            <th class="pb-2 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['cart_items'])): ?>
                            <?php foreach ($data['cart_items'] as $item): ?>
                                <tr class="border-b">
                                    <td><?php echo $item['name']; ?></td>
                                    <td>Rs <?php echo number_format($item['price'], 2); ?></td>
                                    <td><?php echo $item['quantity']; ?></td>
                                    <td>Rs <?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                    <td>
                                        <a href="/cart/remove/<?php echo $item['id']; ?>" class="text-red-500">Remove</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="py-4 text-center">Your cart is empty.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="p-6 bg-gray-100 rounded-lg">
                <h2 class="text-xl font-bold">Price Details</h2>
                <ul class="mt-4 space-y-2">
                    <?php $total = 0; ?>
                    <?php foreach ($data['cart_items'] as $item): ?>
                        <li class="flex justify-between">
                            <span><?php echo $item['name']; ?></span>
                            <span>Rs <?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                            <?php $total += $item['price'] * $item['quantity']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="mt-6 flex justify-between font-bold">
                    <span>Total Amount:</span>
                    <span>Rs <?php echo number_format($total, 2); ?></span>
                </div>
                <button class="w-full px-6 py-3 mt-4 text-white bg-black rounded-lg shadow-lg hover:bg-gray-800">Proceed to Checkout</button>
            </div>
        </div>
    </div>
</section>

<?php $this->view("includes/footer", $data); ?>
