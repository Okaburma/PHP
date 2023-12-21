<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   <div class="w-[40%] mx-auto shadow-lg py-5 my-12">
        <h1 class="text-center">Create Products</h1>
        <form action="/products/store.php" class="w-[90%] mx-auto" method="POST">
            <div class="my-3">
                <label for="name" class="">Name</label>
                <input required type="text" name="name" class="w-full border-2 border-blue-600 px-5 py-2">
            </div>
            <div class="my-3">
                <label for="price" class="">Price</label>
                <input required type="number" name="price" class="w-full border-2 border-blue-600 px-5 py-2">
            </div>
            <div class="my-3">
                <label for="stock" class="">Stock</label>
                <input required type="number" name="stock" class="w-full border-2 border-blue-600 px-5 py-2">
            </div>
            <div class="my-3">
                <label for="category" class="">Category</label>
                <input required type="text" name="category" class="w-full border-2 border-blue-600 px-5 py-2">
            </div>
            <!-- ======Save & Back Buttons=========== -->
            <button class="w-full py-2 bg-blue-600 text-white my-3 rounded">Save</button>
            <div class="my-2 py-2 w-full bg-gray-800 text-white text-center">
                <a href="index.php" class="">Back</a>
            </div>
        </form>
   </div>
</body>
</html>