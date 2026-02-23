# VolunteerHub - Software Requirements Specification

## A) REQUIREMENT GATHERING METHOD

### Selected Method: **Use Case Driven Approach**

#### Justification
This method suits VolunteerHub because the system has distinct user roles (Volunteers, Organizers, Admins) with clear workflows for event management, registration, and hour tracking.

#### Techniques Applied

**1. Use Case Analysis**
- Identified 25+ use cases across 6 functional packages from UML diagrams
- Mapped interactions for each user role

**2. Stakeholder Interviews**
- Gathered requirements from volunteers, organizers, and admins
- Identified key pain points in manual processes

**3. Prototyping**
- Created mockups for dashboards and event registration flow
- Validated design with sample users

---

## B) SOFTWARE PROJECT REQUIREMENTS

### 1. USER REQUIREMENTS

#### 1.1 Volunteer Requirements
- **UR-V1**: Browse and search events by category, date, and location
- **UR-V2**: Register for events and receive confirmation
- **UR-V3**: Log volunteer hours and track total contributions
- **UR-V4**: Earn badges and view progress
- **UR-V5**: Message event organizers

#### 1.2 Organizer Requirements
- **UR-O1**: Create events with title, description, date, location, and capacity
- **UR-O2**: View and manage event registrations
- **UR-O3**: Approve or reject volunteer hour submissions
- **UR-O4**: Edit or cancel events

#### 1.3 Admin Requirements
- **UR-A1**: Manage user accounts
- **UR-A2**: Moderate events and content
- **UR-A3**: Configure badge criteria

---

### 2. SYSTEM REQUIREMENTS

#### 2.1 Hardware Requirements
- **Server**: 2 GHz dual-core CPU, 4 GB RAM, 20 GB SSD
- **Client**: Modern web browser, 320px+ screen width, 1 Mbps internet

#### 2.2 Software Requirements
- **Server**: Linux/Windows Server, Apache/Nginx, MySQL 8.0+, PHP 7.4+, SSL Certificate
- **Client**: Chrome/Firefox/Safari/Edge (latest versions), JavaScript enabled
- **Development**: Git, VS Code, Postman, phpMyAdmin

#### 2.3 Network Requirements
- HTTPS protocol
- RESTful API architecture

---

### 3. FUNCTIONAL REQUIREMENTS

#### 3.1 Authentication (FR-AUTH)
- **FR-AUTH-01**: Register with name, email, password, role; validate inputs; hash passwords with bcrypt
- **FR-AUTH-02**: Login with email/password; create session tokens; lock after 5 failed attempts
- **FR-AUTH-03**: Password reset via email; allow password changes
- **FR-AUTH-04**: Update profile (name, bio, skills, location, picture)

#### 3.2 Event Management (FR-EVENT)
- **FR-EVENT-01**: Create events with title, description, category, date, location, capacity
- **FR-EVENT-02**: Display active events with pagination (20/page); show capacity status
- **FR-EVENT-03**: Filter by category, date, location; keyword search; sort options
- **FR-EVENT-04**: Register for events; prevent duplicates; update participant count; send confirmation
- **FR-EVENT-05**: Cancel registration (24h before event); notify organizer
- **FR-EVENT-06**: Edit/cancel events; notify registered volunteers

#### 3.3 Hour Tracking (FR-HOURS)
- **FR-HOURS-01**: Log hours with event_id, hours, description; set status to "pending"
- **FR-HOURS-02**: Approve/reject hours; add comments; update total hours
- **FR-HOURS-03**: Display hour history with status; calculate total approved hours

#### 3.4 Messaging (FR-MSG)
- **FR-MSG-01**: Send messages (max 1000 chars); timestamp messages
- **FR-MSG-02**: Display conversation threads; show unread count; mark as read

#### 3.5 Gamification (FR-GAME)
- **FR-GAME-01**: Award badges based on hour milestones; display on profile
- **FR-GAME-02**: Display progress bars and statistics (hours, events, badges)

#### 3.6 Dashboard (FR-DASH)
- **FR-DASH-01**: Volunteer dashboard shows upcoming events, hour status, badges
- **FR-DASH-02**: Organizer dashboard shows created events, pending approvals, statistics

#### 3.7 Admin Functions (FR-ADMIN)
- **FR-ADMIN-01**: Manage user accounts (view, activate/deactivate, change roles)
- **FR-ADMIN-02**: Moderate content (edit/delete events, view messages, log actions)
- **FR-ADMIN-03**: Configure badge criteria and event categories

---

### 4. NON-FUNCTIONAL REQUIREMENTS

#### 4.1 Performance (NFR-PERF)
- **NFR-PERF-01**: Page load < 2s; API response < 500ms; support 100 concurrent users
- **NFR-PERF-02**: Handle 1000 API requests/minute; optimize images < 2MB

#### 4.2 Security (NFR-SEC)
- **NFR-SEC-01**: HTTPS enforced; session timeout 30 min; bcrypt hashing; CSRF protection
- **NFR-SEC-02**: SQL injection prevention; XSS protection; file upload validation
- **NFR-SEC-03**: Role-based access control; rate limiting; security event logging

#### 4.3 Reliability (NFR-REL)
- **NFR-REL-01**: 99.5% uptime; daily backups; graceful error handling
- **NFR-REL-02**: Database transactions; referential integrity; 4-hour recovery time

#### 4.4 Usability (NFR-USE)
- **NFR-USE-01**: Max 3 clicks to any feature; consistent design; clear error messages
- **NFR-USE-02**: Mobile-responsive (320px+); WCAG 2.1 AA compliant; keyboard navigation

#### 4.5 Maintainability (NFR-MAINT)
- **NFR-MAINT-01**: PSR-12 coding standards; code documentation; 70% test coverage
- **NFR-MAINT-02**: MVC architecture; RESTful API; error logging

#### 4.6 Compatibility (NFR-COMP)
- **NFR-COMP-01**: Chrome, Firefox, Safari, Edge (latest 2 versions)
- **NFR-COMP-02**: iOS 13+, Android 9+; 320px to 4K displays

---

**Document Version**: 1.0  
**Last Updated**: 2024  
**Project**: VolunteerHub Platform
