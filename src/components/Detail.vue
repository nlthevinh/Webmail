<template>
  <li>
		Message : {{msg.message}}
	</li>
</template>

<script>
export default {
  name: 'Detail',
  props: ['msg']
};
</script>