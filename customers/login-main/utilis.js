// Add event Listeners
window.addEventListener("DOMContentLoaded", ()=>{
    checkMarketing();
})

// Function to check Marketing
function checkMarketing(){
    const select = document.getElementById('marketingCon');
    const checkval = document.getElementById('hiddenInput');

    const options = select.querySelectorAll('option');
    options.forEach(option => {
        if(option.value === checkval.value){
            option.selected = true;
        }else{
            option.selected = false;
        }
    })

}

// Function to display relative section on button press
function loadContent(category){
    const Allbody = document.querySelector('.all');
    const elements = Allbody.querySelectorAll('section:not(.form)');
    const hello = document.querySelector('.hello');
    elements.forEach(el => {
        if(category === 'All' || el.dataset.category === category){
            el.style.display = 'block';
            hello.style.display = 'none';
        }else{
            el.style.display = 'none';
            hello.style.display = 'none';
        }
    });
}