<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Login</h5>
                    </div>

                    <div class="card-body">

                        <!-- Flash Messages -->
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success mb-3">
                                <?= $this->session->flashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger mb-3">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= site_url('login') ?>" method="POST">

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email_id" class="form-control"
                                       value="<?= set_value('email_id') ?>" required>
                                <small class="text-danger"><?= form_error('email_id'); ?></small>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                <small class="text-danger"><?= form_error('password'); ?></small>
                            </div>

                            <!-- Role Selection (NEW 🔥) -->
                            <div class="mb-3">
                                <label class="form-label">Login As</label>
                                <select name="role" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="superadmin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>

                        </form>

                        <!-- Register -->
                        <div class="text-center mt-3">
                            <small>
                                Don't have an account?
                                <a href="<?= site_url('register') ?>">Register</a>
                            </small>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>