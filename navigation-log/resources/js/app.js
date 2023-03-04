import './bootstrap';

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

