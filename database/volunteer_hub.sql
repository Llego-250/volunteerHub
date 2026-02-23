
DO $$ BEGIN
    IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'role_enum') THEN
        CREATE TYPE role_enum AS ENUM ('volunteer', 'organizer');
    END IF;
    IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'hour_status_enum') THEN
        CREATE TYPE hour_status_enum AS ENUM ('pending', 'approved');
    END IF;
END$$;

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role role_enum NOT NULL,
    phone VARCHAR(20),
    location VARCHAR(100),
    interests TEXT,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    avatar VARCHAR(255) DEFAULT NULL
);

-- Events table
CREATE TABLE events (
    id SERIAL PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    category VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    location VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    requirements TEXT,
    max_volunteers INT NOT NULL,
    organizer_id INT NOT NULL,
    image VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (organizer_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Event registrations table
CREATE TABLE event_registrations (
    id SERIAL PRIMARY KEY,
    event_id INT NOT NULL,
    volunteer_id INT NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    FOREIGN KEY (volunteer_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE (event_id, volunteer_id)
);

-- Messages table
CREATE TABLE messages (
    id SERIAL PRIMARY KEY,
    from_user_id INT NOT NULL,
    to_user_id INT NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (from_user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (to_user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Contact submissions table
CREATE TABLE contacts (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Volunteer hours table
CREATE TABLE volunteer_hours (
    id SERIAL PRIMARY KEY,
    volunteer_id INT NOT NULL,
    event_id INT NOT NULL,
    hours_worked NUMERIC(4,2) NOT NULL,
    date_worked DATE NOT NULL,
    status hour_status_enum DEFAULT 'pending',
    FOREIGN KEY (volunteer_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

-- Badges table
CREATE TABLE badges (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    icon VARCHAR(50) NOT NULL,
    hours_required INT NOT NULL,
    color VARCHAR(20) DEFAULT 'primary'
);

-- User badges table
CREATE TABLE user_badges (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    badge_id INT NOT NULL,
    earned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (badge_id) REFERENCES badges(id) ON DELETE CASCADE,
    UNIQUE (user_id, badge_id)
);

-- Insert sample data
-- Insert sample badges
INSERT INTO badges (name, description, icon, hours_required, color) VALUES
('First Steps', 'Complete your first volunteer event', 'fas fa-baby', 1, 'success'),
('Helper', 'Volunteer for 10 hours', 'fas fa-hands-helping', 10, 'primary'),
('Dedicated', 'Volunteer for 25 hours', 'fas fa-heart', 25, 'info'),
('Champion', 'Volunteer for 50 hours', 'fas fa-trophy', 50, 'warning'),
('Hero', 'Volunteer for 100 hours', 'fas fa-medal', 100, 'danger'),
('Legend', 'Volunteer for 200 hours', 'fas fa-crown', 200, 'gold');

-- Insert sample hours for John Volunteer (user_id = 2)
-- Insert sample users (passwords are bcrypt hashes)
INSERT INTO users (name, email, password, role, phone, location) VALUES
('AZE Solide Organizer', 'organizer@test.com', 'Test1234', 'organizer', '555-0123', 'Los Angeles, CA'),
('Kubwimana Jean Nicolas Volunteer', 'volunteer@test.com', 'Test1234', 'volunteer', '555-0456', 'Los Angeles, CA');

-- Sample volunteer_hours and user_badges below are commented out because their IDs
-- depend on the order of insertion and SERIAL values in PostgreSQL. Uncomment
-- and adjust IDs as needed after seeding users/events.
-- INSERT INTO volunteer_hours (volunteer_id, event_id, hours_worked, date_worked, status) VALUES
-- (2, 1, 4.5, '2025-01-15', 'approved'),
-- (2, 2, 3.0, '2025-02-20', 'pending');

-- INSERT INTO user_badges (user_id, badge_id, earned_at) VALUES
-- (2, 1, '2025-01-15 12:00:00'),
-- (2, 2, '2025-02-20 15:30:00');