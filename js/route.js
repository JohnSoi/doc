const List = {template: '<h2>Вывод списка пользователей</h2>'}
const Add = {template: '<h2>Добавление пользователей</h2>'}

const routes = [
	{ path: '/list', component: List },
	{ path: '/add', component: Add }
]

const router = new VueRouter({routes})

const app = new Vue({router}).$mount('.input')
