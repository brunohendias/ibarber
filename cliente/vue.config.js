const { defineConfig } = require('@vue/cli-service')

module.exports = defineConfig({
    configureWebpack: {
        devServer: {
            historyApiFallback: true
        }
    },
    productionSourceMap: false,
    publicPath: process.env.NODE_ENV === 'production' 
        ? ''
        : '/'
});