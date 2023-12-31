<?php

    // kreiranje tabela unutar baze podataka
    require_once "function.php";

    createTable('users',
        'id INT UNSIGNED AUTO_INCREMENT,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        INDEX(username(6)),
        PRIMARY KEY(id)
        '
    );

    createTable('profiles',
    'id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED UNIQUE,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gender VARCHAR(6) NOT NULL,
    language VARCHAR(50) NOT NULL,
    bio TEXT,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE NO ACTION
    '
);

createTable('friends',
    'id INT UNSIGNED AUTO_INCREMENT,
    sender_id INT UNSIGNED NOT NULL,
    receiver_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(sender_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE NO ACTION,
    FOREIGN KEY(receiver_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE NO ACTION
    '
);

createTable('messages',    
    'id INT UNSIGNED AUTO_INCREMENT,
    auth_id INT UNSIGNED NOT NULL,
    recip_id INT UNSIGNED NOT NULL,
    pm CHAR(1) NOT NULL,
    time INT UNSIGNED NOT NULL,
    message VARCHAR(4096) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(auth_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE NO ACTION,
    FOREIGN KEY(recip_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE NO ACTION'
);

