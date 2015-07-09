module.exports = function (grunt) {
    grunt.loadNpmTasks("grunt-contrib-sass");
    grunt.loadNpmTasks("grunt-contrib-watch");

    grunt.initConfig({
        sass: {
            dist: {
                files: [
                    {
                        src: "sungaelee/scss/style.scss",
                        dest: "sungaelee/style.css"
                    },
                    {
                        expand: true,
                        cwd: "sungaelee/scss/",
                        src: ["*.scss", "!style.scss"],
                        dest: "sungaelee/css/",
                        ext: ".css"
                    }
                ]
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