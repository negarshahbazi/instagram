CREATE TABLE `like`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `post_id` INT NOT NULL
);
CREATE TABLE `comment`(
    `commentaire` VARCHAR(255) NOT NULL,
    `user_id` BIGINT NOT NULL,
    `post_id` INT NOT NULL
);
ALTER TABLE
    `comment` ADD PRIMARY KEY(`commentaire`);
CREATE TABLE `user`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pseudo` VARCHAR(255) NOT NULL,
    `like` INT NOT NULL,
    `src_avatar` VARCHAR(255) NOT NULL
);
CREATE TABLE `post`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `src_photo` VARCHAR(255) NOT NULL,
    `comment_id` INT NOT NULL,
    `like` INT NOT NULL
);
ALTER TABLE
    `comment` ADD CONSTRAINT `comment_post_id_foreign` FOREIGN KEY(`post_id`) REFERENCES `post`(`id`);
ALTER TABLE
    `comment` ADD CONSTRAINT `comment_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `like` ADD CONSTRAINT `like_post_id_foreign` FOREIGN KEY(`post_id`) REFERENCES `post`(`id`);
ALTER TABLE
    `post` ADD CONSTRAINT `post_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);