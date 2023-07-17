<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">⚓ Anchor</a>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <router-view></router-view>
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
