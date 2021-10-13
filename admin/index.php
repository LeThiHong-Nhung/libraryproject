<?php include('partials/menu.php') ?>
<!-- Main content section starts -->
<div class="menu main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>

        <?php if (isset($_SESSION['login']))
        {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
        }
        ?>
        <br><br>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Catagories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Catagories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Catagories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Catagories
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Main content section ends -->

<?php include('partials/footer.php'); ?>