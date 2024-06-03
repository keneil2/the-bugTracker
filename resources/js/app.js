import './bootstrap';

Echo.private(`notification.${id}`)
    .listen('notify', (e) => {
        console.log(`working ?`);
    });
