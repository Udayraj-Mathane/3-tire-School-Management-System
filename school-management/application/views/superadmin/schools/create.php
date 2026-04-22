<div class="container mt-4">

    <h2>Create School</h2>

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('superadmin/schools/store') ?>" method="POST">

        <div class="mb-3">
            <label>School ID</label>
            <input type="text" name="school_id" class="form-control" placeholder="e.g. SCH101" required>
        </div>

        <div class="mb-3">
            <label>School Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter school name" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control" placeholder="Enter address"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create School</button>
        <a href="<?= site_url('superadmin/schools') ?>" class="btn btn-secondary">Back</a>

    </form>

</div>