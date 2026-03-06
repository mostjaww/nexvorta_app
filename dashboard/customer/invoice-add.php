<?php include 'function/header.php'; ?>

<main class="main py-5">
    <div class="content-wrapper">
        <div class="flex-grow-1 container-p-y container-xxl">
            <div class="row invoice-add">
                <div class="mb-6 mb-lg-0 col-lg-9 col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-body invoice-preview-header">
                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start">
                                <div class="mb-4 mb-sm-0">
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
                                        <span class="h4 text-white mb-0 me-3">Invoice</span>
                                        <input type="text" class="form-control bg-white-transparent border-0 text-white w-px-150" value="#3905" readonly />
                                    </div>
                                    <div class="d-flex flex-column gap-2">
                                        <div class="d-flex justify-content-between gap-3">
                                            <span class="text-white">Date Issued:</span>
                                            <div class="input-group input-group-merge w-px-100">
                                                <input type="text" class="form-control form-control-sm border-0 bg-white-transparent text-white date-picker" placeholder="YYYY-MM-DD" readonly />
                                                <span class="input-group-text border-0 bg-white-transparent">
                                                    <i class="bi bi-calendar3 text-white"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between gap-3">
                                            <span class="text-white">Due Date:</span>
                                            <div class="input-group input-group-merge w-px-100">
                                                <input type="text" class="form-control form-control-sm border-0 bg-white-transparent text-white date-picker" placeholder="YYYY-MM-DD" readonly />
                                                <span class="input-group-text border-0 bg-white-transparent">
                                                    <i class="bi bi-calendar3 text-white"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body mt-4">
                            <div class="row g-4">
                                <div class="col-md-6 col-12">
                                    <h6 class="text-muted small fw-bold mb-3">Invoice To:</h6>
                                    <select class="form-select mb-3 select2">
                                        <option>Jordan Stevenson</option>
                                        <option>Wesley Burland</option>
                                        <option>Marvin McKinney</option>
                                        <option>Darrell Steward</option>
                                        <option>Devon Lane</option>
                                        <option>Theresa Webb</option>
                                        <option>Other Client</option>
                                    </select>
                                    <div class="client-details p-3 rounded-3">
                                        <p class="mb-1 fw-medium">Shelby Company Limited</p>
                                        <p class="mb-1 small text-muted">Small Heath, B10 0HF, UK</p>
                                        <p class="mb-1 small text-muted">718-986-6062</p>
                                        <p class="mb-0 small text-muted">peakyFBlinders@gmail.com</p>
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
                                    <div class="row g-3" data-repeater-item>
                                        <div class="col-md-5 col-12">
                                            <label class="form-label fw-bold small">Item Description</label>
                                            <select class="form-select mb-2">
                                                <option selected>App Customization</option>
                                                <option>App Design</option>
                                                <option>App Development</option>
                                            </select>
                                            <textarea class="form-control" rows="2" placeholder="Detail description..."></textarea>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label fw-bold small">Cost</label>
                                            <input type="number" class="form-control" value="24" />
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label fw-bold small">Qty</label>
                                            <input type="number" class="form-control" value="1" />
                                        </div>
                                        <div class="col-md-2 col-10 text-md-end">
                                            <label class="form-label fw-bold small d-block">Price</label>
                                            <span class="h6 mb-0 d-inline-block mt-2">$24.00</span>
                                        </div>
                                        <div class="col-md-1 col-2 text-end">
                                            <button type="button" class="btn btn-label-danger mt-md-4 p-2" data-repeater-delete><i class="bi bi-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm rounded-pill" data-repeater-create><i class="bi bi-plus me-1"></i> Add Item</button>
                            </form>
                        </div>

                        <div class="card-body bg-light-subtle rounded-bottom">
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-4">
                                    <label class="form-label fw-bold small">Salesperson Note</label>
                                    <input type="text" class="form-control form-control-sm bg-white-transparent text-muted mb-2" placeholder="Alfie Solomons" />
                                    <textarea class="form-control border-dashed" rows="1" placeholder="Thanks for your business!"></textarea>
                                </div>
                                <div class="col-md-6 d-flex justify-content-md-end">
                                    <div class="w-px-250">
                                        <div class="d-flex justify-content-between mb-2"><span>Subtotal:</span><span class="fw-bold">$1800</span></div>
                                        <div class="d-flex justify-content-between mb-2"><span>Discount:</span><span class="text-danger">-$28</span></div>
                                        <div class="d-flex justify-content-between mb-3"><span>Tax:</span><span>21%</span></div>
                                        <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                                            <span class="h5 mb-0">Total:</span>
                                            <span class="h4 mb-0 text-primary fw-bold">$1,690.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-12 invoice-actions">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <button class="btn btn-primary w-100 mb-3 shadow-primary" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                                <i class="bi bi-send me-2"></i> Send Invoice
                            </button>
                            <div class="d-flex gap-2">
                                <a class="btn btn-secondary w-100" href="index.php?token=<?= encrypt(date('Ymd')); ?>&hal=dashboard/customer/invoice-preview">Preview</a>
                                <button class="btn btn-secondary w-100" id="download-btn">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card p-4">
                        <label class="form-label fw-bold small mb-3">Accept Payments Via</label>
                        <select class="form-select mb-4">
                            <option>Bank Account</option>
                            <option>Paypal</option>
                            <option>Credit/Debit Card</option>

                        </select>
                        <div class="form-check form-switch mb-3 d-flex justify-content-between ps-0">
                            <label class="form-check-label small">Payment Terms</label>
                            <input class="form-check-input ms-0" type="checkbox" checked>
                        </div>
                        <div class="form-check form-switch d-flex justify-content-between ps-0">
                            <label class="form-check-label small">Client Notes</label>
                            <input class="form-check-input ms-0" type="checkbox" checked>
                        </div>
                    </div>
                </div>
            </div>
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

        <!-- /Offcanvas -->
    </div>
</main>

<?php include 'function/footer.php'; ?>