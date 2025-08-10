function toggleLangDropdown() {
  var list = document.querySelector('.lang-list');
  list.style.display = (list.style.display === 'block') ? 'none' : 'block';
}

function updateProducts() {
  fetch('main.php?ajax=1')
    .then(function(response) { return response.text(); })
    .then(function(html) {
      var container = document.getElementById('product-container');
      if (container) {
        container.innerHTML = html;
      }
    })
    .catch(function(err) { console.error('Error fetching products:', err); });
}

setInterval(updateProducts, 10000);

