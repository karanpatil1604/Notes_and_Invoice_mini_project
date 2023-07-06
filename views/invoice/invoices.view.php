<?php foreach ($invoices as $invoice): ?>

    <div class="g:w-1/2 mt-10 md:w-2/3 bg-indigo-500 rounded mx-auto flex flex-wrap -m-4 ">
        <div class="bg-opacity-75 pt-4 w-full rounded-lg overflow-hidden text-center relative flex justify-around">
            <div> <a class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    href="/invoice/update?id=<?= $invoice["user_id"] ?>">Update invoice</a></div>
            <div>
                <form action="/invoice" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="user_id" value="<?= $invoice['user_id'] ?>">
                    <input type="submit"
                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        type="button" value="Delete">

                </form>
            </div>

        </div>
        <div class="p-2 w-full">
            <div class="  bg-opacity-75 px-8 pt-4  rounded-lg overflow-hidden text-center relative">
                <h1 class="title-font sm:text-2xl text-xl font-medium text-white ">
                    <?= $invoice['user_name'] ?? "" ?>
                </h1>
                <h2 class="tracking-widest text-sm title-font font-medium text-white ">
                    <?= $invoice['email'] ?? "" ?>
                </h2>
            </div>
        </div>
        <?php foreach ($invoice["items"] as $item): ?>

            <div class="flex flex-wrap w-full ">

                <div class="xl:w-1/2 md:w-1/2  p-4 text-white">
                    <div class="border bg-indigo-400 border-gray-200 p-6 rounded-lg">
                        <div class="mb-2"><span class="font-medium">Item Name:</span>
                            <?= $item['item_name'] ?>
                        </div>
                        <div class="mb-2"><span class="font-medium">Quantity:</span>
                            <?= $item['quantity'] ?>
                        </div>
                        <div class="mb-2"><span class="font-medium">Price:</span>
                            <?= $item['price'] ?>
                        </div>
                        <div class=""><span class="font-medium">Subtotal:</span>
                            <?= $item['subtotal'] ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <div class="p-2 w-full">
            <div class="  bg-opacity-75 px-8 pb-4  rounded-lg overflow-hidden text-center relative">
                <h1 class="title-font sm:text-2xl text-xl font-medium text-white "> Total Amount
                    <?= $invoice["grand_total"] ?>
                </h1>
            </div>
        </div>
    </div>
<?php endforeach ?>
</div>