-- KPI3a: User engagement ie rate percentage of active users who interact with notices
DROP PROCEDURE IF EXISTS `AvgResponseRate`;

DELIMITER $$
CREATE PROCEDURE AvgResponseRate(IN currentYear INT)
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
        `response_rate`
    WHERE
        `year` = currentYear;
END$$
DELIMITER ;

CALL `AvgResponseRate`(2021);

-- ===============================================================================================

-- KPI3b: User retention rate ie percentage of users who continue to use the notice board over a specified period
DROP PROCEDURE IF EXISTS `AvgRetentionRate`;

DELIMITER $$
CREATE PROCEDURE AvgRetentionRate(IN currentYear INT)
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
        `retention_rate`
    WHERE
        `year` = currentYear;
END$$
DELIMITER ;

CALL `AvgRetentionRate`(2021);