# kadavulmattum-theme

WordPress theme for **[kadavulmattum.org](https://kadavulmattum.org)**, the Tamil website of the GodAlone non-profit educational project. It presents the Quran-centred message in Tamil with free tools and resources, in a fast, mobile-first design.

## Features

- Mobile-first layout with a shared bottom bar and a "More" sheet (`inc-bottombar.php`)
- Tamil learning pages: Introduction, FAQ, Is the Quran enough?, Is this for me?, Check it yourself, Mathematical Miracle, Articles, Utilities, Links
- Tools: Zakat (charity) calculator, Ramadan calculator, Salat and Ramadan timing, Calculator 19
- Media and resources: Quran, Audios, Videos, Downloads, Library (books), Picture Messages (Quran verse pictures), Coloring Book
- Contact and Legal (About / Privacy / Copyright) pages
- Plain PHP templates and one stylesheet; no page-builder dependency

## Requirements

- WordPress 6.x
- PHP 7.4 or newer

## Installation

1. Copy this folder into `wp-content/themes/`.
2. In WordPress go to **Appearance > Themes** and activate it.
3. Create pages whose slugs match the templates (for example `faq`, `contact`, `zakat-calculator`). Several templates are loaded automatically by slug through `functions.php`; others can be chosen under **Page Attributes > Template**.
4. Set the front page under **Settings > Reading**.

## Structure

- `functions.php` - setup, routing by page slug, assets
- `header.php`, `footer.php`, `front-page.php` - site shell and home page
- `page-*.php` - page templates
- `part-home-new.php` - home page sections
- `images/`, `assets/` - logos, icons and scripts

## Related projects

- [godalone-theme](https://github.com/GodAloneOSS/godalone-theme) - English site (godalone.in)
- [ekkhuda-theme](https://github.com/GodAloneOSS/ekkhuda-theme) - Hindi site (ekkhuda.org)

## License

See the `LICENSE` file.
