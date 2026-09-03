-- Run this once on an existing restaurant database so pending orders can be created.
ALTER TABLE `orders` MODIFY `senddate` DATE NULL DEFAULT NULL;
