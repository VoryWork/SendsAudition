module.exports = {
    purge: [
        './components/**/*.{vue,js}',
        './layouts/**/*.vue',
        './pages/**/*.vue',
        './plugins/**/*.{js,ts}',
        './nuxt.config.{js,ts}',
    ],
    darkMode: 'media', // or 'media' or 'class'
    theme: {
        fontFamily: {
            sans: ['Roboto', 'Source Sans Pro', 'Microsoft YaHei', 'Arial', 'sans-serif'],
            display: ['Roboto', 'Source Sans Pro', 'Microsoft YaHei', 'Arial', 'sans-serif'],
            body: ['Roboto', 'Source Sans Pro', 'Microsoft YaHei', 'Arial', 'sans-serif']
        },
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [],
}