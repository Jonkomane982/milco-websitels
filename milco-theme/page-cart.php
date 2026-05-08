<?php
/* Template Name: Cart Page */
get_header(); ?>

    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th { text-align: left; padding: 20px; border-bottom: 2px solid var(--primary); color: var(--primary); font-family: var(--font-display); }
        td { padding: 20px; border-bottom: 1px solid rgba(27, 67, 50, 0.1); vertical-align: middle; }
        .cart-img { width: 80px; height: 80px; object-fit: cover; border-radius: 8px; }
        .qty-control { display: flex; align-items: center; gap: 10px; }
        .qty-btn { background: var(--background); border: 1px solid var(--primary); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; font-weight: bold; }
        .qty-btn:disabled { opacity: 0.3; cursor: not-allowed; }
        .summary-panel { background: var(--white); padding: 30px; border-radius: 16px; box-shadow: var(--shadow); height: fit-content; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 16px; }
        .summary-total { border-top: 1px solid #ddd; padding-top: 15px; margin-top: 15px; font-weight: bold; font-size: 20px; color: var(--primary); }
    </style>

    <main style="padding: 60px 5%;">
        <h1 style="font-size: 36px; margin-bottom: 40px;">Your Cart (<span id="cart-items-count">0</span>)</h1>

        <div id="cart-content" style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <!-- CART ITEMS -->
            <div class="card" style="padding: 20px;">
                <table id="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cart-items-body">
                        <!-- Rendered via JS -->
                    </tbody>
                </table>
                <div id="empty-cart-msg" style="display: none; text-align: center; padding: 60px 20px;">
                    <i class="fa fa-shopping-cart" style="font-size: 64px; color: var(--muted); margin-bottom: 20px;"></i>
                    <h2>Your cart is empty</h2>
                    <p style="margin-bottom: 30px; color: var(--muted);">Looks like you haven't added anything to your cart yet.</p>
                    <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-primary">Start Shopping</a>
                </div>
            </div>

            <!-- SUMMARY PANEL -->
            <div id="summary-container">
                <div class="summary-panel">
                    <h2 style="margin-bottom: 25px;">Order Summary</h2>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="subtotal">M0</span>
                    </div>
                    <div class="summary-row">
                        <span>Delivery</span>
                        <span id="delivery-fee">M25</span>
                    </div>
                    <div id="free-delivery-msg" style="font-size: 12px; color: var(--primary); margin-top: -10px; margin-bottom: 15px; font-weight: 500;">
                        Free delivery on orders over M300!
                    </div>
                    <div class="summary-row summary-total">
                        <span>Total</span>
                        <span id="grand-total">M0</span>
                    </div>
                    <button class="btn btn-primary" onclick="window.location.href='<?php echo esc_url(home_url('/checkout')); ?>'" style="width: 100%; margin-top: 20px; padding: 15px;">Proceed to Checkout</button>
                    <a href="<?php echo esc_url(home_url('/shop')); ?>" style="display: block; text-align: center; margin-top: 15px; font-size: 14px; color: var(--muted);"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
                </div>
            </div>
        </div>
    </main>

    <script>
        function renderCart() {
            const body = document.getElementById('cart-items-body');
            const cartContent = document.getElementById('cart-content');
            const emptyCartMsg = document.getElementById('empty-cart-msg');
            const cartTable = document.getElementById('cart-table');
            const summary = document.getElementById('summary-container');
            const itemsCount = document.getElementById('cart-items-count');

            if (!body) return;

            if (cart.length === 0) {
                if (cartTable) cartTable.style.display = 'none';
                if (summary) summary.style.display = 'none';
                if (emptyCartMsg) emptyCartMsg.style.display = 'block';
                if (cartContent) cartContent.style.gridTemplateColumns = '1fr';
                if (itemsCount) itemsCount.textContent = '0';
                return;
            }

            body.innerHTML = cart.map((item, index) => `
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <img src="${item.image}" class="cart-img" alt="${item.name}">
                            <span style="font-weight: 500;">${item.name}</span>
                        </div>
                    </td>
                    <td>M${item.price}</td>
                    <td>
                        <div class="qty-control">
                            <button class="qty-btn" onclick="updateQty(${index}, -1)" ${item.quantity <= 1 ? 'disabled' : ''}>-</button>
                            <span style="width: 20px; text-align: center;">${item.quantity}</span>
                            <button class="qty-btn" onclick="updateQty(${index}, 1)">+</button>
                        </div>
                    </td>
                    <td style="font-weight: bold; color: var(--primary);">M${item.price * item.quantity}</td>
                    <td>
                        <button onclick="removeItem(${index})" style="background: none; border: none; color: #ff4d4d; cursor: pointer; font-size: 18px;">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            `).join('');

            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const delivery = subtotal > 300 ? 0 : 25;
            
            if (document.getElementById('subtotal')) document.getElementById('subtotal').textContent = `M${subtotal}`;
            if (document.getElementById('delivery-fee')) document.getElementById('delivery-fee').textContent = delivery === 0 ? 'FREE' : `M${delivery}`;
            if (document.getElementById('grand-total')) document.getElementById('grand-total').textContent = `M${subtotal + delivery}`;
            if (document.getElementById('free-delivery-msg')) document.getElementById('free-delivery-msg').style.display = subtotal > 300 ? 'none' : 'block';
            if (itemsCount) itemsCount.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
        }

        function updateQty(index, delta) {
            cart[index].quantity += delta;
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
            if (typeof updateCartCount === 'function') updateCartCount();
        }

        function removeItem(index) {
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
            if (typeof updateCartCount === 'function') updateCartCount();
            if (typeof showToast === 'function') showToast('Item removed from cart.');
        }

        document.addEventListener('DOMContentLoaded', renderCart);
    </script>

<?php get_footer(); ?>
