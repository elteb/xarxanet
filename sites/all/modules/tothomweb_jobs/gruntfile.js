var os = require('os');
os.tmpDir = os.tmpdir;

module.exports = function (grunt) {
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-css-import');
  grunt.initConfig({
    css_import: {
      your_target: {
        options: {
        },
        files: {
          'css/tothomweb_jobs_libraries.css': [
            'node_modules/@chenfengyuan/datepicker/dist/datepicker.css'
          ]
        }
      }
    },
    uglify: {
      js_dev: {
        options: {
          preserveComments: 'all',
          compress: false,
          beautify: {
            width: 80,
            beautify: true
          }
        },
        files: {
          'js/tothomweb_jobs_libraries.js': [
            'node_modules/@chenfengyuan/datepicker/dist/datepicker.js',
            'node_modules/@chenfengyuan/datepicker/i18n/datepicker.ca-ES.js'
          ]
        }
      },
      js_prod: {
        options: {
          preserveComments: false,
          compress: true,
          beautify: {
            width: 80,
            beautify: false
          }
        },
        files: {
          'js/tothomweb_jobs_libraries.js': [
            'node_modules/@chenfengyuan/datepicker/dist/datepicker.js',
            'node_modules/@chenfengyuan/datepicker/i18n/datepicker.ca-ES.js'
          ]
        }
      }
    },
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
      },
      css: {
        files: ['sass/**/*.scss'],
        tasks: ['css_import']
      },
      javascripts: {
        files: ['js/tothomweb_jobs.js'], // Watch for changes on js files
        tasks: ['uglify:js_dev']
      }
    }
  });
  grunt.registerTask('default', 'watch');
  grunt.registerTask('dev', ['uglify:js_dev', 'compass:dev']);
  grunt.registerTask('prod', ['uglify:js_prod', 'compass:prod']);
}
