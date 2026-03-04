<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login - Sistem Manajemen Sepatu</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="login-body">
    <div class="d-flex flex-column min-vh-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">CIBADUYUT SHOES</a>

                <div class="d-flex align-items-center ms-auto gap-2">
                    <button id="btn-theme" class="btn btn-outline-light btn-sm">
                        Mode Gelap
                    </button>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 d-flex align-items-center justify-content-center">
            <div class="login-card card p-5">
                <div class="text-center mb-4">
                    <h3 class="mb-2">Login</h3>
                    <p class="text-muted">Masuk ke Sistem Manajemen Sepatu</p>
                </div>

                <?php if ($error === 'invalid'): ?>
                    <div class="alert alert-danger" role="alert">
                        Username atau Password salah!
                    </div>
                <?php endif; ?>

                <form method="POST" action="controller/proses_login.php">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control"
                            value="<?php echo $_COOKIE['username'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="remember" class="form-check-input">
                        <label class="form-check-label">Remember Me</label>
                    </div>

                    <button type="submit" class="btn btn-warning w-100">
                        Login
                    </button>

                    <div class="text-center mt-3">
                        <a href="index.php" class="text-secondary">Kembali ke Beranda</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-dark text-white text-center p-3 mt-auto">
            &copy; 2026 Sistem Manajemen Sepatu Toko Sepatu.
        </footer>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>