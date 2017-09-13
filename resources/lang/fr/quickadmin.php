<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'lastname' => 'Nachname',			'email' => 'Email',			'password' => 'Password',			'birthdate' => 'Geburtsdatum',			'address' => 'Addresse',			'role' => 'Role',			'remember-token' => 'Remember token',			'profilphoto' => 'Profilbild',			'group' => 'Gruppe',		],	],
		'groups' => [		'title' => 'Gruppenverwaltung',		'fields' => [			'grp-name' => 'Gruppenname',			'admin' => 'Gruppenadmin',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'contracts' => [		'title' => 'Verträge',		'fields' => [			'contractsname' => 'Vertragsname',			'end-date' => 'Das Ende des Vertrags',			'owner' => 'Vertraginhaber',		],	],
	'qa_create' => 'Créer',
	'qa_save' => 'Sauver',
	'qa_edit' => 'Modifier',
	'qa_restore' => 'Restaurer',
	'qa_permadel' => 'Supprimer définitivement',
	'qa_all' => 'Tous',
	'qa_trash' => 'Poubelle',
	'qa_view' => 'Voir',
	'qa_update' => 'Mettre à jour',
	'qa_list' => 'Liste',
	'qa_logout' => 'Déconnexion',
	'qa_add_new' => 'Nouveau',
	'qa_are_you_sure' => 'Êtes-vous certain ?',
	'qa_back_to_list' => 'Retour à la liste',
	'qa_dashboard' => 'Tableau de bord',
	'qa_delete' => 'Supprimer',
	'qa_delete_selected' => 'Supprimer sélectionnés',
	'qa_category' => 'Catégorie',
	'qa_categories' => 'Catégories',
	'qa_please_select' => 'Slectionner',
	'quickadmin_title' => 'EgonPanel',
];