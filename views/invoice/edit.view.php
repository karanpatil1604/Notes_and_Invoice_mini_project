<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<div class="container px-5 py-6 mx-auto">
    <div class="flex flex-col text-center w-full mb-2">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit Invoice</h1>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="/invoice" id='itemForm'>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-full">
                    <div class="relative"><label for="name" class="leading-7 text-sm text-gray-600">
                            Name</label><input type="text" value="<?= $user['name'] ?>" id="name" name="name"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative"><label for="email" class="leading-7 text-sm text-gray-600">Email</label><input
                            type="email" value="<?= $user['email'] ?>" id="email" name="email"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" "></div>
                </div>

                <div class=" p-2 w-1/2">
                        <div class="relative"><label for="item_name" class="leading-7 text-sm text-gray-600">Item
                                name</label><input type="text" id="item_name" name="item_name"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                value="" fdprocessedid="2e5i"></div>
                    </div>
                    <div class="p-2 w-1/2">
                        <div class="relative"><label for="quantity" class="leading-7 text-sm text-gray-600">Item
                                Qty</label><input type="number" id="quantity" name="quantity" onblur="getTotal()" class=" w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                            focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base
                            outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                value="" fdprocessedid="9amg9f"></div>
                    </div>
                    <div class="p-2 w-1/3">
                        <div class="relative"><label for="price" class="leading-7 text-sm text-gray-600">Item
                                Price</label><input type="number" id="price" name="price" onblur="getTotal()" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                        focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3
                        leading-8 transition-colors duration-200 ease-in-out" value="" fdprocessedid="lelqzl"></div>
                    </div>
                    <div class="p-2 w-1/3">
                        <div class="relative"><label for="subtotal"
                                class="leading-7 text-sm text-gray-600">Total</label><input type="number" readonly=""
                                id="subtotal" name="subtotal"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                value="0" fdprocessedid="j0yj4"></div>
                    </div>
                    <div class="p-2 w-1/3">
                        <button
                            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                            type="button" onclick="pushElement()">Add Item</button>
                        <!-- <div class="relative"><button onclick="addItem()"
                            class=" w-full mt-7 mx-auto text-center text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                            fdprocessedid="57zzl">Add Item</button></div> -->
                    </div>

                    <table class="table-auto w-full text-left whitespace-no-wrap" id="itemTable">

                        <tr>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                Item Name</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Qty</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Price</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Sub Total</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Action</th>
                        </tr>

                        <?php foreach ($items as $item): ?>
                            <tr id=<?= 'old_' . $item['item_id'] ?>>
                                <td class="border-t-2 border-gray-200 px-4 py-3" id="tn_<?= $item['item_id'] ?>">
                                    <?= $item['item_name'] ?>
                                </td>
                                <td class="border-t-2 border-gray-200 px-4 py-3" id="q_<?= $item['item_id'] ?>">
                                    <?= $item['quantity'] ?>
                                </td>
                                <td class="border-t-2 border-gray-200 px-4 py-3" id="p_<?= $item['item_id'] ?>">
                                    <?= $item['price'] ?>
                                </td>
                                <td class="border-t-2 border-gray-200 px-4 py-3" id="tn_<?= $item['item_id'] ?>">
                                    <?= $item['subtotal'] ?>
                                </td>
                                <td class="border-t-2 border-gray-200 px-4 py-3 flex flex-row">

                                    <a href="/edit/item?id=<?= $item['item_id'] ?>"
                                        class="flex mx-auto text-white bg-green-600 border-0  focus:outline-none  rounded text-sm py-2 px-2"
                                        style="cursor:pointer;" type="button" value="Edit"
                                        id="save_<?= $item['item_id'] ?>">Edit</a> <input style="cursor:pointer;"
                                        onclick="removeRow('<?= 'old_' . $item['item_id'] ?>')"
                                        class="flex mx-auto text-white bg-red-600 border-0  focus:outline-none  rounded text-sm py-2 px-2"
                                        type="button" value="Delete">
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <input type="hidden" name="itemTable" id="tableData">
                    <input type="submit" value="Update Invoice" onclick="submitForm()"
                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                </div>
        </form>
    </div class='container px-5 py-10 mx-auto'>