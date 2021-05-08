#procedure
DELIMITER ^
CREATE PROCEDURE StudentNotEnough()
BEGIN

	SELECT Quiz_stu.quiz_id, Quiz_stu.student_id, Student.student_name, Quiz_stu.score, Quiz.full_score FROM Quiz_stu
    LEFT JOIN Student on Quiz_stu.student_id = Student.student_id
    LEFT JOIN Quiz on Quiz_stu.quiz_id = Quiz.quiz_id
    WHERE Quiz_stu.score < (Quiz.full_score) * 0.4;

END

DELIMITER ;

