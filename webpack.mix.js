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

// Public
// mix.sass('./dev/public/index.scss', './assets/css/public.min.css');
// mix.scripts('./dev/public/index.js', './assets/js/public.min.js');

// // Admin
// mix.sass('./dev/admin/index.scss', './assets/admin/css/admin.min.css');
// mix.sass('./dev/admin/single-prod-item.scss', './assets/admin/css/single-prod-item-admin.min.css');
// mix.js('./dev/admin/index.js', './assets/admin/js/admin.min.js').vue();


if ( process.env.NODE_ENV.trim() === 'production' ) {
	// Language pot file generator
	wpPot({
		destFile: 'languages/gs-practice.pot',
		domain: 'gs-practice',
		package: 'Practice',
		src: ['**/*.php', '!freemius/**/*.php']
	});
}