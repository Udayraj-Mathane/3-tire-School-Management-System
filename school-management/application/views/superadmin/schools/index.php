<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Schools</h2>
        <a href="<?= site_url('superadmin/schools/create') ?>" class="btn btn-success">
            + Add School
        </a>
    </div>

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

    <?php if (!empty($schools)): ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>School ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schools as $i => $school): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($school['school_id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($school['name'] ?? '') ?></td>
                        <td><?= htmlspecialchars($school['email'] ?? '') ?></td>
                        <td><?= htmlspecialchars($school['phone'] ?? '') ?></td>
                        <td><?= htmlspecialchars($school['address'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>

        <div class="alert alert-info">
            No schools found.
        </div>

    <?php endif; ?>

</div>