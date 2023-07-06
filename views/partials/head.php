<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        var tableRows = [];
        var itemTable = document.getElementById('itemTable');
        var id = 0;

        function getTotal() {
            let price = Number(document.getElementById("price").value);
            let quantity = Number(document.getElementById('quantity').value);
            document.getElementById('subtotal').value = price * quantity;
        }
        // function changeDisplay() {
        //     if (!tableRows.length) {
        //         itemTable.style.display = "none";
        //     }
        // }

        function pushElement() {

            let i_name = document.getElementById('item_name').value;
            let price = Number(document.getElementById("price").value);
            let quantity = Number(document.getElementById('quantity').value);
            let subtotal = Number(document.getElementById('subtotal').value);

            let tableRow = {
                "row_id": id,
                "item_name": i_name,
                "price": price,
                "quantity": quantity,
                "subtotal": subtotal
            };
            id++;
            tableRows.push(tableRow);
            addRow(tableRow);

        }


        function addRow(row) {

            let table = document.getElementById('itemTable');
            let tr = document.createElement('tr');
            tr.id = id;
            let t1 = document.createTextNode(row['item_name']);
            let t2 = document.createTextNode(row['quantity']);
            let t3 = document.createTextNode(row['price']);
            let t4 = document.createTextNode(row['subtotal']);


            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');
            let td4 = document.createElement('td');
            let td5 = document.createElement('td');

            td1.className = "border-t-2 border-gray-200 px-4 py-3";
            td2.className = "border-t-2 border-gray-200 px-4 py-3";
            td3.className = "border-t-2 border-gray-200 px-4 py-3";
            td4.className = "border-t-2 border-gray-200 px-4 py-3";
            td5.className = "border-t-2 border-gray-200 px-4 py-3";

            td1.appendChild(t1);
            td2.appendChild(t2);
            td3.appendChild(t3);
            td4.appendChild(t4);
            td5.innerHTML = `<input style="cursor:pointer;"
                                        onclick="removeRow(${id})"
                                        class="flex mx-auto text-white bg-red-600 border-0  focus:outline-none  rounded text-sm py-2 px-2"
                                        type="button" value="Delete">`;
            td5.id = id;
            // td5.onclick = removeRow;
            td5.classList.add("delete-button")
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);

            table.appendChild(tr);
        }

        function removeRow(i) {

            let row = document.getElementById(i);
            row.remove();


        }



        function calculateTotal() {
            var quantity = parseFloat(document.getElementById("quantity").value);
            var price = parseFloat(document.getElementById("price").value);

            if (isNaN(quantity) || isNaN(price)) {
                document.getElementById("subtotal").textContent = "0";
            } else {
                var total = quantity * price;
                document.getElementById("subtotal").textContent = total.toFixed(2);
            }
        }




        function submitForm() {
            var table = document.getElementById("itemTable");
            var form = document.getElementById("itemForm");
            var dataInput = document.getElementById("tableData");
            var rows = table.rows;
            var data = [];
            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].cells;
                var rowData = [];

                // Iterate through each cell in the row
                for (var j = 0; j < cells.length; j++) {
                    rowData.push(cells[j].innerText);
                }

                data.push(rowData);
            }

            dataInput.value = JSON.stringify(data);

            // Submit the form
            return true;
        };
        ;

    </script>
</head>

<body class="h-full">

    <div class="min-h-full">