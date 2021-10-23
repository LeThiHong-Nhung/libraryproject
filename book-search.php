<?php include('partials-front/menu.php'); ?>
<!-- Book search section starts here -->
<section class="book-search">
    <div class="container">
        <h2 class="text-center text-white">Fill this form to comfirm</h2>
        <form action="book-search.php" method="POST" class="order">
            <fieldset>
                <legend>Selected Book</legend>
                <div class="book-menu-img">
                    <img src="images/tieuthuyet.jpg" alt="Tieu thuyet" class="img-responsive img-curve">
                </div>
                <div class="book-menu-desc">
                    <h3>Book Title</h3>
                    <p class="book-price">$2.3</p>

                    <div class="order-label">Quantity</div>
                    <input type="number" qty="qty" class="input-responsive" value="1" required>
                </div>
            </fieldset>
            <fieldset>
                <legend>Time to borrow</legend>
                <div class="book-menu-img">
                    <img src="images/tieuthuyet.jpg" alt="Tieu thuyet" class="img-responsive img-curve">
                </div>
                <div class="book-menu-desc">
                    <h3>Book Title</h3>
                    <p class="book-price">$2.3</p>

                    <div class="order-label">Quantity</div>
                    <input type="number" qty="qty" class="input-responsive" value="1" required>
                </div>
            </fieldset>
            <input type="submit" class="btn btn-primary" value="Confirm">
        </form>
    </div>
</section>
<!-- Book search section ends here -->

<!-- Book menu section starts here -->
<section class="book-menu">
    <div class="container">
        <h2 class="text-center">Book menu</h2>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.png" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.png" alt="Book menu" class="img-responsive img-curve">
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
                <img src="images/menu-book.png" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.png" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.png" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php">Muon sach</a>
            </div>
        </div>

        <div class="book-menu-box">
            <div class="book-menu-img">
                <img src="images/menu-book.png" alt="Book menu" class="img-responsive img-curve">
            </div>

            <div class="book-menu-desc">
                <h4>Book title</h4>
                <p class="book-price">$2.3
                <p>
                <p class="book-detail">
                    something
                </p><br>
                <a href="muonsach.php">Muon sach</a>
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