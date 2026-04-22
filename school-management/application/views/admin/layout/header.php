<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) . ' | ' : '' ?>Student Management</title>
    <link rel="icon" href="data:,">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ---- Base ---- */
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f0f4f8;
            color: #1e293b;
            min-height: 100vh;
        }

        /* ---- Navbar ---- */
        .navbar {
            background: #1e3a5f;
            padding: 0.9rem 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        .navbar-brand {
            font-size: 1.3rem;
            font-weight: 700;
            color: #fff !important;
            letter-spacing: 0.5px;
        }
        .navbar-brand i {
            color: #60a5fa;
            margin-right: 8px;
        }
        .navbar .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            transition: color 0.2s;
        }
        .navbar .nav-link:hover { color: #fff !important; }
        .navbar-user {
            color: #e2e8f0;
            font-size: 0.9rem;
            font-weight: 500;
            margin-right: 12px;
        }
        .btn-logout {
            background: #ef4444;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 600;
            font-size: 0.88rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
        }
        .btn-logout:hover {
            background: #dc2626;
            color: #fff;
        }

        /* ---- Page Wrapper ---- */
        .page-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        /* ---- Page Header ---- */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }
        .page-header h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }
        .page-header h2 span {
            color: #2563eb;
        }

        /* ---- Card ---- */
        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }
        .card-header {
            background: #1e3a5f;
            color: white;
            border-radius: 14px 14px 0 0 !important;
            padding: 1rem 1.4rem;
            font-weight: 600;
            font-size: 1rem;
        }
        .card-header i { color: #60a5fa; margin-right: 8px; }

        /* ---- Buttons ---- */
        .btn-add {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 9px 18px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: background 0.2s, transform 0.1s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-add:hover { background: #1d4ed8; color: white; transform: translateY(-1px); }

        .btn-edit {
            background: #0ea5e9;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 5px 12px;
            font-size: 0.82rem;
            font-weight: 600;
            transition: background 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .btn-edit:hover { background: #0284c7; color: white; }

        .btn-delete {
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 5px 12px;
            font-size: 0.82rem;
            font-weight: 600;
            transition: background 0.2s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .btn-delete:hover { background: #dc2626; }

        .btn-back {
            background: #64748b;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 9px 18px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
        }
        .btn-back:hover { background: #475569; color: white; }

        .btn-save {
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: background 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-save:hover { background: #15803d; color: white; }

        /* ---- Table ---- */
        .table-students {
            margin: 0;
            font-size: 0.9rem;
        }
        .table-students thead th {
            background: #f8fafc;
            color: #64748b;
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            padding: 12px 16px;
        }
        .table-students tbody td {
            padding: 13px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }
        .table-students tbody tr:hover { background: #f8fafc; }
        .table-students tbody tr:last-child td { border-bottom: none; }

        .badge-course {
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        /* ---- Form ---- */
        .form-label {
            font-weight: 600;
            color: #374151;
            font-size: 0.88rem;
            margin-bottom: 6px;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            padding: 10px 14px;
            font-size: 0.92rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
        }

        /* ---- Alerts ---- */
        .alert {
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.92rem;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .alert-success { background: #dcfce7; color: #15803d; }
        .alert-danger  { background: #fee2e2; color: #dc2626; }

        /* ---- Empty state ---- */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }
        .empty-state i { font-size: 3rem; margin-bottom: 12px; display: block; }
        .empty-state p  { font-size: 1rem; font-weight: 500; }

        /* ---- Footer ---- */
        .site-footer {
            text-align: center;
            padding: 18px;
            font-size: 0.82rem;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

        <?php 
            $role = $this->session->userdata('role');
        ?>

        <!-- Dynamic Logo Link -->
        <a class="navbar-brand" href="<?=
            $role === 'superadmin' ? site_url('superadmin/dashboard') :
            ($role === 'admin' ? site_url('admin/dashboard') :
            site_url('student/dashboard'))
        ?>">
            StudentMS
        </a>

        <?php if ($this->session->userdata('logged_in')): ?>

            <!-- Menu Links -->
            <div class="d-flex align-items-center gap-3 ms-3">

                <?php if ($role === 'superadmin'): ?>
                    <a class="nav-link" href="<?= site_url('superadmin/dashboard') ?>">Dashboard</a>
                    <a class="nav-link" href="<?= site_url('superadmin/schools') ?>">Schools</a>
                    <a class="nav-link" href="<?= site_url('superadmin/admins/create') ?>">Create Admin</a>
                <?php endif; ?>

                <?php if ($role === 'admin'): ?>
                    <a class="nav-link" href="<?= site_url('admin/dashboard') ?>">Dashboard</a>
                    <a class="nav-link" href="<?= site_url('admin/students') ?>">Students</a>
                <?php endif; ?>

                <?php if ($role === 'student'): ?>
                    <a class="nav-link" href="<?= site_url('student/dashboard') ?>">Dashboard</a>
                    <a class="nav-link" href="<?= site_url('student/profile') ?>">Profile</a>
                <?php endif; ?>

            </div>

            <!-- User + Logout -->
            <div class="d-flex align-items-center ms-auto gap-2">
                <span class="navbar-user">
                    <?= htmlspecialchars($this->session->userdata('email') ?: 'User') ?>
                </span>
                <a href="<?= site_url('logout') ?>" class="btn-logout">
                    Logout
                </a>
            </div>

        <?php endif; ?>

    </div>
</nav>

<div class="page-wrapper">
