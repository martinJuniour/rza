# Ridget Zoo Adventures Booking System (Hotel and Safari Tickets)

RZA is a fictional zoo and this system is for booking safari tickets as well as hotel accomodation.

# Featured: Automated Room Allocation
[`bookings/hotel-tickets/room.php`](https://github.com/martinJuniour/rza/blob/main/bookings/hotel-tickets/room.php)

room.php is a rules-based allocation engine for the RZA booking system. For each requested room type, it finds available rooms, checks the requested dates against existing bookings to prevent overlaps, and updates each room’s booking count and status. It works all-or-nothing: if the full request can’t be met, it reverses the changes it made before sending the user to the cancellation page.

room.php works in conjunction with inputs from other files.

To Sum it Up
- Checks room availability across multiple room types
- Prevents double-booking with a date-overlap rule (`rangeCheck()`)
- Updates room status automatically
- Rolls back partial bookings if the full request can't be met

## About the Wider Project
College project, but I chose to go beyond the brief on the booking logic - Increase user experience for a real life similar system.

Tech | PHP · MySQL · HTML/CSS

## Project Status
room.php – room allocation Working & tested 
Payment / booking confirmation | In progress – needs testing
Safari tickets | In progress – needs testing
Admin / customers | In progress - Dashboards need expanding


By Martin Juniour Nyika – https://www.linkedin.com/in/martin-juniour-3036b7335
