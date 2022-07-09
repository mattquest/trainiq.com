const mix = require("laravel-mix");

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

mix
  .ts("resources/js/app.js", "public/js")
  .react()
  .webpackConfig({
    devServer: {
      host: "0.0.0.0",
      port: 8080,
    },
  })
  .postCss("resources/css/app.css", "public/css", [
    require("postcss-import"),
    require("tailwindcss"),
    require("autoprefixer"),
  ])
  .alias({
    "@": "resources/js",
  });

// mix.options({
//     hmrOptions: {
//         host: 'localhost',
//         port: '80'
//     },
// });

// mix.browserSync({
//     host: '127.0.0.1',
//     proxy: 'laravel.test',
//     port: 3000,
//     open: false,
//     files: [
//         'app/**/*.php',
//         'resources/views/**/*.php',
//         'packages/mixdinternet/frontend/src/**/*.php',
//         'public/js/**/*.js',
//         'public/css/**/*.css'
//     ],
//     watchOptions: {
//         usePolling: true,
//         interval: 500
//     }
// });

if (mix.inProduction()) {
  mix.version();
}
