<footer class="main-footer">

    <div class="float-right d-none d-sm-inline">

        <strong>Versi 1.0</strong>

    </div>

    <strong>SIMARKUM</strong>

    - Sistem Manajemen Arsip Hukum

    <br>

    <small>

        Law Office Syamsul Arif and Partners

    </small>

    <br>

    <small>

        Copyright &copy; <?= date('Y') ?>

        Muhammad Zuhran.

        All rights reserved.

    </small>

</footer>

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- AdminLTE -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- SweetAlert -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

<!-- Script halaman -->
<?= $this->renderSection('scripts') ?>

</body>
</html>