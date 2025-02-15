



document.addEventListener('DOMContentLoaded', function (){

    loadFromLocalStorage()
    let add_button = document.querySelectorAll('.add-product')

    add_button.forEach(button => {
        button.addEventListener('click', function (event){
            event.preventDefault()

            const productID = button.getAttribute('data-id');
            const card = button.closest('.card');

            if(!card) return

            let naziv = card.querySelector('.name').innerText;
            let cena = card.querySelector('.price').innerText.replace(' RSD', "")

            const orderDetail = document.querySelector('.order-details')
            let existingRow = document.querySelector(`.order-item[data-id="${productID}"]`)

            if(existingRow){
                let qtyElement = existingRow.querySelector('.quantity')
                let priceElement = existingRow.querySelector('.product-price');
                let newQty =   parseInt(qtyElement.innerText) + 1
                qtyElement.innerText = newQty;
                let novaCena = parseFloat(cena) * parseInt(newQty)
                priceElement.innerText = (`${novaCena.toFixed(2)} RSD `)
                saveToLocalStorage()
            }else{
                const newItem = document.createElement('div');
                newItem.classList.add('order-item','d-flex','justify-content-between','p-2')
                newItem.setAttribute('data-id',productID)


                newItem.innerHTML = `
                    <p class="product-name">${naziv}</p>
                    <p class="product-price">${cena} RSD</p>
                    <p class="quantity">1</p>
                `
                orderDetail.appendChild(newItem);
                saveToLocalStorage()
            }
            
            updateTotalSum()

        })
    })
})

function saveToLocalStorage() {
    let orderItems = [];

    document.querySelectorAll('.order-item').forEach(item => {
        let productID = item.getAttribute('data-id'); 
        let naziv = item.querySelector('.product-name').innerText;
        let qty = parseInt(item.querySelector('.quantity').innerText);
        let price = parseFloat(item.querySelector('.product-price').innerText.replace(" RSD", ''));

        orderItems.push({
            productID: productID,
            naziv: naziv,
            qty: qty,
            price: price
        });
    });

    localStorage.setItem('orderItems', JSON.stringify(orderItems));
}
function loadFromLocalStorage() {
    let orderDetail = document.querySelector('.order-details');
    let storedItems = JSON.parse(localStorage.getItem('orderItems') || '[]');

    storedItems.forEach(item => {
        const newItem = document.createElement('div');
        newItem.classList.add('order-item', 'd-flex', 'justify-content-between', 'p-2');
        newItem.setAttribute('data-id', item.productID);

        newItem.innerHTML = `
            <p class="product-name">${item.naziv}</p>
            <p class="product-price">${item.price.toFixed(2)} RSD</p>
            <p class="quantity">${item.qty}</p>
        `;

        orderDetail.appendChild(newItem);
    });

    updateTotalSum();
}
let exitBtn = document.querySelector('.exit-btn')
exitBtn.addEventListener('click', function(){
    localStorage.removeItem('orderItems')
})

function updateTotalSum() {
    let sum = 0
    let priceElements = document.querySelectorAll('.order-item .product-price')

    priceElements.forEach(el => {
        sum += parseFloat(el.innerText.replace(' RSD',""))
    })

    let sumPriceEl = document.querySelector('.sum-price')

    sumPriceEl.innerText = `Total: ${sum.toFixed(2)} RSD`
}

let create_btn = document.querySelector('.create-btn')
create_btn.addEventListener('click', async function() {
    let orderItems = []
    let totalPriceText = document.querySelector('.sum-price').innerText
    let totalPrice = parseFloat(totalPriceText.replace("Total: ", "").replace(" RSD", ""))

    document.querySelectorAll('.order-item').forEach(item => {
        let productID = item.getAttribute('data-id'); 
        let qty = parseInt(item.querySelector('.quantity').innerText);
        let price = parseFloat(item.querySelector('.product-price').innerText.replace(" RSD", ''));


        orderItems.push({
            product_id: productID, 
            quantity: qty
        });
    });
    if(!orderItems.length) {
        alert('Narudžbina je prazna!');
        return;
    }
    console.log(totalPrice);
    console.log(orderItems);
    
    
    const sto_id = create_btn.getAttribute('data-sto-id');
    console.log(sto_id);
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    try {
        let response = await fetch('/narudzbinas', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type' : 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                sto_id : sto_id,
                iznos : totalPrice,
                items : orderItems
            })
        });
        
        let data =  await response.json()
        console.log('Server response:' ,data);
        

        if (data.success) {
            alert(data.message);
            window.location.href = data.redirect_url;
            localStorage.removeItem('orderItems')
            console.log("ID narudžbine:", data.narudzbina_id);
        } else {
            alert('Greska prilikom slanja podataka!');
        }
        
    } catch (error) {
        alert('Doslo je do greske');
        console.error(error);
    }
    
})




