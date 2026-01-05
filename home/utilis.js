const navBtn = document.getElementById('nav-btn');
navBtn.addEventListener('click', ()=>{
    navShow();
})
if(document.getElementById('close-nav')){
    document.getElementById('close-nav').addEventListener('click', ()=>{
        navShow();
    })
}
function navShow(){
    const nav = document.querySelector('nav');
    nav.classList.toggle('open');
}
