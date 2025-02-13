<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(to right, #FFB6C1, #f10486, #FFB6C1); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bolder" href="#home" style="font-size: 1.5rem; transition: 0.3s;">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div style="padding-top: 100px;"></div>

<section id="home" style="height: 50vh; padding-top: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
    <h1>Welcome to Home</h1>
</section>

<section id="about" style="height: 50vh; padding-top: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
    <h1>About Us</h1>
</section>

<section id="services" style="height: 50vh; padding-top: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
    <h1>Our Services</h1>
</section>

<section id="contact" style="height: 50vh; padding-top: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
    <h1>Contact Us</h1>
</section>

<style>
    html {
        scroll-behavior: smooth;
    }
    section {
        background: #f9f9f9;
        border-bottom: 2px solid #ddd;
    }
</style>
