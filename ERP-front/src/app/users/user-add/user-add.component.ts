import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-user-add',
  templateUrl: './user-add.component.html',
  styleUrls: ['./user-add.component.scss']
})
export class UserAddComponent {
  utilisateurForm: FormGroup;

  constructor(private formBuilder: FormBuilder, private http: HttpClient) {
    this.utilisateurForm = this.formBuilder.group({
      nom: ['', Validators.required],
      prenom: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      plainPassword: ['', [Validators.required]],
      
    });
  }

  ajouterUtilisateur() {
    if (this.utilisateurForm.valid) {
      const utilisateurData = this.utilisateurForm.value;

      
      this.http.post('http://localhost:8000/api/users', utilisateurData)
        .subscribe((response) => {
          console.log('Utilisateur ajouté avec succès :', response);
          
          this.utilisateurForm.reset();
        }, (error) => {
          console.error('Erreur lors de l\'ajout de l\'utilisateur :', error);
        });
    } else {
      console.error('Veuillez remplir correctement le formulaire.');
    }
  }
}

