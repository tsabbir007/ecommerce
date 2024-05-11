<?php
global $con;
include 'common/header.php';
include 'common/nav.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $insert_user_query = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
    $result = mysqli_query($con, $insert_user_query);

    if ($result) {
        header('Location: sign-in.php');
    } else {
        echo "Error creating user.";
    }
}
?>

<!-- SIGN up -->

<div class="page-holder d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="mt-5">Sign up to your account</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="h4">Sign up</h2>
                        <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <form action="sign-up.php" method="POST">
                            <div class="mb-3">
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark" type="submit">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'common/footer.php' ?>
