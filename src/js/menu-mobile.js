(function() {
  document.getElementById('mostrar').addEventListener('click', function() {
      var enlaces = document.querySelector('.header__barra');
      var enlaces2 = document.querySelector('#noVer');
      if (enlaces.style.display === 'block') {
          enlaces.style.display = 'none';
          enlaces2.style.display = 'block';
      } else {
          enlaces.style.display = 'block';
          enlaces2.style.display = 'none';
      }
      
  });
})();