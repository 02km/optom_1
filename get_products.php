<div class="products-container">
    <?php if (count($products) > 0): ?>
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-grid-item">
                    <?php
                    $image_path = '/optom_1/' . $product['images_url'];
                    $image_path = str_replace(' ', '%20', $image_path); // Encode spaces in the URL
                    ?>
                    <div class="image-box">
                        <img src="<?php echo $image_path; ?>" alt="Image" onclick="openModal('<?php echo $image_path; ?>')">
                    </div>
                    <div class="product-details">
                        <h4><?php echo htmlspecialchars($product['name']); ?></h4> <!-- Product Name -->
                        <h6><?php echo htmlspecialchars($product['brand']); ?></h6> <!-- Brand -->
                        <h8><?php echo htmlspecialchars($product['group_name']); ?></h8> <!-- Group Name -->
                        <h6>Price: R <?php echo htmlspecialchars($product['selling_price']); ?></h6> <!-- Price -->
                        <button>Add to Cart</button> <!-- Add to Cart Button -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>
