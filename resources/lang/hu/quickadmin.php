<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'lastname' => 'Nachname',			'email' => 'Email',			'password' => 'Password',			'birthdate' => 'Geburtsdatum',			'address' => 'Addresse',			'role' => 'Role',			'remember-token' => 'Remember token',			'profilphoto' => 'Profilbild',			'group' => 'Gruppe',		],	],
		'groups' => [		'title' => 'Gruppenverwaltung',		'fields' => [			'grp-name' => 'Gruppenname',			'admin' => 'Gruppenadmin',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'contracts' => [		'title' => 'Verträge',		'fields' => [			'contractsname' => 'Vertragsname',			'end-date' => 'Das Ende des Vertrags',			'owner' => 'Vertraginhaber',		],	],
	'qa_create' => 'Létrehozás',
	'qa_save' => 'Mentés',
	'qa_edit' => 'Szerkesztés',
	'qa_view' => 'Megtekintés',
	'qa_update' => 'Frissítés',
	'qa_list' => 'Lista',
	'qa_no_entries_in_table' => 'Nincs bejegyzés a táblában',
	'qa_logout' => 'Kijelentkezés',
	'qa_add_new' => 'Új hozzáadása',
	'qa_are_you_sure' => 'Biztosan így legyen?',
	'qa_back_to_list' => 'Vissza a listához',
	'qa_dashboard' => 'Vezérlőpult',
	'qa_delete' => 'Törlés',
	'qa_custom_controller_index' => 'Egyedi vezérlő index.',
	'quickadmin_title' => 'EgonPanel',
];