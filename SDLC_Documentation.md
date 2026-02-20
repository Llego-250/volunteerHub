# Software Development Life Cycle (SDLC) - VolunteerHub Project

## 1. Planning Phase

**Objective:** Define project scope, goals, and feasibility for VolunteerHub platform.

**Application to VolunteerHub:**
The planning phase identified the need for a web-based platform connecting volunteers with event organizers. Key objectives included creating a dual-role system (volunteers and organizers), event management capabilities, and community engagement features. Feasibility analysis confirmed that a PHP-MySQL backend with vanilla JavaScript frontend would be cost-effective and suitable for the project scale. Resource allocation included database design, API development, and responsive UI implementation. The project scope defined core features: user authentication, event browsing/creation, registration system, messaging, volunteer hour tracking, and gamification through badges.

---

## 2. Requirements Analysis Phase

**Objective:** Gather and document functional and non-functional requirements.

**Application to VolunteerHub:**
Functional requirements identified include:
- User registration/login with role-based access (volunteer/organizer)
- Event CRUD operations with categories, dates, locations, and capacity limits
- Registration system allowing volunteers to sign up for events
- Messaging system for communication between users
- Volunteer hour tracking with approval workflow
- Badge system to reward volunteer contributions
- Contact form for inquiries

Non-functional requirements include responsive design for mobile/desktop, secure password storage, real-time data updates, and intuitive navigation. The database schema was designed with 8 tables (users, events, event_registrations, messages, contacts, volunteer_hours, badges, user_badges) to support these requirements with proper relationships and constraints.

---

## 3. Design Phase

**Objective:** Create system architecture, database schema, and UI/UX designs.

**Application to VolunteerHub:**
The system architecture follows a three-tier model:
- **Presentation Layer:** HTML pages (index.html, events.html, dashboards) with CSS styling (main.css, dashboard.css)
- **Application Layer:** RESTful API endpoints in PHP (users.php, events.php, registrations.php, messages.php, hours.php, badges.php, contact.php)
- **Data Layer:** MySQL database with normalized schema

Database design includes foreign key relationships ensuring data integrity (CASCADE deletes), ENUM types for roles and statuses, and unique constraints preventing duplicate registrations. UI design features a hero section with video background, event grid layout, modal-based authentication, and separate dashboards for volunteers and organizers. The design emphasizes accessibility with Font Awesome icons and semantic HTML structure.

---

## 4. Implementation/Development Phase

**Objective:** Write code based on design specifications.

**Application to VolunteerHub:**
Development was structured into modular components:
- **Backend API:** Eight PHP files handling different functionalities with PDO for secure database operations and CORS headers for cross-origin requests
- **Frontend JavaScript:** Modular JS files (auth.js, events-page.js, calendar.js, organizer-dashboard.js, volunteer-dashboard.js, contact.js, main.js) managing user interactions and API calls
- **Database:** SQL scripts for schema creation (volunteer_hub.sql) and sample data insertion (insert_sample_events.sql)
- **Styling:** Responsive CSS with mobile-first approach, custom animations, and consistent color scheme

Key implementation features include password hashing with bcrypt, session management, dynamic content loading via AJAX, and real-time form validation. The code follows separation of concerns with config.php centralizing database connections.

---

## 5. Testing Phase

**Objective:** Verify functionality, identify bugs, and ensure quality standards.

**Application to VolunteerHub:**
Testing activities include:
- **Unit Testing:** Individual API endpoints tested for correct CRUD operations, authentication validation, and error handling
- **Integration Testing:** Verified data flow between frontend JavaScript, PHP APIs, and MySQL database; tested user registration → event creation → volunteer registration workflow
- **Functional Testing:** Validated all user stories including event browsing, registration, messaging, hour logging, and badge earning
- **UI/UX Testing:** Tested responsive design across devices, modal functionality, form submissions, and navigation
- **Security Testing:** Verified SQL injection prevention through PDO prepared statements, XSS protection, and secure password storage
- **Database Testing:** Confirmed foreign key constraints, unique constraints, and cascade operations work correctly

A test_messaging.html file was created for isolated messaging feature testing.

---

## 6. Deployment Phase

**Objective:** Release the application to production environment.

**Application to VolunteerHub:**
Deployment preparation includes:
- **Environment Setup:** XAMPP/WAMP/LAMP stack configuration with Apache web server, PHP 7.4+, and MySQL 5.7+
- **Database Deployment:** Execute volunteer_hub.sql to create schema and insert_sample_events.sql for initial data
- **Configuration:** Update config.php with production database credentials and server paths
- **File Structure:** Organize files into logical directories (api/, database/, js/, pages/, styles/, video/)
- **Third-party Integration:** Tawk.to live chat widget integrated for user support
- **Web Server Configuration:** Set document root to project directory, enable mod_rewrite for clean URLs if needed

The application is designed for local development initially, with straightforward migration path to cloud hosting (AWS, Azure, or shared hosting).

---

## 7. Maintenance Phase

**Objective:** Provide ongoing support, bug fixes, and enhancements.

**Application to VolunteerHub:**
Maintenance activities include:
- **Corrective Maintenance:** Monitor error logs, fix reported bugs in API responses, resolve UI inconsistencies
- **Adaptive Maintenance:** Update PHP/MySQL versions, ensure compatibility with modern browsers, adapt to changing security standards
- **Perfective Maintenance:** Add new badge tiers, implement advanced search filters, enhance messaging with notifications, add event rating system
- **Preventive Maintenance:** Regular database backups, security patches, code refactoring for performance optimization, update dependencies

The modular architecture facilitates easy maintenance with clear separation between frontend and backend. Database schema supports future extensions through additional tables without breaking existing functionality. Version control and documentation enable smooth handoffs and collaborative maintenance.

---

## Summary

The VolunteerHub project demonstrates a complete SDLC implementation from initial planning through deployment and maintenance. Each phase built upon the previous, resulting in a functional volunteer management platform with robust features, secure architecture, and scalable design. The systematic approach ensured all stakeholder requirements were met while maintaining code quality and system reliability.
