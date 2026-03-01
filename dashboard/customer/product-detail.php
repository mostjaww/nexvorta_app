<?php include 'function/header.php'; ?>

<main class="flex-fill">
    <div class="container my-5">

        <div class="row g-5 align-items-start">

            <!-- IMAGE SECTION -->
            <div class="col-lg-6">

                <div class="detail-image-card">

                    <span id="detailDiscount" class="discount-badge d-none"></span>

                    <div class="detail-skeleton"></div>

                    <img id="detailImage" class="detail-image"
                        onload="this.previousElementSibling.style.display='none'">
                </div>

            </div>

            <!-- PRODUCT INFO -->
            <div class="col-lg-6">

                <h2 id="detailName" class="detail-title mb-2"></h2>

                <h4 class="detail-price mb-3" id="detailPrice"></h4>

                <p class="detail-description">
                    <span id="detailDescription"></span>
                </p>

                <!-- Quantity -->
                <div class="d-flex align-items-center gap-3 mt-4">

                    <div class="quantity-control-detail">
                        <button id="qtyMinus">-</button>
                        <span id="detailQty">1</span>
                        <button id="qtyPlus">+</button>
                    </div>

                    <div class="subtotal">
                        Subtotal:
                        <strong id="detailSubtotal"></strong>
                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex gap-3 mt-4">

                    <button id="detailAddCart" class="btn btn-primary-custom px-4">
                        Add to Cart
                    </button>

                    <a href="index.php?token=<?= encrypt(date('Ymd')); ?>&hal=dashboard/customer/index"
                        class="btn btn-outline-primary px-4">
                        Back
                    </a>

                </div>

            </div>

        </div>

    </div>
</main>

<!-- ✅ OFFCANVAS PINDAH KE LUAR ROW -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartCanvas">
    <div class="offcanvas-header">
        <h5>Your Cart</h5>
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div id="cartItems"></div>
        <hr>
        <h6>Total: Rp <span id="cartTotal">0</span></h6>
        <button id="checkoutBtn" class="btn btn-primary-custom w-100 mt-3">
            Checkout
        </button>
    </div>
</div>

<?php include 'function/footer.php'; ?>