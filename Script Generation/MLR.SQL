
USE levesqu221_2;
# -----------------------------------------------------------------------------
#       TABLE : USER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USERS
 (
   US_ID INTEGER NOT NULL  ,
   UST_ID INTEGER NOT NULL  ,
   USS_JD INTEGER NOT NULL  ,
   US_PSEUDO VARCHAR(128) NOT NULL  ,
   US_MAIL VARCHAR(128) NOT NULL  ,
   US_FIRSTNAME VARCHAR(128) NOT NULL  ,
   US_LASTNAME VARCHAR(128) NOT NULL  ,
   US_REGDATE DATETIME NOT NULL  ,
   US_PASSWORD VARCHAR(128) NOT NULL  
   , PRIMARY KEY (US_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE USER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_USERS_USERS_TYPE
     ON USERS (UST_ID ASC);

CREATE  INDEX I_FK_USER_USER_STATUS
     ON USERS (USS_JD ASC);

# -----------------------------------------------------------------------------
#       TABLE : USER_TYPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USERS_TYPE
 (
   UST_ID INTEGER NOT NULL  ,
   UST_LABEL VARCHAR(128) NOT NULL  
   , PRIMARY KEY (UST_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMENT
 (
   CO_ID INTEGER NOT NULL  ,
   RE_ID INTEGER NOT NULL  ,
   US_ID INTEGER NOT NULL  ,
   CO_CONTENT VARCHAR(255) NOT NULL  ,
   CO_DATE DATETIME NOT NULL  ,
   CO_STATUS INT NOT NULL  ,
   CO_TITLE VARCHAR(128) NOT NULL  
   , PRIMARY KEY (CO_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMMENT_RECIPE
     ON COMMENT (RE_ID ASC);

CREATE  INDEX I_FK_COMMENT_USERS
     ON COMMENT (US_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : CATEGORY
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORY
 (
   CA_ID INTEGER NOT NULL  ,
   CA_TITLE VARCHAR(128) NOT NULL  ,
   CA_DESCRIPTION VARCHAR(128) NOT NULL  
   , PRIMARY KEY (CA_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : RECIPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RECIPE
 (
   RE_ID INTEGER NOT NULL  ,
   RES_ID INTEGER NOT NULL  ,
   US_ID INTEGER NOT NULL  ,
   CA_ID INTEGER NOT NULL  ,
   RE_TITLE VARCHAR(128) NOT NULL  ,
   RE_CONTENT VARCHAR(128) NOT NULL  ,
   RE_SUMMARY VARCHAR(128) NOT NULL  ,
   RE_CATEGORY VARCHAR(128) NOT NULL  ,
   RE_REGDATE DATETIME NOT NULL  ,
   RE_IMAGE VARCHAR(255) NOT NULL  ,
   RE_CREATIONDATE DATETIME NOT NULL  ,
   RE_MODIFDATE DATETIME NOT NULL  
   , PRIMARY KEY (RE_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RECIPE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RECIPE_RECIPE_STATUS
     ON RECIPE (RES_ID ASC);

CREATE  INDEX I_FK_RECIPE_USERS
     ON RECIPE (US_ID ASC);

CREATE  INDEX I_FK_RECIPE_CATEGORY
     ON RECIPE (CA_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : USER_STATUS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USERS_STATUS
 (
   USS_JD INTEGER NOT NULL  ,
   USS_LABEL VARCHAR(128) NOT NULL  
   , PRIMARY KEY (USS_JD) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : INGREDIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INGREDIENT
 (
   IN_ID INTEGER NOT NULL  ,
   IN_TITLE VARCHAR(128) NOT NULL  ,
   IN_DESCRIPTION VARCHAR(255) NULL  
   , PRIMARY KEY (IN_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : RECIPE_STATUS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RECIPE_STATUS
 (
   RES_ID INTEGER NOT NULL  ,
   RES_LABEL VARCHAR(128) NOT NULL  
   , PRIMARY KEY (RES_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : UTILIZE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILIZE
 (
   RE_ID INTEGER NOT NULL  ,
   IN_ID INTEGER NOT NULL  
   , PRIMARY KEY (RE_ID,IN_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE UTILIZE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_UTILIZE_RECIPE
     ON UTILIZE (RE_ID ASC);

CREATE  INDEX I_FK_UTILIZE_INGREDIENT
     ON UTILIZE (IN_ID ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE USERS 
  ADD FOREIGN KEY FK_USERS_USERS_TYPE (UST_ID)
      REFERENCES USERS_TYPE (UST_ID) ;


ALTER TABLE USERS 
  ADD FOREIGN KEY FK_USERS_USERS_STATUS (USS_JD)
      REFERENCES USERS_STATUS (USS_JD) ;


ALTER TABLE COMMENT 
  ADD FOREIGN KEY FK_COMMENT_RECIPE (RE_ID)
      REFERENCES RECIPE (RE_ID) ;


ALTER TABLE COMMENT 
  ADD FOREIGN KEY FK_COMMENT_USERS (US_ID)
      REFERENCES USERS (US_ID) ;


ALTER TABLE RECIPE 
  ADD FOREIGN KEY FK_RECIPE_RECIPE_STATUS (RES_ID)
      REFERENCES RECIPE_STATUS (RES_ID) ;


ALTER TABLE RECIPE 
  ADD FOREIGN KEY FK_RECIPE_USERS (US_ID)
      REFERENCES USERS (US_ID) ;


ALTER TABLE RECIPE 
  ADD FOREIGN KEY FK_RECIPE_CATEGORY (CA_ID)
      REFERENCES CATEGORY (CA_ID) ;


ALTER TABLE UTILIZE 
  ADD FOREIGN KEY FK_UTILIZE_RECIPE (RE_ID)
      REFERENCES RECIPE (RE_ID) ;


ALTER TABLE UTILIZE 
  ADD FOREIGN KEY FK_UTILIZE_INGREDIENT (IN_ID)
      REFERENCES INGREDIENT (IN_ID) ;

-- Inserting a user as an admin
INSERT INTO users (us_id, ust_id, uss_jd, us_pseudo, us_mail, us_firstname, us_lastname, us_regdate, us_password)
VALUES (1, 1, 1, 'admin123', 'admin@example.com', 'Admin', 'User', '2023-10-17 00:00:00', 'adminpassword');

-- Inserting a regular user
INSERT INTO users (us_id, ust_id, uss_jd, us_pseudo, us_mail, us_firstname, us_lastname, us_regdate, us_password)
VALUES (2, 2, 2, 'user123', 'user@example.com', 'Regular', 'User', '2023-10-17 00:00:00', 'userpassword');

-- Inserting recipes for the admin
INSERT INTO recipe (re_id, res_id, us_id, ca_id, re_title, re_content, re_summary, re_category, re_regdate, re_image, re_creationdate, re_modifdate)
VALUES (1, 1, 1, 1, 'Admin Recipe 1', 'Admin Recipe Content 1', 'Admin Recipe Summary 1', 'Admin Recipe Category 1', '2023-10-17 00:00:00', 'image1.jpg', '2023-10-17 00:00:00', '2023-10-17 00:00:00');

-- Inserting recipes for the regular user
INSERT INTO recipe (re_id, res_id, us_id, ca_id, re_title, re_content, re_summary, re_category, re_regdate, re_image, re_creationdate, re_modifdate)
VALUES (2, 2, 2, 2, 'User Recipe 1', 'User Recipe Content 1', 'User Recipe Summary 1', 'User Recipe Category 1', '2023-10-17 00:00:00', 'image2.jpg', '2023-10-17 00:00:00', '2023-10-17 00:00:00');

-- Inserting comments for the admin's recipe
INSERT INTO comment (co_id, re_id, us_id, co_content, co_date, co_status, co_title)
VALUES (1, 1, 1, 'This is a comment on Admin Recipe 1.', '2023-10-17 00:00:00', 1, 'Admin Comment 1');

-- Inserting comments for the regular user's recipe
INSERT INTO comment (co_id, re_id, us_id, co_content, co_date, co_status, co_title)
VALUES (2, 2, 2, 'This is a comment on User Recipe 1.', '2023-10-17 00:00:00', 1, 'User Comment 1');



-- Add more ingredient entries as needed

INSERT INTO INGREDIENT (IN_ID, IN_TITLE, IN_DESCRIPTION)
VALUES (1, 'Ingredient 1', 'Description 1');

INSERT INTO INGREDIENT (IN_ID, IN_TITLE, IN_DESCRIPTION)
VALUES (2, 'Ingredient 2', 'Description 2');




-- Add more utilization entries as needed

INSERT INTO UTILIZE (RE_ID, IN_ID)
VALUES (1, 1);

INSERT INTO UTILIZE (RE_ID, IN_ID)
VALUES (2, 2);


select * from RECIPE;

select * from CATEGORY;

update CATEGORY set CA_TITLE = 'Entr�e' where CA_ID =1;

update CATEGORY set CA_TITLE = 'Plat principal' where CA_ID  = 2;

update CATEGORY set CA_DESCRIPTION = 'Cette recette est une entr�e' where CA_ID=1;

update CATEGORY set CA_DESCRIPTION = 'Cette recette est un plat principal' where CA_ID=2;
update CATEGORY set CA_DESCRIPTION = 'Cette recette est un dessert ' where CA_ID=3;



