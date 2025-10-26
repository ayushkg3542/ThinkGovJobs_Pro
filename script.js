// Get the current page URL
var currentPageUrl = window.location.href;

// Get all the navigation links
var navLinks = document.querySelectorAll('nav ul li a');

// Loop through the links and check if the href matches the current page URL
for (var i = 0; i < navLinks.length; i++) {
    var link = navLinks[i];
    if (link.href === currentPageUrl) {
        link.classList.add('active'); // Add the "active" class to the currently open link
        break; // Exit the loop once a match is found
    }
}
