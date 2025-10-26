<section class="header-sec">
    <div class="container">
        <div class="header-wrapper">
            <div class="header-top">
                <a href="" class="logo-wrap w-inline-block">
                    <img src="./assets/logo.jpg" alt="">
                </a>
                <div class="header--wrap">
                    <h1 class="h1-large">THINKGOVT <span class="span-orange">JOBS.COM</span></h1>
                    <h2 class="h2-med">WWW.THINKGOVTJOBS.COM</h2>
                </div>
            </div>
            <div class="header-bottom">

                <a href="index" class="menu-link w-inline-block right-border">
                    <div>Home</div>

                </a>
                <a href="answer-key" class="menu-link w-inline-block right-border">
                    <div>Answer Key</div>
                </a>
                <a href="latest-job" class="menu-link w-inline-block right-border">
                    <div>Latest Jobs</div>
                </a>

                <a href="result" class="menu-link w-inline-block right-border">
                    <div>Result</div>
                </a>

                <a href="admit-card" class="menu-link w-inline-block right-border">
                    <div>Admit Card</div>
                </a>
                <a href="syllabus" class="menu-link w-inline-block right-border">
                    <div>Syllabus</div>
                </a>
                <a href="search" class="menu-link w-inline-block right-border">
                    <div>Search</div>
                </a>
                <a href="contact_us" class="menu-link w-inline-block">
                    <div>Contact Us</div>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
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
</script>