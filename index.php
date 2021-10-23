<?php include('partials-front/menu.php'); ?>
<!-- Book search section starts here -->
<section class="book-search text-center">
    <div class="container">
        <form action="book-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for book .." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>
<!-- Book search section ends here -->

<!-- Categories section starts here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Books</h2>
        <?php
        $sql = "SELECT * FROM the_loai LIMIT 3";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['ma_tl'];
                $ten = $row['ten_tl'];
                $tenanh = $row['anh_tl'];
        ?>
            <a href="category-book.php">
                <div class="box-3 float-container">
                    <?php
                    if($tenanh=="")
                    {
                        echo "<div class='error'>Khong co anh</div>";
                    }
                    else{
                        ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $tenanh; ?>" alt="Book" class="img-responsive img-curve">
                        <?php
                    }
                    ?>
                    <h3 class="float-text text-white"><?php echo $ten; ?></h3>
                </div>
            </a>
        <?php
            }
        } else {
            echo "<div class='error'>Khong co the loai nao!</div>";
        }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories section ends here -->

<!-- Book menu section starts here -->
<section class="book-menu">
    <div class="container">
        <h2 class="text-center">Book menu</h2>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.jpg" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php" class="btn btn-primary">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.jpg" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php" class="btn btn-primary">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.jpg" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php" class="btn btn-primary">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.jpg" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php" class="btn btn-primary">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.jpg" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php" class="btn btn-primary">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.jpg" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php" class="btn btn-primary">Muon sach</a>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

    <p class="text-center">
        <a href="#">See all book</a>
    </p>
</section>
<!-- Book menu section ends here -->
<?php include('partials-front/footer.php'); ?>