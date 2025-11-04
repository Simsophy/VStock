<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoffeeShop Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .navbar {
      background-color: #3e2723;
    }
    .navbar .nav-link, 
    .navbar .navbar-brand {
      color: #fff !important;
    }
    .hero {
      background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93') no-repeat center center/cover;
      height: 100vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .hero h1 {
      font-size: 4rem;
      font-weight: bold;
      text-shadow: 2px 2px 8px rgba(0,0,0,.5);
    }
    .menu-card img {
      height: 200px;
      object-fit: cover;
    }
    #about {
      background-color: #f8f9fa;
    }
    footer {
      background-color: #3e2723;
      color: white;
      padding: 20px 0;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">☕ CoffeeShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-light rounded"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<section id="home" class="hero">
  <div>
    <h1>Freshly Brewed Coffee</h1>
    <p class="lead">Start your day with the perfect cup.</p>
    <a href="#menu" class="btn btn-light btn-lg mt-3">See Our Menu</a>
  </div>
</section>

<!-- Menu -->
<section id="menu" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Our Best Sellers</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card menu-card shadow-sm">
          <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348" class="card-img-top" alt="Espresso">
          <div class="card-body text-center">
            <h5 class="card-title">Espresso</h5>
            <p class="fw-bold">$2.50</p>
            <p>A bold shot of rich coffee.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card menu-card shadow-sm">
          <img src="https://images.unsplash.com/photo-1510626176961-4b37d0f0b623" class="card-img-top" alt="Latte">
          <div class="card-body text-center">
            <h5 class="card-title">Latte</h5>
            <p class="fw-bold">$3.50</p>
            <p>Creamy blend of coffee & milk.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card menu-card shadow-sm">
          <img src="https://images.unsplash.com/photo-1498804103079-a6351b050096" class="card-img-top" alt="Cappuccino">
          <div class="card-body text-center">
            <h5 class="card-title">Cappuccino</h5>
            <p class="fw-bold">$3.00</p>
            <p>Perfect mix of milk foam & espresso.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About -->
<section id="about" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">About Us</h2>
    <div class="row align-items-center">
      <div class="col-md-6">
        <p>
          Welcome to CoffeeShop! We’re passionate about serving premium coffee made 
          from the finest beans, freshly brewed for your enjoyment. Whether you’re 
          here for a morning boost or a cozy evening, our shop is the perfect place 
          to relax and recharge.
        </p>
      </div>
      <div class="col-md-6">
        <img src="https://images.unsplash.com/photo-1523942839745-7848b9b1d079" class="img-fluid rounded" alt="Coffee Shop">
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Contact Us</h2>
    <div class="row">
      <div class="col-md-6">
        <h5>📍 Address</h5>
        <p>123 Coffee Street, Phnom Penh, Cambodia</p>
        <h5>📞 Phone</h5>
        <p>+855 12 345 678</p>
        <h5>✉ Email</h5>
        <p>info@coffeeshop.com</p>
      </div>
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="mb-3">
            <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
          </div>
          <button type="submit" class="btn btn-dark">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-center">
  <p>&copy; 2025 CoffeeShop. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
