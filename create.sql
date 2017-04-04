--------------------------- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS portfolio;

--------------------------- CREATE DATABASE USER
CREATE USER 'nate'@'localhost' IDENTIFIED BY 'GHBBFA!';
GRANT ALL ON portfolio.* TO 'nate'@'localhost';


--------------------------- CREATE TABLES
CREATE TABLE IF NOT EXISTS skills (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(350) NOT NULL UNIQUE,
    rating INT NOT NULL,
    displayType VARCHAR(100) NOT NULL,
    
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS projects (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(350) NOT NULL UNIQUE,
    description TEXT,
    img VARCHAR(350) NOT NULL UNIQUE,
    
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS about (
    id INT NOT NULL AUTO_INCREMENT,
    about TEXT,
    
    PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS user (
    id INT NOT NULL, 
    username varchar(45) NOT NULL UNIQUE,
    password_hash varchar(350) NOT NULL,
    salt varchar(250) NOT NULl,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    PRIMARY KEY (id)
);

---------------------------------------------------------------------------- STORED PROCEDURES
--------------------------- SKILLS
--------------- SKILL BUBBLES
DELIMITER // 
CREATE PROCEDURE `get_skill_bubbles` ()
    BEGIN 
        SELECT * FROM skills WHERE displayType = 'bubble';
    END//
DELIMITER ;

--------------- SKILL BARS
DELIMITER // 
CREATE PROCEDURE `get_skill_bars` ()
    BEGIN 
        SELECT * FROM skills WHERE displayType = 'bar';
    END//
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE `add_skill` (IN arg_name VARCHAR(350), IN arg_rating INT, IN arg_displayType VARCHAR(100))
    BEGIN 
        INSERT INTO skills (name, rating, displayType)
        VALUES (arg_name, arg_rating, arg_displayType);
    END//
DELIMITER ;

DELIMITER // 
CREATE PROCEDURE `edit_skill` (IN arg_Id INT, IN arg_name VARCHAR(350), IN arg_rating INT, IN arg_displayType VARCHAR(100))
    BEGIN 
        UPDATE skills 
        SET name = arg_name, 
            rating = arg_rating,
            displayType = arg_displayType
        WHERE id = arg_Id;
        
    END//
DELIMITER ;

--------------------------- SKILLS
DELIMITER // 
CREATE PROCEDURE `get_projects` ()
    BEGIN 
        SELECT * FROM projects;
    END//
DELIMITER ;



DELIMITER // 
CREATE PROCEDURE `add_project` (IN arg_name VARCHAR(350), IN arg_description TEXT, IN arg_img VARCHAR(350))
    BEGIN 
        INSERT INTO projects (name, description, img) VALUES (
            arg_name, arg_description, arg_img
        );
    END//
DELIMITER ;

