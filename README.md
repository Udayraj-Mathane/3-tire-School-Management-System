Multi-School Student Management System

A multi-tenant Student Management System built using CodeIgniter 3 (Frontend) and a REST API (Backend).
This system allows a Super Admin to manage multiple schools, while each school has its own Admin and Students with strict data isolation.

🚀 Features
🔐 Authentication & Roles
Secure login system
Role-based access:
Super Admin
Admin (School-level)
Student
🏫 Super Admin Panel
Manage multiple schools
Create school-specific admins
View system-wide statistics:
Total Schools
Total Admins
Total Students
👨‍💼 Admin Panel
Manage students within their school only
Perform full CRUD operations:
Add Student
Edit Student
Delete Student
Cannot access other schools' data (multi-tenant isolation)
🎓 Student Panel
View personal dashboard
Update profile details
🧠 Multi-Tenant Architecture

This system follows a multi-school (multi-tenant) architecture:

Each school has a unique school_id
Data is isolated per school
Admins can only access their own school’s data
Super Admin has global access
🔌 API Integration
Backend is built as a REST API
Frontend communicates via cURL requests
Uses:
Basic Authentication
API Key validation
🗄️ Database Design

Key tables:

schools → Stores school information
admins → School admins
students → Student records
users → Authentication & role mapping
api_keys → API security

Relationships:

One School → Many Admins
One School → Many Students
🛠️ Tech Stack
Frontend: CodeIgniter 3
Backend API: CodeIgniter + REST Server
Database: MySQL / MariaDB
UI: Bootstrap 5
🔒 Security Features
Role-based access control
Session-based authentication
API Key validation
School-level data filtering
⚙️ Setup Instructions
Clone the repository
Import the database (multi_school_db)
Configure:
base_url
Database credentials

Run backend API:
http://localhost/multi-school-api/

Run frontend:
http://localhost/your-project/

📌 Future Improvements
Password encryption (bcrypt)
JWT authentication
School-wise analytics dashboard
Pagination & search filters
Role permissions system

👨‍💻 Author
Udayraj Mathane
Student Management System Project
