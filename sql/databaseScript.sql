CREATE TABLE admin (
    admin_id INTEGER PRIMARY KEY AUTOINCREMENT,
    admin_name VARCHAR(200) NOT NULL,
    admin_password VARCHAR(255) NOT NULL
);

CREATE TABLE course(
    course_id INTEGER PRIMARY KEY AUTOINCREMENT,
    course_name VARCHAR(255) NOT NULL ,
    course_text VARCHAR(2000) NOT NULL,
    course_difficulty INT NOT NULL

);


INSERT INTO admin (admin_id,admin_name, admin_password) VALUES (1,'admin', 'admin');
INSERT INTO course (course_id,course_name,course_text,course_difficulty) VALUES (1,'Test course','This is a simple text to train ' ||
                                         'fast typing on keyboard ' ||
                                         'goodluck mate',1);

