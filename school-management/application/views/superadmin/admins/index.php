<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>School Admins</h2>
        <a href="<?= site_url('superadmin/admins/create') ?>" class="btn btn-primary">
            + Create Admin
        </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <p class="mb-0">Use this page to create school admin accounts through the shared API.</p>
        </div>
    </div>

</div>
