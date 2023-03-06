import './bootstrap';

document.getElementById("notification_toggle").addEventListener('click', (e) =>{
    document.querySelector(".notification__wrapper").classList.toggle('visible');
})