

(function() {
    document.getElementById('paraSession').addEventListener('click', function() {
        var navEnlaces = document.querySelectorAll('.nav__enlace');
        var enlaces = document.querySelector('.enlaces');
        if (enlaces.style.display === 'none') {
        enlaces.style.display = 'flex';
        for (var i = 0; i < navEnlaces.length; i++) {
            navEnlaces[i].style.display = 'none';
        }
        } else {
        enlaces.style.display = 'none';
        for (var i = 0; i < navEnlaces.length; i++) {
            navEnlaces[i].style.display = 'block';
        }
        }
    });

    })();
