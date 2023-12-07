import { Component, Input } from '@angular/core';
import { Languages } from './header-dummy-data';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent {
@Input() collapsed=false;
@Input() screenWidth=0;
selectedLanquage:any;
language=Languages;

constructor(){

}
ngOnInit():void{
this.selectedLanquage=this.language[0];
}
getheadClass(): string{
  let styleClass='';
  if(this.collapsed && this.screenWidth > 768){
    styleClass='head-trimmed';
  }else{
    styleClass='head-md-screen';
  }
  return styleClass;
}

}
