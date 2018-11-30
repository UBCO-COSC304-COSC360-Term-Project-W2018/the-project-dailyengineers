CREATE TABLE IF NOT EXISTS User (
   userID int NOT NULL AUTO_INCREMENT,
   username varchar(20) NOT NULL,
   password varchar(20) NOT NULL,
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
   profilePic VARCHAR(50),
   CCNumber int,
   CCV int,
   expiryDate DATE,
   isActive BOOLEAN NOT NULL DEFAULT '1',
   primary key (userID),
   FOREIGN KEY (userID) REFERENCES User(userID)
    ON UPDATE CASCADE
);

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
  model         VARCHAR(20) NOT NULL,
  price         NUMERIC(10,2) NOT NULL,
  productPic    VARCHAR(50),
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
  orderID       int NOT NULL AUTO_INCREMENT,
  userID      int NOT NULL,
  orderDate   datetime,
  totalPrice  numeric(10,2),
  method      varchar(8) NOT NULL CHECK (method IN (Freight, Cargo, Air)),
  orderStatus varchar(10) NOT NULL CHECK (orderStatus IN (Processing, Shipped, Delivered)),
  paymentCC   int NOT NULL,
  primary key (orderID),
  foreign key (userID) REFERENCES User(userID)
    ON UPDATE CASCADE ON DELETE CASCADE
);

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
INSERT INTO User (username, password, email) VALUES ('admin', 'admin', 'admin@vehicleemporium.com');
/*userID int NOT NULL,*/
INSERT INTO Admin VALUES (1);

/* CUSTOMER CREATION */
/*userID int NOT NULL AUTO_INCREMENT,
username varchar(20) NOT NULL,
password varchar(20) NOT NULL,
email varchar(254) NOT NULL,*/
INSERT INTO User (username, password, email) VALUES ('customer', 'customer', 'customer@somesite.com');
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

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2018', 'Tesla', 'Model S', '174700.00', 'Sedan', 'Electric', 'AWD', 'Electric', 'Electric', 'White', '7');
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
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (1, 2, 35);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (6, 1, 20);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (8, 3, 50);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (1, 1, 0);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (7, 2, 0);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (2, 3, 0);

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
paymentCC   int NOT NULL,*/
INSERT INTO Orders (userID, orderDate, totalPrice, method, orderStatus, paymentCC)
VALUES (2, '2018-11-27 14:03:21', '174700.00', 'Freight', 'Processing', '1234');

/* ORDERCONTAINS CREATION */
/*orderID   int NOT NULL,
vehicleID int NOT NULL,
quantity  tinyint NOT NULL,
unitPrice numeric(10,2) NOT NULL,*/
INSERT INTO OrderContains VALUES (1, 2, 1, 174700.00);
