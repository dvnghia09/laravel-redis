import { createRouter, createWebHistory } from "vue-router";

import Chat from '../components/Chat'
import ListRoom from '../pages/ListRoom'
import Room from '../pages/Room'

const routes = [
    {
		path: '/',
		name: 'rooms',
		component: ListRoom
	},
    {
        path: '/room/:roomId',
        name: 'room',
        component: Room
    },
	{
		path: '/chat',
		name: 'chat',
		component: Chat
	},
]

export default createRouter({
	history: createWebHistory(),
	routes
})