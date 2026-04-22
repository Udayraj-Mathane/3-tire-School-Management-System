<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Flash Messages -->
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger mb-4">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Page Header -->
<div class="page-header">
    <h2>
        <i class="bi bi-pencil-square" style="color:#0ea5e9;"></i> &nbsp;Edit
        <span><?= htmlspecialchars($student['name'] ?? 'Student') ?></span>
    </h2>
    <a href="<?= site_url('admin/students') ?>" class="btn-back">
        <i class="bi bi-arrow-left"></i> Back to List
    </a>
</div>

<!-- Form Card -->
<div class="card">
    <div class="card-header">
        <i class="bi bi-pencil"></i> Update Student Information
    </div>
    <div class="card-body p-4">
        <form method="POST" action="<?= site_url('admin/students/update/' . $student['id']) ?>" autocomplete="off">
            <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

            <div class="row g-3">

                <!-- Student ID -->
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="bi bi-person-badge" style="color:#2563eb;"></i> Student ID
                        <span style="color:red;">*</span>
                    </label>
                    <input type="text"
                           name="student_id"
                           class="form-control"
                           value="<?= htmlspecialchars(set_value('student_id', $student['student_id'] ?? '')) ?>"
                           required>
                </div>

                <!-- Name -->
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="bi bi-person" style="color:#2563eb;"></i> Full Name
                        <span style="color:red;">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="<?= htmlspecialchars(set_value('name', $student['name'] ?? '')) ?>"
                           required>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="bi bi-envelope" style="color:#2563eb;"></i> Email Address
                        <span style="color:red;">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?= htmlspecialchars(set_value('email', $student['email'] ?? '')) ?>"
                           required>
                </div>

                <!-- Course -->
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="bi bi-book" style="color:#2563eb;"></i> Course
                        <span style="color:red;">*</span>
                    </label>
                    <input type="text"
                           name="course"
                           class="form-control"
                           value="<?= htmlspecialchars(set_value('course', $student['course'] ?? '')) ?>"
                           required>
                </div>

                <!-- Gender -->
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="bi bi-gender-ambiguous" style="color:#2563eb;"></i> Gender
                        <span style="color:red;">*</span>
                    </label>
                    <select name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?= set_select('gender', 'Male', ($student['gender'] ?? '') == 'Male') ?>>Male</option>
                        <option value="Female" <?= set_select('gender', 'Female', ($student['gender'] ?? '') == 'Female') ?>>Female</option>
                        <option value="Other" <?= set_select('gender', 'Other', ($student['gender'] ?? '') == 'Other') ?>>Other</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="col-12 d-flex gap-3 mt-2">
                    <button type="submit" class="btn-save" style="background:#0ea5e9;">
                        <i class="bi bi-arrow-up-circle-fill"></i> Update Student
                    </button>
                    <a href="<?= site_url('admin/students') ?>" class="btn-back">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>