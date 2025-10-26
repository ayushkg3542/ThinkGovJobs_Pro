<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.container {
    width: 100%;
    margin: auto;
    padding: 20px;
    display: flex;
    justify-content: center;
}
</style>

<body>
    <div class="container">
        <marquee behavior="alternate" scrollamount="2" direction="right" id="myMarquee">
            <a href="">Hello World</a>
            <span>||</span>
            <a href="">Hello World now this is work time</a>
            <span>||</span>
            <a href="">Hello World</a>
        </marquee>
    </div>

</body>
<script>
function adjustScrollAmount() {
    const marquee = document.getElementById('myMarquee');

    if (window.innerWidth > 746) {
        marquee.setAttribute('scrollamount', '5');
    } else if (window.innerWidth < 479) {
        marquee.setAttribute('scrollamount', '2');
    }
}

// Run on page load
adjustScrollAmount();

// Adjust when the window is resized
window.addEventListener('resize', adjustScrollAmount);
</script>

</html>