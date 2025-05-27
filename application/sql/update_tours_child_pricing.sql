-- Add new columns for child pricing to tbl_tours
ALTER TABLE `tbl_tours` 
ADD COLUMN `price_child_with_bed` FLOAT NOT NULL DEFAULT 0 AFTER `price`,
ADD COLUMN `price_child_without_bed` FLOAT NOT NULL DEFAULT 0 AFTER `price_child_with_bed`;

ALTER TABLE `tbl_booknow`
ADD COLUMN `children_withbed` INT DEFAULT 0 COMMENT 'Number of children with bed (age 2<12 years)';