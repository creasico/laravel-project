import { defineConfig } from 'windicss/helpers'
import typography from 'windicss/plugin/typography'
import forms from 'windicss/plugin/forms'
import filters from 'windicss/plugin/filters'
import lineClamp from 'windicss/plugin/line-clamp'

// import colors from 'windicss/colors'
// import defaultTheme from 'windicss/defaultTheme'

export default defineConfig({
  extract: {
    include: [
      'resources/client/**/*.{vue,ts}',
      'resources/views/**/*.blade.php',
      'vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    exclude: ['node_modules', '.git'],
  },
  plugins: [
    typography(),
    forms,
    filters,
    lineClamp,
  ],
  safelist: ['prose', 'prose-sm', 'max-w-none', 'hidden'],
  theme: {
    extend: {
      colors: {
        // DEFAULT: colors.emerald.toString(),
        primary: {
          DEFAULT: '#388370',
        },
        secondary: {
          DEFAULT: '#839F98',
        },
      },
      fontFamily: {
        sans: ['Nunito', 'sans-serif'],
        // serif: [...defaultTheme.fontFamily.serif],
        // mono: [...defaultTheme.fontFamily.mono],
      },
    },
  },
})
