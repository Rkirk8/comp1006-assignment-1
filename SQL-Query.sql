USE Rielly200521134;

CREATE TABLE positions (
positionID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
positionName VARCHAR(10) NOT NULL,
jerseyNum varchar (7) NOT NULL
);


INSERT INTO positions (positionName, jerseyNum) VALUES ('Prop', '1 or 3'), ('Hooker', '2'), ('Lock', '4 or 5'), ('Flanker', '6 or 7'), ('Number 8', '8'), ('Scrum Half', '9'), ('Fly Half', '10'), ('Winger', '11 or 14'), ('Center', '12 or 13'), ('Full Back', '15');

select * from positions;

CREATE TABLE players (
playerID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
playerName VARCHAR(100),
playerAge 	INT NOT NULL, 
position VARCHAR(10) NOT NULL
);

SELECT players.playerName, players.playerAge, players.position, positions.jerseyNum, positions.positionID 
FROM players
INNER JOIN positions ON players.position = positions.positionName
ORDER BY positionID;

Select * from players;

