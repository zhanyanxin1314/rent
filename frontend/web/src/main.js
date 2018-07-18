import Vue from 'vue' 
import App from './App.vue' 
import VueRouter from 'vue-router' 
 
import http from './services/http.js'  
import  '../static/css/page-RH-index.css'  
import  '../static/css/page-RH-login.css'  
 
import Login from './components/Login.vue' 
import Home from './components/Home.vue'  
Vue.prototype.$http = http  
Vue.use(VueRouter) 
//Vue.use(iView)  
const router = new VueRouter({ 
  mode: 'history', 
  base: __dirname, 
  routes: [ 
    { 
      path: '/', 
      component: Home, 
      meta: { 
      //  requireAuth: true 
      } 
    }, 
    { 
      path: '/login', 
      component: Login 
    } 
  ] 
})  
import Auth from './services/auth.js'; 
 
router.beforeEach((to, from, next) => { 
    if(to.meta.requireAuth && !Auth.authenticated()) 
    { 
      next({ 
          path: '/login', 
          query: { redirect: to.fullPath } 
        }) 
    } 
    else { 
      next() 
    } 
}) 
 
new Vue({ 
  el: '#app', 
  router: router, 
  render: h => h(App) 
}); 
 
export default router 
