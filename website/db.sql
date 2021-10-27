SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS MoneyToU;
CREATE DATABASE MoneyToU;

USE MoneyToU;

CREATE TABLE Products(
    product_id CHAR(10) NOT NULL UNIQUE,
    currency VARCHAR(100) NOT NULL,
    denomination SMALLINT NOT NULL,
    mint_year INT NOT NULL,
    product_image VARCHAR(100) NOT NULL,
    PRIMARY KEY (product_id) 
);

CREATE TABLE Products_status (
    product_id CHAR(10) NOT NULL,
    product_name VARCHAR(30) NOT NULL,
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

-- Featured Products
INSERT INTO Products values("USD1001997", "USD", 5, 1997, "./assets/images/Products/FEAT/FeatProduct1.png");
INSERT INTO Products values("USD0101997", "USD", 100, 1997, "./assets/images/Products/FEAT/FeatProduct3.png");
INSERT INTO Products values("AUD0101954", "AUD", 10, 1954, "./assets/images/Products/FEAT/FeatProduct2.png");
INSERT INTO Products values("AUD0101993", "AUD", 10, 1993, "./assets/images/Products/FEAT/FeatProduct4.png");

-- Australian Dollars
INSERT INTO Products values("AUD0011966", "AUD", 1, 1966, "./assets/images/Products/AUD/1AUD.png");
INSERT INTO Products values("AUD0021966", "AUD", 2, 1966, "./assets/images/Products/AUD/2AUD.png");
INSERT INTO Products values("AUD0052017", "AUD", 5, 2017, "./assets/images/Products/AUD/5AUD.png");
INSERT INTO Products values("AUD0102017", "AUD", 10, 2017, "./assets/images/Products/AUD/10AUD.png");
INSERT INTO Products values("AUD0202017", "AUD", 20, 2017, "./assets/images/Products/AUD/20AUD.png");
INSERT INTO Products values("AUD0502018", "AUD", 50, 2018, "./assets/images/Products/AUD/50AUD.png");
INSERT INTO Products values("AUD1002020", "AUD", 100, 2020, "./assets/images/Products/AUD/100AUD.png");

-- Euro
INSERT INTO Products values("EUR0052011", "EUR", 5, 2011, "./assets/images/Products/EUR/5EUR.png");
INSERT INTO Products values("EUR0102013", "EUR", 10, 2013, "./assets/images/Products/EUR/10EUR.png");
INSERT INTO Products values("EUR0202014", "EUR", 20, 2014, "./assets/images/Products/EUR/20EUR.png");
INSERT INTO Products values("EUR0502015", "EUR", 50, 2015, "./assets/images/Products/EUR/50EUR.png");
INSERT INTO Products values("EUR1002018", "EUR", 100, 2018, "./assets/images/Products/EUR/100EUR.png");
INSERT INTO Products values("EUR2002018", "EUR", 200, 2018, "./assets/images/Products/EUR/200EUR.png");
INSERT INTO Products values("EUR5002014", "EUR", 500, 2014, "./assets/images/Products/EUR/500EUR.png");

-- American Dollars
INSERT INTO Products values("USD0012001", "USD", 1, 2001, "./assets/images/Products/USD/1USD.png");
INSERT INTO Products values("USD0021999", "USD", 2, 1999, "./assets/images/Products/USD/2USD.png");
INSERT INTO Products values("USD0052006", "USD", 5, 2006, "./assets/images/Products/USD/5USD.png");
INSERT INTO Products values("USD0102006", "USD", 10, 2006, "./assets/images/Products/USD/1USD.png");
INSERT INTO Products values("USD0202003", "USD", 20, 2003, "./assets/images/Products/USD/20USD.png");
INSERT INTO Products values("USD0502004", "USD", 50, 2004, "./assets/images/Products/USD/50USD.png");
INSERT INTO Products values("USD1002009", "USD", 100, 2009, "./assets/images/Products/USD/100USD.png");

-- Extinct
INSERT INTO Products values("EXT001DRAC", "EXT", 250, 0330, "./assets/images/Products/EXT/335-330BC_Drachma.png");
INSERT INTO Products values("EXT002DRAC", "EXT", 350, 0510, "./assets/images/Products/EXT/530-510BC_Drachma.png"); 
INSERT INTO Products values("EXT001DENA", "EXT", 150, 0138, "./assets/images/Products/EXT/117-138AD_Denarius.png");
INSERT INTO Products values("EXT001ANTO", "EXT", 200, 0127, "./assets/images/Products/EXT/198-127AD_Antoninianus.png");
INSERT INTO Products values("EXT4501986", "EXT", 450, 1986, "./assets/images/Products/FEAT/FeatProduct5.png");


-- Featured Products
INSERT INTO Products_status values("USD1001997", "'Half Eaten' $10 note", 5, "TERRIBLE", "IN WAREHOUSE", 50);
INSERT INTO Products_status values("USD0101997", "Burnt 100$ note", 100, "TERRIBLE", "IN WAREHOUSE", 20);
INSERT INTO Products_status values("AUD0101954", "Bloodied 10 Shilling", 10, "GOOD", "IN WAREHOUSE", 15);
INSERT INTO Products_status values("AUD0101993", "10$ & 1 cent + 1 halfpenny", 10, "GOOD", "IN WAREHOUSE", 65);

-- Australian Dollars
INSERT INTO Products_status values("AUD0011966", "1$ Australian Dollar", 1, "GOOD", "IN WAREHOUSE", 150);
INSERT INTO Products_status values("AUD0021966", "2$ Australian Dollar", 2, "GOOD", "IN WAREHOUSE", 145);
INSERT INTO Products_status values("AUD0052017", "5$ Australian Dollar", 5, "EXCELLENT", "IN WAREHOUSE", 450);
INSERT INTO Products_status values("AUD0102017", "10$ Australian Dollar", 10, "GOOD", "IN WAREHOUSE", 365);
INSERT INTO Products_status values("AUD0202017", "20$ Australian Dollar", 20, "EXCELLENT", "IN WAREHOUSE", 425);
INSERT INTO Products_status values("AUD0502018", "50$ Australian Dollar", 50, "EXCELLENT", "IN WAREHOUSE", 430);
INSERT INTO Products_status values("AUD1002020", "100$ Australian Dollar", 100, "EXCELLENT", "IN WAREHOUSE", 165);

-- Euro
INSERT INTO Products_status values("EUR0052011", "5$ Euro", 5, "GOOD", "IN WAREHOUSE", 365);
INSERT INTO Products_status values("EUR0102013", "10$ Euro", 10, "GOOD", "IN WAREHOUSE", 265);
INSERT INTO Products_status values("EUR0202014", "20$ Euro", 20, "EXCELLENT", "IN WAREHOUSE", 450);
INSERT INTO Products_status values("EUR0502015", "50$ Euro", 50, "GOOD", "IN WAREHOUSE", 365);
INSERT INTO Products_status values("EUR1002018", "100$ Euro", 100, "EXCELLENT", "IN WAREHOUSE", 165);
INSERT INTO Products_status values("EUR2002018", "200$ Euro", 200, "EXCELLENT", "IN WAREHOUSE", 150);
INSERT INTO Products_status values("EUR5002014", "500$ Euro", 500, "GOOD", "IN WAREHOUSE", 185);

-- American Dollars
INSERT INTO Products_status values("USD0012001", "1$ American Dollar", 1, "GOOD", "IN WAREHOUSE", 150);
INSERT INTO Products_status values("USD0021999", "2$ American Dollar", 2, "GOOD", "IN WAREHOUSE", 145);
INSERT INTO Products_status values("USD0052006", "5$ American Dollar", 5, "EXCELLENT", "IN WAREHOUSE", 450);
INSERT INTO Products_status values("USD0102006", "10$ American Dollar", 10, "GOOD", "IN WAREHOUSE", 365);
INSERT INTO Products_status values("USD0202003", "20$ American Dollar", 20, "EXCELLENT", "IN WAREHOUSE", 425);
INSERT INTO Products_status values("USD0502004", "50$ American Dollar", 50, "EXCELLENT", "IN WAREHOUSE", 430);
INSERT INTO Products_status values("USD1002009", "100$ American Dollar", 100, "EXCELLENT", "IN WAREHOUSE", 165);

-- Extinct
INSERT INTO Products_status values("EXT001DRAC", "335-330 BC Drachma", 250, "EXCELLENT", "IN WAREHOUSE", 25);
INSERT INTO Products_status values("EXT002DRAC", "530-510 BC Drachma", 350, "GOOD", "IN WAREHOUSE", 15);
INSERT INTO Products_status values("EXT001DENA", "117-138 AD Denarius", 150, "TERRIBLE", "IN WAREHOUSE", 35);
INSERT INTO Products_status values("EXT001ANTO", "198-127 BC Antoninianus", 200, "GOOD", "IN WAREHOUSE", 30);
INSERT INTO Products_status values("EXT4501986", "Pile of Rupees", 450, "EXCELLENT", "IN WAREHOUSE", 9);