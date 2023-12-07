import { INavbarData } from "./helper";
export const navbarData: INavbarData[]=[
    {
        routeLink:'dashboard',
        icon:'fal fa-home',
        label:'Dashboard'
    },
    {
        routeLink:'users',
        icon:'fal fa-user',
        label:'Users',
        items: [
            {
                routeLink:'users/list',
                icon:'fal fa-user',
                label:'List users'
            },
            {
                routeLink:'users/add',
                icon:'fal fa-user',
                label:'Add user'
            }
        ]
    },
    {
        routeLink:'groups',
        icon:'fal fa-users',
        label:'Groups',
        items: [
            {
                routeLink:'group/list',
                label:'List groups'
            },
            {
                routeLink:'group/add',
                label:'Add group'
            }
        ]
    },
    {
        routeLink:'rights',
        icon:'fal fa-award',
        label:'Rights',
        items: [
            {
                routeLink:'rights/list',
                label:'List rights'
            },
            {
                routeLink:'right/add',
                label:'Add right'
            }
        ]
    },
    {
        routeLink:'companies',
        icon:'fal fa-city',
        label:'Companies',
        items: [
            {
                routeLink:'companies/list',
                label:'List companies'
            },
            {
                routeLink:'companie/add',
                label:'Add companie'
            }
        ]
    },
    {
        routeLink:'setting',
        icon:'fal fa-cog',
        label:'Setting'
    }

];