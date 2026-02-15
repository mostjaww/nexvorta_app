        <!--<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>-->
        <script src="assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
        <script src="assets/dist/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="assets/plugins/icheck/icheck.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="assets/dist/js/pages/forms-basic.active.js"></script>
        <script src="assets/dist/js/sidebar.js"></script>
        <script src="assets/plugins/datatables/dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/data-basic.active.js"></script>
        <script src="assets/plugins/select2/dist/js/select2.min.js"></script>
        <script src="assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js"></script>
        <script src="assets/dist/js/pages/demo.select2.js"></script>
        <script src="assets/dist/js/pages/demo.jquery.sumoselect.js"></script>
        <script src="assets/plugins/jQuery-mask-plugin/jquery.mask.min.js"></script>
        <script src="assets/plugins/jQuery-mask-plugin/examples.js"></script>
        <script src="assets/dist/js/jquery.floatThead.js"></script>
        <script src="assets/plugins/summernote/summernote.min.js"></script>
        <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="assets/dist/js/pages/compose.active.js"></script>
        <script src="assets/plugins/modals/classie.js"></script>
        <script src="assets/plugins/modals/modalEffects.js"></script>
        <script src="assets/plugins/purecounter/purecounter_vanilla.js"></script>
        <script src="https://cdn.amcharts.com/lib/version/5.12.2/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/version/5.12.2/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/version/5.12.2/themes/Animated.js"></script>
        <script src="https://cdn.amcharts.com/lib/version/5.12.2/locales/de_DE.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script src="assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sneat-bootstrap-html-admin-template-free@1.0.0/assets/js/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

        <!-- Highcharts JS -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <!-- Optional: Highcharts Pie/Donut and Bar -->
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
        <script>
                AOS.init();

                new PureCounter();

                function downloadPNG(elementId, filename) {
                        var element = document.getElementById(elementId);

                        // Sembunyikan tombol download sementara agar tidak ikut tercapture
                        var btn = element.querySelector('button');
                        if (btn) btn.style.display = 'none';

                        html2canvas(element, {
                                scale: 2, // Meningkatkan resolusi gambar (opsional)
                                useCORS: true, // Mengizinkan pengambilan gambar dari domain lain jika ada
                                backgroundColor: '#ffffff' // Memastikan latar belakang putih
                        }).then(canvas => {
                                // Kembalikan tombol download
                                if (btn) btn.style.display = 'block';

                                // Buat link download
                                var link = document.createElement('a');
                                link.download = filename + '.png';
                                link.href = canvas.toDataURL("image/png");
                                link.click();
                        }).catch(err => {
                                // Kembalikan tombol jika terjadi error
                                if (btn) btn.style.display = 'block';
                                console.error("Gagal membuat gambar:", err);
                                alert("Maaf, terjadi kesalahan saat membuat gambar.");
                        });
                }
        </script>

        <!-- <script type="text/javascript">
                var $table = $('table.tabletop');
                $table.floatThead({
                        top: 55,
                        zIndex: 1001
                });
        </script>-->
        </body>

        </html>