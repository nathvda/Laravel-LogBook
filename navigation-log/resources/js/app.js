import './bootstrap';


document.querySelector('.show').addEventListener('click', (e) => {
    console.log(e.target);

    document.querySelector('.show + #show__inside').classList.toggle('visible');
});

document.querySelector('.mobile__menu_button').addEventListener('click', (e) => {
    console.log(e.target);

    document.querySelector('.mobile__menu_button + .mobile__menu').classList.toggle('opening');
});