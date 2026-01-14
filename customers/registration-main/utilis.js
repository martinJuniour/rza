// Event Listeners
document.getElementById('marketing').addEventListener('change', () => {
    checkBool();
})


// Fucntion for assigning check value
function checkBool(){
    const  check = document.getElementById('marketing');
    const hiddenInput = document.getElementById('hiddenInput');

    if(check.checked){
        hiddenInput.value = 'yes';
    }else{
        hiddenInput.value = 'no';
    }
} 