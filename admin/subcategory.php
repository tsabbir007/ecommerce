<?php
global $con;
include '../includes/config.php';
include 'header.php';
?>


<!-- Insert Subcategory -->
<div class="container mt-5">
    <h2 class="mb-4">Insert Subcategory</h2>
    <form id="insert_subcategory_form">
        <div class="form-group">
            <label for="subcategory_name">Subcategory Name:</label>
            <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                <!-- Assuming you have fetched categories from the database -->
                <?php
                // Fetching categories from the database
                $fetch_categories_query = "SELECT * FROM category";
                $result = mysqli_query($con, $fetch_categories_query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Insert by ajax -->
<script>
    $(document).ready(function() {
        $('#insert_subcategory_form').submit(function(e) {
            e.preventDefault();
            var subcategoryName = $('#subcategory_name').val();
            var categoryId = $('#category_id').val();

            $.ajax({
                type: 'POST',
                url: 'crud/insert_subcategory.php',
                data: {
                    subcategory_name: subcategoryName,
                    category_id: categoryId
                },
                success: function(response) {
                    alert(response);
                    $('#subcategoriesContainer').load(location.href + ' #subcategoriesContainer');
                }
            });
        });
    });

</script>

<!-- Showing All Existing Subcategories -->
<div id="subcategoriesContainer" class="container mt-5">
    <h2 class="mb-4">All Subcategories</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Subcategory Name</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetching all subcategories from the database
        $fetch_subcategories_query = "SELECT sub_category.id, sub_category.name, category.name as category_name FROM sub_category JOIN category ON sub_category.category_id = category.id";
        $result = mysqli_query($con, $fetch_subcategories_query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['category_name']."</td>";
            echo "<td>
                    <button type='button' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editSubcategoryModal' data-subcategory-id='".$row['id']."' data-subcategory-name='".$row['name']."' data-category-id='".$row['category_id']."'>Edit</button>
                    <button type='button' class='btn btn-danger delete-btn' data-subcategory-id='".$row['id']."'>Delete</button>
                </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="editSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="editSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubcategoryModalLabel">Edit Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="subcategory_id" id="edit_subcategory_id">
                <div class="modal-body
                ">
                    <div class="form-group
                    ">
                        <label for="edit_subcategory_name">Subcategory Name:</label>
                        <input type="text" class="form-control" id="edit_subcategory_name" name="edit_subcategory_name" required>
                    </div>
                    <div class="form-group
                    ">
                        <label for="edit_category_id">Category:</label>
                        <select class="form-control" id="edit_category_id" name="edit_category_id" required>
                            <option value="">Select Category</option>
                            <?php
                            // Fetching categories from the database
                            $fetch_categories_query = "SELECT * FROM category";
                            $result = mysqli_query($con, $fetch_categories_query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer
                ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Subcategory by ajax -->
<script>
    $(document).ready(function() {
        $('#editSubcategoryModal form').submit(function(e) {
            e.preventDefault();
            var subcategoryId = $('#edit_subcategory_id').val();
            var subcategoryName = $('#edit_subcategory_name').val();
            var categoryId = $('#edit_category_id').val();

            $.ajax({
                type: 'POST',
                url: 'crud/edit_subcategory.php',
                data: {
                    subcategory_id: subcategoryId,
                    subcategory_name: subcategoryName,
                    category_id: categoryId
                },
                success: function(response) {
                    alert(response);
                    window.location.reload();
                }
            });
        });
    });

</script>

<!-- Delete Subcategory by ajax -->
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var subcategoryId = $(this).data('subcategory-id');
            if (confirm('Are you sure you want to delete this subcategory?')) {
                $.ajax({
                    type: 'POST',
                    url: 'crud/delete_subcategory.php',
                    data: {
                        subcategory_id: subcategoryId
                    },
                    success: function(response) {
                        // alert(response);
                       window.location.reload();
                    }
                });
            }
        });
    });

</script>


<?php include 'footer.php'; ?>
