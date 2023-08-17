-- KPI1a: Number of user suggestions or feedback received for notice board improvements
DROP PROCEDURE IF EXISTS `TotalFeedbackThisYear`;

DELIMITER $$
CREATE PROCEDURE TotalFeedbackThisYear(IN currentYear INT)
BEGIN
    SELECT
        SUM(`q1`) AS sumQ1,
        SUM(`q2`) AS sumQ2,
        SUM(`q3`) AS sumQ3,
        SUM(`q4`) AS sumQ4
    FROM
        `user_feedback`
    WHERE
        `year` = currentYear;
END$$
DELIMITER ;

CALL `TotalFeedbackThisYear`(2021);

-- ===============================================================================================

-- KPI1b: Average user satisfaction rating with notice board updates
DROP PROCEDURE IF EXISTS `AvgUserSatisfaction`;

DELIMITER $$
CREATE PROCEDURE AvgUserSatisfaction(IN currentYear INT)
BEGIN
    SELECT
        AVG(`q1`) AS avgQ1,
        AVG(`q2`) AS avgQ2,
        AVG(`q3`) AS avgQ3,
        AVG(`q4`) AS avgQ4
    FROM
        `user_satisfaction`
    WHERE
        `year` = currentYear;
END$$
DELIMITER ;

CALL `AvgUserSatisfaction`(2021);