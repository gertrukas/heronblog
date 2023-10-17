
(function (cash) {
    "use strict";

    cash(window).on('redirectAction', (event) => {
        window.open(`${event.detail}`, '_blank');
    })

    window.roundNumber = (value, decimals) => {
        return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
    }
    
    window.money = (number, locales = 'es', options = {}) => {
        return Number(number).toLocaleString('es', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'MXM',
            ...options
        });
    }
    window.viewer = (number, locales = 'es', options = {}) => {
        return number + ' Vistas';
    }

    
})(cash);


