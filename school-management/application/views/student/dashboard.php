<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Welcome -->
<div class="page-header">
    <h2>Welcome, <span><?= htmlspecialchars($name ?? 'Student') ?></span></h2>
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

<!-- Dashboard Cards -->
<div class="row g-4">

    <!-- Profile Card -->
    <div class="col-md-4">
        <div class="card text-center p-4">
            <i class="bi bi-person-circle" style="font-size:40px; color:#2563eb;"></i>
            <h5 class="mt-3"><?= htmlspecialchars($name ?? '') ?></h5>
            <p class="text-muted mb-1"><?= htmlspecialchars($email ?? '') ?></p>
            <small class="text-secondary">Student ID: <?= htmlspecialchars($student_id ?? '') ?></small>

            <a href="<?= site_url('student/profile') ?>" class="btn-add mt-3">
                View Profile
            </a>
        </div>
    </div>

    <!-- Courses Card -->
    <div class="col-md-4">
        <div class="card text-center p-4">
            <i class="bi bi-book" style="font-size:40px; color:#16a34a;"></i>
            <h5 class="mt-3">My Courses</h5>
            <p class="text-muted">View enrolled courses</p>

            <a href="#" class="btn-add mt-3">
                View Courses
            </a>
        </div>
    </div>

    <!-- Activity Card -->
    <div class="col-md-4">
        <div class="card text-center p-4">
            <i class="bi bi-graph-up-arrow" style="font-size:40px; color:#f59e0b;"></i>
            <h5 class="mt-3">Activity</h5>
            <p class="text-muted">Track your progress</p>

            <a href="#" class="btn-add mt-3">
                View Activity
            </a>
        </div>
    </div>

</div>

<!-- Extra Section -->
<div class="card mt-4">
    <div class="card-header">
        <i class="bi bi-info-circle"></i> Quick Info
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> <?= htmlspecialchars($name ?? '') ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email ?? '') ?></p>
        <p><strong>Student ID:</strong> <?= htmlspecialchars($student_id ?? '') ?></p>
    </div>
</div>
