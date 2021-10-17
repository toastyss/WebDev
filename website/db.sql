SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS MoneyToU;
CREATE DATABASE MoneyToU;

USE MoneyToU;

CREATE TABLE Products(
    product_id CHAR(10) NOT NULL UNIQUE,
    currency VARCHAR(100) NOT NULL,
    denomination SMALLINT NOT NULL,
    mint_year YEAR NOT NULL,
    PRIMARY KEY (product_id) 
);

CREATE TABLE Products_status (
    product_id CHAR(10) NOT NULL,
    product_name VARCHAR(20) NOT NULL,
    price int NOT NULL,
    quality VARCHAR(100) NOT NULL DEFAULT "GOOD",
    shipping_status VARCHAR(100) NOT NULL DEFAULT "IN WAREHOUSE",
    quantity INT NOT NULL,
    PRIMARY KEY(product_id, quality, shipping_status),
    FOREIGN KEY (product_id) REFERENCES Products (product_id)
);

CREATE TABLE User_data (
    user_id CHAR(5) NOT NULL,
    user_first_name VARCHAR(255) NOT NULL,
    user_last_name VARCHAR(255) NOT NULL,
    card_num CHAR(16) NOT NULL,
    card_expiry DateTime NOT NULL,
    card_cvc CHAR(3) NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON MoneyToU.* TO dbadmin@localhost;

INSERT INTO Products values("AUD0051997", "AUD", 5, 1997);
INSERT INTO Products values("AUD0101997", "AUD", 10, 1997);
INSERT INTO Products values("AUD0201998", "AUD", 20, 1998);
INSERT INTO Products values("AUD0501998", "AUD", 50, 1998);
INSERT INTO Products values("USD0501928", "USD", 50, 1928);
INSERT INTO Products values("EUR0501958", "EUR", 50, 1958);


INSERT INTO Products_status values("AUD0051997", "Burnt $100 notes", 100, "GOOD", "IN WAREHOUSE", 50);
INSERT INTO Products_status values("AUD0101997", "Half eaten cash", 33, "EXCELLENT", "IN WAREHOUSE", 20);
INSERT INTO Products_status values("AUD0201998", "Just normal cash", 2, "GOOD", "SHIPPING", 5);
INSERT INTO Products_status values("AUD0501998", "Money", 38, "GOOD", "IN WAREHOUSE", 40);
INSERT INTO Products_status values("USD0501928", "Freedom bucks", 767, "GOOD", "IN WAREHOUSE", 10);
INSERT INTO Products_status values("EUR0501958", "Pre-Brexit Euros", 1, "GOOD", "IN WAREHOUSE", 1);
