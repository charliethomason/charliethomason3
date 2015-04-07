module.exports = function(grunt) {
	grunt.initConfig({
		sass: {
			dev: {
				options: {
					style: 'expanded'
				},
				files: {
					'style.css': 'scss/main.scss'
				}
			}
		},
		cssmin: {
			global: {
				options: {
					banner: '/*\nTheme Name: Charlie Thomason 3.5\nTheme URI: http://www.charliethomason.com\nDescription: A WordPress theme for CharlieThomason.com The Website of Charlie Thomason. Do not reuse without permission.\nAuthor: Charlie Thomason\nAuthor URI: http://www.charliethomason.com\nVersion: 3.5\n*/'
				},
				files: {
					'style.min.css': ['style.css']
				}
			}
		},
		copy: {
			php: {
				files: [{
					expand: true,
					src: ['*.php'],
					dest: '_prod/charliethomason/'
				}]
			},
			lightbox: {
				files: [{
					expand: true,
					src: ['inc/lightbox/**'],
					dest: '_prod/charliethomason/'
				}]
			},
			img: {
				files: [{
					expand: true,
					src: ['images/*'],
					dest: '_prod/charliethomason/'
				}]
			},
			js: {
				files: [{
					expand: true,
					src: ['js/**'],
					dest: '_prod/charliethomason/'
				}]
			},
			css: {
				files: [{
					expand: true,
					src: ['style.css','style.min.css'],
					dest: '_prod/charliethomason/'
				}]
			}
		},
		'ftp-deploy': {
			build: {
				auth: {
					host: '23.229.231.230',
					port: 21,
					authKey: 'key-charliethomason'
				},
				src: '_prod/charliethomason',
				dest: '/public_html/charliethomason.com/wp-content/themes/charliethomason3-5',
				exclusions: ['.DS_Store', 'Thumbs.db', '**/.DS_Store', '**/Thumbs.db', 'style.css.map']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-ftp-deploy');

	grunt.registerTask('compile', [
		'sass',
		'cssmin',
		'copy'
	]);
	grunt.registerTask('upload', [
		'ftp-deploy'
	]);
};