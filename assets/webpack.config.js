const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");   //remove all unused webpacks on rebuild
const OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const cssnano = require("cssnano");            // minimize css file(remove all comments)
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");

const JS_DIR = path.resolve(__dirname, "src/js");
const IMG_DIR = path.resolve(__dirname, "src/img");
const BUILD_DIR = path.resolve(__dirname, "build");

const entry = {
  main: JS_DIR + "/main.js",
  single: JS_DIR + "/single.js",
};

const output = {
  path: BUILD_DIR,
  filename: "js/[name].js", // from js/main.js to build/main.js
};


const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: (argv.mode === "production")     // clean if production
    }),

    new MiniCssExtractPlugin({
        filename: "css/[name].css"                       // extracted in build/css/main.css for example
    })
];

const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader",
  },
  {
    test: /\.scss$/,
    exclude: /node_modules/,
    use: [MiniCssExtractPlugin.loader, "css-loader"], // convert css into array of js, then minicssextraxtplugin take info and extract it into files
  },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    use: {
        loader: "file-loader",
        options: {
          name: "[path][name].[ext]",
          publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
        },
      },
  },
];

module.exports = (env, argv) => ({
  entry: entry,
  output: output,
  devtool: "source-map", // create *.js.map(references)
  module: {
    rules: rules,
  },
  optimization: {
    minimizer: [
      new OptimizeCssAssetsPlugin({
        cssProcessor: cssnano,
      }),
      new UglifyJsPlugin({
        cache: false,
        parallel: true,
        sourceMap: false,

      })
    ]
  },
  plugins: plugins(argv),
  externals: {
    jquery: 'jQuery',
  }
});
