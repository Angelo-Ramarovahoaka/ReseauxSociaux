<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header class="bg-blue-600 text-white py-4 px-12  sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-lg flex space-x-6 items-center">
               <img src="../<?= $_SESSION['profile_image'] ?>"  alt="" class="w-12 h-12 rounded-full">
               <span class="font-semibold"><?php echo $_SESSION["username"]?></span> 
            </div>
            <div class="flex items-center space-x-12">
                <form class=" flex items-center border border-gray-300 hidden" action="../../controllers/publicationsController.php?action=search" method="post" id="searchinput">
                    <input type="text" id="search" name="search" placeholder="Rechercher de publication..." class=" w-full border-none focus:outline-none p-2 text-black">
                </form>
                <button onclick="toggleSearch()">
                    <i class="fas fa-search text-grenat-600"></i>
                </button>
                <a href="../../controllers/publicationsController.php?action=read" class="text-white-600 hover:text-white-800 font-bold text-xl" >Tous</a>
                <button onclick="toggleSetting()">
                    <i class="fa-solid fa-gear"></i>
                </button>
            </div>
            <div id="settingUsers" class="flex flex-col space-y-4 bg-blue-300 p-4 rounded-lg shadow-lg max-w-sm absolute right-12 top-12 hidden">
                <a href="../../controllers/userController.php?action=detailUpdate" class="text-gray-600 hover:text-gray-800 ">
                    Modifier <?php echo $_SESSION["username"]; ?>
                </a>
                <a href="../../controllers/userController.php?action=delete" class="text-red-600 hover:text-red-800 ">
                    Supprimer <?php echo $_SESSION["username"]; ?>
                </a>
                <a href="../../controllers/userController.php?action=logout" class="text-gray-600 hover:text-gray-800 ">
                    Déconnexion?
                </a>
            </div>


        </div>
    </header>
</body>