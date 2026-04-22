<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Page Header -->
<div class="page-header">
    <h2>My <span>Profile</span></h2>

    <a href="<?= site_url('student/dashboard') ?>" class="btn-back">
        Back to Dashboard
    </a>
</div>

<!-- Flash Messages -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success mb-4">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger mb-4">
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<div class="row g-4">

    <!-- Profile Info Card -->
    <div class="col-md-5">
        <div class="card text-center p-4">
            <i class="bi bi-person-circle" style="font-size:70px; color:#2563eb;"></i>

            <h4 class="mt-3"><?= htmlspecialchars($name ?? '') ?></h4>
            <p class="text-muted mb-1"><?= htmlspecialchars($email ?? '') ?></p>

            <span class="badge-course mt-2">
                Student ID: <?= htmlspecialchars($student_id ?? '') ?>
            </span>
        </div>
    </div>

    <!-- Edit Profile -->
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                Update Profile
            </div>

            <div class="card-body p-4">

                <form method="POST" action="<?= site_url('student/profile/update') ?>">

                    <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

                    <div class="mb-3">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" class="form-control"
                               value="<?= set_value('name', $name ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control"
                               value="<?= set_value('email', $email ?? '') ?>" required>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn-save">
                            Update Profile
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>