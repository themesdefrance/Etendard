module.exports = function(grunt){
	
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			compile: {
				files: ['scss/**/*.scss', 'js/*.js', '!js/etendard-combined.js'],
				tasks: ['default']
			}
		},
		compass: {
			options:{
				sassDir: 'scss/',
				imagesDir: 'img',
				fontsDir: 'fonts',
				require: []
			},
			build: {
				options:{
					cssDir: '.',
					outputStyle: 'compressed'
				}
			},
			dev: {
				options:{
					cssDir: 'css/',
					outputStyle: 'expanded',
					noLineComments: true
				}
			},
			
			buddypress: {
				options:{
					cssDir: 'css/',
					outputStyle: 'expanded',
				}
			}
			
		},
		concat: {
			options: {
			},
			js: {
				src: ['js/*.js', '!js/etendard-combined.js'],
				dest: 'js/etendard-combined.js'
			}
		},
		copy: {
			build: {
				expand: true,
				src: ['**', '!.sass-cache', '!Etendard/', '!node_modules/**', '!Gruntfile.js', '!README.md', '!package.json'],
				dest: 'Etendard/',
			}
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-copy');
	
	grunt.registerTask('default', ['compass:build','compass:dev', 'concat:js']);
	grunt.registerTask('build', ['compass:build', 'compass:dev', 'concat:js', 'copy:build']);
	grunt.registerTask('buddypress', ['compass:buddypress']);
}