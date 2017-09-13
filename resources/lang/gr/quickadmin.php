<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'lastname' => 'Nachname',			'email' => 'Email',			'password' => 'Password',			'birthdate' => 'Geburtsdatum',			'address' => 'Addresse',			'role' => 'Role',			'remember-token' => 'Remember token',			'profilphoto' => 'Profilbild',			'group' => 'Gruppe',		],	],
		'groups' => [		'title' => 'Gruppenverwaltung',		'fields' => [			'grp-name' => 'Gruppenname',			'admin' => 'Gruppenadmin',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'contracts' => [		'title' => 'Verträge',		'fields' => [			'contractsname' => 'Vertragsname',			'end-date' => 'Das Ende des Vertrags',			'owner' => 'Vertraginhaber',		],	],
	'qa_create' => 'Δημιουργία',
	'qa_save' => 'Αποθήκευση',
	'qa_edit' => 'Επεξεργασία',
	'qa_view' => 'Εμφάνιση',
	'qa_update' => 'Ενημέρωησ',
	'qa_list' => 'Λίστα',
	'qa_no_entries_in_table' => 'Δεν υπάρχουν δεδομένα στην ταμπέλα',
	'qa_custom_controller_index' => 'index προσαρμοσμένου controller.',
	'qa_logout' => 'Αποσύνδεση',
	'qa_add_new' => 'Προσθήκη νέου',
	'qa_are_you_sure' => 'Είστε σίγουροι;',
	'qa_back_to_list' => 'Επιστροφή στην λίστα',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Διαγραφή',
	'quickadmin_title' => 'EgonPanel',
];