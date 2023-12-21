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
mix.js('./dev/js/data-form.js', './assets/js/data-form.min.js');

// Guntenberg
mix.js('./includes/integrations/assets/gutenberg-data/gutenberg-data-widget.js', './includes/integrations/assets/gutenberg-data/gutenberg-data-widget.min.js');
mix.js('./includes/integrations/assets/gutenberg-form/gutenberg-form-widget.js', './includes/integrations/assets/gutenberg-form/gutenberg-form-widget.min.js');


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