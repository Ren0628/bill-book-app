let searchMonthForm = document.getElementById('search_month_form');
let searchMonthInput = document.getElementById('search_month_input');
let warekiElement = document.getElementById('wareki');

searchMonthInput.addEventListener('change', ()=> {
    searchMonthForm.submit();
});

let date = new Date(searchMonthInput.value.substr(0, 4));
let wareki = new Intl.DateTimeFormat('ja-JP-u-ca-japanese', {era: 'narrow'}).format(date).substring(0, 3);
wareki = wareki.replace('/', '') + '年';

window.onload = () => {
    warekiElement.textContent = wareki;
}