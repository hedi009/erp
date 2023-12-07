import { Component, OnInit } from '@angular/core';
import { UserService } from 'src/app/user-service.service';

@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.scss']
})
export class UserListComponent implements OnInit {
  users:any[] | undefined;

  constructor(private userservice: UserService) { }

  ngOnInit(): void {
    this.Listuser();
  }

  Listuser(): void {
    this.userservice.getAll()
      .subscribe(
        data => {
          this.users = data['hydra:member'];
          console.log(data);
        },
        error => {
          console.log(error);
        });
  }
  

}
