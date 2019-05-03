<template>
  <div>
    <h1>Webmail</h1>
    <Connect @connecter="changeUser"/>
  </div>
</template>

<script>
import Connect from './Connect.vue';

export default {
  name: 'Topbar',

  components :{
    Connect
  },
  
  methods:{
    changeUser(user){
      this.$emit("changeUser", user)
    }
  }
};
</script>