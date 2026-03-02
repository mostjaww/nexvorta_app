<?php include 'function/header.php'; ?>

<?php include 'function/topbar.php'; ?>

<main class="main">

    <section id="hero" class="hero section text-white d-flex align-items-center dark-background">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center">
                    <h1 class="fw-bold mb-4">About Nexvorta</h1>
                    <p class="lead">
                        Nexvorta is a next-generation export and import marketplace designed to
                        connect Indonesian producers with global buyers. We empower businesses,
                        farmers, manufacturers, and artisans to scale beyond borders through a
                        secure, transparent, and technology-driven trading ecosystem.
                    </p>
                    <p>
                        Our platform simplifies bulk ordering, third-party payments, and
                        international logistics coordination — making cross-border commerce
                        seamless, efficient, and reliable.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= MISSION SECTION ======= -->
    <section id="mission" class="section py-5 light-background">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold">Our Mission</h2>
                    <p class="text-muted">
                        Transforming Indonesian trade through digital innovation.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm border-0 h-100 text-center p-3">
                        <div class="card-body">
                            <h5 class="fw-bold">Global Access</h5>
                            <p class="small text-muted">
                                Helping local producers compete and expand into international markets.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm border-0 h-100 text-center p-3">
                        <div class="card-body">
                            <h5 class="fw-bold">Secure Transactions</h5>
                            <p class="small text-muted">
                                Integrating trusted third-party payment systems for safe bulk trading.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm border-0 h-100 text-center p-3">
                        <div class="card-body">
                            <h5 class="fw-bold">Logistics Integration</h5>
                            <p class="small text-muted">
                                Partnering with reliable shipping providers for smooth delivery.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm border-0 h-100 text-center p-3">
                        <div class="card-body">
                            <h5 class="fw-bold">Sustainable Trade</h5>
                            <p class="small text-muted">
                                Promoting ethical sourcing and long-term economic growth.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= VISION SECTION ======= -->
    <section id="vision" class="section py-5 text-white dark-background">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center">
                    <h2 class="fw-bold mb-4">Our Vision</h2>
                    <p class="lead">
                        To become Southeast Asia’s leading digital trade gateway —
                        a platform where global buyers confidently source high-quality
                        Indonesian products in bulk.
                    </p>
                    <p>
                        We envision Nexvorta as a trusted international trading ecosystem,
                        bridging local excellence with global demand while driving export
                        innovation and economic transformation.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= CALL TO ACTION ======= -->
    <section class="section py-5 dark">
        <div class="container text-center" data-aos="fade-up">
            <h3 class="fw-bold mb-3">Ready to Expand Beyond Borders?</h3>
            <p class="text mb-4">
                Join Nexvorta today and start building global trade connections with confidence.
            </p>
            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=user/login"; ?>" class="btn btn-getstarted btn-lg px-4" style="background: var(--accent-color); color: #fff; border-radius: 50px;">
                Get Started
            </a>
        </div>
    </section>

</main>

<?php include 'function/bottombar.php'; ?>

<?php include 'function/footer.php'; ?>