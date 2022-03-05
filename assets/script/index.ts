/*
Gabut doang pake ts h3h3 
Script ini hanya digunakan untuk membuat posisi footer dibawah tanpa terlalu bawah 
script ini dicompile ke ./javascript/index.js
*/

document.addEventListener('DOMContentLoaded', () => {
    const formCard: HTMLDivElement | null = document.querySelector('.card');
    const table: HTMLTableElement | null = document.querySelector('table');
    if ( formCard != null ){
        if(formCard.offsetHeight > 500) return formCard.style.marginBottom = '100px';
        return formCard.style.marginBottom = '225px';
    }

    if( table != null ){
        if(table.offsetHeight > 500) return table.style.marginBottom = '100px';
        return table.style.marginBottom = '330px';
    }

    return document.querySelector('.footer')?.classList.add('fixed-bottom');
});