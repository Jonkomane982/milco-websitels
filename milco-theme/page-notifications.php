<?php
/* Template Name: Notifications Page */
get_header(); ?>

    <style>
        .notif-item { display: flex; gap: 20px; padding: 25px; border-bottom: 1px solid rgba(27, 67, 50, 0.1); transition: var(--transition); }
        .notif-item:hover { background: var(--white); }
        .notif-item.unread { border-left: 4px solid var(--accent); background: #fffcf5; }
        .notif-icon { width: 50px; height: 50px; border-radius: 50%; display: flex; justify-content: center; align-items: center; background: var(--background); color: var(--primary); font-size: 20px; flex-shrink: 0; }
        .notif-content { flex-grow: 1; }
        .notif-time { font-size: 12px; color: var(--muted); margin-top: 5px; }
    </style>

    <main style="padding: 60px 5%; max-width: 900px; margin: 0 auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
            <h1 style="font-size: 36px;">Notifications</h1>
            <button class="btn btn-outline" onclick="markAllAsRead()">Mark all as read</button>
        </div>

        <div id="notif-list" class="card">
            <!-- Rendered via JS -->
        </div>

        <div id="empty-notif" style="display: none; text-align: center; padding: 100px 20px;">
            <i class="fa fa-bell-slash" style="font-size: 64px; color: var(--muted); margin-bottom: 20px;"></i>
            <h2>No notifications yet</h2>
            <p style="color: var(--muted);">We'll let you know when something important happens.</p>
        </div>
    </main>

    <script>
        function renderNotifications() {
            const list = document.getElementById('notif-list');
            const empty = document.getElementById('empty-notif');

            if (!list) return;

            if (notifications.length === 0) {
                list.style.display = 'none';
                if (empty) empty.style.display = 'block';
                return;
            }

            list.innerHTML = notifications.map((n, index) => `
                <div class="notif-item ${n.read ? '' : 'unread'}">
                    <div class="notif-icon">
                        <i class="fa ${getNotifIcon(n.type)}"></i>
                    </div>
                    <div class="notif-content">
                        <h3 style="font-size: 16px;">${n.title}</h3>
                        <p style="font-size: 14px; color: var(--text);">${n.message}</p>
                        <p class="notif-time">${n.time}</p>
                    </div>
                    ${!n.read ? `<button class="btn btn-outline" style="padding: 5px 15px; font-size: 12px;" onclick="markAsRead(${index})">Read</button>` : ''}
                </div>
            `).join('');
        }

        function getNotifIcon(type) {
            switch(type) {
                case 'Order Confirmed': return 'fa-check-circle';
                case 'New Product': return 'fa-star';
                case 'Back in Stock': return 'fa-box';
                case 'Recommendation': return 'fa-heart';
                default: return 'fa-bell';
            }
        }

        function markAsRead(index) {
            notifications[index].read = true;
            localStorage.setItem('notifications', JSON.stringify(notifications));
            renderNotifications();
            if (typeof updateNotifBadge === 'function') updateNotifBadge();
        }

        function markAllAsRead() {
            notifications.forEach(n => n.read = true);
            localStorage.setItem('notifications', JSON.stringify(notifications));
            renderNotifications();
            if (typeof updateNotifBadge === 'function') updateNotifBadge();
        }

        document.addEventListener('DOMContentLoaded', renderNotifications);
    </script>

<?php get_footer(); ?>
