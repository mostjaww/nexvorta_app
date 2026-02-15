<?php include 'header.php'; ?>

<?php include 'topbar.php'; ?>

    <main class="main">

        <section id="hero" class="hero section dark-background">
            <div class="container" data-aos="fade-up">
                <div class="justify-content-center row">
                    <div class="text-center col-lg-8">
                        <h2>About Nexvorta</h2>
                        <p class="lead">
                            Nexvorta is an innovative e-commerce platform dedicated to
                            empowering local businesses and artisans in Indonesia. Our mission
                            is to connect consumers with high-quality, locally-made products,
                            while supporting the growth and sustainability of small-scale
                            enterprises.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="mission" class="hero section light-background">
            <div class="container" data-aos="fade-up">
                <div class="justify-content-center row">
                    <div class="text-center col-lg-8">
                        <h2>Our Mission</h2>
                        <p class="lead">
                            At Nexvorta, our mission is to foster economic growth and
                            community development by providing a platform that showcases the
                            rich diversity of Indonesian craftsmanship and agricultural
                            products. We strive to create opportunities for local producers
                            to reach a wider audience, while promoting sustainable practices
                            and fair trade principles.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="vision" class="hero section dark">
            <div class="container" data-aos="fade-up">
                <div class="justify-content-center row">
                    <div class="text-center col-lg-8">
                        <h2>Our Vision</h2>
                        <p class="lead">
                            Our vision is to become the leading e-commerce platform in
                            Indonesia for local products, recognized for our commitment to
                            quality, authenticity, and social impact. We envision a future
                            where Nexvorta serves as a catalyst for positive change,
                            empowering communities and preserving cultural heritage through
                            commerce.
                        </p>
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