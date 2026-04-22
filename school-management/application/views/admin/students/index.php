<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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

<!-- Page Header -->
<div class="page-header">
    <h2>Students</h2>
    <a href="<?= site_url('admin/students/create') ?>" class="btn-add">
        + Add Student
    </a>
</div>

<div class="card">
    <div class="card-body p-0">

        <?php if (!empty($students)): ?>

            <table class="table table-students">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Gender</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($students as $i => $s): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($s['student_id']) ?></td>
                            <td><?= htmlspecialchars($s['name']) ?></td>
                            <td><?= htmlspecialchars($s['email']) ?></td>
                            <td><?= htmlspecialchars($s['course']) ?></td>
                            <td><?= htmlspecialchars($s['gender']) ?></td>
                            <td>
                                <a href="<?= site_url('admin/students/edit/' . $s['id']) ?>" class="btn-edit">
                                    Edit
                                </a>

                                <a href="<?= site_url('admin/students/delete/' . $s['id']) ?>"
                                   class="btn-delete"
                                   onclick="return confirm('Delete this student?')">
                                    Delete
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php else: ?>

            <div class="empty-state">
                <p>No students found.</p>
                <a href="<?= site_url('admin/students/create') ?>" class="btn-add">
                    Add First Student
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
