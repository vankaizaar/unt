window._ = require('lodash');

//window.Masonry = require('masonry-layout');
//window.imagesloaded = require('imagesloaded');
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
//    Masonry = window.Masonry;
//
//    imagesloaded = window.imagesloaded ;

} catch (e) {
}

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key',
//     cluster: 'mt1',
//     encrypted: true
// });

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo'

        /**
         * Pusher.js
         * Real-time notifications API
         */
        window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '17903980f7cd9be34f27',
    cluster: 'ap2',
    encrypted: false
});


$.fn.extend({

    toggleText: function (a, b) {
        return this.text(this.text() == b ? a : b);
    },

    /**
     * Remove element classes with wildcard matching. Optionally add classes:
     *   $( '#foo' ).alterClass( 'foo-* bar-*', 'foobar' )
     *
     */
    alterClass: function (removals, additions) {

        var self = this;

        if (removals.indexOf('*') === -1) {
            // Use native jQuery methods if there is no wildcard matching
            self.removeClass(removals);
            return !additions ? self : self.addClass(additions);
        }

        var patt = new RegExp('\\s' +
                removals.replace(/\*/g, '[A-Za-z0-9-_]+').split(' ').join('\\s|\\s') +
                '\\s', 'g');

        self.each(function (i, it) {
            var cn = ' ' + it.className + ' ';
            while (patt.test(cn)) {
                cn = cn.replace(patt, ' ');
            }
            it.className = $.trim(cn);
        });

        return !additions ? self : self.addClass(additions);
    }

});