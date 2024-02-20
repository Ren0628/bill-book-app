let issueDateForm = document.getElementById('issue_date');

window.onload = () => {
    let today = new Date();
    today.setDate(today.getDate());
    let yyyy = today.getFullYear();
    let mm = ('0' + (today.getMonth() + 1)).slice(-2);
    let dd = ('0' + (today.getDate())).slice(-2);
    issueDateForm.value = yyyy + '-' + mm + '-' + dd;
}