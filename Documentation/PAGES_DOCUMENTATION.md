# VolunteerHub - Complete Pages Documentation

## Table of Contents
1. [Index Page (Homepage)](#1-index-page-homepage)
2. [Events Page](#2-events-page)
3. [About Page](#3-about-page)
4. [Contact Page](#4-contact-page)
5. [Volunteer Dashboard](#5-volunteer-dashboard)
6. [Organizer Dashboard](#6-organizer-dashboard)

---

## 1. Index Page (Homepage)
**File:** `index.html`  
**Route:** `/` or `/index.html`

### Purpose
Landing page that introduces VolunteerHub and provides entry points for volunteers and organizers.

### Key Sections

#### 1.1 Navigation Header
- **Logo & Branding:** VolunteerHub logo with hands-helping icon
- **Menu Items:**
  - Home (anchor link)
  - Events (links to events.html)
  - About (links to about.html)
  - Contact (links to contact.html)
- **Authentication Dropdown:**
  - "Get Started" button with dropdown
  - Login option
  - Sign Up option
- **Mobile:** Hamburger menu for responsive design

#### 1.2 Hero Section
- **Background:** Autoplay looping video (vovo.mp4)
- **Content:**
  - Main headline: "Connect. Volunteer. Make a Difference."
  - Subheading describing platform purpose
  - Two CTA buttons:
    - "Start Volunteering" - Opens signup modal for volunteers
    - "Organize Events" - Opens signup modal for organizers

#### 1.3 Featured Events Section
- **Dynamic Content:** Events loaded via JavaScript
- **Event Grid:** Displays featured volunteer opportunities
- **Actions:**
  - "Load More Events" button - Expands event list
  - "Browse All Events" button - Redirects to events page

#### 1.4 About Section
- **Platform Description:** Overview of VolunteerHub's mission
- **Statistics Display:**
  - 10,000+ Active Volunteers
  - 500+ Events Organized
  - 50+ Partner Organizations
- **Feature Cards:**
  - Easy Discovery (search/filter functionality)
  - Event Management (organizer tools)
  - Community Building (networking features)

#### 1.5 Footer
- **Branding:** Logo and tagline
- **Quick Links:**
  - Browse Events
  - About Us
  - Contact
- **Support Links:**
  - Help Center
  - Privacy Policy
  - Terms of Service
- **Copyright:** © 2026 VolunteerHub

#### 1.6 Modals
- **Auth Modal:** Dynamic content for login/signup forms

### Features
- Video background for engaging visual experience
- Responsive navigation with mobile hamburger menu
- Dynamic event loading from database
- Modal-based authentication system
- Tawk.to live chat integration
- Smooth scrolling and animations

### JavaScript Dependencies
- `js/config.js` - Configuration settings
- `js/main.js` - Core functionality
- `js/auth.js` - Authentication handling

---

## 2. Events Page
**File:** `pages/events.html`  
**Route:** `/pages/events.html`

### Purpose
Browse and search all available volunteer events with filtering capabilities.

### Key Sections

#### 2.1 Navigation Header
- Same structure as homepage
- "Events" menu item marked as active

#### 2.2 Page Header
- **Title:** "Volunteer Events"
- **Description:** "Discover meaningful opportunities to make a difference in your community"

#### 2.3 Browse Events Section
- **Section Header:** "Browse Events"
- **Filters:**
  - Category dropdown (dynamically populated)
  - Search input field (real-time search)
- **Events Grid:** Displays all available events
- **Dynamic Loading:** Events fetched from API

#### 2.4 Event Details Modal
- Opens when clicking on an event card
- Displays:
  - Event title and description
  - Date, time, and location
  - Category and organizer info
  - Number of volunteers needed/registered
  - Registration button (for logged-in volunteers)

#### 2.5 Auth Modal
- Login/signup functionality for non-authenticated users

### Features
- Real-time search functionality
- Category-based filtering
- Responsive event grid layout
- Modal-based event details view
- Registration system for volunteers
- Tawk.to live chat support

### JavaScript Dependencies
- `js/main.js` - Core functionality
- `js/auth.js` - Authentication
- `js/events-page.js` - Event-specific logic

---

## 3. About Page
**File:** `pages/about.html`  
**Route:** `/pages/about.html`

### Purpose
Provide information about VolunteerHub's mission, vision, and offerings.

### Key Sections

#### 3.1 Navigation Header
- Same structure as homepage
- "About" menu item marked as active

#### 3.2 Hero Section
- **Background:** Video background (vovo.mp4)
- **Content:**
  - Title: "About VolunteerHub"
  - Tagline: "Empowering communities through meaningful volunteer connections"

#### 3.3 Mission & Vision Section
- **Our Mission:**
  - Bridges gap between volunteers and organizations
  - Makes volunteering accessible and impactful
- **Our Vision:**
  - Create accessible volunteering worldwide
  - Connect communities efficiently

#### 3.4 Statistics Display
- 10,000+ Active Volunteers
- 500+ Events Organized
- 50+ Partner Organizations
- 25+ Cities Served

#### 3.5 What We Offer Section
Four feature cards:
1. **Easy Discovery**
   - Advanced search and filtering
   - Match interests and schedule
2. **Event Management**
   - Comprehensive organizer tools
   - Event coordination features
3. **Community Building**
   - Connect with like-minded volunteers
   - Build lasting relationships
4. **Impact Tracking**
   - Monitor volunteer journey
   - See real community impact

#### 3.6 Call-to-Action Section
- Background: Secondary color
- Two action buttons:
  - "Start Volunteering"
  - "Organize Events"

#### 3.7 Footer
- Standard footer with links and copyright

### Features
- Video background for visual appeal
- Statistics showcase
- Feature highlights with icons
- Dual CTA for different user types
- Responsive design
- Tawk.to live chat

### JavaScript Dependencies
- `js/main.js` - Core functionality
- `js/auth.js` - Authentication modals

---

## 4. Contact Page
**File:** `pages/contact.html`  
**Route:** `/pages/contact.html`

### Purpose
Provide multiple ways for users to contact VolunteerHub support and team.

### Key Sections

#### 4.1 Navigation Header
- Same structure as homepage
- "Contact" menu item marked as active

#### 4.2 Page Header
- **Title:** "Contact Us"
- **Description:** "Get in touch with our team - we're here to help you make a difference"

#### 4.3 Contact Form Section (Left Column)
- **Form Fields:**
  - Full Name (required)
  - Email Address (required)
  - Subject dropdown (required):
    - General Inquiry
    - Volunteer Support
    - Organizer Support
    - Technical Issue
    - Partnership Opportunity
    - Feedback
  - Message textarea (required)
- **Submit Button:** "Send Message"
- **Form Handler:** `handleContactForm(event)`

#### 4.4 Contact Information Section (Right Column)
- **Email:**
  - support@volunteerhub.com
  - partnerships@volunteerhub.com
- **Phone:**
  - (+250) 796 606 714
  - Hours: Mon-Fri, 9AM-6PM EST
- **Address:**
  - Rwanda Kigali City
  - Kanombe, Kk 89 st
- **Social Media Links:**
  - Facebook
  - Twitter
  - Instagram
  - LinkedIn

#### 4.5 FAQ Section
Four common questions:
1. **How do I sign up as a volunteer?**
   - Sign up process explanation
2. **How can I create an event?**
   - Organizer account creation steps
3. **Is there a cost to use VolunteerHub?**
   - Free platform confirmation
4. **How do I cancel my event registration?**
   - Unregistration process

#### 4.6 Footer
- Standard footer with links

### Features
- Comprehensive contact form with validation
- Multiple contact methods (email, phone, address)
- Social media integration
- FAQ section for quick answers
- Form submission to API
- Tawk.to live chat support
- Responsive two-column layout

### JavaScript Dependencies
- `js/main.js` - Core functionality
- `js/auth.js` - Authentication
- `js/contact.js` - Form handling

---

## 5. Volunteer Dashboard
**File:** `pages/volunteer-dashboard.html`  
**Route:** `/pages/volunteer-dashboard.html`

### Purpose
Personal dashboard for volunteers to manage registrations, discover events, and track volunteer activities.

### Access Control
- **Authentication Required:** Yes
- **User Type:** Volunteer only
- **Redirect:** Non-authenticated users redirected to login

### Key Sections

#### 5.1 Navigation Header
- **Logo:** Links back to homepage
- **User Dropdown:**
  - User avatar (customizable)
  - Username display
  - Dropdown menu:
    - Profile
    - Settings
    - Logout

#### 5.2 Left Sidebar Navigation
Icon-based navigation:
1. **My Events** (Calendar Check icon) - Default active
2. **Browse Events** (Search icon)
3. **Hours & Badges** (Medal icon)
4. **Notifications** (Bell icon with badge counter)
5. **Calendar** (Calendar icon) - Toggles calendar sidebar

#### 5.3 Calendar Sidebar (Collapsible)
- **Header:** "My Calendar" with close button
- **Calendar Controls:**
  - Previous/Next month navigation
  - Current month display
- **Calendar Grid:** Shows registered events on dates
- **Toggle Function:** `toggleCalendarSidebar()`

#### 5.4 Dashboard Statistics
Three stat cards:
1. **Registered Events** - Total events signed up for
2. **Upcoming Events** - Future events count
3. **Completed Events** - Past events attended

#### 5.5 My Registered Events Section
- **Section Header:** "My Registered Events"
- **Filter Dropdown:**
  - All Events
  - Upcoming
  - Past
- **Events Grid:** Displays user's registered events
- **Event Cards Show:**
  - Event details
  - Registration status
  - Unregister button
  - Event date countdown

#### 5.6 Discover Events Section
- **Section Header:** "Discover Events"
- **Filters:**
  - Category dropdown
  - Search input field
- **Events Grid:** All available events
- **Actions:** Register for events

#### 5.7 Profile Section (Hidden by default)
- **Profile Card:**
  - Large avatar display
  - "Change Photo" button
  - Name and email
  - "Volunteer" badge
- **Profile Form:**
  - Full Name
  - Phone
  - Location
  - Bio textarea
  - Interests checkboxes (dynamic categories)
  - "Update Profile" button
- **Back Button:** Returns to dashboard

#### 5.8 Settings Section (Hidden by default)
- **Notifications Settings:**
  - Email notifications for new events
  - Event reminders
- **Privacy Settings:**
  - Make profile visible to organizers
- **Account Management:**
  - Delete Account button (danger action)
- **Back Button:** Returns to dashboard

#### 5.9 Recommended Events Section
- **Section Header:** "Recommended for You"
- **Description:** "Based on your interests and location"
- **Events Grid:** Personalized event recommendations

### Modals

#### 5.10 Event Details Modal
- Full event information
- Registration/unregistration actions
- Organizer contact info
- Event requirements

#### 5.11 Avatar Selector Modal
- **Upload Photo Section:**
  - File upload input
  - Preview display
  - Image upload handler
- **Emoji Selection:**
  - Grid of emoji avatars
  - Click to select
- **Save Button:** Saves selected avatar

#### 5.12 Notifications Modal
- **Title:** "Notifications"
- **Messages List:** Displays notifications from organizers
- **Message Details:**
  - Sender information
  - Message content
  - Timestamp
  - Mark as read functionality

### Features
- Real-time event registration/unregistration
- Personalized event recommendations
- Calendar integration with event dates
- Notification system with badge counter
- Profile customization with avatar upload
- Interest-based filtering
- Event search functionality
- Volunteer hours tracking
- Badge/achievement system
- Responsive dashboard layout
- Tawk.to live chat support

### JavaScript Dependencies
- `js/main.js` - Core functionality
- `js/auth.js` - Authentication
- `js/calendar.js` - Calendar functionality
- `js/volunteer-dashboard.js` - Dashboard-specific logic

### API Endpoints Used
- `GET /api/events.php` - Fetch events
- `POST /api/registrations.php` - Register for event
- `DELETE /api/registrations.php` - Unregister from event
- `GET /api/users.php` - Get user profile
- `PUT /api/users.php` - Update profile
- `GET /api/messages.php` - Fetch notifications
- `GET /api/hours.php` - Get volunteer hours
- `GET /api/badges.php` - Get earned badges

---

## 6. Organizer Dashboard
**File:** `pages/organizer-dashboard.html`  
**Route:** `/pages/organizer-dashboard.html`

### Purpose
Management dashboard for event organizers to create, manage events, and coordinate with volunteers.

### Access Control
- **Authentication Required:** Yes
- **User Type:** Organizer only
- **Redirect:** Non-authenticated users redirected to login

### Key Sections

#### 6.1 Navigation Header
- **Logo:** Links back to homepage
- **User Dropdown:**
  - Organization avatar/logo
  - Organization name display
  - Dropdown menu:
    - Profile
    - Settings
    - Logout

#### 6.2 Left Sidebar Navigation
Icon-based navigation:
1. **My Events** (Calendar Check icon) - Default active
2. **Create Event** (Plus Circle icon)
3. **Messages** (Envelope icon)
4. **Calendar** (Calendar icon) - Toggles calendar sidebar

#### 6.3 Calendar Sidebar (Collapsible)
- **Header:** "Calendar" with close button
- **Calendar Controls:**
  - Previous/Next month navigation
  - Current month display
- **Calendar Grid:** Shows all organization's events
- **Toggle Function:** `toggleCalendarSidebar()`

#### 6.4 Dashboard Header
- **Title:** "Organizer Dashboard"
- **Description:** "Manage your events and coordinate with volunteers"
- **Primary Action:** "Create New Event" button

#### 6.5 Dashboard Statistics
Three stat cards:
1. **Total Events** - All events created
2. **Total Volunteers** - Sum of all volunteers across events
3. **Active Events** - Currently ongoing/upcoming events

#### 6.6 My Events Section
- **Section Header:** "My Events"
- **Filter Dropdown:**
  - All Events
  - Upcoming
  - Ongoing
  - Completed
- **Events Grid:** Organization's created events
- **Event Cards Show:**
  - Event details
  - Volunteer count (registered/max)
  - Event status
  - Management actions:
    - View Details
    - Edit Event
    - View Volunteers
    - Delete Event

#### 6.7 Profile Section (Hidden by default)
- **Profile Card:**
  - Large organization logo
  - "Change Logo" button
  - Organization name and email
  - "Organizer" badge
- **Profile Form:**
  - Organization Name
  - Contact Phone
  - Location
  - Website URL
  - Organization Description
  - Focus Areas (category checkboxes)
  - "Update Profile" button
- **Back Button:** Returns to dashboard

#### 6.8 Settings Section (Hidden by default)
- **Notifications Settings:**
  - Email notifications for new volunteers
  - Event update notifications
- **Organization Settings:**
  - Make organization profile public
  - Auto-approve volunteer registrations
- **Account Management:**
  - Delete Account button (danger action)
- **Back Button:** Returns to dashboard

#### 6.9 Create Event Section (Hidden by default)
- **Section Header:** "Create New Event" with Cancel button
- **Event Form:**
  - Event Title (required)
  - Category dropdown (required)
  - Date (required)
  - Time (required)
  - Location (required)
  - Max Volunteers (required, number)
  - Description textarea (required)
  - Requirements textarea (optional)
  - "Create Event" submit button
- **Form Handler:** `handleCreateEvent(event)`

### Modals

#### 6.10 Event Management Modal
- **Event Details Display:**
  - Full event information
  - Current volunteer count
  - Event status
- **Management Actions:**
  - Edit event details
  - Update event status
  - Cancel event
  - View volunteer list
  - Send messages to volunteers

#### 6.11 Volunteer List Modal
- **Title:** Event name
- **Volunteer Table:**
  - Volunteer name
  - Email
  - Phone
  - Registration date
  - Status (confirmed/pending)
- **Actions:**
  - Contact volunteer
  - Remove volunteer
  - Export list

#### 6.12 Messages Modal
- **Title:** "Send Message to Volunteers"
- **Volunteer Selection:**
  - Select all volunteers
  - Select by event
  - Individual selection
- **Message Form:**
  - Subject
  - Message body
  - Send button
- **Message History:** Previous sent messages

#### 6.13 Avatar Selector Modal
- **Upload Logo Section:**
  - File upload input
  - Preview display
  - Image upload handler
- **Emoji Selection:**
  - Grid of emoji options
  - Click to select
- **Save Button:** Saves selected avatar/logo

### Features
- Complete event lifecycle management (create, edit, delete)
- Volunteer registration management
- Real-time volunteer count tracking
- Event status management (upcoming, ongoing, completed)
- Messaging system to communicate with volunteers
- Calendar view of all events
- Organization profile customization
- Logo/avatar upload
- Event filtering and search
- Volunteer list export
- Auto-approval settings
- Event analytics and statistics
- Responsive dashboard layout

### JavaScript Dependencies
- `js/main.js` - Core functionality
- `js/auth.js` - Authentication
- `js/calendar.js` - Calendar functionality
- `js/organizer-dashboard.js` - Dashboard-specific logic

### API Endpoints Used
- `GET /api/events.php` - Fetch organizer's events
- `POST /api/events.php` - Create new event
- `PUT /api/events.php` - Update event
- `DELETE /api/events.php` - Delete event
- `GET /api/registrations.php` - Get event volunteers
- `DELETE /api/registrations.php` - Remove volunteer
- `GET /api/users.php` - Get organization profile
- `PUT /api/users.php` - Update profile
- `POST /api/messages.php` - Send messages to volunteers
- `GET /api/messages.php` - Get message history

---

## Common Features Across All Pages

### 1. Responsive Design
- Mobile-first approach
- Breakpoints for tablet and desktop
- Hamburger menu on mobile devices
- Flexible grid layouts

### 2. Authentication System
- Modal-based login/signup
- Session management
- Role-based access (volunteer/organizer)
- Secure logout functionality

### 3. Navigation
- Consistent header across all pages
- Active page highlighting
- Breadcrumb navigation where applicable
- Quick access to main sections

### 4. Footer
- Consistent across all pages
- Quick links to main pages
- Support and legal links
- Social media integration
- Copyright information

### 5. Live Chat Support
- Tawk.to integration on all pages
- Real-time customer support
- Chat widget in bottom-right corner

### 6. Accessibility
- Semantic HTML structure
- ARIA labels where needed
- Keyboard navigation support
- Screen reader friendly

### 7. Performance
- Lazy loading for images
- Minified CSS/JS (production)
- Optimized database queries
- Caching strategies

### 8. Security
- CSRF protection
- XSS prevention
- SQL injection prevention
- Secure password hashing
- Session timeout

---

## User Flows

### Volunteer User Flow
1. **Landing** → Homepage
2. **Sign Up** → Create volunteer account
3. **Browse Events** → Events page or dashboard
4. **Register** → Select and register for event
5. **Manage** → View/cancel registrations in dashboard
6. **Track** → Monitor hours and badges

### Organizer User Flow
1. **Landing** → Homepage
2. **Sign Up** → Create organizer account
3. **Create Event** → Fill event form in dashboard
4. **Manage** → View volunteers, edit event details
5. **Communicate** → Send messages to volunteers
6. **Track** → Monitor event statistics

### Guest User Flow
1. **Landing** → Homepage
2. **Browse** → View events (limited access)
3. **Learn** → About and Contact pages
4. **Sign Up** → Create account to participate

---

## Technical Stack

### Frontend
- **HTML5** - Semantic markup
- **CSS3** - Styling with custom properties
- **JavaScript (ES6+)** - Client-side logic
- **Font Awesome 6.0** - Icons
- **Responsive Design** - Mobile-first approach

### Backend
- **PHP** - Server-side logic
- **MySQL** - Database
- **REST API** - JSON-based communication

### External Services
- **Tawk.to** - Live chat support
- **Video Hosting** - Background video (vovo.mp4)

### File Structure
```
volunteerHub/
├── index.html
├── pages/
│   ├── about.html
│   ├── contact.html
│   ├── events.html
│   ├── volunteer-dashboard.html
│   └── organizer-dashboard.html
├── styles/
│   ├── main.css
│   └── dashboard.css
├── js/
│   ├── config.js
│   ├── main.js
│   ├── auth.js
│   ├── events-page.js
│   ├── contact.js
│   ├── calendar.js
│   ├── volunteer-dashboard.js
│   └── organizer-dashboard.js
├── api/
│   ├── config.php
│   ├── events.php
│   ├── users.php
│   ├── registrations.php
│   ├── messages.php
│   ├── hours.php
│   ├── badges.php
│   └── contact.php
└── database/
    └── volunteer_hub.sql
```

---

## Browser Support
- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest 2 versions)
- Mobile browsers (iOS Safari, Chrome Mobile)

---

## Future Enhancements
1. Email notification system
2. SMS reminders
3. Social media sharing
4. Event ratings and reviews
5. Advanced analytics dashboard
6. Mobile app (iOS/Android)
7. Payment integration for paid events
8. Multi-language support
9. Dark mode theme
10. Advanced search with map integration

---

**Document Version:** 1.0  
**Last Updated:** 2026  
**Maintained By:** VolunteerHub Development Team
