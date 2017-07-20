var gulp = require('flarum-gulp');

gulp({
    modules: {
        'flagrow/toolbelt': [
            'src/**/*.js'
        ]
    },
    outputFile: 'dist/toolbelt.js'
});
