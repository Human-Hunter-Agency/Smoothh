const defaultTheme = require('tailwindcss/defaultTheme');

// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	experimental: {
		optimizeUniversalDefaults: true,
	},
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
	],
	theme: {
		// Extend the default Tailwind theme.
		container: {
			center: true,
			padding: {
				DEFAULT: '1.25rem',
				lg: '2rem',
				xl: '4rem',
				'2xl': '6rem',
				'3xl': '10rem',
			},
		},
		extend: {
			fontFamily: {
				sans: ['Raleway', ...defaultTheme.fontFamily.sans],
			},
			fontSize: {
				xl: '1.375rem',
				'5xl': ['2.625rem', '2.625rem'],
			},
			screens: {
				lg: '1180px',
				xl: '1380px',
				'2xl': '1680px',
				'3xl': '1920px',
			},
			backgroundSize: {
				'size-200': '200% 200%',
			},
			backgroundPosition: {
				'pos-0': '0% 0%',
				'pos-100': '100% 100%',
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
	],
};
