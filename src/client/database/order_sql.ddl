/* deletes database */
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Admin;
DROP TABLE IF EXISTS Vehicle;
DROP TABLE IF EXISTS Warehouse;
DROP TABLE IF EXISTS Inventories;
DROP TABLE IF EXISTS CommentsOn;
DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Ships;
DROP TABLE IF EXISTS CartContents;
DROP TABLE IF EXISTS OrderContains;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS User (
   userID int NOT NULL AUTO_INCREMENT,
   username varchar(20) NOT NULL,
   password varchar(32) NOT NULL,
   email varchar(254) NOT NULL,
   primary key (userID),
  UNIQUE username (username),
  UNIQUE email (email)
);

CREATE TABLE IF NOT EXISTS Customer (
   userID int NOT NULL,
   firstName varchar(20) NOT NULL,
   lastName varchar(20) NOT NULL,
   address varchar(255) NOT NULL,
   profilePic LONGBLOB,
   CCNumber BIGINT(16),
   CCV int,
   expiryDate DATE,
   isActive BOOLEAN NOT NULL DEFAULT '1',
   primary key (userID),
   FOREIGN KEY (userID) REFERENCES User(userID)
    ON UPDATE CASCADE
);

-- ALTER TABLE Customer MODIFY COLUMN profilePic longblob;

CREATE TABLE IF NOT EXISTS Admin (
  userID int NOT NULL,
  primary key (userID),
  foreign key (userID) REFERENCES User(userID)
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Vehicle (
  vehicleID     int NOT NULL AUTO_INCREMENT,
  year          int NOT NULL,
  make          VARCHAR(20) NOT NULL,
  model         VARCHAR(32) NOT NULL,
  price         NUMERIC(10,2) NOT NULL,
  bodyType      VARCHAR(10) CHECK (bodyType IN (Coupe, Hatchback, Sedan, SUV, Truck, Wagon, Other)),
  transmission  VARCHAR(10) CHECK (transmission IN (Automatic, CVT, Manual, Electric)),
  drivetrain    VARCHAR(5) CHECK (drivetrain IN (4X4, AWD, FWD, RWD, Other)),
  engine        VARCHAR(10) CHECK (engine IN (3CYL, 4CYL, 6CYL, 8CYL, 10CYL, 12CYL, Electric, Rotary, Other)),
  fuel          VARCHAR(10) CHECK (fuel IN (Gas, Diesel, Flex, Hybrid, Electric)),
  exterior      VARCHAR(10),
  seats         TINYINT,
  description   VARCHAR(1500),
  PRIMARY KEY (vehicleID),
  UNIQUE yearMakeModel (year, make, model, transmission, drivetrain, engine, fuel, exterior)
);

-- ALTER TABLE Vehicle ADD COLUMN description varchar(1500);
-- ALTER TABLE Vehicle MODIFY COLUMN   model VARCHAR(32) NOT NULL;

CREATE TABLE IF NOT EXISTS Warehouse (
  warehouseID int NOT NULL AUTO_INCREMENT,
  location    varchar(50) NOT NULL,
  continentID TINYINT NOT NULL,
  primary key (warehouseID),
  UNIQUE location (location)
);

CREATE TABLE IF NOT EXISTS Inventories(
  warehouseID int NOT NULL,
  vehicleID   int NOT NULL,
  amount      int NOT NULL,
  PRIMARY KEY (warehouseID, vehicleID),
  FOREIGN KEY (warehouseID) REFERENCES Warehouse(warehouseID)
    ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (vehicleID) REFERENCES Vehicle(vehicleID)
    ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS CommentsOn (
  userID      int NOT NULL,
  vehicleID   int NOT NULL,
  commentID   int NOT NULL AUTO_INCREMENT,
  parentID    int,
  depth       tinyint not null,
  commentPath varchar(255),
  commentTime timestamp,
  content       varchar(1000) not null,
  primary key (commentID),
  foreign key (userID) REFERENCES User(userID)
    ON UPDATE CASCADE ON DELETE CASCADE,
  foreign key (parentID) REFERENCES CommentsOn(commentID)
    ON UPDATE CASCADE ON DELETE CASCADE,
  foreign key (vehicleID) REFERENCES Vehicle(vehicleID)
  ON UPDATE CASCADE ON DELETE CASCADE
);

/* ALTER TABLE Orders MODIFY COLUMN orderID INT NOT NULL AUTO_INCREMENT; */

CREATE TABLE IF NOT EXISTS Orders (
  orderID     int NOT NULL AUTO_INCREMENT,
  userID      int NOT NULL,
  orderDate   datetime,
  totalPrice  numeric(10,2),
  method      varchar(8) NOT NULL CHECK (method IN (Freight, Cargo, Air)),
  orderStatus varchar(10) NOT NULL CHECK (orderStatus IN (Processing, Shipped, Delivered)),
  paymentCC   BIGINT(16) NOT NULL,
  shipAddress VARCHAR(255) NOT NULL,
  billAddress VARCHAR(255) NOT NULL,
  primary key (orderID),
  foreign key (userID) REFERENCES User(userID)
    ON UPDATE CASCADE ON DELETE CASCADE
);

/* ALTER TABLE Orders ADD COLUMN shipAddress VARCHAR(255) NOT NULL;
ALTER TABLE Orders ADD COLUMN billAddress VARCHAR(255) NOT NULL;
ALTER TABLE Orders MODIFY paymentCC TINYINT(4) NOT NULL; */

CREATE TABLE IF NOT EXISTS Ships (
  warehouseID int NOT NULL,
  orderID     int NOT NULL,
  PRIMARY KEY (warehouseID, orderID),
  FOREIGN KEY (warehouseID) references Warehouse(warehouseID)
    ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (orderID) REFERENCES Orders(orderID)
  ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS CartContents (
  userID    int NOT NULL,
  vehicleID int NOT NULL,
  quantity  int NOT NULL,
  PRIMARY KEY (userID, vehicleID),
  FOREIGN KEY (userID) REFERENCES Customer(userID)
    ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (vehicleID) REFERENCES Vehicle(vehicleID)
    ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS OrderContains (
  orderID   int NOT NULL,
  vehicleID int NOT NULL,
  quantity  tinyint NOT NULL,
  unitPrice numeric(10,2) NOT NULL,
  primary key (orderID, vehicleID),
  FOREIGN KEY (orderID) REFERENCES Orders(orderID)
    ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (vehicleID) REFERENCES Vehicle(vehicleID)
    ON UPDATE CASCADE ON DELETE CASCADE
);


/* ADMIN CREATION */
/*userID int NOT NULL AUTO_INCREMENT,
username varchar(20) NOT NULL,
password varchar(20) NOT NULL,
email varchar(254) NOT NULL,*/
INSERT INTO User (username, password, email) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@vehicleemporium.com');
/*userID int NOT NULL,*/
INSERT INTO Admin VALUES (1);

/* CUSTOMER CREATION */
/*userID int NOT NULL AUTO_INCREMENT,
username varchar(20) NOT NULL,
password varchar(20) NOT NULL,
email varchar(254) NOT NULL,*/
INSERT INTO User (username, password, email) VALUES ('customer', '91ec1f9324753048c0096d036a694f86', 'customer@somesite.com');
/*userID int NOT NULL,
firstName varchar(20) NOT NULL,
lastName varchar(20) NOT NULL,
address varchar(255) NOT NULL,
profilePic LONGBLOB,
CCNumber int,
CCV int,
expiryDate DATE,*/
INSERT INTO Customer (userID, firstName, lastName, address) VALUES ('2', 'Barber', 'Joe', '123 Customer Street, Kelowna, BC, Canada');

/* VEHICLE CREARTION */
/*bodyType: (Coupe, Hatchback, Sedan, SUV, Truck, Wagon, Other)
transmission: (Automatic, CVT, Manual, Electric)
drivetrain: (4X4, AWD, FWD, RWD, Other)
engine: (3CYL, 4CYL, 6CYL, 8CYL, 10CYL, 12CYL, Electric, Rotary, Other)
fuel: (Gas, Diesel, Flex, Hybrid, Electric)*/
INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2015', 'Audi', 'R8', '129900.00', 'Coupe', 'Manual', 'AWD', '10CYL', 'Gas', 'Silver', '2');
/* https://www.quattrodaily.com/wp-content/uploads/2015/10/12094927_997946123596568_2264656566690080600_o-1050x700.jpg */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats, description)
VALUES ('2018', 'Tesla', 'Model S', '174700.00', 'Sedan', 'Electric', 'AWD', 'Electric', 'Electric', 'White', '7', "Model S sets an industry standard for performance and safety. Tesla's all-electric powertrain delivers unparalleled performance in all weather conditions - with Dual Motor All-Wheel Drive and ludicrous acceleration.");
/* https://www.tesla.com/content/dam/tesla-site/sx-redesign/img/models/footer/models@2.jpg */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2010', 'Toyota', 'Tacoma', '24999.00', 'Truck', 'Automatic', '4X4', '6CYL', 'Gas', 'Blue', '5');
/* http://images.gtcarlot.com/pictures/46917211.jpg */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2018', 'McLaren', '720s', '429900.00', 'Coupe', 'Automatic', 'RWD', '8CYL', 'Gas', 'Blue', '2');
/* https://tdrpmimages.azureedge.net/photos/import/201809/2018/2326/f554a98c-095a-421d-85f9-746868758007.jpg */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2018', 'Aston Martin', 'Vanquish S', '339900.00', 'Coupe', 'Automatic', 'RWD', '12CYL', 'Gas', 'Blue', '4');
/* https://tdrpmimages.azureedge.net/photos/import/201810/0312/1243/47e69ad4-3e20-4d48-a6ce-c29744c1318e.jpg */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('1989', 'BMW', 'M6', '30999.00', 'Sedan', 'Automatic', 'RWD', '6CYL', 'Gas', 'Red', '5');
/* https://content.autotrader.com/content/dam/autotrader/articles/OversteerImages/2018/November/radwood/radwood.jpg */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('1967', 'Jaguar', 'Mk II', '40999.00', 'Sedan', 'Manual', 'RWD', '6CYL', 'Gas', 'White', '5');
/* https://cdn.bringatrailer.com/wp-content/uploads/2018/10/1967_jaguar_mk_ii_1541776735d2b9a60dec12aIMG_6322-940x621.jpg */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2017', 'Dodge', 'Challenger SRT HELLCAT', '40999.00', 'Sedan', 'Manual', 'RWD', '8CYL', 'Gas', 'Black', '5');
/* https://tdrpmimages.azureedge.net/photos/import/201811/0210/0235/7c9d394d-b063-4ded-a6b3-ca356ef76307.jpg-1024x786 */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats, description)
VALUES ('2018', 'Mercedes', 'GLC AMG 63', '121277.23', 'SUV', 'Automatic', 'AWD', '8CYL', 'Gas', 'White', '5', "Within the muscular body of an SUV lives the agility of a sport sedan bred to win countless German Touring Car Championships and drivers' hearts around the world. The Mercedes-AMG GLC SUVs wrap thundering power in lightning-quick reflexes.");

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2018', 'Honda', 'Civic Type R', '41090.00', 'Hatchback', 'Automatic', 'FWD', '4CYL', 'Gas', 'White', '4');

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2017', 'Ferrari', 'F12tdf', '1300000.00', 'Coupe', 'Automatic', 'RWD', '12CYL', 'Gas', 'Blue', '2');

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2018', 'Lamborghini', 'Aventador Roadster S', '674995.00', 'Coupe', 'Automatic', 'AWD', '12CYL', 'Gas', 'Black', '2');


/* WAREHOUSE CREATION */
/*warehouseID int NOT NULL AUTO_INCREMENT,
location    varchar(50) NOT NULL,
continentID TINYINT NOT NULL,*/
INSERT INTO Warehouse (location, continentID) VALUES ('Vancouver, Canada', '1');
INSERT INTO Warehouse (location, continentID) VALUES ('Detroit, USA', '1');
INSERT INTO Warehouse (location, continentID) VALUES ('Mexico City, Mexico', '1');
INSERT INTO Warehouse (location, continentID) VALUES ('Bueonos Aires, Argentina', '1');
INSERT INTO Warehouse (location, continentID) VALUES ('London, England', '2');
INSERT INTO Warehouse (location, continentID) VALUES ('Istanbul, Turkey', '3');
INSERT INTO Warehouse (location, continentID) VALUES ('Shanghai, China', '3');
INSERT INTO Warehouse (location, continentID) VALUES ('Tokyo, Japan', '4');
INSERT INTO Warehouse (location, continentID) VALUES ('Sydney, Australia', '5');

/* INVENTORY CREATION */
/*warehouseID int NOT NULL,
vehicleID   int NOT NULL,
amount      int NOT NULL,*/
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (1, 1, 35);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (2, 2, 20);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (3, 3, 50);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (4, 4, 45);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (5, 5, 60);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (6, 6, 25);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (7, 7, 75);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (8, 8, 15);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (9, 9, 25);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (9, 10, 35);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (9, 11, 45);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (9, 12, 35);

/* COMMENT CREATION */
/*userID      int NOT NULL,
vehicleID   int NOT NULL,
commentID   int NOT NULL AUTO_INCREMENT,
parentID    int,
depth       tinyint not null,
commentPath varchar(255),
commentTime timestamp,
content	    varchar(1000) not null,*/

/* PARENT COMMENT (no parentID, no commentPath) */
INSERT INTO CommentsOn (userID, vehicleID, depth, commentTime, content)
VALUES (2, 2, 0, '2018-11-27 10:10:00', 'Wow, what a great car! Does it come in bright pearlescent fuchsia?!');

/* CHILD COMMENT */
INSERT INTO CommentsOn (userID, vehicleID, parentID, depth, commentPath, commentTime, content)
VALUES (1, 2, 1, 1, '1', '2018-11-27 12:01:32', 'Hi there, thanks for your interest in this amazing product! The Tesla Model S is only available in white, as it is the most Earth-friendly colour for this environemtnally-concious luxury brand.');

/* ADDITIONAL CHILD COMMENT */
INSERT INTO CommentsOn (userID, vehicleID, parentID, depth, commentPath, commentTime, content)
VALUES (2, 2, 2, 2, '1/2', '2018-11-27 13:33:57', "Ahh, gothca. That's too bad, I really like fuchsia...");

/* NEW COMMENT */
INSERT INTO CommentsOn (userID, vehicleID, depth, commentTime, content)
VALUES (2, 1, 0, '2018-12-08 10:10:00', 'Wow, what a great car! Does it come in bright pearlescent fuchsia?!');

/* CARTCONTENTS CREATION */
/*userID    int NOT NULL,
vehicleID int NOT NULL,
quantity  int NOT NULL,*/
INSERT INTO CartContents VALUES (2, 1, 1);
INSERT INTO CartContents VALUES (2, 2, 1);
INSERT INTO CartContents VALUES (2, 3, 5);

/* ORDER CREATION */
/*orderID	    int NOT NULL AUTO_INCREMENT,
userID      int NOT NULL,
orderDate	  datetime,
totalPrice  numeric(10,2),
method      varchar(8) NOT NULL CHECK (method IN (Freight, Cargo, Air)),
orderStatus varchar(10) NOT NULL CHECK (orderStatus IN (Processing, Shipped, Delivered)),
paymentCC   int NOT NULL,
shipAddress VARCHAR(255) NOT NULL,
billAddress VARCHAR(255) NOT NULL,*/
INSERT INTO Orders (userID, orderDate, totalPrice, method, orderStatus, paymentCC, shipAddress, billAddress)
VALUES (2, '2018-10-27 14:03:21', '174700.00', 'Freight', 'delivered', '1234', '123 Customer Street, Kelowna, BC, Canada', '123 Customer Street, Kelowna, BC, Canada');

INSERT INTO Orders (userID, orderDate, totalPrice, method, orderStatus, paymentCC, shipAddress, billAddress)
VALUES (2, '2018-11-11 16:07:45', '162276.23', 'Freight', 'shipped', '1234', '123 Customer Street, Kelowna, BC, Canada', '123 Customer Street, Kelowna, BC, Canada');

INSERT INTO Orders (userID, orderDate, totalPrice, method, orderStatus, paymentCC, shipAddress, billAddress)
VALUES (2, '2018-11-17 06:01:34', '129900.00', 'Freight', 'shipped', '1234', '123 Customer Street, Kelowna, BC, Canada', '123 Customer Street, Kelowna, BC, Canada');

INSERT INTO Orders (userID, orderDate, totalPrice, method, orderStatus, paymentCC, shipAddress, billAddress)
VALUES (2, '2018-12-01 21:57:19', '674995.00', 'Freight', 'processing', '1234', '123 Customer Street, Kelowna, BC, Canada', '123 Customer Street, Kelowna, BC, Canada');

/* ORDERCONTAINS CREATION */
/*orderID   int NOT NULL,
vehicleID int NOT NULL,
quantity  tinyint NOT NULL,
unitPrice numeric(10,2) NOT NULL,*/
INSERT INTO OrderContains VALUES (1, 2, 1, 174700.00);
INSERT INTO OrderContains VALUES (2, 7, 1, 40999.00);
INSERT INTO OrderContains VALUES (2, 9, 1, 121277.23);
INSERT INTO OrderContains VALUES (3, 1, 1, 129900.00);
INSERT INTO OrderContains VALUES (4, 12, 1, 674995.00);
