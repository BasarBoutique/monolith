import Vue from "vue";
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex)

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1';

export default new Vuex.Store({
    state:{
        token: localStorage.getItem('accessToken') || null,
        user : localStorage.getItem('userData') || null
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
        setUser(state,user){
            state.user = user;
        },
        removeToken(state){
            state.token = null,
            state.user = null
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
        aboutUser(context){
            axios.defaults.headers.common['Authorization']= 'Bearer ' + context.state.token
            axios.get('/auth/user').then(user=>{
                localStorage.setItem('userData', JSON.stringify(user.data.data))
                context.commit('setUser',JSON.stringify(user.data.data))
            })
        },
        logout(context){
            axios.defaults.headers.common['Authorization']= 'Bearer ' + context.state.token
            return new Promise((resolve,reject)=> {
                axios.get('/auth/logout').then(res=>{
                    localStorage.removeItem('accessToken')
                    localStorage.removeItem('userData')
                    context.commit('removeToken')
                    resolve(res.data)
                })
            })
        }
    },
    modules:{}
})