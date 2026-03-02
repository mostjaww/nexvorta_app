<?php include 'function/header.php'; ?>
<?php
// ====== SAMPLE DATA (NANTI BISA DIGANTI DARI DATABASE) ======
$invoice_number = "INV-" . date("Ymd") . "-001";
$order_date = date("d M Y");
$customer_name = "PT Global Exportindo";
$customer_email = "procurement@exportindo.com";
$customer_address = "Jakarta, Indonesia";

$items = [
    ["name" => "Arabica Coffee Beans (Grade A)", "qty" => 500, "price" => 75000],
    ["name" => "Coconut Charcoal Briquettes", "qty" => 1000, "price" => 35000],
];

$subtotal = 0;
foreach ($items as $item) {
    $subtotal += $item['qty'] * $item['price'];
}

$tax = $subtotal * 0.11; // 11% PPN
$total = $subtotal + $tax;
?>

<main class="main py-5 bg-light">

    <div class="container">

        <div class="card shadow-lg border-0">
            <div class="card-body p-5">

                <!-- HEADER -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="fw-bold text-primary">NEXVORTA</h2>
                        <p class="mb-1">Export & Import Marketplace</p>
                        <p class="small text-muted">
                            support@nexvorta.com <br>
                            Indonesia
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h4 class="fw-bold">INVOICE</h4>
                        <p class="mb-1"><strong>Invoice No:</strong> <?php echo $invoice_number; ?></p>
                        <p class="mb-1"><strong>Date:</strong> <?php echo $order_date; ?></p>
                        <span class="badge bg-warning text-dark">Pending Payment</span>
                    </div>
                </div>

                <hr>

                <!-- BILL TO -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold">Bill To:</h6>
                        <p class="mb-1"><?php echo $customer_name; ?></p>
                        <p class="mb-1"><?php echo $customer_email; ?></p>
                        <p class="mb-0"><?php echo $customer_address; ?></p>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Unit Price</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item): ?>
                                <tr>
                                    <td><?php echo $item['name']; ?></td>
                                    <td class="text-center"><?php echo $item['qty']; ?></td>
                                    <td class="text-end">Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                                    <td class="text-end">
                                        Rp <?php echo number_format($item['qty'] * $item['price'], 0, ',', '.'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- SUMMARY -->
                <div class="row justify-content-end">
                    <div class="col-md-5">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tax (11%)</span>
                                <strong>Rp <?php echo number_format($tax, 0, ',', '.'); ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <span class="fw-bold">Grand Total</span>
                                <span class="fw-bold text-primary">
                                    Rp <?php echo number_format($total, 0, ',', '.'); ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="my-4">

                <!-- PAYMENT INFO -->
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="fw-bold">Payment Information</h6>
                        <p class="small text-muted mb-2">
                            Please complete payment via our secure third-party payment gateway.
                        </p>
                        <p class="small">
                            Bank: BCA <br>
                            Account Name: PT Nexvorta Indonesia <br>
                            Account Number: 1234567890
                        </p>
                    </div>

                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <button onclick="window.print()" class="btn btn-outline-primary">
                            Print Invoice
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</main>
<?php include 'function/footer.php'; ?>