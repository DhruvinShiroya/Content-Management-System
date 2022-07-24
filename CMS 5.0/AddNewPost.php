<?php require_once("Includes/DBConnection.php"); ?>
<?php require_once("Includes/Function.php"); ?>
<?php require_once("Includes/Session.php"); ?>
<?php

if (isset($_POST["Submit"])) {

    $category = $_POST["Title"];
    $admin = "dhruvin";
    if (empty($category)) {
        $_SESSION["error_message"] = "all field are must be filled out";
        Redirect_to("Categories.php");
    } else if (strlen($category) < 3) {
        $_SESSION["error_message"] = "Title should be greater than two character";
        Redirect_to("Categories.php");
    } else if (strlen($category) > 49) {
        $_SESSION["error_message"] = "Title should be less than 50 character character";
        Redirect_to("Categories.php");
    } else {
        // query to the database to add new category
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

    <title>Document</title>
    <script src="https://kit.fontawesome.com/6064633335.js" crossorigin="anonymous"></script>

    <!--  add fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/style.css" />

<body>
    <!-- Navigation bar-->
    <nav class="navbar navbar-expand-lg bg-dark text-white ">
        <div class="container" style="height: 90px">
            <a href="#" class="navbar-brand">Company</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapseCMS" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapseCMS">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a href="Profile.php" class="nav-link"><i class="fa-solid fa-user-astronaut text-success"></i> Myprofile</a>
                    </li>
                    <li class="nav-item">
                        <a href="Dashboard.php" class="nav-link">DashBord</a>
                    </li>
                    <li class="nav-item">
                        <a href="Admin.php" class="nav-link">Manage admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="Post.php" class="nav-link">Post</a>
                    </li>
                    <li class="nav-item">
                        <a href="Category.php" class="nav-link">Categroy</a>
                    </li>
                    <li class="nav-item">
                        <a href="Comments.php" class="nav-link">Comments</a>
                    </li>
                    <li class="nav-item">
                        <a href="Blog.php?page=1" class="nav-link">Live Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="Logout.php" class="nav-link">
                            <i class="fa-solid fa-font-awesome text-danger"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- header starts here -->
    <header class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <h1><i class="fas fa-edit"></i> Add New Post</h1>
                </div>
            </div>

        </div>
    </header>
    <!-- header ends here -->

    <!-- Main code -->
    <section class="py-2 container mb-4">
        <div class="row" style="min-height: 50px;">
            <div class="offset-lg-1 col-lg-10" style="min-height: 50px;">

                <?php
                echo ErrorMessage();
                echo SuccessMessage();
                ?>
                <form action="Categories.php" method="post">
                    <div class="card bg-secondary text-white">

                        <div class="card-body bg-dark">
                            <div class="form-group m-3">
                                <label for="PostTitle"><span class="form-text"> Post Title: </span></label>
                                <input class="form-control" type="text" name="PostTitle" id="PostTitle" placeholder="Type title here">
                            </div>
                            <div class="form-group m-3">
                                <label for="CategoryTitle"><span class="FieldInfo"> Choose Category </span></label>
                                <select name="Category " id="CategoryTitle" class="form-control">
                                    <?php
                                    global $db;
                                    $sql = "SELECT * FROM category";
                                    $statement = $db->query($sql);
                                    while($data = $statement->fetch()){
                                        $id_data = $data["id"];
                                        $title_data = $data["title"];
                                        echo "<option value=\"$id_data\">$title_data</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group m-3">
                                <div class="custom-file">
                                    <input class="custom-file-input" type="File" name="image" id="ImageSelect" value="">
                                    <label for="ImageSelect" class="custom-file-label"> Select Image</label>
                                </div>
                            </div>
                            <div class="form-group m-3">

                                <label class="mb-2" for="PostText"><span class="form-text"> Post: </span></label><br>
                                <textarea name="post" id="PostText" cols="135" rows="6"></textarea>
                            </div>
                            <div class="row p-3">
                                <div class="col-lg-2 ">
                                    <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Dashboard</a>
                                </div>
                                <div class="offset-lg-8 col-lg-2">
                                    <button type="submit" name="Submit" value="Submit" class="btn btn-success btn-block  ">
                                        <i class="fas fa-check"></i> Publish
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>

    </section>



    <!-- footer start -->
    <footer class="bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <p class="lead text-center">Designed By| Dhruvin shiroya | All rights Reserved by <span id="year"> </span> &copy
                </p>
            </div>
        </div>

    </footer>

    <!-- footer end -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
</body>
</head>

</html>