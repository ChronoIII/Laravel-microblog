<template>
  <div class="navigation-bar">

  </div>

  <div class="dashboard">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
    components: {

    },
    data() {
        return {

        }
    },
    computed: {

    },
    methods: {

    }
}
</script>

<style scoped>
  .navigation-bar {
    width: 100%;
    height: 50px;
    background: #f7c4a5;
  }

  .dashboard {
    width: 100%;
    height: calc(100lvh - 50px);
    background: #fff9;
  }
</style>
