
module.exports = {
    entry: [
        "./src/Front/query-new",
        "./src/Front/table",
    ],
    output: {
        filename: "web/assets/build/bundle.js"
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel',
                query: {
                    presets: ['react']
                }
            }
        ]
    }
};