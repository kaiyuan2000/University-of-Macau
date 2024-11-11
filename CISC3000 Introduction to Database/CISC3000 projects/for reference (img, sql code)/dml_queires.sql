-- 10 queries for our database

-- Find the name of the coach for each team:
SELECT TeamName, FirstName, LastName
FROM Teams
JOIN Coaches ON Teams.CoachID = Coaches.CoachID;

-- Find the number of games played by each team:
SELECT TeamName, COUNT(GameID) AS NumGames
FROM Teams
JOIN Games ON Teams.TeamID = Games.HomeTeamID OR Teams.TeamID = Games.AwayTeamID
GROUP BY TeamName;

-- Find the average height of players on each team:
SELECT TeamName, AVG(Height) AS AvgHeight_cm
FROM Teams
JOIN Players ON Teams.TeamID = Players.TeamID
GROUP BY TeamName;

-- Find the total number of points, rebounds, and assists for each player:
SELECT FirstName, LastName, SUM(Points) AS TotalPoints, SUM(Rebounds) AS TotalRebounds, SUM(Assists) AS TotalAssists
FROM Players
JOIN Stats ON Players.PlayerID = Stats.PlayerID
GROUP BY FirstName, LastName;

-- Find the names of players who have won the MVP award:
SELECT FirstName, LastName
FROM Players
JOIN Awards ON Players.PlayerID = Awards.PlayerID
WHERE AwardName = 'MVP';

-- Find the name of the player who scored the most points in a game:
SELECT FirstName, LastName, Points
FROM Players
JOIN Stats ON Players.PlayerID = Stats.PlayerID
WHERE Points = (SELECT MAX(Points) FROM Stats);

-- Find the teams that have not won a game yet:
SELECT TeamName
FROM Teams
WHERE NOT EXISTS (SELECT * FROM Games WHERE Teams.TeamID = Games.WinningTeamID);

-- Find the teams that have won more than half of their games:
SELECT TeamName
FROM Teams
JOIN Games ON Teams.TeamID = Games.HomeTeamID OR Teams.TeamID = Games.AwayTeamID
GROUP BY TeamName
HAVING SUM(CASE WHEN Teams.TeamID = Games.WinningTeamID THEN 1 ELSE 0 END) > COUNT(*)/2;

-- Find the players who have played for more than one team:
SELECT FirstName, LastName
FROM Players
GROUP BY FirstName, LastName
HAVING COUNT(DISTINCT TeamID) > 1;

-- Find the players who were drafted in the first round:
SELECT FirstName, LastName, Year, Round, Pick
FROM Players
JOIN Drafts ON Players.PlayerID = Drafts.PlayerID
WHERE Round = 1;

