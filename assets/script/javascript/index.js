"use strict";
document.addEventListener('DOMContentLoaded', () => {
    var _a;
    const formCard = document.querySelector('.card');
    const table = document.querySelector('table');
    if (formCard != null) {
        if (formCard.offsetHeight > 500)
            return formCard.style.marginBottom = '100px';
        return formCard.style.marginBottom = '225px';
    }
    if (table != null) {
        if (table.offsetHeight > 500)
            return table.style.marginBottom = '100px';
        return table.style.marginBottom = '330px';
    }
    return (_a = document.querySelector('.footer')) === null || _a === void 0 ? void 0 : _a.classList.add('fixed-bottom');
});
