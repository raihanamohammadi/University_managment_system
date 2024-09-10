-- Create Students table
CREATE TABLE IF NOT EXISTS Students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Create Courses table 
CREATE TABLE IF NOT EXISTS Courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    course_code VARCHAR(50) NOT NULL UNIQUE,
    schedule VARCHAR(100),  -- To store schedule details (e.g., Mon 9-11 AM)
    credits INT,  -- Number of credits for the course
    instructor_id INT,  -- Reference to Instructor
    books TEXT,  -- Comma-separated book titles (e.g., 'Book1, Book2')
    prerequisites TEXT,  -- Comma-separated prerequisite course codes
    FOREIGN KEY (instructor_id) REFERENCES Instructors(instructor_id)
);

-- Create Instructors table
CREATE TABLE IF NOT EXISTS Instructors (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY,
    instructor_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Create Enrollments table
CREATE TABLE IF NOT EXISTS Enrollments (
    enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    grade CHAR(2),  -- Store student's grade
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);
