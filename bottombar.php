<footer id="footer" class="footer light-background">
  <div class="footer-top container">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="index-2.html" class="d-flex align-items-center">
          <span class="sitename" style="font-weight: 700; margin: 0; color: var(--accent-color)">NEXVORTA</span>
        </a>
        <div class="pt-3 footer-contact">
          <p>Medan, Indonesia</p>
          <p class="mt-3">
            <strong>Phone:</strong>
            <a href="tel:+6285119064758" style="font-size: small;">+62 851-1906-4758</a>
          </p>
          <p>
            <strong>Email:</strong>
            <a href="mailto:nexvorta@gmail.com" style="font-size: small;">nexvorta@gmail.com</a>
          </p>
        </div>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bi-chevron-right bi"></i> <a href="dashboard">Home</a></li>
          <li>
            <i class="bi-chevron-right bi"></i> <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=about-us"; ?>">About us</a>
          </li>
          <li>
            <i class="bi-chevron-right bi"></i> <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=privacy-policy"; ?>">Privacy Policy</a>
          </li>
          <li>
            <i class="bi-chevron-right bi"></i>
            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=terms"; ?>">Terms of service</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Products</h4>
        <ul>
          <li>
            <i class="bi-chevron-right bi"></i>
            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=products/crafts-umkm"; ?>">Crafts & UMKM Products</a>
          </li>
          <li>
            <i class="bi-chevron-right bi"></i>
            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=products/agriculture-plantations"; ?>">Agriculture & Plantations Products</a>
          </li>
          <li>
            <i class="bi-chevron-right bi"></i>
            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=products/livestockfarm"; ?>">Livestock Farm Products</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12">
        <h4>Follow Us</h4>
        <p>
          Follow us on our social media platforms to stay updated with the
          latest news and offerings from Nexvorta.
        </p>
        <div class="d-flex social-links">
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4 text-center container copyright">
    <p>
      <?php echo date("Y"); ?> © <span>Copyright</span>
      <strong class="px-1 sitename">NEXVORTA.</strong>
      <span>All Rights Reserved</span>
    </p>
    <div class="credits">Designed by Nexvorta Team</div>
  </div>
</footer>

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