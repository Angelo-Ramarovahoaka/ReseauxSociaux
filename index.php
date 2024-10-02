<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Serasera</title>
    <style>
        .loader-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            transition: opacity 1s ease-in-out;
            opacity: 1;
            z-index: 50;
        }
        .loader-container.loaded {
            opacity: 0;
            pointer-events: none;
        }
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top: 4px solid blue;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .login-container {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            z-index: 10;
        }
        .login-container.show {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="loader-container">
        <div class="spinner"></div>
    </div>
    <div class="login-container">
        <h1 class="text-2xl font-bold text-blue-600 mb-4 text-center">SeraSera</h1>
        <form id="login" action="controllers/userController.php?action=login" method="post">
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-lg mb-2" required>
            </div>
            <div class="mb-4">
                <input type="password" name="password" placeholder="Mot de passe" class="w-full p-2 border border-gray-300 rounded-lg mb-4" required>
            </div>
            <a href="display/users/password_reset_request.php"class="mb-4">mot de passe oublier?</a>
            <div class="flex justify-between">
                <button class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700" type="submit">Connexion</button>
                <a href="display/users/createUser.php" class="bg-blue-600 text-white py-2 px-4 rounded-lg text-center block hover:bg-blue-700">Inscription</a>
            </div>
        </form>   
    </div>
    <script src="./public/javascript/script.js"></script>
</body>
</html>
