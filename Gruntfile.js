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
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	
	grunt.registerTask('default', ['compass']);
}