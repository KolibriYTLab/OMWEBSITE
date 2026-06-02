# OMWEBSITE

Public WordPress theme for Outpost Media.

The staff portal application is intentionally not part of this WordPress codebase. It should live separately on a protected subdomain, such as `staff.outpostmedia.uk`. This repository contains only the public-facing WordPress theme and a simple staff launchpad page template.

## Theme

The theme lives in `outpost-media/` and is designed to be copied or deployed to `wp-content/themes/outpost-media`.

Initial templates include:

- Homepage: `front-page.php`
- Article/single post: `single.php`
- Category/archive listings: `category.php` and `archive.php`
- About page template: `page-about.php`
- Standard pages: `page.php`
- Staff launchpad page template: `page-staff-portal.php`
- Shared header/footer and template parts

## Editorial data model

The theme uses native WordPress posts, categories, authors, dates, excerpts, and featured images. Article sources can be added with a custom field named `article_sources`, with one source per line.

## Design reference

`Website and Branding Redesign.make` is retained as the Figma Make design reference. The WordPress theme should use it for visual direction only, not as production application code.

Brand direction reflected in the theme:

- Crimson and cream editorial palette.
- Endless knot logo mark.
- Dharma Gothic-style condensed display typography for mastheads and headlines, with safe system fallbacks until licensed webfont files are supplied.
- Clean WordPress-native publishing templates for the public website.
