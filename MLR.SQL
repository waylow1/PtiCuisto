DROP DATABASE IF EXISTS MLR;

CREATE DATABASE IF NOT EXISTS MLR;
USE MLR;
# -----------------------------------------------------------------------------
#       TABLE : USER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USER
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


CREATE  INDEX I_FK_USER_USER_TYPE
     ON USER (UST_ID ASC);

CREATE  INDEX I_FK_USER_USER_STATUS
     ON USER (USS_JD ASC);

# -----------------------------------------------------------------------------
#       TABLE : USER_TYPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USER_TYPE
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
   CO_STATUS BOOL NOT NULL  ,
   CO_TITLE VARCHAR(128) NOT NULL  
   , PRIMARY KEY (CO_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMMENT_RECIPE
     ON COMMENT (RE_ID ASC);

CREATE  INDEX I_FK_COMMENT_USER
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

CREATE  INDEX I_FK_RECIPE_USER
     ON RECIPE (US_ID ASC);

CREATE  INDEX I_FK_RECIPE_CATEGORY
     ON RECIPE (CA_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : USER_STATUS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USER_STATUS
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


ALTER TABLE USER 
  ADD FOREIGN KEY FK_USER_USER_TYPE (UST_ID)
      REFERENCES USER_TYPE (UST_ID) ;


ALTER TABLE USER 
  ADD FOREIGN KEY FK_USER_USER_STATUS (USS_JD)
      REFERENCES USER_STATUS (USS_JD) ;


ALTER TABLE COMMENT 
  ADD FOREIGN KEY FK_COMMENT_RECIPE (RE_ID)
      REFERENCES RECIPE (RE_ID) ;


ALTER TABLE COMMENT 
  ADD FOREIGN KEY FK_COMMENT_USER (US_ID)
      REFERENCES USER (US_ID) ;


ALTER TABLE RECIPE 
  ADD FOREIGN KEY FK_RECIPE_RECIPE_STATUS (RES_ID)
      REFERENCES RECIPE_STATUS (RES_ID) ;


ALTER TABLE RECIPE 
  ADD FOREIGN KEY FK_RECIPE_USER (US_ID)
      REFERENCES USER (US_ID) ;


ALTER TABLE RECIPE 
  ADD FOREIGN KEY FK_RECIPE_CATEGORY (CA_ID)
      REFERENCES CATEGORY (CA_ID) ;


ALTER TABLE UTILIZE 
  ADD FOREIGN KEY FK_UTILIZE_RECIPE (RE_ID)
      REFERENCES RECIPE (RE_ID) ;


ALTER TABLE UTILIZE 
  ADD FOREIGN KEY FK_UTILIZE_INGREDIENT (IN_ID)
      REFERENCES INGREDIENT (IN_ID) ;

