const path = require('path');
module.exports = {
    entry: {
        main: './assets/src/index.js'
    },
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, 'assets/js'),
    },
    externals: {
      jquery: 'jQuery',
    },

  };