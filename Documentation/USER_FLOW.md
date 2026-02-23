# VolunteerHub - User Flow Documentation

## System Overview
VolunteerHub is a volunteer management platform with two user roles: **Volunteers** and **Organizers**.

---

## 1. INITIAL LANDING & AUTHENTICATION FLOW

### 1.1 Landing Page (index.html)
```
User arrives → Landing Page
    ├─ View featured events
    ├─ Browse event categories
    ├─ Read about platform
    └─ Authentication options:
        ├─ Click "Login" → Login Modal
        └─ Click "Sign Up" → Signup Modal
```

### 1.2 Login Flow
```
Login Modal
    ├─ Enter email
    ├─ Enter password
    ├─ Select role (Volunteer/Organizer)
    └─ Submit
        ├─ Success → Redirect to role-specific dashboard
        │   ├─ Volunteer → volunteer-dashboard.html
        │   └─ Organizer → organizer-dashboard.html
        └─ Failure → Show error message
```

### 1.3 Signup Flow
```
Signup Modal
    ├─ Enter full name
    ├─ Enter email
    ├─ Enter password (min 6 chars)
    ├─ Select role (Volunteer/Organizer)
    ├─ Enter phone number
    ├─ Enter location
    └─ Submit
        ├─ Success → Create account → Redirect to dashboard
        └─ Failure → Show error message
```

---

## 2. VOLUNTEER USER FLOW

### 2.1 Volunteer Dashboard Overview
```
Volunteer Dashboard (volunteer-dashboard.html)
    ├─ Header
    │   ├─ User profile dropdown
    │   │   ├─ View Profile
    │   │   ├─ Settings
    │   │   └─ Logout
    │   └─ Notifications bell (with badge)
    │
    ├─ Dashboard Stats
    │   ├─ Total Registered Events
    │   ├─ Upcoming Events
    │   └─ Completed Events
    │
    ├─ My Events Section
    │   ├─ Filter (All/Upcoming/Past)
    │   └─ Event cards with:
    │       ├─ View Details
    │       └─ Unregister button
    │
    ├─ Browse Events Section
    │   ├─ Search bar
    │   ├─ Category filter
    │   └─ Available event cards with:
    │       ├─ View Details
    │       └─ Register button
    │
    └─ Recommended Events Section
        └─ Personalized event suggestions
```

### 2.2 Event Registration Flow
```
Browse Events
    ├─ Search/Filter events
    ├─ Click event card → View Details Modal
    │   ├─ View full event information
    │   ├─ Check volunteer spots available
    │   └─ Click "Register Now"
    │       ├─ Check if event is full
    │       ├─ Add to registered events
    │       ├─ Update volunteer count
    │       ├─ Save to database (API call)
    │       └─ Update dashboard stats
    │
    └─ Success → Event appears in "My Events"
```

### 2.3 Event Unregistration Flow
```
My Events
    ├─ View registered event
    ├─ Click "Unregister"
    ├─ Confirm action
    └─ Process:
        ├─ Remove from registered events
        ├─ Decrease volunteer count
        ├─ Update database (API call)
        └─ Refresh dashboard
```

### 2.4 Notifications & Messages Flow
```
Notifications Bell
    ├─ Click bell icon → Notifications Modal
    ├─ View messages from organizers
    │   ├─ Unread messages (highlighted)
    │   ├─ Message details:
    │   │   ├─ From (organizer name)
    │   │   ├─ Date/Time
    │   │   └─ Message content
    │   └─ Click message → Mark as read
    │
    └─ Badge updates automatically
```

### 2.5 Hours & Badges Flow
```
Dashboard
    ├─ Click "Hours & Badges" button
    └─ Hours & Badges Modal
        ├─ Hours Tab
        │   └─ View volunteer hours by event
        └─ Badges Tab
            └─ View earned achievement badges
```

### 2.6 Profile Management Flow
```
User Dropdown → Profile
    ├─ View profile information
    ├─ Edit profile fields:
    │   ├─ Name
    │   ├─ Email
    │   ├─ Phone
    │   └─ Location
    ├─ Save changes → Update database
    └─ Back to dashboard
```

---

## 3. ORGANIZER USER FLOW

### 3.1 Organizer Dashboard Overview
```
Organizer Dashboard (organizer-dashboard.html)
    ├─ Header
    │   ├─ User profile dropdown
    │   │   ├─ View Profile
    │   │   ├─ Settings
    │   │   └─ Logout
    │   └─ Message volunteers button
    │
    ├─ Dashboard Stats
    │   ├─ Total Events Created
    │   ├─ Total Volunteers
    │   └─ Active Events
    │
    ├─ My Events Section
    │   ├─ Filter (All/Upcoming/Ongoing/Completed)
    │   └─ Event cards with:
    │       ├─ Manage button
    │       ├─ View Volunteers button
    │       └─ Delete button (upcoming only)
    │
    └─ Create Event Section
        └─ Event creation form
```

### 3.2 Event Creation Flow
```
Dashboard
    ├─ Click "Create Event" button
    └─ Create Event Form
        ├─ Enter event title
        ├─ Select category
        ├─ Set date (must be future)
        ├─ Set time
        ├─ Enter location
        ├─ Set max volunteers
        ├─ Enter description
        ├─ Enter requirements (optional)
        └─ Submit
            ├─ Validate date is in future
            ├─ Save to database (API call)
            ├─ Success → Add to "My Events"
            └─ Failure → Show error
```

### 3.3 Event Management Flow
```
My Events
    ├─ Click "Manage" on event card
    └─ Event Management Modal
        ├─ View event details
        ├─ View registration status
        ├─ View volunteer progress bar
        └─ Actions:
            ├─ View Volunteers
            └─ Close
```

### 3.4 Volunteer Management Flow
```
Event Card → "View Volunteers"
    └─ Volunteers Modal
        ├─ View registered volunteers list
        ├─ For each volunteer:
        │   ├─ Name, email, phone, location
        │   └─ Actions:
        │       ├─ Call (opens phone dialer)
        │       ├─ Email (opens email client)
        │       ├─ Message (send in-app message)
        │       └─ Remove (unregister volunteer)
        │
        └─ Empty state if no volunteers
```

### 3.5 Messaging Flow
```
Dashboard → "Message Volunteers"
    └─ Messages Modal
        ├─ View list of all volunteers
        ├─ Select volunteer
        └─ Message Form
            ├─ View volunteer info
            ├─ Type message
            ├─ Send → Save to database
            └─ Back to volunteer list
```

### 3.6 Event Deletion Flow
```
My Events (Upcoming)
    ├─ Click "Delete" on event
    ├─ Confirm deletion
    └─ Process:
        ├─ Delete from database (API call)
        ├─ Remove from event list
        └─ Update dashboard stats
```

---

## 4. COMMON FLOWS

### 4.1 Event Details View
```
Any Event Card → "View Details"
    └─ Event Details Modal
        ├─ Event header (category, title, organizer)
        ├─ Event metadata (date, time, location, volunteers)
        ├─ Full description
        ├─ Requirements (if any)
        ├─ Registration progress bar
        └─ Action buttons (role-specific)
```

### 4.2 Search & Filter Flow
```
Browse Events
    ├─ Search Input
    │   └─ Filter by: title, description, location
    │
    └─ Category Filter
        └─ Filter by: Environment, Education, Healthcare, 
            Community, Animals, Disaster Relief, 
            Elderly Care, Youth Programs
```

### 4.3 Settings Flow
```
User Dropdown → Settings
    ├─ Account settings
    ├─ Notification preferences
    ├─ Privacy settings
    └─ Delete account option
        ├─ Confirm deletion
        └─ Remove from database → Redirect to landing
```

### 4.4 Logout Flow
```
User Dropdown → Logout
    ├─ Clear session data
    ├─ Remove from localStorage
    └─ Redirect to landing page (index.html)
```

---

## 5. DATA FLOW & API INTERACTIONS

### 5.1 Authentication APIs
```
POST /api/users.php?action=register
    ├─ Input: name, email, password, role, phone, location
    └─ Output: user object, success status

POST /api/users.php?action=login
    ├─ Input: email, password, role
    └─ Output: user object, success status
```

### 5.2 Event APIs
```
GET /api/events.php
    └─ Output: all events

GET /api/events.php?organizer_id={id}
    └─ Output: events by organizer

GET /api/events.php?volunteer_id={id}&action=registered
    └─ Output: events registered by volunteer

POST /api/events.php
    ├─ Input: event details
    └─ Output: success status

DELETE /api/events.php?id={id}
    └─ Output: success status
```

### 5.3 Registration APIs
```
POST /api/events.php?action=register
    ├─ Input: eventId, volunteerId
    └─ Output: success status

DELETE /api/events.php?action=unregister
    ├─ Input: event_id, volunteer_id
    └─ Output: success status

GET /api/events.php?event_id={id}&action=volunteers
    └─ Output: list of volunteers for event
```

### 5.4 Messaging APIs
```
GET /api/messages.php?user_id={id}
    └─ Output: messages for user

POST /api/messages.php
    ├─ Input: fromUserId, toUserId, message
    └─ Output: success status

PUT /api/messages.php
    ├─ Input: messageId
    └─ Output: mark message as read
```

### 5.5 Hours & Badges APIs
```
GET /api/hours.php?user_id={id}
    └─ Output: volunteer hours

GET /api/badges.php?user_id={id}
    └─ Output: earned badges
```

---

## 6. STATE MANAGEMENT

### 6.1 AppState Object
```javascript
AppState = {
    currentUser: {
        id, name, email, role, phone, location,
        registeredEvents: [] // for volunteers
    },
    events: [], // all events
    organizerEvents: [], // organizer's events
    categories: [] // event categories
}
```

### 6.2 LocalStorage
```
volunteerHubUser → Current logged-in user
volunteerHubEvents → Cached events data
volunteerHubUsers → All registered users (fallback)
```

### 6.3 SessionStorage
```
showProfile → Flag to show profile on load
showSettings → Flag to show settings on load
```

---

## 7. USER JOURNEY EXAMPLES

### 7.1 New Volunteer Journey
```
1. Land on homepage
2. Browse featured events
3. Click "Sign Up" → Register as Volunteer
4. Redirected to Volunteer Dashboard
5. Browse available events
6. Filter by "Environment" category
7. Click event → View details
8. Click "Register Now"
9. Event added to "My Events"
10. Receive message from organizer
11. Check notifications
12. View volunteer hours and badges
```

### 7.2 New Organizer Journey
```
1. Land on homepage
2. Click "Sign Up" → Register as Organizer
3. Redirected to Organizer Dashboard
4. Click "Create Event"
5. Fill event form with details
6. Submit → Event created
7. View event in "My Events"
8. Wait for volunteer registrations
9. View registered volunteers
10. Send message to volunteers
11. Manage event details
12. View event statistics
```

### 7.3 Returning User Journey
```
1. Land on homepage (auto-login from localStorage)
2. Redirected to appropriate dashboard
3. View updated stats
4. Check new notifications/messages
5. Continue with role-specific tasks
```

---

## 8. ERROR HANDLING & EDGE CASES

### 8.1 Authentication Errors
- Invalid credentials → Show error message
- Email already exists → Show error message
- Network error → Show retry option

### 8.2 Event Registration Errors
- Event full → Disable register button
- Already registered → Show info message
- Network error → Show error message

### 8.3 Empty States
- No events created → Show "Create Event" prompt
- No registered events → Show "Browse Events" prompt
- No volunteers → Show empty state message
- No messages → Show empty inbox message

### 8.4 Validation Errors
- Future date validation for events
- Password minimum length (6 chars)
- Required field validation
- Email format validation

---

## 9. NAVIGATION MAP

```
Landing Page (index.html)
    │
    ├─── About Page (pages/about.html)
    ├─── Events Page (pages/events.html)
    ├─── Contact Page (pages/contact.html)
    │
    └─── Authentication
         │
         ├─── Volunteer Dashboard (pages/volunteer-dashboard.html)
         │    ├─ Profile
         │    ├─ Settings
         │    ├─ Notifications
         │    └─ Hours & Badges
         │
         └─── Organizer Dashboard (pages/organizer-dashboard.html)
              ├─ Profile
              ├─ Settings
              ├─ Create Event
              ├─ Manage Events
              └─ Message Volunteers
```

---

## 10. KEY FEATURES SUMMARY

### Volunteer Features
✓ Browse and search events
✓ Register/unregister for events
✓ View event details
✓ Track registered events
✓ Receive messages from organizers
✓ View volunteer hours
✓ Earn achievement badges
✓ Profile management

### Organizer Features
✓ Create events
✓ Manage events
✓ View registered volunteers
✓ Contact volunteers (call/email/message)
✓ Remove volunteers
✓ Delete events
✓ View event statistics
✓ Profile management

### Common Features
✓ User authentication (login/signup)
✓ Role-based access control
✓ Responsive design
✓ Real-time updates
✓ Search and filter
✓ Notifications system
✓ Profile customization
