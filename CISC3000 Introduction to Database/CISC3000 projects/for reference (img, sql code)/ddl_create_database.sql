-- DDL for create database & table

create database NBA;
use NBA;

-- Create the Teams table
CREATE TABLE Teams (
    TeamID INT PRIMARY KEY,
    TeamName VARCHAR(50) NOT NULL,
    City VARCHAR(50) NOT NULL,
    State VARCHAR(50) NOT NULL,
    ArenaName VARCHAR(50) NOT NULL,
    FoundedYear INT NOT NULL,
    CoachID INT
);

-- Create the Players table
CREATE TABLE Players (
    PlayerID INT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Position VARCHAR(10) NOT NULL,
    Height INT,
    Weight INT,
    Birthdate DATE,
    TeamID INT NOT NULL,
    FOREIGN KEY (TeamID) REFERENCES Teams(TeamID)
);


-- Create the Games table
CREATE TABLE Games (
    GameID INT PRIMARY KEY,
    DatePlayed DATE NOT NULL,
    HomeTeamID INT NOT NULL,
    AwayTeamID INT NOT NULL,
    HomeTeamScore INT NOT NULL,
    AwayTeamScore INT NOT NULL,
    WinningTeamID INT NOT NULL,
    FOREIGN KEY (HomeTeamID) REFERENCES Teams(TeamID),
    FOREIGN KEY (AwayTeamID) REFERENCES Teams(TeamID),
    FOREIGN KEY (WinningTeamID) REFERENCES Teams(TeamID)
);

-- Create the Stats table
CREATE TABLE Stats (
    StatID INT PRIMARY KEY,
    GameID INT NOT NULL,
    PlayerID INT NOT NULL,
    Points INT NOT NULL,
    Rebounds INT NOT NULL,
    Assists INT NOT NULL,
    Steals INT NOT NULL,
    Blocks INT NOT NULL,
    Turnovers INT NOT NULL,
    FOREIGN KEY (GameID) REFERENCES Games(GameID),
    FOREIGN KEY (PlayerID) REFERENCES Players(PlayerID)
);

-- Create the Coaches table
CREATE TABLE Coaches (
    CoachID INT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    TeamID INT NOT NULL,
    FOREIGN KEY (TeamID) REFERENCES Teams(TeamID)
);

-- Create the Drafts table
CREATE TABLE Drafts (
    DraftID INT PRIMARY KEY,
    Year INT NOT NULL,
    Round INT NOT NULL,
    Pick INT NOT NULL,
    PlayerID INT NOT NULL,
    TeamID INT NOT NULL,
    FOREIGN KEY (PlayerID) REFERENCES Players(PlayerID),
    FOREIGN KEY (TeamID) REFERENCES Teams(TeamID)
);

-- Create the Awards table
CREATE TABLE Awards (
    AwardID INT PRIMARY KEY,
    AwardName VARCHAR(50) NOT NULL,
    Year INT NOT NULL,
    PlayerID INT NOT NULL,
    FOREIGN KEY (PlayerID) REFERENCES Players(PlayerID)
);
