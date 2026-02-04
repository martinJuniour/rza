// On page Load -- Check Accessibility settings
// Read Whats in the storage
window.addEventListener("DOMContentLoaded", () => {

    // Font Size
    // Divide by 100 --- Zoom as a decimal
    const scale = localStorage.getItem('font-Size');
    document.querySelector('body').style.fontSize = scale.split(",")[1] + "%";
    document.querySelectorAll('p:not(#close-nav)').forEach(p =>{
        p.style.fontSize = scale.split(",")[1] + "%";
    })


    // Viewing images
    const viewImages = localStorage.getItem('view-Images');
    if (viewImages && viewImages === 'no') {
        const allImages = document.querySelector('body').querySelectorAll('img:not(header img, footer img)');
        allImages.forEach(img => {
            img.src = '1';
        })
    } else {
        // Don not display images
    }


    // Bold Text
    const bold = localStorage.getItem('bold');
    if (bold) {
        if (bold === 'no') {
            document.querySelector('body').style.fontWeight = 'normal';
            document.querySelectorAll('h1, h2, h3, h4, h5, h6, label, input, button, a, div, tr, th, td').forEach(h =>{
                h.style.fontWeight = 'normal';
            })
        } else {
            document.querySelector('body').style.fontWeight = '1000';
            document.querySelectorAll('h1, h2, h3, h4, h5, h6, label, input, button, a, div, tr, th, td').forEach(h =>{
                h.style.fontWeight = '1000';
            })
        }
    }else{
        document.querySelector('body').style.fontWeight = 'normal';
    }


})
