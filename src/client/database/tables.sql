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
  content	    varchar(1000) not null,
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
  orderID	    int NOT NULL AUTO_INCREMENT,
  userID      int NOT NULL,
  orderDate	  datetime,
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
