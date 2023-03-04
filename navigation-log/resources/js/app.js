import './bootstrap';


document.querySelector('.show').addEventListener('click', (e) => {
    console.log(e.target);

    document.querySelector('.show + #show__inside').classList.toggle('visible');
});

document.querySelector('.mobile__menu_button').addEventListener('click', (e) => {
    console.log(e.target);

    document.querySelector('.mobile__menu_button + .mobile__menu').classList.toggle('opening');
});

// let entryBox = document.getElementById('entry');

// entryBox.addEventListener('keypress', (e) => {
//     document.getElementById('wordCounter').textContent = `${entryBox.value.split(' ').length}`;
// });
    
document.getElementById('message__send').addEventListener("keydown", (e) =>
{
        if(e.key === 'Enter'){
            document.getElementById('message__send').submit();
        }
}
)

