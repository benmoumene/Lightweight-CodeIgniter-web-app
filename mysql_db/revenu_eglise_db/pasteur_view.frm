TYPE=VIEW
query=(select `vente_eglise_db`.`categorie`.`id` AS `id`,`vente_eglise_db`.`categorie`.`name` AS `name`,`vente_eglise_db`.`categorie`.`prenom` AS `prenom`,`vente_eglise_db`.`categorie`.`telephone1` AS `telephone1`,`vente_eglise_db`.`categorie`.`telephone2` AS `telephone2`,`vente_eglise_db`.`article`.`name` AS `article_name` from (`vente_eglise_db`.`categorie` left join `vente_eglise_db`.`article` on((`vente_eglise_db`.`categorie`.`id` = `vente_eglise_db`.`article`.`categorie`))))
md5=0d26a8764bde493f65a42316289f01f6
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2010-01-01 02:38:04
create-version=1
source=(select `vente_eglise_db`.`categorie`.`id` AS `id`,`vente_eglise_db`.`categorie`.`name` AS `name`,`vente_eglise_db`.`categorie`.`prenom` AS `prenom`,`vente_eglise_db`.`categorie`.`telephone1` AS `telephone1`,`vente_eglise_db`.`categorie`.`telephone2` AS `telephone2`,`vente_eglise_db`.`article`.`name` AS `article_name` from (`vente_eglise_db`.`categorie` left join `vente_eglise_db`.`article` on((`vente_eglise_db`.`categorie`.`id` = `vente_eglise_db`.`article`.`categorie`))))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=(select `vente_eglise_db`.`categorie`.`id` AS `id`,`vente_eglise_db`.`categorie`.`name` AS `name`,`vente_eglise_db`.`categorie`.`prenom` AS `prenom`,`vente_eglise_db`.`categorie`.`telephone1` AS `telephone1`,`vente_eglise_db`.`categorie`.`telephone2` AS `telephone2`,`vente_eglise_db`.`article`.`name` AS `article_name` from (`vente_eglise_db`.`categorie` left join `vente_eglise_db`.`article` on((`vente_eglise_db`.`categorie`.`id` = `vente_eglise_db`.`article`.`categorie`))))
