-- DDL for insert records into table

Insert into Teams
INSERT INTO Teams (TeamID, TeamName, City, State, ArenaName, FoundedYear, CoachID) VALUES
(1, 'Los Angeles Lakers', 'Los Angeles', 'California', 'Staples Center', 1947, 1),
(2, 'Golden State Warriors', 'San Francisco', 'California', 'Chase Center', 1946, 2),
(3, 'Boston Celtics', 'Boston', 'Massachusetts', 'TD Garden', 1946, 3),
(4, 'Chicago Bulls', 'Chicago', 'Illinois', 'United Center', 1966, 4),
(5, 'Houston Rockets', 'Houston', 'Texas', 'Toyota Center', 1967, 5),
(6, 'Philadelphia 76ers', 'Philadelphia', 'Pennsylvania', 'Wells Fargo Center', 1949, 6),
(7, 'Miami Heat', 'Miami', 'Florida', 'American Airlines Arena', 1988, 7),
(8, 'Brooklyn Nets', 'Brooklyn', 'New York', 'Barclays Center', 1967, 8),
(9, 'San Antonio Spurs', 'San Antonio', 'Texas', 'AT&T Center', 1967, 9),
(10, 'Dallas Mavericks', 'Dallas', 'Texas', 'American Airlines Center', 1980, 10);

-- Insert into Players
INSERT INTO Players (PlayerID, FirstName, LastName, Position, Height, Weight, Birthdate, TeamID) VALUES
(1, 'LeBron', 'James', 'SF', 205.74, 113.4, '1984-12-30', 1),
(2, 'Stephen', 'Curry', 'PG', 190.5, 83.9, '1988-03-14', 2),
(3, 'Jayson', 'Tatum', 'SF', 203.2, 95.3, '1998-03-03', 3),
(4, 'Zach', 'LaVine', 'SG', 198.12, 90.7, '1995-03-10', 4),
(5, 'James', 'Harden', 'SG', 195.58, 99.8, '1989-08-26', 5),
(6, 'Joel', 'Embiid', 'C', 213.36, 127, '1994-03-16', 6),
(7, 'Bam', 'Adebayo', 'C', 205.74, 115.7, '1997-07-18', 7),
(8, 'Kevin', 'Durant', 'PF', 208.28, 108.9, '1988-09-29', 8),
(9, 'DeMar', 'DeRozan', 'SG', 198.12, 99.8, '1989-08-07', 9),
(10, 'Luka', 'Doncic', 'PG', 200.66, 104.3, '1999-02-28', 10),
(11, 'Anthony', 'Davis', 'PF', 208.28, 114.8, '1993-03-11', 1),
(12, 'Klay', 'Thompson', 'SG', 198.12, 97.5, '1990-02-08', 2),
(13, 'Jaylen', 'Brown', 'SG', 198.12, 101.2, '1996-10-24', 3);

-- Insert into Games
INSERT INTO Games (GameID, DatePlayed, HomeTeamID, AwayTeamID, HomeTeamScore, AwayTeamScore, WinningTeamID) VALUES 
(1, '2023-04-15', 1, 2, 105, 98, 1),
(2, '2023-04-16', 3, 4, 118, 109, 3),
(3, '2023-04-16', 5, 6, 88, 91, 6),
(4, '2023-04-17', 7, 8, 102, 97, 7),
(5, '2023-04-18', 9, 10, 95, 101, 10),
(6, '2023-04-18', 10, 2, 113, 118, 2),
(7, '2023-04-19', 1, 4, 90, 92, 4),
(8, '2023-04-19', 3, 6, 104, 111, 6),
(9, '2023-04-20', 1, 3, 112, 115, 3),
(10, '2023-04-20', 2, 4, 108, 99, 2),
(11, '2023-04-21', 5, 7, 98, 99, 7),
(12, '2023-04-22', 6, 8, 101, 103, 8),
(13, '2023-04-22', 9, 5, 121, 113, 9),
(14, '2023-04-23', 10, 6, 105, 107, 10),
(15, '2023-04-23', 9, 3, 84, 96, 3);


-- Insert into Stats
INSERT INTO Stats (StatID,GameID, PlayerID, Points, Rebounds, Assists, Steals, Blocks, Turnovers) VALUES
(1,1, 1, 24, 5, 3, 1, 0, 2),
(2,1, 2, 16, 10, 2, 0, 2, 1),
(3,1, 3, 8, 4, 1, 2, 0, 3),
(4,1, 4, 10, 6, 2, 0, 1, 1),
(5,2, 5, 20, 8, 2, 0, 2, 3),
(6,2, 6, 14, 6, 3, 1, 1, 2),
(7,2, 7, 6, 3, 1, 0, 0, 1),
(8,2, 8, 10, 4, 2, 2, 0, 1),
(9,3, 9, 18, 10, 4, 1, 2, 3),
(10,3, 10, 10, 4, 3, 0, 1, 1),
(11,3, 11, 6, 2, 2, 0, 0, 2),
(12,3, 12, 4, 2, 1, 1, 0, 0),
(13,4, 13, 22, 12, 3, 1, 3, 2),
(14,4, 1, 14, 8, 1, 0, 1, 2),
(15,4, 2, 10, 2, 4, 2, 0, 1);

-- Insert into Coaches
INSERT INTO Coaches (CoachID, FirstName, LastName, TeamID) VALUES
  (1, 'John', 'Doe', 1),
  (2, 'Jane', 'Doe', 2),
  (3, 'Mark', 'Johnson', 3),
  (4, 'Susan', 'Smith', 4),
  (5, 'Mike', 'Wilson', 5),
  (6, 'Emily', 'Jones', 6),
  (7, 'David', 'Brown', 7),
  (8, 'Karen', 'Taylor', 8),
  (9, 'Tom', 'Anderson', 9),
  (10, 'Laura', 'Clark', 10);

--  INSERT into Drafts 
INSERT INTO Drafts VALUES
  (1, 2020, 1, 1, 1, 1),
  (2, 2020, 1, 2, 2, 2),
  (3, 2020, 1, 3, 3, 3),
  (4, 2020, 2, 1, 4, 1),
  (5, 2020, 2, 2, 5, 2),
  (6, 2020, 2, 3, 6, 3),
  (7, 2021, 1, 1, 7, 1),
  (8, 2021, 1, 2, 8, 2),
  (9, 2021, 1, 3, 9, 3),
  (10, 2021, 2, 1, 10, 1);
  
  -- Insert into Awards
  INSERT INTO Awards VALUES
  (1, 'MVP', 2020, 1),
  (2, 'All-Star', 2020, 1),
  (3, 'Rookie of the Year', 2020, 2),
  (4, 'All-Star', 2021, 2),
  (5, 'Defensive Player of the Year', 2021, 3),
  (6, 'All-Star', 2021, 3),
  (7, 'MVP', 2021, 4),
  (8, 'All-Star', 2021, 4),
  (9, 'Rookie of the Year', 2021, 5),
  (10, 'All-Star', 2021, 5);
  