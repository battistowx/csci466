-- This is the sql script for Assignment 7
-- Chris Battisto
-- Z1788103
-- 10/27/17
-- ---------------------------------------
-- 1:  Drop/delete all tables and views created beforehand
DROP TABLE Pet;
DROP TABLE Owner;
DROP VIEW Owner_and_Pet;
-- 2:  Create Owner table      
CREATE TABLE Owner(OwnerID int AUTO_INCREMENT, Name varchar(255), PRIMARY KEY (OwnerID));
-- 3:  Insert 5 entries
INSERT INTO Owner(OwnerID, Name) VALUES (1, 'John'), (2, 'Paul'), (3, 'George'), (4, 'Ringo'), (5, 'Pete');
-- 4:  Select * on Owner table to show all records
SELECT * FROM Owner;
-- 5:  Create Pet table
CREATE TABLE Pet(PetID int AUTO_INCREMENT, Name varchar(255), OwnerID int, PRIMARY KEY (PetID), FOREIGN KEY (OwnerID) REFERENCES Owner(OwnerID));
-- 6:  Insert records
INSERT INTO Pet(petID, Name, OwnerID) VALUES (1, 'Mr. Pickles', 1), (2, 'Kurt Cobain', 1), (3, 'Muffin', 2), (4, 'Chewbacca', 3), (5, 'Snowball', 4), (6, 'Buffalo Bill', 5);
-- 7:  Show all records
SELECT * FROM Pet;
-- 8:  Add type of pet column
ALTER TABLE Pet ADD COLUMN Type varchar(255);
-- 9:  Update rows to add pet type
UPDATE Pet SET Type='Dog' WHERE PetID=1;
UPDATE Pet SET Type='Cat' WHERE PetID=2;
UPDATE Pet SET Type='Goldfish' WHERE PetID=3;
UPDATE Pet SET Type='Parrot' WHERE PetID=4;
UPDATE Pet SET Type='Snake' WHERE PetID=5;
UPDATE Pet SET Type='Hamster' WHERE PetID=6;
-- 10:  Show all records
SELECT * FROM Pet;
-- 11:  Make a view for showing owner name and pet name
CREATE VIEW Owner_and_Pet AS SELECT Pet.Name AS Pet_Name, Owner.Name AS Owner_Name FROM Pet INNER JOIN Owner ON Owner.OwnerID=Pet.OwnerID;  
-- 12:  Select * on the view
SELECT * FROM Owner_and_Pet;