// const mix = require('laravel-mix');

let mix = require('laravel-mix');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 const tailwindcss = require('tailwindcss');

 mix.js('resources/js/app.js', 'public/js')
 .sass('public/front_end_style/assets/css/dark.scss', 'public/front_end_style/assets/css')
 .sass('public/front_end_style/assets/css/style.scss', 'public/front_end_style/assets/css')
 .sass('public/front_end_style/assets/css/responsive.scss', 'public/front_end_style/assets/css')
 .sass('public/front_end_style/assets_rtl/css/dark.scss', 'public/front_end_style/assets/css')
 .sass('public/front_end_style/assets_rtl/css/style.scss', 'public/front_end_style/assets/css')
 .sass('public/front_end_style/assets_rtl/css/responsive.scss', 'public/front_end_style/assets/css')
  .options({
      processCssUrls: false,
      postCss: [tailwindcss('./tailwind.config.js')],
  });
