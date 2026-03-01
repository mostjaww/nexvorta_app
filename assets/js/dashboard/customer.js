/* ================= PRODUCTS ================= */
const products = [
  {
    id: 1,
    name: "Wireless Headphone",
    deskription:
      "Experience true wireless freedom with our premium Bluetooth headphones. Enjoy crystal-clear sound, deep bass, and a comfortable fit for hours of listening pleasure.",
    price: 450000,
    category: "electronics",
    img: "https://els.id/wp-content/uploads/2023/11/Olike-H2-1.jpg",
  },
  {
    id: 2,
    name: "Gaming Mouse",
    deskription:
      "Dominate your games with our high-precision gaming mouse. Featuring customizable DPI settings, ergonomic design, and RGB lighting to enhance your gaming experience.",
    price: 250000,
    category: "electronics",
    img: "https://img.lazcdn.com/g/p/86291e7fd8195b5b18f224ef4c903953.jpg_720x720q80.jpg",
  },
  {
    id: 3,
    name: "Smart Watch",
    deskription:
      "Stay connected and track your fitness with our sleek smart watch.",
    price: 850000,
    category: "electronics",
    img: "https://timekingdom.co.id/cdn/shop/files/gama_BL.png?v=1736239736",
  },
  {
    id: 4,
    name: "Mechanical Keyboard",
    deskription: "Upgrade your typing experience with our mechanical keyboard.",
    price: 750000,
    category: "electronics",
    img: "https://images.jamtangan.com/preset:sharp/resize:fit:462:492/dpr:1.5/width:462/height:492/resize:fit/plain/https://assets.jamtangan.com/images/product/magegee/6971969720848/1l_800x800.jpg",
  },
  {
    id: 5,
    name: "Bluetooth Speaker",
    deskription:
      "Enjoy your music on the go with our portable Bluetooth speaker.",
    price: 300000,
    category: "accessories",
    img: "https://id.jbl.com/dw/image/v2/AAUJ_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dw6fe37dc4/JBL_GO_4_3_4_LEFT_BLACK_48178_x1.png?sw=537&sfrm=png",
  },
  {
    id: 6,
    name: "Power Bank",
    deskription: "Never run out of battery with our high-capacity power bank.",
    price: 200000,
    category: "accessories",
    img: "https://migadget.id/wp-content/uploads/2024/09/Xiaomi-Power-Bank-dengan-Kabel-10000mAh-web.jpg",
  },
];

/* ================= STATE ================= */
let cart = JSON.parse(localStorage.getItem("cart")) || [];

const container = document.getElementById("productContainer");
const cartItems = document.getElementById("cartItems");
const cartCount = document.getElementById("cartCount");
const cartTotal = document.getElementById("cartTotal");

function renderProducts(list) {
  if (!container) return; // 🔥 penting

  container.innerHTML = "";

  if (list.length === 0) {
    container.innerHTML = `<div class="col-12 text-center text-muted">No products found</div>`;
    return;
  }

  list.forEach((p) => {
    container.innerHTML += `<div class="col-6 col-md-4 col-lg-4">
      <div class="card product-card">
        <div class="image-wrapper position-relative">
          ${p.discount ? `<span class="discount-badge">-${p.discount}%</span>` : ""}
          <div class="skeleton-img"></div>
          <img src="${p.img}" class="product-img" onload="this.previousElementSibling.style.display='none'">
          <button class="quick-cart-btn" onclick="addToCart(${p.id})">
            <i class="bi bi-cart-plus"></i>
          </button>
        </div>
        <div class="card-body">
          <h6 class="product-title">${p.name}</h6>
          <div class="product-description mb-2"> ${p.deskription.length > 60 ? p.deskription.substring(0, 60) + "..." : p.deskription} </div>
          <div class="product-price mb-2"> Rp ${p.price.toLocaleString()} </div>
          <div class="d-flex gap-2">
            <a href="index.php?token=${secureToken}&hal=dashboard/customer/product-detail&id=${p.id}" 
              class="btn btn-outline-primary btn-sm w-50"> View Detail </a>
            <button class="btn btn-primary-custom btn-sm w-50 add-btn" onclick="addToCart(${p.id})"> Add to Cart </button>
          </div>
        </div>
      </div>
    </div>`;
  });
}

document.addEventListener("DOMContentLoaded", function () {
  if (container) {
    renderProducts(products);
  }
});

// Filter by category
function applyFilters() {
  if (!container) return; // 🔥 penting

  const search =
    document.getElementById("searchInput")?.value?.toLowerCase() || "";
  const category = document.getElementById("categoryFilter")?.value || "all";
  const min = parseInt(document.getElementById("minPrice")?.value) || 0;
  const max = parseInt(document.getElementById("maxPrice")?.value) || Infinity;
  const sort = document.getElementById("sortFilter")?.value || "default";

  let filteredProducts = products.filter(
    (p) =>
      p.name.toLowerCase().includes(search) &&
      (category === "all" || p.category === category) &&
      p.price >= min &&
      p.price <= max,
  );

  if (sort === "low") filteredProducts.sort((a, b) => a.price - b.price);
  if (sort === "high") filteredProducts.sort((a, b) => b.price - a.price);

  renderProducts(filteredProducts);
}

if (container) {
  document
    .querySelectorAll(
      "#searchInput, #categoryFilter, #minPrice, #maxPrice, #sortFilter",
    )
    .forEach((el) => el?.addEventListener("input", applyFilters));
}

/* ================= CART FUNCTIONS ================= */

function addToCart(id, quantity = 1) {
  let item = cart.find((i) => i.id === id);

  if (item) item.qty += quantity;
  else {
    let product = products.find((p) => p.id === id);
    if (!product) return;
    cart.push({ ...product, qty: quantity });
  }

  updateCart();
}

function removeItem(id) {
  cart = cart.filter((i) => i.id !== id);
  updateCart();
}

function updateCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
  renderCart();
}

function renderCart() {
  if (!cartItems || !cartCount || !cartTotal) return;

  cartItems.innerHTML = "";
  let total = 0;

  cart.forEach((item) => {
    total += item.price * item.qty;

    cartItems.innerHTML += `<div class="cart-item mb-3 p-2 border rounded">
      <div class="d-flex justify-content-between align-items-start">
        <div>
          <strong class="text-primary">${item.name}</strong><br>
          <small>Rp ${item.price.toLocaleString()}</small>
        </div>
        <button class="btn btn-sm btn-danger remove-btn" data-id="${item.id}">
          <i class="bi bi-trash"></i>
        </button>
      </div>
      <div class="d-flex justify-content-between align-items-center mt-2">
        <div class="quantity-control d-flex align-items-center">
          <button class="btn btn-outline-secondary qty-minus" data-id="${item.id}" style="color: #023e8a;">-</button>
          <span class="mx-2 fw-bold">${item.qty}</span>
          <button class="btn btn-outline-secondary qty-plus" data-id="${item.id}" style="color: #023e8a;">+</button>
        </div>
        <div class="fw-bold text-primary"> Rp ${(item.price * item.qty).toLocaleString()} </div>
      </div>
    </div>`;
  });

  cartCount.innerText = cart.reduce((a, b) => a + b.qty, 0);
  cartTotal.innerText = total.toLocaleString();
}

renderCart();

/* ================= CART EVENTS ================= */

cartItems?.addEventListener("click", function (e) {
  if (e.target.closest(".remove-btn")) {
    removeItem(parseInt(e.target.closest(".remove-btn").dataset.id));
  }

  if (e.target.closest(".qty-plus")) {
    let id = parseInt(e.target.closest(".qty-plus").dataset.id);
    addToCart(id, 1);
  }

  if (e.target.closest(".qty-minus")) {
    let id = parseInt(e.target.closest(".qty-minus").dataset.id);
    let item = cart.find((i) => i.id === id);
    if (item && item.qty > 1) {
      item.qty--;
      updateCart();
    }
  }
});

/* ================= DETAIL PAGE ================= */

if (document.getElementById("detailName")) {
  const urlParams = new URLSearchParams(window.location.search);
  const productId = parseInt(urlParams.get("id"));

  const product = products.find((p) => p.id === productId);

  if (product) {
    let qty = 1;

    document.getElementById("detailName").innerText = product.name;
    document.getElementById("detailDescription").innerText = product.deskription;
    document.getElementById("detailPrice").innerText =
      "Rp " + product.price.toLocaleString();
    document.getElementById("detailImage").src = product.img;

    const subtotal = document.getElementById("detailSubtotal");

    function updateSubtotal() {
      subtotal.innerText = "Rp " + (product.price * qty).toLocaleString();
    }

    updateSubtotal();

    document.getElementById("qtyPlus")?.addEventListener("click", () => {
      qty++;
      document.getElementById("detailQty").innerText = qty;
      updateSubtotal();
    });

    document.getElementById("qtyMinus")?.addEventListener("click", () => {
      if (qty > 1) {
        qty--;
        document.getElementById("detailQty").innerText = qty;
        updateSubtotal();
      }
    });

    document.getElementById("detailAddCart")?.addEventListener("click", () => {
      addToCart(product.id, qty);

      Swal.fire({
        icon: "success",
        title: "Added to Cart",
        confirmButtonColor: "#023e8a",
      });
    });
  }
}

/* ================= CHECKOUT ================= */

const checkoutBtn = document.getElementById("checkoutBtn");
checkoutBtn?.addEventListener("click", function () {
  if (cart.length === 0) {
    Swal.fire({
      icon: "warning",
      title: "Cart is Empty",
      text: "Please add products before checkout.",
      confirmButtonColor: "#023e8a",
    });
    return;
  }

  Swal.fire({
    icon: "success",
    title: "Order Successful!",
    text: "Thank you for shopping at Nexvorta 🚀",
    confirmButtonColor: "#023e8a",
    confirmButtonText: "Continue Shopping",
  }).then(() => {
    cart = [];
    updateCart();
  });
});
