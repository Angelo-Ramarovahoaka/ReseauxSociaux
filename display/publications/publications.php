<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="../../public/javascript/jquery-3.7.1.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 font-sans h-screen">
 <?php session_start(); ?>
    <!-- Header -->
    <?php require_once "header.php" ?>
    <div class=" container mx-auto px-12 py-3 h-full">
        <div class="flex h-full flex-row space-x-24">
            <div class="w-full pr-4 ">
                <div id="message"></div>
                <div class="bg-white p-6 rounded-lg shadow-md h-auto">
                    <h2 class="text-2xl font-bold text-grenat-600 mb-4">Ajouter une publication</h2>
                    <form id="createForm" action="../../controllers/publicationsController.php?action=create" enctype="multipart/form-data" method="POST">
                        <div class="mb-4">
                            <input type="text" id="title" name="title" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Titre" required>
                        </div>
                        <div class="mb-4">
                            <textarea id="content" name="content" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Contenu" rows="3"></textarea>
                        </div>
                        <div class="mb-4">
                            <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded-lg" accept="image/*" onchange="previewImage(event)">
                            <img id="image_preview" src="" alt="" class="mt-4 w-12 h-12">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white p-2 rounded-lg w-full">Ajouter</button>
                    </form>
                </div>
            </div>    
            <div class="w-full sticky top-0 ml-6" id="publicationList">
                <?php require 'publicationList.php' ?>
            </div>
        </div>
    </div>
    <script src="../../public/javascript/script.js"></script>
</body>
</html>
