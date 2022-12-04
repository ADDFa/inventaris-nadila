const path = require('path')

module.exports = {
    mode: 'production',
    entry: './main.js',
    output: {
        path: path.resolve(__dirname),
        filename: 'index.js'
    },
    watch: true
}