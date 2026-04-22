<div class="container mt-4">

    <h2>Create School Admin</h2>

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

    <form action="<?= site_url('superadmin/admins/store') ?>" method="POST">

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter admin email" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>

        <div class="mb-3">
            <label>School ID</label>
            <?php if (!empty($schools)): ?>
                <select name="school_id" class="form-control" required>
                    <option value="">Select School</option>
                    <?php foreach ($schools as $school): ?>
                        <option value="<?= htmlspecialchars($school['school_id'] ?? '') ?>">
                            <?= htmlspecialchars(($school['name'] ?? 'School') . ' (' . ($school['school_id'] ?? '') . ')') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php else: ?>
                <input type="text" name="school_id" class="form-control" placeholder="e.g. SCH101" required>
            <?php endif; ?>
        </div>

        <!-- Hidden role -->
        <input type="hidden" name="role" value="admin">

        <button type="submit" class="btn btn-primary">Create Admin</button>
        <a href="<?= site_url('superadmin/dashboard') ?>" class="btn btn-secondary">Back</a>

    </form>

</div>
