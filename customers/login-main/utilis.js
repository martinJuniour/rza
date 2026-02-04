// Add event Listeners
window.addEventListener("DOMContentLoaded", () => {
    checkMarketing();
})

// Function to check Marketing
function checkMarketing() {
    const select = document.getElementById('marketingCon');
    const checkval = document.getElementById('hiddenInput');

    const options = select.querySelectorAll('option');
    options.forEach(option => {
        if (option.value === checkval.value) {
            option.selected = true;
        } else {
            option.selected = false;
        }
    })

}

// Function to display relative section on button press
function loadContent(category) {
    const Allbody = document.querySelector('.all');
    const elements = Allbody.querySelectorAll('section:not(.form)');
    const hello = document.querySelector('.hello');
    elements.forEach(el => {
        if (category === 'All' || el.dataset.category === category) {
            el.style.display = 'block';
            hello.style.display = 'none';
        } else {
            el.style.display = 'none';
            hello.style.display = 'none';
        }
    });
}


// Chaneg Password diplayed content
function changePass() {
    const form = document.querySelector('form');

    // Form Content Before
    const formBefore = form.innerHTML;
    const formAfter = `<form action="">
                            <label for="oldPAss"><i>Enter Old Password</i></label><br><br>
                            <input type="password" name="oldPAss">
                        <br><br>
                            <label for="newPAss"><i>Enter New Password</i></label><br><br>                                            
                            <input type="password" name="newPAss">
                        </form>`

    // Change PAsswprd BUtton
    const passBtn = document.querySelector('.pass');
    passBtn.addEventListener('click', () => {
        form.innerHTML = formAfter;
    })
}