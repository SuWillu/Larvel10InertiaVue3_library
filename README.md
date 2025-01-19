# Larvel10InertiaVue3_library
Library project using Laravel 10, Inertia.js and Vue.js 3

Run the migrations.
Run the RoleSeeder
Run the BookSeeder

install lodash: npm i --save lodash

install ziggy:

composer require tightenco/ziggy
in app.blade.php add:
@routes

in vite.config.jsadd:
import path from 'path'
resolve: {
    alias: {
        'ziggy-js': path.resolve('vendor/tightenco/ziggy/dist/index.esm.js'),
    }
},


in app.js add:
import { ZiggyVue } from 'ziggy-js';
 .use(ZiggyVue)

To start, click on Login. There is a link to Sign Up on that page.
