(function(){
    document.getElementById('mostrar').addEventListener('click', function() {
        var enlaces = document.querySelector('#ver');
        var enlaces2 = document.querySelector('#noVer');
        if (enlaces.style.display === 'none') {
          enlaces.style.display = 'block';
          enlaces2.style.display = 'none';
        } else {
          enlaces.style.display = 'none';
          enlaces2.style.display = 'block';
        }
      });
})();