// Enent Llistener
window.addEventListener("DOMContentLoaded", () => {
    change();
})
// Call Function
document.getElementById('save-access').addEventListener('click', () => {
    access();
})
// Accessibility Settings
function access() {
    const fontSize = document.getElementById('font-size').value;
    const viewImages = document.getElementById('view-images');
    const boldText = document.getElementById('bold-text');


    // Font Size Manipu;lation
    if (fontSize === 'small') {
        // Set zoom to 70%
        if (localStorage.getItem('font-Size')) {
            localStorage.removeItem('fontSize');
            localStorage.setItem('font-Size', ['small', 50]);
        } else {
            localStorage.setItem('font-Size', ['small', 50]);
        }
    }
    else if (fontSize === 'default') {
        // zoom to 100% -- Default
        if (localStorage.getItem('font-Size')) {
            localStorage.removeItem('font-Size');
            localStorage.setItem('font-Size', ['default', 100]);
        } else {
            localStorage.setItem('font-Size', ['default', 100]);
        }
    }
    else {
        // Zoom to 150%
        if (localStorage.getItem('font-Size')) {
            localStorage.removeItem('fontSize');
            localStorage.setItem('font-Size', ['large', 150]);
        } else {
            localStorage.setItem('font-Size', ['large', 150]);
        }
    }

    // Display Theme --- Coming Soon


    // View Images
    if (viewImages.checked) {
        if (localStorage.getItem('view-Images')) {
            localStorage.removeItem('view-Images');
            localStorage.setItem('view-Images', 'yes');
        } else {
            localStorage.setItem('view-Images', 'yes');
        }
    } else {
        if (localStorage.getItem('view-Images')) {
            localStorage.removeItem('view-Images');
            localStorage.setItem('view-Images', 'no');
        } else {
            localStorage.setItem('view-Images', 'no');
        }
    }


    // Bold all text
    if (boldText.checked) {
        if (localStorage.getItem('bold')) {
            localStorage.removeItem('bold');
            localStorage.setItem('bold', 'yes');
        } else {
            localStorage.setItem('bold', 'no');
        }
    } else {
        if (localStorage.getItem('bold')) {
            localStorage.removeItem('bold');
            localStorage.setItem('bold', 'no');
        } else {
            localStorage.setItem('bold', 'no');
        }
    }

}

// Update options to current states
function change() {
    const fontSelection = document.getElementById('font-size');
    const options = fontSelection.querySelectorAll('option');

    options.forEach(option => {
        if (localStorage.getItem('font-Size')) {
            if (localStorage.getItem('font-Size').split(",")[0] === option.value) {
                option.selected = true;
            } else {
                option.selected = false;
            }
        }
        else {
            // Dont Do anything
        }

    })

    // View Images
    const imgOption = document.getElementById('view-images');
    if (localStorage.getItem('view-Images') && localStorage.getItem('view-Images') === 'yes') {
        // Check Box should be ticked
        imgOption.checked = true;
    } else {
        // Check Should be off
        imgOption.checked = false;
    }


    // Bold Option
    const boldOption = document.getElementById('bold-text');
    if (localStorage.getItem('bold') && localStorage.getItem('bold') === 'yes') {
        // Check Box should be ticked
        boldOption.checked = true;
    } else {
        // Check Should be off
        boldOption.checked = false;
    }

}