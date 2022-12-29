create table t_billet(
	BIL_ID int primary key auto_increment,
	BIL_DATE  datetime default current_timestamp(),
	BIL_TITRE  varchar(25),
	BIL_CONTENU  varchar(255)
);
create table t_commentaire(
	COM_ID  int primary key auto_increment,
	COM_DATE  datetime default current_timestamp(),
	COM_AUTEUR  varchar(25),
	COM_CONTENU  varchar(255),
	BIL_ID  int ,
    FOREIGN KEY (BIL_ID) REFERENCES t_billet(BIL_ID)
);
INSERT INTO t_billet (BIL_TITRE,BIL_CONTENU) VALUES
    ("Premier billet", "Bon jour monde ! xeci le premierbillet sur mon blog"),
    ("Au travial", "Il faut enricher ce blog dès maintenaut");

INSERT INTO t_commentaire (COM_AUTEUR,COM_CONTENU,BIL_ID) VALUES
    ("A . anonyme", "bravo pour cr debut",1),
    ("Moi", "Merci! je veux continuer ",1);
