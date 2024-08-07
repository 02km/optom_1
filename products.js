document.querySelector('select').addEventListener('change', function() {
    var url = this.value + '?order=' + document.querySelector('.selected-order').textContent;
    window.location.href = url;
});

document.querySelectorAll('button').forEach(function(button) {
    button.addEventListener('click', function() {
        document.querySelector('.selected-order').textContent = this.textContent === 'Sort Ascending'? 'ASC' : 'DESC';
        var url = 'get_products.php?brand=' + document.querySelector('select').value + '&order=' + this.textContent;
        window.location.href = url;
    });
});
