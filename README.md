# GoToGro is a Group Project completed at Swinburne University of Technology
This website aims to be a basic all inclusive software which can be deployed on desktop computers and act as a simple UI which can be used by staff for a member-based grocery store. The software has the ability to add or find members, add/delete products to the store database, checkout these products, track sales and finally add/edit staff.   

The 'staff' area of the website is intended for checkout or potentially compromisable computers on the shop floor, and are restricted in accessibility to the store database.

The 'Admin' have full control of the store database and are able to add/edit staff and products to the store database.

# This project has been tuned to operate on a localhost MySQL Database, this can be updated in the settings.php file.

TO OPERATE THE WEBSITE

1. Place the reprository onto a web server with access to a MySQL Database. XAMPP is an easy and popular tool that achieves this and operates using localhost.

2. Run the following MySQL query:

    CREATE DATABASE GoToGro_DMS;
    USE GoToGro_DMS;

    CREATE TABLE Members
    (
    members_key INT(6) AUTO_INCREMENT UNIQUE not null,
    member_id VARCHAR(16) UNIQUE not null,
    first_name VARCHAR(255) not null,
    last_name VARCHAR(255) not null,
    phone_number VARCHAR(16),
    email VARCHAR(255),
    date_joined VARCHAR(10),
    date_expired VARCHAR(10),
    PRIMARY KEY(members_key, member_id)
    );

    CREATE TABLE Orders
    (
    order_key INT(6) AUTO_INCREMENT UNIQUE not null,
    order_id VARCHAR(16) UNIQUE not null,
    total_cost DECIMAL(5,2) not null,
    date DATE DEFAULT CURRENT_TIMESTAMP not null,
    PRIMARY KEY(order_key, order_id)
    );

    CREATE TABLE Products
    (
    product_key INT(6) AUTO_INCREMENT UNIQUE not null,
    product_id VARCHAR(16) UNIQUE not null,
    product_name VARCHAR(16) not null,
    product_price DECIMAL(5,2) not null,
    measurement VARCHAR(3) not null,
    PRIMARY KEY(product_key, product_id)
    );

    CREATE TABLE Sales
    (
    sales_key INT(6) AUTO_INCREMENT UNIQUE not null,
    order_id VARCHAR(16) not null,
    sale_id VARCHAR(16) not null,
    product_id VARCHAR(16) not null,
    quantity INT(2) not null,
    PRIMARY KEY(sales_key, order_id, sale_id),
    FOREIGN KEY(order_id) REFERENCES Orders(order_id),
    FOREIGN KEY(product_id) REFERENCES Products(product_id)
    );

    CREATE TABLE Staff
    (
    staff_key INT(6) AUTO_INCREMENT UNIQUE not null,   
    staff_id VARCHAR(16) UNIQUE not null,
    first_name VARCHAR(255) not null,
    last_name VARCHAR(255) not null,
    username VARCHAR(255) not null,
    password VARCHAR(255) not null,
    PRIMARY KEY(staff_key, staff_id)
    ); 

    CREATE TABLE admin 
    (
    adminKey INT(6) AUTO_INCREMENT UNIQUE not null,
    username varchar(16) not null,
    password varchar(16) not null
    );
    
 3. Finally, the admin username and password needs to be set, the following will give the site an admin with username: admin and password: admin however it is recommended to update these details.
 
    INSERT INTO `admin` (`adminKey`, `username`, `password`) VALUES ('000000', 'admin', 'admin');
   
   You can then add staff accounts through the admin access of the website
