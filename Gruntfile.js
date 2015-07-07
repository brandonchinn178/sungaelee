module.exports = function (grunt) {
    grunt.loadNpmTasks("grunt-contrib-sass");
    grunt.loadNpmTasks("grunt-contrib-watch");

    grunt.initConfig({
        sass: {
            dist: {
                files: [{
                    expand: true,
                    cwd: "sungaelee/scss",
                    src: "*.scss",
                    dest: "sungaelee",
                    ext: ".css"
                }]
            }
        },
        watch: {
            sass: {
                files: "sungaelee/scss/*.scss",
                tasks: "sass"
            }
        }
    });

    grunt.registerTask("build", ["sass"]);
    grunt.registerTask("default", ["build", "watch"]);
};