#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: poqs_eventcategory
#------------------------------------------------------------

CREATE TABLE poqs_eventcategory(
        eventcategory_id   Int  Auto_increment  NOT NULL ,
        eventcategory_name Varchar (20) NOT NULL
	,CONSTRAINT poqs_eventcategory_PK PRIMARY KEY (eventcategory_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_eventsub_category
#------------------------------------------------------------

CREATE TABLE poqs_eventsub_category(
        eventsub_category_id   Int  Auto_increment  NOT NULL ,
        eventsub_category_name Varchar (20) NOT NULL ,
        eventcategory_id       Int NOT NULL
	,CONSTRAINT poqs_eventsub_category_PK PRIMARY KEY (eventsub_category_id)

	,CONSTRAINT poqs_eventsub_category_poqs_eventcategory_FK FOREIGN KEY (eventcategory_id) REFERENCES poqs_eventcategory(eventcategory_id)
	,CONSTRAINT poqs_eventsub_category_poqs_eventcategory_AK UNIQUE (eventcategory_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_usertypes
#------------------------------------------------------------

CREATE TABLE poqs_usertypes(
        usertypes_id   Int  Auto_increment  NOT NULL ,
        usertypes_type Varchar (50) NOT NULL
	,CONSTRAINT poqs_usertypes_PK PRIMARY KEY (usertypes_id)
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
        usertypes_id    Int NOT NULL
	,CONSTRAINT poqs_users_PK PRIMARY KEY (users_id)

	,CONSTRAINT poqs_users_poqs_usertypes_FK FOREIGN KEY (usertypes_id) REFERENCES poqs_usertypes(usertypes_id)
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
# Table: poqs_showplaces
#------------------------------------------------------------

CREATE TABLE poqs_showplaces(
        showplaces_id         Int  Auto_increment  NOT NULL ,
        showplaces_name       Varchar (25) NOT NULL ,
        showplaces_postalcode Varchar (50) NOT NULL
	,CONSTRAINT poqs_showplaces_PK PRIMARY KEY (showplaces_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poqs_event
#------------------------------------------------------------

CREATE TABLE poqs_event(
        event_id             Int  Auto_increment  NOT NULL ,
        event_title          Varchar (50) NOT NULL ,
        event_date           Date NOT NULL ,
        event_time           Time NOT NULL ,
        event_picture        Varchar (90) NOT NULL ,
        event_description    Varchar (90) NOT NULL ,
        event_free           TinyINT NOT NULL ,
        users_id             Int ,
        showplaces_id        Int NOT NULL ,
        eventsub_category_id Int NOT NULL ,
        eventcategory_id     Int NOT NULL
	,CONSTRAINT poqs_event_PK PRIMARY KEY (event_id)

	,CONSTRAINT poqs_event_poqs_users_FK FOREIGN KEY (users_id) REFERENCES poqs_users(users_id)
	,CONSTRAINT poqs_event_poqs_showplaces0_FK FOREIGN KEY (showplaces_id) REFERENCES poqs_showplaces(showplaces_id)
	,CONSTRAINT poqs_event_poqs_eventsub_category1_FK FOREIGN KEY (eventsub_category_id) REFERENCES poqs_eventsub_category(eventsub_category_id)
	,CONSTRAINT poqs_event_poqs_eventcategory2_FK FOREIGN KEY (eventcategory_id) REFERENCES poqs_eventcategory(eventcategory_id)
)ENGINE=InnoDB;

