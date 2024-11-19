-- Create database
CREATE DATABASE crud;

-- Create table
CREATE TABLE clients (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar (100) NOT NULL,
    email varchar(200) NOT NULL UNIQUE,
    phone varchar(20) NULL,
    address varchar(200) NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Insert some sample data in table
INSERT INTO clients (name, email, phone, address) VALUES ('Bill Gates','billgates@gmail.com','+123456678','Florida, USA'),
    ('Elon Musk','elonxmusk1@gmail.com','+1234342334','Texas, USA'),
    ('Kira Otasmui','otasmuikira10@gmail.com','+8823326678','Kyoto, Japan'),
    ('Hirop Jeham','jahem909@gmail.com','+233456338','kimpok, Indonesia'),
    ('Suman KC','sumankc213@gmail.com','+123456678','New York, USA');