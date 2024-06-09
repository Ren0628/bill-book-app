let issuerFormInput = document.getElementById('issuer');
let receiverFormInput = document.getElementById('receiver');
let paymentAddressInput = document.getElementById('payment_address');
let paymentPlaceInput = document.getElementById('payment_place');
let amountFormInput = document.getElementById('amount');

let isEmpty = (obj) => {

    return Object.keys(obj).length === 0
}

let toHalfWidthStr = (str) => {

    str = str.replace(/[０-９]/g, (s)=>{
        return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
    });

    return str;
}

issuerFormInput.addEventListener('change', (e) => {
    
    fetch(apiUrl , {
        method:'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            issuer: e.target.value
        }),
    })
        .then((response) => response.json())
        .then((res) => {
            
            if(!isEmpty(res)) {
                receiverFormInput.value = res.receiver;
                paymentAddressInput.value = res.payment_address;
                paymentPlaceInput.value = res.payment_place;
            }
        })
        .catch((e) => {
            console.log(e);
        });
});

amountFormInput.addEventListener('change', (e) => {
    
    strAmount = new String(toHalfWidthStr(e.target.value)).replace(/,|￥|\uff0c/g, '');
    
    amountFormInput.value = Number(strAmount).toLocaleString('jp',{style:'currency',currency:'JPY'});
});