'use strict';

const webpack = require('webpack');
var path = require('path');

module.exports = {
    entry: "./app/Resources/js/app.js",
    resolve: {
        root: path.resolve('./app/Resources/js'),
        extensions: ['', '.js']
    },
    output: {
        path: "web/js",
        filename: "bundle.js"
    },
    module: {
        loaders: [
            {
                test: /\.js?$/,
                exclude: /node_modules/,
                loader: 'babel',
                query: {
                    presets: ['es2015']
                }
            },
            {
                test: /\.html$/,
                loader: 'underscore-template-loader'
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            _: 'underscore'
        })
    ],
    watchOptions: {
        poll: true
    }
};