<?php
global $con;
include '../includes/config.php';
include 'header.php';
?>

<!--Insert Category-->
<div class="container mt-5">
    <h2 class="mb-4">Insert Category</h2>
    <form id="insert_category_form">
        <div class="form-group">
            <label for="category_name">Category Name:</label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
        </div>
        <!--upload image-->
        <div class="form-group">
            <label for="category_image">Category Image:</label>
            <input type="text" class="form-control" id="category_image" name="category_image" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!--Insert by ajax-->
<script>
    $(document).ready(function() {
        $('#insert_category_form').submit(function(e) {
            e.preventDefault();
            var categoryName = $('#category_name').val();
            var categoryImage = $('#category_image').val();

            $.ajax({
                type: 'POST',
                url: './crud/insert_category.php',
                data: {
                    category_name: categoryName,
                    category_image: categoryImage
                },
                success: function(response) {
                    // alert(response);
                    location.reload(); // Reload the page to see updated data
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    });
</script>

<!--Showing All Existing Category-->
<div class="container mt-5">
    <h2 class="mb-4">All Categories</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetching all categories from the database
        $fetch_categories_query = "SELECT * FROM category";
        $result = mysqli_query($con, $fetch_categories_query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td><img src='../assets/images/" . $row['image_url'] . "' width='100' height='100'></td>";
            echo "<td>
                    <button type='button' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editCategoryModal' data-category-id='" . $row['id'] . "' data-category-name='" . $row['name'] . "' data-category-image='" . $row['image_url'] . "'>Edit</button>
                    <button type='button' class='btn btn-danger delete-btn' data-category-id='" . $row['id'] . "'>Delete</button>
                </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="edit_category_name">Category Name:</label>
                        <input type="text" class="form-control" id="edit_category_name" name="edit_category_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_category_image">Category Image:</label>
                        <input type="text" class="form-control" id="edit_category_image" name="edit_category_image" required>
                    </div>
                    <input type="hidden" id="edit_category_id" name="edit_category_id">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var categoryId = $(this).data('category-id');
            var categoryName = $(this).data('category-name');
            var categoryImage = $(this).data('category-image');

            $('#edit_category_id').val(categoryId);
            $('#edit_category_name').val(categoryName);
            $('#edit_category_image').val(categoryImage);
        });

        $('#editCategoryForm').submit(function(e) {
            e.preventDefault();
            var categoryId = $('#edit_category_id').val();
            var categoryName = $('#edit_category_name').val();
            var categoryImage = $('#edit_category_image').val();

            $.ajax({
                type: 'POST',
                url: './crud/edit_category.php',
                data: {
                    category_id: categoryId,
                    category_name: categoryName,
                    category_image: categoryImage
                },
                success: function(response) {
                    // alert(response);
                    location.reload(); // Reload the page to see updated data
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    });
</script>


<!--Delete Category-->
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var categoryId = $(this).data('category-id');
            var confirmDelete = confirm('Are you sure you want to delete this category?');
            if (confirmDelete) {
                $.ajax({
                    type: 'POST',
                    url: './crud/delete_category.php',
                    data: {
                        category_id: categoryId
                    },
                    success: function(response) {
                        // alert(response);
                        location.reload(); // Reload the page to see updated data
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            }
        });
    });
</script>


<?php include 'footer.php'; ?>
