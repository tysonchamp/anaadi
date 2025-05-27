-- Add new columns for child pricing to tbl_tours
ALTER TABLE `tbl_tours` 
ADD COLUMN `price_child_with_bed` FLOAT NOT NULL DEFAULT 0 AFTER `price`,
ADD COLUMN `price_child_without_bed` FLOAT NOT NULL DEFAULT 0 AFTER `price_child_with_bed`;
