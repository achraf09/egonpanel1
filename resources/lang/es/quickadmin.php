<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'lastname' => 'Nachname',			'email' => 'Email',			'password' => 'Password',			'birthdate' => 'Geburtsdatum',			'address' => 'Addresse',			'role' => 'Role',			'remember-token' => 'Remember token',			'profilphoto' => 'Profilbild',			'group' => 'Gruppe',		],	],
		'groups' => [		'title' => 'Gruppenverwaltung',		'fields' => [			'grp-name' => 'Gruppenname',			'admin' => 'Gruppenadmin',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'contracts' => [		'title' => 'Verträge',		'fields' => [			'contractsname' => 'Vertragsname',			'end-date' => 'Das Ende des Vertrags',			'owner' => 'Vertraginhaber',		],	],
	'qa_create' => 'Crear',
	'qa_save' => 'Guardar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Ver',
	'qa_update' => 'Actualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sin valores en la tabla',
	'qa_custom_controller_index' => 'Índice del controlador personalizado (index).',
	'qa_logout' => 'Salir',
	'qa_add_new' => 'Agregar',
	'qa_are_you_sure' => 'Estás seguro?',
	'qa_back_to_list' => 'Regresar a la lista?',
	'qa_dashboard' => 'Tablero',
	'qa_delete' => 'Eliminar',
	'quickadmin_title' => 'EgonPanel',
];