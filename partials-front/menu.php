<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar starts here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" class="img-responsive" alt="Library Logo">
                </a>
            </div>

            <div class="menu text-right">
            <ul>
                <li>
                    <a href="<?php echo SITEURL; ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL; ?>book.php">Book</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL; ?>categories.php">Catagories</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar ends here -->
