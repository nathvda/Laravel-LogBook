import Alpine from 'alpinejs'
import './bootstrap';

window.Alpine = Alpine

Alpine.start()

document.getElementById("notification_toggle").addEventListener('click', (e) =>{
    document.querySelector(".notification__wrapper").classList.toggle('visible');
})