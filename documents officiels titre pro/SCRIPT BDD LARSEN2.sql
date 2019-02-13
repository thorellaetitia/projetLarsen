#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE LARSEN2

#------------------------------------------------------------
# Table: poqs_Eventsub_category
#------------------------------------------------------------

CREATE TABLE poqs_Eventsub_category(
        eventsub_category_id   Int  Auto_increment  NOT NULL ,
        eventsub_category_name Varchar (20) NOT NULL
	,CONSTRAINT poqs_Eventsub_category_PK PRIMARY KEY (eventsub_category_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_Eventcategory
#------------------------------------------------------------

CREATE TABLE poqs_Eventcategory(
        eventcategory_id     Int  Auto_increment  NOT NULL ,
        eventcategory_name   Varchar (20) NOT NULL ,
        eventsub_category_id Int
	,CONSTRAINT poqs_Eventcategory_PK PRIMARY KEY (eventcategory_id)

	,CONSTRAINT poqs_Eventcategory_poqs_Eventsub_category_FK FOREIGN KEY (eventsub_category_id) REFERENCES poqs_Eventsub_category(eventsub_category_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_postalcode
#------------------------------------------------------------

CREATE TABLE poqs_postalcode(
        postalcode_id          Int  Auto_increment  NOT NULL ,
        postalcode_postal_code Varchar (20) NOT NULL
	,CONSTRAINT poqs_postalcode_PK PRIMARY KEY (postalcode_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_userTypes
#------------------------------------------------------------

CREATE TABLE poqs_userTypes(
        usertype_id   Int  Auto_increment  NOT NULL ,
        user_usertype Varchar (20) NOT NULL
	,CONSTRAINT poqs_userTypes_PK PRIMARY KEY (usertype_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_users
#------------------------------------------------------------

CREATE TABLE poqs_users(
        users_id        Int  Auto_increment  NOT NULL ,
        users_name      Varchar (25) NOT NULL ,
        users_firstname Varchar (25) NOT NULL ,
        users_mail      Varchar (25) NOT NULL ,
        users_age       Int NOT NULL ,
        users_login     Varchar (20) NOT NULL ,
        users_password  Varchar (100) NOT NULL ,
        users_admin     Bool NOT NULL ,
        usertype_id     Int NOT NULL
	,CONSTRAINT poqs_users_PK PRIMARY KEY (users_id)

	,CONSTRAINT poqs_users_poqs_userTypes_FK FOREIGN KEY (usertype_id) REFERENCES poqs_userTypes(usertype_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_usersopinion
#------------------------------------------------------------

CREATE TABLE poqs_usersopinion(
        usersopinion_id      Int  Auto_increment  NOT NULL ,
        usersopinion_opinion Varchar (150) NOT NULL ,
        users_id             Int NOT NULL
	,CONSTRAINT poqs_usersopinion_PK PRIMARY KEY (usersopinion_id)

	,CONSTRAINT poqs_usersopinion_poqs_users_FK FOREIGN KEY (users_id) REFERENCES poqs_users(users_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_useralerts
#------------------------------------------------------------

CREATE TABLE poqs_useralerts(
        useralerts_id   Int  Auto_increment  NOT NULL ,
        useralerts_name Varchar (20) NOT NULL ,
        users_id        Int NOT NULL
	,CONSTRAINT poqs_useralerts_PK PRIMARY KEY (useralerts_id)

	,CONSTRAINT poqs_useralerts_poqs_users_FK FOREIGN KEY (users_id) REFERENCES poqs_users(users_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_Showplaces
#------------------------------------------------------------

CREATE TABLE poqs_Showplaces(
        showplaces_id    Int  Auto_increment  NOT NULL ,
        showplaces_place Varchar (25) NOT NULL
	,CONSTRAINT poqs_Showplaces_PK PRIMARY KEY (showplaces_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_event
#------------------------------------------------------------

CREATE TABLE poqs_event(
        event_id          Int  Auto_increment  NOT NULL ,
        event_title       Varchar (50) NOT NULL ,
        event_date        Date NOT NULL ,
        event_time        Time NOT NULL ,
        event_picture     Varchar (90) NOT NULL ,
        event_description Varchar (90) NOT NULL ,
        users_id          Int ,
        eventcategory_id  Int NOT NULL ,
        postalcode_id     Int NOT NULL ,
        showplaces_id     Int NOT NULL
	,CONSTRAINT poqs_event_PK PRIMARY KEY (event_id)

	,CONSTRAINT poqs_event_poqs_users_FK FOREIGN KEY (users_id) REFERENCES poqs_users(users_id)
	,CONSTRAINT poqs_event_poqs_Eventcategory0_FK FOREIGN KEY (eventcategory_id) REFERENCES poqs_Eventcategory(eventcategory_id)
	,CONSTRAINT poqs_event_poqs_postalcode1_FK FOREIGN KEY (postalcode_id) REFERENCES poqs_postalcode(postalcode_id)
	,CONSTRAINT poqs_event_poqs_Showplaces2_FK FOREIGN KEY (showplaces_id) REFERENCES poqs_Showplaces(showplaces_id)
)ENGINE=InnoDB;

