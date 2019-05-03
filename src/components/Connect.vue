<template>
  <div>
		<div>
      <p>Connexion :</p>
			<input type="text" v-model="user" name="user" maxlength="20" placeholder="Utilisateur"/>
			<button type="button" v-on:click="connexion">Connecter</button>
		</div>
		<div>
      <p>Envoyer un mail :</p>
			<input type="text" name="destinataire" maxlength="20" placeholder="Destinataire"/>
    	<input type="text" name="message" maxlength="1000" placeholder="Message"/>
			<button type="button" v-on:click="envoyer">Envoyer</button>
		</div>
	</div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Connect',

	data() {
    return {
      user: "",
      destinataire: "",
      message: ""
		}
	},

	methods: {
		connexion() {
			this.$emit("connecter", this.user);
		},

		async envoyer(user, destinataire, message){
      await axios.post(`http://127.0.0.1/mail2/mail/src/components/insert.php?user=${user}&dest=${destinataire}&msg=${message}`);
    },
	}
}
</script>