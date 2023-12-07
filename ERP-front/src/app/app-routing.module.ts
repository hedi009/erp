import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { UsersComponent } from './users/users.component';
import { GroupsComponent } from './groups/groups.component';
import { SettingsComponent } from './settings/settings.component';
import { CompaniesComponent } from './companies/companies.component';
import { UserListComponent } from './users/user-list/user-list.component';
import { UserAddComponent } from './users/user-add/user-add.component';
import { GroupAddComponent } from './groups/group-add/group-add.component';
import { GroupListComponent } from './groups/group-list/group-list.component';
import { CompanieAddComponent } from './companies/companie-add/companie-add.component';
import { CompanieListComponent } from './companies/companie-list/companie-list.component';
import { RightsComponent } from './rights/rights.component';

const routes: Routes = [
  {path:'dashboard', component:DashboardComponent},
  {path:'', component:DashboardComponent},
  {path:'users', component:UsersComponent},
  {path:'groups', component:GroupsComponent},
  {path:'setting', component:SettingsComponent},
  {path:'companies', component:CompaniesComponent},
  {path:'rights', component:RightsComponent},
  {path:'users/list', component:UserListComponent},
  {path:'users/add', component:UserAddComponent},
  {path:'group/add', component:GroupAddComponent},
  {path:'group/list', component:GroupListComponent},
  {path:'companies/list', component:CompanieListComponent},
  {path:'companie/add', component:CompanieAddComponent},
  

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
