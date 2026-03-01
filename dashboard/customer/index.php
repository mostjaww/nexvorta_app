<?php include 'function/header.php'; ?>

<main class="flex-fill">

    <div class="container my-5">
        <div class="row">

            <!-- FILTER SIDEBAR -->
            <div class="col-lg-3 mb-4">
                <div class="filter-card p-4">
                    <h5 class="mb-3">Filter Products</h5>

                    <label class="form-label">Category</label>
                    <select id="categoryFilter" class="form-select mb-3">
                        <option value="all">All Categories</option>
                        <option value="electronics">Electronics</option>
                        <option value="accessories">Accessories</option>
                    </select>

                    <label class="form-label">Min Price</label>
                    <input type="number" id="minPrice" class="form-control mb-3" placeholder="0">

                    <label class="form-label">Max Price</label>
                    <input type="number" id="maxPrice" class="form-control mb-3" placeholder="1000000">

                    <label class="form-label">Sort By</label>
                    <select id="sortFilter" class="form-select">
                        <option value="default">Default</option>
                        <option value="low">Price Low → High</option>
                        <option value="high">Price High → Low</option>
                    </select>
                </div>
            </div>

            <!-- PRODUCTS -->
            <div class="col-lg-9">
                <div class="row g-4" id="productContainer"></div>
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