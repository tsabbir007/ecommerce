<?php
global $con;
include '../includes/config.php';
include 'header.php';
?>
<div class="container-fluid row p-5">
    <div class="col-12 col-md-3">
        <h2 class="mb-4">Insert Product</h2>
        <form id="insert_product_form">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL:</label>
                <input type="text" class="form-control" id="image_url" name="image_url">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category_id" required
                        onchange="fetchSubcategories(this.value)">
                    <option value="">Select Category</option>
                    <!-- Assuming you have fetched categories from the database -->
                    <?php
                    // Your PHP code to fetch categories from the database and populate the dropdown goes here
                    $fetch_categories_query = "SELECT * FROM category";
                    $result = mysqli_query($con, $fetch_categories_query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subcategory">Subcategory:</label>
                <select class="form-control" id="subcategory" name="sub_category_id" required>
                    <option value="">Select Subcategory</option>
                </select>
            </div>

            <script>
                function fetchSubcategories(categoryId) {
                    var subcategorySelect = document.getElementById('subcategory');
                    subcategorySelect.innerHTML = '<option value="">Loading...</option>';

                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'crud/fetch_subcategories.php?category_id=' + categoryId, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                var subcategories = JSON.parse(xhr.responseText);
                                subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
                                subcategories.forEach(function (subcategory) {
                                    var option = document.createElement('option');
                                    option.value = subcategory.id;
                                    option.textContent = subcategory.name;
                                    subcategorySelect.appendChild(option);
                                });
                            } else {
                                console.error('Error fetching subcategories: ' + xhr.status);
                                subcategorySelect.innerHTML = '<option value="">Error Fetching Subcategories</option>';
                            }
                        }
                    };
                    xhr.send();
                }
            </script>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Submitting the form using AJAX -->
    <script>
        $(document).ready(function () {
            $('#insert_product_form').submit(function (e) {
                e.preventDefault();
                var name = $('#name').val();
                var price = $('#price').val();
                var quantity = $('#quantity').val();
                var description = $('#description').val();
                var image_url = $('#image_url').val();
                var category_id = $('#category').val();
                var sub_category_id = $('#subcategory').val();

                $.ajax({
                    type: 'POST',
                    url: 'crud/insert_product.php',
                    data: {
                        name: name,
                        price: price,
                        quantity: quantity,
                        description: description,
                        image_url: image_url,
                        category_id: category_id,
                        sub_category_id: sub_category_id
                    },
                    success: function (response) {
                        // alert(response);
                        location.reload(); // Reload the page to see updated data
                    },
                    error: function (xhr, status, error) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>

    <!-- showing the product in the admin panel -->
    <div class="col-12 col-md-9">
        <h2 class="mb-4">Products</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <!--                <th>Image</th>-->
                <th>Category</th>
                <th>Subcategory</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $fetch_products_query = "SELECT * FROM products";
            $result = mysqli_query($con, $fetch_products_query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td style='max-width: 20px;'>" . $row['description'] . "</td>";
                echo "<td><img src='../assets/images/" . $row['image_url'] . "' alt='Product Image' style='max-width: 100px;'></td>";

                // Fetching category name based on category ID
                $category_id = $row['category_id'];
                $fetch_category_query = "SELECT name FROM category WHERE id = '$category_id'";
                $category_result = mysqli_query($con, $fetch_category_query);
                $category_row = mysqli_fetch_assoc($category_result);
                $category_name = $category_row['name'];

                echo "<td>" . $category_name . "</td>";

                // Fetching subcategory name based on subcategory ID
                $sub_category_id = $row['sub_category_id'];
                $fetch_subcategory_query = "SELECT name FROM sub_category WHERE id = '$sub_category_id'";
                $subcategory_result = mysqli_query($con, $fetch_subcategory_query);
                $subcategory_row = mysqli_fetch_assoc($subcategory_result);
                $subcategory_name = $subcategory_row['name'];

                echo "<td>" . $subcategory_name . "</td>";
                // Add edit and delete buttons here

                echo "<td class='flex'>
                    <button type='button' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editProductModal' data-product-id='" . $row['id'] . "' data-product-name='" . $row['name'] . "' data-product-price='" . $row['price'] . "' data-product-description='" . $row['description'] . "' data-product-image-url='" . $row['image_url'] . "' data-product-category-id='" . $row['category_id'] . "' data-product-subcategory-id='" . $row['sub_category_id'] . "'>Edit</button>
                    <button type='button' class='btn btn-danger delete-btn' data-product-id='" . $row['id'] . "'>Delete</button>
                    
                </td>";

                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Delete product -->

<script>
    $(document).ready(function () {
        $('.delete-btn').click(function () {
            var productId = $(this).data('product-id');
            var confirmation = confirm('Are you sure you want to delete this product?');
            if (confirmation) {
                $.ajax({
                    type: 'POST',
                    url: 'crud/delete_product.php',
                    data: {
                        product_id: productId
                    },
                    success: function (response) {
                        // alert(response);
                        location.reload(); // Reload the page to see updated data
                    },
                    error: function (xhr, status, error) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            }
        });
    });
</script>



