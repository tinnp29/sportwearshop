<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data["title"]; ?></title>
    <?php linkCSS("assets/css/admin.css"); ?>
    <?php linkCSS("assets/css/bootstrap.min.css"); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    
    <div class="container-fluid">
        <?php //include "components/navbar.php"; ?>
    </div>
    <!-- Close Navbar -->
    
    <?php $this->flash("signupSuccess", "text-success"); ?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-2">
                <?php include "components/leftmenu.php"; ?>
            </div>
            <!-- Close col-sm-2 -->
            <div class="col-sm-9">
                <?php  include "pages/" . $data["page"] . ".php"; ?>
            </div>
            <!-- Close col-sm-10 -->
        </div>
        <!-- Close row -->
    </div>
    <!-- Close container -->

    <?php linkJS("assets/js/app.js"); ?>
</body>
</html>
