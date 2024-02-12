
    // Get a reference to the div element you want to remove
const divToRemove = document.getElementById('myDiv');
console.log(divToRemove);
// Define the time period in milliseconds (e.g., 5000ms = 5 seconds)
const timePeriod = 2000;

// Set a timeout to remove the div after the specified time period
setTimeout(function() {
    if (divToRemove) {
        divToRemove.remove();
    }
}, timePeriod);

