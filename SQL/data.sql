INSERT INTO Students (student_name, email) VALUES 
('John Doe', 'john.doe@example.com'),
('Jane Smith', 'jane.smith@example.com'),
('Alice Johnson', 'alice.johnson@example.com'),
('Bob Brown', 'bob.brown@example.com');

INSERT INTO Instructors (instructor_name, email) VALUES 
('Dr. Sarah Lee', 'sarah.lee@university.com'),
('Prof. Michael Adams', 'michael.adams@university.com'),
('Dr. Emily Davis', 'emily.davis@university.com');

INSERT INTO Courses (course_name, course_code, schedule, credits, instructor_id, books, prerequisites) VALUES 
('Introduction to Programming', 'CS101', 'Mon 9-11 AM', 3, 1, 'Introduction to Java', ''),
('Database Systems', 'CS201', 'Tue 10-12 AM', 4, 2, 'Database Fundamentals, SQL for Beginners', 'CS101'),
('Data Structures', 'CS301', 'Wed 11-1 PM', 3, 1, 'Algorithms Unlocked', 'CS101'),
('Web Development', 'CS401', 'Thu 2-4 PM', 3, 3, 'HTML & CSS Guide', 'CS101');

INSERT INTO Enrollments (student_id, course_id, grade) VALUES 
(1, 1, 'A'),
(1, 2, 'B'),
(2, 1, 'A'),
(3, 3, 'B'),
(4, 4, 'C');
