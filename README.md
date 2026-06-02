# OMWEBSITE

Public WordPress theme for Outpost Media.

The staff portal application is intentionally not part of this WordPress codebase. It should live separately on a protected subdomain, such as `staff.outpostmedia.uk`. This repository contains only the public-facing WordPress theme and a simple staff launchpad page template.

## Theme-only deployment

WordPress is expected to already be installed on the VPS. Deploy only the `outpost-media/` directory to the live WordPress themes directory:

```text
wp-content/themes/outpost-media
```

After deploying, activate **Outpost Media** in WordPress under **Appearance → Themes**.

## Initial WordPress setup

1. Create or confirm the following pages:
   - `Home`
   - `About`
   - `Staff Portal`
2. In **Settings → Reading**, set `Home` as the homepage if using a static front page.
3. Assign the `About Outpost Media` template to the About page.
4. Assign the `Staff Portal Launchpad` template to the Staff Portal page and protect it with WordPress password protection or server-level access rules.
5. Create core categories such as `News`, `Analysis`, `Dispatches`, `Opinion`, `Policy`, and `Documentary`.
6. Create and assign menus under **Appearance → Menus** for the `Primary Menu` and `Footer Menu` locations.
7. Add posts with titles, excerpts/standfirsts, featured images, authors, dates, categories, and optional sources.

## Theme structure

The theme lives in `outpost-media/` and includes:

- Homepage: `front-page.php`
- Article/single post: `single.php`
- Category/archive listings: `category.php` and `archive.php`
- Search results: `search.php`
- Author archive: `author.php`
- Not found page: `404.php`
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

## Pre-launch checklist

- Confirm HTTPS and canonical domain redirects on the VPS.
- Activate the theme and verify homepage, article, category, search, author, About, 404, and Staff Portal pages.
- Upload licensed Dharma Gothic webfont files if they are available and permitted for web use.
- Configure an SEO plugin for titles, canonical URLs, XML sitemap, and Open Graph/Twitter card metadata.
- Add a backup schedule for the database and `wp-content/uploads`.
- Confirm the real staff application is hosted separately at `staff.outpostmedia.uk` or another protected subdomain.
