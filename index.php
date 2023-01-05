<?php

namespace App;

require "vendor/autoload.php";


    use App\Controllers\CategoryController;
    use App\Controllers\HomeController;
    use App\Controllers\PostController;
    use App\Controllers\AdminController;
    use App\Models\Database;
    use Dotenv\Dotenv;
  
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    Database::$host = $_ENV['DBHOST'];
    Database::$user = $_ENV['DBUSER'];
    Database::$pass = $_ENV['DBPASSWORD'];
    Database::$dbName = $_ENV['DBNAME'];
    Database::connect();


    // Router
    if (isset($_GET["post_id"]) && !isset($_GET["action"])) {
        $controller = new PostController();
        if (empty($_GET["post_id"])) {
            echo $controller->ErrorPage();
        } else {
            echo $controller->showPost($_GET["post_id"]);
        }
    } elseif (isset($_GET["action"]) && $_GET["action"] === "posts") {
        $postController = new PostController();
        echo $postController->showAllPosts();

    } elseif (isset($_GET["action"]) && $_GET["action"] === "all_categories") {
        $categories = new CategoryController();
        echo $categories->showAllCategories();
        
    } elseif (isset($_GET["cat_id"]) && !isset($_GET["action"])) {
        $controller = new CategoryController();

        if (empty($_GET["cat_id"])) {
            echo $controller->ErrorPage();
        } else {
            echo $controller->showAllPostsFromCategory($_GET["cat_id"]);
        }

    } elseif ((isset($_GET["action"]) && $_GET["action"] === "admin") || (isset($_GET["action"]) && $_GET["action"] === "admin_posts")) {
        $admin = new AdminController();
        echo $admin->showAdminPosts();

    } elseif (isset($_GET["action"]) && $_GET["action"] === "admin_categories") {
        $admin = new AdminController();
        echo $admin->showAdminCategories();

    } elseif (isset($_GET["action"]) && $_GET["action"] === "admin_users") {
        $admin = new AdminController();
        echo $admin->showAdminUsers();

    } elseif (isset($_GET["action"]) && $_GET["action"] === "delete_post" && isset($_GET["post_id"])) {
        $admin = new AdminController();
        $data = $admin->deletePost($_GET["post_id"]);
        echo $admin->showAdminPosts($data);

    } elseif (isset($_GET["action"]) && $_GET["action"] === "delete_cat" && isset($_GET["cat_id"])) {
        $admin = new AdminController();
        $data = $admin->deleteCategory($_GET["cat_id"]);
        echo $admin->showAdminCategories($data);
    }
    
    elseif ($_SERVER['REQUEST_URI'] === "/") {
        $controller = new HomeController();
        echo $controller->showHome();

    } elseif (isset($_GET['id'])) {
        /*
        le submit retourne un tableau avec les valeurs des inputs cochés
        on itère sur chaque valeur et on exécute la requete de suppression 
        */ 
        foreach ($_GET['id'] as $id) {
            $admin = new AdminController();
            $data = $admin->deletePost($id);
        }
        echo $admin->showAdminPosts($data);
    }
    else{
        $controller = new HomeController();
        echo $controller->ErrorPage();
    }
    ?>

</body>

</html>