INSERT INTO `SOP`.`configs`(`id`, `key`, `value`, `created_at`, `updated_at`) VALUES (67, 'layout_5', '{\"sponsors\":{\"title\":\"Sponsors\",\"status\":1},\"popular_courses\":{\"title\":\"Popular Courses\",\"status\":1},\"search_section\":{\"title\":\"Search Section\",\"status\":1},\"latest_news\":{\"title\":\"Latest News, Courses\",\"status\":1},\"featured_courses\":{\"title\":\"Featured Courses\",\"status\":1},\"faq\":{\"title\":\"Frequently Asked Questions\",\"status\":1},\"course_by_category\":{\"title\":\"Course By Category\",\"status\":1},\"testimonial\":{\"title\":\"Testimonial\",\"status\":1},\"teachers\":{\"title\":\"Teachers\",\"status\":1},\"contact_us\":{\"title\":\"Contact us / Get in Touch\",\"status\":1}}', '2020-08-21 09:04:01', '2020-10-09 13:40:00');
UPDATE `SOP`.`configs` set `value` = 5 where `key` = 'theme_layout';

-- RUN iF NEED
!
UPDATE `SOP`.`admin_menu_items` SET `label` = 'Article & Videos', `link` = 'blog', `parent` = 1, `sort` = 5, `class` = NULL, `menu` = 1, `depth` = 0, `created_at` = '2020-08-21 09:04:01', `updated_at` = '2020-10-10 08:59:22' WHERE `id` = 1;
UPDATE `SOP`.`admin_menu_items` SET `label` = 'Courses & Events', `link` = '', `parent` = 2, `sort` = 0, `class` = NULL, `menu` = 1, `depth` = 0, `created_at` = '2020-08-21 09:04:01', `updated_at` = '2020-10-10 08:58:42' WHERE `id` = 2;
UPDATE `SOP`.`admin_menu_items` SET `label` = 'Forums', `link` = 'forums', `parent` = 4, `sort` = 2, `class` = NULL, `menu` = 1, `depth` = 0, `created_at` = '2020-08-21 09:04:01', `updated_at` = '2020-10-10 08:59:22' WHERE `id` = 4;
UPDATE `SOP`.`admin_menu_items` SET `label` = 'Contact', `link` = 'contact', `parent` = 5, `sort` = 4, `class` = NULL, `menu` = 1, `depth` = 0, `created_at` = '2020-08-21 09:04:01', `updated_at` = '2020-10-10 08:59:36' WHERE `id` = 5;
UPDATE `SOP`.`admin_menu_items` SET `label` = 'About Us', `link` = 'about-us', `parent` = 6, `sort` = 3, `class` = NULL, `menu` = 1, `depth` = 0, `created_at` = '2020-08-21 09:04:01', `updated_at` = '2020-10-10 08:59:36' WHERE `id` = 6;
UPDATE `SOP`.`admin_menu_items` SET `label` = 'Courses', `link` = 'courses', `parent` = 2, `sort` = 1, `class` = NULL, `menu` = 1, `depth` = 1, `created_at` = '2020-10-10 08:57:10', `updated_at` = '2020-10-10 08:59:22' WHERE `id` = 7;