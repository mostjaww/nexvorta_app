<?php include 'header.php'; ?>

<?php include 'topbar.php'; ?>
<main class="main">
  <section id="hero" class="hero section">
    <div class="container">
      <div class="align-items-center row gy-4">
        <div class="col-lg-6">
          <h1 class="mb-4 display-5" data-aos="fade-up">Crafts & UMKM Products</h1>
          <p class="mb-4 lead" data-aos="fade-up" data-aos-delay="100">
            Discover authentic handcrafted products from local artisans and small businesses across Indonesia.
          </p>
          <div class="d-flex gap-2" data-aos="fade-up" data-aos-delay="200">
            <a href="crafts%26umkm.html#products" class="btn-get-started">Explore Products</a>
            <a href="#" class="d-flex align-items-center btn-watch-video"><span>Coming Soon</span></a>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="assets/img/illustration/crafts.svg" class="img-fluid" alt="Crafts & UMKM" />
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="about section">
    <div class="container">
      <div class="section-title">
        <h2>About Our Crafts & UMKM Products</h2>
      </div>
      <div class="row gy-4">
        <div class="col-lg-6">
          <img src="../assets/img/livestockfarm-about.html" alt="About Livestock" class="img-fluid">
        </div>
        <div class="col-lg-6 content">
          <h3>Quality Assurance</h3>
          <p>We provide carefully selected crafts and UMKM products that meet international standards.</p>
          <ul>
            <li><i class="bi bi-check-circle"></i> Fresh and premium quality</li>
            <li><i class="bi bi-check-circle"></i> Certified by local authorities</li>
            <li><i class="bi bi-check-circle"></i> Direct from farmers to consumers</li>
            <li><i class="bi bi-check-circle"></i> Sustainable farming practices</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="products" class="featured-products section">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>Featured Products</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="product-card">
            <img src="assets/img/product-1.html" alt="Product" class="img-fluid" />
            <h5>Traditional Batik</h5>
            <p>Authentic handmade batik fabrics with traditional patterns</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="product-card">
            <img src="assets/img/product-2.html" alt="Product" class="img-fluid" />
            <h5>Handicrafts</h5>
            <p>Unique handcrafted items from local artisans</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="product-card">
            <img src="assets/img/product-3.html" alt="Product" class="img-fluid" />
            <h5>Local Textiles</h5>
            <p>Premium quality textiles produced by local UMKM businesses</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include 'bottombar.php'; ?>

<!-- Floating Chat Button -->
<div id="chat-button" class="floating-chat-btn">
  <button type="button" class="chat-btn" onclick="toggleChatWindow()">
    <i class="bi bi-chat-dots"></i>
  </button>
  <div id="chat-window" class="chat-window" style="display: none;">
    <div class="chat-header">
      <h5>Chat with Nexva (Nexvorta AI Assistant)</h5>
      <button type="button" class="btn-close" onclick="toggleChatWindow()"></button>
    </div>
    <div class="chat-messages" id="chat-messages"></div>
    <div class="chat-input-area">
      <input type="text" id="chat-input" class="chat-input" placeholder="Type your message..." />
      <button type="button" class="btn-send" onclick="sendMessage()">
        <i class="bi bi-send"></i>
      </button>
    </div>
  </div>
</div>

<a href="#" id="scroll-top" class="d-flex align-items-center justify-content-center scroll-top"><i
    class="bi bi-arrow-up-short"></i>
</a>

<?php include 'footer.php'; ?>