<!DOCTYPE html>
<html lang="en" data-theme="luxury">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Commerce Platform</title>   
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d3eca7cd97.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-base-300 via-base-100 to-base-300 flex items-center justify-center p-4">
    <div class="card w-full max-w-lg bg-base-200/80 backdrop-blur-md shadow-2xl border border-white/5 animate-fade-in my-8">
        <div class="card-body">
            <div class="flex flex-col items-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-tr from-primary to-secondary rounded-2xl flex items-center justify-center text-primary-content text-3xl shadow-lg mb-4">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <h2 class="card-title text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Create Account</h2>
                <p class="text-sm text-base-content/60">Join us to explore and order amazing products</p>
            </div>

            <?php if (isset($_GET['name_error'])): ?>
                <div class="alert alert-error mb-4 shadow-sm py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="text-sm"><?php echo htmlspecialchars($_GET['name_error']); ?></span>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success mb-4 shadow-sm py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <div>
                        <span class="text-sm font-semibold block"><?php echo htmlspecialchars($_GET['success']); ?></span>
                        <span class="text-xs opacity-80">Redirecting to login shortly...</span>
                    </div>
                </div>
                <script>
                    setTimeout(function() {
                        window.location.href = "login.php";
                    }, 3500); // Redirect to login.php after 3.5 seconds
                </script>
            <?php endif; ?>

            <form action="actions/register.php" method="post" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Username</span>
                        </label>
                        <div class="join w-full">
                            <span class="join-item bg-base-300 border-base-300 flex items-center px-3"><i class="fa-solid fa-user text-primary"></i></span>
                            <input type="text" name="username" placeholder="Username" class="input input-bordered w-full join-item focus:outline-none focus:border-primary" required />
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Password</span>
                        </label>
                        <div class="join w-full">
                            <span class="join-item bg-base-300 border-base-300 flex items-center px-3"><i class="fa-solid fa-lock text-primary"></i></span>
                            <input type="password" name="password" placeholder="••••••••" class="input input-bordered w-full join-item focus:outline-none focus:border-primary" required />
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Phone Number</span>
                        </label>
                        <div class="join w-full">
                            <span class="join-item bg-base-300 border-base-300 flex items-center px-3"><i class="fa-solid fa-phone text-primary"></i></span>
                            <input type="tel" name="phone" placeholder="0123456789" class="input input-bordered w-full join-item focus:outline-none focus:border-primary" required />
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Email</span>
                        </label>
                        <div class="join w-full">
                            <span class="join-item bg-base-300 border-base-300 flex items-center px-3"><i class="fa-solid fa-envelope text-primary"></i></span>
                            <input type="email" name="email" placeholder="example@email.com" class="input input-bordered w-full join-item focus:outline-none focus:border-primary" required />
                        </div>
                    </div>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Home Address</span>
                    </label>
                    <div class="join w-full">
                        <span class="join-item bg-base-300 border-base-300 flex items-center px-3"><i class="fa-solid fa-location-dot text-primary"></i></span>
                        <input type="text" name="address" placeholder="123 Main St, City" class="input input-bordered w-full join-item focus:outline-none focus:border-primary" required />
                    </div>
                </div>

                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none hover:opacity-90 transition-all duration-300 text-white font-bold tracking-wide">
                        Register Account
                    </button>
                </div>
            </form>

            <div class="divider text-xs text-base-content/40">OR</div>

            <div class="text-center">
                <p class="text-sm text-base-content/70">
                    Already have an account? 
                    <a href="login.php" class="link link-primary font-semibold hover:text-primary-focus transition-colors">Sign In</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
