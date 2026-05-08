<?php
/* Template Name: Contact Page */
get_header(); ?>

    <style>
        .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; margin-top: 60px; }
        .contact-info-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: -50px; position: relative; z-index: 10; padding: 0 5%; }
        .info-card { background: var(--white); padding: 30px; border-radius: 16px; box-shadow: var(--shadow); text-align: center; }
        .info-card i { font-size: 32px; color: var(--accent); margin-bottom: 15px; }
        .contact-form { background: var(--white); padding: 40px; border-radius: 16px; box-shadow: var(--shadow); }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 500; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: var(--font-body); }
        .map-container { border-radius: 16px; overflow: hidden; box-shadow: var(--shadow); height: 100%; min-height: 400px; }
    </style>

    <!-- HERO SECTION -->
    <section style="height: 300px; position: relative; display: flex; align-items: center; justify-content: center; color: var(--background);">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(rgba(27, 67, 50, 0.6), rgba(27, 67, 50, 0.6)), url('https://images.unsplash.com/photo-1526958097901-5e6d742d3371?w=1200&q=80'); background-size: cover; background-position: center;"></div>
        <div style="position: relative; text-align: center;">
            <h1 style="font-size: 48px; font-family: var(--font-display);">Get In Touch</h1>
            <p>We'd love to hear from you</p>
        </div>
    </section>

    <!-- INFO CARDS -->
    <div class="contact-info-cards">
        <div class="info-card">
            <i class="fa fa-map-marker-alt"></i>
            <h3>Location</h3>
            <p>Sefika Complex, Maseru<br>Lesotho</p>
        </div>
        <div class="info-card">
            <i class="fa fa-phone"></i>
            <h3>Phone</h3>
            <p>+266 5892 1648<br>Mon-Fri, 8am-5pm</p>
        </div>
        <div class="info-card">
            <i class="fa fa-clock"></i>
            <h3>Hours</h3>
            <p>Sat: 9am-1pm<br>Sun: Closed</p>
        </div>
    </div>

    <main style="padding: 80px 5%;">
        <div class="contact-grid">
            <!-- CONTACT FORM -->
            <div class="contact-form">
                <h2 style="margin-bottom: 30px; font-family: var(--font-display);">Send us a Message</h2>
                <form id="contact-form">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="contact-name" required placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" id="contact-email" required placeholder="your@email.com">
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <select id="contact-subject" required>
                            <option value="" disabled selected>Choose a subject</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Order Status">Order Status</option>
                            <option value="Product Suggestion">Product Suggestion</option>
                            <option value="Wholesale">Wholesale/Partnership</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea id="contact-message" required rows="5" placeholder="How can we help you?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px;">Send Message</button>
                </form>
            </div>

            <!-- MAP -->
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.336427321045!2d27.4833!3d-29.3167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e8d0526e84d33b5%3A0x2727272727272727!2sSefika%20Complex!5e0!3m2!1sen!2sls!4v1234567890123!5m2!1sen!2sls" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const contactForm = document.getElementById('contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const message = {
                        id: Date.now(),
                        name: document.getElementById('contact-name').value,
                        email: document.getElementById('contact-email').value,
                        subject: document.getElementById('contact-subject').value,
                        text: document.getElementById('contact-message').value,
                        date: new Date().toISOString()
                    };

                    const messages = JSON.parse(localStorage.getItem('contactMessages')) || [];
                    messages.push(message);
                    localStorage.setItem('contactMessages', JSON.stringify(messages));

                    if (typeof showToast === 'function') {
                        showToast("Message sent! We'll get back to you within 24 hours.");
                    }
                    e.target.reset();
                });
            }
        });
    </script>

<?php get_footer(); ?>
