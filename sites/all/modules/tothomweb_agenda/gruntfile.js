var os = require('os'); 
os.tmpDir = os.tmpdir;

module.exports = function (grunt) {
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.initConfig({
    compass: {
      prod: {
        options: {
          config: 'config.rb',
          environment: 'production'
        }
      },
      dev: {
        options: {
          config: 'config.rb',
          environment: 'development'
        }
      }
    },
    watch: {
      sass: {
        files: ['sass/**/*.scss'],
        tasks: ['compass:dev'],
        options: {
          livereload: true,
        }
      }
    }
  });
  grunt.registerTask('default', 'watch');
  grunt.registerTask('dev', ['compass:dev']);
  grunt.registerTask('prod', ['compass:prod']);
}