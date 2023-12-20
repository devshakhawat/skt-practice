const mix   = require('laravel-mix');
const wpPot = require('wp-pot');

mix.options({
    autoprefixer: {
        remove: false
    },
    processCssUrls: false
});

mix.webpackConfig({
	target: 'web',
	externals: {
		jquery: "window.jQuery",
		$: "window.jQuery",
		wp: 'window.wp',
		React: 'window.React',
		_practices_data: 'window._practices_data'
	}
});

// Disable notification on dev mode
if ( process.env.NODE_ENV.trim() !== 'production' ) mix.disableNotifications();

// JS
mix.scripts('./dev/js/data-form.js', './assets/js/data-form.min.js');

// CSS
mix.sass('./dev/css/data-form.scss', './assets/css/data-form.min.css');


if ( process.env.NODE_ENV.trim() === 'production' ) {
	// Language pot file generator
	wpPot({
		destFile: 'languages/gs-practice.pot',
		domain: 'gs-practice',
		package: 'Practice',
		src: ['**/*.php']
	});
}