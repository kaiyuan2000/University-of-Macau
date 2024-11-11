-- DDL for create views, function and procedure

use NBA;

-- View to display player information along with their team name and coach name
CREATE VIEW PlayerTeamCoach AS
SELECT Players.PlayerID, Players.FirstName, Players.LastName, Players.Position, Players.Height, Players.Weight, Teams.TeamName, Coaches.FirstName AS CoachFirstName, Coaches.LastName AS CoachLastName
FROM Players
INNER JOIN Teams ON Players.TeamID = Teams.TeamID
INNER JOIN Coaches ON Teams.CoachID = Coaches.CoachID;


-- Procedure to update a player's height and weight
DELIMITER //
CREATE PROCEDURE UpdatePlayerHeightAndWeight(IN PlayerID INT, IN NewHeight INT, IN NewWeight INT)
BEGIN
    UPDATE Players SET Height = NewHeight, Weight = NewWeight WHERE PlayerID = PlayerID;
END


-- Function to get player's average points per game
DELIMITER //
CREATE FUNCTION AvgPointsPerGame(InputTeamID INT) 
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE AvgPoints INT;
    SELECT AVG(Points) INTO AvgPoints FROM Stats WHERE PlayerID IN (SELECT PlayerID FROM Players WHERE TeamID = InputTeamID);
    RETURN (AvgPoints);
END;
