-- KPI2a: Average time taken to review and approve a notice
DROP PROCEDURE IF EXISTS `AvgTimeTaken`;

DELIMITER $$
CREATE PROCEDURE AvgTimeTaken(IN currentYear INT)
BEGIN
    SELECT
        AVG(`week1`) AS avgWeek1,
        AVG(`week2`) AS avgWeek2,
        AVG(`week3`) AS avgWeek3,
        AVG(`week4`) AS avgWeek4,
        AVG(`week5`) AS avgWeek5,
        AVG(`week6`) AS avgWeek6,
        AVG(`week7`) AS avgWeek7,
        AVG(`week8`) AS avgWeek8,
        AVG(`week9`) AS avgWeek9,
        AVG(`week10`) AS avgWeek10,
        AVG(`week11`) AS avgWeek11,
        AVG(`week12`) AS avgWeek12
    FROM
        `review_time_delay`
    WHERE
        `year` = currentYear;
END$$
DELIMITER ;

CALL `AvgTimeTaken`(2021);

-- ===============================================================================================

-- KPI2b: Notice relevance score based on user feedback or engagement
DROP PROCEDURE IF EXISTS `AvgRelevanceScore`;

DELIMITER $$
CREATE PROCEDURE AvgRelevanceScore(IN currentYear INT)
BEGIN
    SELECT
        AVG(`q1`) AS avgQ1,
        AVG(`q2`) AS avgQ2,
        AVG(`q3`) AS avgQ3,
        AVG(`q4`) AS avgQ4
    FROM
        `relevance_score`
    WHERE
        `year` = currentYear;
END$$
DELIMITER ;

CALL `AvgRelevanceScore`(2021);