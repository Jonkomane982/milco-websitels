<?php
/* Template Name: Checkout Page */
get_header(); ?>

    <style>
        .checkout-grid { display: grid; grid-template-columns: 1.5fr 1fr; gap: 40px; margin-top: 40px; }
        .form-section { background: var(--white); padding: 30px; border-radius: 16px; box-shadow: var(--shadow); margin-bottom: 30px; }
        .form-section h2 { margin-bottom: 25px; font-size: 24px; color: var(--primary); border-bottom: 1px solid #eee; padding-bottom: 15px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 500; font-size: 14px; }
        .form-group input, .form-group select { width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: var(--font-body); }
        .summary-panel { background: var(--cream-card); padding: 30px; border-radius: 16px; position: sticky; top: 120px; }
        .order-item { display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 14px; }
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); display: none; justify-content: center; align-items: center; z-index: 2000; backdrop-filter: blur(5px); }
        .success-modal { background: var(--white); padding: 50px; border-radius: 24px; text-align: center; max-width: 500px; width: 90%; animation: fadeUp 0.5s ease; }
    </style>

    <main style="padding: 60px 5%;">
        <h1 style="font-size: 36px; margin-bottom: 10px;">Checkout</h1>
        <p style="color: var(--muted); margin-bottom: 40px;">Complete your order to support local Basotho artisans.</p>

        <form id="checkout-form" class="checkout-grid">
            <!-- LEFT: FORM -->
            <div class="checkout-form-container">
                <div class="form-section">
                    <h2>1. Contact Information</h2>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="full-name" required placeholder="Jonkomanne">
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" id="email" required placeholder="your@email.com">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" id="phone" required placeholder="+266 5892 0000">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>2. Delivery Details</h2>
                    <div class="form-group">
                        <label>Street Address</label>
                        <input type="text" id="address" required placeholder="Kingsway Rd, House 12">
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" id="city" required value="Maseru">
                        </div>
                        <div class="form-group">
                            <label>Delivery Note (Optional)</label>
                            <input type="text" id="note" placeholder="Gate code, landmark, etc.">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>3. Payment Method</h2>
                    <div class="form-group" style="position: relative;">
                        <label>Card Number</label>
                        <input type="text" id="card-number" required placeholder="XXXX XXXX XXXX XXXX" maxlength="19">
                        <div id="card-type-icon" style="position: absolute; right: 15px; top: 38px; font-size: 24px; color: var(--muted);">
                            <i class="fab fa-cc-visa"></i>
                        </div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <input type="text" id="expiry" required placeholder="MM/YY" maxlength="5">
                        </div>
                        <div class="form-group">
                            <label>CVV</label>
                            <input type="text" id="cvv" required placeholder="123" maxlength="3">
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: SUMMARY -->
            <div class="summary-container">
                <div class="summary-panel card">
                    <h2 style="margin-bottom: 25px; font-family: var(--font-display);">Order Summary</h2>
                    <div id="order-items-list" style="margin-bottom: 25px; max-height: 300px; overflow-y: auto; padding-right: 10px;">
                        <!-- Rendered via JS -->
                    </div>
                    <div style="border-top: 1px solid #ddd; padding-top: 20px;">
                        <div class="summary-row" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Subtotal</span>
                            <span id="subtotal">M0</span>
                        </div>
                        <div class="summary-row" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Delivery Fee</span>
                            <span id="delivery-fee">M25</span>
                        </div>
                        <div class="summary-row" style="display: flex; justify-content: space-between; font-weight: bold; font-size: 20px; color: var(--primary); margin-top: 15px;">
                            <span>Total</span>
                            <span id="grand-total">M0</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 30px; padding: 18px; font-size: 18px;">Place Order</button>
                    <p style="text-align: center; font-size: 12px; color: var(--muted); margin-top: 15px;"><i class="fa fa-lock"></i> Secure Encrypted Payment</p>
                </div>
            </div>
        </form>
    </main>

    <!-- SUCCESS MODAL -->
    <div id="success-overlay" class="modal-overlay">
        <div class="success-modal">
            <div style="width: 80px; height: 80px; background: #e6f4ea; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 25px;">
                <i class="fa fa-check" style="font-size: 40px; color: #2ecc71;"></i>
            </div>
            <h1 id="order-id-title" style="margin-bottom: 15px;">Order #ORD-1234 Confirmed! 🎉</h1>
            <p style="color: var(--muted); margin-bottom: 30px;">Thank you for your purchase. We've sent a confirmation email to your inbox.</p>
            <div id="modal-summary" style="background: var(--background); padding: 20px; border-radius: 12px; margin-bottom: 30px; text-align: left;">
                <!-- Summary here -->
            </div>
            <button class="btn btn-primary" onclick="window.location.href='<?php echo esc_url(home_url('/shop')); ?>'" style="width: 100%;">Continue Shopping</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof cart === 'undefined' || cart.length === 0) {
                window.location.href = '<?php echo esc_url(home_url('/shop')); ?>';
                return;
            }

            const list = document.getElementById('order-items-list');
            if (list) {
                list.innerHTML = cart.map(item => `
                    <div class="order-item">
                        <span>${item.name} x ${item.quantity}</span>
                        <span>M${item.price * item.quantity}</span>
                    </div>
                `).join('');
            }

            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const delivery = subtotal > 300 ? 0 : 25;
            if (document.getElementById('subtotal')) document.getElementById('subtotal').textContent = `M${subtotal}`;
            if (document.getElementById('delivery-fee')) document.getElementById('delivery-fee').textContent = delivery === 0 ? 'FREE' : `M${delivery}`;
            if (document.getElementById('grand-total')) document.getElementById('grand-total').textContent = `M${subtotal + delivery}`;

            const cardNumberInput = document.getElementById('card-number');
            if (cardNumberInput) {
                cardNumberInput.addEventListener('input', (e) => {
                    let v = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
                    let matches = v.match(/\d{4,16}/g);
                    let match = matches && matches[0] || '';
                    let parts = [];
                    for (let i=0, len=match.length; i<len; i+=4) {
                        parts.push(match.substring(i, i+4));
                    }
                    if (parts.length) {
                        e.target.value = parts.join(' ');
                    }

                    const icon = document.getElementById('card-type-icon');
                    if (icon) {
                        if (v.startsWith('4')) icon.innerHTML = '<i class="fab fa-cc-visa" style="color: #1a1f71"></i>';
                        else if (v.startsWith('5')) icon.innerHTML = '<i class="fab fa-cc-mastercard" style="color: #eb001b"></i>';
                        else icon.innerHTML = '<i class="fa fa-credit-card"></i>';
                    }
                });
            }

            const expiryInput = document.getElementById('expiry');
            if (expiryInput) {
                expiryInput.addEventListener('input', (e) => {
                    let v = e.target.value.replace(/[^0-9]/gi, '');
                    if (v.length >= 2) {
                        e.target.value = v.substring(0, 2) + '/' + v.substring(2, 4);
                    }
                });
            }

            const checkoutForm = document.getElementById('checkout-form');
            if (checkoutForm) {
                checkoutForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    
                    cart.forEach(item => {
                        if (typeof stock !== 'undefined' && stock[item.id]) {
                            stock[item.id] -= item.quantity;
                        }
                    });
                    if (typeof stock !== 'undefined') localStorage.setItem('stock', JSON.stringify(stock));

                    const orderId = 'ORD-' + Math.floor(1000 + Math.random() * 9000);
                    const order = {
                        id: orderId,
                        date: new Date().toISOString(),
                        items: [...cart],
                        total: subtotal + delivery,
                        customer: document.getElementById('full-name').value
                    };
                    const orders = JSON.parse(localStorage.getItem('orders')) || [];
                    orders.push(order);
                    localStorage.setItem('orders', JSON.stringify(orders));

                    const notif = {
                        id: Date.now(),
                        type: 'Order Confirmed',
                        title: 'Order Successful!',
                        message: `Your order ${orderId} has been placed successfully.`,
                        time: 'Just now',
                        read: false
                    };
                    if (typeof notifications !== 'undefined') {
                        notifications.unshift(notif);
                        localStorage.setItem('notifications', JSON.stringify(notifications));
                    }

                    document.getElementById('order-id-title').textContent = `Order #${orderId} Confirmed! 🎉`;
                    document.getElementById('modal-summary').innerHTML = `
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;"><strong>Customer:</strong> <span>${order.customer}</span></div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;"><strong>Total Paid:</strong> <span>M${order.total}</span></div>
                        <div style="display: flex; justify-content: space-between;"><strong>Items:</strong> <span>${cart.length} unique products</span></div>
                    `;
                    document.getElementById('success-overlay').style.display = 'flex';

                    localStorage.removeItem('cart');
                    if (typeof updateCartCount === 'function') updateCartCount();
                });
            }
        });
    </script>

<?php get_footer(); ?>
