const webpack = require('webpack')
const path = require('path')

module.exports = {
    context: path.join(__dirname, 'src'),
    entry: './index.js',
    output: {
        filename: 'bundle.js',
        path: path.join(__dirname, 'dist')
    },
    devtool: 'eval',
    
}