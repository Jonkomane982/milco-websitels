<?php get_header(); ?>

    <!-- HERO SECTION -->
    <section class="hero" style="position: relative; height: 520px; display: flex; align-items: center; justify-content: center; text-align: center; color: var(--background); overflow: hidden;">
        <div class="hero-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(rgba(27, 67, 50, 0.55), rgba(27, 67, 50, 0.55)), url('<?php echo get_template_directory_uri(); ?>/background_image.jpg'); background-size: cover; background-position: center;"></div>
        <div class="hero-content fade-up" style="position: relative; max-width: 800px; padding: 0 20px;">
            <h1 style="font-size: 56px; margin-bottom: 20px;">Proudly Made in Lesotho 🇱🇸</h1>
            <p style="font-size: 18px; margin-bottom: 35px;">Discover authentic local products from Lesotho's finest artisans and farmers</p>
            <div style="display: flex; gap: 20px; justify-content: center;">
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-primary">Shop Now</a>
                <a href="#new-arrivals" class="btn btn-outline" style="color: var(--background); border-color: var(--background);">New Arrivals</a>
            </div>
        </div>
    </section>

    <!-- STATS BAR -->
    <section class="stats" style="padding: 40px 5%; background: var(--white);">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <div class="card" style="padding: 30px; text-align: center;">
                <i class="fa fa-box-open" style="font-size: 32px; color: var(--accent); margin-bottom: 15px;"></i>
                <h3 style="font-size: 24px;">50+ Local Products</h3>
            </div>
            <div class="card" style="padding: 30px; text-align: center;">
                <i class="fa fa-smile" style="font-size: 32px; color: var(--accent); margin-bottom: 15px;"></i>
                <h3 style="font-size: 24px;">200+ Happy Customers</h3>
            </div>
            <div class="card" style="padding: 30px; text-align: center;">
                <i class="fa fa-heart" style="font-size: 32px; color: var(--accent); margin-bottom: 15px;"></i>
                <h3 style="font-size: 24px;">100% Made in Lesotho</h3>
            </div>
        </div>
    </section>

    <!-- FEATURED CATEGORIES -->
    <section class="categories" style="padding: 80px 5%;">
        <h2 style="text-align: center; margin-bottom: 50px; font-size: 36px;">Featured Categories</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <a href="<?php echo esc_url(home_url('/shop?cat=food')); ?>" class="card" style="padding: 40px 20px; text-align: center;">
                <i class="fa fa-wheat-awn" style="font-size: 40px; color: var(--primary); margin-bottom: 20px;"></i>
                <h3>Food & Agriculture</h3>
            </a>
            <a href="<?php echo esc_url(home_url('/shop?cat=crafts')); ?>" class="card" style="padding: 40px 20px; text-align: center;">
                <i class="fa fa-palette" style="font-size: 40px; color: var(--primary); margin-bottom: 20px;"></i>
                <h3>Crafts & Textiles</h3>
            </a>
            <a href="<?php echo esc_url(home_url('/shop?cat=home')); ?>" class="card" style="padding: 40px 20px; text-align: center;">
                <i class="fa fa-couch" style="font-size: 40px; color: var(--primary); margin-bottom: 20px;"></i>
                <h3>Home & Living</h3>
            </a>
        </div>
    </section>

    <!-- NEW ARRIVALS -->
    <section id="new-arrivals" style="padding: 80px 5%; background: var(--cream-card);">
        <h2 style="text-align: center; margin-bottom: 50px; font-size: 36px; position: relative; display: inline-block; left: 50%; transform: translateX(-50%);">
            New Arrivals
            <span style="position: absolute; bottom: -10px; left: 0; width: 60%; height: 4px; background: var(--accent);"></span>
        </h2>
        <div id="new-arrivals-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <!-- Rendered via JS -->
        </div>
    </section>

    <!-- SUBSCRIPTION FORM -->
    <section class="subscription" style="padding: 80px 5%; text-align: center;">
        <div class="card" style="max-width: 800px; margin: 0 auto; padding: 60px 40px;">
            <h2 style="margin-bottom: 15px;">Stay Updated on New Products</h2>
            <p style="margin-bottom: 35px; color: var(--muted);">Be the first to know when fresh local goods arrive at MILCO.</p>
            <form id="subscribe-form" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <input type="text" id="sub-name" placeholder="Your Name" required style="padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                <input type="email" id="sub-email" placeholder="Your Email" required style="padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                <select id="sub-interest" required style="padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                    <option value="" disabled selected>Select Interest</option>
                    <option value="Food">Food & Agriculture</option>
                    <option value="Skincare">Skincare & Beauty</option>
                    <option value="Crafts">Crafts & Textiles</option>
                    <option value="All">All Categories</option>
                </select>
                <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- ABOUT MILCO -->
    <section class="about" style="padding: 80px 5%;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div class="fade-up">
                <h2 style="font-size: 36px; margin-bottom: 25px;">Supporting Lesotho's Artisans</h2>
                <p style="margin-bottom: 20px;">MILCO was founded by the <strong>NUL Innovation Hub</strong> to bridge the gap between local producers and modern markets. Our mission is to promote sustainable economic growth in Lesotho by showcasing the exceptional quality of "Made in Lesotho" products.</p>
                <p style="margin-bottom: 20px;">We operate on a unique four-in-one structure: supporting local farmers, providing a retail platform for artisans, fostering innovation through research, and ensuring high-quality standards for every product sold.</p>
                <a href="<?php echo esc_url(home_url('/stakeholders')); ?>" class="btn btn-outline">Meet Our Partners</a>
            </div>
            <div class="card" style="border-radius: 16px; overflow: hidden;">
                <img src="<?php echo get_template_directory_uri(); ?>/products/Mokorotlo hat.jpg" alt="Traditional Mokorotlo Hat" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
    </section>

    <script>
        // Specific Index Logic
        document.addEventListener('DOMContentLoaded', () => {
            // Render New Arrivals
            const newArrivalsGrid = document.getElementById('new-arrivals-grid');
            if (newArrivalsGrid) {
                const newArrivals = productsData.filter(p => p.isNew).slice(0, 3);
                newArrivalsGrid.innerHTML = newArrivals.map(p => createProductCard(p)).join('');
            }

            // Subscription Form
            const subForm = document.getElementById('subscribe-form');
            if (subForm) {
                subForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const name = document.getElementById('sub-name').value;
                    const email = document.getElementById('sub-email').value;
                    const interest = document.getElementById('sub-interest').value;

                    const subscribers = JSON.parse(localStorage.getItem('subscribers')) || [];
                    subscribers.push({ name, email, interest, date: new Date().toISOString() });
                    localStorage.setItem('subscribers', JSON.stringify(subscribers));

                    showToast(`You're subscribed! We'll notify you of new ${interest} products.`);
                    e.target.reset();
                });
            }
        });
    </script>

<?php get_footer(); ?>
