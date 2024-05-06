BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "usuarios" (
	"id"	INTEGER,
	"nombre"	TEXT,
	"apellido"	TEXT,
	"edad"	INTEGER,
	"correo"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
COMMIT;
