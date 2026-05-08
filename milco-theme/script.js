// Product Data
const productsData = [
    {
        id: 'accessories-baskets',
        name: 'Accessories Baskets',
        description: 'Beautifully crafted local baskets for all your needs.',
        price: 120,
        category: 'Crafts',
        image: milcoTheme.templateUrl + '/products/Assessories Baskets.jpg',
        isNew: true
    },
    {
        id: 'highland-milk',
        name: 'Highland Milk',
        description: 'Fresh and creamy milk from the highlands of Lesotho.',
        price: 25,
        category: 'Food',
        image: milcoTheme.templateUrl + '/products/Highland milk.png',
        isNew: true
    },
    {
        id: 'jmm-wine',
        name: 'JMM Wine',
        description: 'Premium local wine with a unique Basotho flavor.',
        price: 150,
        category: 'Food',
        image: milcoTheme.templateUrl + '/products/JMM Wine.jpg',
        isNew: true
    },
    {
        id: 'vinegar',
        name: 'Vinegar',
        description: 'Pure and natural vinegar, perfect for any kitchen.',
        price: 35,
        category: 'Food',
        image: milcoTheme.templateUrl + '/products/Vinegar.jpg',
        isNew: false
    },
    {
        id: 'basotho-blanket',
        name: 'Basotho Blanket',
        description: 'Authentic traditional wool blanket with heritage patterns.',
        price: 850,
        category: 'Crafts',
        image: milcoTheme.templateUrl + '/products/basotho blanket.jpg',
        isNew: false
    },
    {
        id: 'boriba-sauce',
        name: 'Boriba Sauce',
        description: 'Spicy and flavorful sauce made from local ingredients.',
        price: 45,
        category: 'Food',
        image: milcoTheme.templateUrl + '/products/boriba source.jpg',
        isNew: false
    },
    {
        id: 'decoration-grass-basin-pot',
        name: 'Decoration Grass Basin and Pot',
        description: 'Exquisite grass-woven decor for your home.',
        price: 200,
        category: 'Home',
        image: milcoTheme.templateUrl + '/products/decoration grass Basin and Pot.jpg',
        isNew: false
    },
    {
        id: 'decoration-grass-basin',
        name: 'Decoration Grass Basin',
        description: 'Elegant grass-woven basin, perfect for decoration.',
        price: 150,
        category: 'Home',
        image: milcoTheme.templateUrl + '/products/decoration grass Basin.jpg',
        isNew: false
    },
    {
        id: 'goat-milk',
        name: 'Goat Milk',
        description: 'Healthy and nutritious fresh goat milk.',
        price: 30,
        category: 'Food',
        image: milcoTheme.templateUrl + '/products/goad milk.jpeg',
        isNew: false
    },
    {
        id: 'mokorotlo',
        name: 'Mokorotlo',
        description: 'The iconic traditional Basotho hat.',
        price: 180,
        category: 'Crafts',
        image: milcoTheme.templateUrl + '/products/Mokorotlo hat.jpg',
        isNew: false
    },
    {
        id: 'other-products',
        name: 'Other Local Products',
        description: 'A variety of unique items from Lesotho.',
        price: 100,
        category: 'Food',
        image: milcoTheme.templateUrl + '/products/other products.jpg',
        isNew: false
    },
    {
        id: 'pumpkin-juice',
        name: 'Pumpkin Juice',
        description: 'Refreshing and natural pumpkin juice.',
        price: 40,
        category: 'Food',
        image: milcoTheme.templateUrl + '/products/pumpkin juice.jpg',
        isNew: false
    },
    {
        id: 'tholoana-drink',
        name: 'Tholoana Drink',
        description: 'A delicious local beverage for everyone.',
        price: 30,
        category: 'Food',
        image: milcoTheme.templateUrl + '/products/tholoana Drink.jpg',
        isNew: false
    }
];

// State Management
let cart = JSON.parse(localStorage.getItem('cart')) || [];
let stock = JSON.parse(localStorage.getItem('stock')) || {};
let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
let viewHistory = JSON.parse(localStorage.getItem('viewHistory')) || [];
let purchaseHistory = JSON.parse(localStorage.getItem('purchaseHistory')) || [];

// Initialize Stock if not exists
if (Object.keys(stock).length === 0) {
    productsData.forEach(p => {
        stock[p.id] = 20;
    });
    localStorage.setItem('stock', JSON.stringify(stock));
}

// Global Functions
function updateCartCount() {
    const totalCount = cart.reduce((sum, item) => sum + item.quantity, 0);
    const badge = document.getElementById('cart-count');
    if (badge) {
        badge.textContent = totalCount;
        badge.style.display = totalCount > 0 ? 'flex' : 'none';
    }
}

function updateNotifBadge() {
    const unreadCount = notifications.filter(n => !n.read).length;
    const badge = document.getElementById('notif-badge');
    if (badge) {
        badge.textContent = unreadCount;
        badge.style.display = unreadCount > 0 ? 'flex' : 'none';
    }
}

function showToast(message) {
    let toast = document.getElementById('toast');
    if (!toast) {
        toast = document.createElement('div');
        toast.id = 'toast';
        toast.className = 'toast';
        document.body.appendChild(toast);
    }
    toast.innerHTML = `<i class="fa fa-check-circle" style="color: var(--primary)"></i> ${message}`;
    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

function addToCart(productId) {
    const product = productsData.find(p => p.id === productId);
    if (!product) return;

    if (stock[productId] <= 0) {
        alert('Out of Stock!');
        return;
    }

    const cartItem = cart.find(item => item.id === productId);
    if (cartItem) {
        if (cartItem.quantity + 1 > stock[productId]) {
            alert('Not enough stock available!');
            return;
        }
        cartItem.quantity += 1;
    } else {
        cart.push({
            id: productId,
            name: product.name,
            price: product.price,
            image: product.image,
            quantity: 1
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    showToast(`${product.name} added to cart!`);
    
    // Animation for badge
    const badge = document.getElementById('cart-count');
    if (badge) {
        badge.classList.remove('pulse');
        void badge.offsetWidth; // trigger reflow
        badge.classList.add('pulse');
    }
}

function trackView(productId) {
    if (!viewHistory.includes(productId)) {
        viewHistory.push(productId);
        localStorage.setItem('viewHistory', JSON.stringify(viewHistory));
    }
}

// UI Components
function createProductCard(product) {
    const isOutOfStock = stock[product.id] <= 0;
    return `
        <div class="card product-card fade-up" data-category="${product.category}">
            <div class="product-img-wrapper">
                <img src="${product.image}" alt="${product.name}">
                <div class="quick-view-overlay" onclick="trackView('${product.id}'); window.location.href='${milcoTheme.templateUrl}/shop.html?id=${product.id}'">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div class="product-content">
                <span class="category-badge">${product.category}</span>
                <h3 class="product-name">${product.name}</h3>
                <p class="product-desc">${product.description}</p>
                <div class="product-footer">
                    <span class="price">M${product.price}</span>
                    <span class="stock">${isOutOfStock ? 'Out of Stock' : `${stock[product.id]} left`}</span>
                </div>
                <button class="btn btn-primary add-to-cart-btn" 
                        onclick="addToCart('${product.id}')" 
                        ${isOutOfStock ? 'disabled' : ''}>
                    ${isOutOfStock ? 'Sold Out' : '<i class="fa fa-cart-plus"></i> Add to Cart'}
                </button>
            </div>
        </div>
    `;
}

// Recommendations Logic
function displayRecommendations() {
    const container = document.getElementById('recommendations');
    if (!container) return;

    let recommended = [];
    const history = [...purchaseHistory, ...viewHistory];
    
    if (history.length > 0) {
        // Find most frequent category in history
        const categories = {};
        history.forEach(id => {
            const p = productsData.find(prod => prod.id === id);
            if (p) categories[p.category] = (categories[p.category] || 0) + 1;
        });
        const topCategory = Object.keys(categories).reduce((a, b) => categories[a] > categories[b] ? a : b);
        recommended = productsData.filter(p => p.category === topCategory && !purchaseHistory.includes(p.id)).slice(0, 3);
    }

    if (recommended.length < 3) {
        const remaining = productsData
            .filter(p => !recommended.find(r => r.id === p.id))
            .sort(() => 0.5 - Math.random())
            .slice(0, 3 - recommended.length);
        recommended = [...recommended, ...remaining];
        const heading = document.getElementById('recommendation-heading');
        if (heading && history.length === 0) heading.textContent = 'Popular Picks';
    }

    container.innerHTML = recommended.map(p => createProductCard(p)).join('');
}

// Intersection Observer for staggered fade-in
const observerOptions = {
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add('show');
            }, index * 100);
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

function initAnimations() {
    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
}

function initMobileNav() {
    const header = document.querySelector('header');
    const nav = document.querySelector('nav');
    if (!header || !nav) return;
    
    const menuBtn = document.createElement('div');
    menuBtn.className = 'menu-btn';
    menuBtn.innerHTML = '<i class="fa fa-bars"></i>';
    menuBtn.style.display = 'none';
    menuBtn.style.fontSize = '24px';
    menuBtn.style.cursor = 'pointer';
    
    header.insertBefore(menuBtn, header.querySelector('.nav-icons'));

    // Mobile detect
    if (window.innerWidth <= 600) {
        menuBtn.style.display = 'block';
        nav.style.display = 'none';
        nav.style.position = 'absolute';
        nav.style.top = '100%';
        nav.style.left = '0';
        nav.style.width = '100%';
        nav.style.background = 'var(--background)';
        nav.style.padding = '20px';
        nav.style.boxShadow = '0 10px 10px rgba(0,0,0,0.1)';
        
        const ul = nav.querySelector('ul');
        if (ul) {
            ul.style.flexDirection = 'column';
            ul.style.alignItems = 'flex-start';
        }
    }

    menuBtn.addEventListener('click', () => {
        const isVisible = nav.style.display === 'block';
        nav.style.display = isVisible ? 'none' : 'block';
        menuBtn.innerHTML = isVisible ? '<i class="fa fa-bars"></i>' : '<i class="fa fa-times"></i>';
    });
}

// Init on Page Load
document.addEventListener('DOMContentLoaded', () => {
    updateCartCount();
    updateNotifBadge();
    initAnimations();
    displayRecommendations();
    initMobileNav();
});
