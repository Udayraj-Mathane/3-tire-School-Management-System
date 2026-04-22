<div class="container mt-4">

    <!-- Flash Messages -->
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

    <!-- Dashboard Header -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>Admin Dashboard</h3>
            <p class="mb-1"><strong>Email:</strong> <?= $email ?></p>
            <p class="mb-0"><strong>School ID:</strong> <?= $school_id ?></p>
            <p class="mb-0"><strong>Total Students:</strong> <?= (int) ($total_students ?? 0) ?></p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">

        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <h5>Students</h5>
                <p>Manage all students</p>
                <a href="<?= site_url('admin/students') ?>" class="btn btn-primary">
                    Go to Students
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <h5>Add Student</h5>
                <p>Create new student</p>
                <a href="<?= site_url('admin/students/create') ?>" class="btn btn-success">
                    Add Student
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <h5>Logout</h5>
                <p>End your session</p>
                <a href="<?= site_url('logout') ?>" class="btn btn-danger">
                    Logout
                </a>
            </div>
        </div>

    </div>

</div>
