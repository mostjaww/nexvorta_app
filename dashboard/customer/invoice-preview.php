<?php include 'function/header.php'; ?>

<main class="main py-5">
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row invoice-preview">
                <!-- Invoice -->
                <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">
                    <div class="card invoice-preview-card p-sm-12 p-6">
                        <div class="card-body invoice-preview-header rounded">
                            <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">
                                <div class="mb-xl-0 mb-6 text-heading">
                                    <div class="d-flex align-items-center gap-2 mb-4 svg-illustration">
                                        <div class="brand-logo-container">
                                            <img src="assets/img/nexva.png" alt="Logo" class="brand-logo" width="32" />
                                        </div>
                                        <span class="app-brand-text fw-bold text-white" style="font-family: 'Jost', sans-serif; text-transform: uppercase;">Nexvorta</span>
                                    </div>
                                    <p class="mb-1 text-white"><i class="bi bi-geo-alt me-2"></i>Office 149, 450 South Brand Brooklyn</p>
                                    <p class="mb-1 text-white"><i class="bi bi-envelope me-2"></i>San Diego County, CA 91905, USA</p>
                                    <p class="mb-1 text-white"><i class="bi bi-telephone me-2"></i>+1 (123) 456 7891</p>
                                </div>
                                <div class="invoice-info-box">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="h4 text-white mb-0 me-3">Invoice #3905</span>
                                    </div>
                                    <div class="d-flex flex-column gap-2">
                                        <div class="d-flex justify-content-between gap-3">
                                            <span class="text-white">Date Issued:</span>
                                            <span class="text-white fw-medium">April 25, 2021</span>
                                        </div>
                                        <div class="d-flex justify-content-between gap-3">
                                            <span class="text-white">Due Date:</span>
                                            <span class="text-white fw-medium">April 25, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-4">
                            <div class="row g-4">
                                <div class="col-md-6 col-12">
                                    <h6 class="text-muted small fw-bold mb-3">Invoice To:</h6>
                                    <div class="client-details p-3 rounded-3">
                                        <p class="mb-1 fw-medium">Thomas shelby</p>
                                        <p class="mb-1 fw-medium">Shelby Company Limited</p>
                                        <p class="mb-1 small text-muted">Small Heath, B10 0HF, UK</p>
                                        <p class="mb-1 small text-muted">718-986-6062</p>
                                        <p class="mb-1 small text-muted">peakyFBlinders@gmail.com</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-7">
                                    <h6 class="text-muted small fw-bold mb-3">Payment Details:</h6>
                                    <div class="table-responsive">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-4">Total Due:</td>
                                                    <td class="text-start fw-bold text-primary">$12,110.55</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-4">Bank Name:</td>
                                                    <td class="text-start">American Bank</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-4">Country:</td>
                                                    <td class="text-start">United States</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-4">IBAN:</td>
                                                    <td class="text-start text-monospace">FR7630006000011234567890189</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-4">SWIFT:</td>
                                                    <td class="text-start text-nowrap">BR91905</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mx-4 my-2" />

                        <div class="card-body">
                            <form class="source-item">
                                <div class="repeater-wrapper border rounded-3 p-4 mb-4 bg-light-subtle" data-repeater-list="group-a">

                                    <div class="border rounded-3 p-4 mb-4" style="background: rgba(255,255,255,0.02); border-color: rgba(255,255,255,0.1) !important;" data-repeater-item>
                                        <div class="row g-3">
                                            <div class="col-md-5 col-12">
                                                <label class="form-label fw-bold small">Item Description</label>
                                                <input type="text" class="form-control mb-2 fw-medium" value="Vuexy Admin Template" readonly>
                                                <textarea class="form-control" rows="2" readonly>HTML Admin Template</textarea>
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <label class="form-label fw-bold small">Cost</label>
                                                <input type="text" class="form-control" value="$32" readonly />
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <label class="form-label fw-bold small">Qty</label>
                                                <input type="number" class="form-control" value="1" readonly />
                                            </div>
                                            <div class="col-md-2 col-10 text-md-end">
                                                <label class="form-label fw-bold small d-block">Price</label>
                                                <span class="h6 mb-0 d-inline-block mt-2 product-price">$32.00</span>
                                            </div>
                                            <div class="col-md-1 col-2 text-end">
                                                <button type="button" class="btn btn-outline-danger mt-md-4 p-2 border-0" data-repeater-delete><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border rounded-3 p-4 mb-4" style="background: rgba(255,255,255,0.02); border-color: rgba(255,255,255,0.1) !important;" data-repeater-item>
                                        <div class="row g-3">
                                            <div class="col-md-5 col-12">
                                                <label class="form-label fw-bold small">Item Description</label>
                                                <input type="text" class="form-control mb-2 fw-medium" value="Frest Admin Template" readonly>
                                                <textarea class="form-control" rows="2" readonly>Angular Admin Template</textarea>
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <label class="form-label fw-bold small">Cost</label>
                                                <input type="text" class="form-control" value="$22" readonly />
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <label class="form-label fw-bold small">Qty</label>
                                                <input type="number" class="form-control" value="1" readonly />
                                            </div>
                                            <div class="col-md-2 col-10 text-md-end">
                                                <label class="form-label fw-bold small d-block">Price</label>
                                                <span class="h6 mb-0 d-inline-block mt-2 product-price">$22.00</span>
                                            </div>
                                            <div class="col-md-1 col-2 text-end">
                                                <button type="button" class="btn btn-outline-danger mt-md-4 p-2 border-0" data-repeater-delete><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border rounded-3 p-4 mb-4" style="background: rgba(255,255,255,0.02); border-color: rgba(255,255,255,0.1) !important;" data-repeater-item>
                                        <div class="row g-3">
                                            <div class="col-md-5 col-12">
                                                <label class="form-label fw-bold small">Item Description</label>
                                                <input type="text" class="form-control mb-2 fw-medium" value="Apex Admin Template" readonly>
                                                <textarea class="form-control" rows="2" readonly>HTML Admin Template</textarea>
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <label class="form-label fw-bold small">Cost</label>
                                                <input type="text" class="form-control" value="$17" readonly />
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <label class="form-label fw-bold small">Qty</label>
                                                <input type="number" class="form-control" value="2" readonly />
                                            </div>
                                            <div class="col-md-2 col-10 text-md-end">
                                                <label class="form-label fw-bold small d-block">Price</label>
                                                <span class="h6 mb-0 d-inline-block mt-2 product-price">$34.00</span>
                                            </div>
                                            <div class="col-md-1 col-2 text-end">
                                                <button type="button" class="btn btn-outline-danger mt-md-4 p-2 border-0" data-repeater-delete><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="card-body border-top" style="background: rgba(255,255,255,0.01);">
                            <div class="row g-4">
                                <div class="col-md-6 order-2 order-md-1">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold small text-muted d-block uppercase">Salesperson: Alfie Solomons</label>
                                    </div>
                                    <div>
                                        <label class="form-label fw-bold small text-muted d-block uppercase">Message:</label>
                                        <span class="small italic">"Thanks for your business!"</span>
                                    </div>
                                </div>

                                <div class="col-md-6 order-1 order-md-2 d-flex justify-content-md-end">
                                    <div class="w-px-250">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Subtotal:</span>
                                            <span class="fw-bold">$1,800.00</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Discount:</span>
                                            <span class="text-danger">-$28.00</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <span class="text-muted">Tax (21%):</span>
                                            <span class="fw-bold">$378.00</span>
                                        </div>
                                        <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                                            <span class="h5 mb-0">Total:</span>
                                            <span class="h4 mb-0 product-price fw-bold">$1,690.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mx-4 my-0 opacity-25" />

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.02); border-left: 4px solid #38bdf8;">
                                        <span class="fw-bold text-white d-block mb-1 small uppercase">Note:</span>
                                        <p class="mb-0 text-muted small lh-base">
                                            It was a pleasure working with you and your team.
                                            We hope you will keep us in mind for future freelance projects. Thank You!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Invoice -->

                <!-- Invoice Actions -->
                <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <button class="btn btn-primary d-grid w-100 mb-4" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                                <span class="d-flex align-items-center justify-content-center text-nowrap">
                                    <i class="bi bi-send me-2"></i>Send Invoice
                                </span>
                            </button>
                            <a class="btn btn-warning w-100 me-3 mb-3 d-flex align-items-center justify-content-center" href="index.php?token=<?= encrypt(date('Ymd')); ?>&hal=dashboard/customer/invoice-download">
                                <i class="bi bi-download me-2"></i>Download
                            </a>
                            <div class="d-flex mb-4">
                                <a class="btn btn-outline-primary w-50 me-3 d-flex align-items-center justify-content-center" target="_blank" href="index.php?token=<?= encrypt(date('Ymd')); ?>&hal=dashboard/customer/invoice-print">
                                    <i class="bi bi-printer me-2 fs-5"></i>
                                    <span>Print</span>
                                </a>
                                <a class="btn btn-outline-primary w-50 d-flex align-items-center justify-content-center" href="index.php?token=<?= encrypt(date('Ymd')); ?>&hal=dashboard/customer/invoice-edit">
                                    <i class="bi bi-pencil me-2 fs-5"></i>
                                    <span>Edit</span>
                                </a>
                            </div>
                            <button class="btn btn-success d-grid w-100" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
                                <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bi bi-currency-dollar me-2"></i>Add Payment</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /Invoice Actions -->
            </div>

            <!-- Offcanvas -->
            <!-- Send Invoice Sidebar -->
            <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
                <div class="mb-6 border-bottom offcanvas-header">
                    <h5 class="offcanvas-title">Send Invoice</h5>
                    <button type="button" class="text-reset btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="flex-grow-1 pt-0 offcanvas-body">
                    <form>
                        <div class="mb-6">
                            <label for="invoice-from" class="form-label">From</label>
                            <input type="text" class="form-control" id="invoice-from" placeholder="company@email.com" />
                        </div>
                        <div class="mb-6">
                            <label for="invoice-to" class="form-label">To</label>
                            <input type="text" class="form-control" id="invoice-to" placeholder="company@email.com" />
                        </div>
                        <div class="mb-6">
                            <label for="invoice-subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="invoice-subject" placeholder="Invoice regarding goods" />
                        </div>
                        <div class="mb-6">
                            <label for="invoice-message" class="form-label">Message</label>
                            <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">
                        Dear Queen Consolidated,
                        Thank you for your business, always a pleasure to work with you!
                        We have generated a new invoice in the amount of $95.59
                        We would appreciate payment of this invoice by 05/11/2021
                        </textarea>
                        </div>

                        <div class="mb-6">
                            <span class="bg-label-primary badge">
                                <i class="icon-base bi bi-paperclip icon-xs"></i>
                                <span class="align-middle">Invoice Attached</span>
                            </span>
                        </div>
                        <div class="d-flex flex-wrap mb-6">
                            <button type="button" class="me-4 btn btn-primary" data-bs-dismiss="offcanvas"> Send </button>
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="offcanvas"> Cancel </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Send Invoice Sidebar -->

            <!-- Add Payment Sidebar -->
            <div class="offcanvas offcanvas-end border-0" id="addPaymentOffcanvas" aria-hidden="true">
                <div class="offcanvas-header border-bottom border-secondary">
                    <h5 class="offcanvas-title">Add Payment</h5>
                    <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center p-3 mb-4 rounded-3" style="background: rgba(56, 189, 248, 0.1); border: 1px dashed #38bdf8;">
                        <p class="mb-0">Invoice Balance:</p>
                        <p class="fw-bold mb-0 product-price h5">$5,000.00</p>
                    </div>

                    <form>
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted" for="invoiceAmount">Payment Amount</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text bg-dark border-secondary text-white">$</span>
                                <input type="number" id="invoiceAmount" class="form-control bg-transparent border-secondary" placeholder="100" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted" for="payment-date">Payment Date</label>
                            <div class="input-group">
                                <input id="payment-date" class="form-control bg-transparent border-secondary date-picker" type="text" placeholder="YYYY-MM-DD" />
                                <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-calendar3"></i></span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted" for="payment-method">Payment Method</label>
                            <select class="form-select bg-transparent border-secondary" id="payment-method">
                                <option value="" selected disabled>Select method</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Paypal">Paypal</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label class="form-label small fw-bold text-uppercase text-muted" for="payment-note">Internal Payment Note</label>
                            <textarea class="form-control bg-transparent border-secondary text-white" id="payment-note" rows="3" placeholder="Add a note..."></textarea>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-primary flex-grow-1" data-bs-dismiss="offcanvas">
                                <i class="bi bi-check2-circle me-1"></i> Send Payment
                            </button>
                            <button type="button" class="btn btn-outline-primary flex-grow-1" data-bs-dismiss="offcanvas">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Add Payment Sidebar -->

            <!-- /Offcanvas -->
        </div>
        <!-- / Content -->
    </div>
</main>

<?php include 'function/footer.php'; ?>