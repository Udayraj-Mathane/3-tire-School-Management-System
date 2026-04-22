<div class="container mt-4">

    <h2>Super Admin Dashboard</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="row g-3 mt-2 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h4><?= (int) ($total_schools ?? 0) ?></h4>
                    <p class="mb-0">Total Schools</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h4><?= (int) ($total_students ?? 0) ?></h4>
                    <p class="mb-0">Total Students</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h4><?= (int) ($total_admins ?? 0) ?></h4>
                    <p class="mb-0">Total Admins</p>
                </div>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="row mt-4">

        <!-- Schools -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Schools</h5>
                    <p>Manage all schools</p>
                    <a href="<?= site_url('superadmin/schools') ?>" class="btn btn-primary">
                        View Schools
                    </a>
                </div>
            </div>
        </div>

        <!-- Create School -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Create School</h5>
                    <p>Add new school</p>
                    <a href="<?= site_url('superadmin/schools/create') ?>" class="btn btn-success">
                        Add School
                    </a>
                </div>
            </div>
        </div>

        <!-- Create Admin -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Create Admin</h5>
                    <p>Add admin for school</p>
                    <a href="<?= site_url('superadmin/admins/create') ?>" class="btn btn-warning">
                        Add Admin
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
