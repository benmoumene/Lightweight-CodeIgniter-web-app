TYPE=VIEW
query=(select `sales_db`.`categorie`.`id` AS `id`,`sales_db`.`categorie`.`name` AS `name`,`sales_db`.`categorie`.`prenom` AS `prenom`,`sales_db`.`categorie`.`telephone1` AS `telephone1`,`sales_db`.`categorie`.`telephone2` AS `telephone2`,`sales_db`.`article`.`name` AS `article_name` from (`sales_db`.`categorie` left join `sales_db`.`article` on((`sales_db`.`categorie`.`id` = `sales_db`.`article`.`categorie`))))
md5=a36dff4f2c38ab87cd468a996d670961
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2018-11-28 18:21:09
create-version=1
source=(select `categorie`.`id` AS `id`,`categorie`.`name` AS `name`,`categorie`.`prenom` AS `prenom`,`categorie`.`telephone1` AS `telephone1`,`categorie`.`telephone2` AS `telephone2`,`article`.`name` AS `article_name` from (`categorie` left join `article` on((`categorie`.`id` = `article`.`categorie`))))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=(select `sales_db`.`categorie`.`id` AS `id`,`sales_db`.`categorie`.`name` AS `name`,`sales_db`.`categorie`.`prenom` AS `prenom`,`sales_db`.`categorie`.`telephone1` AS `telephone1`,`sales_db`.`categorie`.`telephone2` AS `telephone2`,`sales_db`.`article`.`name` AS `article_name` from (`sales_db`.`categorie` left join `sales_db`.`article` on((`sales_db`.`categorie`.`id` = `sales_db`.`article`.`categorie`))))
