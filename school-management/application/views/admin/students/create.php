<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger mb-4">
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Page Header -->
<div class="page-header">
    <h2>
        <?= isset($student) ? 'Edit' : 'Add New' ?> Student
    </h2>

    <a href="<?= site_url('admin/students') ?>" class="btn-back">
        Back
    </a>
</div>

<div class="card">
    <div class="card-body p-4">

        <form method="POST"
              action="<?= isset($student) 
                    ? site_url('admin/students/update/' . $student['id']) 
                    : site_url('admin/students/store') ?>">

            <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

            <div class="row g-3">

                <div class="col-md-6">
                    <label>Student ID *</label>
                    <input type="text" name="student_id" class="form-control"
                           value="<?= set_value('student_id', $student['student_id'] ?? '') ?>" required>
                </div>

                <div class="col-md-6">
                    <label>Name *</label>
                    <input type="text" name="name" class="form-control"
                           value="<?= set_value('name', $student['name'] ?? '') ?>" required>
                </div>

                <div class="col-md-6">
                    <label>Email *</label>
                    <input type="email" name="email" class="form-control"
                           value="<?= set_value('email', $student['email'] ?? '') ?>" required>
                </div>

                <div class="col-md-6">
                    <label>Course *</label>
                    <input type="text" name="course" class="form-control"
                           value="<?= set_value('course', $student['course'] ?? '') ?>" required>
                </div>

                <div class="col-md-6">
                    <label>Gender *</label>
                    <select name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?= set_select('gender', 'Male', ($student['gender'] ?? '') == 'Male') ?>>Male</option>
                        <option value="Female" <?= set_select('gender', 'Female', ($student['gender'] ?? '') == 'Female') ?>>Female</option>
                        <option value="Other" <?= set_select('gender', 'Other', ($student['gender'] ?? '') == 'Other') ?>>Other</option>
                    </select>
                </div>

                <div class="col-12 mt-2">
                    <button type="submit" class="btn-save">
                        <?= isset($student) ? 'Update' : 'Save' ?>
                    </button>
                    <a href="<?= site_url('admin/students') ?>" class="btn-back">
                        Cancel
                    </a>
                </div>

            </div>
        </form>

    </div>
</div>