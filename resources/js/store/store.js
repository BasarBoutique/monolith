import Vue from "vue";
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex)

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1"

export default new Vuex.Store({
    state:{
        token: localStorage.getItem('accessToken') || null
    },
    getters:{
        loggedIn(state){
            return state.token !== null
        }
    },
    mutations:{
        setToken(state,token){
            state.token = token
        },
        removeToken(state){
            state.token = null
        }
    },
    actions:{
        login(context, credential){
            return new Promise((resolve,reject)=>{
                axios.post('/auth/login',{
                    email: credential.email,
                    password: credential.password
                }).then(res=>{
                    localStorage.setItem('accessToken',res.data.data.access_token)
                    context.commit('setToken',res.data.data.access_token)
                    resolve(res.data)
                }).catch(error=>{
                    reject(error.response.data)
                })
            })
        },
        logout(context){
            axios.defaults.headers.common['Authorization']= 'Bearer ' + context.state.token
            return new Promise((resolve,reject)=> {
                axios.get('/auth/logout').then(res=>{
                    localStorage.removeItem('accessToken')
                    context.commit('removeToken')
                    resolve(res.data)
                })
            })
        }
    },
    modules:{}
})