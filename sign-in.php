<?php
global $con;
include './common/header.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $fetch_user_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $fetch_user_query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['user'] = $row;
    } else {
        echo "Invalid username or password.";
    }
}
include './common/nav.php';
?>

<div class="page-holder d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="mt-5">Sign in to your account</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="h4">Sign in</h2>
                        <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <form action="sign-in.php" method="POST">
                            <div class="mb-3">
                                <input class="form-control" type="text" name="username" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- if user don't have account -->
        <div class="row align-items-center py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="mt-5">Don't have an account?</h1>
                <a href="sign-up.php" class="btn btn-dark">Sign up</a>
            </div>
        </div>
    </div>
</div>

<?php include './common/footer.php' ?>