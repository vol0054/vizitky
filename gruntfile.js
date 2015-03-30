module.exports = function(grunt) {

    grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),
	bowercopy: {
	    options: {
		srcPrefix: 'bower_components'
	    },
	    fucks: {
		options: {
		    destPrefix:'www/'
		},
		files: {
		    'js' : 'bootstrap/dist/js/bootstrap.min.js',
		    'js/' : 'jquery/dist/*',
		    'css' : 'bootstrap/dist/css/bootstrap.min.css'
		}
		
	    }
	},
	concat: {
	    /** veme jquery.js a hovna.js a spoji je dohromady */
	    dist: {
		src: ['www/js/jquery.js','www/js/testHoven.js'],
		dest: 'www/js/test/build.js',
	    },
	    
	},
    });	
    grunt.loadNpmTasks('grunt-bowercopy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    
    
    // Default task(s).
    grunt.registerTask('default', ['concat']);
  

};
