SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS MoneyToU;
CREATE DATABASE MoneyToU;

USE MoneyToU;

CREATE TABLE Products(
    price int NOT NULL,
    currency VARCHAR(100) NOT NULL,
    demonination SMALLINT NOT NULL,
    mint_year YEAR NOT NULL,
    quality VARCHAR(100) NOT NULL DEFAULT "GOOD",
    product_status VARCHAR(100) NOT NULL DEFAULT "IN WAREHOUSE",
    quantity INT NOT NULL,
    PRIMARY KEY(currency, demonination, mint_year, quality, product_status, quantity)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON Practical3.Task TO dbadmin@localhost;

INSERT INTO Products values(100, "AUD", 5, 1997, "GOOD", "IN WAREHOUSE", 50);
INSERT INTO Products values(33, "AUD", 10, 1997, "EXCELLENT", "IN WAREHOUSE", 20);
INSERT INTO Products values(2, "AUD", 20, 1998, "GOOD", "SHIPPING", 5);
INSERT INTO Products values(38, "AUD", 50, 1998, "GOOD", "IN WAREHOUSE", 40);
INSERT INTO Products values(767, "USD", 50, 1928, "GOOD", "IN WAREHOUSE", 10);
INSERT INTO Products values(1, "EUR", 50, 1958, "GOOD", "IN WAREHOUSE", 1);