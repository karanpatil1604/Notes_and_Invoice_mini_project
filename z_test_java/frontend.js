

function getTotal() {
    let price = Number(document.getElementById("price").value);
    let quantity = Number(document.getElementById('quantity').value);
    document.getElementById('subtotal').value = price * quantity;
}

let table = document.getElementById('itemTable');
if (table.body.length < 1) {
    table.style.display = none;
}


function addItem() {

    let i_name = document.getElementById('item_name').value;
    let price = Number(document.getElementById("price").value);
    let quantity = Number(document.getElementById('quantity').value);
    let subtotal = Number(document.getElementById('subtotal').value);

    let table = document.getElementById('itemTable');

    let tbody = document.createElement("tbody");
    let tr = document.createElement('tr');
    let td = document.createElement('td');
    td.className
    tr.appendChild(document.createElement('td').textContent(i_name).className("border-t-2 border-gray-200 px-4 py-3"));
    tr.appendChild(document.createElement('td').textContent(price).className("border-t-2 border-gray-200 px-4 py-3"));
    tr.appendChild(document.createElement('td').textContent(quantity).className("border-t-2 border-gray-200 px-4 py-3"));
    tr.appendChild(document.createElement('td').textContent(subtotal).className("border-t-2 border-gray-200 px-4 py-3"));


    tbody.appendChild(tr);
    table.append



}