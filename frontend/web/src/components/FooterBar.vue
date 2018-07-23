
<template>
  <div id="tab-bar">
    <mt-tabbar v-model="selected" v-show="isShow" fixed class="border-1px-top">
      <mt-tab-item id="main">
        首页
      </mt-tab-item>
      <mt-tab-item id="tool">
        找房
      </mt-tab-item>
      <mt-tab-item id="my">
        资讯
      </mt-tab-item>
      <mt-tab-item id="center">
        我的
      </mt-tab-item>

    </mt-tabbar>
  </div>
</template>
<style>
</style>
<script>
  export default {
    data(){
      return {
        selected: 'main'
      }
    },
    computed: {
      isShow: function () {
        return true;
      }
    },
    watch: {
      'selected': {
        handler(){
          if (this.selected == "main") {
            this.$router.push('/main');
          }
          if (this.selected == "tool") {
            this.$router.push('/tool');
          }
          if (this.selected == "my") {
            this.$router.push('/my')
          }
	  if (this.selected == "center") {
            this.$router.push('/center')
          }
        }
      }
    }
  }
</script>
