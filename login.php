<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce Platform</title>   
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="css/theme.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/d3eca7cd97.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-base-300 flex items-center justify-center p-4">
    <div class="card w-full max-w-md bg-base-200/80 backdrop-blur-md shadow-2xl border border-white/5 animate-fade-in">
        <div class="card-body">
            <div class="flex flex-col items-center mb-6">
                <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-primary-content text-3xl shadow-lg mb-4">
                    <i class="fa-solid fa-holly-berry"></i>
                </div>
                <h2 class="card-title text-3xl font-extrabold text-primary">Welcome Back</h2>
                <p class="text-sm text-base-content/60">Enter your credentials to access your account</p>
            </div>

            <?php if (isset($_GET['name_error'])): ?>
                <div class="alert alert-error mb-4 shadow-sm py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="text-sm"><?php echo htmlspecialchars($_GET['name_error']); ?></span>
                </div>
            <?php endif; ?>

            <form action="actions/login_test.php" method="post" class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">User ID</span>
                    </label>
                    <label class="input-group">
                        <div class="join w-full">
                            <span class="join-item bg-base-300 border-base-300 flex items-center px-4"><i class="fa-solid fa-user text-primary"></i></span>
                            <input type="text" name="userid" placeholder="e.g. 00001 or EMP1" class="input input-bordered w-full join-item focus:outline-none focus:border-primary" required />
                        </div>
                    </label>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Password</span>
                    </label>
                    <div class="join w-full">
                        <span class="join-item bg-base-300 border-base-300 flex items-center px-4"><i class="fa-solid fa-lock text-primary"></i></span>
                        <input type="password" name="password" placeholder="••••••••" class="input input-bordered w-full join-item focus:outline-none focus:border-primary" required />
                    </div>
                </div>

                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary border-none hover:opacity-90 transition-all duration-300 text-white font-bold tracking-wide">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="divider text-xs text-base-content/40">OR</div>

            <div class="text-center">
                <p class="text-sm text-base-content/70">
                    Don't have an account? 
                    <a href="reg_form.php" class="link link-primary font-semibold hover:text-primary-focus transition-colors">Create Account</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
