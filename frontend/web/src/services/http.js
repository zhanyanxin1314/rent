import axios from 'axios' 
import setting from '../config/setting.js' 
import router from '../main.js' 
import Auth from './auth.js' 
 
 
axios.defaults.timeout = 5000; 
axios.defaults.baseURL = setting.remoteHost; 

axios.interceptors.request.use( 
    config => { 
        if (Auth.authenticated()) { 
          var token = Auth.getToken(); 
          config.headers.common["Authorization"] = `Bearer ${token}`; 
        } 
        return config; 
    }, 
    err => { 
        return Promise.reject(err); 
    } 
); 
axios.interceptors.response.use( 
    response => { 
        return response; 
    }, 
    error => { 
        if (error.response) { 
            switch (error.response.status) { 
                case 401: 
                    Auth.logout() 
                    router.replace({ 
                        path: 'login', 
                        query: {redirect: router.currentRoute.fullPath} 
                    }) 
            } 
        } 
        console.log(error);//console : Error: Request failed with status code 402 
        return Promise.reject(error) 
}); 
export default axios;
