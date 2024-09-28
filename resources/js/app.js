import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


//importar o InputMask
import Inputmask from 'inputmask';
//Acrescentar máscara no campo com o Inputmask
//DOMContentLoaded - dispara o evento quando o HTML foi completamente carregado
document.addEventListener('DOMContentLoaded', function() {

    var cpfMask = new Inputmask('999.999.999-99');
    cpfMask.mask(document.querySelector('.mask-cpf'));

    var phoneMask = new Inputmask('(99) 99999-9999');
    phoneMask.mask(document.querySelector('.mask-phone'));

    var whatsappMask = new Inputmask('(99) 99999-9999');
    whatsappMask.mask(document.querySelector('.mask-whatsapp'));
})
