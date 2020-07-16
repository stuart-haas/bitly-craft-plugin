let mix = require('laravel-mix'),
path = require('path')

mix.setPublicPath('./src/assetbundles/bitly/dist')
    .js('src/assetbundles/bitly/src/js/bitly.js', 'src/assetbundles/bitly/dist/js')
    .sass('src/assetbundles/bitly/src/css/bitly.scss', 'src/assetbundles/bitly/dist/css')
    .sourceMaps()
    .browserSync({
        proxy: 'craft.test', 
        files: [
            './src/templates/**/*.twig',
            './src/assetbundles/bitly/dist/css/**/*.css',
            './src/assetbundles/bitly/dist/js/**/*.js',
        ],
    })
    .version()