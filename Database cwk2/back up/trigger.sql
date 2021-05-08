CREATE TABLE Quiz_audit
(
	quiz_id INTEGER UNSIGNED,
	student_id INTEGER UNSIGNED,
	day date,
	time_day time
)

DELIMITER ^
CREATE TRIGGER delete_record
BEFORE DELETE ON Quiz FOR EACH ROW
BEGIN
	INSERT INTO Quiz_audit
    SET quiz_id = OLD.quiz_id,
    	staff_id = OLD.staff_id,
        day = CURDATE();

END ^
DELIMITER;
