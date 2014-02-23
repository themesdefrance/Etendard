module.exports = function(grunt){
	
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			compile: {
				files: ['scss/**/*'],
				tasks: ['default']
			}
		},
		compass: {
			dev: {
				options:{
					sassDir: 'scss/',
					cssDir: '.',
					imagesDir: 'img',
					fontsDir: 'fonts',
					outputStyle: 'compressed',
					require: [],
				}
			}
		},
		copy: {
			build: {
				expand: true,
				src: ['**', '!.sass-cache', '!Etendard', '!node_modules/**', '!Gruntfile.js', '!README.md', '!package.json'],
				dest: 'Etendard/',
			}
		},
		replace: {
			licence: {
				files:[
					{expand: true, src: ['Etendard/functions.php'], dest: ['Etendard/functions.php']}
				],
				options: {
					
				}
			}
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-copy');
	
	grunt.registerTask('default', ['compass']);
}