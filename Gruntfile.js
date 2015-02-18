module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            css: {
                src: [
                    'node_modules/normalize.css/normalize.css',
                    'node_modules/lightbox/css/lightbox.css',
                    'src/css/*'
                ],
                dest: 'dist/css/styles.css'
            },
            js: {
                options: {
                    separator: ';',
                },
                src: [
                    'node_modules/lightbox/js/lightbox.js',
                    'src/js/*'
                ],
                dest: 'dist/js/scripts.js'
            }
        },
        cssmin: {
            css: {
                src: 'dist/css/styles.css',
                dest: 'dist/css/styles.min.css'
            }
        },
        uglify: {
            js: {
                files: {
                    'dist/js/scripts.min.js': ['dist/js/scripts.js']
                }
            }
        },
        clean: ['dist'],
        copy: {
            lightbox: {
                files: [
                    {
                        expand: true,
                        src: [ 'node_modules/lightbox/img/*' ],
                        dest: 'dist/img/',
                        filter: 'isFile',
                        flatten: true
                    },
                ],
            },
            respond: {
                files: [
                    {
                        expand: true,
                        src: [ 'node_modules/Respond.js/dest/respond.min.js' ],
                        dest: 'dist/js/',
                        filter: 'isFile',
                        flatten: true
                    },
                ],
            },
            main: {
                files: [
                    {
                        expand: true,
                        src: [ 'src/*' ],
                        dest: 'dist/',
                        filter: 'isFile',
                        flatten: true
                    },
                ],
            }
        },
    });
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.registerTask('default', ['clean', 'copy:main', 'copy:lightbox', 'copy:respond', 'concat:css', 'cssmin:css', 'concat:js', 'uglify:js']);
};