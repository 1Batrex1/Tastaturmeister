CREATE TABLE admin (
    admin_id PRIMARY KEY AUTOINCREMENT,
    admin_name VARCHAR(200) NOT NULL,
    admin_password VARCHAR(255) NOT NULL
);

CREATE TABLE course(
    course_id PRIMARY KEY AUTOINCREMENT,
    course_text VARCHAR(2000) NOT NULL
);


INSERT INTO admin (admin_id,admin_name, admin_password) VALUES (1,'admin', 'admin');
INSERT INTO course (course_text) VALUES ('This is a simple text to train ' ||
                                         'fast typing on keyboard ' ||
                                         'goodluck mate');

