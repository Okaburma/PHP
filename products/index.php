<?php
require_once "../controller/productController.php";

$controller = new productController();
$products = $controller->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-300">
    <div class="flex justify-between my-5">
        <h1>Product Table</h1>
        <div class="mr-5">
            <a href="/products/create.php" class="bg-green-700 rounded shadow-xl py-2 px-5 text-white">ADD +</a>
        </div>
    </div>
    <!-- ================Tailwindcss Table================================= -->
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-orange-300 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created_at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Updated_at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product):?>
                <tr class="border-b bg-orange-100 border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->name; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->price; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->stock; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->category; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->created_at; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->updated_at; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <!--  =========Post method to destroy.php======== -->
                       <!-- <form action="destroy.php" class="" method="POST">
                            <input type="hidden" name="id" class="text-gray-900" value="?php echo $product->id; ?>">
                            <button class="px-5 py-2 rounded-md bg-red-600 text-white">Delete</button>
                       </form> -->
                        <!-- =======Get method to destroy.php=========== -->
                        <a href="/products/edit.php?id=<?php echo $product->id;?>" class="px-5 py-2 rounded-md bg-blue-600 text-white">Edit</a>
                        <a href="/products/destroy.php?id=<?php echo $product->id;?>" class="px-5 py-2 rounded-md bg-red-600 text-white">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>


