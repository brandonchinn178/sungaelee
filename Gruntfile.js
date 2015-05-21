module.exports = function (grunt) {
    grunt.loadNpmTasks("grunt-contrib-sass");
    grunt.loadNpmTasks("grunt-contrib-watch");

    grunt.initConfig({
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: [{
                    expand: true,
                    cwd: "sungaelee/static/scss",
                    src: "**/*.scss",
                    dest: "sungaelee/static/css",
                    ext: ".css"
                }]
            }
        },
        watch: {
            sass: {
                files: "sungaelee/static/sass/**/*.scss",
                tasks: "sass"
            }
        }
    });

    grunt.registerTask("build", ["sass"]);
    grunt.registerTask("default", ["build", "watch"]);
};