<template>
    <div id="app">
      <Header />
      <Content>
        <!-- Your page-specific content goes here -->
        <router-view></router-view>
      </Content>
      <Footer />
    </div>
  </template>

  <script>
  import Header from './components/Header.vue';
  import Footer from './components/Footer.vue';
  import Content from './components/Content.vue';

  export default {
    name: 'App',
    components: {
      Header,
      Footer,
      Content,
    },
  }
  </script>

  <style>
  /* Add your global styles here */
  </style>
