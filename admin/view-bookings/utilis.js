// Event Listeners
document.addEventListener('DOMContentLoaded', () =>{
    color();
})
// Color Code Room Properties
function color(){
    const allTD = document.querySelectorAll('td');
    allTD.forEach(td => {
        if(td.textContent.toLowerCase() === 'double'){
            td.style.backgroundColor = 'orange';
        }
        if(td.textContent.toLowerCase() === 'single'){
            td.style.backgroundColor = 'blue';
            td.style.color = 'white';
        }
        if(td.textContent.toLowerCase() === 'mixed'){
            td.style.backgroundColor = 'green';
        }
        if(td.textContent.toLowerCase() === 'free'){
            td.style.backgroundColor = 'yellow';
        }
        if(td.textContent.toLowerCase() === 'booked'){
            td.style.backgroundColor = 'red';
            td.style.color = 'white';
        }
    })
}