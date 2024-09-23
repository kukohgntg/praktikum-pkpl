<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login Form</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>
    <body>
        <div
            class="container d-flex align-items-center justify-content-center vh-100"
        >
            <form class="border p-4 rounded shadow" style="width: 300px">
                <h3 class="text-center">Login</h3>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        required
                    />
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>
                <div class="text-center mt-3">
                    <a href="#">Sign Up</a>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
