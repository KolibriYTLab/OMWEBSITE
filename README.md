# OMWEBSITE

Public WordPress theme for Outpost Media.

The staff portal is intentionally not part of this WordPress codebase. It should live separately on a protected subdomain, such as `staff.outpostmedia.uk`. This repository contains only the public-facing WordPress theme.

## Theme

The theme lives in `outpost-media/` and is designed to be copied or deployed to `wp-content/themes/outpost-media`.

Initial templates include:

- Homepage: `front-page.php`
- Article/single post: `single.php`
- Category/archive listings: `category.php` and `archive.php`
- Standard pages: `page.php`
- Staff launchpad page template: `page-staff-portal.php`
- Shared header/footer and template parts

## Editorial data model

The theme uses native WordPress posts, categories, authors, dates, excerpts, and featured images. Article sources can be added with a custom field named `article_sources`, with one source per line.
