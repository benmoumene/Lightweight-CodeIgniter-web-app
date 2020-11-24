TYPE=VIEW
query=(select `vente_eglise_db`.`article`.`id` AS `id`,`vente_eglise_db`.`article`.`no_cpte` AS `no_cpte`,`vente_eglise_db`.`article`.`name` AS `name`,`vente_eglise_db`.`article`.`code` AS `code`,`vente_eglise_db`.`Categorie`.`name` AS `Categorie_name`,`vente_eglise_db`.`categorie`.`name` AS `categorie_name` from ((`vente_eglise_db`.`article` join `vente_eglise_db`.`Categorie` on((`vente_eglise_db`.`article`.`Categorie` = `vente_eglise_db`.`Categorie`.`id`))) join `vente_eglise_db`.`categorie` on((`vente_eglise_db`.`article`.`categorie` = `vente_eglise_db`.`categorie`.`id`))))
md5=71be7081185d1a938d6980f9d0967185
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2018-11-24 18:51:29
create-version=1
source=(select `article`.`id` AS `id`,`article`.`no_cpte` AS `no_cpte`, `article`.`name` AS `name`,`article`.`code` AS `code`,`Categorie`.`name` AS `Categorie_name`,`categorie`.`name` AS `categorie_name` from ((`article` join `Categorie` on((`article`.`Categorie` = `Categorie`.`id`))) join `categorie` on((`article`.`categorie` = `categorie`.`id`))))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=(select `vente_eglise_db`.`article`.`id` AS `id`,`vente_eglise_db`.`article`.`no_cpte` AS `no_cpte`,`vente_eglise_db`.`article`.`name` AS `name`,`vente_eglise_db`.`article`.`code` AS `code`,`vente_eglise_db`.`Categorie`.`name` AS `Categorie_name`,`vente_eglise_db`.`categorie`.`name` AS `categorie_name` from ((`vente_eglise_db`.`article` join `vente_eglise_db`.`Categorie` on((`vente_eglise_db`.`article`.`Categorie` = `vente_eglise_db`.`Categorie`.`id`))) join `vente_eglise_db`.`categorie` on((`vente_eglise_db`.`article`.`categorie` = `vente_eglise_db`.`categorie`.`id`))))
