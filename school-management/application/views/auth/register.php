<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Register</h5>
                    </div>

                    <div class="card-body">

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= site_url('register') ?>" method="POST">

                            <div class="row">

                                <!-- First Name -->
                                <div class="col-md-6 mb-3">
                                    <label>First Name</label>
                                    <input type="text" name="first_name"
                                        value="<?= set_value('first_name') ?>"
                                        class="form-control" required>
                                </div>

                                <!-- Last Name -->
                                <div class="col-md-6 mb-3">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name"
                                        value="<?= set_value('last_name') ?>"
                                        class="form-control" required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email"
                                        value="<?= set_value('email') ?>"
                                        class="form-control" required>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6 mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password"
                                        class="form-control" required>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6 mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cpassword"
                                        class="form-control" required>
                                </div>

                                <!-- Role -->
                                <div class="col-md-6 mb-3">
                                    <label>Register As</label>
                                    <select name="role" class="form-control" required>
                                        <option value="">Select Role</option>
                                        <option value="student">Student</option>
                                        <option value="admin">School Admin</option>
                                    </select>
                                </div>

                                <!-- School ID -->
                                <div class="col-md-6 mb-3">
                                    <label>School ID</label>
                                    <input type="text" name="school_id"
                                        value="<?= set_value('school_id') ?>"
                                        class="form-control"
                                        placeholder="Enter School ID (e.g. SCH001)">
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>