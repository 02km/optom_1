document.addEventListener('DOMContentLoaded', () => {
    fetchProducts('all');

    window.filterProducts = (brand) => {
        fetchProducts(brand);
    };

    function fetchProducts(brand) {
        fetch(`get_products.php?brand=${brand}`)
            .then(response => response.json())
            .then(products => {
                const productList = document.getElementById('product-list');
                productList.innerHTML = '';

                if (products.length > 0) {
                    products.forEach(product => {
                        const productItem = document.createElement('div');
                        productItem.classList.add('product-item');

                        const productImage = document.createElement('img');
                        productImage.src = product.images_url.replace(/\\/g, '/'); // Adjust the path if necessary
                        productImage.alt = product.name;

                        const productName = document.createElement('h3');
                        productName.textContent = product.name;

                        const productBrand = document.createElement('p');
                        productBrand.textContent = `Brand: ${product.brand}`;

                        const productPrice = document.createElement('p');
                        productPrice.textContent = `Price: $${product.selling_price.toFixed(2)}`;

                        productItem.appendChild(productImage);
                        productItem.appendChild(productName);
                        productItem.appendChild(productBrand);
                        productItem.appendChild(productPrice);

                        productList.appendChild(productItem);
                    });
                } else {
                    productList.innerHTML = '<p>No products found.</p>';
                }
            })
            .catch(error => console.error('Error fetching products:', error));
    }
});
