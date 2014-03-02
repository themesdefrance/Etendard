module.exports = function(grunt){
	
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			compile: {
				files: ['sources_css/**/*'],
				tasks: ['default']
			}
		},
		compass: {
			options:{
				sassDir: 'sources_css/',
				imagesDir: 'img',
				fontsDir: 'fonts',
				require: [],
			},
			build: {
				options:{
					cssDir: '.',
					outputStyle: 'compressed',
				}
			},
			dev: {
				options:{
					cssDir: 'sources_css/',
					outputStyle: 'expanded',
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
	grunt.registerTask('build', ['compass:build', 'compass:dev', 'copy:build']);
}