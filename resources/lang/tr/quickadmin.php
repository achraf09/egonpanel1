<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'lastname' => 'Nachname',			'email' => 'Email',			'password' => 'Password',			'birthdate' => 'Geburtsdatum',			'address' => 'Addresse',			'role' => 'Role',			'remember-token' => 'Remember token',			'profilphoto' => 'Profilbild',			'group' => 'Gruppe',		],	],
		'groups' => [		'title' => 'Gruppenverwaltung',		'fields' => [			'grp-name' => 'Gruppenname',			'admin' => 'Gruppenadmin',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'contracts' => [		'title' => 'Verträge',		'fields' => [			'contractsname' => 'Vertragsname',			'end-date' => 'Das Ende des Vertrags',			'owner' => 'Vertraginhaber',		],	],
	'qa_create' => 'Oluştur',
	'qa_save' => 'Kaydet',
	'qa_edit' => 'Düzenle',
	'qa_view' => 'Görüntüle',
	'qa_update' => 'Güncelle',
	'qa_list' => 'Listele',
	'qa_no_entries_in_table' => 'Tabloda kayıt bulunamadı',
	'qa_custom_controller_index' => 'Özel denetçi dizini.',
	'qa_logout' => 'Çıkış yap',
	'qa_add_new' => 'Yeni ekle',
	'qa_are_you_sure' => 'Emin misiniz?',
	'qa_back_to_list' => 'Listeye dön',
	'qa_dashboard' => 'Kontrol Paneli',
	'qa_delete' => 'Sil',
	'quickadmin_title' => 'EgonPanel',
];