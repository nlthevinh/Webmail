<template>
  <li>
		De : {{msg.expediteur}} A : {{msg.user}} Message : {{msg.message}} Date : {{msg.date}} <button type="button" v-on:click="detailler">Détailler</button>
	</li>
</template>

<script>
export default {
  name: 'Message',
  props: ['msg'],

  methods:{
    detailler(){
      this.$emit("click", this.msg);
    }
  }
};
</script>