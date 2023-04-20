import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import EleveView from '@/components/EleveView'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'EleveView',
      component: EleveView
    },
    {
      path: '/HelloWorld',
      name: 'HelloWorld',
      component: HelloWorld
    }
  ]
})
