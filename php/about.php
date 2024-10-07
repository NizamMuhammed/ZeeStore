<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About ZeeStore</title>
    <link rel="stylesheet" href="about.css">
</head>
<style>
    /* General styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    color: #333;
}

/* Navbar styling */
.navbar {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    background-color: #333;
    color: #fff;
}

.navbar .brand {
    font-size: 24px;
    color: #fff;
    text-decoration: none;
}

.navbar .nav-links {
    list-style: none;
    display: flex;
}

.navbar .nav-links li {
    margin-left: 20px;
}

.navbar .nav-links a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
}

.navbar .nav-links a:hover {
    color: #f0a500;
}

/* Hero Section */
.hero {
    background: url('hero-image.jpg') no-repeat center center/cover;
    color: #fff;
    padding: 100px 20px;
    text-align: center;
}

.hero-content h1 {
    font-size: 50px;
    margin-bottom: 10px;
}

.hero-content p {
    font-size: 20px;
    margin-bottom: 20px;
}

/* About Content */
.about-content {
    padding: 50px 20px;
    max-width: 800px;
    margin: auto;
    text-align: center;
}

.about-content h2 {
    font-size: 32px;
    margin-bottom: 20px;
}

.about-content p {
    font-size: 18px;
    margin-bottom: 40px;
    line-height: 1.6;
}

/* Team Section */
.team {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.team-member {
    width: 200px;
    text-align: center;
}

.team-member img {
    width: 100%;
    height: auto;
    border-radius: 50%;
    transition: transform 0.3s;
}

.team-member img:hover {
    transform: scale(1.05);
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
    margin-top: 40px;
}

</style>
<body>
    <nav class="navbar">
        <a href="index.html" class="brand">ZeeStore</a>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>About ZeeStore</h1>
            <p>Your trusted store for quality electronics.</p>
        </div>
    </section>

    <section class="about-content">
        <h2>Our Mission</h2>
        <p>ZeeStore strives to provide customers with the best electronic products, exceptional customer service, and a reliable shopping experience.</p>

        <h2>Our Journey</h2>
        <p>Founded in 2024, ZeeStore has become a leading provider of electronics in Sri Lanka. With a focus on both new and refurbished products, we are committed to quality and customer satisfaction.</p>

        <div class="team">
            <h2>Meet the Team</h2>
            <div class="team-member">
                <img src="team1.jpg" alt="Team Member 1">
                <h3>Mohamed Nizam</h3>
                <p>Founder & CEO</p>
            </div>
            <div class="team-member">
                <img src="team2.jpg" alt="Team Member 2">
                <h3>Wodge Vihanga</h3>
                <p>Lead Developer</p>
            </div>
            <!-- Additional team members here -->
        </div>
    </section>

    <footer>
        <p>&copy; 2024 ZeeStore. All rights reserved.</p>
    </footer>

    <script src="about.js"></script>
</body>
<script>// Smooth scroll for the navigation links
document.querySelectorAll('.nav-links a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Alert for team members click
document.querySelectorAll('.team-member img').forEach(img => {
    img.addEventListener('click', () => {
        alert("Learn more about our team member!");
    });
});
</script>
</html>
