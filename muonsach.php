<?php include('partials-front/menu.php'); ?>
<!-- Book search section starts here -->
<section class="book-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Selected Book</legend>

                    <div class="book-menu-img">
                        <img src="images/tieuthuyet.jpg" alt="Book" class="img-responsive img-curve">
                    </div>
    
                    <div class="book-menu-desc">
                        <h3>Book Title</h3>
                        <p class="book-price">$2.3</p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter your full name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. example@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
<!-- Book search section ends here -->


<?php include('partials-front/footer.php'); ?>