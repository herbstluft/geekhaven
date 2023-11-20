(function(document) {
  'use strict';

  function filterProducts() {
    var input = document.getElementById('search-input');
    var rows = document.querySelectorAll('.table tbody tr');

    rows.forEach(function(row) {
      var productName = row.querySelector('td').textContent.toLowerCase();
      var val = input.value.toLowerCase();
      row.style.display = productName.includes(val) ? 'table-row' : 'none';
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('search-input');
    input.addEventListener('input', filterProducts);
  });
})(document);
