<?php
/* Template Name: Shop Page */
get_header(); ?>

    <!-- SHOP CONTENT -->
    <main style="padding: 60px 5%;">
        <div style="text-align: center; margin-bottom: 60px;">
            <h1 style="font-size: 48px; margin-bottom: 10px;">Our Products</h1>
            <p id="product-count" style="color: var(--muted); font-size: 18px;">Showing all products</p>
        </div>

        <!-- FILTER & SORT BAR -->
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 20px; margin-bottom: 40px; padding: 20px; background: var(--white); border-radius: 12px; box-shadow: var(--shadow);">
            <div id="filter-bar" style="display: flex; gap: 10px; flex-wrap: wrap;">
                <button class="btn btn-outline active" onclick="filterProducts('All', this)">All</button>
                <button class="btn btn-outline" onclick="filterProducts('Food', this)">Food</button>
                <button class="btn btn-outline" onclick="filterProducts('Crafts', this)">Crafts</button>
                <button class="btn btn-outline" onclick="filterProducts('Home', this)">Home & Living</button>
                <button class="btn btn-outline" onclick="filterProducts('New', this)">New Arrivals</button>
            </div>
            
            <div style="display: flex; align-items: center; gap: 10px;">
                <label for="sort-select" style="font-weight: 500;">Sort by:</label>
                <select id="sort-select" onchange="sortProducts(this.value)" style="padding: 10px 15px; border-radius: 8px; border: 1px solid #ddd; font-family: var(--font-body);">
                    <option value="featured">Featured</option>
                    <option value="price-low">Price Low → High</option>
                    <option value="price-high">Price High → Low</option>
                    <option value="name-az">Name A-Z</option>
                </select>
            </div>
        </div>

        <!-- PRODUCT GRID -->
        <div id="shop-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
            <!-- Rendered via JS -->
        </div>

        <!-- RECOMMENDATIONS SECTION -->
        <section style="margin-top: 100px; padding-top: 60px; border-top: 1px solid rgba(27, 67, 50, 0.1);">
            <h2 id="recommendation-heading" style="text-align: center; margin-bottom: 40px; font-size: 32px;">Recommended For You</h2>
            <div id="recommendations" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                <!-- Rendered via JS -->
            </div>
        </section>
    </main>

    <script>
        let currentProducts = [...productsData];
        const grid = document.getElementById('shop-grid');

        function renderProducts(products) {
            if (!grid) return;
            grid.innerHTML = products.map(p => createProductCard(p)).join('');
            document.getElementById('product-count').textContent = `Showing ${products.length} product${products.length === 1 ? '' : 's'}`;
            if (typeof initAnimations === 'function') initAnimations();
        }

        function filterProducts(category, btn) {
            document.querySelectorAll('#filter-bar .btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            if (category === 'All') {
                currentProducts = [...productsData];
            } else if (category === 'New') {
                currentProducts = productsData.filter(p => p.isNew);
            } else {
                currentProducts = productsData.filter(p => p.category === category);
            }
            renderProducts(currentProducts);
        }

        function sortProducts(criteria) {
            if (criteria === 'price-low') {
                currentProducts.sort((a, b) => a.price - b.price);
            } else if (criteria === 'price-high') {
                currentProducts.sort((a, b) => b.price - a.price);
            } else if (criteria === 'name-az') {
                currentProducts.sort((a, b) => a.name.localeCompare(b.name));
            } else {
                currentProducts = [...productsData];
            }
            renderProducts(currentProducts);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const cat = urlParams.get('cat');
            if (cat) {
                const btn = Array.from(document.querySelectorAll('#filter-bar .btn'))
                    .find(b => b.textContent.toLowerCase().includes(cat.toLowerCase()));
                if (btn) filterProducts(cat.charAt(0).toUpperCase() + cat.slice(1), btn);
            } else {
                renderProducts(productsData);
            }
        });
    </script>

<?php get_footer(); ?>
