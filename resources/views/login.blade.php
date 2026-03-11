<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login - Sistem Manajemen Sepatu</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body class="login-body">
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">CIBADUYUT SHOES</a>

                <div class="d-flex align-items-center ms-auto gap-2">
                    <button id="btn-theme" class="btn btn-outline-light btn-sm">
                        Mode Gelap
                    </button>
                </div>
            </div>
        </nav>

        <div class="flex-grow-1 d-flex align-items-center justify-content-center">
            <div class="login-card card p-5">
                <div class="text-center mb-4">
                    <h3 class="mb-2">Login</h3>
                    <p class="text-muted">Masuk ke Sistem Manajemen Sepatu</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.proses') }}">
                    @csrf 
                    
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control"
                            value="{{ request()->cookie('username') ?? '' }}" required>
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
                        <a href="{{ route('home') }}" class="text-secondary">Kembali ke Beranda</a>
                    </div>
                </form>
            </div>
        </div>

        <footer class="bg-dark text-white text-center p-3 mt-auto">
            &copy; 2026 Sistem Manajemen Sepatu Toko Sepatu.
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>