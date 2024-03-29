import { createInertiaApp } from '@inertiajs/vue3'
import { createPinia } from 'pinia'
import piniaPersistedState from 'pinia-plugin-persistedstate'
import { createApp, h } from 'vue'
import type { DefineComponent } from 'vue'

// import 'virtual:windi-devtools'
import 'virtual:windi.css'
import '~/app.css'

createThemeOverrides({
  common: {
    primaryColor: '#388370',
    borderRadius: '6px',
    avatarColor: '#388370',
  },
  Layout: {
    color: 'transparent',
  },
  Space: {
    gapLarge: '24px',
    gapMedium: '16px',
    gapSmall: '9px',
  },
  Breadcrumb: {
    itemLineHeight: 1,
  },
})

const layouts = import.meta.glob<{ default: DefineComponent }>('./layouts/*.vue', { eager: true })
const pages = import.meta.glob<{ default: DefineComponent }>('./pages/**/*.vue', { eager: true })

function getPageKey(name: string, defined?: string): string {
  if (defined)
    return defined

  const segment = name.split('/')
  segment.splice(1, 0, 'routes')

  return segment.join('.')
}

window.addEventListener('unhandledrejection', (e) => {
  console.error(e.reason)
})

createInertiaApp({
  title: title => [title, import.meta.env.APP_NAME].filter((str?: string) => !!str).join(' | '),
  resolve: (name) => {
    const page = pages[`./pages/${name}.vue`]

    if (!page)
      throw new Error(`Could not find page component for path '${name}'`)

    const layoutName = page.default.layoutName || 'app-layout'
    const layout = layouts[`./layouts/${layoutName}.vue`]

    if (!layout)
      throw new Error(`Could not find page layout '${layoutName}'`)

    page.default.name = name.replace('/', '-')
    page.default.layout = h(layout.default, {
      page: getPageKey(name, page.default.pageName),
      title: page.default.pageTitle,
      paths: page.default.paths || [],
    })

    return page
  },
  setup({ el, App, props, plugin }) {
    const isClient = typeof window !== 'undefined'
    const pinia = createPinia()

    pinia.use(piniaPersistedState)

    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(pinia)

    Object.values(import.meta.glob<{ install: AppModuleInstall }>('./modules/*.ts', { eager: true })).forEach((i) => {
      Promise.resolve(i.install({ app, isClient }))
    })

    app.mount(el)
  },
})
