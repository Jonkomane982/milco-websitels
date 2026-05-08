<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- HEADER -->
    <header>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-container">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 2C10.0589 2 2 10.0589 2 20C2 29.9411 10.0589 38 20 38C29.9411 38 38 29.9411 38 20C38 10.0589 29.9411 20 20 2ZM26.4142 13.5858C28.1716 15.3431 28.1716 18.1883 26.4142 19.9457L20 26.3599L13.5858 19.9457C11.8284 18.1883 11.8284 15.3431 13.5858 13.5858C15.3431 11.8284 18.1883 11.8284 19.9457 13.5858L20 13.6401L20.0543 13.5858C21.8117 11.8284 24.6569 11.8284 26.4142 13.5858Z" fill="#1B4332"/>
            </svg>
            <div class="logo-text">
                <h1>MILCO</h1>
                <p>Made in Lesotho</p>
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo is_front_page() ? 'active' : ''; ?>">Home</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop')); ?>">Shop</a></li>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                <li><a href="<?php echo esc_url(home_url('/#new-arrivals')); ?>">New Arrivals</a></li>
                <li><a href="<?php echo esc_url(home_url('/stakeholders')); ?>">Stakeholders</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
            </ul>
        </nav>
        <div class="nav-icons">
            <a href="<?php echo esc_url(home_url('/notifications')); ?>" class="icon-btn">
                <i class="fa fa-bell"></i>
                <span id="notif-badge" class="badge-count">0</span>
            </a>
            <a href="<?php echo esc_url(home_url('/cart')); ?>" class="icon-btn">
                <i class="fa fa-shopping-bag"></i>
                <span id="cart-count" class="badge-count">0</span>
            </a>
        </div>
    </header>
