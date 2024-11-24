const path = require('path');

const fs                   = require('fs');
const ESLintWebpackPlugin  = require('eslint-webpack-plugin');
const TerserPlugin         = require('terser-webpack-plugin');
const CssMinimizerPlugin   = require('css-minimizer-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { PurgeCSSPlugin }   = require('purgecss-webpack-plugin');
const glob                 = require('glob');

module.exports = ( env, argv ) => {
	const isProduction = argv.mode === 'production';

	function checkPathExistence (paths) {
		const $return = paths.filter(p => fs.existsSync(p));
		return $return;
	}

	let allPaths;
	if ( isProduction ) {
		const pathsToCheck = [
			...glob.sync(path.posix.join(path.resolve(__dirname).replace(/\\/g, '/'), '*.php')),
			...glob.sync(path.posix.join(path.resolve(__dirname).replace(/\\/g, '/'), 'page-templates/**/*.php')),
			...glob.sync(path.posix.join(path.resolve(__dirname).replace(/\\/g, '/'), 'template-parts/**/*.php')),
			...glob.sync(path.posix.join(path.resolve(__dirname).replace(/\\/g, '/'), 'inc/**/*.php')),
			...glob.sync(path.posix.join(path.resolve(__dirname).replace(/\\/g, '/'), 'assets/**/*.js')),
		];

		allPaths = pathsToCheck.flat();
	}

	return {
		entry: getEntries(
			[ path.resolve(__dirname, 'assets') ],
			[ '.js', '.scss' ]
		),
		output: {
			filename: '[name].bundle.js',
			chunkFilename: 'assets/js/module/[name].bundle.js',
			path: path.resolve(__dirname, 'dist'),
			clean: true,
		},
		module: {
			rules: [
				{
					test: /\.js$/,
					exclude: /(node_modules|vendor)/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: [ '@babel/preset-env' ],
						},
					},
				},
				{
					test: /\.scss$/,
					use: [
						MiniCssExtractPlugin.loader,
						'css-loader',
						'sass-loader'
					],
				},
				{
					test: /\.css$/,
					use: [
						MiniCssExtractPlugin.loader,
						'css-loader'
					],
				},
				{
					test: /\.(woff|woff2|eot|ttf|otf)$/,
					type: 'asset/resource',
					generator: {
						filename: 'fontello-icon-font-v1-4/[name][ext]',
					},
				},
			],
		},
		optimization: {
			minimize: true,
			minimizer: [
				new TerserPlugin({
					extractComments: false,
					terserOptions: {
						warnings: false,
						parse: {},
						compress: {
							drop_console: true,
						},
						mangle: true,
						module: false,
						output: {
							comments: false,
							beautify: false,
						},
					},
				}),
				new CssMinimizerPlugin(),
			],
		},
		mode: argv.mode,
		resolve: {
			modules: [
				path.resolve(__dirname, 'assets'),
				'node_modules',
			],
			extensions: [ '.js', '.scss', '.css' ],
		},
		externals: {
			jquery: 'jQuery',
		},
		plugins: [
			new MiniCssExtractPlugin({
				filename: '[name].bundle.css',
			}),
			new ESLintWebpackPlugin(),
			...( isProduction ? [ new PurgeCSSPlugin({
				paths: checkPathExistence(allPaths),
				safelist: {
					standard: [ /^is/ ],
					greedy: [ /^call-to-action-/, /^wp-/, /^acf-/, /^page-/, /^awm-/, /^section-/, /^wpcf7/, /^contact-/, /^col-sm-/, /^icon-/, /^show/, /^fa/, /^blurred-body/, /^our-pricing/, /^d-/, /^popup/, /^next/, /^prev/, /^think-about/, /^sticky/, /^color-bg-blue/, /^paragraph-with-before-border/, /^pricing-content__subtitle/, /^single-blog-cta-one-blue/, /^single-blog-cta-two-black/, /^rank-math-breadcrumb/, /^h4/, /^woocommerce/, /^strong/, /^color-blue/ ],
					// greedy: [ /^wp/, /^acf/, /^custom/, /^icon/, /^page/, /^home/, /^footer/, /^header/, /^sidebar/, /^fa/, /^menu/, /^about/, /^testimonial/, /^section/, /^contact/, /^close/, /^show/, /^faq/, /^awm/, /^improvement/, /^our/, /^wpcf7/, /^col-/ ],
				},
			} ) ] : [] ),
		],
	}
};

function getEntries (directories, extensions) {
	const entry              = { js: {}, css: {} };
	const excludeDirectories = [ 'inc', 'css/layout', 'css/components', 'css/core', 'css/library' ];
	const excludeFiles       = [ 'util' ];
	directories.forEach((directory) => {
		extensions.forEach((extension) => {
			const directoryPath = path.posix.join(directory.replace(/\\/g, '/'), `**/*${extension}`);
			const files         = glob.sync(directoryPath);

			if ('.scss' === extension) {
				// glob.sync(path.posix.join(path.resolve(__dirname, 'assets/css/library').replace(/\\/g, '/'), '**/*.css')).forEach((cssFile) => {
				// 	files.push(cssFile);
				// });
				files.push(path.resolve(__dirname, 'assets/font/fontello/css/fontello.css'));
			}
			// wp-content\themes\active-website-management-theme\assets\font\fontello\css\fontello.css
			files.forEach((file) => {
				const relativePath = path.relative(directory, file);
				const entryName    = path.join(path.basename(directory), relativePath.replace(new RegExp(`${ extension }|\\.css$`, 'g'), ''));

				if (excludeFiles.some(excludFile => entryName.replace(/\\/g, '/').includes(excludFile))) {
					return; // Exclude file
				}

				const dirName = path.dirname(relativePath);
				if (excludeDirectories.some(excludeDir => dirName.replace(/\\/g, '/').startsWith(excludeDir))) {
					return; // Exclude directory
				}

				if (extension === '.js') {
					entry.js[ entryName ] = file;
				} else {
					entry.css[ entryName ] = file;
				}
			});
		});
	});

	return { ...entry.js, ...entry.css };
}