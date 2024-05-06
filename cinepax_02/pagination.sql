SELECT colonne1, colonne2, ...
FROM votre_table
ORDER BY colonne_ordre
LIMIT nombre_de_lignes_par_page OFFSET (numero_de_page - 1) * nombre_de_lignes_par_page;



select
numseance,
nom_salle,
nom_film,
categorie_film,
dates,
heure
from v_getseance
limit 5 OFFSET (1-1) * 2;
