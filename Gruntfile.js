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
			build: {
				options:{
					sassDir: 'scss/',
					cssDir: '.',
					imagesDir: 'img',
					fontsDir: 'fonts',
					outputStyle: 'compressed',
					require: [],
				}
			},
			dev: {
				options:{
					sassDir: 'scss/',
					cssDir: 'scss/',
					imagesDir: 'img',
					fontsDir: 'fonts',
					outputStyle: 'expanded',
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
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-copy');
	
	grunt.registerTask('default', ['compass:build']);
	grunt.registerTask('build', ['compass:build', 'copy:build']);
}