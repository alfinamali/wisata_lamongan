import DataWisata from './components/Wisata/DataWisata.vue'
import CreateWisata from './components/Wisata/CreateWisata.vue'
import UpdateWisata from './components/Wisata/UpdateWisata.vue'
import DataUmkm from './components/Wisata/DataUmkm.vue'
import CreateUmkm from './components/Wisata/CreateUmkm.vue'
import UpdateUmkm from './components/Wisata/UpdateUmkm.vue'
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
        path: "/data-umkm",
        name: 'data-umkm',
        component: DataUmkm
    },
    {
        path: "/create-umkm",
        name: 'create-umkm',
        component: CreateUmkm
    },
    {
        path: "/update-wisata/:id",
        name: 'update-wisata',
        component: UpdateWisata
    },
    {
        path: "/update-umkm",
        name: 'update-umkm',
        component: UpdateUmkm
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