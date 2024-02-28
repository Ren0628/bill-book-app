let searchMonthForm = document.getElementById('search_month_form');
let searchMonthInput = document.getElementById('search_month_input');

searchMonthInput.addEventListener('change', ()=> {
    searchMonthForm.submit();
});