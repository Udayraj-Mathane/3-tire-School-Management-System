</div> <!-- end .page-wrapper -->

<footer class="site-footer text-center mt-4 py-3 bg-light">
    &copy; <?= date('Y') ?> Student Management System &mdash; Built By Uday
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto-dismiss alerts -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function(el) {
            el.style.transition = 'opacity 0.5s';
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500);
        });
    }, 4000);
});
</script>

</body>
</html>