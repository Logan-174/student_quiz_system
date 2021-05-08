CREATE TABLE Student
(
 student_id INTEGER UNSIGNED,
 student_name VARCHAR(255),
 student_grade INTEGER UNSIGNED,
 student_username VARCHAR(255) NOT NULL,
 student_password VARCHAR(255) NOT NULL,
 PRIMARY KEY(student_id,student_username)
 );

CREATE TABLE Staff
(
 staff_id INTEGER UNSIGNED,
 staff_name VARCHAR(255),
 staff_username VARCHAR(255) NOT NULL,
 staff_password VARCHAR(255) NOT NULL,
 PRIMARY KEY(staff_id, staff_username)
 );

CREATE TABLE Question_info
(
 question_number INTEGER UNSIGNED,
 question VARCHAR(255),
 option_1 VARCHAR(255),
 option_2 VARCHAR(255),
 option_3 VARCHAR(255),
 option_4 VARCHAR(255),
 answer VARCHAR(255),
 score INTEGER UNSIGNED,
 PRIMARY KEY(question_number)
 );

 CREATE TABLE Quiz
(
 quiz_id INTEGER UNSIGNED,
 quiz_name VARCHAR(255),
 quiz_author VARCHAR(255),
 quiz_available VARCHAR(255),
 quiz_duration VARCHAR(255),
 date_of_attempt DATE,
 full_score INTEGER UNSIGNED,
 staff_id INTEGER UNSIGNED,
 PRIMARY KEY(quiz_id)
 );

 CREATE TABLE Quiz_stu
 (
   quiz_id INTEGER UNSIGNED,
   student_id INTEGER UNSIGNED,
   score INTEGER UNSIGNED,
   PRIMARY KEY(quiz_id, student_id),
   FOREIGN KEY(quiz_id)
   REFERENCES Quiz(quiz_id),
   FOREIGN KEY(student_id)
   REFERENCES Student(student_id)
 );

 CREATE TABLE Question_Number
(
 question_number INTEGER UNSIGNED,
 quiz_id INTEGER UNSIGNED,
 PRIMARY KEY(question_number, quiz_id),
 FOREIGN KEY(question_number)
 REFERENCES Question_info(question_number),
 FOREIGN KEY(quiz_id)
 REFERENCES Quiz(quiz_id)
);