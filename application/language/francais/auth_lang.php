<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Connexion';
$lang['login_subheading']      = 'Veuillez vous connecter avec votre email/nom d\'utilisateur et mot de passe ci-dessous.';
$lang['login_identity_label']  = 'Email/Nom d\'utilisateur:';
$lang['login_password_label']  = 'Mot de passe:';
$lang['login_remember_label']  = 'Se souvenir de moi:';
$lang['login_submit_btn']      = 'Connexion';
$lang['login_forgot_password'] = 'Mot de passe oublié?';

// Index
$lang['index_heading']           = 'Utilisateurs';
$lang['index_subheading']        = 'Ci-dessous une liste des utilisateurs.';
$lang['index_fname_th']          = 'Prénom';
$lang['index_lname_th']          = 'Nom';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groups';
$lang['index_status_th']         = 'Statut';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Actif';
$lang['index_inactive_link']     = 'Inactif';
$lang['index_create_user_link']  = 'Créer un nouvel utilisateur';
$lang['index_create_group_link'] = 'Créer un nouveau Categorie';

// Deactivate User
$lang['deactivate_heading']                  = 'Désactiver utilisateur';
$lang['deactivate_subheading']               = 'Etes-vous sûr de désactiver l\'utilisateur \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Oui:';
$lang['deactivate_confirm_n_label']          = 'Non:';
$lang['deactivate_submit_btn']               = 'Valider';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';

// Create User
$lang['create_user_heading']                           = 'Créer Utilisateur';
$lang['create_user_subheading']                        = 'Veuillez entrer les informations de l\'utilisateur ci-dessous.';
$lang['create_user_fname_label']                       = 'Prénom:';
$lang['create_user_lname_label']                       = 'Nom:';
$lang['create_user_company_label']                     = 'Compagnie:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Téléphone:';
$lang['create_user_password_label']                    = 'Mot de passe:';
$lang['create_user_password_confirm_label']            = 'Confirmer le mot de passe:';
$lang['create_user_submit_btn']                        = 'Créer utilisateur';
$lang['create_user_validation_fname_label']            = 'Prénom';
$lang['create_user_validation_lname_label']            = 'Nom';
$lang['create_user_validation_email_label']            = 'Addresse Email';
$lang['create_user_validation_phone1_label']           = 'Première partie du téléphone';
$lang['create_user_validation_phone2_label']           = 'Seconde partie du téléphone';
$lang['create_user_validation_phone3_label']           = 'Troisième partie du téléphone';
$lang['create_user_validation_company_label']          = 'Compagnie';
$lang['create_user_validation_password_label']         = 'Mot de passe';
$lang['create_user_validation_password_confirm_label'] = 'Confirmation de mot de passe';

// Edit User
$lang['edit_user_heading']                           = 'Modifier utilisateur';
$lang['edit_user_subheading']                        = 'Veuillez entrer les informations de l\'utilisateur ci-dessous.';
$lang['edit_user_fname_label']                       = 'Prénom:';
$lang['edit_user_lname_label']                       = 'Nom:';
$lang['edit_user_company_label']                     = 'Compagnie:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Téléphone:';
$lang['edit_user_password_label']                    = 'Mot de passe: (si le mot de passe change)';
$lang['edit_user_password_confirm_label']            = 'Confirmation du mot de passe: (si le mot de passe change)';
$lang['edit_user_groups_heading']                    = 'Membre de groups';
$lang['edit_user_submit_btn']                        = 'Enregistrer utilisateur';
$lang['edit_user_validation_fname_label']            = 'Prénom';
$lang['edit_user_validation_lname_label']            = 'Nom';
$lang['edit_user_validation_email_label']            = 'Addresse Email';
$lang['edit_user_validation_phone1_label']           = 'Première partie du téléphone';
$lang['edit_user_validation_phone2_label']           = 'Seconde partie du téléphone';
$lang['edit_user_validation_phone3_label']           = 'Troisième partie du téléphone';
$lang['edit_user_validation_company_label']          = 'Compagnie';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Mot de passe';
$lang['edit_user_validation_password_confirm_label'] = 'Confirmation du mot de passe';

// Create Group
$lang['create_group_title']                  = 'Créer Categorie';
$lang['create_group_heading']                = 'Créer Categorie';
$lang['create_group_subheading']             = 'Veuillez entrer les informations du Categorie ci-dessous.';
$lang['create_group_name_label']             = 'Nom du Categorie:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Créer Categorie';
$lang['create_group_validation_name_label']  = 'Nom du Categorie';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Modifier Categorie';
$lang['edit_group_saved']                  = 'Categorie Enregistré';
$lang['edit_group_heading']                = 'Modifier Categorie';
$lang['edit_group_subheading']             = 'Veuillez entrer les informations du Categorie ci-dessous.';
$lang['edit_group_name_label']             = 'Nom du Categorie:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Enregistrer Categorie';
$lang['edit_group_validation_name_label']  = 'Nom du Categorie';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Changer le mot de passe';
$lang['change_password_old_password_label']                    = 'Ancien mot de passe:';
$lang['change_password_new_password_label']                    = 'Nouveau mot de passe (au moins %s caractères):';
$lang['change_password_new_password_confirm_label']            = 'Confirmer Nouveau Mot de Passe:';
$lang['change_password_submit_btn']                            = 'Changer';
$lang['change_password_validation_old_password_label']         = 'Ancien Mot de Passe';
$lang['change_password_validation_new_password_label']         = 'Nouveau Mot de Passe';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirmer nouveau Mot de Passe';

// Forgot Password
$lang['forgot_password_heading']                 = 'Mot de passe oublié';
$lang['forgot_password_subheading']              = 'Veuillez entrer votre %s pour que nous puissions vous envoyer un email pour réinitialiser votre mot de passe.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Valider';
$lang['forgot_password_validation_email_label']  = 'Addresse Email';
$lang['forgot_password_username_identity_label'] = 'Nom d\'utilisateur';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Pas d\'enregistrement pour cette adresse email.';

// Reset Password
$lang['reset_password_heading']                               = 'Changer Mot de Passe';
$lang['reset_password_new_password_label']                    = 'Nouveau Mot de Passe (au moins %s caractères):';
$lang['reset_password_new_password_confirm_label']            = 'Confirmer Nouveau Mot de Passe:';
$lang['reset_password_submit_btn']                            = 'Changer';
$lang['reset_password_validation_new_password_label']         = 'Nouveau Mot de Passe';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirmer Nouveau Mot de Passe';
