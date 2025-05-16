<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CyberLearn - Accueil</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
  color: #fff;
  padding: 100px 0;
}
    .hero h1 {
      font-weight: 700;
      font-size: 3rem;
    }
    .card-icon {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }
    footer {
      background-color: #1E293B;
      color: #94A3B8;
      padding: 20px 0;
    }
  </style>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary" href="#">CyberWise</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
          <li class="nav-item"><a class="btn btn-outline-primary ms-3" href="register">Register</a></li>
          <li class="nav-item"><a class="btn btn-primary ms-2" href="login">Log In</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="hero text-center" style="background-image: url('{{ asset('images/1.png') }}');">
    <div class="container">
      <h1>Learn Cybersecurity Like a Pro</h1>
      <p class="lead">
        Dive into hands-on labs, real-world attack simulations, and expert-led workshops.  
        Join 10,000+ learners mastering the skills to defend networks, applications, and data—on your schedule.
      </p>
      <a href="#courses" class="btn btn-light btn-lg mt-3">Get Started Free</a>
    </div>
  </header>

  <!-- Featured Courses -->
  <section id="courses" class="py-5">
    <div class="container">
      <h2 class="mb-4">Featured Courses</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card h-100 shadow-sm">
            <div class="card-body d-flex align-items-start">
    
              <div>
                <h5 class="card-title">Introduction to cybersecurity</h5>
                <p class="card-text">Learn the fundamentals of cybersecurity and its importance</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100 shadow-sm">
            <div class="card-body d-flex align-items-start">
              <div>
                <h5 class="card-title">Network Security</h5>
                <p class="card-text">Secure network infrastructures against threats</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100 shadow-sm">
            <div class="card-body d-flex align-items-start">
              <div>
                <h5 class="card-title">Ethical Hacking</h5>
                <p class="card-text">Discover techniques and tools for penetration testing</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100 shadow-sm">
            <div class="card-body d-flex align-items-start">
              <div>
                <h5 class="card-title">Cloud Security</h5>
                <p class="card-text">Understand how to secure cloud environments and data</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Us -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2>About Us</h2>
      <p>CyberLearn is a one-stop cybersecurity learning platform that combines expert-led, up-to-date courses with hands-on labs, interactive assessments, and a supportive community to guide you from beginner fundamentals to advanced mastery. You’ll learn core topics—from network defense and secure coding to ethical hacking and incident response—through real-world scenarios on virtual machines, reinforce your knowledge with quizzes and verifiable certifications, and track your progress with personalized learning paths. Behind every lesson, a network of experienced mentors and peers is ready to help you troubleshoot challenges and share insights, ensuring you not only understand the theory but can apply it confidently in any environment. Whether you’re just starting your cyber journey or sharpening pro-level skills, CyberLearn adapts to your pace and keeps you ahead of evolving threats with continuously refreshed content.
    </p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <small>&copy; 2024 CyberLearn, All rights reserved.</small>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
