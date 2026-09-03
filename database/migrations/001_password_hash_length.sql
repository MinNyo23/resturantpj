-- Run this once on an existing restaurant database before creating new accounts.
ALTER TABLE `user` MODIFY `password` VARCHAR(255) NOT NULL;
