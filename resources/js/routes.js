import DataWisata from './components/Wisata/DataWisata.vue'
import CreateWisata from './components/Wisata/CreateWisata.vue'
import UpdateWisata from './components/Wisata/UpdateWisata.vue'
import Home from './components/Wisata/Home.vue'
import Login from './components/Wisata/Login.vue'
import LandingPage from './components/Wisata/LandingPage.vue'


export const routes = [
    {
        path: "/data-wisata",
        name: 'data-wisata',
        component: DataWisata 
    },
    {
        path: "/create-wisata",
        name: 'create-wisata',
        component: CreateWisata 
    },
    {
        path: "/update-wisata",
        name: 'update-wisata',
        component: UpdateWisata 
    },
    {
        path: "/",
        name: '/',
        component: LandingPage
    },
    {
        path: "/home",
        name: 'home',
        component: Home
    },
    {
        path: "/login",
        name: 'login',
        component: Login
    },
]