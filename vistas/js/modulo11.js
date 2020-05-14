$(window).on('load', function() {

    function nitIsValid(nit) {
        if (!nit) {
            return true;
        }

        var nitRegExp = new RegExp('^[0-9]+(-?[0-9kK])?$');

        if (!nitRegExp.test(nit)) {
            return false;
        }

        nit = nit.replace(/-/, '');
        var ultimoCaracter = nit.length - 1;
        var numero = nit.substring(0, ultimoCaracter);
        var verificadorEsperado = nit.substring(ultimoCaracter, ultimoCaracter + 1).toLowerCase();

        var factor = numero.length + 1;
        var total = 0;

        for (var i = 0; i < numero.length; i++) {
            var caracter = numero.substring(i, i + 1);
            var digito = parseInt(caracter, 10);

            total += (digito * factor);
            factor = factor - 1;
        }

        var modulo = (11 - (total % 11)) % 11;
        var verificador = (modulo == 10 ? "k" : modulo.toString());

        return verificadorEsperado === verificador;
    }

    $('#nit').bind('change paste keyup', function (e) {
        var $this = $(this);
        var $parent = $this.parent();
        var $next = $this.next();
        var nit = $this.val();

        if (nit && nitIsValid(nit)) {
            $parent.removeClass('has-error');
            $next.removeClass('glyphicon-remove');
        } else if (nit) {
            $parent.addClass('has-error');
            $next.addClass('glyphicon-remove');        
        } else {
            $parent.removeClass('has-error');
            $next.removeClass('glyphicon-remove');
        }
    });
});