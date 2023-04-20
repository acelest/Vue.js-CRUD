<template>
  <div>
    <h2>Liste des Eleves</h2>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Age</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="eleve in result" v-bind:key="eleve.id">
          <td>{{ eleve.id }}</td>
          <td>{{ eleve.name }}</td>
          <td>{{ eleve.prenom }}</td>
          <td>{{ eleve.age }}</td>
          <td>{{ eleve.password }}</td>
          <td>
            <button class="btn btn-danger btn-sm" @click="remove(eleve)">
              Supprimer
            </button>
            <button class="btn btn-primary btn-sm" @click="edit(eleve)">
              Editer
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="container">
      <h2>Ajouter un eleve</h2>
      <form @submit.prevent="save">
        <div class="mb-3">
          <label class="form-label">Nom</label>
          <input
            type="text"
            v-model="eleve.name"
            class="form-control"
            id="Nom"
            placeholder="Votre nom"
          />
        </div>
        <div class="mb-3">
          <label class="form-label">Prénom</label>
          <input
            type="text"
            v-model="eleve.prenom"
            class="form-control"
            id="Prenom"
            placeholder="Votre prénom"
          />
        </div>
        <div class="mb-3">
          <label class="form-label">Age</label>
          <input
            type="number"
            v-model="eleve.age"
            class="form-control"
            id="age"
            placeholder="27"
          />
        </div>
        <div class="mb-3">
          <label class="form-label">Mot de passe</label>
          <input
            type="password"
            v-model="eleve.password"
            class="form-control"
            id="Password"
            placeholder="Votre mot de passe"
          />
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Soumettre</button>
      </form>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import axios from "axios";
Vue.use(axios);

export default {
  name: "EleveView",
  data() {
    return {
      result: {},
      eleve: {
        id: '',
        name: '',
        prenom: '',
        age: '',
        password: ''
      }
    }
  },
  created() {
    this.EleveLoad();
  },
  mounted(){
    console.log("mounted ()");
  },
  methods: {
    EleveLoad() {
      var page = "http://127.0.0.1:8000/api/eleves";
      axios.get(page).then(({ data }) => {
        console.log(data);
        this.result = data;
      }
      );
    },

    save()

    {
      this.saveData();
    },

    saveData() {
      axios.post("http://127.0.0.1:8000/api/save", this.eleve)
      .then(
        ({ data }) => {
          alert("enregistrement reussi");
        }
        )
    },

    edit(eleve) {
      this.eleve = eleve;
    },

    updateData() {
      var pageedit = "http://127.0.0.1:8000/api/update" + this.eleve.id;
      axios.put(pageedit, this.eleve)
      .then(({ data }) => {
        this.eleve.name = "",
        this.eleve.prenom = "",
        this.eleve.age = "",
        this.eleve.password = "",
        this.id = ""
        alert("c'est maintenant a jour");
        this.EleveLoad();
      }
      );
    },

    remove(eleve) {
      var url = "http://127.0.0.1:8000/api/delete/" + eleve.id;
      axios.delete(url);
      alert("Suppression  de l'eleve");
      this.EleveLoad();
    }

  }
}
</script>
