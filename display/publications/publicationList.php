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
<div class="overflow-y-auto max-h-screen" id ="publicationList">
    <?php foreach ($publications as $publication): ?>
        <div class="border rounded-lg shadow-lg p-6 mb-6 bg-white">
        <!-- Username and actions -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex space-x-4">
                    <h5 class="text-2xl font-semibold text-gray-700"><?= $publication['username'] ?></h5>
                </div>
                <p class="text-xs font-semibold text-gray-700"><?= $publication['publication_date'] ?></p>
                <div class="flex space-x-3">
                <?php if ($publication['user_id'] == $_SESSION['user_id']): ?>
                    <a href="../../controllers/publicationsController.php?action=detailUpdate&id=<?= $publication['id'] ?>" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="../../controllers/publicationsController.php?action=delete&id=<?= $publication['id'] ?>&image=<?= $publication['image'] ?>" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </a>
                <?php endif; ?>
                </div>
            </div>

        <!-- Publication title -->
        
        <!-- Publication content -->
        <div class="bg-blue-100 rounded-lg">
                <h4 class="text-md font-bold w-full flex items-center justify-center mb-4 mb-2"><?= $publication["title"] ?></h4>
                <p class="text-gray-600 p-2"><?= $publication["content"] ?></p>
                <img src="../<?= $publication["image"] ?>" alt="" class="my-6">
            </div>
        <!-- Reactions and comments -->
        <div class="flex justify-between items-center space-x-4 mb-4">
            <!-- Reaction Form -->
            <div class="flex items-center space-x-4">
                <label id="like" class="flex items-center space-x-1 cursor-pointer reaction-label-<?= $publication['id'] ?>">
                    <button>
                        <a href="../../controllers/publicationsController.php?action=react&reaction=like&idpublication=<?= $publication['id'] ?>&user_id=<?= $publication['user_id'] ?>">
                            <i class="fa-solid fa-thumbs-up text-blue-500 hover:text-blue-700 text-lg"></i>
                        </a>
                    </button>
                    <span id="likes-count-<?= $publication['id'] ?>"><?= $reaction_counts['like'] == 0 ? ' ' : $reaction_counts['like'] ?></span>
                </label>

                <label id="love" class="flex items-center space-x-1 cursor-pointer reaction-label-<?= $publication['id'] ?>">
                    <button>
                        <a href="../../controllers/publicationsController.php?action=react&reaction=love&idpublication=<?= $publication['id'] ?>&user_id=<?= $publication['user_id'] ?>">
                            <i class="fa-solid fa-heart text-red-500 hover:text-red-700 text-lg"></i>
                        </a>
                    </button>
                    <span id="loves-count-<?= $publication['id'] ?>"><?= $reaction_counts['love'] == 0 ? ' ' : $reaction_counts['love'] ?></span>
                </label>

                <label id="sad" class="flex items-center space-x-1 cursor-pointer reaction-label-<?= $publication['id'] ?>">
                    <button>
                        <a href="../../controllers/publicationsController.php?action=react&reaction=sad&idpublication=<?= $publication['id'] ?>&user_id=<?= $publication['user_id'] ?>">
                            <i class="fa-solid fa-face-sad-tear text-yellow-500 hover:text-yellow-700 text-lg"></i>
                        </a>
                    </button>
                    <span id="sads-count-<?= $publication['id'] ?>"><?= $reaction_counts['sad'] == 0 ? ' ' : $reaction_counts['sad'] ?></span>
                </label>

                <label id="funny" class="flex items-center space-x-1 cursor-pointer reaction-label-<?= $publication['id'] ?>">
                    <button>
                        <a href="../../controllers/publicationsController.php?action=react&reaction=funny&idpublication=<?= $publication['id'] ?>&user_id=<?= $publication['user_id'] ?>">
                            <i class="fa-solid fa-face-laugh-squint text-green-500 hover:text-green-700 text-lg"></i>
                        </a>
                    </button>
                    <span id="funnys-count-<?= $publication['id'] ?>"><?= $reaction_counts['funny'] == 0 ? ' ' : $reaction_counts['funny'] ?></span>
                </label>
            </div>


            <button onclick="toggleCommentSection(<?= $publication['id'] ?>)" class="text-gray-600 hover:text-gray-800">
                <i class="fa-solid fa-comment text-xl"></i>
            </button>
        </div>

        <!-- Hidden Comment Section -->
        <div id="comment-section-<?= $publication['id'] ?>" class="hidden mt-4">
        <form action="../../controllers/publicationsController.php?action=create" method="post" class="flex-grow mb-4">
            <input type="text" name="content" placeholder="Écrire un commentaire..." class="border border-gray-300 rounded-md w-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <input type="hidden" name="publication_id" value="<?= $publication['id']?>" required>
        </form>

            <!-- List of Comments -->
            <ul class=" pl-5 space-y-2">
                <?php foreach($comments as $comment): ?>
                    <?php if ($comment['publication_id'] == $publication['id']): ?>
                        <li class="text-gray-700 bg-gray-100 rounded-md p-3 shadow-sm ">
                        <span class="font-semibold"><?= $comment['username']; ?></span>
                        <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <label id="like" class="flex items-center space-x-1 cursor-pointer reaction-label-<?= $publication['id'] ?>">
                                <button onclick="">
                                    <a href="../../controllers/publicationsController.php?action=react&reaction=like&idpubli=<?= $publication['id'] ?>&idcomment=<?= $comment['id'] ?>&user_id=<?= $publication['user_id'] ?>">
                                        <i class="fa-solid fa-thumbs-up text-blue-500 hover:text-blue-700 text-lg"></i>
                                    </a>
                                </button>
                                <span id="likes-count-<?= $comment['id'] ?>"><?= $reaction_counts['like'] == 0 ? ' ' : $reaction_counts['like'] ?></span>
                            </label>

                            <label id="love" class="flex items-center space-x-1 cursor-pointer reaction-label-<?= $publication['id'] ?>">
                                <button onclick="incrementNumberReaction(<?= $publication['id'] ?>)">
                                    <a href="../../controllers/publicationsController.php?action=react&reaction=love&idpubli=<?= $publication['id'] ?>&idcomment=<?= $comment['id'] ?>&user_id=<?= $publication['user_id'] ?>">
                                        <i class="fa-solid fa-heart text-red-500 hover:text-red-700 text-lg"></i>
                                    </a>
                                </button>
                                <span id="loves-count-<?= $comment['id'] ?>"><?= $reaction_counts['love'] == 0 ? ' ' : $reaction_counts['love'] ?></span>
                            </label>

                            <label id="sad" class="flex items-center space-x-1 cursor-pointer reaction-label-<?= $publication['id'] ?>">
                                <button onclick="incrementNumberReaction(<?= $publication['id'] ?>)">
                                    <a href="../../controllers/publicationsController.php?action=react&reaction=sad&idpubli=<?= $publication['id'] ?>&idcomment=<?= $comment['id'] ?>&user_id=<?= $publication['user_id'] ?>">
                                        <i class="fa-solid fa-face-sad-tear text-yellow-500 hover:text-yellow-700 text-lg"></i>
                                    </a>
                                </button>
                                <span id="sads-count-<?= $comment['id'] ?>"><?= $reactionsComs[0]['sad'] == 0 ? ' ' : $reactionsComs[0]['sad'] ?></span>
                            </label>

                            <label id="funny" class="flex items-center space-x-1 cursor-pointer reaction-label-<?= $publication['id'] ?>">
                                <button onclick="incrementNumberReaction(<?= $publication['id'] ?>)">
                                    <a href="../../controllers/publicationsController.php?action=react&reaction=funny&idpubli=<?= $publication['id'] ?>&idcomment=<?= $comment['id'] ?>&user_id=<?= $publication['user_id'] ?>">
                                        <i class="fa-solid fa-face-laugh-squint text-green-500 hover:text-green-700 text-lg"></i>
                                    </a>
                                </button>
                                <span id="funnys-count-<?= $comment['id'] ?>"><?= $reactionsComs[0]['sad'] == 0 ? ' ' : $reactionsComs[0]['sad'] ?></span>
                            </label>
                        </div>
                            <form action="../../controllers/publicationsController.php?action=update&idcomment=<?= $comment['id'] ?>" method="post">
                                <input id="comment-input-<?= $comment['id'] ?>" name="content" cols="10" disabled class="m-3 border border-gray-300 rounded-md w-full px-3 py-1 h-12 resize-none bg-gray-100 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="<?= $comment['content'] ?>">
                                <button id="submit-btn-<?= $comment['id'] ?>" type="submit" class="hidden bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-800 focus:ring-2 focus:ring-blue-500">Enregistrer</button>
                            </form>

                            <?php if ($comment['user_id'] == $_SESSION['user_id']): ?>
                                <div class="flex space-x-2 mt-2">
                                    <button onclick="toggleCommentAble(<?= $comment['id'] ?>)" class="text-blue-600 hover:text-blue-800 ">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="../../controllers/publicationsController.php?action=delete&idcomment=<?= $comment['id'] ?>" class="text-red-600 hover:text-red-800 ">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>

        </div>

    <?php endforeach;?>
</div>
</body>