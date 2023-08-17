-- KPI4a: Monthly cost per user for maintaining the notice board platform
DROP PROCEDURE IF EXISTS `AvgMonthlyCost`;

DELIMITER $$
CREATE PROCEDURE AvgMonthlyCost(IN currentYear INT)
BEGIN
    SELECT
        AVG(`jan`) AS jan,
        AVG(`feb`) AS feb,
        AVG(`mar`) AS mar,
        AVG(`apr`) AS apr,
        AVG(`may`) AS may,
        AVG(`jun`) AS jun,
        AVG(`jul`) AS jul,
        AVG(`aug`) AS aug,
        AVG(`sept`) AS sept,
        AVG(`oct`) AS oct,
        AVG(`nov`) AS nov,
        AVG(`dec`) AS dece
    FROM
        `cost_per_user`
    WHERE
        `year` = currentYear;
END$$
DELIMITER ;

CALL `AvgMonthlyCost`(2021);

-- ===============================================================================================

-- KPI4b: Revenue generated through advertising or sponsorships
DROP PROCEDURE IF EXISTS `AvgRevenueGenerated`;

DELIMITER $$
CREATE PROCEDURE AvgRevenueGenerated(IN currentYear INT)
BEGIN
    SELECT
        AVG(`q1`) AS avgQ1,
        AVG(`q2`) AS avgQ2,
        AVG(`q3`) AS avgQ3,
        AVG(`q4`) AS avgQ4
    FROM
        `revenue_generated`
    WHERE
        `year` = currentYear;
END$$
DELIMITER ;

CALL `AvgRevenueGenerated`(2021);