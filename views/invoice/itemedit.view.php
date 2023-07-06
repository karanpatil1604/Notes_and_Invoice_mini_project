<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<div class="lg:w-1/2 md:w-2/3 mx-auto">
    <form action="/edit/item" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
        <div class="flex flex-wrap mt-4">
            <div class=" p-2 w-1/2">
                <div class="relative"><label for="item_name" class="leading-7 text-sm text-gray-600">Item
                        name</label><input type="text" id="item_name" name="item_name"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        value="<?= $item['item_name'] ?>" fdprocessedid="2e5i"></div>
            </div>
            <div class="p-2 w-1/2">
                <div class="relative"><label for="quantity" class="leading-7 text-sm text-gray-600">Item
                        Qty</label><input type="number" id="quantity" name="quantity" onblur="getTotal()" class=" w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                            focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base
                            outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        value="<?= $item['quantity'] ?>" fdprocessedid="9amg9f"></div>
            </div>
            <div class="p-2 w-1/3">
                <div class="relative"><label for="price" class="leading-7 text-sm text-gray-600">Item
                        Price</label><input type="number" id="price" name="price" onblur="getTotal()" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                        focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3
                        leading-8 transition-colors duration-200 ease-in-out" value="<?= $item['price'] ?>"
                        fdprocessedid="lelqzl"></div>
            </div>
            <div class="p-2 w-1/3">
                <div class="relative"><label for="subtotal" class="leading-7 text-sm text-gray-600">Total</label><input
                        type="number" readonly="" id="subtotal" name="subtotal"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        value="<?= $item['subtotal'] ?>" fdprocessedid="j0yj4"></div>
            </div>
            <div class="p-2 w-1/3">
                <a href="/invoice/update?id=<?= $item['user_id'] ?>"
                    class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update
                </button>
            </div>
        </div>
    </form>
</div>