// Document Event Listeners
document.addEventListener('DOMContentLoaded', () =>{
    dateValidation();
})

// Get rooms customer would like to book
function getRoomTypes() {
    const roomQTY = document.getElementById('numOfRooms').value;
    if (parseInt(roomQTY) <= 3) {

        const inputField = document.querySelector('.rooms');
        inputField.innerHTML = ``;

        for (let i = 1; i < parseInt(roomQTY) + 1; i++) {
            inputField.insertAdjacentHTML('beforeend', `<label for="roomType${i}"><h3>Room type-${i}</h3></label>
                        <select name="roomType${i}" id="roomType${i}">
                            <option value="single">Single Bed</option>
                            <option value="double">Double Bed</option>
                            <option value="mixed">Family Room</option>
                        </select> <br>`);
        }
    } else {
        console.log('Array too large');
    }
}

// Start Date and End Date VAlidation
function dateValidation() {

    // Source - https://stackoverflow.com/a
    // Posted by ATP, modified by community. See post 'Timeline' for change history
    // Retrieved 2026-01-19, License - CC BY-SA 4.0

    document.getElementById("startDate").min = new Date().toISOString().split("T")[0];

    // Get Starting Date
    document.getElementById('startDate').addEventListener('change', function () {
        var startDate = this.value;
        var start = new Date(startDate);
        let lastDate = new Date( start.setDate(start.getDate() + 1));
        document.getElementById('finDate').min = lastDate.toISOString().split("T")[0];
    });

    // Finishing Date Minimum Vale
    


}