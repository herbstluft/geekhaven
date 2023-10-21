(function(document) {
  'buscador';

  var LightTableFilter = (function(Arr) {
    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var cards = document.querySelectorAll('.col-sm-6');

      Arr.forEach.call(cards, function(card) {
        var productName = card.querySelector('.text-truncate').textContent.toLowerCase();
        var val = _input.value.toLowerCase();
        card.style.display = productName.indexOf(val) === -1 ? 'none' : 'block';
      });
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });
})(document);
