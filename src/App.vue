<template>
  <div>
    <Topbar @changeUser="changeUser"/>
    <ListMessages :user="user" @Detailler="Detailler"/>
    <Detail :msg="msg"/>
  </div>
</template>

<script>
import Topbar from './components/Topbar.vue';
import ListMessages from './components/ListMessages.vue';
import Detail from './components/Detail.vue';

export default {
  name: 'App',
  components :{
    Topbar,
    ListMessages,
    Detail
  },

  data (){
    return{
      user:"",
      msg:{}
    }
  },  

  methods:{
    changeUser(user){
      this.user=user
    },

    Detailler(msg){
      this.msg=msg;
    }
  }
};
</script>

