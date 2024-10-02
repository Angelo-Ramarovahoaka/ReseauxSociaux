<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <a href="javascript:history.back()" class="flex items-center text-gray-500 hover:text-gray-700 mb-4">
            <i class="fas fa-arrow-left mr-2"></i> Retour
        </a>
        
        <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">Modification</h1>

        <form class="space-y-4" action="../../controllers/userController.php?action=update" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="profile_image" class="block text-grenat-600">Photo de profil :</label>
                <img id="image_preview" src="../<?= $users['profile_image'] ?>" alt="Aperçu de l'image" class="mt-4 w-12 h-12 rounded-full">
                <input type="file" id="profile_image" name="profile_image" value="<?= $users['profile_image'] ?>" class="w-full p-2 border border-gray-300 rounded-lg" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="mb-4">
                <label for="lastname" class="block text-grenat-600">Nom :</label>
                <input type="text" id="lastname" name="lastname" value="<?= $users['lastname'] ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="firstname" class="block text-grenat-600">Prénom :</label>
                <input type="text" id="firstname" name="firstname" value="<?= $users['firstname'] ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="date_of_birth" class="block text-grenat-600">Date de naissance :</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="<?= $users['date_of_birth'] ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="username" class="block text-grenat-600">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" value="<?= $users['username'] ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-grenat-600">Mot de passe :</label>
                <input type="password" id="password" name="password" value="<?= $users['password'] ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>



            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Modifier
            </button>
        </form>
    </div>

    <script src="../../script.js"></script>
</body>
</html>
