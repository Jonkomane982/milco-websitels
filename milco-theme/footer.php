    <!-- FOOTER -->
    <footer>
        <div class="footer-grid">
            <div class="footer-logo">
                <div class="logo-container">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 2C10.0589 2 2 10.0589 2 20C2 29.9411 10.0589 38 20 38C29.9411 38 38 29.9411 38 20C38 10.0589 29.9411 20 20 2ZM26.4142 13.5858C28.1716 15.3431 28.1716 18.1883 26.4142 19.9457L20 26.3599L13.5858 19.9457C11.8284 18.1883 11.8284 15.3431 13.5858 13.5858C15.3431 11.8284 18.1883 11.8284 19.9457 13.5858L20 13.6401L20.0543 13.5858C21.8117 11.8284 24.6569 11.8284 26.4142 13.5858Z" fill="#F5F0E8"/>
                    </svg>
                    <div class="logo-text">
                        <h1>MILCO</h1>
                        <p>Made in Lesotho</p>
                    </div>
                </div>
                <p>Supporting local artisans since 2020.</p>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/shop')); ?>">Shop</a></li>
                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                    <li><a href="<?php echo esc_url(home_url('/stakeholders')); ?>">Stakeholders</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p><i class="fa fa-phone"></i> +266 5892 1648</p>
                <p><i class="fa fa-map-marker-alt"></i> Sefika Complex, Maseru</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> MILCO Lesotho &middot; Founded by NUL Innovation Hub</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
