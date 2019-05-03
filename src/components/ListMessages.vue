<template>
  <ul>
    <Message v-for="message in messages" :msg="message" @click="detailler"/>
  </ul>
</template>

<script>
import Message from './Message.vue';
import axios from 'axios';

export default {
  name: 'ListMessages',
  props:["user"],

  components :{
    Message
  },

  data() {
    return {
      messages:[]
    } 
  },

  watch:{
    user(user){
      if (this.user!=="") {
        this.chercherMessages(user);
      }
    }
  },

  methods:{
    async chercherMessages(user){
      const response = await axios.get(`http://127.0.0.1/mail2/mail/src/components/list.php?user=${user}`);
      this.messages = response.data;
    },

    detailler(msg){
      this.$emit("Detailler", msg)
    }
  }
};
</script>